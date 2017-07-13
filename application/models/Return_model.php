<?php
class Return_model extends CI_Model {

    public function __construct()
    {
        $inventory = $this->load->database('inventory', TRUE);
        $logs = $this->load->database('logs', TRUE);
    }

    public function get_return_log()
    {
        $query = $logs->get('return_log');
        return $query->result_array();
    }

    public function return_items_to_inventory($distid)
    {
        $query1 = $inventory->query("UPDATE distribution SET quantity=quantity-1 WHERE dist_id=$distid");
        $query2 = $inventory->query("UPDATE item SET quantity=quantity+1 WHERE item_id_id=(SELECT item_id FROM item_detail WHERE dist_id = $distid)");
        $query3 = $inventory->query("UPDATE item_detail SET dist_id=NULL WHERE dist_id=$distid LIMIT 1");
    }
}