<?php
session_start();

error_reporting(E_ALL & ~E_NOTICE);
    
include 'seminar_module_api.php';

$tmp_config = array();

if ($_SESSION['seminar_config2']) {
	$tmp_config = unserialize(gzuncompress(base64_decode($_SESSION['seminar_config2'])));
} elseif (isset($_COOKIE['seminar_config2'])) {
	$tmp_config = unserialize(gzuncompress(base64_decode($_COOKIE['seminar_config2'])));
} elseif ($_SESSION['seminar_config']) {
	$tmp_config = unserialize(base64_decode($_SESSION['seminar_config']));
} elseif (isset($_COOKIE['seminar_config'])) {
	$tmp_config = unserialize(base64_decode($_COOKIE['seminar_config']));
}
$config = array();
$config = $tmp_config;
$config['keyword_event_list'] = "初心者";
$config['active_event_list_init'] = 1;
$sm = new SeminarModule($config);
echo $sm->get_event_list_show();
