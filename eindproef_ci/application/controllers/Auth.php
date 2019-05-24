<?php
class Auth extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->check_login();
    }

    private function check_login()
    {
        if (isset($_SESSION['user']) || isset($_SESSION['company'])) {
            return true;
        } else {
            redirect('login');
        }
    }

    function deny_user()
    {
        if (!$this->session->userdata('company')) {
            redirect('home');
        }
    }

    function deny_company()
    {
        if (!$this->session->userdata('user')) {
            redirect('company');
        }
    }
}