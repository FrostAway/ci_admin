<?php

class Mcategory extends CI_Model{
    protected $table = 'categories';
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        $cates = $this->db->get($this->table)->result_array();
        $listcates = array();
        foreach ($cates as $cate){
            $query = $this->db->query("select name as parent_name from categories where id='".$cate['parent_id']."'");
            if($query->num_rows()>0){
            $cate['parent_name'] = $query->row()->parent_name;
            }else{
                $cate['parent_name'] = 'None';
            }
            $listcates[] = $cate;
        }
        return $listcates;
    }
    
    
    public function get_order_by_fild($fild, $order){
        $this->db->order_by($fild, $order);
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

