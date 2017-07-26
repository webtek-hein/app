<?php
class User_db extends CI_Model {
// Read data using username and password
    public function login($data)
    {

        $this->db->select('*')
            ->where('username', $data['username'])
            ->where('status', 'accepted')
            ->limit(1);
        $q = $this->db->get('user')->row();

        $password = $data['password'];

        if ($q == true) {
            if (password_verify($password, $q->password)) {
                return true;
            } else {
                return false;
            }

        }
    }


// Read data from database to show data in admin page
    public function read_user_information($username) {
        $this->db->join('department', 'department.dept_id = user.dept_id', 'left')
            ->where('username',$username)
            ->limit(1);
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_pending_users()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function accept_user($id)
    {
        $this->db->set('status','accepted')
            ->where('status','pending')
            ->where('user_id',$id)
            ->update('user');
    }

    public function decline_user($id)
    {
        $this->db->set('status','declined')
            ->where('status','pending')
            ->where('user_id',$id)
            ->update('user');
    }

    public function deactivate_user($id)
    {
        $this->db->set('status','pending')
            ->where('status','accepted')
            ->where('user_id',$id)
            ->update('user');
    }    

    public function get_info($id)
    {
        $this->db->select('SELECT CONCAT(first_name, , last_name," is registering as a(n) ",position) as info')
            ->where('user_id',$id);
        $query = $this->db->get('user');
    }

    public function edit_profile($data, $userid)
    {
        $this->db->where('user_id', $userid);
        $this->db->update('user',$data);
    }
}