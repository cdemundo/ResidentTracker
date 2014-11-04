<?php

/**
* 
*/
class Stateinfo extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getStateInfo()
	{
		if(isset($_POST['state']))
		{
			$state = $_POST['state'];

			$this->load->model('stateinfo_model'); 

			$data = array();
			$tempData = array();  

			$data = $this->stateinfo_model->residencyProgramsByState($state);

			foreach($data->result() as $row)
			{
				$tempData[] = $row; 
			}

			print_r($tempData); 
		}
	}
}