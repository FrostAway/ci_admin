<?php

class Attr_relation_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($product_id, $attr_id, $value){
        $data = array(
            'product_id' => $product_id,
            'attr_id' => $attr_id,
            'value' => $value,
        );
        return $this->db->insert('attr_relationship', $data);
    }
    
    public function get_value($product_id, $attr_id){
        $this->db->where('product_id', $product_id);
        $this->db->where('attr_id', $attr_id);
        $result = $this->db->get('attr_relationship')->first_row();
        if($result != null){
            return $result;
        }else{
            return null;
        }
    }
    
    public function get_values($product_id){
        $this->db->where('product_id', $product_id);
        $this->db->where('attr_id !=', 1);
        $result = $this->db->get('attr_relationship')->result_array();
        if(count($result)>0){
            return $result;
        }else{
            return null;
        }
    }
    
    public function get_images($product_id, $attr_id){
        $this->db->where('product_id', $product_id);
        $this->db->where('attr_id', $attr_id);
        $result = $this->db->get('attr_relationship')->result_array();
        if(count($result) > 0){
            return $result;
        }else{
            return null;
        }
    }
    
    public function update($product_id, $attr_id, $value){
        $this->db->where('product_id', $product_id);
        $this->db->where('attr_id', $attr_id);
        $data = array('value' => $value);
        return $this->db->update('attr_relationship', $data);
    }
    
    public function update_value($id, $value){
        $data = array('value' => $value);
        return $this->db->update('attr_relationship', $data, array('id'=>$id));
    }
    
    public function delete($product_id, $attr_id){
        return $this->db->delete('attr_relationship', array('product_id'=>$product_id, 'attr_id'=>$attr_id));
    }
    public function delete_id($id){
        return $this->db->delete('attr_relationship', array('id'=>$id));
    }
}
