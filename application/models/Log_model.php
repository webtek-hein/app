<?php
class Log_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }

    //get all increase records from db
     public function get_increase_log()
    {

            $this->db->Select ('item_detail.supplier,item.quantity,item.item_name,logs.increase_log.date,item_detail.date_rec,item_detail.unit_cost,concat(user.first_name," ",user.last_name) as user');
            $this->db->from('logs.increase_log');
            $this->db->join('inventory.item_detail','logs.increase_log.item_det_id = inventory.item_detail.item_det_id','left');
            $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
            $this->db->join('inventory.user','logs.increase_log.user_id = inventory.user.user_id','left');
             $this->db->distinct();
            $query = $this->db->get();
            return $query->result_array();

    }
    //get all decrease records from db
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

    //get all return records from db
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

     public function get_increase_log_per_user($id)
    {

        $this->db->Select ('item_detail.supplier,item_detail.serial,item.item_name,logs.increase_log.date,item_detail.date_rec,item_detail.unit_cost,concat(user.first_name," ",user.last_name) as user');
        $this->db->from('logs.increase_log');
        $this->db->join('inventory.item_detail','logs.increase_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.user','logs.increase_log.user_id = inventory.user.user_id','left');
        $this->db->where('logs.increase_log.user_id',$id);
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

    
}