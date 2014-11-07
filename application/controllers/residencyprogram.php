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

	function getProgram($programName)
	{
		//pass data to model
		$this->load->model('residencyprogram_model');

		$data = array();

		//each index in data is a row of program_name, state, director
		$data['residencyProgram'] = $this->residencyprogram_model->getSpecificProgram(urldecode($programName));

		$this->load->view('residencyprogram_view', $data);
	}
}