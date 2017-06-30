<?php
class Log_model extends CI_Model {

    public function __construct()
    {
        $this->load->database('logs');
    }

    //get all increase records from db
    public function get_increase_logs()
    {
    
    }

    //get all decrease records from db
    public function get_decrease_logs()
    {
    
    }

    //get all return records from db
    public function get_return_logs()
    {
    
    }
}