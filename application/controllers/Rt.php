<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rt extends CI_Controller {
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('returnlog');
		$this->load->view('templates/footer');

	}
}
