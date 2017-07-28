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

        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];

    }
        public function get_edit_log()
    {
        $editlog = $this->log_model->get_edit_log();
        $data = array();
        foreach ($editlog as $list) {
            $row = array();
            $row[] = $list['before_item_name'];
            $row[] = $list['after_item_name'];
            $row[] = $list['before_description'];
            $row[] = $list['after_description'];
            $row[] = $list['before_unit'];
            $row[] = $list['after_unit'];
            $row[] = $list['date'];
            $row[] = $list['user'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);

    }
}
