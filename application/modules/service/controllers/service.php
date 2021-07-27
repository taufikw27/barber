<?php
class service extends MY_Controller {
	public function __construct(){ 
		parent::__construct();
        //$this->load->model('M_login');
        $this->load->model('M_service');
        $this->load->library('form_validation');
	}
    public function index(){
       
        $this->load->view('Template/Header_dash');
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/navbar', $data);
        $data['service'] = $this->M_service->getAllService();
        $this->load->view('V_service', $data);
        $this->load->view('Template/Footer_login');
    }
    public function barbershop1(){
       
        $this->load->view('Template/Header_dash');
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/navbar1', $data);
        $data['service'] = $this->M_service->getAllService();
        $this->load->view('V_service_1', $data);
        $this->load->view('Template/Footer_login');
    }
    public function Input_service(){
    $this->form_validation->set_rules('nama_service', 'Nama_Service', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
    $this->form_validation->set_rules('barbershop', 'Barbershop', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    if($this->form_validation->run() == false){
        $data['judul'] = 'Tambah Service';
        $this->load->view('Template/Header_dash',$data);
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/navbar',$data);
        $this->load->view('V_service');
        $this->load->view('Template/Footer_login',$data);
    }
    else{
        $config['upload_path']          = './assets/gambar/service/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) { 
            $error = array('error' => $this->upload->display_errors());
            echo "Salah";
            $this->load->view('service', $error);
        } else {
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $data = [
            'nama_service' => $this->input->post('nama_service', true),
            'harga' => $this->input->post('harga', true),
            'barbershop' => $this->input->post('barbershop', true),
            'alamat' => $this->input->post('alamat', true),
            'kategori' => $this->input->post('kategori', true),
            'gambar' => $foto
        ];
        $this->db->insert('service', $data);
        $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Data Telah ditambahkan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('service');
    }
}
}
function delete($id_service)
{
    $this->M_service->hapusData($id_service);
    redirect('service');
}
public function formEdit($id)
{
    $data['users'] = $this->db->get_where('users', ['email' 
    => $this->session->userdata('email')])->row_array();
    $data['judul']= 'EDIT';
    $this->load->view('Template/Header_dash', $data);
    $this->load->view('Template/navbar', $data);
    $data['service'] = $this->M_service->getServiceById($id);
    $this->load->view('ubah_service', $data);
    $this->load->view('Template/Footer_login');
}
public function formEdit2($id)
{
    $data['users'] = $this->db->get_where('users', ['email' 
    => $this->session->userdata('email')])->row_array();
    $data['judul']= 'EDIT';
    $this->load->view('Template/Header_dash', $data);
    $this->load->view('Template/navbar1', $data);
    $data['service'] = $this->M_service->getServiceById($id);
    $this->load->view('ubah_service_1', $data);
    $this->load->view('Template/Footer_login');
}
public function ubah()
    { 
        $data['service'] = $this->M_service->getServiceById($id);
        $this->M_service->updateData();
        redirect('service');
    }

function ubah1()
    { 
        $data['service'] = $this->M_service->getServiceById($id);
        $this->M_service->updateData1();
        redirect('service/barbershop1');
    }
}