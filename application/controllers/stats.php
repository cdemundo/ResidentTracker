<?php

/**
* Stats about specific residency programs or fellowships
*/
class Stats extends CI_Controller
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
	*Loads default view
	**/
	function index()
	{
		$tempArray["name"] = "Mayo Clinic"; 
		$tempArray["data"] = [4, 5, 7, 2, 3, 4];

		$jsonArray = json_encode($tempArray); 

		$data['json'] = $jsonArray; 
		$this->load->view('stats/stats_view', $data); 
	}

}