<?php
session_start();

error_reporting(E_ALL & ~E_NOTICE);
$placename = $_GET['place_name'];
if(!empty($placename) && $placename == 'tokyo'){
	include '../seminar_module/seminar_api/seminar_module_api.php';
}
else
	include '../seminar_module/seminar_module.php';

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
$tmp_config['/seminar/seminar.php']['calendar']['know_list'][] = array(
			'id' => 's01',
            'name' => '初心者向けセミナー',
            'word2' => Array('初心者'),
			'active' => 'on',
			'word1' => Array(),
            'default' => 'off',
			'option' => 'multiple',
		);
		$tmp_config['/seminar/search_api.php']['calendar']['know_list'][] = array(
			'id' => 's01',
            'name' => '初心者向けセミナー',
            'word2' => Array('初心者'),
			'active' => 'on',
			'word1' => Array(),
            'default' => 'off',
			'option' => 'multiple',
		);
		$tmp_config['/seminar/search.php']['calendar']['know_list'][] = array(
			'id' => 's01',
            'name' => '初心者向けセミナー',
            'word2' => Array('初心者'),
			'active' => 'on',
			'word1' => Array(),
            'default' => 'off',
			'option' => 'multiple',
		);
$config = array();
if (empty($tmp_config[$_POST['script_name']])) {
	$config = $tmp_config;
} else {
	$config = $tmp_config[$_POST['script_name']];
}
$sm = new SeminarModule($config);

echo $sm->get_seminar_show();
