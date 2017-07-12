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

		$this->load->view('department_head/templates/header');
		$this->load->view('department_head/returnlog');
		$this->load->view('department_head/templates/footer');

	}
    function return_log_list(){
        $return = $this->inventorymodel->get_return_log();
        $data = array();

        foreach ($return as $list) {
            $row = array();
            $row[] = $list['serial'];
            $row[] = $list['item_name'];
            $row[] = $list['date'];
            $row[] = $list['department'];
            $row[] = $list['supplier'];
            $row[] = $list['unit_cost'];
            $row[] = $list['supplier'];
            $row[] = $list['user'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
