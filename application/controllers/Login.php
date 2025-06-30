<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Login_model');

		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->load->view('login/admin-login');
	}

	public function admin_login() {

		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$check_user = $this->Login_model->checkUser($email, $password);
		if($check_user){

			$this->session->set_userdata([

				'admin_id' => $check_user->id,
				'admin_name' => $check_user->full_name,
				'admin_email' => $check_user->email,
				'logged_in' => true
			]);
			redirect('dashboard');
		} else {

			$data['error'] = 'Invalid email or password';
        	$this->load->view('login/admin-login', $data);
		}
	}

	public function logout() {

		echo 'logout method hit';
    exit;
		// $this->session->sess_destroy();
		// redirect('Login');
	}
}
