<?php

/**
* 
*/
class Residencyprogram extends CI_Controller
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

	/* Gets $_POST['state'], which is a state abbreviation, from the main_view
     * Loads residency program model->programsbystate to get all residency programs in that state
	 * Loads residencyprogram_view - ajax to change residency program info when user clicks on different states
	 */
	function getStateInfo()
	{
		//Check if $_POST is initialized
		if(isset($_POST['state']))
		{
			$state = $_POST['state'];

			//pass data to model
			$this->load->model('residencyprogram_model'); 

			$data = array();

			//each index in data is a row of program_name, state, director
			$data['residencyProgram'] = $this->residencyprogram_model->residencyProgramsByState($state);

			//pass to view
			$this->load->view("residency_program/resprogramsbystate_view", $data);
		}
	}

	/*****
	*Loads a page that represents a specific residency program
	*****/
	function getProgram($programName)
	{
		//pass data to model
		$this->load->model('residencyprogram_model');

		$data = array();

		//each index in data is a row of address, city+state, telephone, fax, contact, contact-email
		//director, director email and alumni
		$data['residencyProgram'] = $this->residencyprogram_model->getSpecificProgram(urldecode($programName));

		//this is to get alumni data
		$residents = $this->residencyprogram_model->getAlumni(urldecode($programName));

		//get the current year and the 4 previous
		for ($i = 1; $i <= 5; $i++)
		{
			//$years will be an array of arrays
			//$years[pgyYear][residentName] = residentID, and so on
			$years[$i] = array();
			
			if(!empty($residents))
			{
				//foreach resident, check if the start year matches the current year in the loop
				foreach($residents as $resident)
				{
					$resStartDate = new DateTime($resident->program_start_year); 
					$currentDate = new DateTime(); 

					//figure out what year the resident is
					$diff = $currentDate->diff($resStartDate)->format("%a");
					$mod = $diff / 365;

					if($mod > 0 && $mod < 1)
					{
						$pgy = 1; 
					}

					if($mod > 1 && $mod < 2)
					{
						$pgy = 2; 
					}

					if($mod > 2 && $mod < 3)
					{
						$pgy = 3; 
					}

					if($mod > 3 && $mod < 4)
					{
						$pgy = 4; 
					}

					if($mod > 4 && $mod < 5)
					{
						$pgy = 5; 
					}

					if($mod > 5)
					{
						$pgy = "Archived"; 
					}

					//if the resident is in the current year we are looping through, add them
					if($pgy == $i)
					{
					 	$years[$i][$resident->firstname . " " . $resident->lastname] = $resident->id;
					}
				}
			}
		}

		$data['residents'] = $years; 

		$this->load->view('residency_program/residencyprogram_view', $data);
	}
}