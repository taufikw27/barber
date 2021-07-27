<?php

class M_service extends CI_Model
{
    public function __construct()
    {
        
        parent::__construct();
        
    }
    public function getAllService()
    {
        return $this->db->get('service')->result_array();
    }
    function input_data($data,$table){
		$this->db->insert($table,$data);
	}
    public function hapusData($id)
    {
        return $this->db->delete('service', ['id_service' => $id]);
    }
    public function getServiceById($id)
    {
        return $this->db->get_where('service', ['id_service' => $id])->row_array(); 
    }
    public function updateData()
    {
        $this->form_validation->set_rules('nama_service', 'Nama_Service', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('barbershop', 'Barbershop', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $config['upload_path']          = './assets/gambar/service/';
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
            'id_service' => $this->input->post('id', true),
            'nama_service' => $this->input->post('nama_service', true),
            'harga' => $this->input->post('harga', true),
            'barbershop' => $this->input->post('barbershop', true),
            'kategori' => $this->input->post('kategori', true),
            'gambar' => $foto,
            'alamat' => $this->input->post('alamat', true)
        ];
        $this->db->where('id_service', $this->input->post('id'));
        $this->db->update('service', $data);
        $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> data udah diupdate.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('service');
    
    }}
    public function updateData1()
    {
        $this->form_validation->set_rules('nama_service', 'Nama_Service', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('barbershop', 'Barbershop', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $config['upload_path']          = './assets/gambar/service/';
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
            'id_service' => $this->input->post('id', true),
            'nama_service' => $this->input->post('nama_service', true),
            'harga' => $this->input->post('harga', true),
            'barbershop' => $this->input->post('barbershop', true),
            'kategori' => $this->input->post('kategori', true),
            'gambar' => $foto,
            'alamat' => $this->input->post('alamat', true)
        ];
        $this->db->where('id_service', $this->input->post('id'));
        $this->db->update('service', $data);
        $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> data udah diupdate.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('service/barbershop1');
    
    }}
}