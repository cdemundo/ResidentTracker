<?php

/**
* 
*/
class Fellowshipprogram_model extends CI_Model
{
	//all properties represent fields in the database
	public $program_name; 
	public $city; 
	public $state; 
	public $director; 
	public $type; 
	public $start; 
	public $total_number; 
	public $contact; 
	public $contact_phone;
	public $contact_email; 

	function __construct()
	{
		parent::__construct();
	}

	function getSpecificProgram($programName)
	{
		//select residency program by name
		$query = $this->db->get_where('fellowship_program', array('program_name' => $programName));

		if($query->num_rows() > 0)
		{
			$program = $query->result();

			$this->program_name = $program->program_name; 
		}

		return $this; 
	}

	function fellowshipProgramsByState($state, $type)
	{
		//select all residency programs in $state
		$this->db->select('program_name, state, director');
		$query = $this->db->get_where('fellowship_program', array('state' => $state, 'type' => $type));

		if($query->num_rows() > 0)
		{
			return $query->result(); 
		}
	}

	function getProgramsByType($type)
	{

	}
}