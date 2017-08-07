<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventorymodel');
    }

    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }

    public function count_received_item()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $deptid = $this->session->userdata['logged_in']['dept_id'];
        if($position === 'custodian' || $position === 'admin'){
            $data = $this->inventorymodel->count_received_items();
        }else{
            $data = $this->inventorymodel->count_rec_items_per_dept($deptid);
        }
        if (count($data) == 0) {
            echo "0";
        } else {
            foreach ($data as $item) {
                echo $item['quantity'];
            }
        }
        
    }

    public function dashboard_custodian_items_remaining()
    {
        $remainingitem = $this->inventorymodel->dashboard_custodian_items_remaining();
        $data = array();
        foreach ($remainingitem as $list) {
            $row = array();
            $row[] = $list['official_receipt_no'];
            $row[] = $list['item_name'];
            $row[] = (int)$list['quantity'];
            $row[] = $list['item_type'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($data);

    }

    public function count_ret_items()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $deptid = $this->session->userdata['logged_in']['dept_id'];
        if($position === 'custodian' || $position === 'admin'){
            $data = $this->inventorymodel->count_ret_items();
        }else{
            $data = $this->inventorymodel-> count_returned_per_dept($deptid);
        }
        foreach ($data as $ret) {
            echo $ret['user'];
        }
    }

    public function count_pending_users()
    {
        $data = $this->inventorymodel->count_pending_users();
        foreach ($data as $penu) {
            echo $penu['status'];
        }
    }

      public function no_of_items()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $deptid = $this->session->userdata['logged_in']['dept_id'];
        if($position === 'custodian' || $position === 'admin'){
            $data = $this->inventorymodel->no_of_items();
        }else{
            $data = $this->inventorymodel->total_item_per_dept($deptid);
        }
        if (count($data) == 0) {
            echo "0";
        } else {
            foreach ($data as $itemno) {
                if ($itemno['item'] === NULL) {
                    echo "0";
                } else {
                    echo $itemno['item'];
                }
               
            }
        }
    }

    public function total_unit_cost()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];
        if($position === 'admin' || $position === 'custodian'){
            $data = $this->inventorymodel->total_unit_cost();
        }else{
            $data = $this->inventorymodel-> total_unit_cost_per_dept($dept_id);
        }
        foreach ($data as $unit_cost) {
            $cost = (int)$unit_cost['cost'];
            if($cost>1000000000000) echo "&#8369; ".round(($cost/1000000000000),2).' trillion';
            else if($cost>1000000000) echo "&#8369; ".round(($cost/1000000000),2).' billion';
            else if($cost>1000000) echo "&#8369; ".round(($cost/1000000),1).' million';
            else echo "&#8369; ".number_format($cost,2);
        }
    }

    public function count_expired_items()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];
        if($position === 'admin' || $position === 'custodian'){
            $data = $this->inventorymodel->count_expired_items();
        }else{
            $data = $this->inventorymodel->count_expired_items_per_dept($dept_id);
        }
        foreach ($data as $expired) {
            echo $expired['quantity'];
        }
    }

    public function view_pie_graph_co()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];

        if($position === 'receiver' || $position === 'department head')
        {
            $pie = $this->inventorymodel->pie_graph_per_dept_co($dept_id);
        }else{
            $pie = $this->inventorymodel->pie_graph_co();
        }
        $data = array();
        foreach ($pie as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = (int)$list['quantity'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($data);
    }

    public function view_pie_graph_mooe()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];

        if($position === 'receiver' || $position === 'department head')
        {
            $pie = $this->inventorymodel->pie_graph_per_dept_mooe($dept_id);
        }else{
            $pie = $this->inventorymodel->pie_graph_mooe();
        }
        $data = array();
        foreach ($pie as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = (int)$list['quantity'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($data);
    }
}