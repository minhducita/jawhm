<?php
	/*
		Author: Lý Phước Nam
		update: 22/02/1016
	*/
	$default_seminar = array(
		"navigation"=>1,
		"month"=>date("m"),
		"year" =>date('Y'),
		"place_name"=>!empty($_GET['p'])?$_GET['p']:"tokyo",
		"checked_countryname"=> ",0",
		"checked_know"=>",0"
	);
	$url_ser = "/seminar/seminar.php?";
	$i=0;
	foreach ($default_seminar as $name=>$value){
		if($i=0)
			$url_ser .= $name."=".$value;
		else
			$url_ser .= "&".$name."=".$value;
	}
	header('Location:'.$url_ser);
?>