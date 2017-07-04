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
		$data['department'] = $this->InventoryModel->get_department_list();
		$data['item'] = $this->InventoryModel->get_inventory_list();
        $data['item_detail'] = $this->InventoryModel->get_item_detail();

		$this->load->view('templates/header');
		$this->load->view('inventory',$data);
        $this->additem();
        $this->load->view('modals/addbulk');
        $this->load->view('modals/addquantity');
        $this->load->view('modals/editinventory',$data);
		$this->load->view('modals/subtractquantity');
        $this->item_detail($data);
		$this->load->view('templates/footer');
	}
    public function additem()
    {
    	$data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $this->form_validation->set_rules('Item_Name', 'Item Name','required');
        $this->form_validation->set_rules('AccountCode', 'Account Code', 'required');
        $this->form_validation->set_rules('OfficialReceipt', 'Official Receipt', 'required');
        $this->form_validation->set_rules('Item_Quantity', 'Quantity','required');
        $this->form_validation->set_rules('datedelivered', 'Date Delivered', 'required');
        $this->form_validation->set_rules('datereceived', 'Date Received', 'required');
        $this->form_validation->set_rules('Unit', 'Unit', 'required');
        $this->form_validation->set_rules('Cost', 'Cost', 'required');
        $this->form_validation->set_rules('ExpirationDate', 'Expiration Date', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('modals/additem', $data);
        }
        else
        {
            $data1 = array(
            'item_name' => $this->input->post('Item_Name'),
            'account_id' => $this->input->post('AccountCode'),
            'official_receipt' => $this->input->post('OfficialReceipt'),
            'quantity' => $this->input->post('Item_Quantity'),
            'del_date' => $this->input->post('datedelivered'),
            'date_rec' => $this->input->post('datereceived'),
            'unit' => $this->input->post('Unit'),
            'cost' => $this->input->post('Cost')
            );

            $data2 = array(
                'exp_date' => $this->input->post('ExpirationDate')
            );

            $this->InventoryModel->add_item($data1,$data2);
            //$this->InventoryModel->add_item($data2);
        }
    }
    public function item_detail($data)
    {
        $this->load->view('modals/itemdetails',$data);
    }
}
