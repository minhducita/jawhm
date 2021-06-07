<?php
//CONSTANTS

define("ROOT_URL","http://www.jawhm.or.jp");
define("APACHE_LOG_PATH", "/home/plate/apachelog/access_log");

//PATH
define("ROOT", "/var/www/html");
define("SYSTEM_ROOT_PATH", "/blogranking");

//DB NAME
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWD', '');


//DB TABLE NAME
define('DB_TABLE_BLOG', 'm_blog');
define('DB_TABLE_STAFF', 'm_staff');
define('DB_TABLE_CATEGORY', 'm_category');
define('DB_TABLE_RANKING', 't_ranking');
define('DB_TABLE_RESETPASSWORD', 't_resetpassword');

//DB COLUMN NAME
//BLOG
define('DB_COLUMN_BLOG_ID', 'blog_id');
define('DB_COLUMN_BLOG_MAILADDRESS', 'mailaddress');
define('DB_COLUMN_BLOG_PASSWORD', 'password');
define('DB_COLUMN_BLOG_TITLE', 'title');
define('DB_COLUMN_BLOG_URL', 'url');
define('DB_COLUMN_BLOG_PROFILE_MESSAGE', 'message');
define('DB_COLUMN_BLOG_PROFILE_HANDLE', 'profile_handle');
define('DB_COLUMN_BLOG_PROFILE_GENDER', 'profile_gender');
define('DB_COLUMN_BLOG_PROFILE_GENDER_FLAG', 'profile_gender_flag');
define('DB_COLUMN_BLOG_PROFILE_BIRTHDAY', 'profile_birthday');
define('DB_COLUMN_BLOG_PROFILE_BIRTHDAY_FLAG', 'profile_birthday_flag');
define('DB_COLUMN_BLOG_PROFILE_PICTURE', 'profile_picture');
define('DB_COLUMN_BLOG_PROFILE_RSS', 'rss');
define('DB_COLUMN_BLOG_STATUS', 'status');
define('DB_COLUMN_BLOG_CATEGORY', 'category_id');
define('DB_COLUMN_BLOG_IN_DATETIME', 'in_datetime'); //TODO UNKNOWN PURPOSE
define('DB_COLUMN_BLOG_OK_DATETIME', 'ok_datetime');
define('DB_COLUMN_BLOG_NG_DATETIME', 'ng_datetime');
define('DB_COLUMN_BLOG_REVIEW_DATETIME', 'review_datetime');
define('DB_COLUMN_BLOG_INSERT_DATETIME', 'insert_datetime');
define('DB_COLUMN_BLOG_UPDATE_DATETIME', 'update_datetime');
define('DB_COLUMN_BLOG_DELETE_FLAG', 'delete_flag');
define('DB_COLUMN_BLOG_QUIT_FLAG', 'quit_flag');
//CATEGORY
define('DB_COLUMN_CATEGORY_ID', 'category_id');
define('DB_COLUMN_CATEGORY_NAME', 'name');
define('DB_COLUMN_CATEGORY_BANNER_URL', 'banner_url');
define('DB_COLUMN_CATEGORY_OUT_URL', 'out_url');
define('DB_COLUMN_CATEGORY_SORT_ORDER', 'sort_order');
define('DB_COLUMN_CATEGORY_INSERT_DATETIME', 'insert_datetime');
define('DB_COLUMN_CATEGORY_UPDATE_DATETIME', 'update_datetime');
define('DB_COLUMN_CATEGORY_DELETE_FLAG', 'delete_flag');
//STAFF
define('DB_COLUMN_STAFF_ID', 'staff_id');
define('DB_COLUMN_STAFF_NAME', 'name');
define('DB_COLUMN_STAFF_PASSWORD', 'password');
define('DB_COLUMN_STAFF_INSERT_DATETIME', 'insert_datetime');
define('DB_COLUMN_STAFF_UPDATE_DATETIME', 'update_datetime');
define('DB_COLUMN_STAFF_DELETE_FLAG', 'delete_flag');
//RANKING
define('DB_COLUMN_RANKING_ID', 'ranking_id');
define('DB_COLUMN_RANKING_BLOG_ID', 'blog_id');
define('DB_COLUMN_RANKING_CATEGORY_ID', 'category_id');
define('DB_COLUMN_RANKING_SUM_IN', 'sum_in');
define('DB_COLUMN_RANKING_SUM_OUT', 'sum_out');
define('DB_COLUMN_RANKING_IN_PREFIX', 'in');
define('DB_COLUMN_RANKING_OUT_PREFIX', 'out');
define('DB_COLUMN_RANKING_INSERT_DATETIME', 'insert_datetime');
define('DB_COLUMN_RANKING_UPDATE_DATETIME', 'update_datetime');
define('DB_COLUMN_RANKING_DELETE_FLAG', 'delete_flag');
//RESETPASSWORD
define('DB_COLUMN_RESETPASSWORD_KEY', 'key');
define('DB_COLUMN_RESETPASSWORD_MAILADDRESS', 'mailaddress');
define('DB_COLUMN_RESETPASSWORD_CREATE_DATE', 'create_date');


//TABLE ID PREFIX
define('ID_PREFIX_BLOG', 'BL');
define('ID_PREFIX_STAFF', 'ST');
define('ID_PREFIX_CATEGORY', 'CA');
define('ID_PREFIX_RANKING', 'RA');

//BLOG STATUS
define('BLOG_STATUS_IN', 1);
define('BLOG_STATUS_FIRST_REVIEW', 2);
define('BLOG_STATUS_OK', 3);
define('BLOG_STATUS_NG', 4);
define('BLOG_STATUS_RE_REVIEW', 5);

//OTHERS
define('DATE_MAX',300012312359);
define('RANKING_NEWEST_SUFFIX', '01');
define('RANKING_SUM_SPAN', 7);
define('RANKING_OLDEST', 30);

//IMG DIR
define("PROF_TEMP_IMG_DIR", ROOT."/assets/img/uploaded/t_prof/");
define("PROF_IMG_DIR", ROOT."/assets/img/uploaded/prof/");
define("CATEGORY_BANNER_IMG_DIR", ROOT."/assets/img/uploaded/banner/");


//MAIL
define("MAIL_HOST","ssl://smtp.gmail.com");
define("MAIL_PORT",465);
define("MAIL_USERNAME","jawhm2013@gmail.com");
define("MAIL_PASSWORD","2013Jawhm");
define("MAIL_TIMEOUT",5);

define("MAIL_BCC","meminfo@jawhm.or.jp");
define("MAIL_REGISTER_THANKYOU_FROM","toiawase@jawhm.or.jp");
define("MAIL_REGISTER_THANKYOU_FROM_NAME","日本ワーキングホリデー協会");

define("MAIL_REGISTER_JOURNAL_FROM","registerjournalfrom@plate.co.jp");
define("MAIL_REGISTER_JOURNAL_FROM_NAME","ブログランキングシステム");
define("MAIL_REGISTER_JOURNAL_TO","info@jawhm.or.jp");
define("MAIL_REGISTER_JOURNAL_TO2","toiawase@jawhm.or.jp");

define("MAIL_MANAGE_OK_FROM","toiawase@jawhm.or.jp");
define("MAIL_MANAGE_OK_FROM_NAME","日本ワーキングホリデー協会");

define("MAIL_BATCH_FIRSTIN_FROM","batchfirstin@plate.co.jp");
define("MAIL_BATCH_FIRSTIN_FROM_NAME","ブログランキングシステム");
define("MAIL_BATCH_FIRSTIN_TO","info@jawhm.or.jp");
define("MAIL_BATCH_FIRSTIN_TO2","toiawase@jawhm.or.jp");

define("MILA_RESETPASSWORD_FROM", "toiawase@jawhm.or.jp");
define("MILA_RESETPASSWORD_FROM_NAME", "日本ワーキングホリデー協会");

// validation
define("ERROR_REGISTER_EMAIL","既に登録済みのメールアドレスです。");
define("ERROR_REGISTER_URL","既に登録済みのブログURLです。");
define("ERROR_EDIT_PROFILE","プロフィール画像は縦横200px、1MB以内のJPEG画像を使用してください");


function _getStdUrl($url) {

	if($url[strlen($url)-1] == '/') {
		return $url;
	}

	$pos = strrpos($url,'/');
	if(in_array(substr($url,0,$pos+1),array('http://','https://'))) {
		// top domain
		return $url . "/";
	}

	$fileOrDir = substr($url,$pos+1);

	if(strpos($fileOrDir,'.') === false) {
		// dir
		return $url.'/';

	} else {
		// file
		return substr($url,0,$pos+1);
	}
}