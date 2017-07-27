<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Edit_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_id($id)
    {

        $db1 = $this->load->database('inventory', TRUE);
        $query = $db1->select('*')
            ->join('account_code', 'item.account_id = account_code.ac_id', 'left')
            ->where('item.item_id', $id)
            ->get('item');

        return $query->result_array();

    }
    public function item_update($where,$data)
    {
        $db1 = $this->load->database('inventory',TRUE);
        $db1->update('item', $data, $where);
        //$db1->update('account_code', $data1, $acid);
        return $this->db->affected_rows();
    }

    public function log_item_update($data)
    {
        $this->db->insert('logs.edit_log', $data);
    }
}