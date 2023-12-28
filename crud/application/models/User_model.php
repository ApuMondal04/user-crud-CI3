<?php
// application/models/User_model.php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function insert_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function get_users() {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_user_by_id($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}
?>
