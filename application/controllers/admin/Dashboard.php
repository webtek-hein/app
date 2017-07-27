<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventorymodel');
    }
    public function index()
    {
        $data['itemsremaining'] = $this->inventorymodel->get_dashboard_custodian_items_remaining();
        $data['ordereditems'] = $this->inventorymodel->get_dashboard_custodian_order_items();
        $data['receiveditems'] = $this->inventorymodel->get_dashboard_custodian_received_items();
        $data['returneditems'] = $this->inventorymodel->get_dashboard_custodian_returned_items();
        $data['defecteditems'] = $this->inventorymodel->get_dashboard_custodian_defected_items();
        $data['received'] = $this->inventorymodel->count_recieved_items();
        $data['retitems'] = $this->inventorymodel->count_ret_items();
        $data['defitems'] = $this->inventorymodel->count_def_items();
        $data['pendingusers'] = $this->inventorymodel->count_pending_users();
            $this->load->view('templates/header');
            $this->load->view('dashboard',$data);
            $this->load->view('templates/footer');
    }
    public function graph()
    {   
        $data = $this->inventorymodel->get_dashboard();
        echo json_encode($data);

    }
        public function count_received_item()
    {   
        $data = $this->inventorymodel->get_dashboard();
        echo json_encode($data);

    }
    public function count_pending_users()
    {   
        $data = $this->inventorymodel->get_dashboard();
        echo json_encode($data);

    }
}