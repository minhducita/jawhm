<?php

	require_once '../include/header.php';

	/*if (isset($_POST['pc'])) {
		 $_SESSION['pc'] = $_POST['pc'];
	}*/


	$header_obj = new Header();

	if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') {
		include('m-index.php') ;
	} else {
		include('index.html');
	}

?>