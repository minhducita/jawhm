<?php
/**
 * User: nguyentuananh2985@gmail.com
 * Date: 3/22/2017
 * Time: 2:16 PM
 */

try {
//    $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_tenki.ini', FALSE);
//    $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
    $user = "biuser";
    $pass = "S8tsfVt8eCDDqvR8HRLV";
    $db = new PDO('mysql:host=bi.cekhenpprsiu.us-west-2.rds.amazonaws.com;dbname=biuser', $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $db->query('SET CHARACTER SET utf8');
    $db->exec('set names utf8');
	/*
	$sql = "SELECT * FROM 気象情報 WHERE 1 = 1";
	foreach ($db->query($sql) as $row) {
        $rs[] = $row;
    }
	print_r($rs);
	exit;
	*/
} catch (PDOException $e) {
    die($e->getMessage());
}