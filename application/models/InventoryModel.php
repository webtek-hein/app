<?php

class InventoryModel extends CI_Model
{


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


        $query = $this->db->select('item_description,item_type,item_name,quantity,unit,sum(cost) as unit_cost,item_id')
            ->from('(SELECT unit, item_type,item_description,item_name,item_detail.item_id,quantity,count(unit_cost)*unit_cost as cost FROM `item_detail`
left join item on item.item_id = item_detail.item_id
group by unit_cost,item_id,item_name,item_description,item_type) as a')
            ->group_by('item_id')
            ->get();
        if (($query->num_rows()) > 0) {
            $item_type = $query->row()->item_type;
            if ($item_type !== 'CO') {
                $query = $this->db->select('item_description,item_type,item_name,sum(quantity) as quantity,unit,sum(cost) as unit_cost,item_id')
                    ->from('(SELECT unit, item_type,item_description,item_name,item_detail.item_id,quantity,quantity*unit_cost as cost FROM `item_detail`
left join item on item.item_id = item_detail.item_id
group by unit_cost,item_id) as a')
                    ->group_by('item_id')
                    ->get();
            }
        }
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
            ->where('dist_id', null, false)
            ->get('item');

        return $query->result_array();

    }

    public function item_update($where, $data)
    {
        $this->db->update('item', $data, $where);
        //$db1->update('account_code', $data1, $acid);
        return $this->db->affected_rows();
    }


    public function get_returned()
    {

        $this->db->Select('return_id, account_code,department,return_person,item_status,supplier,serial,item_name,date,unit_cost,concat(user.first_name," ",user.last_name) as user,reason,inventory.item.quantity');
        $this->db->from('logs.return_log');
        $this->db->join('inventory.item_detail', 'logs.return_log.item_det_id = inventory.item_detail.item_det_id', 'left');
        $this->db->join('inventory.item', 'inventory.item_detail.item_id = inventory.item.item_id', 'left');
        $this->db->join('inventory.distribution', 'inventory.distribution.dist_id = logs.return_log.dist_id', 'left');
        $this->db->join('inventory.account_code', 'inventory.account_code.ac_id = inventory.distribution.account_id', 'left');
        $this->db->join('inventory.department', 'logs.return_log.dept_id = inventory.department.dept_id', 'left');
        $this->db->join('inventory.user', 'logs.return_log.user_id = inventory.user.user_id', 'left');
        $this->db->where('return_log.status =', 'pending');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_returned_per_user($id)
    {

        $this->db->Select('return_id, account_code,department,return_person,item_status,supplier,serial,item_name,date,unit_cost,concat(user.first_name," ",user.last_name) as user,reason,inventory.item.quantity');
        $this->db->from('logs.return_log');
        $this->db->join('inventory.item_detail', 'logs.return_log.item_det_id = inventory.item_detail.item_det_id', 'left');
        $this->db->join('inventory.item', 'inventory.item_detail.item_id = inventory.item.item_id', 'left');
        $this->db->join('inventory.distribution', 'inventory.distribution.dist_id = logs.return_log.dist_id', 'left');
        $this->db->join('inventory.account_code', 'inventory.account_code.ac_id = inventory.distribution.account_id', 'left');
        $this->db->join('inventory.department', 'logs.return_log.dept_id = inventory.department.dept_id', 'left');
        $this->db->join('inventory.user', 'logs.return_log.user_id = inventory.user.user_id', 'left');
        $this->db->where('return_log.status =', 'pending');
        $this->db->where('return_log.user_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_item($data1, $data2, $data3)
    {
        // insert new item
        $this->db->insert('item', $data1);
        $itemid = $this->db->insert_id();
        //update item detail table
        $this->db->where('item_id', $itemid);
        $this->db->update('item_detail', $data2);
        //update user id on increase_log
        $this->db->join('logs.increase_log', 'item_detail.item_det_id = logs.increase_log.item_id');
        $this->db->where('user_id', null, false);
        $this->db->update('logs.increase_log', $data3);
    }

    public function add_bulk($data1, $data2, $data3)
    {
        // insert new item
        $this->db->insert('item', $data1);
        $itemid = $this->db->insert_id();
        //update item detail table
        $this->db->where('item_id', $itemid);
        $this->db->update('item_detail', $data2);
        //update user id on increase_log
        $this->db->join('logs.increase_log', 'item_detail.item_det_id = logs.increase_log.item_id');
        $this->db->where('user_id', null, false);
        $this->db->update('logs.increase_log', $data3);
    }

    public function add_quantity($quantity, $data2, $itemid, $userid, $item_type)
    {
        //update item
        $this->db->set('quantity', 'quantity+' . $quantity, FALSE);
        $this->db->where('item_id', $itemid);
        $this->db->update('item');
        //update item_detail
        if ($item_type === 'CO') {
            $this->db->insert_batch('item_detail', $data2);
            $first_id = $this->db->insert_id();
            $insert_id = range($first_id, ($first_id + ($quantity - 1)));
            $this->db->where_in('item_det_id', $insert_id);
        } else {
            $this->db->insert('item_detail', $data2);
            $this->db->where('item_det_id', $this->db->insert_id());
        }

        $this->db->update('logs.increase_log', $userid);
    }

    public function subtract_quantity($data1, $data2, $itemid, $quantity, $uid)
    {
        $this->db->select('item_type')
            ->where('item_id', $itemid);
        $query = $this->db->get('item');

        $item_type = $query->row()->item_type;


        //update item
        $this->db->set('quantity', 'quantity-' . $data1, FALSE);
        $this->db->where('item_id', $itemid);
        $this->db->update('item');
        //insert in distribution
        $this->db->insert('distribution', $data2);
        $distid = $this->db->insert_id();
        //update item_detail
        $this->db->select('dist_id')
            ->where('dept_id', $data2['dept_id']);
        $query = $this->db->get('distribution');

        $temp = array();
        foreach ($query->result_array() as $dist) {
            $temp[] = $dist['dist_id'];
        }

        $this->db->select('dist_id')
            ->where('item_status', 'returned')
            ->where_in('dist_id', $temp);
        $query = $this->db->get('item_detail');

        $dist_id = array();
        foreach ($query->result_array() as $list) {
            $dist_id[] = $list['dist_id'];
        }
        $this->db->where('item_detail.item_id', $itemid);
        if ($item_type == 'CO') {
            $this->db->where('serial is not null');
        }
        $this->db->where('exp_date > now()');
        $this->db->group_start();
        $this->db->where('item_detail.dist_id', null, false);
        $this->db->or_group_start();
        $this->db->where('item_status !=', 'in_stock');
        if (count($dist_id) > 0) {
            $this->db->where_not_in('dist_id', $dist_id);
        }
        $this->db->group_end();
        $this->db->group_end();
        $this->db->limit($quantity);
        $this->db->set('item_detail.dist_id', $distid);
        $this->db->set('item_detail.item_status', 'in_stock');
        $this->db->update('item_detail');
        $this->db->join('logs.decrease_log', 'item_detail.item_det_id = logs.decrease_log.item_id');
        //update user in decrease_log
        $this->db->where('user_id', null, false);
        $this->db->update('logs.decrease_log', $uid);

    }

    public function count_item_with_serial($item_id)
    {
        $where = 'serial is not NULL';
        $query = $this->db->from('item_detail')
            ->where('item_id', $item_id)
            ->where($where);
        return $query->count_all_results();
    }

    public function get_item_per_department($dept)
    {
        $this->db->select('*');
        $this->db->from('department');
        $this->db->join('distribution', '`distribution`.`dept_id` = `department`.`dept_id`', 'left');
        $this->db->join('item_detail', '`item_detail`.`dist_id` = `distribution`.`dist_id`', 'left');
        $this->db->join('item', '`item_detail`.`item_id` = `item`.`item_id`', 'left');
        $this->db->where('department.dept_id', $dept);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_item_quantity($item_id)
    {
        $where = 'serial is not null and dist_id is null and item_status != "defective" AND exp_date > NOW()';
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
        $this->db->join('distribution', 'distribution.dept_id = department.dept_id', 'left');
        $this->db->join('item_detail', 'item_detail.dist_id = distribution.dist_id', 'left');
        $this->db->join('item', 'item_detail.item_id = item.item_id', 'left');
        $this->db->join('account_code', 'distribution.account_id = account_code.ac_id');
        $where = 'item_detail.dist_id IS NOT NULL';
        $this->db->where($where);
        $query = $this->db->get('department');
        return $query->result_array();
    }

    public function get_department_item($deptid)
    {
        $this->db->distinct();
        $this->db->select('item_detail.item_id,department,item_description, item_det_id, serial, item.item_id as itemid, item_detail.dist_id as distid, item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.quantity, distribution.receivedby AS receivedby, unit_cost, unit');
        $this->db->join('distribution', 'distribution.dept_id = department.dept_id', 'left');
        $this->db->join('item_detail', 'item_detail.dist_id = distribution.dist_id', 'left');
        $this->db->join('item', 'item_detail.item_id = item.item_id', 'left');
        $this->db->join('account_code', 'distribution.account_id = account_code.ac_id');
        $where = 'item_detail.dist_id IS NOT NULL';
        $this->db->where($where);
        $this->db->where('distribution.dept_id', $deptid);
        $query = $this->db->get('department');
        return $query->result_array();
    }

    public function get_summary_items()
    {
        $this->db->distinct();
        $this->db->select('department,item_description, item_det_id, item_name, account_code, official_receipt_no, del_date, distrib_date, distribution.quantity AS quantity, distribution.receivedby, unit_cost, unit');
        $this->db->join('distribution', 'distribution.dept_id = department.dept_id', 'left');
        $this->db->join('item_detail', 'item_detail.dist_id = distribution.dist_id', 'left');
        $this->db->join('item', 'item_detail.item_id = item.item_id', 'left');
        $this->db->join('account_code', 'distribution.account_id = account_code.ac_id');
        $this->db->where('item.quantity !=', '0');
        $query = $this->db->get('department');
        return $query->result_array();
    }

    public function set_serial($data, $id)
    {
        $this->db->where('item_det_id', $id);
        $this->db->set('serial', $data);
        $this->db->update('item_detail');
    }

    public function get_dashboard()
    {
        $this->db->SELECT('quantity')
            ->where('item_id<=(SELECT (COUNT(quantity)) * (50.00/100.00) FROM item)')
            ->group_by('item_detail.item_id')
            ->order_by('item_id');
        $query = $this->db->get('item');
        return $query->result_array();
    }


    public function get_distributed_per_department($id)
    {
        $this->db->distinct()
            ->select('item_detail.item_id,department,distribution.dist_id,item_name,item_description,distribution.quantity,unit')
            ->join('item_detail', 'item.item_id = item_detail.item_id', 'left')
            ->join('distribution', 'distribution.dist_id = item_detail.dist_id', 'left')
            ->join('department', 'distribution.dept_id = department.dept_id', 'left')
            ->where('distribution.quantity is not null AND serial is not null')
            ->where('distribution.dept_id', $id)
            ->group_by('item_detail.item_id');
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function get_distrib_item_details($item_id)
    {
        $where = "item_detail.item_id = $item_id AND (item_detail.dist_id IS null OR item_detail.dist_id IS NOT NULL AND item_detail.item_status = 'returned')";
        $this->db->SELECT("item.quantity,item_det_id, serial, exp_date, supplier, official_receipt_no, del_date, date_rec, item_detail.receivedby AS receivedby, unit_cost, distribution.dist_id, item_detail.dist_id, item.item_id, item_detail.item_id, if(exp_date <= DATE(now()),'Expired',item_status) as item_status")
            ->join('distribution', 'distribution.dist_id = item_detail.dist_id', 'left')
            ->join('item', 'item.item_id = item_detail.item_id')
            ->where($where);
        //->where('item_detail.item_id',$item_id)
        //->where('item_detail.dist_id',null,FALSE);
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }

    public function get_distributed_details($dept_id, $item_id)
    {
        $this->db->join('distribution', 'distribution.dist_id = item_detail.dist_id', 'left')
            ->where('dept_id', $dept_id)
            ->where('item_id', $item_id);
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }

    public function dashborad_custodian_ordered_items()
    {
        $this->db->SELECT('item_detail.official_receipt_no,item_name, quantity,"supplier"');
        $this->db->FROM('item');
        $this->db->join('item_detail', 'item_detail.item_id = item.item_id', 'left');
        $this->db->join('logs.increase_log', 'item_detail.item_det_id = logs.increase_log.item_det_id', 'left');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function dashborad_custodian_recieved_items()
    {
        $this->db->SELECT('concat(last_name," ",first_name) as user, item_name, item.quantity, item_detail.supplier');
        $this->db->join('item_detail', 'item.item_id = item_detail.item_id');
        $this->db->join('logs.increase_log', 'item_detail.item_det_id = logs.increase_log.item_det_id');
        $this->db->join('user', 'user.user_id = increase_log.user_id');
        $this->db->limit(10);
        $this->db->distinct();
        $query = $this->db->get('item');

        return $query->result_array();
    }

    public function dashborad_custodian_returned_items()
    {
        $this->db->SELECT('concat(last_name," ",first_name) as user, item_name, distribution.quantity, reason, department');
        $this->db->join('item_detail', 'item.item_id = item_detail.item_id');
        $this->db->join('logs.return_log', 'item_detail.item_det_id = logs.return_log.item_det_id');
        $this->db->join('distribution', 'distribution.dist_id = logs.return_log.dist_id');
        $this->db->join('department', 'distribution.dept_id = department.dept_id');
        $this->db->join('user', 'user.user_id = return_log.user_id');
        $this->db->limit(10);
        $query = $this->db->get('item');

        return $query->result_array();
    }

    public function dashborad_custodian_defected_items()
    {
        $this->db->SELECT('concat(last_name," ",first_name) as user, item_name, distribution.quantity, item_detail.supplier,reason, department');
        $this->db->join('item_detail', 'item.item_id = item_detail.item_id');
        $this->db->join('logs.return_log', 'item_detail.item_det_id = logs.return_log.item_det_id');
        $this->db->join('distribution', 'distribution.dist_id = logs.return_log.dist_id');
        $this->db->join('department', 'distribution.dept_id = department.dept_id');
        $this->db->join('user', 'user.user_id = return_log.user_id');
        $this->db->limit(10);
        $this->db->distinct();
        $query = $this->db->get('item');

        return $query->result_array();
    }

    public function dashboard_custodian_items_remaining()
    {
        $this->db->select(' official_receipt_no, item_name, quantity, item_type');
        $this->db->join('item_detail', 'item_detail.item_id = item.item_id', 'left');
        $this->db->where('quantity <= 30');
        $this->db->order_by('item_name');
        $this->db->limit(10);
        $this->db->distinct();
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function count_received_items()
    {
        $this->db->select('count(DISTINCT item.item_id) as quantity');
        $this->db->join('item_detail', 'item.item_id = item_detail.item_id', 'left');
        $this->db->where('DATE(date_rec)=CURDATE()');
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function count_ret_items()
    {
        $this->db->select('COUNT(logs.return_log.user_id) AS user');
        $this->db->join('inventory.user', 'logs.return_log.user_id = inventory.user.user_id');
        $this->db->where('DATE(date) = CURDATE()');
        $query = $this->db->get('logs.return_log');
        return $query->result_array();
    }

    public function count_def_items()
    {
        $this->db->select('COUNT(item_detail.item_status) AS status');
        $this->db->where('item_detail.item_status', 'defective');
        $this->db->order_by('del_date');
        $query = $this->db->get('inventory.item_detail');
        return $query->result_array();
    }

    public function count_pending_users()
    {
        $this->db->select('count(*) as status');
        $this->db->where('status', 'pending');
        $query = $this->db->get('user');
        return $query->result_array();

    }

    public function pie_graph_co()
    {
        $this->db->distinct();
        $this->db->select('item_name,(quantity*unit_cost) as quantity');
        $this->db->join('item_detail', 'item_detail on item_detail.item_id = item.item_id', 'left');
        $this->db->where('item.item_type', 'CO');
        $this->db->order_by(2);
        $this->db->limit(10);
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function pie_graph_mooe()
    {
        $this->db->distinct();
        $this->db->select('item_name,(quantity*unit_cost) as quantity');
        $this->db->join('item_detail', 'item_detail on item_detail.item_id = item.item_id', 'left');
        $this->db->where('item.item_type', 'MOOE');
        $this->db->order_by(2);
        $this->db->limit(10);
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function pie_graph_per_dept_co($id)
    {
        $this->db
            ->select('item_name,count(item_detail.item_id) as quantity')
            ->join('item', 'item_detail.item_id = item.item_id', 'left')
            ->join('distribution', 'item_detail.dist_id = distribution.dist_id')
            ->where('item.item_type', 'CO')
            ->WHERE('item_detail.dist_id is not null')
            ->WHERE("item_detail.item_status = 'in_stock'")
            ->WHERE('distribution.dept_id', $id)
            ->group_by('item_detail.item_id,distribution.dept_id,unit_cost');
        $this->db->limit(10);
        $this->db->order_by('quantity');

        $query = $this->db->get('item_detail');
        return $query->result_array();

    }

    public function pie_graph_per_dept_mooe($id)
    {
        $this->db
            ->select('item_name,count(item_detail.item_id) as quantity')
            ->join('item', 'item_detail.item_id = item.item_id', 'left')
            ->join('distribution', 'item_detail.dist_id = distribution.dist_id')
            ->where('item.item_type', 'MOOE')
            ->WHERE('item_detail.dist_id is not null')
            ->WHERE("item_detail.item_status = 'in_stock'")
            ->WHERE('distribution.dept_id', $id)
            ->group_by('item_detail.item_id,distribution.dept_id,unit_cost');
        $this->db->limit(10);
        $this->db->order_by('quantity');

        $query = $this->db->get('item_detail');
        return $query->result_array();

    }

    public function count_rec_items_per_dept($deptid)
    {
        $this->db->select('COUNT(*) as quantity');
        $this->db->from('distribution');
        $this->db->where('dept_id', $deptid);
        $this->db->where('quantity != 0');
        $this->db->where('DATE(distrib_date) = DATE(NOW())');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function no_of_items()
    {
        $this->db->select('count(item_id) as item');
        $this->db->from('item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function total_unit_cost()
    {
        $this->db->select('sum(unit_cost) as cost');
        $this->db->from('item_detail');
        $this->db->where('date_rec >= DATE_SUB(NOW(),INTERVAL 1 YEAR)');
        $this->db->group_start();
        $this->db->group_start();
        $this->db->where('dist_id IS NULL');
        $this->db->where("item_status = 'in_stock'");
        $this->db->group_end();
        $this->db->or_where("item_status = 'returned'");
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result_array();
    }

    public function total_unit_cost_per_dept($dept_id)
    {
        $this->db->select('sum(unit_cost) as cost');
        $this->db->join('distribution', 'item_detail.dist_id = distribution.dist_id', 'left');
        $this->db->where('distribution.dept_id', $dept_id);
        $this->db->where('distrib_date >= DATE_SUB(NOW(),INTERVAL 1 YEAR)');
        $query = $this->db->get('item_detail');
        return $query->result_array();
    }

    //count items expiring in 1 week
    public function count_expiring_items()
    {
        $query = $this->db->query("SELECT COUNT(*) as quantity FROM item_detail WHERE exp_date BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 7 DAY)");
        return $query->result_array();
    }

    //count items expiring in 1 week per department
    public function count_expiring_items_per_dept($deptid)
    {
        $query = $this->db->query("SELECT COUNT(*) as quantity FROM item_detail WHERE exp_date BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 7 DAY) AND dist_id IN (SELECT dist_id FROM distribution WHERE dept_id = $deptid)");
        return $query->result_array();
    }

    public function count_expired_items()
    {
        $query = $this->db->query("SELECT COUNT(*) as quantity FROM item_detail WHERE exp_date < NOW()");
        return $query->result_array();
    }

    public function count_expired_items_per_dept($deptid)
    {
        $query = $this->db->query("SELECT COUNT(*) as quantity FROM item_detail WHERE exp_date < NOW() AND dist_id IN (SELECT dist_id FROM distribution WHERE dept_id = $deptid)");
        return $query->result_array();
    }

    public function total_item_per_dept($deptid)
    {
        $this->db->select('COUNT(*) as item');
        $this->db->from('distribution');
        $this->db->where('dept_id', $deptid);
        $this->db->where('quantity != 0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_returned_per_dept($deptid)
    {
        $this->db->select('COUNT(*) as user');
        $this->db->from('logs.return_log');
        $this->db->where('status', 'pending');
        $this->db->where('DATE(date) = DATE(NOW())');
        $this->db->where('dept_id', $deptid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_quantity_for_dept($id, $deptid)
    {
        $this->db->select('item_type');
        $this->db->from('item');
        $this->db->where('item_id', $id);
        $query = $this->db->get();
        $type = $query->row()->item_type;

        if ($type == 'CO') {
            $where = "serial IS NOT NULL AND exp_date > NOW() AND (dist_id IS NULL OR (item_status = 'returned' AND dist_id NOT IN (SELECT dist_id FROM item_detail WHERE item_status = 'returned' AND item_detail.dist_id IN (SELECT dist_id FROM distribution WHERE dept_id = $deptid))))";
            $this->db->select('count(*) as quantity');
            $this->db->from('item_detail');
            $this->db->where($where);
            $this->db->where('item_detail.item_id', $id);
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $where = "exp_date > NOW() AND (dist_id IS NULL OR (item_status != 'in_stock' AND dist_id NOT IN (SELECT dist_id FROM item_detail WHERE item_status = 'returned' AND dist_id IN (SELECT dist_id FROM distribution WHERE dept_id = $deptid))))";
            $this->db->distinct();
            $this->db->select('quantity');
            $this->db->from('item');
            $this->db->where($where);
            $this->db->where('item.item_id', $id);
            $this->db->join('item_detail', 'item.item_id = item_detail.item_id', 'left');

            $query = $this->db->get();
            return $query->result_array();
        }

    }
}