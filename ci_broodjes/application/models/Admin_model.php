<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function send_bulk_mail()
    {
        
        $this->db->select('*, orders.id');
        $this->db->from('orders');
        $this->db->join('users', 'users.id = orders.user_id');
        $result = $this->db->get()->result();
        
        // store only the users email in a new array, then keep only the unique values
        $users = array();
        foreach ($result as $res) {
            $users[] = $res->usrEmail; 
        }
        $unique_emails = array_unique($users);

        foreach ($unique_emails as $email) {
            $this->send_ready_email($email);
        }
    }

    private function send_ready_email($email)
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

        $this->email->from($this->config->item('bot_email'), 'Syntra Catering');
        $this->email->to($email);
        $this->email->subject('Bestelling broodje(s)');
        $message = '<!DOCTYPE html><html><body>';
        $message .= '<p>' . 'Uw broodje(s) zijn klaar om opgehaald te worden! Eet smakelijk.'.'</body></html>';
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
        }
    }
}