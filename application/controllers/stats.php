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
		
		$this->load->view('stats/stats_view', $data); 
	}

	function testFunction()
	{
		$tempArray['name'] = 'Mayo Clinic'; 
		$tempArray['data'] = [4, 5, 7, 2, 3, 4];

		$realTemp[] = $tempArray; 

		unset($tempArray); 

		$tempArray['name'] = 'The Test'; 
		$tempArray['data'] = [3, 5, 7, 2, 3, 4];

		$realTemp[] = $tempArray; 

		$jsonArray = json_encode($realTemp);


		print_r($jsonArray); 
	}

}