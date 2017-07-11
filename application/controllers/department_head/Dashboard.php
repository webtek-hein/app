<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
			$this->load->view('department_head/templates/header');
            $this->load->view('department_head/custodian/dashboard');
			$this->load->view('department_head/templates/footer');
	}
}
