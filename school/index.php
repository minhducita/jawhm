<?php
$param = explode('/', @$_SERVER['REQUEST_URI']);
/*TT*/
$URIParts = explode('?',$_SERVER['REQUEST_URI']);
$URI = explode('/',$URIParts[0]);
// Shift the array, to move it past the 'root'
@array_shift($URI);
// Now, get rid of any pesky empty end slashes
while (@count($URI) > 0 && !end($URI)) {
	@array_pop($URI);
}
/*TT*/
$preview = false;
$get = '';
if(isset($_GET['preview'])) {
	if (!empty($_GET['preview'])) {
		$preview = $_GET['preview'];
	}
	if ($preview) {
		$get = '?preview=true';
	}
}
$cl = array('aus' => 'オーストラリア','can' => 'カナダ','nz' => 'ニュージーランド','en' => 'イギリス','usa' => 'アメリカ','eu' => 'ヨーロッパ','ww' => 'ワールドワイド',);
// var_dump($param); 3
// var_dump($URI); 1
// var_dump(empty($_GET)); true

if (count($URI) >= 3 || count($param) >= 5) {
	require_once 'school_detail.php';
} elseif (count($param) >= 3 && empty($_GET)) {
	if (preg_match("/\_/",$param[2])){
		require_once 'school_detail.php';
	} elseif (preg_match("/\.html/",$param[2])) {
		$country = substr($param[2],0,-5);
		if (array_key_exists($country, $cl)) {
			$_GET['countries'] = $cl[$country];
			$result = true;
		}
		require_once 'search.php';
	} else {
		if (array_key_exists($param[2], $cl)) {
			$_GET['countries'] = $cl[$param[2]];
			$result = true;
		}
		require_once 'search.php';
	}
} else {
	$result = false;
	require_once 'search.php';
}