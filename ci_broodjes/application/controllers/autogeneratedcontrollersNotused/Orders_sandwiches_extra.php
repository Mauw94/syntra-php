<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orders_sandwiches_extra extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Orders_sandwiches_extra_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'orders_sandwiches_extra/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'orders_sandwiches_extra/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'orders_sandwiches_extra/index.html';
            $config['first_url'] = base_url() . 'orders_sandwiches_extra/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Orders_sandwiches_extra_model->total_rows($q);
        $orders_sandwiches_extra = $this->Orders_sandwiches_extra_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'orders_sandwiches_extra_data' => $orders_sandwiches_extra,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('orders_sandwiches_extra/orders_sandwiches_extra_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Orders_sandwiches_extra_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'orders_sandwich_id' => $row->orders_sandwich_id,
		'extra_id' => $row->extra_id,
	    );
            $this->load->view('orders_sandwiches_extra/orders_sandwiches_extra_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders_sandwiches_extra'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('orders_sandwiches_extra/create_action'),
	    'id' => set_value('id'),
	    'orders_sandwich_id' => set_value('orders_sandwich_id'),
	    'extra_id' => set_value('extra_id'),
	);
        $this->load->view('orders_sandwiches_extra/orders_sandwiches_extra_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'orders_sandwich_id' => $this->input->post('orders_sandwich_id',TRUE),
		'extra_id' => $this->input->post('extra_id',TRUE),
	    );

            $this->Orders_sandwiches_extra_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('orders_sandwiches_extra'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Orders_sandwiches_extra_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('orders_sandwiches_extra/update_action'),
		'id' => set_value('id', $row->id),
		'orders_sandwich_id' => set_value('orders_sandwich_id', $row->orders_sandwich_id),
		'extra_id' => set_value('extra_id', $row->extra_id),
	    );
            $this->load->view('orders_sandwiches_extra/orders_sandwiches_extra_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders_sandwiches_extra'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'orders_sandwich_id' => $this->input->post('orders_sandwich_id',TRUE),
		'extra_id' => $this->input->post('extra_id',TRUE),
	    );

            $this->Orders_sandwiches_extra_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('orders_sandwiches_extra'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Orders_sandwiches_extra_model->get_by_id($id);

        if ($row) {
            $this->Orders_sandwiches_extra_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('orders_sandwiches_extra'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders_sandwiches_extra'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('orders_sandwich_id', 'orders sandwich id', 'trim|required');
	$this->form_validation->set_rules('extra_id', 'extra id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Orders_sandwiches_extra.php */
/* Location: ./application/controllers/Orders_sandwiches_extra.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-18 09:50:20 */
/* http://harviacode.com */