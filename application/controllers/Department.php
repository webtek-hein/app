<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
        $this->load->model('return_model');
        $this->load->model('department_model');
    }
	public function index()
	{
		$data['departments'] = $this->inventorymodel->get_department_list();

        $this->load->view('templates/header');
        $this->load->view('department',$data);
        $this->load->view('modals/department_item');
        $this->load->view('modals/return');
		$this->load->view('templates/footer');
	}
	public function get_dept_list($id)
    {
        if($id == "none"){
            $dept_item = $this->department_model->get_distributed_in_departments();
        }else{
            $dept_item = $this->department_model->get_distributed_per_department($id);
        }

        $data = array();
        foreach ($dept_item as $list) {
            $row = array();
            $row[] = $list['department'];
            $row[] = $list['account_code'];
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];;
            $row[] = $list['unit'];
            $row[] = "<button class=\"btn btn-info open-modal-action fa fa-info\" onclick=\"get_distribution_details(". $list['item_id'] .','.$list['dept_id'] .")\"></button> ";
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function get_all_dept_list()
    {
        $dept_item = $this->department_model->get_distributed_in_departments();

        $data = array();
        foreach ($dept_item as $list) {
            $row = array();
            $row[] = $list['department'];
            $row[] = $list['account_code'];
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];
            $row[] = $list['unit'];
            $row[] = "<button type=\"button\" class=\"btn btn-info open-modal-action fa fa-info\" onclick=\"get_distribution_details(". $list['item_id'] .','.$list['dept_id'] .")\"></button>";
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
         $item_det_id = $this->input->post('item_det_id');
        $this->return_model->return_items_to_inventory($item_det_id, $person, $reason, $userid);
        header('Location: '. base_url() . 'department');
    }

    public function dist_details($item_id,$dept_id)
    {
    	$details = $this->department_model->get_distributed_details($item_id,$dept_id);
    	$position = $this->session->userdata['logged_in']['position'];

        $data = array();
        foreach ($details as $list) {
            $row = array();
            if($position === 'receiver'){
                $row[] = "<input type=\"checkbox\" name =\"item-det\" id=\"item_detail\" value=\"" .$list['item_det_id']."\">";
            }
            $row[] = $list['serial'];
            $row[] = $list['exp_date'];
            $row[] = $list['supplier'];
            $row[] = $list['official_receipt_no'];
            $row[] = $list['del_date'];
            $row[] = $list['date_rec'];
            $row[] = $list['receivedby'];
            $row[] =  "&#8369; ".number_format((int)$list['unit_cost'],2)."<br>";
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
