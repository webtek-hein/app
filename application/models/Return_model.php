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
    public function return_items_to_inventory($item)
    {
        $inventory = $this->load->database('inventory', TRUE);
        $query1 = $inventory->query("UPDATE distribution SET quantity=quantity-1 WHERE dist_id=(SELECT dist_id FROM item_detail WHERE item_det_id = $item)");
        $query2 = $inventory->query("UPDATE item_detail SET dist_id=NULL WHERE item_det_id = $item");
        $query3 = $inventory->query("UPDATE item SET quantity=quantity+1 WHERE item_id = (SELECT item_id FROM item_detail WHERE item_det_id = $item)");

        //for return_log
        //$query4 = $inventory->query("INSERT INTO return_log (reason, item_det_id, dept_id, return_person, status, user_id) VALUES () ");
    }
}