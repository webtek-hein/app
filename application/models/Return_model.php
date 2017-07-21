<?php
class Return_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function return_items_to_inventory($item, $person, $reason, $userid)
    {
        $quant = count($item);

        $this->db->select('dist_id')
            ->where_in('item_det_id',$item);
        $query = $this->db->get('item_detail');
        $row = $query->row_array();
        $distid = intval($row['dist_id']) ;


        $this->db->select('dept_id');
        $this->db->where('dist_id',$distid);
        $query = $this->db->get('distribution');
        $row = $query->row_array();
        $deptid = intval($row['dept_id']) ;

        $this->db->where('dist_id',$distid);
        $this->db->set('quantity','quantity-'.$quant,FALSE);
        $this->db->update("distribution");

        $this->db->set('dist_id',null);
        $this->db->set('item_status','defective');
        $this->db->where_in('item_det_id',$item);
        $this->db->update('item_detail');

        $this->db->set('quantity','quantity+'.$quant,FALSE);
        $this->db->update('item');


        $data = array('reason'=>$reason,
                       'item_det_id'=>$item,
                        'dept_id' => $deptid,
                        'return_person' => $person,
                        'dist_id' => $distid,
                        'user_id' => $userid);
        $ret_log = array_fill(1,$quant,$data);
        $this->db->insert_batch('logs.return_log',$ret_log);
    }

    public function return_no_action($id) 
    {
         $this->db->query("UPDATE logs.return_log SET status='no action' WHERE return_id=$id");
    }

    public function return_replace($id, $data, $uid) 
    {
        //update return log
        $this->db->query("UPDATE logs.return_log SET status='replaced' WHERE return_id=$id");

        //get item quantity
        $query1 = $this->db->query("SELECT quantity FROM item WHERE item_id IN (SELECT item_id FROM item_detail WHERE dist_id = (SELECT dist_id FROM logs.return_log WHERE return_id = $id))");
        $row1 = $query1->row_array();
        $quantity = intval($row1['quantity']);

        //get item id
        $query2 = $this->db->query("SELECT item_id FROM item_detail WHERE dist_id = (SELECT dist_id FROM logs.return_log WHERE return_id = $id)");
        $row2 = $query2->row_array();
        $itemid = intval($row2['item_id']);

        if ($quantity > 0) {
            //update item
            $this->db->set('quantity', 'quantity-1', FALSE);
            $this->db->where('item_id',$itemid);
            $this->db->update('item');
            //insert in distribution
            $this->db->insert('distribution', $data);
            $distid = $this->db->insert_id();
            //update item_detail
            $this->db->where('item_detail.item_id',$itemid);
            $this->db->where('item_detail.dist_id',null,false);
            $this->db->where('item_status !=','defective');
            $this->db->limit(1);
            $this->db->set('item_detail.dist_id',$distid);
            $this->db->update('item_detail');
            $this->db->join('logs.decrease_log','item_detail.item_det_id = logs.decrease_log.item_id');
            //update user in decrease_log
            $this->db->where('user_id', null,false);
            $this->db->update('logs.decrease_log',$uid);
        }
    }

    public function get_dept_id($return_id) 
    {
        $query = $this->db->query("SELECT dept_id FROM logs.return_log WHERE return_id=$return_id");
        $row = $query->row_array();
        return intval($row['dept_id']);
    }
}