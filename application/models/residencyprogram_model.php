<?php

/**
* 
*/
class Residencyprogram_model extends CI_Model
{
	//all properties represent fields in the database
	public $program_name; 
	public $total_residents; 
	public $address; 
	public $city; 
	public $state; 
	public $telephone; 
	public $fax; 
	public $website; 
	public $contact_name; 
	public $contact_email; 
	public $contact_phone;
	public $tsm_name; 
	public $tsm_email; 
	public $rep_name; 
	public $rep_email; 
	public $director; 
	public $director_email; 
	public $meded_consultant; 
	
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
	
	//should merge this to return resident program object for all at some point
	function getSpecificProgram($programName)
	{
		//select residency program by name
		$query = $this->db->get_where('residency_program', array('program_name' => $programName));

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}

	function getProgramObject($programName)
	{
		//select residency program by name
		$query = $this->db->get_where('residency_program', array('program_name' => $programName));

		if($query->num_rows() > 0)
		{
			$this->program_name = (!empty($query->row('program_name'))) ? $query->row('program_name') : "No entry";
			$this->total_residents = (!empty($query->row('total_residents'))) ? $query->row('total_residents') : "No entry";
			$this->address = (!empty($query->row('address'))) ? $query->row('address') : "No entry";
			$this->city = (!empty($query->row('city'))) ? $query->row('city') : "No entry";
			$this->state = (!empty($query->row('state'))) ? $query->row('state') : "No entry"; 
			$this->telephone = (!empty($query->row('telephone'))) ? $query->row('telephone') : "No entry";
			$this->fax = (!empty($query->row('fax'))) ? $query->row('fax') : "No entry";
			$this->website = (!empty($query->row('website'))) ? $query->row('website') : "No entry"; 
			$this->contact_name = (!empty($query->row('contact_name'))) ? $query->row('contact_name') : "No entry";
			$this->contact_email = (!empty($query->row('contact_email'))) ? $query->row('contact_email') : "No entry";
			$this->contact_phone = (!empty($query->row('contact_phone'))) ? $query->row('contact_phone') : "No entry";
			$this->tsm_name = (!empty($query->row('tsm_name'))) ? $query->row('tsm_name') : "No entry";
			$this->tsm_email = (!empty($query->row('tsm_email'))) ? $query->row('tsm_email') : "No entry";
			$this->rep_name = (!empty($query->row('rep_name'))) ? $query->row('rep_name') : "No entry"; 
			$this->rep_email = (!empty($query->row('rep_email'))) ? $query->row('rep_email') : "No entry";
			$this->director = (!empty($query->row('director'))) ? $query->row('director') : "No entry";
			$this->director_email = (!empty($query->row('director_email'))) ? $query->row('director_email') : "No entry";
			$this->meded_consultant = (!empty($query->row('meded_consultant'))) ? $query->row('meded_consultant') : "No entry";

			return $this; 
		}
	}

	/**
	*Commits changes to the database.  Everything except program_name, which is the primary key
	*@return boolean
	**/
	function update()
	{
		$data = array('total_residents' => $this->total_residents,
    		'address' => $this->address, 
    		'city' => $this->city, 
    		'state' => $this->state, 
    		'telephone' => $this->telephone,
    		'fax' => $this->fax,
    		'website' => $this->website,
    		'contact_name' => $this->contact_name,
    		'contact_email' => $this->contact_email,
    		'contact_phone' => $this->contact_phone,
    		'tsm_name' => $this->tsm_name,
    		'tsm_email' => $this->tsm_email,
    		'rep_name' => $this->rep_name,
    		'rep_email' => $this->rep_email,
    		'director' => $this->director,
    		'director_email' => $this->director_email,
    		'meded_consultant' => $this->meded_consultant
    		); 

    	$this->db->where('program_name', $this->program_name); 
    	$this->db->update('residency_program', $data); 

    	return $this->db->affected_rows() > 0;
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
}