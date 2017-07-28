<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returned extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InventoryModel');
        $this->load->model('return_model');
    }
	public function index()
	{
        $position = $this->session->userdata['logged_in']['position'];
        $data['accountcodes'] = $this->InventoryModel->get_ac_list();

        if($position === 'department head'){
            $this->load->view('department_head/templates/header');
        }else{
            $this->load->view('templates/header');
        }
		$this->load->view('return');
        $this->load->view('modals/replace', $data);
        $this->load->view('modals/noaction');
		$this->load->view('templates/footer');

	}
	public function returned_list()
    {
        $position = $this->session->userdata['logged_in']['position'];
        $user_id = $this->session->userdata['logged_in']['userid'];

        if($position == 'admin' || $position == 'custodian'){
            $return = $this->InventoryModel->get_returned();
        }else{
            $return = $this->InventoryModel->get_returned_per_user($user_id);
        }
            $data = array();
            foreach ($return as $list) {
                $row = array();

                $row[] = $list['serial'];
                $row[] = $list['item_name'];
                $row[] = $list['account_code'];
                $row[] = $list['date'];
                $row[] = $list['supplier'];
                $row[] = $list['department'];
                $row[] = $list['reason'];
                $row[] = $list['item_status'];
                if($position === 'admin' || $position === 'custodian'){
                    $row[] = "<button type=\"button\" data-id = '$list[return_id]' class=\"open-modal-action\" data-toggle=\"modal\" data-target=\"#replacemodal\">Replace</button>".
                        "<button type=\"button\" data-id = '$list[return_id]' class=\"open-modal-action\" data-toggle=\"modal\" data-target=\"#noaction\">No Action</button>";
                }
                $data[] = $row;

            }
            $list = array('data'=>$data);
            echo json_encode($list);
    }

    public function no_action()
    {
        $return_id = $this->input->post('return_id');
        $this->return_model->return_no_action($return_id);
        header('Location: '. base_url() . 'returned');
    }

    public function replace()
    {
        $firstname = ($this->session->userdata['logged_in']['firstname']);
        $lastname = ($this->session->userdata['logged_in']['lastname']);
        $return_id = $this->input->post('return_id');
        $dept_id = $this->return_model->get_dept_id($return_id);
        $data =array(
            'quantity' => 1,
            'distrib_date' => $this->input->post('date'),
            'dept_id' => $dept_id,
            'receivedby' => $this->input->post('receivedby'),
            'account_id' => $this->input->post('AccountCode'),
            'user_distribute' => $firstname . ' ' . $lastname
        );
        $uid = array('user_id' => $this->session->userdata['logged_in']['userid']);
        $this->return_model->return_replace($return_id, $data, $uid);
        header('Location: '. base_url() . 'returned');
    }
}
