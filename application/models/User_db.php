<?php
class User_db extends CI_Model {

    public function __construct()
    {
    }

// Read data using username and password
    public function login($data) {
        $db = $this->load->database("inventory",TRUE);

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $db->select('*');
        $db->from('user');
        $db->where($condition);
        $db->limit(1);
        $query = $db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function read_user_information($username) {
        $db = $this->load->database("inventory",TRUE);
        $condition = "username =" . "'" . $username . "'";
        $db->select('*');
        $db->from('user');
        $db->where($condition);
        $db->limit(1);
        $query = $db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}