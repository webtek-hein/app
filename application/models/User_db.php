<?php
class User_db extends CI_Model {

    public function __construct()
    {
    }

// Read data using username and password
    public function login($data) {
        $db = $this->load->database("inventory",TRUE);

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'" . "AND status = 'accepted'";
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
        $db->join('department', 'department.dept_id = user.dept_id', 'left');
        $db->where($condition);
        $db->limit(1);
        $query = $db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_pending_users()
    {
        $query = $this->db->query("SELECT * FROM user WHERE status = 'pending'");
        return $query->result_array();
    }

    public function accept_user($id)
    {
        $query = $this->db->query("UPDATE user SET status = 'accepted' WHERE user_id = $id");
    }

    public function decline_user($id)
    {
        $query = $this->db->query("UPDATE user SET status = 'declined' WHERE user_id = $id");
    }
}