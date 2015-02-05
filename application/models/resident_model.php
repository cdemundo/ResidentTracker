<?php

/**
* 
*/
class Resident_model extends CI_Model
{
	//each of these are a field in the database
	private $_id; 

	public $firstName;
	public $lastName; 
	public $programName; //the name of the residency program
	public $pgy; //post graduate year, 1-5, indicates what year of residency a resident is in
	public $email; 
	public $telephone; 
	public $notes = array(); //array of notes, key is posted_by, value is note

	
	function __construct()
	{
		parent::__construct(); 
	}

	/*
	*Getter for $_id
	*/
	public function getID() {
        return $this->_id;
    }

	/***
	*Get resident from DB by id
	***/ 
	public function loadByID($id)
	{
		$this->_id = $id; 
		
		$query = $this->db->get_where('resident', array('id' => $this->_id)); 

		if($query->num_rows() > 0)
		{
			$temp = $query->row(); 

			$this->firstName = $temp->firstname; 
			$this->lastName = $temp->lastname; 
			$this->programName = $temp->program_name; 
			$this->email = $temp->email; 
   			$this->telephone = $temp->telephone; 

			//convert program_start_year to pgy year (1-5)
			$resStartDate = new DateTime($temp->program_start_year); 
			$currentDate = new DateTime(); 

			//figure out what year the resident is
			$diff = $currentDate->diff($resStartDate)->format("%a");
			$mod = $diff / 365;

			if($mod > 0 && $mod < 1)
			{
				$this->pgy = 1; 
			}

			if($mod > 1 && $mod < 2)
			{
				$this->pgy = 2; 
			}

			if($mod > 2 && $mod < 3)
			{
				$this->pgy = 3; 
			}

			if($mod > 3 && $mod < 4)
			{
				$this->pgy = 4; 
			}

			if($mod > 4 && $mod < 5)
			{
				$this->pgy = 5; 
			}

			if($mod > 5)
			{
				$this->pgy = "Archived"; 
			}
		}

		//get all notes written about this resident
		$query = $this->db->get_where('resident_notes', array('resident_id' => $this->_id)); 

		foreach($query->result() as $oneNote)
		{
			$this->notes[$oneNote->note] = $oneNote->posted_by; 
		}

		return $this; 
	}

	/***
	*Create a new resident object with only last name populated
		***/ 

	public function byLastName($lastName) 
	{
    	$this->lastName = $lastName;
    	return $this; 
    }

    /**
    *Commit a resident object to the database
    *@return boolean
    **/
    public function addResident()
    {
    	if (empty($this->email))
    	{
    		$this->email = "No Entry";
    	}
    	if(empty($this->telephone))
    	{
    		$this->telephone = "No Entry";
    	}

    	$data = array(
    			'firstname' => $this->firstName, 
    			'lastname' => $this->lastName, 
    			'program_name' => $this->programName, 
    			'program_start_year' => $this->convertStartYear(), 
    			'email' => $this->email, 
    			'telephone' => $this->telephone
    		);

    	$this->db->insert('resident', $data); 

    	return $this->db->affected_rows() > 0;
    }

    /**
    *Updates a resident that exists in the database already
    *@return boolean
    */

    public function update()
    {
    	if(!is_numeric($this->pgy))
    	{
    		$start = $this->pgy = " (Archived)"; 
    	}
    	else
    	{
    		$start = $this->convertStartYear(); 
    	}

    	$data = array('firstname' => $this->firstName,
    		'lastname' => $this->lastName, 
    		'program_start_year' => $start, 
    		'email' => $this->email, 
    		'telephone' => $this->telephone
    		); 

    	$this->db->where('id', $this->_id); 
    	$this->db->update('resident', $data); 

    	return $this->db->affected_rows() > 0;
    }

    /**
    *Checks if a resident exists in the database, by last name
    */

    public function checkExistResident()
    {
    	$query = $this->db->get_where('resident', array('lastname' => $this->lastName)); 

    	if($query->num_rows() == 1)
    	{
    		return $query->row()->id; 
    	}
    	elseif ($query->num_rows() > 1)
    	{
    		return $query->result(); 
    	}
    	else
    	{
    		return false; 
    	}

    }

    /**
	*Search for all residents by partial last name
	*/
	function searchByLastName()
	{
		$this->db->like('lastname', $this->lastName); 
		$query = $this->db->get('resident'); 

		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
	}

    /**
    *Remove a resident from the database
    *@return boolean
    **/

    public function remove()
    {
    	//foreign key between the two, have to delete any courses first
    	$this->db->delete('courses_attended', array('resident_id' => $this->_id));

    	$this->db->delete('resident', array('id' => $this->_id));

    	return $this->db->affected_rows() > 0; 
    }


    /*******
	*Gets all courses a resident has attended
	*	SELECT course_id FROM courses_attended
	*	INNER JOIN resident
	*	ON courses_attended.resident_id = resident.id
	*	WHERE resident.id = ?
	********/

	function getCourses()
	{
		$returnArray = array(); 

		//initial portion gets the course ID for each course the resident has attended from course_attended table
		$this->db->select('course_id');
		$this->db->from('courses_attended');
		$this->db->join('resident', 'courses_attended.resident_id = resident.id');
		$this->db->where('resident.id', $this->_id); 

		$query = $this->db->get(); 

		if($query->num_rows() > 0)
		{
			//$query->result() is a list of course id's that the specific resident has attended
			foreach($query->result() as $course)
			{
				//so for each courseid, get the name and date of the course
				$query = $this->db->get_where('course', array('id' => $course->course_id)); 
				
				//store them in an array to return to the controller
				$returnArray[$query->result()[0]->name] = $query->result()[0]->date; 
			}
			return($returnArray);
		}
		else
		{
			return $returnArray; 
		}
	}

	/**
	*Submits a new note to the resident_notes database
	*/
	function addNote($id, $note)
	{
		$posted_by = $this->session->userdata('username');


		$data = array(
    			'resident_id' => $id, 
    			'note' => $note, 
    			'posted_by' => $posted_by . "(" . date("Y-m-d") . ")"
    		);

    	$this->db->insert('resident_notes', $data); 

    	return $this->db->affected_rows() > 0;
	}

	/**
    *Helper function, converts PGY 1-5 to start year in YYYY-MM-DD format (where MM-DD is always 07-15)
    *@return date, YYYY-MM-DD
    */

    private function convertStartYear()
    {
    	//figure out what part of the year we are in. Residents year starts in July, so can't just subtract date
    	//if it is between Jul 31 and Dec 31, the current academic year just started, so if a resident is a PGY 2
    	//they started the previous year
    	//Ex. August, 18, 2014. Resident is a PGY 2
    	//Resident went from PGY 1->2 on July 15, 2014. Resident started as PGY 1 on July 15, 2013
    	//but if you subtract 2014 - PGY 2, you get 2012
    	$year = date('Y'); 
    	$currentDate = new DateTime(); 
    	$startYear = new DateTime($year . '-07-15'); 
    	$endYear = new DateTime($year . '12-31');

   		if($currentDate > $startYear && $currentDate <= $endYear)
   		{
   			$programStartYear = date('Y') - ($this->pgy - 1);
   		}
   		else
   		{
   			$programStartYear = date('Y') - ($this->pgy);
   		}

    	//assume a start date of July 15 for all residents, only the year is important to track
    	$programStartYear = $programStartYear . "-07-15"; 

    	return $programStartYear; 
    }

    /**
    *Get all residents with the same last name
    *@return array 
    **/
    function allByLastName($lastName)
	{
		$this->db->like('lastname', $lastName); 
		$query = $this->db->get('resident'); 

		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
	}
}