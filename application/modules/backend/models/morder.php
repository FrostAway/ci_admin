<?php

class Morder extends CI_Model{
    protected $table = 'orders';


    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        $query1 = $this->db->query("select o.*, u.full_name from orders o, users u");
        $query2 = $this->db->query("select * from orders where status=1");
        return $query2->result_array();
    }
    
    public function get_order($id){
        $query = $this->db->query("select o.*, u.full_name, u.email, u.address, u.phone"
                . " from orders o, users u where o.id=$id and o.user_id=u.id");
        if($query->num_rows() == 0){
            $query = $this->db->query("select * from orders");
            $query->row()->has_user = 0;
        }else{
            $query->row()->has_user = 1;
        }
        return $query->row();
    }
    
    public function get_order_by_fild($fild, $order){
        $this->db->order_by($fild, $order);
        $this->db->where('status', '1');
        return $this->db->get($this->table)->result_array();
    }
    
    public function delete($id){
        return $this->db->update($this->table, array('status'=>0), array('id'=>$id));
    }
}

