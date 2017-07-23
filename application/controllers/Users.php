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
        $this->load->view('modals/accept');
        $this->load->view('modals/decline');
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
            $row[] = "<button type=\"button\" class=\"open-modal-action\" data-id='$list[user_id]' data-toggle=\"modal\" data-target=\"#accept\">Accept</button>" .
            "<button type=\"button\" class=\"open-modal-action\" data-id='$list[user_id]' data-toggle=\"modal\" data-target=\"#decline\">Decline</button>";
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function accept()
    {
        $id = $this->input->post('user_id');
        $this->user_db->accept_user($id);
        header('Location: '. base_url() . 'users');
    }

    public function decline()
    {
        $id = $this->input->post('user_id');
        $this->user_db->decline_user($id);
        header('Location: '. base_url() . 'users');
    }
}