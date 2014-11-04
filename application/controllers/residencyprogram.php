<?php

/**
* 
*/
class Residencyprogram extends CI_Controller
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

			$this->load->model('residencyprogram_model'); 

			$data = array();

			$data['residencyProgram'] = $this->residencyprogram_model->residencyProgramsByState($state);

			$this->load->view("residencyprogram_view", $data);
		}
	}
}