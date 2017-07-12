<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InventoryModel');
        $this->load->helper('url');
    }
    public function index()
    {

        $data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $data['item'] = $this->InventoryModel->get_inventory_list();
        $data['department'] = $this->InventoryModel->get_department_list();

        $this->load->view('department_head/templates/header');
        $this->load->view('department_head/inventorylist',$data);
        $this->load->view('department_head/templates/footer');
    }

    public function itemdetail($id)
    {
        $data = $this->InventoryModel->get_item_detail($id);
        echo json_encode($data);

    }


}
