<?php


/** RIS project by Tiberiu Oltean
* 
*/
class User extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();    
		$this->load->model('user_model');

	}
	
	public function login()
	{

		$login = $this->input->post('login');
		$password = $this->input->post('password');


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


	

	public function test_get()
	{
		$data = $this->user_model->get(2);
		print_r($data);

		// ** Debuger profiler
		$this->output->enable_profiler();
	}

	public function insert()
	{
		$result = $this->user_model->insert([
			 'login' => 'Tanase'
		]);
		print_r($result);

	} 

	public function update()
	{
		$result = $this->user_model->update([
			'login' => 'Grigore'
			], 3); 

		print_r($result);
	}

	public function delete()
	{
		$result = $this->user_model->delete(7);
		print_r($result);
	}

}?>