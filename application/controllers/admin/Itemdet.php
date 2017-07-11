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
    }
    public function index()
    {

        $data['accountcodes'] = $this->Item_detail->get_ac_list();
        $data['item'] = $this->Item_detail->get_inventory_list();
        $data['department'] = $this->Item_detail->get_department_list();

        $this->load->view('templates/header');
        $this->load->view('inventorylist',$data);
        $this->load->view('templates/footer');

    }

    public function get_inventory_list()
    {
        $db1 = $this->load->database('inventory', TRUE);
        $query = $db1->select('*')
            ->join('account_code', 'item.account_id = account_code.ac_id', 'left')
            ->get('item');
        return $query->result_array();
    }

    public function ajax_edit($id)
    {
        $data = $this->Item_detail->get_by_id($id);
        echo json_encode($data);
    }
}