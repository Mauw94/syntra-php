<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Extras extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Extras_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'extras/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'extras/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'extras/index.html';
            $config['first_url'] = base_url() . 'extras/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Extras_model->total_rows($q);
        $extras = $this->Extras_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'extras_data' => $extras,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('extras/extras_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Extras_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'xtrName' => $row->xtrName,
		'xtrPrice' => $row->xtrPrice,
		'xtrActive' => $row->xtrActive,
	    );
            $this->load->view('extras/extras_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('extras'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('extras/create_action'),
	    'id' => set_value('id'),
	    'xtrName' => set_value('xtrName'),
	    'xtrPrice' => set_value('xtrPrice'),
	    'xtrActive' => set_value('xtrActive'),
	);
        $this->load->view('extras/extras_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'xtrName' => $this->input->post('xtrName',TRUE),
		'xtrPrice' => $this->input->post('xtrPrice',TRUE),
		'xtrActive' => $this->input->post('xtrActive',TRUE),
	    );

            $this->Extras_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('extras'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Extras_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('extras/update_action'),
		'id' => set_value('id', $row->id),
		'xtrName' => set_value('xtrName', $row->xtrName),
		'xtrPrice' => set_value('xtrPrice', $row->xtrPrice),
		'xtrActive' => set_value('xtrActive', $row->xtrActive),
	    );
            $this->load->view('extras/extras_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('extras'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'xtrName' => $this->input->post('xtrName',TRUE),
		'xtrPrice' => $this->input->post('xtrPrice',TRUE),
		'xtrActive' => $this->input->post('xtrActive',TRUE),
	    );

            $this->Extras_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('extras'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Extras_model->get_by_id($id);

        if ($row) {
            $this->Extras_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('extras'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('extras'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('xtrName', 'xtrname', 'trim|required');
	$this->form_validation->set_rules('xtrPrice', 'xtrprice', 'trim|required');
	$this->form_validation->set_rules('xtrActive', 'xtractive', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Extras.php */
/* Location: ./application/controllers/Extras.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-18 09:49:38 */
/* http://harviacode.com */