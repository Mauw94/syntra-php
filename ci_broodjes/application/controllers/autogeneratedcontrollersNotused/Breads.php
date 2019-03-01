<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Breads extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Breads_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'breads/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'breads/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'breads/index.html';
            $config['first_url'] = base_url() . 'breads/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Breads_model->total_rows($q);
        $breads = $this->Breads_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'breads_data' => $breads,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('breads/breads_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Breads_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'brdName' => $row->brdName,
		'brdPrice' => $row->brdPrice,
		'brdActive' => $row->brdActive,
	    );
            $this->load->view('breads/breads_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('breads'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('breads/create_action'),
	    'id' => set_value('id'),
	    'brdName' => set_value('brdName'),
	    'brdPrice' => set_value('brdPrice'),
	    'brdActive' => set_value('brdActive'),
	);
        $this->load->view('breads/breads_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'brdName' => $this->input->post('brdName',TRUE),
		'brdPrice' => $this->input->post('brdPrice',TRUE),
		'brdActive' => $this->input->post('brdActive',TRUE),
	    );

            $this->Breads_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('breads'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Breads_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('breads/update_action'),
		'id' => set_value('id', $row->id),
		'brdName' => set_value('brdName', $row->brdName),
		'brdPrice' => set_value('brdPrice', $row->brdPrice),
		'brdActive' => set_value('brdActive', $row->brdActive),
	    );
            $this->load->view('breads/breads_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('breads'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'brdName' => $this->input->post('brdName',TRUE),
		'brdPrice' => $this->input->post('brdPrice',TRUE),
		'brdActive' => $this->input->post('brdActive',TRUE),
	    );

            $this->Breads_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('breads'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Breads_model->get_by_id($id);

        if ($row) {
            $this->Breads_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('breads'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('breads'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('brdName', 'brdname', 'trim|required');
	$this->form_validation->set_rules('brdPrice', 'brdprice', 'trim|required');
	$this->form_validation->set_rules('brdActive', 'brdactive', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Breads.php */
/* Location: ./application/controllers/Breads.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-18 09:49:24 */
/* http://harviacode.com */