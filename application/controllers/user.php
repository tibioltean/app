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