<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('signup_model');
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required');
        $this->form_validation->set_rules('contactno', 'Contact Number', 'required');
        $this->form_validation->set_rules('Username', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('type', 'User Type', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('signup');
        }
        else
        {
            $this->signup_model->register();
            $this->load->view('success');
        }
	}
}
