<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
		$data['departments'] = $this->inventorymodel->get_department_list();

        $this->load->view('templates/header');
        $this->load->view('department',$data);
        $this->load->view('modals/summaryofitems');
        $this->load->view('modals/return');
		$this->load->view('templates/footer');
	}
	public function get_dept_list($id)
    {
        if($id == "none"){
            $dept_item = $this->inventorymodel->get_distributed_items();
        }else{
            $dept_item = $this->inventorymodel->get_department_item($id);
        }

        $data = array();
        foreach ($dept_item as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = $list['account_code'];
            $row[] = $list['official_receipt_no'];
            $row[] = $list['del_date'];;
            $row[] = $list['distrib_date'];
            $row[] = $list['receivedby'];
            $row[] = $list['unit_cost'];
            $row[] = "<button type=\"button\" onclick=\"return_items(" . $list['itemid'] . ")\">Return</button>";
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function get_all_dept_list()
    {
        $dept_item = $this->inventorymodel->get_distributed_items();

        $data = array();
        foreach ($dept_item as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = $list['account_code'];
            $row[] = $list['official_receipt_no'];
            $row[] = $list['del_date'];;
            $row[] = $list['distrib_date'];
            $row[] = $list['receivedby'];
            $row[] = $list['unit_cost'];
            $row[] = "<button type=\"button\" onclick=\"return_items(" . $list['itemid'] . ")\">Return</button>";
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function summary_items()
    {
        $dept_item = $this->inventorymodel->get_summary_items();

        $data = array();
        foreach ($dept_item as $list) {
            $row = array();
            $row[] = $list['department'];
            $row[] = $list['item_name'];
            $row[] = $list['quantity'];
            $row[] = $list['account_code'];
            $row[] = $list['official_receipt_no'];
            $row[] = $list['del_date'];;
            $row[] = $list['distrib_date'];
            $row[] = $list['receivedby'];
            $row[] = $list['unit_cost'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function return_items($id)
    {
         $itemid = $this->input->post('reason');
         $this->return_model->return_items();
    }
}
