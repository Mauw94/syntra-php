<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Company_landing extends Auth {

    private $data;

    function __construct()
    {
        parent::__construct();
        parent::deny_user();
        $this->load->model('Project_model');
    }

    /*
    *   Show the company overview page where they can add projects or edit some or .. ?
    */
    function index()
    {
        $this->data = array (
            'title' => 'company?',
            'projects' => $this->retrieve_projects(),
            'name' => $this->session->userdata('company')['name']
        );
                            
        $this->load->view('templates/header_company');
        $this->load->view('company/landing', $this->data);
        $this->load->view('templates/footer');
    }

    private function retrieve_projects()
    {
        $company_id = $this->session->userdata('company')['user_id'];
        $result = $this->Project_model->get_projects_from_company($company_id);

        return $result;    
    }
}