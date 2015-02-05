<?php

/**
* Controller for interacting with specific fellow objects
*/
class Fellows extends CI_Controller
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

	function lastNameSearch($lastName)
	{
		$this->load->model('fellow_model');
		$tempArray = array(); 

		$ids = $this->fellow_model->allByLastName($lastName); //returns array of ids
		$length = count($ids);

		for ($i = 0; $i < $length; $i++)
		{
			
			$fellow = $this->fellow_model->loadByID($ids[$i]);
			$tempArray[$ids[$i]] = $fellow->firstname . " " . $fellow->lastname . " - " . $fellow->program_name; 
		}

		$data['allFellows'] = $tempArray; 
		$this->load->view('fellows/fellowSearchResults_view', $data); 

	}

	function getFellow($fellowID = "")
	{
		//submitted via post value from fellowSearchResults_view.php
		if(!empty($_POST['selectFellow']))
		{
			$fellowID = $_POST['selectFellow']; 
		}
		
		$this->load->model('fellow_model'); 

		$theFellow = $this->fellow_model->loadByID($fellowID); 

		//an array of courses attended - array[courseName] = date
		$data['coursesAttended'] = $theFellow->getCourses(); 

		$data['fellow'] = $theFellow; 

		//check if user is an admin to show admin only buttons
		$data['admin'] = $this->session->userdata('is_admin'); //returns false if empty

		$this->load->view('fellows/fellow_view.php', $data);
	}
}