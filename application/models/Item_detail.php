<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: markr
 * Date: 10/07/2017
 * Time: 2:57 PM
 */

class Item_detail extends CI_Model
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
            ->join('item_detail', 'item.item_id = item_detail.item_id', 'natural')
            ->join('account_code', 'item.account_id = account_code.ac_id', 'left')
            ->where('item.item_id', $id)
            ->get('item');

        return $query->result_array();

    }
}