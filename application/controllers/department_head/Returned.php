<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returned extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
		$data['return'] = $this->inventorymodel->get_return_log();
		$this->load->view('department_head/templates/header');
		$this->load->view('department_head/return',$data);
		$this->load->view('department_head/templates/footer');

	}
}
