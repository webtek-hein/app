<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
		$data['accountcodes'] = $this->inventorymodel->get_ac_list();
		$data['department'] = $this->inventorymodel->get_department_list();
		$data['item'] = $this->inventorymodel->get_inventory_list();
		$this->load->view('templates/header');
		$this->load->view('inventory',$data);
		$this->load->view('modals/editinventory');
        $this->additem();
		$this->load->view('modals/addquantity');
		$this->load->view('modals/addbulk');
		$this->load->view('modals/itemdetails');
		$this->load->view('templates/footer');
		
		

	}
    public function additem()
    {
        $this->form_validation->set_rules('ItemName', 'Item Name', 'required');
        $this->form_validation->set_rules('AccountCode', 'Account Code', 'required');
        $this->form_validation->set_rules('OfficialReceipt', 'Official Receipt', 'required');
        $this->form_validation->set_rules('Quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('datedelivered', 'Date Delivered', 'required');
        $this->form_validation->set_rules('datereceived', 'Date Received', 'required');
        $this->form_validation->set_rules('Unit', 'Unit', 'required');
        $this->form_validation->set_rules('Cost', 'Cost', 'required');
        $this->form_validation->set_rules('ExpirationDate', 'Expiration Date', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('modals/additem');
        }
        else
        {
            $data1 = array(
            'item_name' => $this->input->post('ItemName'),
            'account_id' => $this->input->post('AccountCode'),
            'official_receipt' => $this->input->post('OfficialReceipt'),
            'quantity' => $this->input->post('Quantity'),
            'del_date' => $this->input->post('datedelivered'),
            'date_rec' => $this->input->post('datereceived'),
            'unit' => $this->input->post('Unit'),
            'cost' => $this->input->post('Cost')
            );

            $data2 = array(
                'expiration_date' => $this->input->post('ExpirationDate')
            );

            $this->inventorymodel->add_item($data1, 'item');
            $this->inventorymodel->add_item($data2, 'item_detail');
        }
    }
}
