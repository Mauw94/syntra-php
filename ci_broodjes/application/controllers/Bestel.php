<?php
require_once(APPPATH . 'controllers/Auth.php');

    class Bestel extends Auth {
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
            $data['firstname'] = $this->session->userdata('user')['firstname'];
            $data['lastname'] = $this->session->userdata('user')['lastname'];

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
                $price = $bread['brdPrice'] + $topping['topPrice'] + $extra['xtrPrice'];
                $name = $bread['brdName']. " ". $topping['topName']; 

                $data = array(
                    'id'    => uniqid(),
                    'bread_id' => $this->input->post('bread'),
                    'topping_id' => $this->input->post('topping'),
                    'qty'    => $this->input->post('amount'),
                    'price'    => $price,
                    'name'    => trim($name),
                    'options' => array('opmerking' => $this->input->post('note'), 'extra' => $extra['xtrName'])
                );

                $this->cart->insert($data);
 
				redirect('bestel/cart');
			}
        }

        function updateItemQty(){
            $update = 0;
            
            // Get cart item info
            $rowid = $this->input->get('rowid');
            $qty = $this->input->get('qty');
            
            // Update item in the cart
            if(!empty($rowid) && !empty($qty)){
                $data = array(
                    'rowid' => $rowid,
                    'qty'   => $qty
                );
                $update = $this->cart->update($data);
            }
            
            // Return response
            echo $update?'ok':'err';
        }

        function removeItem($rowid){
            // Remove item from cart
            $remove = $this->cart->remove($rowid);
            redirect('bestel/cart');
        }    

        public function cart(){
            $this->load->view('templates/header_user');
            $this->load->view('user/cart');
            $this->load->view('templates/footer_yvette');
        }
    }



    
