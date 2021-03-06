<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    public function login()
    {
        $email = $this->input->post('email');
        $query_user = $this->db->get_where('users', array('email' => $email));
        //print_r($query_user->result());
        if ($query_user->result()) {
            return $this->login_user();
        } else {
            return $this->login_company();
        }
    }

    private function login_company()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $sql = "SELECT * FROM companies WHERE email = '{$email}' LIMIT 1";
        $result = $this->db->query($sql); 
        $row = $result->row();

        if ($result->num_rows() === 1) {
            if ($row->email_confirmed) {
                if ($row->password === sha1($this->config->item('salt') . $password)) {
                    $session_data = array(
                        'company_id' => $row->id,
                        'name' => $row->name,
                        'contact_person' => $row->contact_person,
                        'email' => $row->email,  
                        'email_code' => md5((string) $row->reg_time_stamp),
                        'phone' => $row->phone,
                        'setup_profile' => $row->setup_profile 
                    );
                    $this->set_company_session($session_data);
                    return 'logged_in';
                } else {
                    return 'incorrect_password';
                }
            } else {
                return 'not_activated';
            }
        } else {
            return 'email_not_found';
        }
    }

    private function login_user()
    {
        echo'HELLLLO';
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $sql = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1";
        $result = $this->db->query($sql); 
        $row = $result->row();

        if ($result->num_rows() === 1) {
            if ($row->email_confirmed) {
                if ($row->password === sha1($this->config->item('salt') . $password)) {
                    $session_data = array(
                        'user_id' => $row->id,
                        'firstname' => $row->first_name,
                        'lastname' => $row->last_name,
                        'email' => $row->email,  
                        'email_code' => md5((string) $row->reg_time_stamp),
                        'setup_profile' => $row->setup_profile 
                    );
                    $this->set_user_session($session_data);
                    return 'logged_in';
                } else {
                    return 'incorrect_password';
                }
            } else {
                return 'not_activated';
            }
        } else {
            return 'email_not_found';
        }
    }

    private function set_company_session($session_data)
    {
        $sess_data = array (
            'user_id' => $session_data['company_id'],
            'name' => $session_data['name'],
            'contact_person' => $session_data['contact_person'],
            'email' => $session_data['email'],
            'email_code' => $session_data['email_code'],
            'phone' => $session_data['phone'],
            'logged_in' => 1,
            'company' => 1,
            'setup_profile' => $session_data['setup_profile']
        );
        $this->session->unset_userdata('user');
        $this->session->set_userdata('company', $sess_data);
    }

    private function set_user_session($session_data)
    {        
        $sess_data = array (
            'user_id' => $session_data['user_id'],
            'firstname' => $session_data['firstname'],
            'lastname' => $session_data['lastname'],
            'email' => $session_data['email'],
            'email_code' => $session_data['email_code'],
            'logged_in' => 1,
            'setup_profile' => $session_data['setup_profile']
        );
        $this->session->unset_userdata('company');
        $this->session->set_userdata('user', $sess_data);
    }
}
