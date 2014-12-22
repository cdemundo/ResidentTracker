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
					$data['successHeading'] = "Resident Added"; 
					$data['successMessage'] = $newResident->firstName . " " . $newResident->LastName . " was added as a PGY " . $newResident->pgy . " to " . $newResident->programName; 
				}
				else
				{
					$data['errorHeading'] = "Resident Not Added"; 
					$data['errorMessage'] = "Resident could not be added, please try again."; 
				}
			}
			else
			{
				$data['errorHeading'] = "Form not filled out"; 
				$data['errorMessage'] = "All fields were not filled out, resident could not be created."; 
			}

			$this->load->view("admin/adminform_success", $data); 
		}
	}

	/**
	*Checks if a resident exists in the database and loads a confirmation page where user can double check if they want to remove or update
	*Displays info in a modal
	*/
	function checkExistResident()
	{
		$this->load->model('resident_model');
		$this->load->model('residentall_model'); 

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['resLastName']))
			{
				//search for all residents with last name
				$data['allResidents'] = $this->residentall_model->allByLastName($_POST['resLastName']);
				$this->load->view('admin/multResFound_view', $data);
			}
			else
			{
				echo "<h4>Please enter a resident to search for.</h4>";
			}
		}
	}

	/**
	*Load a confirmation page with the residents information and ask user to confirm before deleting
	*/
	function checkRemoveResident($id)
	{
		$this->load->model('resident_model'); 

		if($id > 0)
		{
			$data['resident'] = $this->resident_model->loadByID($id); 
			$this->load->view('admin/removeResidentModalContent_view.php', $data);
		}

	}

	/**
	*Load a page with user's info and allow it to be edited/updated to database
	*/
	function checkUpdateResident($id)
	{
		$this->load->model('resident_model'); 

		if($id > 0)
		{
			$data['resident'] = $this->resident_model->loadByID($id); 
			$this->load->view('admin/updateResidentModalContent_view.php', $data);
		}
	}

	/**
	*Removes a resident from the database and loads a confirmation page
	*/
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
					$data['successHeading'] = "Resident Removed"; 
					$data['successMessage'] = $residentToRemove->firstName . " " . $residentToRemove->lastName . " was successfully removed"; 
				}
				else
				{
					$data['errorHeading'] = "Resident not removed.";
					$data['errorMessage'] = "Resident could not be removed. Please try again or contact support."; 
				} 

				$this->load->view("admin/adminform_success", $data); 
			}
		}
	}

	function updateResident()
	{
		$this->load->model('resident_model'); 

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['resEmail']) && !empty($_POST['resPhone']) && !empty($_POST['residentID']))
			{
				if(empty($_POST['startYear']))
				{
					$start = " (Archived)"; 
				}
				else
				{
					$start = $_POST['startYear'];
				}

				$residentToUpdate = $this->resident_model->loadByID($_POST['residentID']); 

				//see if user changed any values and update them if so

				if ($residentToUpdate->firstName != $_POST['firstName'])
				{
					$residentToUpdate->firstName = $_POST['firstName']; 
					$changes = True; 
				}

				if ($residentToUpdate->lastName != $_POST['lastName'])
				{
					$residentToUpdate->lastName = $_POST['lastName']; 
					$changes = True; 
				}

				if ($residentToUpdate->email != $_POST['resEmail'])
				{
					$residentToUpdate->email = $_POST['resEmail'];
					$changes = True;  
				}

				if ($residentToUpdate->telephone != $_POST['resPhone'])
				{
					$residentToUpdate->telephone = $_POST['resPhone']; 
					$changes = True; 
				}

				if ($residentToUpdate->pgy != $start)
				{
					$residentToUpdate->pgy = $start; 
					$changes = True; 
				}

				if($residentToUpdate->update())
				{
					$data['successHeading'] = "Resident Updated"; 
					$data['successMessage'] = $residentToUpdate->firstName . " " . $residentToUpdate->lastName . " was successfully updated"; 
				}
				else
				{
					if($changes)
					{
						$data['errorHeading'] = "Sorry!";
						$data['errorMessage'] = "Resident could not be updated. Please try again or contact support."; 
					}
					else
					{
						$data['errorHeading'] = "No changes.";
						$data['errorMessage'] = "You did not make any changes. Please try again.";
					}
				} 

				$this->load->view("admin/adminform_success", $data); 
			}
			else
			{
				$data['errorHeading'] = "Sorry!";
				$data['errorMessage'] = "Please make sure all fields were filled out."; 
				$this->load->view("admin/adminform_success", $data); 
			}
		}

	}

	function addCourse()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['courseName']) && !empty($_POST['courseDesc']) && !empty($_POST['startDate']))
			{
				$this->load->model('course_model'); 
				$newCourse = $this->course_model->newCourse($_POST['courseName'], $_POST['courseDesc'], $_POST['startDate']); 

				if($newCourse->add())
				{
					$data['successHeading'] = "Course Added"; 
					$data['successMessage'] = $newCourse->name . " on " . $newCourse->startDate . " was added to the database.";
				}
				else
				{
					$data['errorHeading'] = "Sorry!";
					$data['errorMessage'] = "There was an error, please try again!."; 
				}

				$this->load->view("admin/adminform_success", $data); 
			}
			else
			{
				$data['errorHeading'] = "Sorry!";
				$data['errorMessage'] = "All fields were not filled out."; 
				$this->load->view("admin/adminform_success", $data);
			}
		}
	}

	

}