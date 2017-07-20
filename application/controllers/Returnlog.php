<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returnlog extends CI_Controller {
		public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
        $position = $this->session->userdata['logged_in']['position'];

        if($position === 'department head'){
            $this->load->view('department_head/templates/header');
        }else if($position ==='receiver'){
            $this->load->view('receiver/header');
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
            $return = $this->inventorymodel->get_return_log();
        }else{
            $return = $this->inventorymodel->get_return_log_per_user($user_id);
        }
        $data = array();
        foreach ($return as $list) {
            $row = array();
            $row[] = $list['serial'];
            $row[] = $list['item_name'];
            $row[] = $list['date'];
            $row[] = $list['department'];
            $row[] = $list['supplier'];
            $row[] = $list['unit_cost'];
            $row[] = $list['return_person'];
            $row[] = $list['reason'];
            $row[] = $list['user'];
            $row[] = $list['item_status'];

            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
