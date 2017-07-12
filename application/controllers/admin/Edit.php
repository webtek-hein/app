<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Edit_model');

        $this->load->model('InventoryModel');
    }
    public function index()
    {

        $data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $data['item'] = $this->InventoryModel->get_inventory_list();
        $data['department'] = $this->InventoryModel->get_department_list();

        $this->load->view('templates/header');
        $this->load->view('edit_view',$data);
        $this->load->view('templates/footer');
    }


    public function edit($id)
    {
        $data = $this->Edit_model->get_by_id($id);
        echo json_encode($data);
    }

    public function item_update()
    {
        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_description' => $this->input->post('desc'),
            'account_id' => $this->input->post('accountcode'),
            'unit' => $this->input->post('unit'),
            'quantity' => $this->input->post('qty'),
        );
        $this->Edit_model->item_update(array('item_id' => $this->input->post('item_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
}