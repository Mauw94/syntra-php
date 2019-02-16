<?php
    class Bestel extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('bestel_model');
                $this->load->helper('url_helper');                
        }

        public function index($page = 'home') {
            if ( ! file_exists(APPPATH.'views/user/'.$page.'.php')) {
                    show_404();
            }
    
            $data['breads'] = $this->bestel_model->getBreads(); 
            $data['toppings'] = $this->bestel_model->getToppings(); 
            $data['extras'] = $this->bestel_model->getExtras();

            $this->form_validation->set_rules('bread', 'Bread Type', 'required'); 
            $this->form_validation->set_rules('topping', 'Topping', 'required'); 
            $this->form_validation->set_rules('amount', 'Amount', 'required|is_natural_no_zero'); 

			// Check if form is submitted AND passed validation:
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header_user', $data);
                $this->load->view('user/'.$page, $data);
                $this->load->view('templates/footer_yvette', $data);
			} else {
                // Fetch specific product by ID
                $bread = $this->bestel_model->getBreads($this->input->post('bread'));
                $topping = $this->bestel_model->getToppings($this->input->post('topping'));
                $extra = $this->bestel_model->getExtras($this->input->post('extra'));
            
                // Add product to the cart
                $price = $bread['brdPrice'] + $topping['topPrice'];
                $name = $bread['brdName']. " ". $topping['topName']; 

                $data = array(
                    'id'    => $bread['id'],
                    'qty'    => $this->input->post('amount'),
                    'price'    => $price,
                    'name'    => trim($name),
                    'options' => array('opmerking' => $this->input->post('note'), 'extra' => $this->input->post('extra'))

                    // 'qty'    => "2",
                    // 'price'    => "5.50",
                    // 'name'    => "productname",
                    // 'options' => array('opmerking' => $this->input->post('note'), 'extra' => $this->input->post('extra'))
                );

                $this->cart->insert($data);

				// $this->bestel_model->set_sandwich(); 
				redirect('bestel/cart');
			}
        }

        public function success(){
            $this->load->view('templates/header_user');
            $this->load->view('user/success');
            $this->load->view('templates/footer_yvette');
        }

        public function cart(){
            $this->load->view('templates/header_user');
            $this->load->view('user/cart');
            $this->load->view('templates/footer_yvette');
        }
    }
