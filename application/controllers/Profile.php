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
        $this->load->helper(array('form', 'url'));

    }

// Show login page
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('profile', array('error' => ' ' ));
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
        $this->session->set_flashdata('msg', 'Update will take effect on next login.');
        header('Location: '. base_url() . 'profile');
    }
        public function do_upload()
        {
                $config['upload_path']          = './uploads';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 22100;
                $config['max_width']            = 2024;
                $config['max_height']           = 2768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }

}