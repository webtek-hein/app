<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditLog extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('log_model');

    }
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('editlog');
        $this->load->view('templates/footer');

    }
    public function edit_log_list()
    {

    }
}
