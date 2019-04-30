<?php
class Home extends CI_Controller {

    private $data;
    
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['user']) || isset($_SESSION['company'])) {
            echo 'ok we in';
        } else {
            redirect('login');
        }
        $this->load->helper('url_helper');
    }

    public function index()
    {      
        if (null !== $this->session->userdata('user')) {
            if ($this->session->userdata('user')['setup_profile'] == 0) {
                redirect('user');
            }
        }
        if (null !== $this->session->userdata('company')) {
            if ($this->session->userdata('company')['setup_profile'] == 0) {
                redirect('company');
            }
        }
        $this->data = array(
            'title' => 'Home',
        );

        $this->load->view('templates/header_main');
        $this->load->view('home/home', $this->data);
        $this->load->view('templates/footer');
    }
}