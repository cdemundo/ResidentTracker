<?php

/**
* 
*/
class Main extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
	}

	function index()
	{
		if($this->tank_auth->is_logged_in())
		{
			//initialize a list of all residency programs below the map
			$this->load->model('residencyprogram_model'); 

			$data = array();

			//each index in data is a row of program_name, state, director
			$data['residencyProgram'] = $this->residencyprogram_model->getAllResidencyPrograms();

			$this->load->view('main_view', $data);
		}
		else
		{
			redirect('/auth/login', '');
		}
	}

	function logout()
	{
		$this->tank_auth->logout(); 
		redirect('/auth/login', '');
	}
}