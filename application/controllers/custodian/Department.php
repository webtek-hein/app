<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('inventorymodel');
    }
	public function index()
	{
		$data['accountcodes'] = $this->inventorymodel->get_ac_list();
		$data['departments'] = $this->inventorymodel->get_department_list();
		$dept_id = $this->input->post('dept_id');

		$data['items'] = $this->inventorymodel->get_item_per_department($dept_id);

		$this->load->view('custodian/templates/header');
		$this->load->view('custodian/department',$data);
		$this->load->view('custodian/modals/summaryofitems');
		$this->load->view('custodian/templates/footer');
	}
}
