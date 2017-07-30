<?php
class Log_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }

    //get all increase records from db
     public function get_increase_log()
    {
        $this->db->Select ('inventory.item.item_name,inventory.item.item_description,count(inventory.item_detail.item_id) as quantity,inventory.item.unit,inventory.item.item_type,date,inventory.item_detail.date_rec,inventory.item_detail.unit_cost,inventory.item_detail.supplier,concat(inventory.user.first_name," ",inventory.user.last_name) as user');
            $this->db->join('inventory.item_detail','item_detail.item_det_id = increase_log.item_det_id','left');
            $this->db->join('inventory.item','item.item_id = item_detail.item_id','left');
            $this->db->join('inventory.user','user.user_id = increase_log.user_id','left');
            $this->db->group_by('date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description');
            $query = $this->db->get('logs.increase_log');
            return $query->result_array();
    }

    //get all decrease records from db
    public function get_decrease_log()
    {
        $this->db->Select('inventory.item_detail.item_id,department,item_name, item_description,count(inventory.item_detail.item_id) as quantity,unit,item_type,date,concat(inventory.user.first_name," ",inventory.user.last_name) as user');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = decrease_log.item_det_id','left');
        $this->db->join('inventory.item','item_detail.item_id = item.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = item_detail.dist_id','left');
        $this->db->join('inventory.department','distribution.dept_id = department.dept_id','left');
        $this->db->join('inventory.user','user.user_id = decrease_log.user_id','left');
        $this->db->where('inventory.item_detail.item_status !=','defective');
        $this->db->group_by('date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description');
        $query = $this->db->get('logs.decrease_log');
        return $query->result_array();
    }

    //get all return records from db
      public function get_return_log()
    {
        $this->db->Select ('inventory.item_detail.item_id,distribution.dist_id,department,item_name, item_description,count(inventory.item_detail.item_id) as quantity,unit,date,concat(inventory.user.first_name," ",inventory.user.last_name) as user,return_person');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = return_log.item_det_id','left');
        $this->db->join('inventory.item','item_detail.item_id = item.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = item_detail.dist_id','left');
        $this->db->join('inventory.department','distribution.dept_id = department.dept_id','left');
        $this->db->join('inventory.user','user.user_id = return_log.user_id','left');
        $this->db->group_by('date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description');
        $query = $this->db->get('logs.return_log');
        return $query->result_array();
    }

     public function get_increase_log_per_user($id)
    {
        $this->db->Select ('inventory.item.item_name,inventory.item.item_description,count(inventory.item_detail.item_id) as quantity,inventory.item.unit,inventory.item.item_type,date,inventory.item_detail.date_rec,inventory.item_detail.unit_cost,inventory.item_detail.supplier,concat(inventory.user.first_name," ",inventory.user.last_name) as user');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = increase_log.item_det_id','left');
        $this->db->join('inventory.item','item.item_id = item_detail.item_id','left');
        $this->db->join('inventory.user','user.user_id = increase_log.user_id','left');
        $this->db->group_by('date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description');
        $this->db->where('logs.increase_log.user_id',$id);
        $query = $this->db->get('logs.increase_log');
        return $query->result_array();

    }

    public function get_decrease_log_per_user($id)
    {
        $this->db->Select('inventory.item_detail.item_id,department,item_name, item_description,count(inventory.item_detail.item_id) as quantity,unit,item_type,date,concat(inventory.user.first_name," ",inventory.user.last_name) as user');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = decrease_log.item_det_id','left');
        $this->db->join('inventory.item','item_detail.item_id = item.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = item_detail.dist_id','left');
        $this->db->join('inventory.department','distribution.dept_id = department.dept_id','left');
        $this->db->join('inventory.user','user.user_id = decrease_log.user_id','left');
        $this->db->group_by('date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description');
        $this->db->where('inventory.item_detail.item_status !=','defective');
        $this->db->where('logs.decrease_log.user_id',$id);
        $query = $this->db->get('logs.decrease_log');
        return $query->result_array();
    }

 public function get_return_log_per_user($id)
    {
        $this->db->Select ('item_detail.item_id,distribution.dist_id,department,item_name, item_description,count(inventory.item_detail.item_id) as quantity,unit,date,concat(inventory.user.first_name," ",inventory.user.last_name) as user,return_person');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = return_log.item_det_id','left');
        $this->db->join('inventory.item','item_detail.item_id = item.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = item_detail.dist_id','left');
        $this->db->join('inventory.department','distribution.dept_id = department.dept_id','left');
        $this->db->join('inventory.user','user.user_id = return_log.user_id','left');
        $this->db->group_by('date,inventory.item.item_name,inventory.user.user_id,inventory.item.item_description');
        $this->db->where('logs.return_log.user_id',$id);


        $query = $this->db->get('logs.return_log');
        return $query->result_array();
    }
    public function return_log_details($dist_id)
    {
        $this->db->Select ('inventory.account_code.account_code,inventory.item_detail.serial,inventory.item_detail.official_receipt_no,inventory.item.item_description,inventory.distribution.item_usage,inventory.distribution.distrib_date,inventory.distribution.receivedby,inventory.item_detail.unit_cost,logs.return_log.reason');
        $this->db->join('inventory.item_detail','item_detail.item_det_id = return_log.item_det_id','left');
        $this->db->join('inventory.item','item.item_id = item_detail.item_id','left');
        $this->db->join('inventory.distribution','distribution.dist_id = return_log.dist_id','left');
        $this->db->join('inventory.account_code','account_code.ac_id = distribution.account_id','left');
        $this->db->group_by('inventory.item_detail.serial');
        $this->db->where('logs.return_log.dist_id',$dist_id);
        $query = $this->db->get('logs.return_log');
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

    
}