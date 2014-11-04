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

	function residencyProgramsByState($state)
	{
		//select all residency programs in $state
		$query = $this->db->get_where('residency_program', array('state' => $state));

		if($query->num_rows() > 0)
		{
			return $query->result(); 
		}
	}
}