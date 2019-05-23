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
            return 'none found';
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
            return 'Not found';
        }
    }

    function update_project()
    {
        $name = $this->input->post('name');
        $prog_lang = $this->input->post('prog_lang');
        $project_owner = $this->input->post('project_owner');
        $description = $this->input->post('description');
        $location = $this->input->post('location');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $sql = "UPDATE projects SET name = '$name', prog_lang = '$prog_lang', description = '$description', 
                            project_owner = '$project_owner', start_date = '$start_date', end_date = '$end_date', location = '$location'";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result;
        } else {
            echo 'error';
        }
    }

    function favorite_project($proj_id, $user_id)
    {
        $sql = "INSERT INTO saved_projects (user_id, project_id) VALUES (" . $user_id . ",
                                                                        ". $proj_id. ")";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return $result;
        } else {
            echo 'something went wrong favoriting';
        }
    }

    function remove_favorite_project($proj_id, $user_id) 
    {   
        $sql = "DELETE FROM saved_projects WHERE user_id = $user_id AND project_id = $proj_id";
        $result = $this->db->query($sql);

        if ($this->db->affected_rows() >= 1) {
            return $result;
        } else {
            echo 'something went wrong unfavoriting';
        }
    }

    function get_fav_projects()
    {
        $fav_ids = $this->retrieve_favorited_project_ids();
        $projects = array();
        foreach ($fav_ids as $fav) {
            $sql = "SELECT * FROM projects WHERE id = $fav";
            $result = $this->db->query($sql);
            if ($this->db->affected_rows() === 1) {
                array_push($projects, $result->result());
            }
        }
        return $projects;
    }

    function get_companies_from_fav_projects()
    {
        $data = $this->get_fav_projects();
        $company_ids = array();
        $companies = array();

        foreach ($data as $d) {
            array_push($company_ids, $d[0]->company_id);
        }

        foreach ($company_ids as $comp) {
            $sql = "SELECT * FROM companies where ID = $comp";

            $result = $this->db->query($sql);
            if ($this->db->affected_rows() === 1) {
                array_push($companies, $result->result());
            }
        }
        return $companies;
    }

    function retrieve_favorited_project_ids()
    {
        // get user id
        // get favorite project ids
        // get projects with the fav ids
        $favs = array();
        $user_id = $this->session->userdata('user')['user_id'];

        $sql = "SELECT project_id FROM saved_projects WHERE user_id = ${user_id}";

        $result = $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            $favorites = $result->result();
        } else {
            echo 'something went wrong';
        }   

        foreach ($favorites as $fav) {
            array_push($favs, $fav->project_id);
        }
        return $favs;
    }


}