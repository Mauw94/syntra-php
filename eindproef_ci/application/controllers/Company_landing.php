<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Company_landing extends Auth {

    private $data;

    function __construct()
    {
        parent::__construct();
    }

    /*
    *   Show the company overview page where they can add projects or edit some or .. ?
    */
    function index()
    {
        $this->data = array (
            'title' => 'company?'
        );

        $this->load->view('templates/header_main');
        $this->load->view('company/landing', $this->data);
        $this->load->view('templates/footer');
    }
}