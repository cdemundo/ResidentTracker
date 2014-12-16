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


}