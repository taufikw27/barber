<?php
class Dashboard extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_dashboard');
    }
    function index(){
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/Header_dash');
        $this->load->view('Template/navbar',$data);
        $data['total_users'] = $this->M_dashboard->hitung();
        $data['total_artikel'] = $this->M_dashboard->hitung1();
        $data['total_service'] = $this->M_dashboard->hitung2();
        $this->load->view('V_Dashboard',$data);
        $this->load->view('Template/Footer_login');
    }
    function barbershop(){
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/Header_dash');
        $this->load->view('Template/navbar1',$data);
        $data['total_users'] = $this->M_dashboard->hitung();
        $data['total_artikel'] = $this->M_dashboard->hitung1();
        $data['total_service'] = $this->M_dashboard->hitung2();
        $this->load->view('V_Dashboard',$data);
        $this->load->view('Template/Footer_login');
    }
   
}