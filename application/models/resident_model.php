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

	/***
	*This would only be to load a resident from the DB - already know the id
	*Would construct by name to get an empty resident, with just a new name
	****/
	
	function __construct()
	{
		parent::__construct(); 
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
			$yearsSinceStart = date('Y') - $temp->program_start_year; 

			if($yearsSinceStart < 5)
			{
				$this->pgy = (date('Y') - $temp->program_start_year + 1); 
			}
			else
			{
				$this->pgy = "Graduated"; 
			}
		}

		return $this; 
	}

	/***
	*Get resident from DB by last name
		***/ 

	public function byLastName($lastName) 
	{
    	$this->$lastName = "$lastName"; 
    	return $this; 
    }

    /**
    *Insert a resident to the database
    **/
    public function addResident()
    {
    	//calculate date for program start year
    	$programStartYear = date('Y') - ($this->pgy - 1);
    	//assume a start date of July 15 for all residents, only the year is important to track
    	$programStartYear = $programStartYear . "-07-15"; 

    	$data = array(
    			'firstname' = $this->firstName, 
    			'lastname' = $this->lastName, 
    			'program_name' = $this->programName, 
    			'program_start_year' = $programStartYear, 
    			'email' = $this->email, 
    			'telephone' = $this->telephone
    		)

    	$this->db->insert('resident', $data); 
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
}