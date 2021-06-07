<?php
require_once 'Mail/Queue.php';

$dbo = array(
	'type' => 'mdb2',
	'dsn' => '',
	'mail_table' => 'mail_queue'
);
$mo = array(
	'driver' => 'smtp',
	'host' => 'localhost',
	'port' => 25,
	'auth' => FALSE
);
