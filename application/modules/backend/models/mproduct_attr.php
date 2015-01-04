<?php

class Mproduct_attr extends CI_Model {

    protected $table = "product_attr";

    public function __construct() {
        parent::__construct();
    }

    public function insert($type, $product_id, $attr_id, $value) {
        $data = array(
            'product_id' => $product_id,
            'attr_id' => $attr_id,
            'value' => $value
        );
        $tbl = 'product_attr_'.$type;

        return $this->db->insert($tbl, $data);
    }

    public function get_value($product_id, $attr_id) {
        $this->db->where('product_id', $product_id);
        $this->db->where('attr_id', $attr_id);
        return $this->db->get($this->table)->row();
    }

    public function get_values($product_id) {
        
//        $query = $this->db->query("select * from product_attr_varchar pav, product_attr_text pat, product_attr_number pan, product_attr_date pad, attributes att"
//                . " where pav.product_id=$product_id or pat.product_id=$product_id or pan.product_id=$product_id or pad.product_id=$product_id");
       // $query = $this->db->query("select pv.value as pv_value, pn.value as pn_value from product_attr_varchar pv, product_attr_number pn where pv.product_id=$product_id or pn.product_id=$product_id");
        $attr1 = $this->db->query("select pv.*, attr.name as attr_name from product_attr_varchar pv, attributes attr where pv.product_id=$product_id and pv.attr_id=attr.id")->result_array();
        $attr2 = $this->db->query("select pv.*, attr.name as attr_name from product_attr_text pv, attributes attr where pv.product_id=$product_id and pv.attr_id=attr.id")->result_array();
        $attr3 = $this->db->query("select pv.*, attr.name as attr_name from product_attr_number pv, attributes attr where pv.product_id=$product_id and pv.attr_id=attr.id")->result_array();
        $attr4 = $this->db->query("select pv.*, attr.name as attr_name from product_attr_date pv, attributes attr where pv.product_id=$product_id and pv.attr_id=attr.id")->result_array();
        return array_merge($attr1, $attr2, $attr3, $attr4);
//        $this->db->where('product_id', $product_id);
//        $pr_attrs = $this->db->get($this->table)->result_array();
//        $this->load->model('mattribute');
//        $result = array();
//        foreach ($pr_attrs as $attr) {
//            $attr['attr_name'] = $this->mattribute->get_attribute($attr['attr_id'])->name;
//            $result[] = $attr;
//        }
//        return $result;
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
        $this->db->update($this->table, $data, array('product_id' => $product_id, 'attr_id' => $attr_id));
        $this->db->update('product_attr_varchar', $data, array('product_id' => $product_id, 'attr_id' => $attr_id));
        $this->db->update('product_attr_text', $data, array('product_id' => $product_id, 'attr_id' => $attr_id));
        $this->db->update('product_attr_number', $data, array('product_id' => $product_id, 'attr_id' => $attr_id));
        $this->db->update('product_attr_date', $data, array('product_id' => $product_id, 'attr_id' => $attr_id));
    }

    public function delete_by_product($product_id) {
        return $this->db->delete($this->table, array('product_id' => $product_id));
    }

}
