<?php

class Category_model extends CI_Model{
    protected $table = 'categories';
    public function __construct() {
        parent::__construct();
    }
    
    public function view(){
        return $this->db->get('categories')->result_array();
    }
    
    public function get_category($id){
        $this->db->where('id', $id);
        return $this->db->get('categories')->first_row();
    }
    public function get_parent(){
        $this->db->select('id, name');
        return $this->db->get('categories')->result_array();
    }
    
    public function insert($data){
        return $this->db->insert('categories', $data);
    }
    
    public function update($id, $data){
        return $this->db->update('categories', $data, array('id'=>$id));
    }
    
    public function delete($id){
        return $this->db->delete('categories', array('id'=>$id));
    }
}

