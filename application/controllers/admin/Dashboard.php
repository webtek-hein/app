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
            $this->load->view('templates/header');
            $this->load->view('dashboard',$data);
            $this->load->view('templates/footer');
    }
    public function graph()
    {   
        $data = $this->inventorymodel->get_dashboard();
        echo json_encode($data);

    }
}