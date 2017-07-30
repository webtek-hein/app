<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returnlog extends CI_Controller {
		public function __construct()
    {
      	parent::__construct();
        $this->load->model('log_model');
    }
	public function index()
	{
        $position = $this->session->userdata['logged_in']['position'];
        if($position === 'department head'){
            $this->load->view('department_head/templates/header');
        }else{
            $this->load->view('templates/header');
        }
		$this->load->view('returnlog');
		$this->load->view('templates/footer');

	}
    public function return_log_list()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['userid'];

        if($position == 'admin'){
            $return = $this->log_model->get_return_log();
        }else{
            $return = $this->log_model->get_return_log_per_user($user_id);
        }
        $data = array();
        foreach ($return as $list) {
            $row = array();
            $row[] = $list['department'];
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = (int)$list['quantity'];
            $row[] = $list['unit'];
            $row[] = $list['date'];
            $row[] = $list['return_person'];
            if($position === 'admin') {
                $row[] = $list['user'];
            }
            $row[] = " <button class=\"btn btn-info open-modal-action fa fa-info\" onclick=\"get_item_details(". $list['item_id'] .")\"></button>";
            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
