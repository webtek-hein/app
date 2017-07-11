<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InventoryModel');
    }
    public function index()
    {

        $data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $data['item'] = $this->InventoryModel->get_inventory_list();
        $data['department'] = $this->InventoryModel->get_department_list();

        $this->load->view('department_head/templates/header');
        $this->load->view('department_head/inventory');
        $this->itemdetail();
        $this->load->view('department_head/templates/footer');

    }
    public function inventory_list()
    {
        $inventory = $this->InventoryModel->get_inventory_list();
        $data = array();
        foreach ($inventory as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['account_code'];
            $row[] = $list['quantity'];
            $row[] = $list['unit'];
            $row[] = "<button type=\"button\" class=\"open-modal-action fa fa-plus\" data-toggle=\"modal\" data-target=\"#addqty\"></button>".
                     "<button type=\"button\" class=\"open-modal-action fa fa-minus\" data-toggle=\"modal\" data-target=\"#subqty\"></button>".
                     "<button class=\"open-modal-action fa fa-info\" data-toggle=\"modal\" data-target=\"#view\"></button> ";
            $data[] = $row;
           
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function itemdetail()
    {
        $item_id = $this->input->post('item_id');
        $data['item_detail'] = $this->InventoryModel->get_item_detail($item_id);
        echo json_encode($data['item_detail']);
        $this->load->view('department_head/modals/itemdetails',$data);
    }

