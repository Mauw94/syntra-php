<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Register extends CI_Controller {

    private $data_user;
    private $data_company;

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
 
    function index()
    {
        $this->load->view('templates/header');
        $this->load->view('register/register_option');
    }

    function user_reg_page()
    {
        $this->data_user = array(
            'title' => 'Register as freelancer',
            'action' => site_url('register/register_user')
        );
        $this->load->view('templates/header');
        $this->load->view('register/register_user', $this->data_user);
        $this->load->view('templates/footer');
    }

    function company_reg_page()
    {
        $this->data_company = array(
            'title' => 'Register your company',
            'action' => site_url('register/register_company')
        );
        $this->load->view('templates/header');
        $this->load->view('register/register_company', $this->data_company);
        $this->load->view('templates/footer');
    }

    function register_user()
    {
        $this->form_validation->set_rules('firstname', 'voornaam', 'trim|required|min_length[3]|max_length[24]');
        $this->form_validation->set_rules('lastname', 'achternaam', 'trim|required|min_length[2]|max_length[24]');
        $this->form_validation->set_rules('email', 'email adres', 'trim|required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'wachtwoord', 'trim|required|min_length[6]|max_length[50]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'bevestig wachtwoord', 'trim|required|min_length[6]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->User_model->insert_user();
            
            if ($result) {
                echo 'registered';
            } else {
                echo 'something went wrong';
            }
        }
    }

    function register_company()
    {

    }
}