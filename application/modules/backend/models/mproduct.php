<?php

class Mproduct extends CI_Model {

    protected $table = 'products';

    public function __construct() {
        parent::__construct();
    }

    public function get_all($per_page, $offset) {
       $query =  $this->db->query("select p.id, thumbnail, p.name, price, discount, category_id, p.sort_order, c.name as category_name, quantity
                from products p, categories c where p.category_id=c.id and p.status!=0  order by p.id asc limit $offset, $per_page");
       return $query->result_array();
    }
    
    public function num_rows(){
        $query = $this->db->query("select id from products where status!=0");
        return $query->num_rows();
    }

    public function get_order_by_fild($fild, $order) {
        $query =  $this->db->query("select p.id, thumbnail, p.name, p.price, discount, category_id, c.name as category_name, quantity
                from products p, categories c where p.category_id=c.id and p.status!=0 order by p.$fild $order");
        return $query->result_array();
    }

    public function get_product($id) {
        $query = $this->db->query("select p.id, thumbnail, p.name, price, discount, category_id, quantity, c.name as category_name "
                . " from products p, categories c where p.category_id=c.id and p.id=$id and p.status!=0");
        if($query->num_rows() > 0){
            return $query->row();
        }
    }

    public function get_in_category($cat_id, $per_page, $offset){
        $query = $this->db->query("select p.id, thumbnail, p.name, price, discount, category_id, quantity, c.name as category_name "
                . " from products p, categories c where p.category_id=c.id and c.id=$cat_id and p.status!=0 limit $offset, $per_page");
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return null;
        }
    }
    public function get_num_row_in_cat($cat_id){
        $query = $this->db->query("select p.id, p.category_id, c.name as category_name from products p, categories c where p.category_id=c.id and c.id=$cat_id and p.status!=0");
        return $query->num_rows();
    }
    
    public function search($name, $per_page, $offset){
        $query = $this->db->query("select p.id, thumbnail, p.name, price, discount, category_id, quantity, c.name as category_name "
                . "from products p, categories c where p.category_id=c.id and p.status!=0 and p.name like '%$name%' limit $offset, $per_page");
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return null;
        }
    }
    public function get_num_row_search($name){
        $query = $this->db->query("select id from products where name like '%$name%' and status!=0");
        return $query->num_rows();
    }
    
    public function get_most_view($limit){
        $query = $this->db->query("select id, thumbnail, name, price from products where status!=0 order by views asc limit $limit");
        return $query->result_array();
    }
    
    public function get_to_chart(){
        $query = $this->db->query("select name, price from products where status!=0 limit 10");
        return $query->result_array();
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
