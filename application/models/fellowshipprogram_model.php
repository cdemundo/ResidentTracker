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

	/**
	*Returns an object with properties representing a row in db for fellowship program
	*@return fellowshipprogram_model object
	**/ 
	function getSpecificProgram($programName, $type)
	{
		$query = $this->db->get_where('fellowship_program', array('program_name' => $programName, 'type' => $type));

		if($query->num_rows() > 0)
		{
			$program = $query->row();

			$this->program_name = $program->program_name; //there should always be a program name
			$this->city = (!empty($program->city)) ? $program->city : "No entry";
			$this->state = (!empty($program->state)) ? $program->state : "No entry"; 
			$this->director = (!empty($program->director)) ? $program->director : "No entry";
			$this->type = (!empty($program->type)) ? $program->type : "No entry";
			$this->start = (!empty($program->start)) ? $program->start : "No entry";
			$this->total_number = (!empty($program->total_number)) ? $program->total_number : "No entry";
			$this->contact = (!empty($program->contact)) ? $program->contact : "No entry";
			$this->contact_phone = (!empty($program->contact_phone)) ? $program->contact_phone : "No entry";
			$this->contact_email = (!empty($program->contact_email)) ? $program->contact_email : "No entry";
		}
		return $this; 
	}

	function fellowshipProgramsByType($type)
	{
		//select all residency programs in $state
		$this->db->select('program_name');
		$query = $this->db->get_where('fellowship_program', array('type' => $type));

		if($query->num_rows() > 0)
		{
			return $query->result(); 
		}
	}

	/**
	* Used to filled dropdown list on Admin tools 
	* @return array
	**/
	function getAllFellowshipPrograms()
	{
		$this->db->select('program_name, type, id');
		$this->db->order_by('program_name', 'asc'); 
		$query = $this->db->get('fellowship_program'); 

		if ($query->num_rows() > 0)
		{
			return $query->result(); 
		}
	}

	/**
	*Used from the main Fellowship Programs page when JS map is clicked on
	*@return array
	**/
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

	/**
	*Returns program name when given ID
	*@return string
	**/
	function getProgramByID($id)
	{
		$this->db->select('program_name');
		$query = $this->db->get_where('fellowship_program', array('id' => $id)); 

		return $query->row()->program_name; 
	}
}