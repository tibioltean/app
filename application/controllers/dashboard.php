<?php

/** RIS project by Tiberiu Oltean
* 
*/
class Dashboard extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('dashboard/inc/header_view');
		$this->load->view('dashboard/dashboard');
		$this->load->view('dashboard/inc/footer_view');
	}
	public function logout()
	{
		session_destroy();
		redirect('/'); 
	}
}