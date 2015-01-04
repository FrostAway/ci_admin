<?php

class Mcategory extends CI_Model{
    protected $table = 'categories';
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        $query = $this->db->query("select c1.id, c1.name, c1.sort_order, c1.show_in_menu, c1.parent_id, c2.name as parent_name"
                . " from categories c1, categories c2 where c1.parent_id=c2.id and c1.id!=0 and c1.status!=0");
        return $query->result_array();
    }
    
    
    public function get_order_by_fild($fild, $order){
         $query = $this->db->query("select c1.id, c1.name, c1.sort_order, c1.show_in_menu, c1.parent_id, c2.name as parent_name"
                . " from categories c1, categories c2 where c1.parent_id=c2.id and c1.id!=0 and c1.status!=0"
                 . " order by $fild $order");
        return $query->result_array();
    }
    
    public function get_category($id){
        $query = $this->db->query("select c1.*, c2.name as parent_name"
                . " from categories c1, categories c2 where c1.parent_id=c2.id and c1.id!=0 and c1.id=$id and c1.status!=0");
        return $query->row();
    }
    
    public function insert($data){
        return $this->db->insert($this->table, $data);
    }
    
    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data, array('id'=>$id));
    }
    
    public function delete($id){
        return $this->db->update($this->table,array('status'=>0), array('id'=>$id));
    }
}

