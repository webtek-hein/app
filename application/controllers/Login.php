<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

	public function __construct() {
	parent::__construct();
		$this->load->model('user_db');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function user_login_process() 
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('dashboard');
			}else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$result = $this->user_db->login($username,$password);
				if($result !=false){
					$user_data = array('username' => $result[5]->user_name);
					$this->session->set_userdata('logged_in',$user_data);
					$this->load->view('dashboard');
				} else {
					$data = array('error_message' => 'Invalid Username or Password');
					$this->load->view('login', $data);
				}

			}
		}
	}
}