<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Company extends Auth {

    private $data;
    
    function __construct()
    {
        parent::__construct();
        parent::deny_user();
        $this->load->model('Company_model');
        $this->load->model('Project_model');
    }

    function index()
    {
        if (null !== $this->session->userdata('company')) {
            if ($this->session->userdata('company')['setup_profile'] == 1) {
                $this->company_landing();                
            } else {
                $this->data = array(    
                    'title' => 'Setup',
                    'action' => site_url('company/save_company'),
                    'userid' => $this->session->userdata('company')['user_id']
                );
                $this->load->view('templates/header_main');
                $this->load->view('company/setup_profile', $this->data);
                $this->load->view('templates/footer');
            }
        } 
    }

    function company_landing()
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

    function save_company()
    {   
        $this->form_validation->set_rules('looking', 'looking for', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->Company_model->save_company_profile();

            if ($result) {
                $this->index();
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

    function project_add()
    {
        $data = array(
            'action' => site_url('company/save_project')
        );

        $this->load->view('templates/header_company');
        $this->load->view('company/project_add', $data);
        $this->load->view('templates/footer');
    }

    function delete_project($id)
    {
        $result = $this->Company_model->delete_project($id);
        if ($result) {
            $this->index();
        } else {
            echo 'error';
        }
    }

    function edit_project($id)
    {
        $project = $this->Project_model->details($id);

        $data = array(
            'project' => $project,
            'action' => site_url('company/update_project')
        );

        $this->load->view('templates/header_company');
        $this->load->view('company/project_edit', $data);
        $this->load->view('templates/footer');
    }

    function update_project()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('prog_lang', 'prog_lang', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('project_owner', 'project_owner', 'required');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->Project_model->update_project();

            if ($result) {
                $this->index();
            } else {
                echo 'error';
            }
        }
    }

    function save_project()
    {
        $this->form_validation->set_rules('prog_lang', 'prog_lang', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('location', 'locaiton', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->project_add();
        } else {
            $result = $this->Company_model->save_project();
            if ($result) {
                $this->index();
            } else {
                $this->project_add();
            }
        }
    }

    function view_applicants($projectid)
    {
        $result = $this->Company_model->get_applicants_for($projectid);

        if ($result) {
            print_r($result);
        }
    }
}