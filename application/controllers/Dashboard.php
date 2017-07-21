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
	    $data['itemsremaining'] = $this->inventorymodel->dashboard_custodian_items_remaining();
        $data['returned'] = $this->inventorymodel->dashborad_custodian_returned_items();
        $data['defecteditems'] = $this->inventorymodel->dashborad_custodian_defected_items();
        $data['received'] = $this->inventorymodel->dashborad_custodian_recieved_items();

        $position = $this->session->userdata['logged_in']['position'];
        if($position === 'receiver'){
            $this->load->view('receiver/header');
        }else if($position === 'department head'){
            $this->load->view('department_head/header');
        }else{
             $this->load->view('templates/header');
        }
            $this->load->view('dashboard',$data);
			$this->load->view('templates/footer');
	}
	public function graph()
    {	
    	$data = $this->inventorymodel->get_dashboard();
        echo json_encode($data);

    }
}
