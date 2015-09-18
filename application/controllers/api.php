<?php

/**
* 
*/
class Api extends CI_Controller
{
	
 // --------------------------------------------------------------------------------------------------
	public function __construct()
	{
		 parent::__construct();
		
	
	}
 

 // --------------------------------------------------------------------------------------------------
	private function _require_login()
	{
		// verficare autentificare
		if($this->session->userdata('user_id') == false )
		{
			// am scos modulul de logout redirectionare si se trimite un mesaj ajax la javascript
			$this->output->set_output(json_encode([ 'result' => 0, 'error' => 'You are not authorized.' ]));
			return false;
		}
	}

 // --------------------------------------------------------------------------------------------------
	public function login()
	{

		$login = $this->input->post('login');
		$password = $this->input->post('password');

		$this->load->model('user_model');
		$result = $this->user_model->get([
			'login' => $login,
			'password' => hash('sha256', $password . access_key)
		]);
		
		$this->output->set_content_type('application_json');
		if($result){
				$this->session->set_userdata(['user_id' => $result[0]['user_id'] ]);				
				$this->output->set_output(json_encode([ 'result' => 1	]));
				return false;

		}		
		$this->output->set_output(json_encode([ 'result' => 0 	]));

	   
	}


 // --------------------------------------------------------------------------------------------------
	public function register()
	{
			
			$this->output->set_content_type('application_json');

			$this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[12]|is_unique[user.login]');
			$this->form_validation->set_rules('email', 'Email',  'required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[16]|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|min_length[4]|max_length[16]');
			

			if( $this->form_validation->run() == false){
		
					$this->output->set_output(json_encode([ 'result' => 0 , 'error' => $this->form_validation->error_array()	]));
					return false;
			} 


			$login = $this->input->post('login');		
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');

			$this->load->model('user_model');
			$user_id = $this->user_model->insert([
					'login' => $login,
					'password' => hash('sha256', $password . access_key),
					'email' => $email 
				]);

			//	echo $user_id;

			//die('not yet ready');
			
	
			if($user_id){
					$this->session->set_userdata(['user_id' => $user_id ]);				
					$this->output->set_output(json_encode([ 'result' => 1	]));
					return false;

			}		
			$this->output->set_output(json_encode([ 'result' => 0, 'error' => ' User not created.' 	]));

	}

 

 // TODO --------------------------------------------------------------------------------------------------

// Get TODO --------------------------------------------------------------------------------------------------
	public function get_todo($id = null)
	{
			
		$this->_require_login();

		// daca trimit id-ul al todo-ului returneaza linia id-ului ****** altfel returneaza toata lista de todo
		if($id != null){
			$this->db->where([
					'todo_id' => $id,
					'user_id' => $this->session->userdata('user_id')
				]);	
		} else {
			// aici imi afiseaza toada lista de todo
			$this->db->where('user_id', $this->session->userdata('user_id'));
		}

		$query = $this->db->get('todo');
		$result = $query->result_array();
		// daca lasam result() returna un obiect asa result_array returneaza un array

		//print_r($result);
		//Pregatesct rezultatul in JSon pt preluare load in js din dashboard
		$this->output->set_output(json_encode($result));

	}
	public function create_todo()
	{
		
		$this->_require_login();

		$this->form_validation->set_rules('content', 'Content', 'required|max_length[255]');
		if($this->form_validation->run() == false){

			$this->output->set_output(json_encode([
				'result' => 0,
				'error' => $this->form_validation->error_array()
				]));
			return false;
		}

        
		$result = $this->db->insert('todo',[
			'content' => $this->input->post('content'),
			'user_id' => $this->session->userdata('user_id')
			]);

		if($result){
			// daca e ok nu se intampla nimic
			// Pregates raspunsul pentru Afisare lista adaugand variabila data
			//$this->output->set_output(json_encode(['result' => 1])); era initial

			// GET THE Fresh entry from the DOM
			$query = $this->db->get_where('todo', ['todo_id' => $this->db->insert_id()]);
		
			$this->output->set_output(json_encode([
				'result' => 1,
				'data' => $query->result()
				])); 

		}else{
				$this->output->set_output(json_encode([
					'result' => 0, 
					'error' => 'Could not insert record @@@'
			]));
			}
	}

 // --------------------------------------------------------------------------------------------------
	public function update_todo()
	{
		$this->_require_login();
		$todo_id = $this->input->post('todo_id');
	}
 

 // --------------------------------------------------------------------------------------------------	
	public function delete_todo()
	{
		$this->_require_login();
		$todo_id = $this->input->post('todo_id');

	    $this->db->delete('todo', [
				'todo_id' => $this->input->post('todo_id'),
				'user_id' => $this->session->userdata('user_id')
			]);

	   //print_r($this->db->affected_rows());

		if($this->db->affected_rows() > 0){
			$this->output->set_output(json_encode(['result' => 1]));
			return false;
		} 
			$this->output->set_output(json_encode([
				'result' => 0,
				'message' => 'Could not delete. Nu merge'
			]));
		

	}
 

 
 // NOTE --------------------------------------------------------------------------------------------------
	public function get_note()
	{
			
		$this->_require_login();
	
	}

	public function create_note()
	{
	
		$this->_require_login();

	
	}
 // --------------------------------------------------------------------------------------------------
	public function update_note()
	{
		$this->_require_login();
		$note_id = $this->input->post('note_id');
	}

 // --------------------------------------------------------------------------------------------------
	public function delete_note()
	{
		$this->_require_login();
		$note_id = $this->input->post('note_id');
	}

}