<?php
class InventoryModel extends CI_Model {

    
    public function __construct()
    {
        parent:: __construct();
    }

    public function get_ac_list()
    {
        $this->db->order_by('description');
        $query = $this->db->get('account_code');
        return $query->result_array();
    }
     public function get_department_list()
    {
        $this->db->order_by('res_center_code');
        $query = $this->db->get('department');
        return $query->result_array();
    }

	public function get_inventory_list()
	{
        $query = $this->db->select('item_detail.item_id,item_name,item_description,quantity,unit,item_detail.unit_cost')
                    ->join('item_detail','item_detail.item_id = item.item_id','left')
                ->group_by('item_detail.item_id,item_name,item_description,quantity,unit,unit_cost')
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
    public function get_returned_per_user($id)
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
        $this->db->where('return_log.user_id',$id);

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
        $this->db->where('serial !=',null,false);
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
        $this->db->select('department, item_description, item_det_id, serial, item.item_id as itemid, item_detail.dist_id as distid, item_name, concat(account_code," ",description)as account_code, official_receipt_no, del_date, distrib_date, distribution.quantity, distribution.receivedby, unit_cost, unit');
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
        $this->db->distinct();
        $this->db->select('item_detail.item_id,department,item_description, item_det_id, serial, item.item_id as itemid, item_detail.dist_id as distid, item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.quantity, distribution.receivedby AS receivedby, unit_cost, unit');
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
        $this->db->select('department,item_description, item_det_id, item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.quantity AS quantity, distribution.receivedby, unit_cost, unit');
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
        $this->db->where('item_det_id',$id);
        $this->db->set('serial',$data);
        $this->db->update('item_detail');
    }

    public function get_dashboard()
    {
        $this->db->SELECT ('quantity')
            ->where('item_id<=(SELECT (COUNT(quantity)) * (50.00/100.00) FROM item)')
            ->group_by ('item_detail.item_id')
            ->order_by('item_id');
            $query = $this->db->get('item');
        return $query->result_array();
    }


    public function get_distributed_per_department($id)
    {
        $this->db->distinct()
                 ->select('item_detail.item_id,department,distribution.dist_id,item_name,item_description,distribution.quantity,unit')
                 ->join('item_detail','item.item_id = item_detail.item_id','left')
                 ->join('distribution','distribution.dist_id = item_detail.dist_id','left')
                 ->join('department','distribution.dept_id = department.dept_id','left')
                 ->where('distribution.quantity is not null AND serial is not null')
                 ->where('distribution.dept_id',$id)
                 ->group_by('item_detail.item_id');
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function get_distrib_item_details($item_id)
    {
        $this->db->SELECT("item.quantity,item_det_id, serial, exp_date, supplier, official_receipt_no, del_date, date_rec, item_detail.receivedby AS receivedby, unit_cost, distribution.dist_id, item_detail.dist_id, item.item_id, item_detail.item_id")
                ->join('distribution','distribution.dist_id = item_detail.dist_id','left')
                ->join('item','item.item_id = item_detail.item_id')
                ->where('item_detail.item_id',$item_id)
                ->where('item_detail.dist_id',null,FALSE);
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }
    public function get_distributed_details($dept_id,$item_id)
    {
        $this->db->join('distribution','distribution.dist_id = item_detail.dist_id','left')
                 ->where('dept_id',$dept_id)
                 ->where('item_id',$item_id);
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }
    public function dashborad_custodian_ordered_items()
    {
        $this->db->SELECT ('item_detail.official_receipt_no,item_name, quantity,"supplier"');
         $this->db->FROM('item');
        $this->db->join('item_detail','item_detail.item_id = item.item_id','left');
        $this->db->join('logs.increase_log','item_detail.item_det_id = logs.increase_log.item_det_id','left');
        $this->db->limit(10);
            $query = $this->db->get();
            return $query->result_array();

    }

    public function dashborad_custodian_recieved_items()
    {
        $this->db->SELECT('concat(last_name," ",first_name) as user, item_name, item.quantity, item_detail.supplier');
        $this->db->join('item_detail','item.item_id = item_detail.item_id');
        $this->db->join('logs.increase_log','item_detail.item_det_id = logs.increase_log.item_det_id');
        $this->db->join('user','user.user_id = increase_log.user_id');
        $this->db->limit(10);
        $this->db->distinct();
        $query = $this->db->get('item');

        return $query->result_array();
    }

     public function dashborad_custodian_returned_items()
     {
         $this->db->SELECT('concat(last_name," ",first_name) as user, item_name, distribution.quantity, reason, department');
         $this->db->join('item_detail','item.item_id = item_detail.item_id');
         $this->db->join('logs.return_log','item_detail.item_det_id = logs.return_log.item_det_id');
         $this->db->join('distribution','distribution.dist_id = logs.return_log.dist_id');
         $this->db->join('department','distribution.dept_id = department.dept_id');
         $this->db->join('user','user.user_id = return_log.user_id');
         $this->db->limit(10);
            $query = $this->db->get('item');

            return $query->result_array();
     }

     public function dashborad_custodian_defected_items()
     {
         $this->db->SELECT('concat(last_name," ",first_name) as user, item_name, distribution.quantity, item_detail.supplier,reason, department');
         $this->db->join('item_detail','item.item_id = item_detail.item_id');
         $this->db->join('logs.return_log','item_detail.item_det_id = logs.return_log.item_det_id');
         $this->db->join('distribution','distribution.dist_id = logs.return_log.dist_id');
         $this->db->join('department','distribution.dept_id = department.dept_id');
         $this->db->join('user','user.user_id = return_log.user_id');
         $this->db->limit(10);
         $this->db->distinct();
         $query = $this->db->get('item');

         return $query->result_array();
     }

     public function dashboard_custodian_items_remaining(){
        $this->db->select(' official_receipt_no, item_name, quantity, item_type');
      $this->db->join('item_detail','item_detail.item_id = item.item_id','left');
      $this->db->where('quantity <= 30');
      $this->db->order_by('item_name');
      $this->db->limit(10);
      $this->db->distinct();
        $query = $this->db->get('item');
        return $query->result_array();
    }
     public function count_received_items()
     {
        $this->db->select('item_name, count(*) as quantity');
        $this->db->join('item',' item.item_id = item_detail.item_id','left');
         $this->db->where ('DATE(date_rec) =  CURDATE()');
         $this->db->group_by ('item_detail.item_id');
                $query = $this->db->get('item_detail');
        return $query->result_array();
    }

     public function count_received_item()
     {

        $this->db->select('COUNT(item.item_id) AS quantity');
                $query = $this->db->get('inventory.item');
        return $query->result_array();
    }
 public function count_ret_items()
     {
$this->db->select('COUNT(logs.return_log.user_id) AS user');
$this->db->join ('inventory.user','logs.return_log.user_id = inventory.user.user_id');
$this->db->where ('DATE(date) = CURDATE()');
$query = $this->db->get('logs.return_log');
        return $query->result_array(); 
    }

         public function count_def_items()
     {
$this->db->select('COUNT(item_detail.item_status) AS status');
$this->db->where('item_detail.item_status','defective');
$this->db->order_by('del_date');
        $query = $this->db->get('inventory.item_detail');
        return $query->result_array(); 
    }

           public function count_pending_users()
     {  
        $this->db->select('count(*) as status');
        $this->db->where('status','pending');
        $query = $this->db->get('user');
        return $query->result_array(); 

    }

    public function pie_graph(){
        $this->db->select('item_name, quantity');
        $this->db->limit(10);
        $this->db->order_by('quantity');
        $query = $this->db->get('item');
        return $query->result_array(); 
    }
    public function pie_graph_per_dept($id){
        $this->db
            ->select('item_name,count(item_detail.item_id) as quantity')
            ->join('item','item_detail.item_id = item.item_id','left')
            ->join('distribution','item_detail.dist_id = distribution.dist_id')
            ->WHERE('item_detail.dist_id is not null')
            ->WHERE("item_detail.item_status = 'in_stock'")
            ->WHERE('distribution.dept_id',$id)
            ->group_by('item_detail.item_id,distribution.dept_id,unit_cost');
        $this->db->limit(10);
        $this->db->order_by('quantity');

        $query = $this->db->get('item_detail');
        return $query->result_array();

    }

    public function count_rec_items_per_dept($deptid)
     {
        $this->db->select('dept_id, SUM(quantity) as received');
        $this->db->from('distribution');
        $this->db->where('dept_id', $deptid);
        $this->db->group_by('dept_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}