<?php
class InventoryModel extends CI_Model {

    
    public function __construct()
    {
        parent:: __construct();
    }

    public function get_ac_list()
    {
        $db1 = $this->load->database('inventory', TRUE);
        $query = $db1->get('account_code');
        return $query->result_array();
    }
     public function get_department_list()
    {
        $db1 = $this->load->database('inventory', TRUE);
        $query = $db1->get('department');
        return $query->result_array();
    }

	public function get_inventory_list()
	{
        $db1 = $this->load->database('inventory', TRUE);
        $query = $db1->select('*')
                     ->join('account_code', 'item.account_id = account_code.ac_id', 'left')
                     ->get('item');
        return $query->result_array();
	}
    public function get_item_detail($item)
    {
        //echo implode(",",$item);
       // $id = implode(",",$item);
       // echo gettype($id);
//print_r($item);

        $db1 = $this->load->database('inventory', TRUE);
<<<<<<< HEAD
=======
        $query = $db1->select('*')
                     ->join('item_detail', 'item.item_id = item_detail.item_id', 'left')
                     ->join('account_code', 'item.account_id = account_code.ac_id', 'left')
                     ->where('item.item_id', $item)
                     ->get('item');

        return $query->result_array();
>>>>>>> f08917fa173715dee3606308b3e18c0b70c8ae78

    }
    public function get_return_list()
    {
<<<<<<< HEAD
        $db1=$this->laod->database('inventory_log', TRUE);
        $query=$db1->select('*')
                ->join('item_detail', 'item_detail.serial','item_detail.supplier','left')
                ->join('item','item.item_name','left')
                ->join('account_code','account_code.account_code','left')
                ->join('department','department.department','left')
                ->get('item');
                return $query->result_array();

=======
       
>>>>>>> f08917fa173715dee3606308b3e18c0b70c8ae78
    }
    public function get_increase_log()
    {


        $db2=$this->load->database('logs', TRUE);
        $query = $db2->get('increase_log');
        return $query->result_array();
    }
     public function get_decrease_log()
    {
        $db2=$this->load->database('logs', TRUE);
        $query = $db2->get('decrease_log');
        return $query->result_array();
    }
    public function get_return_log()
    {

        $db2=$this->load->database('logs', TRUE);
        $query = $db2->get('return_log');
        return $query->result_array();

    }

    public function add_item($data1,$data2)
    {
        //load database
        $db1 = $this->load->database('inventory',TRUE);
        // insert new item
        $db1->insert('item', $data1);
        $itemid = $db1->insert_id();
       //update item detail table
        $db1->where('item_id', $itemid);
        $db1->update('item_detail',$data2);
    }
    public function add_quantity($data1,$data2,$itemid)
    {
         $db1 = $this->load->database('inventory',TRUE);
        //update item
        $db1->set('quantity', 'quantity+'.$data1, FALSE);
        $db1->where('item_id',$itemid);
        $db1->update('item');
        //update item_detail
        $db1->where('item_id',$itemid);
        $db1->update('item_detail',$data2);
    }

    public function subtract_quantity($data1,$data2,$itemid, $quantity)
    {
        $db1 = $this->load->database('inventory',TRUE);
        //update item
        $db1->set('quantity', 'quantity-'.$data1, FALSE);
        $db1->where('item_id',$itemid);
        $db1->update('item');

        //insert in distribution
        $db1->insert('distribution', $data2);
        $distid = $db1->insert_id();
        //update item_detail
        $db1->query("UPDATE item_detail set item_detail.dist_id = $distid
                    WHERE item_detail.item_id = $itemid 
                    AND item_detail.dist_id is null
                    LIMIT $quantity");
    }

    public function count_item_with_serial($item_id)
    {
        $db1 = $this->load->database('inventory',TRUE);
        $where = 'serial is not NULL';
        $query = $db1->from('item_detail')
                     ->where('item_id',$item_id)
                     ->where($where);
        return $query->count_all_results();
    }

    public function get_item_per_department($dept)
    {
        $dbase = $this->load->database('inventory', TRUE);
        $dbase->select('*');
        $dbase->from('department');
        $dbase->join('distribution','`distribution`.`dept_id` = `department`.`dept_id`','left');
        $dbase->join('item_detail','`item_detail`.`dist_id` = `distribution`.`dist_id`','left');
        $dbase->where('department.dept_id', $dept);
        $query = $dbase->get();
        return $query->result_array();
    }

    public function get_item_quantity($item_id)
    {
        $dbase = $this->load->database('inventory', TRUE);
        $dbase->select('quantity');
        $dbase->from('item');
        $dbase->where('item_id', $item_id);
        $query = $dbase->get();
        $row = $query->result_array();
        //return $row->quantity;
    }

    public function get_distributed_items() 
    {
        $dbase = $this->load->database('inventory',TRUE);
        $query = $dbase->query("SELECT item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.quantity, distribution.receivedby, unit_cost, unit FROM department
    LEFT JOIN distribution ON distribution.dept_id = department.dept_id
    LEFT JOIN item_detail ON item_detail.dist_id = distribution.dist_id
    LEFT JOIN item ON item_detail.item_id = item.item_id
    LEFT JOIN  account_code ON item.account_id = account_code.ac_id WHERE item_detail.dist_id IS NOT NULL");
        return $query->result_array();
    }
}