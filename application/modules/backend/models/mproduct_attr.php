<?php

class Mproduct_attr extends CI_Model {

    protected $table = "product_attr";

    public function __construct() {
        parent::__construct();
    }

    public function insert($product_id, $attr_id, $value) {
        $data = array(
            'product_id' => $product_id,
            'attr_id' => $attr_id,
            'value' => $value
        );
        //$tbl = 'product_attr_'.$type;

        return $this->db->insert($this->table, $data);
    }

    public function get_value($product_id, $attr_id) {
        $this->db->where('product_id', $product_id);
        $this->db->where('attr_id', $attr_id);
        return $this->db->get($this->table)->row();
    }

    public function get_values($product_id) {
        
       $query = $this->db->query("select pt.*, attr.name as attr_name from product_attr pt, attributes attr where pt.attr_id=attr.id and pt.product_id=$product_id");
       return $query->result_array();
//        $attr1 = $this->db->query("select pv.*, attr.name as attr_name from product_attr_varchar pv, attributes attr where pv.product_id=$product_id and pv.attr_id=attr.id")->result_array();
//        $attr2 = $this->db->query("select pv.*, attr.name as attr_name from product_attr_text pv, attributes attr where pv.product_id=$product_id and pv.attr_id=attr.id")->result_array();
//        $attr3 = $this->db->query("select pv.*, attr.name as attr_name from product_attr_number pv, attributes attr where pv.product_id=$product_id and pv.attr_id=attr.id")->result_array();
//        $attr4 = $this->db->query("select pv.*, attr.name as attr_name from product_attr_date pv, attributes attr where pv.product_id=$product_id and pv.attr_id=attr.id")->result_array();
//        return array_merge($attr1, $attr2, $attr3, $attr4);

    }

    public function get_images($product_id) {
        $this->db->where('product_id', $product_id);
        return $this->db->get('product_attr_image')->result_array();
    }
    public function insert_image($product_id, $path){
        $data = array(
            'product_id' => $product_id,
            'path' => $path
        );
        return $this->db->insert('product_attr_image', $data);
    }
    public function delete_image($id){
        return $this->db->delete('product_attr_image', array('product_id'=>$id));
    }

    public function update_value($product_id, $attr_id, $value) {
        $data = array('value' => $value);
        return $this->db->update($this->table, $data, array('product_id' => $product_id, 'attr_id' => $attr_id));
    }

    public function delete_by_product($product_id) {
        return $this->db->delete($this->table, array('product_id' => $product_id));
    }

}
