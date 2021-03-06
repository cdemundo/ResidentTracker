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

    /** Creates and returns a course_model object, taking ID as parameter
    *@parameter id
    *@return object
    **/
    function loadCourseByID($id)
    {
        $query = $this->db->get_where('course', array('id' => $id));

        if($query->num_rows > 0)
        {
            $this->name = $query->row()->name; 
            $this->description = $query->row()->description;
            $this->startDate = $query->row()->date; 
        }

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

    public function addResident($courseID, $residentID, $date)
    {
    	$data = array(
    			'resident_id' => $residentID, 
    			'course_id' => $courseID, 
                'year_attended' => $date,
    		);

    	$this->db->insert('courses_attended', $data);

    	return $this->db->affected_rows() > 0;  
    }
}