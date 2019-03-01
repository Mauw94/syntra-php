<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Toppings extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Toppings_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'toppings/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'toppings/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'toppings/index.html';
            $config['first_url'] = base_url() . 'toppings/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Toppings_model->total_rows($q);
        $toppings = $this->Toppings_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'toppings_data' => $toppings,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('toppings/toppings_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Toppings_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'topName' => $row->topName,
		'topDesciption' => $row->topDesciption,
		'topPrice' => $row->topPrice,
		'topActive' => $row->topActive,
	    );
            $this->load->view('toppings/toppings_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('toppings'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('toppings/create_action'),
	    'id' => set_value('id'),
	    'topName' => set_value('topName'),
	    'topDesciption' => set_value('topDesciption'),
	    'topPrice' => set_value('topPrice'),
	    'topActive' => set_value('topActive'),
	);
        $this->load->view('toppings/toppings_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'topName' => $this->input->post('topName',TRUE),
		'topDesciption' => $this->input->post('topDesciption',TRUE),
		'topPrice' => $this->input->post('topPrice',TRUE),
		'topActive' => $this->input->post('topActive',TRUE),
	    );

            $this->Toppings_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('toppings'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Toppings_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('toppings/update_action'),
		'id' => set_value('id', $row->id),
		'topName' => set_value('topName', $row->topName),
		'topDesciption' => set_value('topDesciption', $row->topDesciption),
		'topPrice' => set_value('topPrice', $row->topPrice),
		'topActive' => set_value('topActive', $row->topActive),
	    );
            $this->load->view('toppings/toppings_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('toppings'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'topName' => $this->input->post('topName',TRUE),
		'topDesciption' => $this->input->post('topDesciption',TRUE),
		'topPrice' => $this->input->post('topPrice',TRUE),
		'topActive' => $this->input->post('topActive',TRUE),
	    );

            $this->Toppings_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('toppings'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Toppings_model->get_by_id($id);

        if ($row) {
            $this->Toppings_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('toppings'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('toppings'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('topName', 'topname', 'trim|required');
	$this->form_validation->set_rules('topDesciption', 'topdesciption', 'trim|required');
	$this->form_validation->set_rules('topPrice', 'topprice', 'trim|required');
	$this->form_validation->set_rules('topActive', 'topactive', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Toppings.php */
/* Location: ./application/controllers/Toppings.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-18 09:50:43 */
/* http://harviacode.com */