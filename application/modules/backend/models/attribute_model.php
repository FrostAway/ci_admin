<?php

class Attribute_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function view() {
        return $this->db->get('attributes')->result_array();
    }

    public function get_attribute($id) {
        $this->db->where('id', $id);
        return $this->db->get('attributes')->first_row();
    }

    public function get_name($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('attributes')->first_row();
        if ($result == null) {
            return null;
        } else {
            return $result->name;
        }
    }

    public function get_in_group($id) {
        $this->db->where('attr_group_id', $id);
        return $this->db->get('attributes')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('attributes', $data);
    }

    public function update($id, $data) {
        return $this->db->update('attributes', $data, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('attribute', array('id' => $id));
    }

}
