<?php
    class Bestel_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function getBreads($id = ''){
            $this->db->select('*');
            $this->db->from('breads');
            $this->db->where('brdActive', '1');
            if($id){
                $this->db->where('id', $id);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $query = $this->db->get();
                $result = $query->result_array();
            }
            
            return !empty($result)?$result:false;
        }

        public function getToppings($id = ''){
            $this->db->select('*');
            $this->db->from('toppings');
            $this->db->where('topActive', '1');
            if($id){
                $this->db->where('id', $id);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $query = $this->db->get();
                $result = $query->result_array();
            }
            
            return !empty($result)?$result:false;
        }

        public function getExtras($id = ''){
            $this->db->select('*');
            $this->db->from('extras');
            $this->db->where('xtrActive', '1');
            if($id){
                $this->db->where('id', $id);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $query = $this->db->get();
                $result = $query->result_array();
            }
            
            return !empty($result)?$result:false;
        }
    }