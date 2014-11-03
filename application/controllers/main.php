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
			$this->load->view('main_view');
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