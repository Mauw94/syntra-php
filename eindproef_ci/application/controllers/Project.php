<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Project extends Auth {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
    }

    function index()
    {

    }

    function details($id)
    {
        $result = $this->Project_model->details($id);

        print_r($result);
    }
}