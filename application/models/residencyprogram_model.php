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
}