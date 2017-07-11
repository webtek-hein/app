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

		$this->load->view('templates/header');
        $this->load->view('custodian/inventory');
        $this->additem();
        $this->subtractquantity();
        $this->addquantity();
        $this->itemdetail();
        $this->load->view('templates/footer');

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

    public function additem()
    {
    	$data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $this->form_validation->set_rules('Item_Name', 'Item Name','required');
        $this->form_validation->set_rules('Description', 'Item Description','required');
        $this->form_validation->set_rules('AccountCode', 'Account Code', 'required');
        $this->form_validation->set_rules('OfficialReceipt', 'Official Receipt', 'required|integer');
        $this->form_validation->set_rules('ReceivedBy', 'Received By', 'required');
        $this->form_validation->set_rules('Item_Quantity', 'Quantity','required|integer');
        $this->form_validation->set_rules('Supplier_Name', 'Supplier Name','required');
        $this->form_validation->set_rules('datedelivered', 'Date Delivered', 'required');
        $this->form_validation->set_rules('datereceived', 'Date Received', 'required');
        $this->form_validation->set_rules('Unit', 'Unit', 'required');
        $this->form_validation->set_rules('Cost', 'Cost', 'required|integer');
        $this->form_validation->set_rules('ExpirationDate', 'Expiration Date', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('custodian/modals/additem', $data);
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
            $this->load->view('custodian/modals/addquantity', $data);
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
            $data3 = $this->input->post('item_id');
            $this->InventoryModel->add_quantity($data1,$data2,$data3);
            $data['item'] = $this->InventoryModel->get_inventory_list();
            header('Location: http://localhost/app/custodian/inventory');
        }
    }

    public function subtractquantity(){
        $firstname = ($this->session->userdata['logged_in']['firstname']);
        $lastname = ($this->session->userdata['logged_in']['lastname']);
        $data['department'] = $this->InventoryModel->get_department_list();
        $this->form_validation->set_rules('Quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('date', 'Date','required');
        $this->form_validation->set_rules('usage', 'Usage','required');
        $this->form_validation->set_rules('receivedby', 'Received By','required');
        $this->form_validation->set_rules('item_id', 'Item','required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('custodian/modals/subtractquantity', $data);
        }
        else
        {
            $item_id = $this->input->post('item_id');
            $data['quantitycount'] = $this->InventoryModel->get_item_quantity($item_id);
            $data1 = $this->input->post('Quantity');
            $data2 =array(
                'quantity' => $data1,
                'distrib_date' => $this->input->post('date'),
                'dept_id' => $this->input->post('department'),
                'receivedby' => $this->input->post('receivedby'),
                //temp
                'user_distribute' => $firstname . ' ' . $lastname
                );
            $this->InventoryModel->subtract_quantity($data1, $data2, $item_id, $data1);
            //$data['item'] = $this->InventoryModel->get_inventory_list();
            header('Location: http://localhost/app/custodian/inventory');
        }
    }

    public function itemdetail()
    {
        $item_id = $this->input->post('item_id');
        $data['item_detail'] = $this->InventoryModel->get_item_detail($item_id);
        echo json_encode($data['item_detail']);
        $this->load->view('custodian/modals/itemdetails',$data);
    }

    public function get_quantity()
    {
        $item = $this->input->post('item_id');
        $data['quantitycount'] = $this->InventoryModel->get_item_quantity($item);

        $this->load->view('custodian/modals/subtractquantity',$data);
    }
}
