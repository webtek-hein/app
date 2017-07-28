<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditLog extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('log_model');

    }
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('editlog');
        $this->load->view('templates/footer');

    }
    public function decrease_log_list()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['userid'];

        if($position == 'admin'){
            $decrease = $this->log_model->get_decrease_log();
        }else{
            $decrease = $this->log_model->get_decrease_log_per_user($user_id);
        }
        $data = array();
        foreach ($decrease as $list) {
            $row = array();
            $row[] = $list['serial'];
            $row[] = $list['item_name'];
            $row[] = $list['date'];
            $row[] = $list['supplier'];
            $row[] = $list['distrib_date'];
            $row[] = $list['unit_cost'];
            if($position === 'admin') {
                $row[] = $list['user'];
            }
            $row[] = $list['department'];

            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}