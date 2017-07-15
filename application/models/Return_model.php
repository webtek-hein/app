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
    public function return_items_to_inventory($item, $person, $reason, $userid)
    {
        //for return_log
        $query = $this->db->query("SELECT dept_id FROM inventory.distribution WHERE dist_id = (SELECT dist_id FROM item_detail WHERE item_det_id = $item)");
        $row = $query->row_array();
        $deptid = intval($row['dept_id']) ;

        $this->db->query("UPDATE distribution SET quantity=quantity-1 WHERE dist_id=(SELECT dist_id FROM item_detail WHERE item_det_id = $item)");
        $this->db->query("UPDATE item_detail SET dist_id=NULL WHERE item_det_id = $item");
        $this->db->query("UPDATE item SET quantity=quantity+1 WHERE item_id = (SELECT item_id FROM item_detail WHERE item_det_id = $item)");
        $this->db->query("INSERT INTO logs.return_log (reason, item_det_id, dept_id, return_person, user_id) VALUES ('$reason', '$item', '$deptid', '$person', '$userid') ");

    }
}