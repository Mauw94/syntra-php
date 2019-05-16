<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Home extends Auth {

    private $data;
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Project_model');
    }

    public function index()
    {      
        if (null !== $this->session->userdata('user')) {  
            if ($this->session->userdata('user')['setup_profile'] == 0) {
                redirect('user');
            }       
        }

        if (null !== $this->session->userdata('company')) {
            if ($this->session->userdata('company')['setup_profile'] == 0) {
                redirect('company');
            }       
        }
        
        $this->data = array(
            'title' => 'Home',
            'projects' => $this->get_newest_projects()
        );

        $this->load->view('templates/header_main');
        $this->load->view('home/home', $this->data);
        $this->load->view('templates/footer');
    }

    private function get_newest_projects()
    {
        $result = $this->Project_model->get_latest_projects();

        print_r($result);
    }
}