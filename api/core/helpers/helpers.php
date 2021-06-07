<?php
/**
 * Auth: SINHNGUYEN
 * Email: sinhnguyen193@gmail.com
 */

function connectDb($dbKey)
{
    $configDb = require($_SERVER['DOCUMENT_ROOT'].'/api/config/db.php');
    if (isset($configDb[$dbKey])) {
        try {
            $ini = parse_ini_file($configDb[$dbKey], FALSE);
            $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            $db->query('SET CHARACTER SET utf8');
            return $db;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } else {
        throw new Exception("Can not connect db of dbKey: {$dbKey}");
    }
}

function respone($data, $statusCode = 200, $statusText = null, $format = 'json')
{
    $api = new Api();
    $api->sendResponse($data, $statusCode, $statusText, $format);
}

function get($url, $params = array())
{
    $curl = curl_init();
    $username = 'phuong';
    $password = '!A@phuong!123';
    $header = array(
        'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
        'Authorization: Basic '.base64_encode("$username:$password"),
    );
    $userAgent = 'Jawhm tokyo office';
    curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl,CURLOPT_USERAGENT,$userAgent);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_URL, $url . (strpos($url, '?') === false ? '?' : '') . http_build_query($params));
    $data = curl_exec($curl);
    if (curl_error($curl)) {
        die(curl_error($curl));
    }
    curl_close($curl);
    return $data;
}