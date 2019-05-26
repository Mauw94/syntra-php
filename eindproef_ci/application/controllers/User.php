<?php
require_once(APPPATH . 'controllers/Auth.php');

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class User extends Auth {

    private $data;
    
    function __construct()
    {
        parent::__construct();
        parent::deny_company();
        $this->load->model('User_model');
        $this->load->model('Project_model');
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
        $id = $this->session->userdata('user')['user_id'];
        $data = array(
            'user' => $this->User_model->get_user_details($id),
            'action' => site_url('user/update_profile'),
            'id' => $id
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

    function favorite()
    {
        $data = array(
            'favorites' => $this->Project_model->get_fav_projects(),
            'companies' => $this->Project_model->get_companies_from_fav_projects()            
        );

        $this->load->view('templates/header_main');
        $this->load->view('project/favorites', $data);
        $this->load->view('templates/footer');
    }

    function favorite_project($id)
    {
        $user_id = $this->session->userdata('user')['user_id'];
        $result = $this->Project_model->favorite_project($id, $user_id);

        if ($result) {
            redirect('home');
        } else {
            echo 'oops';
        }
    }

    function remove_favorite($id)
    {
        $user_id = $this->session->userdata('user')['user_id'];
        $result = $this->Project_model->remove_favorite_project($id, $user_id);

        if ($result) {
            redirect('user/favorite');
        }
    }
}