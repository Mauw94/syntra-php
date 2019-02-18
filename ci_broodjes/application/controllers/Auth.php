<?php

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user'])) {
            redirect('login');
        }
    }
}