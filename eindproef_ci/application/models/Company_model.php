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

    function get_company_details($id) 
    {
        $sql = "SELECT * FROM companies WHERE id = ${id}";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            return $result->result();
        } else {
            echo 'not found';
        }
    }

    function update_profile()
    {
        $contact_person = $this->input->post('contact_person');
        $looking_for = $this->input->post('looking_for');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');   
        $id = $this->input->post('id');

        $sql = "UPDATE companies set contact_person = '$contact_person', 
                    looking_for = '$looking_for', email = '$email', phone = '$phone' WHERE id = ${id}";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result;
        } else {
            echo 'something went wrong';
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
        $prog_lang = $this->input->post('prog_lang');
        $project_owner = $this->input->post('project_owner');
        $description = $this->input->post('description');
        $keys = $this->input->post('keys');
        $location = $this->input->post('location');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $sql = "INSERT INTO projects (name, prog_lang, description, keywords, project_owner, start_date, end_date, location, company_id)
                VALUES(" . $this->db->escape($name) . ",
                        " . $this->db->escape($prog_lang) . ",
                        " . $this->db->escape($description) . ",
                        " . $this->db->escape($keys) . ",
                        " . $this->db->escape($project_owner) . ",
                        " . $this->db->escape($start_date) . ",
                        " . $this->db->escape($end_date) . ",
                        " . $this->db->escape($location) . ",
                        '" . $company_id . "')";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result;
        } else {
            echo 'Something went wrong.';
        }
    }

    function delete_project($id) 
    {
        $sql = "DELETE FROM projects WHERE id = ${id}";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result;
        } else {
            echo 'error in deleting';
        }
    }

    function get_applicants_for($id) 
    {
        // get all user_ids from applied_projects where project_id = id
        $user_ids = array();
        $users = array();
        $continue = FALSE;

        $sql = "SELECT user_id FROM applied_projects WHERE project_id = ${id}";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() >= 1) {
            array_push($user_ids, $result->result());
            $continue = TRUE;
        } else {
            $continue = FALSE;
        }

        if ($continue) {
            $new = $user_ids[0];
            foreach ($new as $user) {
                $id = $user->user_id;
                
                $sql = "SELECT * FROM users WHERE id = ${id}";
                $result = $this->db->query($sql);

                if ($this->db->affected_rows() === 1) {
                    array_push($users, $result->result());
                }
            }
        }   
        
        return $users;
    }

    function send_rejection_email($applicant_email)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mauritsseelen@gmail.com',
            'smtp_pass' => 'upbtdwqttfpgngql',
            'mailtype'  => 'html',
            'newline'   => "\r\n"
        );
        $this->load->library('email', $config);
        $company_mail = $this->session->userdata('company')['email'];
        $company_name = $this->session->userdata('company')['name'];
        $this->email->from($company_mail);
        $this->email->to($applicant_email);
        $this->email->subject('Application rejected');
        $message = '<!DOCTYPE html><html><body>';
        $message .= '<p>We are sorry, but ' . $company_name . ' has rejected your offer for this project.</p>';
        $message .= '</body></html>';
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
        }
    }

    function send_acceptation_email($applicant_email)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mauritsseelen@gmail.com',
            'smtp_pass' => 'upbtdwqttfpgngql',
            'mailtype'  => 'html',
            'newline'   => "\r\n"
        );
        $this->load->library('email', $config);
        $company_mail = $this->session->userdata('company')['email'];
        $company_name = $this->session->userdata('company')['name'];
        $this->email->from($company_mail);
        $this->email->to($applicant_email);
        $this->email->subject('Application accepted');
        $message = '<!DOCTYPE html><html><body>';
        $message .= '<p>We at ' . $company_name . ' have accepted your application. Our project leader will contact you shortly.</p>';
        $message .= '</body></html>';
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
