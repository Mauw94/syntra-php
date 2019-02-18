<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Login extends CI_Controller {

    private $data;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        
        $this->data = array(
            'title' => set_value('title'),
            'action' => site_url('login/login_user')
        );

    }

    function index() 
    {
        if (isset($_SESSION['user'])) {
            redirect('bestel');
        } else {           
            $this->load->view('templates/header_login', $this->data);
            $this->load->view('login/login', $this->data);
            //$this->load->view('templates/footer', $data);
        }
    }

    function login_user()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[50]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->Login_model->login_user();

            switch($result) {
                case 'logged_in':
                    redirect('bestel');
                    break;
                case 'incorrect_password':
                    $this->data['failed'] = 'Password is incorrect.';
                    $this->load->view('templates/header_login');
                    $this->load->view('login/login', $this->data);
                    break;
                case 'not_activated':
                    $this->data['failed'] = 'Account not activated.';
                    $this->load->view('templates/header_login');
                    $this->load->view('login/login', $this->data);
                    break;
                case 'email_not_found':
                    $this->data['failed'] = 'E-mail address not found.';
                    $this->load->view('templates/header_login');
                    $this->load->view('login/login', $this->data);
                    break;
            }
        }
        
    }

    function logout_user() 
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            $this->session->sess_destroy();
            redirect('login');
        }
    }
}