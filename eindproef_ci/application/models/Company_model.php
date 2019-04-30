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
}