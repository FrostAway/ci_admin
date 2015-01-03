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

        return $this->db->insert('product_attr', $data);
    }

    public function get_value($product_id, $attr_id) {
        $this->db->where('product_id', $product_id);
        $this->db->where('attr_id', $attr_id);
        return $this->db->get($this->table)->row();
    }

    public function get_values($product_id) {
        $this->db->where('product_id', $product_id);
        $pr_attrs = $this->db->get($this->table)->result_array();
        $this->load->model('mattribute');
        $result = array();
        foreach ($pr_attrs as $attr) {
            $attr['attr_name'] = $this->mattribute->get_attribute($attr['attr_id'])->name;
            $result[] = $attr;
        }
        return $result;
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
