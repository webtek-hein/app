<?php
class Return_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function return_items_to_inventory($item, $person, $reason, $userid)
    {
        $query = $this->db->query("SELECT dist_id FROM item_detail WHERE item_det_id = $item");
        $row = $query->row_array();
        $distid = intval($row['dist_id']) ;

        $this->db->select('dept_id');
        $where = 'dist_id = (SELECT dist_id FROM item_detail WHERE item_det_id = '. $item .')';
        $this->db->where($where);
        $query = $this->db->get('distribution');
        $row = $query->row_array();
        $deptid = intval($row['dept_id']) ;

        $condition = 'dist_id=(SELECT dist_id FROM item_detail WHERE item_det_id = '. $item .')';
        $this->db->where($condition);
        $this->db->set('quantity','quantity-1',FALSE);
        $this->db->update("distribution");

        $this->db->set('dist_id',null);
        $this->db->set('item_status','defective');
        $this->db->where('item_det_id',$item);
        $this->db->update('item_detail');

        $this->db->set('quantity','quantity+1',FALSE);
        $condition1 = 'item_id = (SELECT item_id FROM item_detail WHERE item_det_id ='. $item .')';
        $this->db->where($condition1);
        $this->db->update('item');

        $data = array('reason'=>$reason,
                       'item_det_id'=>$item,
                        'dept_id' => $deptid,
                        'return_person' => $person,
                        'dist_id' => $distid,
                        'user_id' => $userid);
        $this->db->insert('logs.return_log',$data);


    }
}