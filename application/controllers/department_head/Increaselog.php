<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Increaselog extends CI_Controller {
            public function __construct()
    {
        parent::__construct();
        $this->load->model('inventorymodel');
    }
    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('increaselog');
        $this->load->view('templates/footer');

    }
    public function increase_log_list()
    {
        $increase = $this->inventorymodel->get_increase_log();
        $data = array();
        foreach ($increase as $list) {
            $row = array();
            $row[] = $list['serial'];
            $row[] = $list['item_name'];
            $row[] = $list['account_code'];
            $row[] = $list['date'];
            $row[] = $list['date_rec'];
            $row[] = $list['unit_cost'];
            $row[] = $list['supplier'];
            $row[] = $list['user'];

            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
}
