<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('login_model');
	}

	function index()
	{
		if (!$this->login_model->isLoggedIn()) 
		{
			$this->load->view('login_view');
		} 
		else
		{
			//initialize a list of all residency programs below the map
			$this->load->model('residencyprogram_model'); 

			//each index in data is a row of program_name, state, director
			$data['residencyProgram'] = $this->residencyprogram_model->getAllResidencyPrograms();
			$this->load->view('main_view', $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */