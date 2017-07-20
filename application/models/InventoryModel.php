<?php
class InventoryModel extends CI_Model {

    
    public function __construct()
    {
        parent:: __construct();
    }

    public function get_ac_list()
    {
        $query = $this->db->get('account_code');
        return $query->result_array();
    }
     public function get_department_list()
    {
        $query = $this->db->get('department');
        return $query->result_array();
    }

	public function get_inventory_list()
	{
        $query = $this->db->select('*')
                     ->get('item');
        return $query->result_array();
	}

    public function get_by_id($id)
    {

        $query = $this->db->select('*')
            ->where('item.item_id', $id)
            ->get('item');

        return $query->result_array();

    }
    public function get_item_detail($id)
    {
        $query = $this->db->select('*')
            ->join('item_detail', 'item.item_id = item_detail.item_id', 'natural')
            ->where('item.item_id', $id)
            ->where('dist_id', null,false)
            ->get('item');

        return $query->result_array();

    }
    public function item_update($where,$data)
    {
        $this->db->update('item', $data, $where);
        //$db1->update('account_code', $data1, $acid);
        return $this->db->affected_rows();
    }
    public function get_increase_log()
    {

            $this->db->Select ('supplier,serial,item_name,date,date_rec,unit_cost,concat(user.first_name," ",user.last_name) as user');
            $this->db->from('logs.increase_log');
            $this->db->join('inventory.item_detail','logs.increase_log.item_det_id = inventory.item_detail.item_det_id','left');
            $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
            $this->db->join('inventory.user','logs.increase_log.user_id = inventory.user.user_id','left');
            $query = $this->db->get();
            return $query->result_array();

    }
    public function get_increase_log_per_user($id)
    {

        $this->db->Select ('supplier,serial,item_name,date,date_rec,unit_cost,concat(user.first_name," ",user.last_name) as user');
        $this->db->from('logs.increase_log');
        $this->db->join('inventory.item_detail','logs.increase_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.user','logs.increase_log.user_id = inventory.user.user_id','left');
        $this->db->where('logs.increase_log.user_id',$id);
        $query = $this->db->get();
        return $query->result_array();

    }

     public function get_decrease_log()
    {

            $this->db->Select('account_code,department,distrib_date,supplier,serial,item_name,date,date_rec,unit_cost,concat(user.first_name," ",user.last_name) as user');
            $this->db->from('logs.decrease_log');
            $this->db->join('inventory.item_detail','logs.decrease_log.item_det_id = inventory.item_detail.item_det_id','left');
            $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
            $this->db->join('inventory.distribution','inventory.distribution.dist_id = inventory.item_detail.dist_id','left');
            $this->db->join('inventory.account_code','inventory.distribution.account_id = inventory.account_code.ac_id','left');
            $this->db->join('inventory.department','inventory.distribution.dept_id = inventory.department.dept_id','left');
            $this->db->join('inventory.user','logs.decrease_log.user_id = inventory.user.user_id','left');
            $query = $this->db->get();
        return $query->result_array();
    }
    public function get_decrease_log_per_user($id)
    {

        $this->db->Select('account_code,department,distrib_date,supplier,serial,item_name,date,date_rec,unit_cost,concat(user.first_name," ",user.last_name) as user');
        $this->db->from('logs.decrease_log');
        $this->db->join('inventory.item_detail','logs.decrease_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.distribution','inventory.distribution.dist_id = inventory.item_detail.dist_id','left');
        $this->db->join('inventory.account_code','inventory.distribution.account_id = inventory.account_code.ac_id','left');
        $this->db->join('inventory.department','inventory.distribution.dept_id = inventory.department.dept_id','left');
        $this->db->join('inventory.user','logs.decrease_log.user_id = inventory.user.user_id','left');
        $this->db->where('logs.decrease_log.user_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_return_log()
    {

        $this->db->Select ('return_id, account_code,department,return_person,logs.return_log.status as item_status,supplier,serial,item_name,date,unit_cost,concat(user.first_name," ",user.last_name) as user,reason,inventory.item.quantity');
        $this->db->from('logs.return_log');
        $this->db->join('inventory.item_detail','logs.return_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.distribution','inventory.distribution.dist_id = logs.return_log.dist_id','left');
         $this->db->join('inventory.account_code','inventory.account_code.ac_id = inventory.distribution.account_id','left');
        $this->db->join('inventory.department','logs.return_log.dept_id = inventory.department.dept_id','left');
        $this->db->join('inventory.user','logs.return_log.user_id = inventory.user.user_id','left');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_return_log_per_user($id)
    {

        $this->db->Select ('return_id, account_code,department,return_person,logs.return_log.status as item_status,supplier,serial,item_name,date,unit_cost,concat(user.first_name," ",user.last_name) as user,reason,inventory.item.quantity');
        $this->db->from('logs.return_log');
        $this->db->join('inventory.item_detail','logs.return_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.distribution','inventory.distribution.dist_id = logs.return_log.dist_id','left');
        $this->db->join('inventory.account_code','inventory.account_code.ac_id = inventory.distribution.account_id','left');
        $this->db->join('inventory.department','logs.return_log.dept_id = inventory.department.dept_id','left');
        $this->db->join('inventory.user','logs.return_log.user_id = inventory.user.user_id','left');
        $this->db->where('logs.return_log.user_id',$id);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_returned()
    {

        $this->db->Select ('return_id, account_code,department,return_person,item_status,supplier,serial,item_name,date,unit_cost,concat(user.first_name," ",user.last_name) as user,reason,inventory.item.quantity');
        $this->db->from('logs.return_log');
        $this->db->join('inventory.item_detail','logs.return_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.distribution','inventory.distribution.dist_id = logs.return_log.dist_id','left');
        $this->db->join('inventory.account_code','inventory.account_code.ac_id = inventory.distribution.account_id','left');
        $this->db->join('inventory.department','logs.return_log.dept_id = inventory.department.dept_id','left');
        $this->db->join('inventory.user','logs.return_log.user_id = inventory.user.user_id','left');
        $this->db->where('return_log.status =', 'pending');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_item($data1,$data2,$data3)
    {
        // insert new item
        $this->db->insert('item', $data1);
        $itemid = $this->db->insert_id();
       //update item detail table
        $this->db->where('item_id', $itemid);
        $this->db->update('item_detail',$data2);
        //update user id on increase_log
        $this->db->join('logs.increase_log','item_detail.item_det_id = logs.increase_log.item_id');
        $this->db->where('user_id', null,false);
        $this->db->update('logs.increase_log',$data3);
    }
    public function add_bulk($data1,$data2,$data3)
    {
        // insert new item
        $this->db->insert('item', $data1);
        $itemid = $this->db->insert_id();
        //update item detail table
        $this->db->where('item_id', $itemid);
        $this->db->update('item_detail',$data2);
        //update user id on increase_log
        $this->db->join('logs.increase_log','item_detail.item_det_id = logs.increase_log.item_id');
        $this->db->where('user_id', null,false);
        $this->db->update('logs.increase_log',$data3);
    }
    public function add_quantity($quantity,$data2,$itemid,$userid)
    {
        //update item
        $this->db->set('quantity', 'quantity+'.$quantity, FALSE);
        $this->db->where('item_id',$itemid);
        $this->db->update('item');
        //update item_detail
        /*$counter = 1;
        while ($counter <= $quantity) {
            $this->db->insert('item_detail', $data2);
            $item_det_id = $this->db->insert_id();
            $this->db->where('item_det_id',$item_det_id);
            $this->db->update('logs.increase_log',$userid);
            $counter++;
        }*/
        $this->db->insert_batch('item_detail',$data2);
        $first_id = $this->db->insert_id();
        $insert_id = range($first_id,($first_id+($quantity-1)));
        $this->db->where_in('item_det_id',$insert_id);
        $this->db->update('logs.increase_log',$userid);
    }

    public function subtract_quantity($data1,$data2,$itemid, $quantity,$uid)
    {
        //update item
        $this->db->set('quantity', 'quantity-'.$data1, FALSE);
        $this->db->where('item_id',$itemid);
        $this->db->update('item');
        //insert in distribution
        $this->db->insert('distribution', $data2);
        $distid = $this->db->insert_id();
        //update item_detail
        $this->db->where('item_detail.item_id',$itemid);
        $this->db->where('item_detail.dist_id',null,false);
        $this->db->where('item_status !=','defective');
        $this->db->limit($quantity);
        $this->db->set('item_detail.dist_id',$distid);
        $this->db->update('item_detail');
        $this->db->join('logs.decrease_log','item_detail.item_det_id = logs.decrease_log.item_id');
        //update user in decrease_log
        $this->db->where('user_id', null,false);
        $this->db->update('logs.decrease_log',$uid);

    }

    public function count_item_with_serial($item_id)
    {
        $where = 'serial is not NULL';
        $query = $this->db->from('item_detail')
                     ->where('item_id',$item_id)
                     ->where($where);
        return $query->count_all_results();
    }

    public function get_item_per_department($dept)
    {
        $this->db->select('*');
        $this->db->from('department');
        $this->db->join('distribution','`distribution`.`dept_id` = `department`.`dept_id`','left');
        $this->db->join('item_detail','`item_detail`.`dist_id` = `distribution`.`dist_id`','left');
        $this->db->join('item','`item_detail`.`item_id` = `item`.`item_id`','left');
        $this->db->where('department.dept_id', $dept);
        $query = $this->db->get();
        return $query->result_array();
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

    public function get_distributed_items() 
    {
        $this->db->select('department,item_det_id, serial, item.item_id as itemid, item_detail.dist_id as distid, item_name, concat(account_code," ",description)as account_code, official_receipt_no, del_date, distrib_date, distribution.quantity, distribution.receivedby, unit_cost, unit');
        $this->db->join('distribution','distribution.dept_id = department.dept_id','left');
        $this->db->join('item_detail','item_detail.dist_id = distribution.dist_id','left');
        $this->db->join('item','item_detail.item_id = item.item_id','left');
        $this->db->join ('account_code','distribution.account_id = account_code.ac_id');
        $where = 'item_detail.dist_id IS NOT NULL';
        $this->db->where($where);
        $query = $this->db->get('department');
        return $query->result_array();
    }

    public function get_department_item($deptid)
    {
        $this->db->select('department,item_det_id, serial, item.item_id as itemid, item_detail.dist_id as distid, item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.receivedby AS receivedby, unit_cost');
        $this->db->join('distribution','distribution.dept_id = department.dept_id','left');
        $this->db->join('item_detail','item_detail.dist_id = distribution.dist_id','left');
        $this->db->join('item','item_detail.item_id = item.item_id','left');
        $this->db->join ('account_code','distribution.account_id = account_code.ac_id');
        $where = 'item_detail.dist_id IS NOT NULL';
        $this->db->where($where);
        $this->db->where('distribution.dept_id',$deptid);
        $query = $this->db->get('department');
        return $query->result_array();
    }

    public function get_summary_items() 
    {
        $this->db->distinct();
        $this->db->select('department, item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.quantity AS quantity, distribution.receivedby, unit_cost, unit');
        $this->db->join('distribution','distribution.dept_id = department.dept_id','left');
        $this->db->join('item_detail','item_detail.dist_id = distribution.dist_id','left');
        $this->db->join('item','item_detail.item_id = item.item_id','left');
        $this->db->join ('account_code','distribution.account_id = account_code.ac_id');
        $this->db->where('item.quantity !=','0');
        $query = $this->db->get('department');
        return $query->result_array();
    }
    public function set_serial($data,$id)
    {
        $this->db->where('item_id',$id);
        $this->db->where('serial',null,false);
        $this->db->set('serial',$data);
        $this->db->limit(1);
        $this->db->update('item_detail');
    }

    public function get_dashboard()
    {
        $this->db->SELECT ('quantity')
            ->FROM('item')
            ->where('item_id<=(SELECT (COUNT(quantity)) * (50.00/100.00) FROM item')
            ->orderby('item_id');
            $query = $this->db->get('item');
        return $query->result_array();
    }
}