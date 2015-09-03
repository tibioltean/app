<?php

/** RIS project by Tiberiu Oltean
* 
*/
class Home extends CI_Controller
{	
	public function index()
	{
		$this->load->view('home/inc/header_view');
		$this->load->view('home/home_view');
		$this->load->view('home/inc/footer_view');	
	}

	
	public function register()
	{
		$this->load->view('home/inc/header_view');
		$this->load->view('home/register_view');
		$this->load->view('home/inc/footer_view');	
	}

	// public function code()
	// {
	// 	echo hash('sha256', 'pass'.access_key);
	// }



	// Acesasta parte se face un model
	public function test_db()
	{
		//$q = $this->db->get('user');
		//*** Prima varianta cu active records cu get_where cu array
		//$q = $this->db->get_where('user',['user_id' => 3]);
		
		//$this->db->where(['user_id' => 2]);
		//$q = $this->db->get('user');
  		//print_r($q->result());

		$this->db->select('user_id,login');
		$this->db->order_by('user_id DESC');
		$q = $this->db->get('user');
		print_r($q->result());

        
		$data = array(
        'login' => 'ATD33',
        'password' => 'SoparolaCEMo',       
		);
		
		$this->db->where('user_id', 3);
 		$this->db->update('user', $data);

	 	//$this->db->insert('user', $data);		
	}

	public function agenda(){
		  $this->load->library('calendar');
          echo $this->calendar->generate();

	}

}?>