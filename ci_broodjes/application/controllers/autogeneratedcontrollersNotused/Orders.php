<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orders extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Orders_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'orders/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'orders/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'orders/index.html';
            $config['first_url'] = base_url() . 'orders/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Orders_model->total_rows($q);
        $orders = $this->Orders_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'orders_data' => $orders,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('orders/orders_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Orders_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'user_id' => $row->user_id,
		'ordTimestamp' => $row->ordTimestamp,
		'ordDateDelivery' => $row->ordDateDelivery,
		'status_id' => $row->status_id,
	    );
            $this->load->view('orders/orders_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('orders/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'ordTimestamp' => set_value('ordTimestamp'),
	    'ordDateDelivery' => set_value('ordDateDelivery'),
	    'status_id' => set_value('status_id'),
	);
        $this->load->view('orders/orders_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'ordTimestamp' => $this->input->post('ordTimestamp',TRUE),
		'ordDateDelivery' => $this->input->post('ordDateDelivery',TRUE),
		'status_id' => $this->input->post('status_id',TRUE),
	    );

            $this->Orders_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('orders'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Orders_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('orders/update_action'),
		'id' => set_value('id', $row->id),
		'user_id' => set_value('user_id', $row->user_id),
		'ordTimestamp' => set_value('ordTimestamp', $row->ordTimestamp),
		'ordDateDelivery' => set_value('ordDateDelivery', $row->ordDateDelivery),
		'status_id' => set_value('status_id', $row->status_id),
	    );
            $this->load->view('orders/orders_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'ordTimestamp' => $this->input->post('ordTimestamp',TRUE),
		'ordDateDelivery' => $this->input->post('ordDateDelivery',TRUE),
		'status_id' => $this->input->post('status_id',TRUE),
	    );

            $this->Orders_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('orders'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Orders_model->get_by_id($id);

        if ($row) {
            $this->Orders_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('orders'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('ordTimestamp', 'ordtimestamp', 'trim|required');
	$this->form_validation->set_rules('ordDateDelivery', 'orddatedelivery', 'trim|required');
	$this->form_validation->set_rules('status_id', 'status id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Orders.php */
/* Location: ./application/controllers/Orders.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-12 20:29:29 */
/* http://harviacode.com */