<?php
class Log_model extends CI_Model {

    //get all increase records from db
     public function get_increase_log()
    {
        $this->db->Select ('inventory.item.item_name,inventory.item.item_description,count(inventory.item_detail.item_id) as quantity,inventory.item.unit,inventory.item.item_type,date,inventory.item_detail.date_rec,inventory.item_detail.unit_cost,inventory.item_detail.supplier,concat(inventory.user.first_name," ",inventory.user.last_name) as user');
            $this->db->join('inventory.item_detail','item_detail.item_det_id = increase_log.item_det_id','left');
            $this->db->join('inventory.item','item.item_id = item_detail.item_id','left');
            $this->db->join('inventory.user','user.user_id = increase_log.user_id','left');
            $this->db->group_by('date,item.item_name,user.user_id,item.item_description,unit,item_type,date_rec,unit_cost,supplier');
            $query = $this->db->get('logs.increase_log');
            return $query->result_array();
    }

    //get all decrease records from db
    public function get_decrease_log()
    {
        $this->db->Select('item_name,item_description,distribution.dist_id,distribution.quantity,unit,item_type,date,CONCAT(user.first_name," ", user.last_name) AS user,department');
        $this->db->join('inventory.item_detail','logs.decrease_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.distribution','inventory.distribution.dist_id = inventory.item_detail.dist_id','left');
        $this->db->join('inventory.department','inventory.distribution.dept_id = inventory.department.dept_id','left');
        $this->db->join('inventory.user','logs.decrease_log.user_id = inventory.user.user_id','left');
        $this->db->group_by('item_detail.item_id,distribution.dist_id,date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description');
        $query = $this->db->get('logs.decrease_log');
        return $query->result_array();
    }

    public function get_decrease_log_modal()
    {
        $this->db->Select('serial, official_receipt_no, item_description, distrib_date, unit_cost');
        $this->db->join('inventory.item_detail','logs.decrease_log.item_det_id = inventory.item_detail.item_det_id','left');
        $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');
        $this->db->join('inventory.distribution','inventory.distribution.dist_id = inventory.item_detail.dist_id','left');
        $this->db->join('inventory.department','inventory.distribution.dept_id = inventory.department.dept_id','left');
        $this->db->distinct();
        $query = $this->db->get('logs.decrease_log');
        return $query->result_array();
    }


    //get all return records from db
      public function get_return_log()
    {
        $this->db->Select ('item_detail.item_id,distribution.dist_id,department,item_name, item_description,count(*) as quantity,unit,date,concat(inventory.user.first_name," ",inventory.user.last_name) as user,return_person, return_log.dept_id as log_dept_id');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = return_log.item_det_id','left');
        $this->db->join('inventory.item','item_detail.item_id = item.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = item_detail.dist_id','left');
        $this->db->join('inventory.department','distribution.dept_id = department.dept_id','left');
        $this->db->join('inventory.user','user.user_id = return_log.user_id','left');
        $this->db->group_by('logs.return_log.return_person,item_detail.item_id,distribution.dist_id,date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description, log_dept_id');
        $query = $this->db->get('logs.return_log');
        return $query->result_array();
    }

     public function get_increase_log_per_user($id)
    {
        $this->db->Select ('inventory.item.item_name,inventory.item.item_description,count(inventory.item_detail.item_id) as quantity,inventory.item.unit,inventory.item.item_type,date,inventory.item_detail.date_rec,inventory.item_detail.unit_cost,inventory.item_detail.supplier,concat(inventory.user.first_name," ",inventory.user.last_name) as user');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = increase_log.item_det_id','left');
        $this->db->join('inventory.item','item.item_id = item_detail.item_id','left');
        $this->db->join('inventory.user','user.user_id = increase_log.user_id','left');
        $this->db->group_by('date,item.item_name,user.user_id,item.item_description,unit,item_type,date_rec,unit_cost,supplier');
        $this->db->where('logs.increase_log.user_id',$id);
        $query = $this->db->get('logs.increase_log');
        return $query->result_array();

    }

    public function get_decrease_log_per_user($id)
    {
        $this->db->Select('inventory.item_detail.item_id,distribution.dist_id,department,item_name, item_description,count(inventory.item_detail.item_id) as quantity,unit,item_type,date,concat(inventory.user.first_name," ",inventory.user.last_name) as user');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = decrease_log.item_det_id','left');
        $this->db->join('inventory.item','item_detail.item_id = item.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = item_detail.dist_id','left');
        $this->db->join('inventory.department','distribution.dept_id = department.dept_id','left');
        $this->db->join('inventory.user','user.user_id = decrease_log.user_id','left');
        $this->db->group_by('item_detail.item_id,distribution.dist_id,date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description');
        $this->db->where('inventory.item_detail.item_status !=','defective');
        $this->db->where('logs.decrease_log.user_id',$id);
        $query = $this->db->get('logs.decrease_log');
        return $query->result_array();
    }

 public function get_return_log_per_user($id)
    {
        /*$this->db->Select ('item_detail.item_id,distribution.dist_id,department,item_name, item_description,count(inventory.item_detail.item_det_id) as quantity,unit,date,concat(inventory.user.first_name," ",inventory.user.last_name) as user,return_person, distribution.dept_id, return_log.item_det_id as log_item_det_id, return_log.dept_id as log_dept_id, return_log.dist_id as log_dist_id');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = return_log.item_det_id','left');
        $this->db->join('inventory.item','item_detail.item_id = item.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = return_log.dist_id','left');
        $this->db->join('inventory.department','logs.return_log.dept_id = department.dept_id','left');
        $this->db->join('inventory.user','user.user_id = return_log.user_id','left');
        $this->db->group_by('department,logs.return_log.return_person,item_detail.item_id,distribution.dist_id,date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description, log_item_det_id, log_dept_id, log_dist_id');
        $this->db->where('logs.return_log.user_id',$id);


        $query = $this->db->get('logs.return_log');
        return $query->result_array();*/

        $this->db->select ('department, item_name, item_description, count(*) as quantity, unit, date,  concat(inventory.user.first_name," ",inventory.user.last_name) as user, return_person, return_log.dept_id as log_dept_id');
        $this->db->from('logs.return_log');
        $this->db->join('item_detail', 'item_detail.item_det_id = return_log.item_det_id', 'left');
        $this->db->join('department', 'department.dept_id = return_log.dept_id', 'left');
        $this->db->join('distribution', 'distribution.dist_id = return_log.dist_id', 'left');
        $this->db->join('item', 'item_detail.item_id = item.item_id', 'left');
        $this->db->join('inventory.user','user.user_id = return_log.user_id','left');
        $this->db->group_by('department, item_name, item_description, unit, date, user, return_person, log_dept_id');
        $this->db->where('logs.return_log.user_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
public function get_return_log_per_dept($id)
    {
        $this->db->Select ('item_detail.item_id,distribution.dist_id,department,item_name, item_description,count(*) as quantity,unit,date,concat(inventory.user.first_name," ",inventory.user.last_name) as user,return_person, distribution.dept_id, return_log.dept_id as log_dept_id');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = return_log.item_det_id','left');
        $this->db->join('inventory.item','item_detail.item_id = item.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = item_detail.dist_id','left');
        $this->db->join('inventory.department','logs.return_log.dept_id = department.dept_id','left');
        $this->db->join('inventory.user','user.user_id = return_log.user_id','left');
        $this->db->group_by('department,logs.return_log.return_person,item_detail.item_id,distribution.dist_id,date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description, log_dept_id');
        $this->db->where('return_log.dept_id',$id);
        $query = $this->db->get('logs.return_log');
        return $query->result_array();
    }

    public function return_log_details($dept_id, $date)
    {
        $this->db->select ('account_code, serial, official_receipt_no, item_description, item_usage, distrib_date, distribution.receivedby, unit_cost, reason');
        $this->db->from('logs.return_log as return_log');
        $this->db->join('item_detail', 'item_detail.item_det_id = return_log.item_det_id', 'left');
        $this->db->join('department', 'department.dept_id = return_log.dept_id', 'left');
        $this->db->join('distribution', 'distribution.dist_id = return_log.dist_id', 'left');
        $this->db->join('account_code', 'distribution.account_id = account_code.ac_id', 'left');
        $this->db->join('item', 'item_detail.item_id = item.item_id', 'left');
        $this->db->where('return_log.dept_id',$dept_id);
        $this->db->where('return_log.date', $date);
        $query = $this->db->GET();
        return $query->result_array();
    }


    public function get_edit_log()
    {
        $this->db->Select ('before_item_name, after_item_name, before_description, after_description, before_unit, after_unit, date, concat(user.first_name," ",user.last_name) as user');
        $this->db->from('logs.edit_log');
        $this->db->join('inventory.user','logs.edit_log.user_id = inventory.user.user_id','left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_decrease_details($dist_id)
    {
        $this->db->SELECT("account_code, serial, official_receipt_no, item_description, item_usage, distrib_date, distribution.receivedby, unit_cost");
        $this->db->FROM("account_code");
        $this->db->JOIN('distribution','account_code.ac_id = distribution.account_id','left');
        $this->db->JOIN('item_detail','item_detail.dist_id = distribution.dist_id','left');
        $this->db->JOIN('item','item.item_id = item_detail.item_id','left');
        $this->db->WHERE('distribution.dist_id',$dist_id);
        $query = $this->db->GET();
        return $query->result_array();
    }
}