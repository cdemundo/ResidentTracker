<?php

/**
* 
*/
class Fellow_model extends CI_Model
{
	//each of these are a field in the database
	private $_id; 

	public $firstname;
	public $lastname; 
	public $program_name; //the name of the residency program
	public $year_attended;
	public $email; 
	public $telephone; 
	//public $notes = array(); //array of notes, key is posted_by, value is note
	
	function __construct()
	{
		parent::__construct(); 
	}

	/*
	*Getter/setter for $_id
	*/
	public function getID() {
        return $this->_id;
    }

    public function setID($id){
    	$this->_id = $id; 
    }

    /**
    *Commit a fellow object to the database
    *@return boolean
    **/
    public function addFellow()
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
    			'firstname' => $this->firstname, 
    			'lastname' => $this->lastname, 
    			'program_name' => $this->program_name, 
    			'year_attended' => $this->year_attended, 
    			'email' => $this->email, 
    			'telephone' => $this->telephone
    		);

    	$this->db->insert('fellow', $data); 

    	return $this->db->affected_rows() > 0;
    }

    /**
    *Get all Fellows with the same last name
    *@return array 
    **/
    public function allByLastName($lastName)
	{
		$this->db->like('lastname', $lastName); 
		$query = $this->db->get('fellow'); 

		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
	}

    /***
	*Create a new fellow object with only last name populated
	***/ 

	public function byLastName($lastname) 
	{
    	$this->lastname = $lastname;
    	return $this; 
    }

    /**
    *Check if resident exists in database
    *Return list of residents if same last name+ program is found
    *@return boolean or array 
    **/
    public function doIExist()
    {
    	$this->db->like('lastname', $this->lastname); 
    	$this->db->like('program_name', $this->program_name); 
    	
    	$query = $this->db->get('fellow'); 

		if($query->num_rows() == 0)
		{
			return false; 
		} 
		else
		{
			return $query->result(); 
		}
    }

    /*******
	*Gets all courses a resident has attended
	*	SELECT course_id FROM courses_attended
	*	INNER JOIN resident
	*	ON courses_attended.resident_id = resident.id
	*	WHERE resident.id = ?
	********/

	public function getCourses()
	{
		$returnArray = array(); 

		//initial portion gets the course ID for each course the resident has attended from course_attended table
		$this->db->select('course_id');
		$this->db->from('courses_attended');
		$this->db->join('fellow', 'courses_attended.fellow_id = fellow.id');
		$this->db->where('fellow.id', $this->_id); 

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
    *Take a fellow's id and create a fellow_model object populated with the info in the db for that fellow
    *@return fellow_model Object
    */
	public function loadByID($id)
	{
		$this->load->model('fellowshipprogram_model'); //used to get programname

		$query = $this->db->get_where('fellow', array('id' => $id));

		$this->_id = $id; 		
		$this->firstname = $query->row()->firstname; 
		$this->lastname = $query->row()->lastname; 
		$this->program_name = $this->fellowshipprogram_model->getProgramByID($query->row()->program_name); //program_name is foreign key to fellowship_program ID
		$this->year_attended = $query->row()->year_attended; 
		$this->email = $query->row()->email; 
		$this->telephone = $query->row()->telephone; 

		return $this; 
	}

	/**
    *Remove a fellow from the database
    *@return boolean
    **/

    public function remove()
    {
    	//foreign key between the two, have to delete any courses first
    	$this->db->delete('courses_attended', array('fellow_id' => $this->_id));

    	$this->db->delete('fellow', array('id' => $this->_id));

    	return $this->db->affected_rows() > 0; 
    }
}