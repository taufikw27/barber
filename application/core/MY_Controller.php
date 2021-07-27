<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class MY_Controller extends CI_Controller{
	public $debug = true;
	public $aksi = ['input','edit','view', 'delete', 'deleteall', 'load', 'print', 'export'];
	public $base_upload_url = "http://localhost/joywayid";
	public $base_upload_folder = "./";
	
	function get_nama_admin(){
		return "This is me";
	}

	function is_login($param){
		if($param){
			if(!$this->session->userdata('sess_simoko'))
				redirect(base_url('login'));
		}else{
			if($this->session->userdata('sess_simoko'))
				redirect(base_url('home'));
		}
	}
	
	function is_permit($nama_modul){
		$id_role = $this->session->userdata('sess_simoko')['id_role'];
		$id_menu = $this->M_menu->get_id_menu_by_modul($nama_modul);
		if($this->M_menu->cek_hak_akses($id_role, $id_menu) == 0)
			redirect(base_url('error/error_modul'));
	}
	
	//yang terbaru, disandingkan dengan is_login_check di construct
	//is_login_status_check sudah dicover di is_login
	
	//yang terbaru, dengan is_permit_action_check tidak lagi memasukkan is_login_status
	function is_permit_action_check($nama_modul,$nama_action, $view_page = 'V_index'){
		$id_role = $this->session->userdata('sess_simoko')['id_role'];
		$id_menu = $this->M_menu->get_id_menu_by_modul($nama_modul);
		$status = $this->M_menu->cek_hak_aksi($id_role, $id_menu, $nama_action, $view_page);
		return $status;
	}
	
	
	function is_login_status(){		
		if($this->session->userdata('sess_simoko')) return true;
		else return false;
	}
	
	function is_permit_action($nama_modul,$nama_action, $view_page = 'V_index'){
		if($this->is_login_status()){
			$id_role = $this->session->userdata('sess_simoko')['id_role'];
			$id_menu = $this->M_menu->get_id_menu_by_modul($nama_modul);
			$status = $this->M_menu->cek_hak_aksi($id_role, $id_menu, $nama_action, $view_page);
			return $status;
		}
		//redirect dipindahkan ke view 
		//redirect(base_url('login'));
		//echo "<script>window.location.href = '".base_url('login')."'; </script>";	
	}

	function tanggal_indo($tanggal){
		$bulan = array (1 =>   
					'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split = explode('-', $tanggal);
		return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	}
}