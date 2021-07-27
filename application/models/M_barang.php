<?php
class M_barang extends CI_Model{
	
	function selectBarang(){
		$sql = "select * from barang";
		$data = $this->db->query($sql)->result();
		return $data;
	}
	
	
	
}