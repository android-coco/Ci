<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('excel_download')){
	function excel_download($header,$params,$filename = null){
        $string = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Asia/Shanghai');
		$objPHPExcel = new PHPExcel();
		if (PHP_SAPI == 'cli'){
			die('This example should only be run from a Web Browser');
		}
       
		// 设置文件内容
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
									 ->setLastModifiedBy("Maarten Balliauw")
									 ->setTitle("Office 2007 XLSX Test Document")
									 ->setSubject("Office 2007 XLSX Test Document")
									 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
									 ->setKeywords("office 2007 openxml php")
									 ->setCategory("Test result file");
		// 重定向客户端浏览器(Excel5)
		header('Content-Type: application/vnd.ms-excel');
		if(is_null($filename))
		{
			$filename =  date('Y-m-dhis');
		}
		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0');
		// 如果你的是IE9则需要下面内容
		header('Cache-Control: max-age=1');

		// 如果你的IE版本超过了 SSL, 则需要下面内容
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // 过去时间
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // 缓存格式
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		// 设置文件头
		if(!empty($header)){ 
	        foreach ($header as $key => $value) {
	        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($string[$key].'1', $value);
	        }
		}
        //导出内容
        if(!empty($params)){ 
	        foreach ($params as $key => $value) {
	        	$num = $key + 2;
	        	$i = 0;
	        	if(empty($value)){
	        		continue;
	        	}
	        	foreach($value as $k => $v)
	        	{
	        		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($string[$i].$num, $v);
	        		$i++;
	        	}    	
	        }
		}
		
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
}


if ( ! function_exists('excel_upload')){
	function excel_upload($url){
		error_reporting(E_ALL);
		set_time_limit(0);

		date_default_timezone_set('Asia/Shanghai');
		include './application/libraries/PHPExcel/IOFactory.php';





		$inputFileName = $url;
		//echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


		//echo '<hr />';

		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		return $sheetData;

	}
}


