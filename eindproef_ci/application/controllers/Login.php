<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Login extends CI_Controller {

    private $data;

    function __construct()
    {
        parent::__construct();
        print_r($_SESSION);
        $this->load->model('Login_model');
        $this->load->model('User_model');

        $this->data = array(
            'title' => 'Login',
            'action' => site_url('login/login_user')
        );
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('login/index', $this->data);
        $this->load->view('templates/footer');
    }

    function login_user()
    {
        $this->form_validation->set_rules('email', 'e-mail adres', 'trim|required|min_length[6]|max_length[50]|valid_email');
        $this->form_validation->set_rules('password', 'wachtwoord', 'trim|required|min_length[6]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();            
        } else {
            $result = $this->Login_model->login();

            switch($result) {
                case 'logged_in':
                    redirect('home');
                    break;
                case 'incorrect_password':
                    $this->data['failed'] = 'password is incorrect';
                    $this->index();
                    break;
                case 'not_activated':
                    $this->data['failed'] = 'account not activated';
                    $this->index();
                    break;
                case 'email_not_found':
                    $this->data['failed'] = 'account has not been found';
                    $this->index();
                    break;
            }
        }
    }

    function logout()
    {
        if (isset($_SESSION)) {
            unset($_SESSION);
            $this->session->sess_destroy();
            redirect('login');
        }
    }
}