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
        $this->data = array(
            'title' => 'Setup',
            'action' => site_url('company/save_company'),
            'userid' => $this->session->userdata('company')['user_id']
        );
        $this->load->view('templates/header_main');
        $this->load->view('company/setup_profile', $this->data);
        $this->load->view('templates/footer');
    }

    function save_company()
    {

    }
}