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
		$this->load->view('admin_view');
	}

	function getAllPrograms()
	{
		//load list of residency programs first
		$this->load->model('residencyprogram_model'); 

		$data['residencyProgram'] = $this->residencyprogram_model->getAllResidencyPrograms(); 

		//fills a html select with all the residency programs, loaded via ajax
		$this->load->view('adminselect_view', $data);
	}

}