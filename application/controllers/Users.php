<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_db');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('users');
        $this->load->view('templates/footer');
    }

    public function display_pending_users()
    {
        $users = $this->user_db->get_pending_users();

        $data = array();
        foreach ($users as $list) {
            $row = array();
            $row[] = $list['first_name'];
            $row[] = $list['last_name'];
            $row[] = $list['email'];
            $row[] = $list['contact_no'];
            $row[] = $list['position'];
            $row[] = "<button type=\"button\" class=\"open-modal-action\" onclick=\"get_distribution_details(". $list['user_id'] .")\">Accept</button>" . "<button type=\"button\" class=\"open-modal-action\" onclick=\"get_distribution_details(". $list['user_id'] .")\">Decline</button>";
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}