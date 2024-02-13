<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function get($table) {
        return $this->db->get($table);
    }
    
    public function get_id($table, $id) {
        return $this->db->get_where($table, ['id' => $id]);
    }

    public function create($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();

    }

    public function update($table, $data, $id) {
        $this->db->update($table, $data, ['id' => $id]);
        return $this->db->affected_rows();

    }

    public function delete($table, $id) {
        $this->db->delete($table, ['id' => $id]);
        return $this->db->affected_rows();

    }

}