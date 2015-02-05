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
	*Getter for $_id
	*/
	public function getID() {
        return $this->_id;
    }

	function loadByID($id)
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
    *Get all residents with the same last name
    *@return array 
    **/
    function allByLastName($lastName)
	{
		$returnArray = array(); 

		$this->db->like('lastname', $lastName); 
		$query = $this->db->get('fellow'); 

		if($query->num_rows() > 0)
    	{
    		foreach ($query->result() as $row)
    		{
    			$returnArray[] = $row->id; 
    		}
    		return $returnArray; 
    	}
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
}