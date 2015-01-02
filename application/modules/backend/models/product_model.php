<?php

class Product_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function view(){
        return $this->db->get('products')->result_array();
    }
    
    public function get_product($id){
        $this->db->where('id', $id);
        return $this->db->get('products')->first_row();
    }
    
    public function insert($data){
        if($this->db->insert('products', $data)){
            return $this->db->insert_id();
        }
    }
    
    public function update($id, $data){
        return $this->db->update('products', $data, array('id'=>$id));
    }
    
    public function delete($id){
        return $this->db->delete('products', array('id'=>$id));
    }
}
