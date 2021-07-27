<?php
//Andi Ahmad Miftahul Fauzan
defined('BASEPATH') or exit('No direct script access allowed');

class tampilkan extends MY_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tampilkan');
    }

    public function index()
    {
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/Header_dash');
        $this->load->view('Template/navbar', $data);
        $data['users'] = $this->M_tampilkan->getAllUser();
        $this->load->view('V_tampilkan', $data);
        $this->load->view('Template/Footer_login');
    }
    public function tambahdata(){
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ['matches' => 'password dont match!', 'min_length' => 'password is short']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if($this->form_validation->run() == false){
            $data['judul'] = 'tambah';
            $this->load->view('Template/Header_dash',$data);
            $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
            $this->load->view('Template/navbar',$data);
            $this->load->view('V_tambah');
            $this->load->view('Template/Footer_login',$data);
        }
        else{
            $config['upload_path']          = './assets/gambar/profile';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) { 
                $error = array('error' => $this->upload->display_errors());
                echo "Salah";
                $this->load->view('auth/registration', $error);
            } else {
                $foto = $this->upload->data();
                $foto = $foto['file_name'];
                $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => $foto,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => $this->input->post('as', true),
                'is_active' => 1,
                'date' => time()
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> akun anda telah dibuat.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('tampilkan');
        }
    }
    }}