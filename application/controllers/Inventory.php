<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('inventory');
		$this->load->view('modals/additem');
		$this->load->view('modals/addbulk');
		$this->load->view('templates/footer');

	}
}
