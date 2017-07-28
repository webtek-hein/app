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
            $row[] = $list['item_name'];
            $row[] = (int)$list['quantity'];
            $row[] = $list['date'];
            $row[] = $list['department'];
            $row[] = $list['return_person'];
            $row[] = $list['reason'];
            if($position === 'admin') {
                $row[] = $list['user'];
            }

             if($position === 'admin') {
                $row[] = '';
            }
            

            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
