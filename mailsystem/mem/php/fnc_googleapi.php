<?php  
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_AuthSub');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_HttpClient');
Zend_Loader::loadClass('Zend_Gdata_Calendar');
require_once $_SERVER['DOCUMENT_ROOT'].'/yoyaku/gdata/src/Google_Client.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/yoyaku/gdata/src/contrib/Google_CalendarService.php';

class Google_Calendar_Data{
	protected	$config = array(
			'keisai' => array(
				'CLIENT_ID' => '1076014466835-92tsbc0e3fsrl4c8huu87a1kmm7bq6pe.apps.googleusercontent.com',
				'SERVICE_ACCOUNT_NAME' => '1076014466835-92tsbc0e3fsrl4c8huu87a1kmm7bq6pe@developer.gserviceaccount.com',
				'KEY_FILE' => '/var/www/html/yoyaku/gdata/Project-9cb05754fee7.p12',
				'CAL_ID' => 'toiawase@jawhm.or.jp',
				),
			'karikeisai' => array(
				'CLIENT_ID' => '72598751890-quep8ogshfgd7h52puf6r7k7bud5dl43.apps.googleusercontent.com',
				'SERVICE_ACCOUNT_NAME' => 'service-account@karikeisaiseminar-20190306.iam.gserviceaccount.com',
				'KEY_FILE' => '/var/www/html/yoyaku/gdata/KarikeisaiSeminar-68f8f244f71e.p12',
				'CAL_ID' => 'at7al2nuk7c6c0dp4plbperpvo@group.calendar.google.com',
				),
		);
	/*
	*@param string $calender
	* default is toiawase@jawhm.or.jp
	*/
	public function get_config($calender = 'keisai'){
		return $this->config[$calender];
	}
}
?>