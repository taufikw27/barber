<?php

class Crypt extends CI_Model  {

	public function en($str){
		$str = $this->enkripsi->encode($str);
		return $str;
    }

    public function de($str){
    	$str = $this->enkripsi->decode($str);
		return $str;
    }
}
