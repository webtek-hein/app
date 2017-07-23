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
	    $data['countrecitems'] = $this->inventorymodel->count_received_item();
        $data['returned'] = $this->inventorymodel->dashborad_custodian_returned_items();
        $data['defecteditems'] = $this->inventorymodel->dashborad_custodian_defected_items();
        $data['received'] = $this->inventorymodel->dashborad_custodian_recieved_items();

        $this->load->view('templates/header');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
	}
	public function graph()
    {	
    	$data = $this->inventorymodel->get_dashboard();
        echo json_encode($data);

    }
}
