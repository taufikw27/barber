<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect('kesalahan/error_page');
	}
	
	//upload file form -> return nama file
	public function do_upload($foldername){ //modulName diperlukan jika hasil upload ingin ditampilkan ke view
		$config['upload_path']          = $this->base_upload_folder."uploads/$foldername/";
		$config['allowed_types']        = 'gif|jpg|jpeg|png|wmv|mp4';
		//$config['max_size']             = 100;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile')){ //dari view
			//$error = array('error' => $this->upload->display_errors());
			//$error['modulName'] = $modulName;
			//$this->load->view('upload_fail', $error);
			$error = $this->upload->display_errors();
			//echo "errorfile.png";
		}
		else{
			//if ($this->security->xss_clean($file, TRUE) === TRUE){		
				//$data = array('upload_data' => $this->upload->data());
				//$data['modulName'] = $modulName;
				//$this->load->view('upload_success', $data);
				$data = $this->upload->data();
				echo "$foldername/".$data['file_name'];
			//}else "corruptedfile.png";
		}
	}
	
	//upload file summernotes -> return url_file
	public function do_upload_summernote(){
		$fname = "summernote-files";
		$config['upload_path']          = $this->base_upload_folder."$fname/";
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		//$config['max_size']             = 100;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')){		//dari oform
			$error = $this->upload->display_errors();
			echo "Error: ".$error;	
		}
		else{
			//if ($this->security->xss_clean($file, TRUE) === TRUE){
				$data = $this->upload->data();
				echo $this->base_url_upload."$fname/".$data['file_name'];
			//}else "Error: Malicious detected";
		}
	}
}
?>