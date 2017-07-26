<?php
class Department_model extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function get_distributed_in_departments()
    {
        $this->db->distinct()
            ->select('item_detail.item_id,department,item_name,item_description,unit,count(*) as quantity')
            ->join('item','item_detail.item_id = item.item_id','left')
            ->join('distribution','item_detail.dist_id = distribution.dist_id')
            ->join('department','distribution.dept_id = department.dept_id')
            ->WHERE('item_detail.dist_id is not null')
            ->group_by('item_detail.item_id,department');
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }
    
    public function get_distributed_per_department($id)
    {

        $this->db->distinct()
            ->select('item_detail.item_id,department,item_name,item_description,unit,count(*) as quantity')
            ->join('item','item_detail.item_id = item.item_id','left')
            ->join('distribution','item_detail.dist_id = distribution.dist_id')
            ->join('department','distribution.dept_id = department.dept_id')
            ->WHERE('item_detail.dist_id is not null')
            ->WHERE('distribution.dept_id',$id)
            ->group_by('item_detail.item_id,department');
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }

    public function get_distributed_details($id)
    {
        $this->db->select('item_det_id, serial, exp_date, supplier, item_description, official_receipt_no, del_date, date_rec, receivedby, unit_cost')
            ->join('item','item_detail.item_id = item.item_id')
            ->where('dist_id',$id);
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