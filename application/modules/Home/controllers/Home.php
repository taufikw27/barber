<?php
//NUR ADILA PUSPITA SARI//
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){ 
		parent::__construct();
		$this->load->model("M_home");
		$this->load->library("cart");
	}
	
	public function index(){
		$this->load->view('header');
		//$this->load->view('nav');
		$this->load->view('content');
		$this->load->view('footer');
	}
	public function stl(){
		$data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
		$this->load->view('header_stl', $data);
		//$this->load->view('nav');
		$this->load->view('content');
		$this->load->view('footer');
	}
	public function shop(){
		$data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
		$this->load->view('header_stl',$data);
		$data['service'] = $this->M_home->getAllData();
		$this->load->view('service', $data);
		$this->load->view('footer');
	}
	public function artikel(){
		$data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
		$this->load->view('header_stl', $data);
		$data['artikel'] = $this->M_home->getAllArtikel();
		$this->load->view('artikel',$data);
		$this->load->view('footer');
	}
	public function pesan(){
		$data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
		$this->load->view('header_stl', $data);
		$this->load->view('pesan',$data);
		$this->load->view('footer');
	}

    
    public function tambah_pesanan($id)
    {
        $service = $this->M_home->find($id);
        $data = array(
                       'id'      => $service->id_service,
                       'qty'     => 1,
                       'price'   => $service->harga,
                       'name'    => $service->nama_service
                    );
        $this->cart->insert($data);
        redirect(base_url('home/pesan'));
    }
    
    public function clear_cart()
    {
        $this->cart->destroy();
        redirect(base_url('home/shop'));
    }
	public function pembayaran()
	{
			$data['users'] = $this->db->get_where('users', ['email' 
			=> $this->session->userdata('email')])->row_array();
			$this->load->view('header_stl', $data);
			$this->load->view('pembayaran',$data);
			$this->load->view('footer');
	
		}
	}
	


