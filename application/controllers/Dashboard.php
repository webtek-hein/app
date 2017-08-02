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
        $position = $this->session->userdata['logged_in']['position'];
        $data['itemsremaining'] = $this->inventorymodel->dashboard_custodian_items_remaining();
        $data['countrecitems'] = $this->inventorymodel->count_received_items();
        $data['returned'] = $this->inventorymodel->dashborad_custodian_returned_items();
        $data['defecteditems'] = $this->inventorymodel->dashborad_custodian_defected_items();
        $data['received'] = $this->inventorymodel->dashborad_custodian_recieved_items();
        $data['retitems'] = $this->inventorymodel->count_ret_items();
        $data['defitems'] = $this->inventorymodel->count_def_items();
        $data['pendingusers'] = $this->inventorymodel->count_pending_users();
        $data['no_of_items'] = $this->inventorymodel->no_of_items();
        $data['expired_items'] = $this->inventorymodel->count_expiring_items();

        $this->load->view('templates/header');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function count_received_item()
    {
        $data = $this->inventorymodel->count_received_item();
        foreach ($data as $item) {
            if ($item['quantity'] == null) {
                echo "0";
            } else {
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
        $data = $this->inventorymodel->count_ret_items();
        foreach ($data as $ret) {
            echo $ret['user'];
        }
    }

    public function count_def_items()
    {
        $data = $this->inventorymodel->count_def_items();
        foreach ($data as $def) {
            echo $def['status'];
        }
    }

    public function count_pending_users()
    {
        $data = $this->inventorymodel->count_pending_users();
        foreach ($data as $penu) {
            echo $penu['status'];
        }
    }
    public function data_in_graph(){
        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];

        if($position === 'receiver' || $position === 'department head')
        {
            $pie = $this->inventorymodel->pie_graph_per_dept($dept_id);
        }else{
            $pie = $this->inventorymodel->pie_graph();
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

    public function count_rec_items_per_dept()
    {
        $deptid = $this->session->userdata['logged_in']['dept_id'];
        $data = $this->inventorymodel->count_rec_items_per_dept($deptid);
        if (empty($data)) {
            echo "0";
        } else {
            foreach ($data as $received) {
                echo $received['received'];
            }
        }   
    }

    public function no_of_items()
    {
        $data = $this->inventorymodel->no_of_items();
        foreach ($data as $itemno) {
            echo $itemno['item'];
        }
    }

        public function count_expiring_items()
    {
        $data = $this->inventorymodel->count_expiring_items();
        foreach ($data as $expired) {
            echo $expired['quantity'];
        }
    }
}