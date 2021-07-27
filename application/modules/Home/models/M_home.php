<?php

class M_home extends CI_Model
{
    public function __construct()
    {
        
        parent::__construct();
        
    }
    public function getAllData()
    {
    
        return $this->db->get('service')->result_array();
    }
    public function getAllArtikel()
    {
    
        return $this->db->get('artikel')->result_array();
    }
    public function find($id){
        //Query mencari record berdasarkan ID-nya
        $hasil = $this->db->where('id_service', $id)
                          ->get('service');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }  
}