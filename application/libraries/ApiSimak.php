<?php
class ApiSimak{
	//6896aa2299c73b2bd793c938395293d5
	private $apikeysimak = "db429eff98bdfbad5db82761504d2225";
	
	function post_login($url, $username, $password){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-type: application/json', "X-API-KEY: $this->apikeysimak"));

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('uid' => $username, 'password' => $password)));
		$result=curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	
	function curl_get($url){	
		if (!function_exists('curl_init')){ 
			die('CURL is not installed!');
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', "X-API-KEY: $this->apikeysimak"));
		$result=curl_exec($ch);
		curl_close($ch);
		return $result;
		//return json_decode($result,true);
	}

	function curl_error_check($json){
		$ar = json_decode($json,true);
		if(isset($ar['error'])) return $ar['error'];
		else return "1";
	}

	function save_json_file($url, $jsonfile){
		/*Data saved in file */
		if(!file_exists($jsonfile))
			$fh = fopen($jsonfile, 'w');
		$json = $this->curl_get($url);
		$error = $this->curl_error_check($json);
		if($error == 1){
			if(file_put_contents($jsonfile, $json)) return '1';
			else return $error;
		}
	}
	
	function get_json_file($jsonfile){
		if (file_exists($jsonfile)) return file_get_contents($jsonfile);
	}
	
	function get_json_url($url){
		$json = $this->curl_get($url);
		if($this->curl_error_check($json) == 1) return $json; 
	}
	
	
}

?>