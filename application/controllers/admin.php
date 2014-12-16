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
					$data['resident'] = $this->resident_model->loadByID($id); 
					//ajax can come from update or remove.. remove sets a value to $_POST['remove']
					if(isset($_POST['remove']))
					{
						$this->load->view('admin/removeResidentModalContent_view.php', $data); 
					}
					else
					{
						$this->load->view('admin/updateResidentModalContent_view.php', $data); 
					}
				}
				else
				{
					$data['errorHeading'] = "Not found."; 
					$data['errorMessage'] = "A resident was not found with the last name " . $_POST['resLastName'];
					$this->load->view("admin/removeResidentModalContent_view.php", $data);
				}
			}
			else
			{
				echo "<h4>Please enter a resident to search for.</h4>";
			}
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
			if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['resEmail']) && !empty($_POST['startYear']) && !empty($_POST['resPhone']) && !empty($_POST['residentID']))
			{
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

				if ($residentToUpdate->pgy != $_POST['startYear'])
				{
					$residentToUpdate->pgy = $_POST['startYear']; 
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
		}

	}

	

}