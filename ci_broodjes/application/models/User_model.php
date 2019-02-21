<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class User_model extends CI_Model {    

    private $email_code = '';

    function insert_user()
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phonenumber = $this->input->post('phonenumber');
        $email = $this->input->post('email');
        $password = sha1($this->config->item('salt') . $this->input->post('password'));
        $organisation = $this->input->post('organisation');
        $occupation = $this->input->post('occupation');

        $sql = "INSERT INTO users (usrLastName, usrFirstName, usrPhone, usrEmail, usrPassword, occupation_id)
                VALUES(" . $this->db->escape($lastname) . ",
                        " . $this->db->escape($firstname) . ",
                        " . $this->db->escape($phonenumber) . ",
                        '" . $email . "',
                        '" . $password . "',
                        '" . $occupation . "')";
        
        $result = $this->db->query($sql);
        
        if ($this->db->affected_rows() === 1) {
            $this->set_session($firstname, $lastname, $email);
            $this->send_validation_email($email);
            return $firstname;
        } else {
            $this->load->library('email');
        }
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
        $this->email->from($this->config->item('bot_email'), 'Syntra Catering');
        $this->email->to($email);
        $this->email->subject('E-mail verification');
        $message = '<!DOCTYPE html><html><body>';
        $message .= '<p>Thank you for registering. Please <strong><a href="' . base_url() . 'register/validate_email/' . $email .
                '/' . $email_code . '">click here</a></strong> to activate your account. After you have activated your account you will be able to login.';
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
        $sql = "SELECT usrEmail, usrTimestampRegistration, usrFirstName FROM users WHERE usrEmail = '{$email_address}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() == 1 && $row->usrFirstName) {
            if (md5((string) $row->usrTimestampRegistration) === $email_code) {
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
        $sql = "UPDATE users SET usrEmailConfirmed = 1 WHERE usrEmail = '" . $email_address . "' LIMIT 1";
        $this->db->query($sql);
        if ($this->db->affected_rows() === 1) {
            return true;
        } else {
            echo 'Error when activating your account in the database.';
            return false;
        }
    }

    private function deactivate_account($email_address)
    {
        $sql = "UPDATE users SET usrEmailConfirmed = 0 WHERE usrEmail = '" . $email_address . "' LIMIT 1";
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
        $sql = "SELECT id, usrTimestampRegistration FROM users WHERE usrEmail = '" . $email . "' LIMIT 1";
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
        $this->email_code = md5((string)$row->usrTimestampRegistration);
        $this->session->set_userdata('user', $sess_data);
    }

    function get_user_details()
    {
        $user_id = $this->session->userdata('user')['user_id'];
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    function update_user()
    {
        $id = $this->input->post('id');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phonenumber = $this->input->post('phone');
        $email = $this->input->post('email');   
        $oldemail = $this->input->post('oldemail');

        $sql = "UPDATE users SET usrLastName = '" . $lastname ."', usrFirstName = '" . $firstname . "',
            usrPhone = '" . $phonenumber . "', usrEmail = '" . $email . "' WHERE id = '" . $id . "' LIMIT 1";
            
        $this->db->query($sql);
            if ($this->db->affected_rows() === 1) {
                if ($oldemail != $email) {
                    $this->send_validation_email($email);
                    $this->deactivate_account($email);
                    $this->session->sess_destroy();
                }
                return true;
            } else {
                return false;
            }
    }
}