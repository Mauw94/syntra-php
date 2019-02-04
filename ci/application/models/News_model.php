<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_news($slug = FALSE)
        {
                if ($slug === FALSE)
                {
                        //$query = $this->db->order_by('id', 'DESC');
                        //$query = $this->db->get('news');

                        //$query = $this->db->select('*')
                        //->order_by('id', 'DESC')
                        //->limit(10)
                        //->get('news');

                        $query = $this->db->query('
                        SELECT * FROM news ORDER BY id DESC
                        ');


                        return $query->result_array();
                }

                $query = $this->db->get_where('news', array('slug' => $slug));
                return $query->row_array();
        }

        public function delete_news($slug = FALSE) 
        {
                if ($slug != null) {                
                        $query = $this->db->delete('news', array('slug' => $slug));                        
                }
        }

        public function set_news()
        {
                $this->load->helper('url');

                $slug = url_title($this->input->post('title'), 'dash', TRUE);

                $data = array(
                        'title' => $this->input->post('title'),
                        'slug' => $slug,
                        'text' => $this->input->post('text')
                );

                return $this->db->insert('news', $data);
        }
        
}