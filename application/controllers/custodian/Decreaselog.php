<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Decreaselog extends CI_Controller {
			public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
		$data['decreaselog'] = $this->inventorymodel->get_decrease_log();
		print_r($data['decreaselog']);
		$this->load->view('custodian/templates/header');
		$this->load->view('custodian/decreaselog',$data);
		$this->load->view('custodian/templates/footer');

	}
}
