<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Student_model extends CI_Model { 

    function get_students()
    {
        $this->db->select('*');
        $this->db->from('students');
        $query = $this->db->get();
        return $result = $query->result_array();
    }
}