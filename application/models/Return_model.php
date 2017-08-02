<?php
class Return_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function return_items_to_inventory($item, $person, $reason, $userid)
    {
        $quant = count($item);
        $this->db->select('dist_id');
        $this->db->where_in('item_det_id', $item);
        $query = $this->db->get('item_detail');
        $distids = $query->result_array();

        $dept_ids = array();
        $dist_ids = array();
        foreach ($distids as $dist_id) {
            $this->db->where('dist_id',$dist_id['dist_id']);
            $this->db->set('quantity','quantity-1',FALSE);
            $this->db->update("distribution");

            $this->db->select('dept_id');
            $this->db->where('dist_id',$dist_id['dist_id']);
            $query = $this->db->get('distribution');
            $row = $query->row_array();
            $deptid = intval($row['dept_id']) ;
            array_push($dept_ids, $deptid);
            array_push($dist_ids, $dist_id['dist_id']);
        }

        $this->db->set('item_status','returned');
        $this->db->where_in('item_det_id',$item);
        $this->db->update('item_detail');
        
        $this->db->set('quantity','quantity+'.$quant,FALSE);
        $this->db->update('item');

        $data = array();
        $index = 0;
        foreach($item as $item_det_id)
        {
            $data[] = array('reason'=>$reason,
                'dept_id' => $dept_ids[$index],
                'item_det_id' =>$item_det_id['item_det_id'],
                'return_person' => $person,
                'dist_id' => $dist_ids[$index],
                'user_id' => $userid);

            $index++;
        }
        $this->db->insert_batch('logs.return_log',$data);
    }

    public function get_item_quantity($item_id)
    {
        $where = 'serial is not null and dist_id is null and item_status != "defective"';
        $this->db->select('count(*) as quantity');
        $this->db->from('item_detail');
        $this->db->where($where);
        $this->db->where('item_detail.item_id', $item_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function return_no_action($id) 
    {
        $this->db->set('status','no action');
        $this->db->where('return_id',$id);
        $this->db->update('logs.return_log');
    }

    public function return_replace($id, $data, $uid) 
    {
        //update return log
        $this->db->set('status','replaced');
        $this->db->where('return_id',$id);
        $this->db->update('logs.return_log');

        $this->db->select('dist_id')
                ->where('return_id',$id);
        $dist = $this->db->get('logs.return_log');

        //get item id
        $this->db->select('item_id')
            ->where('dist_id',$dist->row()->dist_id);
        $query1 = $this->db->get('item_detail');
        $row1 = $query1->row_array();
        $itemid = intval($row1['item_id']);

        //get item quantity
        $where = 'serial is not null and dist_id is null and item_status != "defective" AND exp_date >= NOW()';
        $this->db->select('count(*) as quantity');
        $this->db->from('inventory.item_detail');
        $this->db->where($where);
        $this->db->where('item_detail.item_id', $itemid);
        $query2 = $this->db->get();
        $row2 = $query2->row_array();
        $quantity = intval($row2['quantity']);

        if ($quantity > 0) {
            //update item
            $this->db->set('quantity', 'quantity-1', FALSE);
            $this->db->where('item_id',$itemid);
            $this->db->update('inventory.item');
            //insert in distribution
            $this->db->insert('distribution', $data);
            $distid = $this->db->insert_id();
            //update item_detail
            $this->db->where('item_detail.item_id',$itemid);
            $this->db->where('item_detail.dist_id',null,false);
            $this->db->where('serial !=',null,false);
            $this->db->where('item_status !=','defective');
            $this->db->where('exp_date >=','NOW()', false);
            $this->db->limit(1);
            $this->db->set('item_detail.dist_id',$distid);
            $this->db->update('inventory.item_detail');
            $this->db->join('logs.decrease_log','item_detail.item_det_id = logs.decrease_log.item_id');
            //update user in decrease_log
            $this->db->where('user_id', null,false);
            $this->db->update('logs.decrease_log',$uid);
        }
    }

    public function get_dept_id($return_id) 
    {
        $this->db->select('dept_id')
            ->where('return_id',$return_id);
        $query = $this->db->get('logs.return_log');
        $row = $query->row_array();
        return intval($row['dept_id']);
    }

    public function get_current_quantity($return_id)
    {
        //get item id
        $query1 = $this->db->query("SELECT item_id FROM inventory.item_detail WHERE dist_id = (SELECT dist_id FROM logs.return_log WHERE return_id = $return_id)");
        $row1 = $query1->row_array();
        $itemid = intval($row1['item_id']);

        //get item quantity
        $where = 'serial is not null and dist_id is null and item_status != "defective" AND exp_date >= NOW()';
        $this->db->select('count(*) as quantity');
        $this->db->from('inventory.item_detail');
        $this->db->where($where);
        $this->db->where('item_detail.item_id', $itemid);
        $query = $this->db->get();
        return $query->result_array();
    }
}