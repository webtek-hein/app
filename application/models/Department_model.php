<?php
class Department_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function get_distributed_in_departments()
    {
        $query = $this->db->query("SELECT DISTINCT distribution.dist_id as dist_id, department, item_name, item_description, distribution.quantity as quantity, unit FROM department LEFT JOIN distribution ON department.dept_id = distribution.dept_id LEFT JOIN item_detail ON distribution.dist_id = item_detail.dist_id LEFT JOIN item ON item.item_id = item_detail.item_id WHERE item_detail.dist_id IS NOT NULL");
        return $query->result_array();
    }
    
    public function get_distributed_per_department($id)
    {
        $query = $this->db->query("SELECT DISTINCT distribution.dist_id as dist_id, department, item_name, item_description, distribution.quantity as quantity, unit FROM department LEFT JOIN distribution ON department.dept_id = distribution.dept_id LEFT JOIN item_detail ON distribution.dist_id = item_detail.dist_id LEFT JOIN item ON item.item_id = item_detail.item_id WHERE item_detail.dist_id IS NOT NULL AND distribution.dept_id = $id");
        return $query->result_array();
    }

    public function get_distributed_details($id)
    {        
        $query = $this->db->query("SELECT item_det_id, serial, exp_date, supplier, item_description, official_receipt_no, del_date, date_rec, receivedby, unit_cost FROM item_detail NATURAL JOIN item WHERE dist_id = $id");
        return $query->result_array();
    }

}