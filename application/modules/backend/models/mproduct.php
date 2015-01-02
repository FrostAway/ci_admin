<?php

class Mproduct extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        $this->db->order_by('sort_order', 'asc');
        return $this->db->get('products')->result_array();
    }
}

