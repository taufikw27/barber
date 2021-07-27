<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi{
	//anti sql injection
	function antiInject($data, $ishtml = false){
		$filtered = stripslashes(trim($data)); //double and single quote
		if($ishtml) $filtered = htmlspecialchars($filtered, ENT_QUOTES); //strip_tags("text", "<h1><b>")
		$con = get_instance()->db->conn_id;
		//$filtered = mysqli_real_escape_string($con, $filtered);
		return $filtered;
	}
	
	/*buble sort atau sort by thn_ajar di view db*/
	function bubleSort($jsonar){
		$s = count($jsonar);
		for($i=0;$i<$s;$i++){
			for($j=$i+1;$j<$s;$j++)
			{
				if($jsonar[$i]['thn_ajar']>$jsonar[$j]['thn_ajar']){
				   $temp=$jsonar[$i];
					$jsonar[$i]=$jsonar[$j];
					$jsonar[$j]=$temp;
				 }
			  }
		}
		return $jsonar;
	}
	
	function syncData(){
		$kelasurl = "https://simak.poliupg.ac.id/api/machine/get_tabel_konten/ref_kelas";
		$kelasfile = "datajson/aca_kelas.json";
		$prodiurl = "https://simak.poliupg.ac.id/api/machine/get_tabel_konten/prodi";;
		$prodifile = "datajson/aca_prodi.json";
		$taurl = "https://simak.poliupg.ac.id/api/machine/get_tabel_konten/aca_tahun_ajar";
		$tafile= "datajson/aca_thn_ajar.json";
		$dosenurl = "https://simak.poliupg.ac.id/api/machine/get_tabel_konten/view_dosen";
		$dosenfile = "datajson/aca_dosen.json";
		$ob = new ApiSimak();
		
		$count = 0;
		if($ob->save_json_file($taurl,$tafile) == '1') $count++;
		if($ob->save_json_file($prodiurl,$prodifile) == '1') $count++;
		if($ob->save_json_file($kelasurl,$kelasfile) == '1') $count++;
		if($ob->save_json_file($dosenurl,$dosenfile) == '1') $count++;
		echo "$count file berhasil diperbarui.";
	}
	
	function getInfoWkAll(){
		$kelasurl = "https://simak.poliupg.ac.id/api/machine/get_tabel_konten/ref_kelas";
		$kelasfile = "datajson/aca_kelas.json";
		$prodiurl = "https://simak.poliupg.ac.id/api/machine/get_tabel_konten/prodi";;
		$prodifile = "datajson/aca_prodi.json";
		$taurl = "https://simak.poliupg.ac.id/api/machine/get_tabel_konten/aca_tahun_ajar";
		$tafile= "datajson/aca_thn_ajar.json";
		$dosenurl = "https://simak.poliupg.ac.id/api/machine/get_tabel_konten/view_dosen";
		$dosenfile = "datajson/aca_dosen.json";
		$ob = new ApiSimak();
		
		if(!file_exists($tafile)) $ob->save_json_file($taurl,$tafile);
		if(!file_exists($prodifile)) $ob->save_json_file($prodiurl,$prodifile);
		if(!file_exists($kelasfile)) $ob->save_json_file($kelasurl,$kelasfile);
		if(!file_exists($dosenfile)) $ob->save_json_file($dosenurl,$dosenfile);
		
		$arta = json_decode($ob->get_json_file($tafile));
		$arprodi = json_decode($ob->get_json_file($prodifile));
		$arkelas = json_decode($ob->get_json_file($kelasfile));
		$ardosen = json_decode($ob->get_json_file($dosenfile));
		
		foreach ($arta as $idx => $attr){
			$kode_thn = $this->getKodeThnGage($attr->tahun_ajar,$attr->ganjil_genap);
			$thn_ajar = $attr->tahun_ajar." ".$attr->ganjil_genap;
			$data['tas'][$kode_thn] = $thn_ajar;
		}
		
		//$data['tas'] = array_unique($data['tas']);
		ksort($data['tas']);
		
		foreach ($arprodi as $idx => $attr)
			$data['prodis'][$attr->kode] = $attr->nama;
		
		foreach ($arkelas as $idx => $attr)
			$data['kelas'][$attr->nama] = $attr->nama;
		
		foreach ($ardosen as $idx => $attr)
			$data['dosen'][$attr->nip_peg] = $attr->nama_lengkap_peg;
		
		return $data;
	}
	
	function getThnAjar($kode_thn){
		$kode_thn = trim($kode_thn);
		$thnawal = substr($kode_thn, 0,4);
		$thnakhir = $thnawal+1;
		$gage = substr($kode_thn, -1);
		if ($gage == 1) $lgage = "Ganjil";
		else $lgage = "Genap";
		return $thnawal."/".$thnakhir." ".$lgage; 
	}
	
	function getKodeThn($thn_ajar){
		$thn_ajar = trim($thn_ajar);
		$thnawal = substr($thn_ajar, 0,4);
		$ganjil_genap = substr($thn_ajar, strpos($thn_ajar, " ") + 1);
		if($ganjil_genap == 'Genap') $smt = '2';
		else $smt = '1';
		return $thnawal.$smt;
	}
	
	function getKodeThnGage($thn_ajar,$gage){
		$thn_ajar = trim($thn_ajar);
		$thnawal = substr($thn_ajar, 0,4);
		if($gage == 'Genap') $smt = '2';
		else $smt = '1';
		return $thnawal.$smt;
	}
	
	function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
	 if ($considerHtml) {
	  // if the plain text is shorter than the maximum length, return the whole text
	  if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
	   return $text;
	  }

	  // splits all html-tags to scanable lines
	  preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);

	  $total_length = strlen($ending);
	  $open_tags = array();
	  $truncate = '';

	  foreach ($lines as $line_matchings) {
	   // if there is any html-tag in this line, handle it and add it (uncounted) to the output
	   if (!empty($line_matchings[1])) {
		// if it’s an “empty element” with or without xhtml-conform closing slash (f.e.)
		if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
		// do nothing
		// if tag is a closing tag (f.e.)
		} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
		 // delete tag from $open_tags list
		 $pos = array_search($tag_matchings[1], $open_tags);
		 if ($pos !== false) {
		  unset($open_tags[$pos]);
		 }
		 // if tag is an opening tag (f.e. )
		} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
		 // add tag to the beginning of $open_tags list
		 array_unshift($open_tags, strtolower($tag_matchings[1]));
		}
		// add html-tag to $truncate’d text
		$truncate .= $line_matchings[1];
	   }

	   // calculate the length of the plain text part of the line; handle entities as one character
	   $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
	   if ($total_length+$content_length > $length) {
		// the number of characters which are left
		$left = $length - $total_length;
		$entities_length = 0;
		// search for html entities
		if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
		 // calculate the real length of all entities in the legal range
		 foreach ($entities[0] as $entity) {
		  if ($entity[1]+1-$entities_length <= $left) {
		   $left--;
		   $entities_length += strlen($entity[0]);
		  } else {
		   // no more characters left
		   break;
		  }
		 }
		}
		$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
		// maximum lenght is reached, so get off the loop
		break;
	   } else {
		$truncate .= $line_matchings[2];
		$total_length += $content_length;
	   }

	   // if the maximum length is reached, get off the loop
	   if($total_length >= $length) {
		break;
	   }
	  }
	 } else {
	  if (strlen($text) <= $length) {
	   return $text;
	  } else {
	   $truncate = substr($text, 0, $length - strlen($ending));
	  }
	 }

	 // if the words shouldn't be cut in the middle...
	 if (!$exact) {
	  // ...search the last occurance of a space...
	  $spacepos = strrpos($truncate, ' ');
	  if (isset($spacepos)) {
	   // ...and cut the text in this position
	   $truncate = substr($truncate, 0, $spacepos);
	  }
	 }

	 // add the defined ending to the text
	 $truncate .= $ending;

	 if($considerHtml) {
	  // close all unclosed html-tags
	  foreach ($open_tags as $tag) {
	   $truncate .= '';
	  }
	 }

	return $truncate;

	}
}