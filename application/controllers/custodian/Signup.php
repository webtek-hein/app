<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('signup_model');
    }

	public function index()
	{
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('signup');
        }
        else
        {
            $data = array(
            'first_name' => $this->input->post('FirstName'),
            'last_name' => $this->input->post('LastName'),
            'email' => $this->input->post('Email'),
            'contact_no' => $this->input->post('contactno'),
            'username' => $this->input->post('Username'),
            'password' => $this->input->post('Password'),
            'position' => $this->input->post('type')
            );

            $this->signup_model->register($data);
            $this->session->set_flashdata('msg', 'Registration success! You may now login.');
            $this->load->view('login');
        }
	}
}
