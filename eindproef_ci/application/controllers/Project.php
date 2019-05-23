<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Project extends Auth {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('Company_model');
    }

    function details($id, $comp_id)
    {
        $data = array(
            'project' => $this->Project_model->details($id),
            'company' => $this->Company_model->get_company_details($comp_id)
        );

        $this->load->view('templates/header_main');
        $this->load->view('project/detail', $data);
        $this->load->view('templates/footer');
    }
}