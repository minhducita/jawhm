<?php 
session_start();
/* check login and redirect top.php*/
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
define("SERVER_URL",$uri);
$check_url = explode("/",$_SERVER['REQUEST_URI']);
$check_urllogin = explode("/wp-login.php",$_SERVER['REQUEST_URI']);
$check_urljalogin = explode("/jalogin.php",$_SERVER['REQUEST_URI']);
$checkpage = 0;
$_SESSION["url_refrer"] = SERVER_URL.$_SERVER['REQUEST_URI'] ; 
if(in_array("admin",$check_url) or in_array("api",$check_url) or in_array("wp-admin",$check_url) or count($check_urllogin) > 1 or count($check_urljalogin) > 1){
	$checkpage = 1;
}
if(current_user_can('manage_options')){
	$checkpage = 1;
}
if(empty($_SESSION['mem_id']) and $checkpage == 0){
	header('Location: '.$uri.'/member/');
	exit;
}
if($_SERVER['REQUEST_URI'] == '/memberpage/'){
	header('Location: '.$uri.'/member/top.php');
	exit;
}
/* end check login and redirect top.php */