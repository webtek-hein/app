<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returned extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InventoryModel');
    }
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('custodian/return');
		$this->load->view('templates/footer');

	}
	public function returned_list()
    {
            $return = $this->InventoryModel->get_return_log();
            $data = array();
            foreach ($return as $list) {
                $row = array();

                $row[] = $list['serial'];
                $row[] = $list['item_name'];
                $row[] = $list['account_code'];
                $row[] = $list['date'];
                $row[] = $list['supplier'];
                $row[] = $list['department'];
                $row[] = $list['reason'];
                $row[] = $list['item_status'];
                $row[] = '';
        

                $data[] = $row;

            }
            $list = array('data'=>$data);
            echo json_encode($list);
    }
}
