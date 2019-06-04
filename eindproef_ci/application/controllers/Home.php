<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Home extends Auth {

    private $data;
    private $filtered = FALSE;

    function __construct()
    {
        parent::__construct();
        // print_r($_SESSION);
        $this->load->helper('url_helper');
        $this->load->model('Project_model');
    }

    public function index($msg = NULL, $projects = NULL)
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
            redirect('company');
        }
        
        if (!$this->filtered) {
            $this->data = array(
                'title' => 'Home',
                'projects' => $this->get_newest_projects(),
                'favorites' => $this->Project_model->retrieve_favorited_project_ids(),
                'msg' => $msg,
                'action' => site_url('home/filter')
            );        
        } else {
            $this->data = array(
                'title' => 'Home',
                'projects' => $projects,
                'favorites' => $this->Project_model->retrieve_favorited_project_ids(),
                'msg' => $msg,
                'action' => site_url('home/filter')
            );
        }
        $this->load->view('templates/header_main');
        $this->load->view('home/home', $this->data);
        $this->load->view('templates/footer');
    }

    function filter()
    {
        $this->form_validation->set_rules('filter', 'filter', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $msg = 'Please enter a filter first.';
            $this->index($msg);
        } else {
            $this->filtered = TRUE;
            $result = $this->Project_model->filter();
            $msg = 'Filter results below';
            $this->index($msg, $result);
        }
    }

    function all()
    {
        $this->filtered = FALSE;
        $this->index();
    }

    private function get_newest_projects()
    {
        $result = $this->Project_model->get_latest_projects();
        return $result;
    }
}