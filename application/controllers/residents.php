<?php 

/**
* 
*/
class Residents extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function loadResidentsView()
	{
		$this->load->view('residents/residents_view');
	}

	function lastNameSearch($lastName)
	{
		$this->load->model('residentall_model');

		$data['allResidents'] = $this->residentall_model->allByLastName($lastName); 

		$this->load->view('residents/residentSearchResults_view', $data); 

	}

	/*******
	*Loads a page that represents a specific resident
	*******/
	function getResident($residentID = "")
	{
		//submitted via post value from residentsSearchResults_view.php
		if(!empty($_POST['selectRes']))
		{
			$residentID = $_POST['selectRes']; 
		}
		
		$this->load->model('resident_model'); 

		$theResident = $this->resident_model->loadByID($residentID); 

		//an array of courses attended - array[courseName] = date
		$data['coursesAttended'] = $theResident->getCourses(); 

		$data['resident'] = $theResident; 

		//check if user is an admin to show admin only buttons
		$data['admin'] = $this->tank_auth->is_admin(); 

		$this->load->view('resident_view.php', $data);
	}

	function findCourse($courseName)
	{
		$this->load->model['course_model']; 

		if(!empty($_POST['residentID']))
		{
			$data['id'] = $_POST['residentID']; 

			$data['courses'] = $this->course_model->getCourses($courseName); 

			$this->load->view('addResidentToCourse_view', $data); 
		}
	}

	function addNote($residentID)
	{
		if(!empty($residentID))
		{
			$this->load->model('resident_model'); 
			
			if(!empty([$_POST['newNote']]))
			{
				if($this->resident_model->addNote($residentID, $_POST['newNote']))
				{
					$this->getResident($residentID);  
				} 
			}
		}
		else
		{
			$this->load->view('error/error');
		}
	}


}