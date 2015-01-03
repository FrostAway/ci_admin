<?php

class Mproduct extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        $query = $this->db->query("select p.id, p.name, discount, discount_type, thumbnail, quantity, description, p.sort_order, p.status, category_id, c.name as category_name "
                . "from products p, categories c where p.category_id=c.id order by p.sort_order asc");
        return $query->result_array();
    }
}

