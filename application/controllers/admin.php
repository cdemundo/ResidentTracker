<?php

/**
* 
*/
class Admin extends CI_Controller
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

	/**
	*Index function with more descriptive name
	*/
	function loadAdminView()
	{
		//load list of residency programs first, to populate select
		$this->load->model('residencyprogram_model'); 

		$data['residencyProgram'] = $this->residencyprogram_model->getAllResidencyPrograms(); 

		//load list of fellowship programs
		$this->load->model('fellowshipprogram_model');

		$data['fellowshipProgram'] = $this->fellowshipprogram_model->getAllFellowshipPrograms(); 

		$this->load->view('admin/admin_view', $data);
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

	/***
	*Create a resident_model object and calls addResident method after filling properties
	* pulls info from 'resident' table
	**/
	function addResident()
	{
		$this->load->model('resident_model'); 

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['firstName']) && !empty($_POST['lastName'])&& !empty($_POST['startYear']) && !empty($_POST['selectResProgram']))
			{
				//all forms were filled out
				//create a new resident object with only lastName property filled
				$newResident = $this->resident_model->byLastName($_POST['lastName']);

				$newResident->firstName = $_POST['firstName'];
				if(!empty($_POST['resEmail']))
				{
					$newResident->email = $_POST['resEmail'];
				}
				if(!empty($_POST['resPhone']))
				{
					$newResident->telephone = $_POST['resPhone'];
				}
				$newResident->pgy = $_POST['startYear'];
				$newResident->programName = $_POST['selectResProgram'];

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
	function checkExistResident($lastName="noLastName")
	{
		$this->load->model('resident_model');

		//search for all residents with last name
		$data['allResidents'] = $this->resident_model->allByLastName($lastName);
		$this->load->view('admin/multResFound_view', $data);
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
			$this->load->view('admin/modal/removeResidentModalContent_view.php', $data);
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
			$this->load->view('admin/modal/updateResidentModalContent_view.php', $data);
		}
	}

	/*
	*Load data into a modal via an ajax call to represent a residency program in the database
	*/
	function checkUpdateProgram()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['selectResProgram']))
			{
				$this->load->model('residencyprogram_model');

				$data['residencyProgram'] = $this->residencyprogram_model->getProgramObject($_POST['selectResProgram']); 

				//this is to load the state dropdown with the necessary state selected

				$data['states'] = array('AL'=>"Alabama",'AK'=>"Alaska",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut",'DE'=>"Delaware",'DC'=>"District Of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'HI'=>"Hawaii",'ID'=>"Idaho",'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa",  'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland", 'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York",'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma", 'OR'=>"Oregon",'PA'=>"Pennsylvania",'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah",'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");
				
				$this->load->view('admin/modal/updateProgramModalContent_view', $data);
			}
		}
		else
		{
			$this->load->view("error/error");
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

	/*
	*Checks to see if user submitted any changes to update residency program
	*/
	function updateProgram()
	{
		$this->load->model('residencyprogram_model'); 

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$required = array('login', 'password', 'confirm', 'name', 'phone', 'email');

			//PROGRAM NAME IS EMPTY - fix that with hidden field
			//if no entry in db, they should be a "No entry", so check for !empty on all of them
			if(!empty($_POST['program_name']) && !empty($_POST['total_residents']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['telephone'])
				&& !empty($_POST['fax']) && !empty($_POST['contact_name']) && !empty($_POST['contact_email']) && !empty($_POST['contact_phone']) && !empty($_POST['tsm_name']) && !empty($_POST['tsm_email'])
				&& !empty($_POST['rep_name']) && !empty($_POST['rep_email']) && !empty($_POST['director']) && !empty($_POST['director_email']) && !empty($_POST['meded_consultant']))
			{
				$programToUpdate = $this->residencyprogram_model->getProgramObject($_POST['program_name']);

				//see if user changed any values and update them if so
				if ($programToUpdate->total_residents != $_POST['total_residents'])
				{
					$programToUpdate->total_residents = $_POST['total_residents']; 
					$changes = True; 
				}

				if ($programToUpdate->address != $_POST['address'])
				{
					$programToUpdate->address = $_POST['address']; 
					$changes = True; 
				}

				if ($programToUpdate->city != $_POST['city'])
				{
					$programToUpdate->city = $_POST['city']; 
					$changes = True; 
				}

				if ($programToUpdate->state != $_POST['state'])
				{
					$programToUpdate->state = $_POST['state']; 
					$changes = True; 
				}

				if ($programToUpdate->telephone != $_POST['telephone'])
				{
					$programToUpdate->telephone = $_POST['telephone']; 
					$changes = True; 
				}

				if ($programToUpdate->fax != $_POST['fax'])
				{
					$programToUpdate->fax = $_POST['fax']; 
					$changes = True; 
				}

				if ($programToUpdate->contact_name != $_POST['contact_name'])
				{
					$programToUpdate->contact_name = $_POST['contact_name']; 
					$changes = True; 
				}

				if ($programToUpdate->contact_email != $_POST['contact_email'])
				{
					$programToUpdate->contact_email = $_POST['contact_email']; 
					$changes = True; 
				}

				if ($programToUpdate->contact_phone != $_POST['contact_phone'])
				{
					$programToUpdate->contact_phone = $_POST['contact_phone']; 
					$changes = True; 
				}

				if ($programToUpdate->tsm_name != $_POST['tsm_name'])
				{
					$programToUpdate->tsm_name = $_POST['tsm_name']; 
					$changes = True; 
				}

				if ($programToUpdate->tsm_email != $_POST['tsm_email'])
				{
					$programToUpdate->tsm_email = $_POST['tsm_email']; 
					$changes = True; 
				}

				if ($programToUpdate->rep_name != $_POST['rep_name'])
				{
					$programToUpdate->rep_name = $_POST['rep_name']; 
					$changes = True; 
				}

				if ($programToUpdate->rep_email != $_POST['rep_email'])
				{
					$programToUpdate->rep_email = $_POST['rep_email']; 
					$changes = True; 
				}

				if ($programToUpdate->director != $_POST['director'])
				{
					$programToUpdate->director = $_POST['director']; 
					$changes = True; 
				}

				if ($programToUpdate->director_email != $_POST['director_email'])
				{
					$programToUpdate->director_email = $_POST['director_email']; 
					$changes = True; 
				}

				if ($programToUpdate->meded_consultant != $_POST['meded_consultant'])
				{
					$programToUpdate->meded_consultant = $_POST['meded_consultant']; 
					$changes = True; 
				}

				if($programToUpdate->update())
				{
					$data['successHeading'] = "Program Updated"; 
					$data['successMessage'] = $_POST['program_name'] . " was successfully updated"; 
				}
				else
				{
					if($changes)
					{
						$data['errorHeading'] = "Sorry!";
						$data['errorMessage'] = "Program could not be updated. Please try again or contact support."; 
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
				print_r($_POST);
				exit; 
				$data['errorHeading'] = "Sorry!";
				$data['errorMessage'] = "Please make sure all fields were filled out."; 
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

	//FELLOW FUNCTIONS BELOW HERE

	/**
	*Checks to see if fellow with the same lastname and program_name exists already.  Opens a confirm model if so and displays 
	*the fellows found with the same last name.  If user confirms they still want to add, tries to add to database
	*
	*If no fellow exists with same last name/program_name on initial call, tries to add fellow to db
	*/
	function addFellow()
	{
		$this->load->model('fellow_model'); 
		$this->load->model('fellowshipprogram_model'); 

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['firstname']) && !empty($_POST['lastname'])&& !empty($_POST['year_attended']) && !empty($_POST['selectFelProgram']))
			{
				//if a fellow with the same last name existed the first time user tried to add, a confirm modal opens up. if users
				//confirms they still want to add, resubmits with POST['confirmAddFel'] as TRUE
				if(!empty($_POST['confirmAddFel']))
				{	
					//create a new fellow object and add
					$newFellow = $this->fellow_model->byLastName($_POST['lastname']);

					$newFellow->firstname = $_POST['firstname'];
					if(!empty($_POST['felEmail']))
					{
						$newFellow->email = $_POST['felEmail'];
					}
					if(!empty($_POST['felPhone']))
					{
						$newFellow->telephone = $_POST['felPhone'];
					}

					$newFellow->year_attended = $_POST['year_attended'];
					
					$newFellow->program_name = $_POST['selectFelProgram'];

					if($newFellow->addFellow())
					{ 
						$data['successHeading'] = "Fellow Added"; 
						$data['successMessage'] = $newFellow->firstname . " " . $newFellow->lastname . " was added."; 
						$this->load->view("admin/adminform_success", $data); 
					}
					else
					{
						$data['errorHeading'] = "Fellow Not Added"; 
						$data['errorMessage'] = "Fellow could not be added, please try again."; 
					}

				}
				else //lets do a check to see if the fellow exists already
				{
					//all forms were filled out
					//create a new fellow object with only lastName property filled
					$newFellow = $this->fellow_model->byLastName($_POST['lastname']);

					$newFellow->firstname = $_POST['firstname'];
					if(!empty($_POST['felEmail']))
					{
						$newFellow->email = $_POST['felEmail'];
					}
					if(!empty($_POST['felPhone']))
					{
						$newFellow->telephone = $_POST['felPhone'];
					}

					$newFellow->year_attended = $_POST['year_attended'] . "-07-01";
					
					$newFellow->program_name = $_POST['selectFelProgram'];

					//check if fellow exists in DB. Returns False if does not exist - returns array of fellows if something found
					//Searches based on lastname and program_name
					$existingFellows = $newFellow->doIExist();

					if($existingFellows == false)
					{
						if($newFellow->addFellow())
						{ 
							$data['successHeading'] = "Fellow Added"; 
							$data['successMessage'] = $newFellow->firstname . " " . $newFellow->lastname . " was added."; 
							$this->load->view("admin/modal/successModal_view", $data); 
						}
						else
						{
							$data['errorHeading'] = "Fellow Not Added"; 
							$data['errorMessage'] = "Fellow could not be added, please try again."; 
							$this->load->view("admin/modal/successModal_view", $data); 
						}
					}
					else
					{
						$data['newFellow'] = $newFellow;

						foreach ($existingFellows as $fellow)
						{
							$fellow->program_name = $this->fellowshipprogram_model->getProgramByID($fellow->program_name); 
						}

						$data['existingFellows'] = $existingFellows;
						$this->load->view('admin/multFellowsFound_view', $data); 
					}
				}
			}
			else
			{
				$data['errorHeading'] = "Form not filled out"; 
				$data['errorMessage'] = "All fields were not filled out, fellow could not be created."; 
				$this->load->view("admin/modal/successModal_view", $data); 

			}
		}
	}

	/**
	*Checks if a resident exists in the database and loads a confirmation page where user can double check if they want to remove or update
	*Displays info in a modal
	*/
	function checkExistFellow($lastName="noLastName")
	{
		$this->load->model('fellow_model');
		$this->load->model('fellowshipprogram_model');

		//search for all fellows with last name
		$data['allFellows'] = $this->fellow_model->allByLastName($lastName);

		if(!empty($data['allFellows']))
		{
			foreach ($data['allFellows'] as $fellow)
			{
				$fellow->program_name = $this->fellowshipprogram_model->getProgramByID($fellow->program_name); 
			}
		}

		$this->load->view('admin/multFelFound_view', $data);
	}

	/**
	*Checks if user wants to delete the resident that was selected after checkExistFellow
	*/
	function checkRemoveFellow($id)
	{
		$this->load->model('fellow_model'); 

		if($id > 0)
		{
			$data['fellow'] = $this->fellow_model->loadByID($id); 
			$this->load->view('admin/modal/removeFellowModalContent_view.php', $data);
		}

	}

	/**
	*If user confirmed after checkRemoveFellow, delete fellow from db
	*/
	function removeFellow()
	{
		$this->load->model('fellow_model');

		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['fellowID']))
			{
				$fellowToRemove = $this->fellow_model->loadByID($_POST['fellowID']); 

				if($fellowToRemove->remove())
				{
					$data['successHeading'] = "Fellow Removed"; 
					$data['successMessage'] = $fellowToRemove->firstname . " " . $fellowToRemove->lastname . " was successfully removed"; 
				}
				else
				{
					$data['errorHeading'] = "Fellow not removed.";
					$data['errorMessage'] = "Fellow could not be removed. Please try again or contact support."; 
				} 

				$this->load->view("admin/adminform_success", $data); 
			}
		}
	}

	/**
	*Load a page with user's info and allow it to be edited/updated to database
	*/
	function checkUpdateFellow($id)
	{
		$this->load->model('fellow_model'); 

		if($id > 0)
		{
			$data['fellow'] = $this->fellow_model->loadByID($id); 
        
			$this->load->view('admin/modal/updateFellowModalContent_view.php', $data);
		}
	}

	function updateFellow()
	{
		$this->load->model('fellow_model'); 

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

	/*
	*Load data into a modal via an ajax call to represent a fellowship program in the database
	*/
	function checkFellowProgram($type)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(!empty($_POST['selectFelProgram']))
			{
				$this->load->model('fellowshipprogram_model');

				$data['residencyProgram'] = $this->fellowshipprogram_model->getSpecificProgram($_POST['selectFelProgram'], $type); 

				//this is to load the state dropdown with the necessary state selected

				$data['states'] = array('AL'=>"Alabama",'AK'=>"Alaska",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut",'DE'=>"Delaware",'DC'=>"District Of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'HI'=>"Hawaii",'ID'=>"Idaho",'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa",  'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland", 'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York",'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma", 'OR'=>"Oregon",'PA'=>"Pennsylvania",'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah",'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");
				
				$this->load->view('admin/modal/updateFellowProgramModal_view', $data);
			}
		}
		else
		{
			$this->load->view("error/error");
		}
	}

	/**
	*Returns a list of fellowship programs in a html select in a view
	*/
	function getFellowshipPrograms($type)
	{
		$this->load->model('fellowshipprogram_model'); 

		$data['fellowshipPrograms'] = $this->fellowshipprogram_model->fellowshipProgramsByType($type); 

		$this->load->view('fellowship_program/fellowshipprogram_bytype_view', $data); 
	}
}