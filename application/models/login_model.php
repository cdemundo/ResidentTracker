<?php

/**
* 
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->library('adldap');
		$connected = $this->adldap->connect();

		if(!$connected)
		{
			redirect('login/notConnectedToStryker');
		}

	}

	function login($username, $password)
	{
		if($this->adldap->authenticate($username, $password))
		{
			//this will be a bunch of people.. have to figure out how to make admins, but just me for now
			if($username === "cdemundo")
			{
				$is_admin = true; 
			}
			else
			{
				$is_admin = false; 
			}

			//set session data

			date_default_timezone_set('America/New_York');
			$time = date('m/d/Y h:i:s'); 

			$this->session->set_userdata(array(
				'is_admin'	=> (bool) $is_admin,
				'username'	=> $username,
				'timestamp' => $time
			));

			//log in database
			$data = array(
    			'username' => $username, 
    			'time_logged_in' => $time, 
    			'is_admin' => $is_admin
    		);

    		if($this->db->insert('users', $data)) 
				return true;
			else
				return false; 
		}
		else
		{
			return false; 
		}
	}

	function isLoggedIn()
	{
		return $this->session->userdata('username');
	}
}