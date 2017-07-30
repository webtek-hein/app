<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Decreaselog extends CI_Controller {
			public function __construct()
    {
      	parent::__construct();
        $this->load->model('log_model');

    }
	public function index()
	{
        $this->load->view('templates/header');
		$this->load->view('decreaselog');
        $this->load->view('modals/decrease_details');
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
            $row[] = $list['department'];
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];
            $row[] = $list['unit'];
            $row[] = $list['item_type'];
            $row[] = $list['date'];
            if($position === 'admin') {
                $row[] = $list['user'];
            }
            $row[] = "<button class=\"btn btn-info open-modal-action fa fa-info\" onclick=\"get_decreaselog_details(". $list['item_id'] .','.$list['dept_id'] .")\"></button> ";
            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
    public function decreaselog_details($item_id,$dept_id){
        $details = $this->log_model->get_decreaselog_details($item_id,$dept_id);
        $data = array();
        foreach ($details as $list) {
            $row = array();
            $row[] = $list['account_code'];
            $row[] = $list['serial'];
            $row[] = $list['official_receipt_no'];
            $row[] = $list['item_description'];
            $row[] = $list['distrib_date'];
            $row[] = $list['receivedby'];
            $row[] = $list['unit_cost'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

}
