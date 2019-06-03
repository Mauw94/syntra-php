<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class User_model extends CI_Model {    

    function __construct()
    {
        parent::__construct();
    }

    function insert_user()
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phonenumber = $this->input->post('phonenumber');
        $email = $this->input->post('email');
        $password = sha1($this->config->item('salt') . $this->input->post('password'));

        $sql = "INSERT INTO users (last_name, first_name, phone, email, password)
                VALUES(" . $this->db->escape($lastname) . ",
                        " . $this->db->escape($firstname) . ",
                        " . $this->db->escape($phonenumber) . ",
                        '" . $email . "',
                        '" . $password . "')";

        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            $this->set_session($firstname, $lastname, $email);
            $this->send_validation_email($email);
            return $result;
        } else {
            echo 'NO';
        }
    }

    function save_profile_details()
    {
        $userid = $this->input->post('userid');
        $github = $this->input->post('github');
        $price_h = $this->input->post('price_h');
        $prog_languages = $this->input->post('prog_languages');
        $pref_language = $this->input->post('pref_language');
        $min_days = $this->input->post('min_days_week');
        $age = $this->input->post('age');
        $nationality = $this->input->post('nationality');
        $hobbies = $this->input->post('hobbies');
        $experience = $this->input->post('experience');
        $available = $this->input->post('available');
        if ($available) {
            $available = 1;
        } else {
            $available = 0;
        }

        $sql = "UPDATE users SET github = '$github', price_h = '$price_h', 
                min_days_week = '$min_days', age = '$age',
                prog_languages = '$prog_languages', pref_language = '$pref_language',
                nationality = '$nationality', hobbies = '$hobbies', available = '$available', setup_profile = 1, 
                years_experience = '$experience'
                WHERE id = ${userid}";

        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            $_SESSION['user']['setup_profile'] = 1;
            return $result;
        } else {
            echo 'something went wrong setting up your profile';
        }
    }

    function get_user_details($id)
    {
        $sql = "SELECT * FROM users WHERE id = ${id}";

        $result = $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            return $result->result();
        } else {
            echo 'not found';
        }
    }

    private function update_session($sess_array) {       
        $sess_data = array (
            'logged_in' => 1,
            'setup_profile' => $sess_array['setup_profile']
        );
        $this->session->update_userdata('user', $sess_data);
    }

    private function send_validation_email($email)
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
        if (empty($this->email_code)) {
            $email_code = $this->session->userdata('user')['email_code'];
        } else {
            $email_code = $this->email_code;
        }
        $this->email->from($this->config->item('bot_email'), 'FreelancePortal');
        $this->email->to($email);
        $this->email->subject('E-mail verificatie');
        $message = '<!DOCTYPE html><html><body>';
        $message .= '<p>Thank you for registering.<strong><a href="' . base_url() . 'register/validate_email/' . $email .
                '/' . $email_code . '"> Click here</a></strong> to activate your account.';
        $message .= '</body></html>';
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
        }
    }

    function validate_email($email_address, $email_code)
    {
        $sql = "SELECT email, reg_time_stamp, first_name FROM users WHERE email = '{$email_address}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        if ($result->num_rows() == 1 && $row->first_name) {
            if (md5((string) $row->reg_time_stamp) === $email_code) {
                $result = $this->activate_account($email_address);
                if ($result == true) {
                    return true;
                } else {
                    echo 'There was an error when activating your account';
                    return false;
                }
            }
        } else {
            echo 'There was an error validating your email';
            return false;
        }
    }

    private function activate_account($email_address)
    {
        $sql = "UPDATE users SET email_confirmed = 1 WHERE email = '" . $email_address . "' LIMIT 1";
        $this->db->query($sql);
        if ($this->db->affected_rows() === 1) {
            return true;
        } else {
            echo 'Error when activating your account in the database.';
            return false;
        }
    }

    private function set_session($firstname, $lastname, $email)
    {
        $sql = "SELECT id, reg_time_stamp FROM users WHERE email = '" . $email . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        $sess_data = array (
            'user_id' => $row->id,
            'firstname' => $firstname,
            'lastname' => $lastname, 
            'email' => $email,
            'logged_in' => 0,
            'admin' => 0
        );        
        $this->email_code = md5((string)$row->reg_time_stamp);
        $this->session->set_userdata('user', $sess_data);
    }
}