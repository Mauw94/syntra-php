<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    function login_user()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $sql = "SELECT * FROM users WHERE usrEmail = '{$email}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {            
            if ($row->usrEmailConfirmed) {
                if ($row->usrPassword === sha1($this->config->item('salt') . $password)) {
                    $session_data = array (
                        'user_id' => $row->id,
                        'firstname' => $row->usrFirstName,
                        'lastname' => $row->usrLastName,
                        'email' => $row->usrEmail,  
                        'email_code' => md5((string) $row->usrTimestampRegistration),    
                        'admin' => $row->usrAdmin                  
                    );
                    $this->set_session($session_data);
                    if ($row->usrAdmin == 1) {
                        return 'admin_logged_in';
                    } else {
                        return 'logged_in';
                    }
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

    private function set_session($session_data)
    {        
        $sess_data = array (
            'user_id' => $session_data['user_id'],
            'firstname' => $session_data['firstname'],
            'lastname' => $session_data['lastname'],
            'email' => $session_data['email'],
            'email_code' => $session_data['email_code'],
            'logged_in' => 1,
            'admin' => $session_data['admin']  
        );
        $this->session->set_userdata('user', $sess_data);
    }

}
