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
    public function get_item_detail($item_id)
    {
        $db1 = $this->load->database('inventory', TRUE);
        $query = $db1->select('*')
                     ->join('item_detail', 'item.item_id = item_detail.item_id', 'left')
                     ->join('account_code', 'item.account_id = account_code.ac_id', 'left')
                     ->get('item');
        return $query->result_array();
    }
    public function get_return_list()
    {
        
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
        $db1->update('item_detail',$data2);
        $db1->where('item_id', $itemid);
    }
    public function add_quantity($data1,$data2,$itemid)
    {
         $db1 = $this->load->database('inventory',TRUE);
        //update item
        $db1->set('quantity', 'quantity+'.$data1, FALSE);
        $db1->update('item');
        $db1->where('item_id',$itemid);
        //update item_detail
        $db1->update('item_detail',$data2);
        $db1->where('item_id', $itemid);
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
        $dbase->where('dept_id', $dept);
        $query = $dbase->get();
        return $query->result_array();
    }

}