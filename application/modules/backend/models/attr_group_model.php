<?php

class attr_group_model extends CI_Model{
    public function __construct() {
        parent::__construct();
      
    }
    
    public function view(){
        return $this->db->get('attr_group')->result_array();
    }
    public function get_attr_group($id){
        $this->db->where('id', $id);
        return $this->db->get('attr_group')->first_row();
    }
    
    public function check_unique_attr($id){
        $this->db->where('id', $id);
        $num = $this->db->get('attributes')->num_rows();
        if($num == 0){
            return true;
        }else{
            return false;
        }
    }
    public function insert($data){
        return $this->db->insert('attr_group', $data);
    }
    public function delete_attr($id){
        return $this->db->delete('attributes', array('id'=>$id));
    }
    public function delete($id){
        return $this->db->delete('attr_group', array('id'=>$id));
    }
}

