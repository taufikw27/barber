<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function __construct(){ 
		parent::__construct();
		$this->load->model("M_barang");
	}
	function index(){
		//$sql = "select * from tb_hobby";
		//$res = $sql;
		//$res = $this->db->query($sql)->result();
		$res = $this->M_barang->selectBarang();
		$data['barang'] = $res;
		$this->load->view('welcome_message', $data);
	}
}
