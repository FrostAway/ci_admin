<?php

class Morder extends CI_Model{
    protected $table = 'orders';


    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        $query = $this->db->query("select * from orders where status!=0");
        return $query->result_array();
    }
    
    public function get_order($id){
        $query = $this->db->query("select o.*, u.full_name"
                . " from orders o, users u where o.id=$id and o.user_id=u.id and o.status!=0");       
        return $query->row();
    }
    
    public function get_order_by_fild($fild, $order){
        $query = $this->db->query("select * from orders where status!=0 order by $fild $order");
        return $query->result_array();
    }
    
    public function updateStatus($id, $stt){
        return $this->db->update($this->table, array('status'=>$stt), array('id'=>$id));
    }
    
    public function delete($id){
        return $this->db->update($this->table, array('status'=>0), array('id'=>$id));
    }
}

