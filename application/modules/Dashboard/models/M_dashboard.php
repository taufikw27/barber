<?php

class M_dashboard extends CI_model{
public function hitung()
{   
    $query = $this->db->get('users');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function hitung1()
{   
    $query = $this->db->get('artikel');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function hitung2()
{   
    $query = $this->db->get('service');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
}