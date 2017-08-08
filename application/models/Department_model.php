<?php
class Department_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function get_distributed_in_departments()
    {
        $this->db->distinct()
            ->select('item_detail.item_id,distribution.dept_id,account_code,department,item_name,item_description,unit,count(*) as quantity')
            ->join('item','item_detail.item_id = item.item_id','left')
            ->join('distribution','item_detail.dist_id = distribution.dist_id')
            ->join('account_code','account_code.ac_id = distribution.account_id','left')
            ->join('department','distribution.dept_id = department.dept_id')
            ->WHERE('item_detail.dist_id is not null')
            ->WHERE("item_detail.item_status = 'in_stock'")
            ->group_by('item_detail.item_id,distribution.dept_id,account_code');
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }
    
    public function get_distributed_per_department($id)
    {

        $this->db
            ->select('item_type,unit_cost,distribution.dept_id,account_code,item_detail.item_id,department,item_name,item_description,unit,count(*) as quantity')
            ->join('item','item_detail.item_id = item.item_id','left')
            ->join('distribution','item_detail.dist_id = distribution.dist_id')
            ->join('account_code','account_code.ac_id = distribution.account_id','left')
            ->join('department','distribution.dept_id = department.dept_id')
            ->WHERE('item_detail.dist_id is not null')
            ->WHERE("item_detail.item_status = 'in_stock'")
            ->WHERE('distribution.dept_id',$id)
            ->group_by('item_detail.item_id,distribution.dept_id,unit_cost,account_code');
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }

    public function get_distributed_details($item_id,$dept_id)
    {
            $where = "item_detail.dist_id IS NOT NULL AND item_detail.item_status = 'in_stock' AND item_detail.item_id = $item_id AND distribution.dept_id = $dept_id";
            $this->db->select("distribution.quantity,item_det_id, serial, exp_date, supplier, item_description, official_receipt_no, del_date, date_rec, distribution.receivedby, unit_cost, if(exp_date <= DATE(now()),'Expired',item_status) as item_status")
                ->join('item','item_detail.item_id = item.item_id','left')
                ->join('distribution','item_detail.dist_id = distribution.dist_id')
                ->join('department','distribution.dept_id = department.dept_id')
                ->WHERE($where);
            $query = $this->db->get('item_detail');
            return $query->result_array();
    }
    public function department_inventory_list($id)
    {
        $this->db->select('item_detail.item_id,item_name,count(*) as quantity,item_description,unit')
            ->join('distribution','distribution.dist_id = item_detail.dist_id','left')
            ->join('item','item.item_id = item_detail.item_id','left')
            ->where('distribution.dept_id',$id)
            ->group_by('item_detail.item_id');
        $query = $this->db->get('item_detail');
        return $query->result_array();

    }
}