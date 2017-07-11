<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itemdet extends CI_Controller
{
    /**
     * Created by PhpStorm.
     * User: markr
     * Date: 10/07/2017
     * Time: 3:14 PM
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Item_detail');

        $this->load->model('InventoryModel');
    }
    public function index()
    {

        $data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $data['item'] = $this->InventoryModel->get_inventory_list();
        $data['department'] = $this->InventoryModel->get_department_list();

        $this->load->view('templates/header');
        $this->load->view('inventorylist',$data);
        $this->load->view('templates/footer');
    }



    public function ajax_edit($id)
    {
        $data = $this->Item_detail->get_by_id($id);
        echo json_encode($data);
    }
}