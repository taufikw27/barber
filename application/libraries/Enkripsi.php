<?php 
class Enkripsi {
	//BLOWFISH (BF), AES, CAMELLIA - 24 CHAR: CBC ECB, 12 CHAR: CTR CFB OFB 
    private $ciphering = "AES-256-CBC";
	private $encryption_key = "joyway";
	private $iv_key = "ekosistem";
	private $iv_length = 16, $iv;
	
    function __construct() {
		$this->iv = substr(md5($this->iv_key), 0, $this->iv_length);
    }
    
	public  function encodex($string) {
    
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }
 
    public function decodex($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
	
    public function encode($value){
		if(!$value){return false;}		
        $crypttext = openssl_encrypt($value, $this->ciphering, $this->encryption_key, 0, $this->iv);
		return trim($this->encodex($crypttext)); 
    }
    
    public function decode($value){
		if(!$value){return false;}
		$crypttext = $this->decodex($value);
        return openssl_decrypt($crypttext, $this->ciphering, $this->encryption_key,  0, $this->iv);
    }
}
?>