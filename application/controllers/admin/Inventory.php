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

		$this->load->view('templates/header');
		$this->load->view('inventorylist',$data);
        $this->load->view('modals/additem', $data);
        $this->load->view('modals/addquantity', $data);
        $this->load->view('modals/subtractquantity', $data);
        $this->load->view('modals/addbulk');
        $this->load->view('modals/editinventory',$data);
		$this->load->view('templates/footer');
	}
    public function inventory_list()
    {
        $inventory = $this->InventoryModel->get_inventory_list();
        $data = array();
        foreach ($inventory as $item_record) {
            $row = array();
            $row[] = $item_record['item_name'];
            $row[] = $item_record['item_description'];
            $row[] = $item_record['quantity'];
            $row[] = $item_record['unit'];
            $row[] = "<button type=\"button\" class=\"btn btn-primary open-modal-action fa fa-plus\" data-id='$item_record[item_id]' data-toggle=\"modal\" data-target=\"#addqty\"></button>".

                                    "<button type=\"button\" class=\"btn btn-danger open-modal-action fa fa-minus\" data-id='$item_record[item_id]' data-toggle=\"modal\" data-target=\"#subqty\"></button>".

                                   " <button class=\"btn btn-warning open-modal-action fa fa-pencil\" onclick=\"edit_inventory('$item_record[item_id]')\"></button>".

                                   " <button class=\"btn btn-default open-modal-action fa fa-info\" onclick=\"view_det('$item_record[item_id]')\"></button>";
            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
    public function additem()
    {

            $data1 = array(
                'item_name' => $this->input->post('Item_Name'),
                'item_description' => $this->input->post('Description'),
                'quantity' => $this->input->post('Item_Quantity'),
                'unit' => $this->input->post('Unit'),
                'item_type' => $this->input->post('Type')
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
        $data3 = array('user_id' => $this->session->userdata['logged_in']['userid']);
        $this->InventoryModel->add_item($data1,$data2,$data3);
        header('Location:'.base_url().'admin/inventory');

    }
    public function addquantity()
    {

        $data1 = $this->input->POST('Item_Quantity1');
        $data2 = array(
            'official_receipt_no' => $this->input->post('Official_Receipt1'),
            'receivedby' => $this->input->post('Received_By1'),
            'exp_date' => $this->input->post('Expiration_Date1'),
            'del_date' => $this->input->post('datedelivered1'),
            'date_rec' => $this->input->post('datereceived1'),
            'supplier' => $this->input->post('Supplier_Name1'),
            'unit_cost' => $this->input->post('Unit_Cost1')
        );
        $item_id=$this->input->POST('item_id');
        $data3 = array('user_id' => $this->session->userdata['logged_in']['userid']);
        $this->InventoryModel->add_quantity($data1,$data2,$item_id,$data3);
        header('Location:'.base_url().'admin/inventory');
        }

    public function subtractquantity(){
        $firstname = ($this->session->userdata['logged_in']['firstname']);
        $lastname = ($this->session->userdata['logged_in']['lastname']);
        $data['department'] = $this->InventoryModel->get_department_list();

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
        $uid = array('user_id' => $this->session->userdata['logged_in']['userid']);
        $this->InventoryModel->subtract_quantity($data1, $data2, $item_id, $data1,$uid);
        //$data['item'] = $this->InventoryModel->get_inventory_list();
        header('Location:'.base_url().'admin/inventory');
    }
    public function edit($id)
    {
        $data = $this->InventoryModel->get_by_id($id);
        echo json_encode($data);
    }

    public function item_update()
    {
        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_description' => $this->input->post('desc'),
            'unit' => $this->input->post('unit'),
            'quantity' => $this->input->post('qty'),
        );
        $this->InventoryModel->item_update(array('item_id' => $this->input->post('item_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function itemdetail($id)
    {
        $data = $this->InventoryModel->get_item_detail($id);
        echo json_encode($data);

    }

    public function get_quantity()
    {
        $item = $this->input->post('item_id');
        $data['quantitycount'] = $this->InventoryModel->get_item_quantity($item);

        $this->load->view('modals/subtractquantity',$data);
    }
}
