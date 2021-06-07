<?php
	//declare our assets 
	$subject = stripcslashes($_POST['subject']);
	$contactMessage =  "";

$contactMessage .= chr(10);
foreach($_POST as $post_name => $post_value){
	$contactMessage .= chr(10);
	$contactMessage .= $post_name." : ".$post_value;
}

$contactMessage .= chr(10);
$contactMessage .= chr(10);
$contactMessage .= chr(10);
$contactMessage .= '------------------------------';
$contactMessage .= chr(10);
foreach($_SERVER as $post_name => $post_value){
	$contactMessage .= chr(10);
	$contactMessage .= $post_name." : ".$post_value;
}

		//send the email 
		mail('toiawase@jawhm.or.jp', $subject, $contactMessage);
		echo('success'); //return success callback
?>