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
		$this->load->view('inventory',$data);
        $this->load->view('modals/addbulk');
        $this->load->view('modals/editinventory',$data);
		$this->load->view('templates/footer');
	}
    public function itemdetail()
    {
        $item_id = $this->input->post('item_id');
        $data['item_detail'] = $this->InventoryModel->get_item_detail($item_id);

        $this->load->view('modals/itemdetails',$data);
    }
}
