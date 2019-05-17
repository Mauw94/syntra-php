<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Company_model extends CI_Model {    

    function __construct()
    {
        parent::__construct();
    }

    function insert_company()
    {
        $name = $this->input->post('name');
        $contact_person = $this->input->post('contact_person');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $password = sha1($this->config->item('salt') . $this->input->post('password'));

        $sql = "INSERT INTO companies (name, contact_person, phone, email, password)
                VALUES(" . $this->db->escape($name) . ",
                        " . $this->db->escape($contact_person) . ",
                        " . $phone . ",
                        '" . $email . "',
                        '" . $password . "')";

        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result;
        } else {
            echo 'NO';
        }
    }

    function save_company_profile()
    {
        $looking_for = $this->input->post('looking');
        $id = $this->input->post('userid');

        $sql = "UPDATE companies set looking_for = '$looking_for', setup_profile = 1
                WHERE id = '$id'";

        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            $_SESSION['company']['setup_profile'] = 1;
            return $result;
        } else {
            echo 'something went wrong';
        }
    }

    function save_project()
    {
        $company_id = $this->session->userdata('company')['user_id'];
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $project_owner = $this->input->post('project_owner');
        $description = $this->input->post('description');
        $prog_lang = $this->input->post('prog_lang');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $sql = "INSERT INTO projects (name, title, description, prog_languages, project_owner, start_date, end_date, company_id)
                VALUES(" . $this->db->escape($name) . ",
                        " . $this->db->escape($title) . ",
                        " . $this->db->escape($description) . ",
                        " . $this->db->escape($prog_lang) . ",
                        " . $this->db->escape($project_owner) . ",
                        " . $this->db->escape($start_date) . ",
                        " . $this->db->escape($end_date) . ",
                        '" . $company_id . "')";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result;
        } else {
            echo 'Something went wrong.';
        }
    }
}
