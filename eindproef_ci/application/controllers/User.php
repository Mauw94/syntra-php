<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class User extends CI_Controller {

    private $data;
    
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->data = array(
            'title' => 'Profile page',
            'action' => site_url('user/save_profile')
        );
        
        $this->load->view('templates/header_main');
        $this->load->view('user/profile', $this->data);
        $this->load->view('templates/footer');
    }

    function save_profile()
    {
        
    }
}