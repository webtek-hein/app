<?php
class Signup_model extends CI_Model {

    public function __construct()
    {
    }

	public function register($data)
	{
    	return $this->db->insert('user', $data);
	}
}