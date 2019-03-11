<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Student extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
    }

    function get_all_students()
    {
        $students = $this->student_model->get_students();
        print_r($students);
    }
}