<?php
class Signup_model extends CI_Model {

    public function __construct()
    {
    }

	public function register()
	{
    	$this->load->helper('url');
    	$data = array(
        	'first_name' => $this->input->post('FirstName'),
            'last_name' => $this->input->post('LastName'),
            'email' => $this->input->post('Email'),
            'contact' => $this->input->post('contactno'),
            'username' => $this->input->post('Username'),
        	'password' => $this->input->post('Password'),
            'type' => $this->input->post('type')
    	);
    	return $this->db->insert('user', $data);
	}
}