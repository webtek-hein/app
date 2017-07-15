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
    public function get_return_list()
    {

       // $db1=$this->laod->database('inventory_log', TRUE);
        /*
        $query=$db1->select('*')
                ->join('item_detail', 'item_detail.serial','item_detail.supplier','left')
                ->join('item','item.item_name','left')
                ->join('account_code','account_code.account_code','left')
                ->join('department','department.department','left')
                ->get('item');
                return $query->result_array();
        */
                

    }
    public function get_increase_log()
    {

        $this->load->database();

            $this->db->Select ('serial,item_name,logs.increase_log.date,date_rec,unit_cost','supplier');
            $this->db->from('logs.increase_log');
            $this->db->join('inventory.item_detail','logs.increase_log.item_det_id = inventory.item_detail.item_det_id','left');
            $this->db->join('inventory.user','logs.increase_log.user_id = inventory.user.user_id','left');
            $this->db->join('inventory.item','inventory.item_detail.item_id = inventory.item.item_id','left');

        $query = $this->db->get();
          return $query->result_array();

    }
     public function get_decrease_log()
    {
        $dbase=$this->load->database('inventory', TRUE);

$query = $dbase->query("select serial,item_name,account_code,decrease_log.date,supplier,distrib_date,unit_cost,concat(user.first_name,' ',user.last_name) as user,department from decrease_log
left join item_detail on item_detail.item_det_id = decrease_log.item_det_id
LEFT join item on item.item_id = item_detail.item_id
left join distribution on distribution.dist_id = item_detail.dist_id
LEFT join department on department.dept_id = distribution.dept_id
left join user on user.user_id = decrease_log.user_id
left join account_code on account_code.ac_id = distribution.account_id
");

        return $query->result_array();
    }
    public function get_return_log()
    {

        $dbase=$this->load->database('inventory', TRUE);

        $query = $dbase->query("select serial,item_name,return_log.date,department,supplier,unit_cost,return_person,reason,concat(user.first_name,' ',user.last_name) as user,status from return_log
left join item_detail on item_detail.item_det_id = return_log.item_det_id
left join item on item.item_id = item_detail.item_id
left join distribution on distribution.dist_id = item_detail.dist_id
left join department on department.dept_id = distribution.dept_id
left join user on user.user_id = return_log.user_id
left join account_code on account_code.ac_id = item.account_id
");

        return $query->result_array();
    }

    public function add_item($data1,$data2)
    {
        //load database
        $db1 = $this->load->database('inventory',TRUE);
        // insert new item
        $db1->insert('item', $data1);
        $itemid = $db1->insert_id();
       //update item detail table
        $db1->where('item_id', $itemid);
        $db1->update('item_detail',$data2);
    }
    public function add_quantity($data1,$data2,$itemid)
    {
        $db1 = $this->load->database('inventory',TRUE);
        //update item
        $db1->set('quantity', 'quantity+'.$data1, FALSE);
        $db1->where('item_id',$itemid);
        $db1->update('item');
        //update item_detail
        $counter = 1;
        while ($counter <= $data1) {
            $db1->insert('item_detail', $data2);
            $counter++;
        }
    }

    public function subtract_quantity($data1,$data2,$itemid, $quantity)
    {
        $db1 = $this->load->database('inventory',TRUE);
        //update item
        $db1->set('quantity', 'quantity-'.$data1, FALSE);
        $db1->where('item_id',$itemid);
        $db1->update('item');

        //insert in distribution
        $db1->insert('distribution', $data2);
        $distid = $db1->insert_id();
        //update item_detail
        $db1->query("UPDATE item_detail set item_detail.dist_id = $distid
                    WHERE item_detail.item_id = $itemid 
                    AND item_detail.dist_id is null
                    LIMIT $quantity");
    }

    public function count_item_with_serial($item_id)
    {
        $db1 = $this->load->database('inventory',TRUE);
        $where = 'serial is not NULL';
        $query = $db1->from('item_detail')
                     ->where('item_id',$item_id)
                     ->where($where);
        return $query->count_all_results();
    }

    public function get_item_per_department($dept)
    {
        $dbase = $this->load->database('inventory', TRUE);
        $dbase->select('*');
        $dbase->from('department');
        $dbase->join('distribution','`distribution`.`dept_id` = `department`.`dept_id`','left');
        $dbase->join('item_detail','`item_detail`.`dist_id` = `distribution`.`dist_id`','left');
        $dbase->join('item','`item_detail`.`item_id` = `item`.`item_id`','left');
        $dbase->where('department.dept_id', $dept);
        $query = $dbase->get();
        return $query->result_array();
    }

    public function get_item_quantity($item_id)
    {
        $dbase = $this->load->database('inventory', TRUE);
        $dbase->select('quantity');
        $dbase->from('item');
        $dbase->where('item_id', $item_id);
        $query = $dbase->get();
        return $query->result_array();
    }

    public function get_distributed_items() 
    {
        $dbase = $this->load->database('inventory',TRUE);
        $query = $dbase->query("SELECT item_det_id, serial, item.item_id as 'itemid', item_detail.dist_id as 'distid', item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.quantity, distribution.receivedby, unit_cost, unit FROM department
    LEFT JOIN distribution ON distribution.dept_id = department.dept_id
    LEFT JOIN item_detail ON item_detail.dist_id = distribution.dist_id
    LEFT JOIN item ON item_detail.item_id = item.item_id
    LEFT JOIN  account_code ON distribution.account_id = account_code.ac_id WHERE item_detail.dist_id IS NOT NULL");
        return $query->result_array();
    }

    public function get_department_item($deptid)
    {
        $dbase = $this->load->database('inventory',TRUE);
        $query = $dbase->query("SELECT item_det_id, serial, item.item_id as 'itemid', item_detail.dist_id as 'distid', item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.receivedby AS 'receivedby', unit_cost FROM department
    LEFT JOIN distribution ON distribution.dept_id = department.dept_id
    LEFT JOIN item_detail ON item_detail.dist_id = distribution.dist_id
    LEFT JOIN item ON item_detail.item_id = item.item_id
    LEFT JOIN  account_code ON distribution.account_id = account_code.ac_id WHERE item_detail.dist_id IS NOT NULL AND distribution.dept_id = $deptid");
        return $query->result_array();
    }

    public function get_summary_items() 
    {
        $dbase = $this->load->database('inventory',TRUE);
        $query = $dbase->query("SELECT DISTINCT department, item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.quantity AS quantity, distribution.receivedby, unit_cost, unit FROM department
    LEFT JOIN distribution ON distribution.dept_id = department.dept_id
    LEFT JOIN item_detail ON item_detail.dist_id = distribution.dist_id
    LEFT JOIN item ON item_detail.item_id = item.item_id
    LEFT JOIN  account_code ON distribution.account_id = account_code.ac_id WHERE item_detail.dist_id IS NOT NULL");
        return $query->result_array();
    }
    
}