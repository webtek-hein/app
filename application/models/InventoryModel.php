<?php
class InventoryModel extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
        $db1 = $this->load->database('inventory', TRUE);
        $db2 = $this->load->database('logs', TRUE);
    }

    public function get_ac_list()
    {
        $query = $db1->get('account_code');
        return $query->result();
    }

	public function get_inventory_list()
	{
        
	}
    public function get_item_per_dept()
    {

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

}