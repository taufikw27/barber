<?php
class artikel extends MY_Controller {
	public function __construct(){ 
		parent::__construct();
        //$this->load->model('M_login');
        $this->load->model('M_artikel');
        $this->load->library('form_validation');
	}
    public function index(){
       
        $this->load->view('Template/Header_dash');
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/navbar', $data);
        $data['artikel'] = $this->M_artikel->getAllArtikel();
        $this->load->view('V_artikel', $data);
        $this->load->view('Template/Footer_login');
    }
    public function barbershop2(){
       
        $this->load->view('Template/Header_dash');
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/navbar1', $data);
        $data['artikel'] = $this->M_artikel->getAllArtikel();
        $this->load->view('V_artikel_1', $data);
        $this->load->view('Template/Footer_login');
    }
    public function Input_artikel(){
    $this->form_validation->set_rules('nama_artikel', 'Nama_Artikel', 'required|trim');
    $this->form_validation->set_rules('link', 'Link', 'required|trim');
    if($this->form_validation->run() == false){
        $data['judul'] = 'Tambah Artikel';
        $this->load->view('Template/Header_dash',$data);
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/navbar',$data);
        $this->load->view('V_artikel');
        $this->load->view('Template/Footer_login',$data);
    }
    else{
        $config['upload_path']          = './assets/gambar/artikel/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) { 
            $error = array('error' => $this->upload->display_errors());
            echo "Salah";
            $this->load->view('artikel', $error);
        } else {
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $data = [
            'nama_artikel' => $this->input->post('nama_artikel', true),
            'link' => $this->input->post('link', true),
            'gambar' => $foto
        ];
        $this->db->insert('artikel', $data);
        $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> akun anda telah dibuat.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('artikel');
    }
}
}
public function formEdit($id)
{
    $data['users'] = $this->db->get_where('users', ['email' 
    => $this->session->userdata('email')])->row_array();
    $data['judul']= 'EDIT';
    $this->load->view('Template/Header_dash', $data);
    $this->load->view('Template/navbar', $data);
    $data['artikel'] = $this->M_artikel->getArtikelById($id);
    $this->load->view('ubah_artikel', $data);
    $this->load->view('Template/Footer_login');
}
public function formEdit2($id)
{
    $data['users'] = $this->db->get_where('users', ['email' 
    => $this->session->userdata('email')])->row_array();
    $data['judul']= 'EDIT';
    $this->load->view('Template/Header_dash', $data);
    $this->load->view('Template/navbar1', $data);
    $data['artikel'] = $this->M_artikel->getArtikelById($id);
    $this->load->view('ubah_artikel_1', $data);
    $this->load->view('Template/Footer_login');
}
function delete($id_artikel)
{
    $this->M_artikel->hapusData($id_artikel);
    redirect('artikel');
}
public function ubah()
    { 
        $data['artikel'] = $this->M_artikel->getArtikelById($id);
        $this->M_artikel->updateData();
        redirect('artikel');
    }

function ubah1()
    { 
        $data['artikel'] = $this->M_artikel->getArtikelById($id);
        $this->M_artikel->updateData1();
        redirect('artikel/barbershop2');
    }
}