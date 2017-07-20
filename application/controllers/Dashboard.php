<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
        $position = $this->session->userdata['logged_in']['position'];
        if($position === 'receiver'){
            $this->load->view('receiver/header');
        }else{
            $this->load->view('templates/header');
        }
            $this->load->view('dashboard');
			$this->load->view('templates/footer');
	}
	public function graph()
    {	
    	$data = $this->inventorymodel->get_dashboard();
        echo json_encode($data);

    }
}
