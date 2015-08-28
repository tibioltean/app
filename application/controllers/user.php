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