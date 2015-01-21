<?php

/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if(!empty($this->session->userdata('username')))
		{
			//initialize a list of all residency programs below the map
			$this->load->model('residencyprogram_model'); 

			$data = array();

			//each index in data is a row of program_name, state, director
			$data['residencyProgram'] = $this->residencyprogram_model->getAllResidencyPrograms();

			$this->load->view('main_view');
		}
		else
		{
			$this->load->view('login_view');
		}
	}

	function authenticate()
	{
		//comes from login_view.php
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['username']) && !empty($_POST['password']))
			{
				$this->load->model('login_model');

				if($this->login_model->login($_POST['username'], $_POST['password']))
				{
					//initialize a list of all residency programs below the map
					$this->load->model('residencyprogram_model'); 

					//each index in data is a row of program_name, state, director
					$data['residencyProgram'] = $this->residencyprogram_model->getAllResidencyPrograms();

					$this->load->view('main_view', $data);
				}
				else
				{
					$data['error'] = true; 
					$this->load->view('login_view', $data);
				}
			}
		}
		else
		{
			//user landed directly on page without coming from login_view
			$this->load->view('login_view');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('login_view'); 
	}
}