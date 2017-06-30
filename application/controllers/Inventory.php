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
		$this->load->view('templates/header');
		$this->load->view('inventory');
		$this->load->view('modals/editinventory');
		$this->load->view('modals/additem',$data);
		$this->load->view('modals/addquantity');
		$this->load->view('modals/addbulk');
		$this->load->view('modals/subtractquantity');
		$this->load->view('modals/itemdetails');
		$this->load->view('templates/footer');

	}
}
