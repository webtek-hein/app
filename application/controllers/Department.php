<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('department');
		$this->load->view('modals/summaryofitems');
		$this->load->view('templates/footer');
	}
}
