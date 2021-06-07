<?php
ini_set( "display_errors", "On");
function isMobileIP()
{
    require_once 'Net/IPv4.php';// PEAR Net_IPv4
    // 携帯のIP帯域をセット
    $ip_list = array(
    	'115.79.57.237',
    	'115.79.57.237/121',
		'210.153.84.0/24',
		'210.136.161.0/24',
		'210.153.86.0/24',
		'124.146.174.0/24',
		'124.146.175.0/24',
		'202.229.176.0/24',
		'202.229.177.0/24',
		'202.229.178.0/24',
		'202.229.179.0/24',
		'111.89.188.0/24',
		'111.89.189.0/24',
		'111.89.190.0/24',
		'111.89.191.0/24',
		'210.153.87.0/24',
		'210.230.128.224/28',
		'121.111.227.160/27',
		'61.117.1.0/28',
		'219.108.158.0/27',
		'219.125.146.0/28',
		'61.117.2.32/29',
		'61.117.2.40/29',
		'219.108.158.40/29',
		'219.125.148.0/25',
		'222.5.63.0/25',
		'222.5.63.128/25',
		'222.5.62.128/25',
		'59.135.38.128/25',
		'219.108.157.0/25',
		'219.125.145.0/25',
		'121.111.231.0/25',
		'121.111.227.0/25',
		'118.152.214.192/26',
		'118.159.131.0/25',
		'118.159.133.0/25',
		'118.159.132.160/27',
		'111.86.142.0/26',
		'111.86.141.64/26',
		'111.86.141.128/26',
		'111.86.141.192/26',
		'118.159.133.192/26',
		'111.86.143.192/27',
		'111.86.143.224/27',
		'111.86.147.0/27',
		'111.86.142.128/27',
		'111.86.142.160/27',
		'111.86.142.192/27',
		'111.86.142.224/27',
		'111.86.143.0/27',
		'111.86.143.32/27',
		'111.86.147.32/27',
		'111.86.147.64/27',
		'111.86.147.96/27',
		'111.86.147.128/27',
		'111.86.147.160/27',
		'111.86.147.192/27',
		'111.86.147.224/27',
		'123.108.237.0/27',
		'202.253.96.224/27',
		'210.146.7.192/26',
		'123.108.237.224/27',
		'202.253.96.0/27'
    );
    foreach ($ip_list as $ip) {
        if (Net_IPv4::ipInNetwork($_SERVER['REMOTE_ADDR'], $ip)) {
            return true;
        }
    }
    return false;
}
list(,$yoyakuno, $email) = explode('/', $_SERVER['PATH_INFO']);
$url = '?n='.$yoyakuno.'&e='.$email;
$agent = $_SERVER['HTTP_USER_AGENT'];
if(preg_match("/^DoCoMo/i", $agent)){
   header("Location: http://jawhm.bluecloud.tokyo/yoyaku/mob.php".$url);
   exit;
}else if(preg_match("/^(J¥-PHONE|Vodafone|MOT¥-[CV]|SoftBank)/i", $agent)){
   header("Location: http://jawhm.bluecloud.tokyo/yoyaku/mob.php".$url);
   exit;
}else if(preg_match("/^KDDI¥-/i", $agent) || preg_match("/UP¥.Browser/i", $agent)){
   header("Location: http://jawhm.bluecloud.tokyo/yoyaku/mob.php".$url);
   exit;
}else{
	if (isMobileIP())	{
		header("Location: http://jawhm.bluecloud.tokyo/yoyaku/mob.php".$url);
	}else{
		//header("Location: http://jawhm.bluecloud.tokyo/yoyaku/pc.php".$url);
		$_GET['n'] = $yoyakuno;
		$_GET['e'] = $email;
		include_once('pc.php');
	}
   exit;
}
?>