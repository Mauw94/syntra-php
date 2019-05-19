<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Project_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function get_projects_from_company($comp_id)
    {
        $sql = "SELECT * FROM projects WHERE company_id = ${comp_id}";
        $query = $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            return $query->result();
        } else {
            echo 'none found';
        }
    }

    function get_latest_projects()
    {
        $sql = "SELECT * FROM projects";
        // $this->db->limit(3);
        $query = $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            return $query->result();
        } else {
            echo 'something went wrong';
        }
    }
}