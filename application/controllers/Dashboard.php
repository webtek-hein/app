<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
			$this->load->view('templates/header');
            $this->load->view('dashboard');
			$this->load->view('templates/footer');
	}
	public function graph()
    {
        echo json_encode("Success.");
    }
}
