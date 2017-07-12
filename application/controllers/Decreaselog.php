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


		$this->load->view('templates/header');
		$this->load->view('decreaselog');
		$this->load->view('templates/footer');

	}
	public function decrease_log_list()
    {

    }
}
