<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct()
    {
      	parent::__construct();
		$this->load->model('InventoryModel');
    }
	public function index()
	{

		$data['accountcodes'] = $this->InventoryModel->get_ac_list();
        $data['item'] = $this->InventoryModel->get_inventory_list();
		$data['department'] = $this->InventoryModel->get_department_list();

		$this->load->view('templates/header');
        $this->load->view('custodian/inventory');
        $this->load->view('modals/additem', $data);
        $this->load->view('modals/addquantity', $data);
        $this->load->view('modals/subtractquantity', $data);
        $this->load->view('modals/details');
        $this->load->view('templates/footer');

	}
	public function inventory_list()
    {
        $inventory = $this->InventoryModel->get_inventory_list();
        $data = array();
        foreach ($inventory as $list) {
            $row = array();
            $row[] = $list['item_name'];
            $row[] = $list['item_description'];
            $row[] = $list['quantity'];
            $row[] = $list['unit'];
            $row[] = "<button type=\"button\" data-id = '$list[item_id]' class=\"open-modal-action fa fa-plus\" data-toggle=\"modal\" data-target=\"#addqty\"></button>".
                     "<button type=\"button\" data-id = '$list[item_id]' class=\"open-modal-action fa fa-minus\" onclick=\"subtract_quantity(". $list['item_id'] .")\"></button>".
                     "<button class=\"open-modal-action fa fa-info\" onclick=\"get_item_details(". $list['item_id'] .")\"></button> ";
            $data[] = $row;
           
        }
        $list = array('data'=>$data);
        echo json_encode($list);
    }

    public function additem()
    {
    	$data['accountcodes'] = $this->InventoryModel->get_ac_list();
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
            $this->InventoryModel->add_item($data1,$data2);
            $data['item'] = $this->InventoryModel->get_inventory_list();
            header('Location: '. base_url() . 'custodian/inventory');
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
            
            $this->InventoryModel->add_quantity($data1,$data2,$item_id);
            $data['item'] = $this->InventoryModel->get_inventory_list();
            header('Location: http://localhost/app/custodian/inventory');
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
            $this->InventoryModel->subtract_quantity($data1, $data2, $item_id, $data1);
            //$data['item'] = $this->InventoryModel->get_inventory_list();
            header('Location: http://localhost/app/custodian/inventory');
    
    }

   public function itemdetail($id)
    {
        $details = $this->InventoryModel->get_item_detail($id);
        $data = array();
        foreach ($details as $list) {
            $row = array();
            $row[] = $list['serial'];
            $row[] = $list['exp_date'];
            $row[] = $list['supplier'];
            $row[] = $list['item_description'];
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
}
?>
