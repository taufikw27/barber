<?php
class M_ud extends CI_Model{
    public function getUserById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array(); 
    }
    public function updateData()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ['matches' => 'password dont match!', 'min_length' => 'password is short']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $data = [
            "id" => $this->input->post('id', true), //mengamankan data dengan parameter true, pake XSS filter seperti binding
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true), //mengamankan data dengan parameter true, pake XSS filter seperti binding
            "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "role" => $this->input->post('as', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
    }
    public function hapusData($id)
    {
        $this->db->delete('users', ['id' => $id]);
    }
}