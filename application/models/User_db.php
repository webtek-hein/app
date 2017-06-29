<?php
class User_db extends CI_Model {

    public function __construct()
    {
    }

	public function login($username,$password)
	{
       $query = $this->db->get_where('user', array('username'=>$username,'password'=>$password));
       if($query->num_rows == 1){
        return true;
       }else{
        return false;
       }
	}
}