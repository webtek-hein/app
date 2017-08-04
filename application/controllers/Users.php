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
        $this->load->view('modals/deactivate');
        $this->load->view('modals/activate');
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
            if ($list['status'] === 'pending'){
                $row[] = "<button type=\"button\" class=\"btn btn-primary open-modal-action\" data-id='$list[user_id]' data-toggle=\"modal\" data-target=\"#accept\" style=\"width: 88px;\">Accept</button>" .
                    "<br> <button type=\"button\" class=\"btn btn-warning open-modal-action\" data-id='$list[user_id]' data-toggle=\"modal\" data-target=\"#decline\" style=\"width: 88px;\">Decline</button>";
            }else if ($list['status'] === 'accepted'){
                $row[] = "<button type=\"button\" class=\"btn btn-danger open-modal-action\" data-id='$list[user_id]' data-toggle=\"modal\" data-target=\"#deactivate\">Deactivate</button>";
            }else{
                $row[] = "<button type=\"button\" class=\"btn btn-success open-modal-action\" data-id='$list[user_id]' data-toggle=\"modal\" data-target=\"#activate\" style=\"width: 88px;\">Activate</button>";
            }
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

    public function deactivate()
    {
        $id = $this->input->post('user_id');
        $this->user_db->deactivate_user($id);
        header('Location: '. base_url() . 'users');
    }
    public function activate()
    {
        $id = $this->input->post('user_id');
        $this->user_db->activate_user($id);
        header('Location: '. base_url() . 'users');
    }

}