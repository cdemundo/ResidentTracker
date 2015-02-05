<?php 

/**
* 
*/
class Residents extends CI_Controller
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

	function loadSearchView()
	{
		$this->load->view('search_view');
	}

	function lastNameSearch($lastName)
	{
		$this->load->model('resident_model');

		$data['allResidents'] = $this->resident_model->allByLastName($lastName); 

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
		$data['admin'] = $this->session->userdata('is_admin'); //returns false if empty

		$this->load->view('residents/resident_view.php', $data);
	}

	/*******************************************
	Following functions are used for adding courses to a residents page
	    loadAddResidentCourseView
	    findCourse
	    addResidentToCourse
	*******************************************/

	/*
	*Load view to select courses to add to resident profile.  Passes ResidentID
	*/

	function loadAddResidentCourseView($residentID)
	{
		$data['id'] = $residentID; 
		$this->load->view('admin/addResidentToCourse_view', $data); 
	}

	/*
	*Search for courses based on course name inputted by user
	*/

	function findCourse($courseName, $residentID)
	{
		$this->load->model('course_model');

		if(!empty($courseName))
		{
			$data['courses'] = $this->course_model->getCourses($courseName); 
			$data['id'] = $residentID; 

			$this->load->view('admin/coursesFound_view', $data); 
		}
	}

	/*
	*Takes courseID as a $_POST variable and $residentID via url to add to courses_attended db
	*If no error, loads residents page, where updated course should show
	*/
	function addResidentToCourse($residentID)
	{
		$this->load->model('course_model');

		if(!empty($_POST['selectCourse']) && !empty($residentID))
		{
			if($this->course_model->addResident($_POST['selectCourse'], $residentID))
			{
				//load the resident's page, which should now have the courses added
				$this->getResident($residentID);
			} 
			else
			{
				$this->load->view('error/error');
			}
		}
	}

	/************************************************
	 Following functions are used for adding notes to a residents page
	    addNote
	*************************************************/

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