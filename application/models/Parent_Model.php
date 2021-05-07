<?php

class Parent_Model extends CI_Model {
    
        function fetch_where($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('parent_acct_tbl');
        return $query->result();
    }
    
        public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('parent_acct_tbl');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
}

