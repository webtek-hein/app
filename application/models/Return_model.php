<?php
class Return_model extends CI_Model {

    public function __construct()
    {
        $inventory = $this->load->database('inventory', TRUE);
        $logs = $this->load->database('logs', TRUE);
    }

    public function get_return_log()
    {
        $query = $logs->get('return_log');
        return $query->result_array();
    }

    public function return_items()
    {
        
    }
}