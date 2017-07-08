<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Increaselog extends CI_Controller {
			public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
		$data['increaselog'] = $this->inventorymodel->get_increase_log();
		$this->load->view('department_head/templates/header');
		$this->load->view('department_head/increaselog', $data);
		$this->load->view('department_head/templates/footer');

	}
}
