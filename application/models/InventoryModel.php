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
        $db1->select('*');
        $db1->from('item');
        $db1->join('account_code', 'item.account_id = account_code.ac_id', 'left');
        $query = $db1->get();
        return $query->result_array();
	}
    public function get_item_detail()
    {
        $db1 = $this->load->database('inventory', TRUE);
        $db1->select('*');
        $db1->from('item');
        $db1->join('item_detail', 'item.item_id = item_detail.item_id', 'left');
        $db1->join('account_code', 'item.account_id = account_code.ac_id', 'left');
        $query = $db1->get();
        return $query->result_array();
    }
    public function get_return_list()
    {
        
    }
    public function get_increase_logs()
    {
    }
     public function get_decrease_log()
    {
    }
    public function get_return_log()
    {
    }

    public function add_item($data, $table)
    {
        $db1 = $this->load->database('inventory');
        return $db1->insert($table, $data);
    }

}