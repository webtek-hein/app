<?php
class Log_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }

    //get all increase records from db
     public function get_increase_log()
    {
        $this->db->Select ('inventory.item.item_name,count(inventory.item_detail.item_id) as quantity,date,inventory.item_detail.date_rec,inventory.item_detail.unit_cost,inventory.item_detail.supplier,concat(inventory.user.first_name," ",inventory.user.last_name) as user');
            $this->db->join('inventory.item_detail','item_detail.item_det_id = increase_log.item_det_id','left');
            $this->db->join('inventory.item','item.item_id = item_detail.item_id','left');
            $this->db->join('inventory.user','user.user_id = increase_log.user_id','left');
            $this->db->group_by('date,inventory.item.item_name');
            $query = $this->db->get('logs.increase_log');
            return $query->result_array();
    }

    //get all decrease records from db
    public function get_decrease_log()
    {
        $this->db->Select('serial,item_name,distribution.quantity AS quantity,date,supplier,distrib_date,unit_cost,CONCAT(user.first_name," ", user.last_name) AS user,department');
        $this->db->from('logs.decrease_log');
        $this->db->join('inventory.item_detail','logs.decrease_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.distribution','inventory.distribution.dist_id = inventory.item_detail.dist_id','left');
        $this->db->join('inventory.department','inventory.distribution.dept_id = inventory.department.dept_id','left');
        $this->db->join('inventory.user','logs.decrease_log.user_id = inventory.user.user_id','left');
        $this->db->distinct();
        $query = $this->db->get();
        return $query->result_array();
    }

    //get all return records from db
      public function get_return_log()
    {
        $this->db->Select ('item_name,COUNT(return_log.item_det_id) AS quantity,date,department,return_person,reason,CONCAT(inventory.user.first_name," ",inventory.user.last_name) AS user');
        $this->db->from('logs.return_log');
        $this->db->join('inventory.department','logs.return_log.dept_id = inventory.department.dept_id','left');
        $this->db->join('inventory.item_detail','inventory.item_detail.item_det_id = return_log.item_det_id','left');
        $this->db->join('inventory.item','inventory.item.item_id = inventory.item_detail.item_id','left');
        $this->db->join('inventory.user','user.user_id = return_log.user_id','left');
        $this->db->group_by('return_log.item_det_id , return_log.dept_id , date ,department, return_person , reason , user');
        $this->db->distinct();


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

    public function get_edit_log()
    {
        $this->db->Select ('before_item_name, after_item_name, before_description, after_description, before_unit, after_unit, date, concat(user.first_name, ,user.last_name) as user');
        $this->db->from('logs.edit_log');
        $this->db->join('inventory.user','logs.edit_log.user_id = inventory.user.user_id','left');
        $query = $this->db->get();
        return $query->result_array();
    }

    
}