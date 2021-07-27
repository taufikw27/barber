<?php

class M_pesan extends CI_model{
    public function index()
    {
        date_default_timezone_set('Asia/Makassar');
        $nama   =   $this->input->post('nama');
        $alamat   =   $this->input->post('alamat');

        $users  = array (
            'nama'          =>$nama
        );
        $this->db->insert('users', $users);
        $id_users = $this->db->insert_id();

        foreach ($this->cart->contents() as $item){
            $data = array(
                'id_users'     =>$id_users,
                'id_barang'     =>$item['id'],
                'nama_barang'   =>$item['name'],
                'jumlah'        =>$item['qty'],
                'harga'         =>$item['price'],
            );
            $this->db->insert('pesan', $data);
        }
        return TRUE;
    }
    
    public function ambil_id_users($id_users)
    {
        $result = $this->db->where('id_users', $id_users)->limit(1)->get('users');
        if($result->num_rows() > 0){
            return $result->row();
        }
    }
    public function ambil_id_pesan($id)
    {
        $result = $this->db->where('id_pesan', $id)->get('pesan');
        if($result->num_rows() > 0){
            return $result->result();
        }
    }
}