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
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required');
        $this->form_validation->set_rules('Username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[Password]');
        $this->form_validation->set_rules('type', 'User Type', 'required');
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
