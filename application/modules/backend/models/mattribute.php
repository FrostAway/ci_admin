<?php

class Mattribute extends CI_Model{
    protected $table = 'attributes';
    public function __construct() {
        parent::__construct();
        
    }
    
    
    public function get_all(){
         $attrs = $this->db->get('attributes')->result_array();
         return $attrs;
    }
    
    public function get_attribute($id){
        $this->db->where('id', $id);
        return $this->db->get($this->table)->first_row();
    }
    
    public function get_in_group($g_id){
        $this->db->where('attr_group_id', $g_id);
        return $this->db->get($this->table)->result_array();
    }
    
    public function insert($data){
        return $this->db->insert('attributes', $data);
    }
    
    public function update($id, $data){
        return $this->db->update($this->table, $data, array('id'=>$id));
    }
    
    public function delete($id){
        return $this->db->delete($this->table, array('id'=>$id));
    }
    
}
