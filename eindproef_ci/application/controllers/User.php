<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class User extends CI_Controller {

    private $data;
    
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['user']) || isset($_SESSION['company'])) {
            echo 'ok we in';
        } else {
            redirect('login');
        }
        $this->load->model('User_model');
    }

    function index()
    {
        if (null !== $this->session->userdata('user')) {
            if ($this->session->userdata('user')['setup_profile'] == 1) {
                redirect('home');
            }
        }
        redirect('login');
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
        $this->form_validation->set_rules('github', 'github', 'trim|required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('price_h', 'pref salary', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->User_model->save_profile_details();    
            if ($result) {
                redirect('home');
            }
        }
    }
}