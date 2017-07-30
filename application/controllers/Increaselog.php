<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Increaselog extends CI_Controller {
			public function __construct()
    {
      	parent::__construct();
        $this->load->model('log_model');
    }
	public function index()
	{


        $this->load->view('templates/header');
		$this->load->view('increaselog');
		$this->load->view('templates/footer');

	}
    public function increase_log_list()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['userid'];

        if($position == 'admin'){
            $increase = $this->log_model->get_increase_log();
        }else{
            $increase = $this->log_model->get_increase_log_per_user($user_id);
        }
        $data = array();
        foreach ($increase as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];
            $row[] = $list['unit'];
            $row[] = $list['item_type'];
            $row[] = $list['date'];
            $row[] = $list['date_rec'];
            $row[] = $list['unit_cost'];
            $row[] = $list['supplier'];
            if($position === 'admin') {
                $row[] = $list['user'];
            }

            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
