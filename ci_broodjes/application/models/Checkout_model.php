<?php
    class Checkout_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function setOrders(){
            $user_id = $this->session->userdata('user')['user_id'];
            $ordDateDelivery = $this->input->post('ordDateDelivery');
            // Status id default: nog niet betaald (7)
            $status_id = 7; 

            $sql = "INSERT INTO orders (user_id, ordDateDelivery, status_id)
                    VALUES('" . $user_id . "', 
                           '" . $ordDateDelivery . "', 
                           '" . $status_id . "')";

            $result = $this->db->query($sql);
            return $result;
        }

        public function setOrdersSandwiches($order_id_last){
            $user_id = $this->session->userdata('user')['user_id'];
            
            foreach($this->cart->contents() as $sandwich){
                // Insert sandwich in orders_sandwiches table:
                $order_id = $order_id_last;
                $orsAmount = $sandwich['qty']; 
                $bread_id = $sandwich['bread_id']; 
                $topping_id = $sandwich['topping_id']; 
                $orsNote = $sandwich['options']['opmerking']; 
                
                $data = array(
                    'order_id'=> $order_id, 
                    'orsAmount' => $orsAmount,
                    'bread_id'=> $bread_id,
                    'topping_id' => $topping_id, 
                    'orsNote'=> $orsNote
                );
        
                $result = $this->db->insert('orders_sandwiches', $data);
                return $result;
            }
        }

        public function setOrdersSandwichesExtra($orders_sandwich_id){
                // Insert extra(s) in orders_sandwiches_extra table:
            foreach($this->cart->contents() as $sandwich){      
                // Get extra_id by extra name:
                $xtrName = $sandwich['options']['extra']; 
                if($xtrName != NULL){
                    $sql = "SELECT id FROM extras WHERE xtrName = '" . $xtrName ."' LIMIT 1";
                    $result = $this->db->query($sql);
                    $row = $result->row(); 
                    $extra_id = $row->id; 

                    $data_extra = array(
                        'orders_sandwich_id' => $orders_sandwich_id, 
                        'extra_id' => $extra_id
                    ); 

                    $result = $this->db->insert('orders_sandwiches_extra', $data_extra);
                    return $result;
                } else {
                    return true;
                }
            }
        }
    }