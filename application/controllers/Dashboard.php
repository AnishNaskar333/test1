<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// $this->load->model('Login_model');
	}

	public function index()
	{   
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('include/top_header');
		$this->load->view('dashboard/dashboard');
		$this->load->view('include/footer');
	}

	public function logout() {

		
		$this->session->sess_destroy();
		redirect('Login');
	}
}
