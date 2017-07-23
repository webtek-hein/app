<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->model('user_db');
        $this->load->library('form_validation');

    }

// Show login page
    public function index()
    {
            $this->load->view('templates/header');
            $this->load->view('profile');
         $this->load->view('templates/footer');

    }

}