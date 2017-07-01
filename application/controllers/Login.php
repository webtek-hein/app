<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');
// Load url helper library
        $this->load->helper('url');
// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('user_db');
    }

// Show login page
    public function index()
    {
        $this->load->view('login');
    }

    // Check for user login process

    public function user_login_process() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                $this->load->view('templates/header');
            }else{
                $this->load->view('login');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->user_db->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->user_db->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->username,
                        'firstname' => $result[0]->first_name,
                        'lastname' => $result[0]->last_name,
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('templates/header');
                    $this->load->view('dashboard',@data);
                    $this->load->view('templates/footer');
                    // header("Location: //localhost/app/Login/user_login_process/{$username}");
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login', $data);
            }
        }
    }

// Logout from admin page
    public function logout() {

// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login', $data);
    }
}