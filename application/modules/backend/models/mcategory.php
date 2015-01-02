<?php

class Mcategory extends CI_Model{
    protected $table = 'categories';
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        return $this->db->get($this->table)->result_array();
    }
    
    public function get_category($id){
        $this->db->where('id', $id);
        return $this->db->get($this->table)->first_row();
    }
    
    public function insert($data){
        return $this->db->insert($this->table, $data);
    }
    
    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data, array('id'=>$id));
    }
    
    public function delete($id){
        return $this->db->delete($this->table, array('id'=>$id));
    }
}

