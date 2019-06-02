<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class User extends Auth {

    private $data;
    private $user_id;

    function __construct()
    {
        parent::__construct();
        parent::deny_company();
        $this->load->model('User_model');
        $this->load->model('Project_model');

        $this->user_id = $this->session->userdata('user')['user_id'];
    }

    function index()
    {
        if (null !== $this->session->userdata('user')) {
            if ($this->session->userdata('user')['setup_profile'] == 1) {
                redirect('home');
            }
        }

        $this->data = array(
            'title' => 'Profile page',
            'action' => site_url('user/save_profile'),
            'userid' => $this->session->userdata('user')['user_id']
        );
        
        $this->load->view('templates/header_main');
        $this->load->view('user/setup_profile', $this->data);
        $this->load->view('templates/footer');
    }

    function save_profile()
    {
        $this->form_validation->set_rules('prog_language', 'know prog. language(s)', 'required');
        $this->form_validation->set_rules('pref_language', 'preferred language(s)/framework(s)', 'required');
        $this->form_validation->set_rules('available', 'available', 'required');
        $this->form_validation->set_rules('github', 'github', 'trim|required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('price_h', 'preferred salary/h', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->User_model->save_profile_details();    
            if ($result) {
                redirect('home');
            }
        }
    }

    function profile()
    {        
        $data = array(
            'user' => $this->User_model->get_user_details($this->user_id),
            'action' => site_url('user/update_profile'),
            'id' => $this->user_id
        );

        $this->load->view('templates/header_main');
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    function update_profile()
    {
        $this->form_validation->set_rules('prog_languages', 'know prog language(s)', 'required');
        $this->form_validation->set_rules('pref_language', 'preferred language(s)/framework(s)', 'required');
        $this->form_validation->set_rules('experience', 'experience', 'required');        
        $this->form_validation->set_rules('github', 'github', 'trim|required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('price_h', 'preferred salary/h', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->profile();
        } else {
            $result = $this->User_model->save_profile_details();
            if ($result) {
                $this->profile();
            }
        }
    }

    function favorite($msg = null)
    {
        $data = array(
            'favorites' => $this->Project_model->get_fav_projects(),
            'companies' => $this->Project_model->get_companies_from_fav_projects(),
            'msg' => $msg
        );

        $this->load->view('templates/header_main');
        $this->load->view('project/favorites', $data);
        $this->load->view('templates/footer');
    }

    function applications($msg = null)
    {
        $data = array(
            'applications' => $this->Project_model->get_applied_projects(),
            'companies' => $this->Project_model->get_companies_from_applied_projects(),
            'msg' => $msg
        );
        
        $this->load->view('templates/header_main');
        $this->load->view('project/applications', $data);
        $this->load->view('templates/footer');
    }

    function favorite_project($id)
    {
        $result = $this->Project_model->
                favorite_project($id, $this->user_id);

        if ($result) {
            redirect('home');
        } else {
            echo 'oops';
        }
    }

    function remove_favorite($id)
    {
        $result = $this->Project_model->
                remove_favorite_project($id, $this->user_id);

        if ($result) {
            redirect('user/favorite');
        }
    }

    function remove_application($id)
    {
        $result = $this->Project_model->
                remove_applied_project($id, $this->user_id);

        if ($result) {
            redirect('user/applications');
        }
    }

    function apply_to_project($id, $company_id)
    {
        $result = $this->Project_model->
                apply_to_project($id, $company_id, $this->user_id);

        if ($result) {
            $msg = "Succesfully applied!";
            $this->favorite($msg);
        }
    }
}