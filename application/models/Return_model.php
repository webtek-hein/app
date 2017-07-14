<?php
class Return_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function get_return_log()
    {
        $query = $logs->get('return_log');
        return $query->result_array();
    }

    //not fully working
    public function return_items_to_inventory($serial)
    {
        $inventory = $this->load->database('inventory', TRUE);
        $query1 = $inventory->query("UPDATE distribution SET quantity=quantity-1 WHERE dist_id=(SELECT dist_id FROM item_detail WHERE serial = $serial)");
        $query2 = $inventory->query("UPDATE item_detail SET dist_id=NULL WHERE serial = $serial");
        //$query3 = $inventory->query("UPDATE item SET quantity=quantity+1 WHERE item_id = (SELECT item_id FROM item_detail WHERE serial = $serial)");
    }
}