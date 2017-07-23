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
    public function profile_update()
    {
        $userid = ($this->session->userdata['logged_in']['userid']);
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'contact_no' => $this->input->post('contact_no'),
            'password' => $this->input->post('password'),
        );
        $this->user_db->edit_profile($data, $userid);
        header('Location: '. base_url() . 'profile');
    }

}