<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returnlog extends CI_Controller {
		public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
		$data['returnlog'] = $this->inventorymodel->get_return_log();
		$this->load->view('templates/header');
		$this->load->view('returnlog',$data);
		$this->load->view('templates/footer');

	}
}