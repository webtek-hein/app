<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Decrease extends CI_Controller {
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('decreaselog');
		$this->load->view('templates/footer');

	}
}
