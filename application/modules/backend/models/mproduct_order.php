<?php

class Mproduct_order extends CI_Model{
    protected $table = "product_orders";
    public function __construct() {
        parent::__construct();
    }
    
    public function get_in_order($order_id){
        $query = $this->db->query("select thumbnail, p.name, p.price, p.discount, p.discount_type, po.id, po.order_id, po.product_id, po.quantity, po.total "
                . "from products p, product_orders po where po.order_id=$order_id and po.product_id=p.id");
        return $query->result_array();
    }
    
    public function delete_order($order_id){
        return $this->db->delete($this->table, array('order_id'=>$order_id));
    }
}

