<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('InventoryModel');
        $this->load->helper('url');
    }
	public function index()
	{

		$data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $data['item'] = $this->InventoryModel->get_inventory_list();
		$data['department'] = $this->InventoryModel->get_department_list();

		$this->load->view('department_head/templates/header');
		$this->load->view('department_head/inventorylist',$data);
		$this->load->view('department_head/templates/footer');
	}
    public function inventory_list()
    {
        $inventory = $this->InventoryModel->get_inventory_list();
        $data = array();
        foreach ($inventory as $item_record) {
            $row = array();
            $row[] = $item_record['item_name'];
            $row[] = $item_record['item_description'];
            $row[] = $item_record['account_code'];
            $row[] = $item_record['quantity'];
            $row[] = $item_record['unit'];
            $row[] = " <button class=\"btn btn-default open-modal-action fa fa-info\" onclick=\"view_det('$item_record[item_id]')\"></button>";
            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function itemdetail($id)
    {
        $data = $this->InventoryModel->get_item_detail($id);
        echo json_encode($data);

    }
    public function item_update()
    {
        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_description' => $this->input->post('desc'),
            'account_id' => $this->input->post('accountcode'),
            'unit' => $this->input->post('unit'),
            'quantity' => $this->input->post('qty'),
        );
        $this->Edit_model->item_update(array('item_id' => $this->input->post('item_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
}
