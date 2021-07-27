<?php

class M_artikel extends CI_Model
{
    public function __construct()
    {
        
        parent::__construct();
        
    }
    public function getArtikelById($id)
    {
        return $this->db->get_where('artikel', ['id_artikel' => $id])->row_array(); 
    }
    public function updateData()
    {
    $this->form_validation->set_rules('nama_artikel', 'Nama_Artikel', 'required|trim');
    $this->form_validation->set_rules('link', 'Link', 'required|trim');
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
            'id_artikel' => $this->input->post('id', true),
            'nama_artikel' => $this->input->post('nama_artikel', true),
            'link' => $this->input->post('link', true),
            'gambar' => $foto
        ];
        $this->db->where('id_artikel', $this->input->post('id'));
        $this->db->update('artikel', $data);
        $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> data udah diupdate.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('artikel');
    
    }}
    public function updateData1()
    {
    $this->form_validation->set_rules('nama_artikel', 'Nama_Artikel', 'required|trim');
    $this->form_validation->set_rules('link', 'Link', 'required|trim');
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
            'id_artikel' => $this->input->post('id', true),
            'nama_artikel' => $this->input->post('nama_artikel', true),
            'link' => $this->input->post('link', true),
            'gambar' => $foto
        ];
        $this->db->where('id_artikel', $this->input->post('id'));
        $this->db->update('artikel', $data);
        $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> data udah diupdate.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('artikel/barbershop2');
    
    }}
    function getAllArtikel()
    {
        return $this->db->get('artikel')->result_array();
    }
    public function hapusData($id)
    {
        return $this->db->delete('artikel', ['id_artikel' => $id]);
    }
    
    
}