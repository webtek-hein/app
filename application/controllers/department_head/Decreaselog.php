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
		$this->load->view('department_head/templates/header');
		$this->load->view('department_head/decreaselog');
		$this->load->view('department_head/templates/footer');

	}
}
