<?php

/**
* 
*/
class Fellowshipprogram extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');

		if(!$this->login_model->isLoggedIn())
		{
			redirect('login');
		}
	}

	function loadFellowshipView()
	{
		$this->load->view('fellowship_program/fellowshipprogram_view');
	}
}