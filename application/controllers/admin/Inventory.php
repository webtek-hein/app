<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('inventory');
		$this->load->view('additem');
		$this->load->view('addbulk');
		$this->load->view('subtractquantity');
		$this->load->view('editquantity');
		$this->load->view('editinventory');
		$this->load->view('itemdetails');
		$this->load->view('templates/footer');

	}
}
