<?php
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Home page';

        $this->load->view('templates/header');
        $this->load->view('home/home', $data);
        $this->load->view('templates/footer');
    }
}