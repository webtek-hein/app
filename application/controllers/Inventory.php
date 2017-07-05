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
        $data['item_detail'] = $this->InventoryModel->get_item_detail('2');

		$this->load->view('templates/header');
		$this->load->view('inventory',$data);
        $this->additem();
        $this->load->view('modals/addbulk');
        $this->addquantity();
        $this->load->view('modals/editinventory',$data);
        $this->subtractquantity();
        $this->itemdetail($data);
		$this->load->view('templates/footer');
	}
    public function additem()
    {
    	$data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $this->form_validation->set_rules('Item_Name', 'Item Name','required');
        $this->form_validation->set_rules('Description', 'Item Description','required');
        $this->form_validation->set_rules('AccountCode', 'Account Code', 'required');
        $this->form_validation->set_rules('OfficialReceipt', 'Official Receipt', 'required');
        $this->form_validation->set_rules('ReceivedBy', 'Received By', 'required');
        $this->form_validation->set_rules('Item_Quantity', 'Quantity','required');
        $this->form_validation->set_rules('Supplier_Name', 'Supplier Name','required');
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
            'item_description' => $this->input->post('Description'),
            'account_id' => $this->input->post('AccountCode'),
            'quantity' => $this->input->post('Item_Quantity'),
            'unit' => $this->input->post('Unit'),
            );

            $data2 = array(
                'official_receipt_no' => $this->input->post('OfficialReceipt'),
                'receivedby' => $this->input->post('ReceivedBy'),
                'exp_date' => $this->input->post('ExpirationDate'),
                'del_date' => $this->input->post('datedelivered'),
                'date_rec' => $this->input->post('datereceived'),
                'supplier' => $this->input->post('Supplier_Name'),
                'unit_cost' => $this->input->post('Cost')
            );
            $this->InventoryModel->add_item($data1,$data2);
            $data['item'] = $this->InventoryModel->get_inventory_list();
            header('Location: http://localhost/app/inventory');
        }
    }
    public function addquantity()
    {
        $data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $this->form_validation->set_rules('Official_Receipt1', 'Official Receipt', 'required');
        $this->form_validation->set_rules('Received_By1', 'Received By', 'required');
        $this->form_validation->set_rules('Item_Quantity1', 'Quantity','required');
        $this->form_validation->set_rules('Supplier_Name1', 'Supplier Name','required');
        $this->form_validation->set_rules('datedelivered1', 'Date Delivered', 'required');
        $this->form_validation->set_rules('datereceived1', 'Date Received', 'required');
        $this->form_validation->set_rules('Unit_Cost1', 'Cost', 'required');
        $this->form_validation->set_rules('Expiration_Date1', 'Expiration Date', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('modals/addquantity', $data);
        }
        else
        {
            $data1 = $this->input->post('Item_Quantity1');

            $data2 = array(
                'official_receipt_no' => $this->input->post('Official_Receipt1'),
                'receivedby' => $this->input->post('Received_By1'),
                'exp_date' => $this->input->post('Expiration_Date1'),
                'del_date' => $this->input->post('datedelivered1'),
                'date_rec' => $this->input->post('datereceived1'),
                'supplier' => $this->input->post('Supplier_Name1'),
                'unit_cost' => $this->input->post('Unit_Cost1')
            );
            $this->InventoryModel->add_quantity($data1,$data2,'16');
            $data['item'] = $this->InventoryModel->get_inventory_list();
            header('Location: http://localhost/app/inventory');
        }
    }
    public function subtractquantity(){
        $data['quantitycount'] = $this->InventoryModel->count_item_with_serial('16');
        $this->load->view('modals/subtractquantity',$data);
    }
    public function itemdetail($data)
    {
        $this->load->view('modals/itemdetails',$data);
    }
}
