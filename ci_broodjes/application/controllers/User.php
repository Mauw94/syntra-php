<?php
require_once(APPPATH . 'controllers/auth.php');

class User extends Auth {

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    function user_details()
    {
        $data['user_details'] = $this->User_model->get_user_details();
        $data['action'] = site_url('user/update_user');
        $this->load->view('templates/header_user');
        $this->load->view('user/profile', $data);
    }

    function update_user()
    {
        $this->form_validation->set_rules('firstname', 'voornaam', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('lastname', 'achternaam', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'e-mail adres', 'trim|required|min_length[5]|max_length[50]|valid_email');
        $this->form_validation->set_rules('phone', 'telefoon nr', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->user_details();
        } else {
            $result = $this->User_model->update_user();

            if ($result) {
                // terug naar login pagina -> met gegens geupdated, log opnieuw in
                $data['success'] = 'Geupdate.';
                $data['user_details'] = $this->User_model->get_user_details();
                $data['action'] = site_url('user/update_user');
                $this->load->view('templates/header_user');
                $this->load->view('user/profile', $data);
            } else {
                redirect('user/user_details');
            }
        }
    }
}