<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller { 

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    function send_bulk_mail()
    {
        $this->Admin_model->send_bulk_mail();
    }
}