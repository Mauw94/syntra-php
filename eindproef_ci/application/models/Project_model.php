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

    function details($id)
    {
        $sql = "SELECT * FROM projects WHERE id = ${id}";

        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result->result();
        } else {
            echo 'Not found';
        }
    }

    function update_project()
    {
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $project_owner = $this->input->post('project_owner');
        $description = $this->input->post('description');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $sql = "UPDATE projects SET name = '$name', title = '$title', description = '$description', 
                            project_owner = '$project_owner', start_date = '$start_date', end_date = '$end_date'";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result;
        } else {
            echo 'error';
        }
    }
}