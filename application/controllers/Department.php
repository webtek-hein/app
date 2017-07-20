<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
        $this->load->model('return_model');
    }
	public function index()
	{
        $position = $this->session->userdata['logged_in']['position'];
		$data['departments'] = $this->inventorymodel->get_department_list();
        if($position === 'department head'){
            $this->load->view('department_head/templates/header');
        }else{
            $this->load->view('templates/header');
        }
        if($position === 'department head'){
            $this->load->view('department_head/department', $data);
        }else{
            $this->load->view('department',$data);
        }
        $this->load->view('modals/department_item');
        $this->load->view('modals/return');
		$this->load->view('templates/footer');
	}
	public function get_dept_list($id)
    {
        if($id == "none"){
            $dept_item = $this->inventorymodel->get_summary_items();
        }else{
            $dept_item = $this->inventorymodel->get_department_item($id);
        }

        $data = array();
        foreach ($dept_item as $list) {
            $row = array();
            $row[] = $list['department'];
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];;
            $row[] = $list['unit'];
            $row[] = "<button type=\"button\" data-id = '$list[item_det_id]' class=\"open-modal-action fa fa-info\" data-toggle=\"modal\" data-target=\"#view\"></button>";
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function get_all_dept_list()
    {
        $dept_item = $this->inventorymodel->get_summary_items();

        $data = array();
        foreach ($dept_item as $list) {
            $row = array();
            $row[] = $list['department'];
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];
            $row[] = $list['unit'];
            $row[] = "<button type=\"button\" data-id = '$list[item_det_id]' class=\"open-modal-action fa fa-info\" data-toggle=\"modal\" data-target=\"#view\"></button>";
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

    public function return_items()
    {
         $userid = ($this->session->userdata['logged_in']['userid']);
         $reason = $this->input->post('reason');
         $person = $this->input->post('person');
         $item = $this->input->post('item');
         $this->return_model->return_items_to_inventory($item, $person, $reason, $userid);
         header('Location: '. base_url() . 'department');
    }
}
