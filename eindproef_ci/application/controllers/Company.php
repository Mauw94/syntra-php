<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Company extends Auth {

    private $data;
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
    }

    function index()
    {
        if (null !== $this->session->userdata('company')) {
            if ($this->session->userdata('company')['setup_profile'] == 1) {
                redirect('company_landing');
            }
        }

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
        $this->form_validation->set_rules('looking', 'looking for', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->Company_model->save_company_profile();

            if ($result) {
                // redirect home page for companies
                echo 'works!';
            } else {
                echo 'oops, something went wrong';
            }
        }
    }

    function company_home()
    {
        
        $this->load->view('templates/header_company');
        $this->load->view('company/landing');
        $this->load->view('templates/footer');
    }

    function profile()
    {
        $id = $this->session->userdata('company')['user_id'];
        $data = array(
            'company' => $this->Company_model->get_company_details($id),
            'action' => site_url('company/update_profile')
        );

        $this->load->view('templates/header_company');
        $this->load->view('company/profile', $data);
        $this->load->view('templates/footer');
    }

    function update_profile()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('looking_for', 'looking for', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->profile();
        } else {
            $result = $this->Company_model->update_profile();

            if ($result) {
                $this->profile();
            } else {
                echo 'something went horribly horribly wrong.';
            }
        }
    }

    function projects()
    {
        $this->load->view('templates/header_company');
        $this->load->view('company/projects');
        $this->load->view('templates/footer');
    }

    function project_add()
    {
        $data = array(
            'action' => site_url('company/save_project')
        );

        $this->load->view('templates/header_company');
        $this->load->view('company/project_add', $data);
        $this->load->view('templates/footer');
    }

    function save_project()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->project_add();
        } else {
            $result = $this->Company_model->save_project();
            if ($result) {
                redirect('company');
            } else {
                $this->project_add();
            }
        }
    }
}