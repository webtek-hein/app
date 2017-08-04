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

        $this->load->view('templates/header');
		$this->load->view('returnlog');
        $this->load->view('modals/return_details');
		$this->load->view('templates/footer');

	}
    public function return_log_list()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['userid'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];

        if($position === 'admin' || $position === 'custodian' ){
            $return = $this->log_model->get_return_log();
        }else if($position === 'receiver'){
            $return = $this->log_model->get_return_log_per_user($user_id);
        }else{
            $return = $this->log_model->get_return_log_per_dept($dept_id);
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
            if($position === 'admin' || $position === 'custodian') {
                $row[] = $list['user'];
            }
            $row[] = " <button class=\"btn btn-info open-modal-action fa fa-info\" onclick=\"get_return_details(". $list['dist_id'] .")\"></button>";
            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
    public function returnlog_details($dist_id){
        $details = $this->log_model->return_log_details($dist_id);
        $data = array();
        foreach ($details as $list) {
            $row = array();
            $row[] = $list['account_code'];
            $row[] = $list['serial'];
            $row[] = $list['official_receipt_no'];
            $row[] = $list['item_description'];
            $row[] = $list['item_usage'];
            $row[] = $list['distrib_date'];
            $row[] = $list['receivedby'];
            $row[] =  "&#8369; ".number_format((int)$list['unit_cost'],2)."<br>";
            $row[] = $list['reason'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
