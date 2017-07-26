<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InventoryModel');
        $this->load->model('department_model');

    }
    public function index()
    {
        $position = $this->session->userdata['logged_in']['position'];

        $data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $data['item'] = $this->InventoryModel->get_inventory_list();
        $data['department'] = $this->InventoryModel->get_department_list();
        if($position === 'department head'){
            $this->load->view('department_head/templates/header');
        }else{
            $this->load->view('templates/header');
        }
        if($position === 'department head'){
            $this->load->view('department_head/inventorylist');
        }else{
            $this->load->view('inventory');
        }
        $this->load->view('modals/additem', $data);
        $this->load->view('modals/addquantity', $data);
        $this->load->view('modals/subtractquantity', $data);
        if($position === 'admin' ){
            $this->load->view('modals/edit',$data);
        }
        $this->load->view('modals/addbulk');
        $this->load->view('modals/details');
        $this->load->view('modals/return');
        $this->load->view('templates/footer');


    }
    public function inventory_list()
    {
        $data = array();
        $button = ' ';

        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];


        if($position === 'receiver' || $position === 'department head')
        {
            $inventory = $this->department_model->get_distributed_per_department($dept_id);
        }else{
            $inventory = $this->InventoryModel->get_inventory_list();
        }

        foreach ($inventory as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];
            $row[] = $list['unit'];
            if($position === 'admin'){
                $button = "<button type=\"button\" class=\"btn btn-primary open-modal-action fa fa-plus\" data-id='$list[item_id]' data-toggle=\"modal\" data-target=\"#addqty\"></button>".
                    "<button type=\"button\" class=\"btn btn-danger open-modal-action fa fa-minus\" data-id='$list[item_id]' onclick=\"subtract_quantity(". $list['item_id'] .")\"></button>".
                    " <button class=\"btn btn-warning open-modal-action fa fa-pencil\" onclick=\"edit_inventory('$list[item_id]')\"></button>".
                    " <button class=\"btn btn-default open-modal-action fa fa-info\" onclick=\"get_item_details(". $list['item_id'] .")\"></button>";
            }else if ($position === 'custodian'){
                $button = "<button type=\"button\" data-id = '$list[item_id]' class=\"open-modal-action fa fa-plus\" data-toggle=\"modal\" data-target=\"#addqty\"></button>".
                    "<button type=\"button\" data-id = '$list[item_id]' class=\"open-modal-action fa fa-minus\" onclick=\"subtract_quantity(". $list['item_id'] .")\"></button>".
                    "<button class=\"open-modal-action fa fa-info\" onclick=\"get_item_details(". $list['item_id'] .")\"></button> ";
            }else{
                $button = "<button class=\"open-modal-action fa fa-info\" onclick=\"get_distribution_details(". $list['item_id'] .','.$list['dept_id'] .")\"></button> ";
            }
            $row[] = $button;
            $data[] = $row;

        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
    public function edit($id)
    {
        $data = $this->InventoryModel->get_by_id($id);
        echo json_encode($data);
    }
    public function item_update()
    {
        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_description' => $this->input->post('desc'),
            'unit' => $this->input->post('unit'),
            'quantity' => $this->input->post('qty'),
        );
        $this->InventoryModel->item_update(array('item_id' => $this->input->post('item_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function additem()
    {
        $data1 = array(
            'item_name' => $this->input->post('Item_Name'),
            'item_description' => $this->input->post('Description'),
            'quantity' => $this->input->post('Item_Quantity'),
            'unit' => $this->input->post('Unit'),
            'item_type' => $this->input->post('Type')
        );
        $data2 = array(
            'official_receipt_no' => $this->input->post('OfficialReceipt'),
            'receivedby' => $this->input->post('ReceivedBy'),
            'exp_date' => $this->input->post('ExpirationDate'),
            'del_date' => $this->input->post('datedelivered'),
            'date_rec' => $this->input->post('datereceived'),
            'supplier' => $this->input->post('Supplier_Name'),
            'unit_cost' => $this->input->post('Cost')
        );
        $data3 = array('user_id' => $this->session->userdata['logged_in']['userid']);
        $this->InventoryModel->add_item($data1,$data2,$data3);
        header('Location: '. base_url() . 'inventory');
    }

    public function addbulk()
    {
        for($i = 0;$i < count($this->input->post('Item_Name')); $i++) {

            $data1 = array(
                'item_name' => $this->input->post('Item_Name')[$i],
                'item_description' => $this->input->post('Item_Description')[$i],
                'quantity' => $this->input->post('Item_Quantity')[$i],
                'unit' => $this->input->post('Item_Unit')[$i],
                'item_type' => $this->input->post('Item_Type')[$i]
            );
            $data2 = array(
                'official_receipt_no' => $this->input->post('Item_OfficialReceipt')[$i],
                'receivedby' => $this->input->post('Item_Receivedby')[$i],
                'exp_date' => $this->input->post('Item_Expirationdate')[$i],
                'del_date' => $this->input->post('Item_Deliverydate')[$i],
                'date_rec' => $this->input->post('Item_Datereceived')[$i],
                'supplier' => $this->input->post('Item_Supplier')[$i],
                'unit_cost' => $this->input->post('Item_Cost')[$i]
            );
            $data3 = array('user_id' => $this->session->userdata['logged_in']['userid']);
            $this->InventoryModel->add_bulk($data1, $data2, $data3);
        }
        header('Location: '. base_url() . 'inventory');
    }

    public function addquantity()
    {
        $item_id=$this->input->POST('item_id');
        $data1 = $this->input->POST('Item_Quantity1');
        $data2 = array(
            'official_receipt_no' => $this->input->post('Official_Receipt1'),
            'receivedby' => $this->input->post('Received_By1'),
            'exp_date' => $this->input->post('Expiration_Date1'),
            'del_date' => $this->input->post('datedelivered1'),
            'date_rec' => $this->input->post('datereceived1'),
            'supplier' => $this->input->post('Supplier_Name1'),
            'unit_cost' => $this->input->post('Unit_Cost1'),
            'item_id' => $this->input->post('item_id'),
        );
        $item_details = array_fill(1,$data1,$data2);
        $data3 = array('user_id' => $this->session->userdata['logged_in']['userid']);
        $this->InventoryModel->add_quantity($data1,$item_details,$item_id,$data3);

        header('Location:'.base_url() . 'inventory');
    }
    public function subtractquantity(){
        $firstname = ($this->session->userdata['logged_in']['firstname']);
        $lastname = ($this->session->userdata['logged_in']['lastname']);
        $data['department'] = $this->InventoryModel->get_department_list();

        $item_id = $this->input->post('item_id');
        $data['quantitycount'] = $this->InventoryModel->get_item_quantity($item_id);
        $data1 = $this->input->post('Quantity');
        $data2 =array(
            'quantity' => $data1,
            'distrib_date' => $this->input->post('date'),
            'dept_id' => $this->input->post('department'),
            'receivedby' => $this->input->post('receivedby'),
            'account_id' => $this->input->post('AccountCode'),
            'user_distribute' => $firstname . ' ' . $lastname
        );
        $uid = array('user_id' => $this->session->userdata['logged_in']['userid']);
        $this->InventoryModel->subtract_quantity($data1, $data2, $item_id, $data1,$uid);
        header('Location:' . base_url() . 'inventory');

    }

    public function itemdetail($id)
    {
        $position = $this->session->userdata['logged_in']['position'];
        $dept_id = $this->session->userdata['logged_in']['dept_id'];

        if($position === 'receiver' || $position === 'department head'){
            $details = $this->department_model->get_distributed_details($dept_id,$id);

        }else{
            $details = $this->InventoryModel->get_distrib_item_details($id);
        }
        $data = array();
        foreach ($details as $list) {
            $row = array();
            $row[] = ' <input type="checkbox" name="item-det" id="item_detail" value='.$list['item_det_id'].'>';
            $row[] = $list['serial'];
            $row[] = $list['exp_date'];
            $row[] = $list['supplier'];
            $row[] = $list['official_receipt_no'];
            $row[] = $list['del_date'];
            $row[] = $list['date_rec'];
            $row[] = $list['receivedby'];
            $row[] = $list['unit_cost'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function get_quantity($id)
    {
        $quantity = $this->InventoryModel->get_item_quantity($id);
        $data = array();
        foreach ($quantity as $list) {
            $row = array();
            $row[] = $list['quantity'];
            $data[] = $row;
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }
    public function set_serial()
    {
        $data = $this->input->post('serial');
        $id = $this->input->post('item_det');
        $this->InventoryModel->set_serial($data, $id);

    }
}
?>
