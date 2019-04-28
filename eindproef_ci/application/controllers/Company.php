<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Company extends CI_Controller {

    private $data;
    
    function __construct()
    {
        parent::__construct();
        if (!$_SESSION) {
            redirect('login');
        }
        $this->load->model('Company_model');
    }

    function index()
    {
        $this->load->view('templates/header_main');
        $this->load->view('company/setup_profile');
        $this->load->view('templates/footer');
    }
}