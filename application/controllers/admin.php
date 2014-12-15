<?php

/**
* 
*/
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function loadAdminView()
	{
		$this->load->view('admin/admin_view');
	}

	function getAllPrograms()
	{
		//load list of residency programs first
		$this->load->model('residencyprogram_model'); 

		$data['residencyProgram'] = $this->residencyprogram_model->getAllResidencyPrograms(); 

		//fills a html select with all the residency programs, loaded via ajax
		$this->load->view('admin/adminselect_view', $data);
	}

	/***
	**Create a resident_model object and calls addResident method after filling properties
	* pulls info from 'resident' table
	**/
	function addResident()
	{
		$this->load->model('resident_model'); 

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$check_array = array('firstName', 'lastName', 'resEmail', 'startYear', 'resPhone', 'selectRes');
			if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['resEmail']) && !empty($_POST['startYear']) && !empty($_POST['resPhone']) && !empty($_POST['selectRes']))
			{
				//all forms were filled out
				//create a new resident object with only lastName property filled
				$newResident = $this->resident_model->byLastName($_POST['lastName']);

				$newResident->firstName = $_POST['firstName'];
				$newResident->email = $_POST['resEmail'];
				$newResident->pgy = $_POST['startYear'];
				$newResident->telephone = $_POST['resPhone'];
				$newResident->programName = $_POST['selectRes'];

				if($newResident->addResident())
				{ 
					$data['errorState'] = "success"; 
				}
				else
				{
					$data['errorState'] = "error"; 
				}
			}
			else
			{
				$data['errorState'] = "missing";
			}

			$this->load->view("admin/adminform_success", $data); 
		}
	}

	/**
	*Checks if a resident exists in the database and loads a confirmation page where user can double check if they want to remove
	*Could maybe be redone with a modal so loading a separate view is not necessary
	*/
	function checkRemoveResident()
	{
		$this->load->model('resident_model');

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['resLastName']))
			{
				//create empty resident object with last name
				$residentToSearch = $this->resident_model->byLastName($_POST['resLastName']);

				//checkExistResident will return false if the resident is not found, will return the resident id if found
				$id = $residentToSearch->checkExistResident(); 

				if($id > 0)
				{
					$data['residentToRemove'] = $this->resident_model->loadByID($id); 
					$this->load->view('admin/removeResidentModalContent_view.php', $data); 
				}
				else
				{
					$data['errorState'] = "error";
					$this->load->view("admin/adminform_success", $data);
				}
			}
			else
			{
				echo "Please enter a resident to search for.";
				echo "Full error message: No value via POST";  
			}
		}
	}

	function removeResident()
	{
		$this->load->model('resident_model');

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['residentID']))
			{
				$residentToRemove = $this->resident_model->loadByID($_POST['residentID']); 

				if($residentToRemove->remove())
				{
					$data['successMessage'] = $residentToRemove->firstName . " " . $residentToRemove->lastName . " was successfully removed"; 
				}
				else
				{
					$data['errorHeading'] = "Resident not removed.";
					$this->load->view("error/error", $data); 
				} 

				$this->load->view("admin/adminformmodal_success", $data); 
			}
		}
	}

	/**
	*Pulls the information on a resident from a DB and displays for user to update
	*/
	function findResidentToUpdate()
	{
		$this->load->model('resident_model');

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['resLastName']))
			{
				//create empty resident object with last name
				$residentToSearch = $this->resident_model->byLastName($_POST['resLastName']);

				//checkExistResident will return false if the resident is not found, will return the resident id if found
				$id = $residentToSearch->checkExistResident();

				if($id > 0)
				{
					$data['residentToUpdate'] = $this->resident_model->loadByID($id); 
					$this->load->view('admin/updateResidentCheck_view.php', $data); 
				}
			}
		}
	}

}