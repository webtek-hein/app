<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returned extends CI_Controller {
	public function index()
	{
		$this->load->view('custodian/templates/header');
		$this->load->view('custodian/return');
		$this->load->view('custodian/templates/footer');

	}
}