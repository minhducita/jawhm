#!/usr/bin/php -q
<?php

function getRandomString($nLengthRequired = 8){
    $sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
    mt_srand();
    $sRes = "";
    for($i = 0; $i < $nLengthRequired; $i++)
        $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
    return $sRes;
}

function wbsRequest($url, $params)
{
	$data = http_build_query($params);
	$content = file_get_contents($url.'?'.$data);
	return $content;
}

	mb_language("Ja");
	mb_internal_encoding("utf8");

	//PEARのライブラリ読み込み
	require_once('Mail/mimeDecode.php');
	//メールソースを標準入力から読み込み
	$source = file_get_contents("php://stdin");
	if(!$source)
	{
	  echo "fail!\n";
	  exit();
	}
	//メール解析
	$params['include_bodies'] = true;
	$params['decode_bodies']  = true;
	$params['decode_headers'] = true;
	$decoder = new Mail_mimeDecode($source);
	$structure = $decoder->decode($params);
	$from = mb_convert_encoding(mb_decode_mimeheader($structure->headers['from']), mb_internal_encoding(), "auto");
	if( preg_match( '/<([^>]+)>$/', $from, $regs )){ $from=$regs[1]; }
	$sender = strtolower($from);

	$vmail = $sender;
	$vcheck = getRandomString(14);

	// メール送信を呼び出し
	$data = array(
		 'act' => 'QnPVjBMGvDb8'
		,'vmail' => $vmail
	);

	$url = 'http://www.jawhm.or.jp/mail/reg_websv.php';
	$val = wbsRequest($url, $data);
//	$ret = json_decode($val, true);

?>
