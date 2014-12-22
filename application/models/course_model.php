<?php

/**
* 
*/
class Course_model extends CI_Model
{
	private $_id; 
	public $name; 
	public $description; 
	public $startDate; 

	function __construct()
	{
		parent::__construct();
	}

	/**
	*Create a new course object with provided name, description, startDate
	*@return Course_model object
	**/
	function newCourse($name, $description, $startDate)
	{
		$this->name = $name; 
		$this->description = $description; 
		$this->startDate = $startDate; 

		return $this; 
	}

	/**
    *Commit a course object to the database
    *@return boolean
    **/
    public function add()
    {
    	$data = array(
    			'name' => $this->name, 
    			'description' => $this->description, 
    			'date' => $this->startDate, 
    		);

    	$this->db->insert('course', $data); 

    	return $this->db->affected_rows() > 0;
    }

    public function getCourses($courseName)
    {
    	$this->db->like('name', $courseName); 
		$query = $this->db->get('course'); 

		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    }
}