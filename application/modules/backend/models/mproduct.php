<?php

class Mproduct extends CI_Model {

    protected $table = 'products';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
       $query =  $this->db->query("select p.id, thumbnail, p.name, price, discount, category_id, p.sort_order, c.name as category_name, quantity
                from products p, categories c where p.category_id=c.id and p.status!=0 order by p.id asc");
       return $query->result_array();
    }

    public function get_order_by_fild($fild, $order) {
        $query =  $this->db->query("select p.id, thumbnail, p.name, p.price, discount, category_id, c.name as category_name, quantity
                from products p, categories c where p.category_id=c.id and p.status!=0 order by p.$fild $order");
        return $query->result_array();
    }

    public function get_product($id) {
        $query = $this->db->query("select p.id, thumbnail, p.name, price, discount, category_id, quantity, c.name as category_name "
                . " from products p, categories c where p.category_id=c.id and p.id=$id and status!=0");
        if($query->num_rows() > 0){
            return $query->row();
        }
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->update($this->table,array('status'=>0), array('id' => $id));
    }

}
