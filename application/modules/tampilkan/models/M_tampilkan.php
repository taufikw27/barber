<?php

class M_tampilkan extends CI_Model
{
    public function __construct()
    {
        
        parent::__construct();
        
    }
    public function getAllUser()
    {
    
        return $this->db->get('users')->result_array();
    }
    function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}