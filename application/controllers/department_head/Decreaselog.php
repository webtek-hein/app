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
		$this->load->view('templates/header');
		$this->load->view('decreaselog',$data);
		$this->load->view('templates/footer');

	}
}
