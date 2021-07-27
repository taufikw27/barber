<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf {


	function __construct()

	{

		$CI = & get_instance();

		log_message('Debug', 'mPDF class is loaded.');

	}


	function load($param=NULL)

	{
		$ds = DIRECTORY_SEPARATOR;
		include_once APPPATH.'third_party'.$ds.'mpdf'.$ds.'mpdf.php';


		if ($param == NULL)

		{

			$param = '"A4","","",10,10,10,10,6,3';

		}


		return new mPDF($param);

	}

}
