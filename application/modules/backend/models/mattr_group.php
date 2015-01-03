<?php

class Mattr_group extends CI_Model{
    protected  $table = 'attr_group';
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('attr_group')->result_array();
    }
    
    public function get_order_by_fild($fild, $order){
        $this->db->order_by($fild, $order);
        return $this->db->get($this->table)->result_array();
    }
    
    public function get_attr_group($id){
        $this->db->where('id', $id);
        return $this->db->get($this->table)->first_row();
    }
  

    public function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data){
        $this->db->update($this->table, $data, array('id'=>$id));
    }
    
    public function delete_group($id){
        return $this->db->delete($this->table, array('id'=>$id));
    }
}

