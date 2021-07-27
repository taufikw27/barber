<?php
class M_Register extends CI_Model{
    function input(){
        $this->db->insert('users', $data);
    }
}