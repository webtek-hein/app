<?php
class Login_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function register()
	{
    	$this->load->helper('url');
    	$data = array(
        	'first_name' => $this->input->post('name'),
            'last_name' => $this->input->post('name'),
            'email' => $this->input->post('name'),
            'contact' => $this->input->post('name'),
            'username' => $this->input->post('name'),
        	'password' => $this->input->post('quantity')
    	);
    	return $this->db->insert('user', $data);
	}
}