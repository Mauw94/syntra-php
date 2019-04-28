<?php
class Home extends CI_Controller {

    private $data;
    
    function __construct()
    {
        parent::__construct();
        if (!$_SESSION['user']) {
            redirect('login');
        }
        $this->load->helper('url_helper');
    }

    public function index()
    {      
        if ($this->session->userdata('user')['setup_profile'] == 0) {
            redirect('user');
        }
        $this->data = array(
            'title' => 'Home',
        );

        $this->load->view('templates/header_main');
        $this->load->view('home/home', $this->data);
        $this->load->view('templates/footer');
    }
}