<?php

/**
* 
*/
class Residencyprogram_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getAllResidencyPrograms()
	{
		$this->db->select('program_name, state, director');
		$query = $this->db->get('residency_program'); 

		if ($query->num_rows() > 0)
		{
			return $query->result(); 
		}
	}

	function residencyProgramsByState($state)
	{
		//select all residency programs in $state
		$this->db->select('program_name, state, director');
		$query = $this->db->get_where('residency_program', array('state' => $state));

		if($query->num_rows() > 0)
		{
			return $query->result(); 
		}
	}
	
	function getSpecificProgram($programName)
	{
		//select residency program by name
		$query = $this->db->get_where('residency_program', array('program_name' => $programName));

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}

	/*****
	* This would be used with getSpecificProgram, list of residents that go with the specific program
	******/
	function getAlumni($programName)
	{
		$query = $this->db->get_where('resident', array('program_name' => $programName)); 

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}

	/*******
	*From resident table, get info about a specific resident 
	********/
	function resident($residentID)
	{
		$query = $this->db->get_where('resident', array('id' => $residentID)); 

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
	}

	/*******
	*Gets all courses a resident has attended
	*	SELECT course_id FROM courses_attended
	*	INNER JOIN resident
	*	ON courses_attended.resident_id = resident.id
	*	WHERE resident.id = ?
	********/

	function getCourses($residentID)
	{
		$returnArray = array(); 

		//initial portion gets the course ID for each course the resident has attended from course_attended table
		$this->db->select('course_id');
		$this->db->from('courses_attended');
		$this->db->join('resident', 'courses_attended.resident_id = resident.id');
		$this->db->where('resident.id', $residentID); 

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