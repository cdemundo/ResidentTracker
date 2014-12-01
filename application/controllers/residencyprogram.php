<?php

/**
* 
*/
class Residencyprogram extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
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
			$this->load->view("resprogramsbystate_view", $data);
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
		for ($i = 0; $i <= 4; $i++)
		{
			//$years is an array of arrays
			//$years[currentYear][0] = residentName, and so on
			$years[date('Y') - $i] = array(); 

			//foreach resident, check if the start year matches the current year in the loop
			foreach($residents as $resident)
			{
				 if($resident->program_start_year == (date('Y') - $i))
				 {
				 	$years[date('Y') - $i][] = $resident->name;
				 }
			}
		}
	

		$data['residents'] = $years; 

		$this->load->view('residencyprogram_view', $data);
	}
}