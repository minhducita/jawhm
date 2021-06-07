<?php

	$country = $_POST['country'];
	$num  = $_POST['num'];
	$like = array();
	
	$ini = parse_ini_file('../../../../bin/pdo_mail_list.ini', FALSE);
	$tmpdb = new PDO($ini['dsn'], $ini['user'], $ini['password']);
	$tmpdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$tmpdb->query('SET CHARACTER SET utf8');
	
	/*
	$tmpstt = $tmpdb->prepare("SELECT * FROM recommend");
	$tmpstt->execute();
	while($row = $tmpstt->fetch(PDO::FETCH_ASSOC)){
		$like[] = $row;
	}
	*/
	//echo $data;
	$tmpstt = $tmpdb->prepare("UPDATE recommend SET value = ".$num." WHERE name = '".$country."'");
	$tmpstt->execute();
	
?>