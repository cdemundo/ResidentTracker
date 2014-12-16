<?php

/**
* 
*/
class Residentall_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function allByLastName($lastName)
	{
		$this->db->like('lastname', $lastName); 
		$query = $this->db->get('resident'); 

		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
	}
}