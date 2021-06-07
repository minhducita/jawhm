<?php

session_cache_limiter('private');
session_start();

// ******************************************************************************************************************
// *
// *  Google カレンダー登録	【 東京 】
// *
// *  カウンセリング予約枠自動生成
// *  
// *  (create: 2015-03-09)
// *
// ******************************************************************************************************************

	ini_set( "display_errors", "On");

//	require_once 'Zend/Loader.php';
//	Zend_Loader::loadClass('Zend_Gdata');
//	Zend_Loader::loadClass('Zend_Gdata_AuthSub');
//	Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
//	Zend_Loader::loadClass('Zend_Gdata_HttpClient');
//	Zend_Loader::loadClass('Zend_Gdata_Calendar');

	require_once './gdata/src/Google_Client.php';
	require_once './gdata/src/contrib/Google_CalendarService.php';

	const CLIENT_ID = '620516370225-h8qsvmbplkvv8hc053e7clb8i91k60oa.apps.googleusercontent.com';
	const SERVICE_ACCOUNT_NAME = '620516370225-h8qsvmbplkvv8hc053e7clb8i91k60oa@developer.gserviceaccount.com';
	const KEY_FILE = '/var/www/html/mailsystem/yoyakuwaku/gdata/Project-f4d123953604-tokyotoratora.p12';
	const CAL_ID = 'tokyo@tora-tora.net';


function fnc_getpost($param)	{
	$getdata = @$_GET[$param];
	$postdata = @$_POST[$param];
	if ($getdata <> '')	{
		return $getdata;
	}else{
		return $postdata;
	}
}


function GC_Init()	{
    $client = new Google_Client();
    $client->setApplicationName("Google Prediction Sample");
    $client->setAssertionCredentials(new Google_AssertionCredentials(
    		SERVICE_ACCOUNT_NAME,
    		array('https://www.googleapis.com/auth/calendar'),
    		file_get_contents(KEY_FILE)
    ));
    $client->setClientId(CLIENT_ID);

    return $client;
}

function GC_createEvent ($client,
    $title = 'title',
    $desc='body',
    $startDate = '2008-01-20T09:00:00',
    $endDate = '2008-01-20T09:00:00',
    $colorCD = '0',
    $tzOffset = '+09')	{

  $service = new Google_CalendarService($client);
  $event = new Google_Event();
  $start_time = new Google_EventDateTime();
  $start_time->setDateTime("{$startDate}:00.000{$tzOffset}:00");
  $event->setStart($start_time);
  $end_time = new Google_EventDateTime();
  $end_time->setDateTime("{$endDate}:00.000{$tzOffset}:00");
  $event->setEnd($end_time);
  $event->setSummary(trim($title));
  $event->setDescription($desc);
  $event->setColorId($colorCD);


  $createdEntry = $service->events->insert(CAL_ID, $event);

  return ($createdEntry['id']);
}

function GC_getEvent($client, $url)
{
	$service = new Google_CalendarService($client);
	$event = $service->events->get(CAL_ID, $url);
	return $event;
}

function GC_deleteEvent($client, $url)
{
	$service = new Google_CalendarService($client);
	$service->events->delete(CAL_ID, $url);
}

$act = @$_POST['act'];
header('Content-Type:text/html;charset=UTF-8');

?>
<html>
<script type="text/javascript" src="./jquery.js"></script>
<title>Yoyakuwaku for Google caldnder</title>

<script>

var cdown = 0;
var tm = '';
var abort = 0;
var allidx = 0;
var allsel = '';
var runidx = 0;

function dd_change($obj)	{
	if (jQuery.isNumeric(jQuery($obj).val()))	{
		jQuery("#sel_"+jQuery($obj).attr("idx")).attr("checked",true);
	}else{
		jQuery($obj).val("");
		jQuery("#sel_"+jQuery($obj).attr("idx")).attr("checked",false);
	}
}
function sel_change($obj)	{

}
function fncabort()	{
	abort = 1;
//	clearInterval(tm);
	jQuery("#abort").html("この処理完了後に中断します");
}
function go_reg($obj)	{

	var ym = jQuery("#ym").val();
	var dd = jQuery($obj).attr("idx");
	var staff = jQuery("#dd_"+jQuery($obj).attr("idx")).val();
	var chk = String("00"+dd);

	if (staff=="")	{
		alert("人数を入力してください");
		jQuery("#dd_"+jQuery($obj).attr("idx")).focus();
		return false;
	}
	if (confirm(ym+"-"+chk.slice(-2)+"、"+staff+"名体制、登録しますか？"))	{
		cdown = (staff*13+4);
		var msg = "<center>";
		msg += "&nbsp;<br/>";
		msg += "&nbsp;<br/>";
		msg += "<img src='./wait.gif'>&nbsp;<br/>&nbsp;<br/>";
		msg += ym+"-"+chk.slice(-2)+"　のカレンダーに<br/>";
		msg += staff+"名体制で登録しています<br/>";
		msg += "&nbsp;<br/>";
		msg += "&nbsp;<br/>";
		msg += "&nbsp;<br/>";
		msg += "約<span id=\"cdown\">"+cdown+"</span>秒で完了します";
		msg += "</center>";

		jQuery("#msg").html(msg);
		tm = setInterval("fnccdown()",1000);

		jQuery.ajax({
			type: "GET",
			url: "./regist.php",
			data: "act=go&ym="+ym+"&dd="+dd+"&staff="+staff,
			success: function(msg){
				clearInterval(tm);
				jQuery("#msg").html(msg);
		}
		});
	}
}
function fnccdown()	{
	cdown = cdown - 1;
	jQuery("#cdown").html(cdown);
	if (cdown <= 0)	{
		clearInterval(tm);
	}
}
function runall()	{
	if (confirm("チェックされた日付を登録します。よろしいですか？"))	{
		allsel = new Array();
		allidx = 0;
		abort = 0;
		jQuery('[name="sel"]:checked').each(function(){
			allidx++;
			allsel[allidx] = jQuery(this).attr("idx");
		});
		var msg = "<center>";
		msg += "&nbsp;<br/>";
		msg += "<span id=\"wait\"><img src='./wait.gif'></span>&nbsp;<br/>";
		msg += allidx+"日分の登録を順番に実行しています<br/>";
		msg += "&nbsp;<br/>";
		msg += "<div id=\"submsg\" style=\"\"></div>";
		msg += "<div id=\"abort\" style=\"\"><input type=button onclick=\"fncabort();\" value=\"　　中断　　\"></div>";
		msg += "</center>";
		jQuery("#msg").html(msg);
		runidx = 0;
		autorun();
	}
}

function autorun()	{
	runidx++;
	var ym = jQuery("#ym").val();
	var dd = allsel[runidx];
	var staff = jQuery("#dd_"+dd).val();
	var chk = String("00"+dd);

	if (staff=="")	{
		setTimeout("runnext()",500);
	}else{
		cdown = (staff*13+4);
		var msg = "<center>";
		msg += "&nbsp;<br/>";
		msg += ym+"-"+chk.slice(-2)+"　のカレンダーに<br/>";
		msg += staff+"名体制で登録しています<br/>";
		msg += "&nbsp;<br/>";
		msg += "約<span id=\"cdown\">"+cdown+"</span>秒で完了します";
		msg += "</center>";

		jQuery("#submsg").html(msg);
		tm = setInterval("fnccdown()",1000);

		jQuery.ajax({
			type: "GET",
			url: "./regist.php",
			data: "act=go&ym="+ym+"&dd="+dd+"&staff="+staff,
			success: function(msg){
				clearInterval(tm);
				setTimeout("runnext()",500);
		}
		});
	}
}
function runnext()	{
	if (abort == 1)	{
		jQuery("#abort").html("<span style=\"color:red; text-weight:bold;\">処理を中断しました</span>");
		jQuery("#wait").html("");
		jQuery("#cdown").html("");
	}else{
		if (runidx >= allidx)	{
			jQuery("#msg").html("一括実行が完了しました");
		}else{
			autorun();
		}
	}
}


</script>
<body>


<?php
	if ($act == '')	{
		// 年月選択 ------------------------------------------------------
?>

<form action="./tokyo.php" method="POST">
<input type="hidden" name="act" value="ym">
対象年月：<select name="ym">
<?php
	$ym = date('Y-m', strtotime('-1 month'));
	echo '<option value="'.$ym.'">'.$ym.'</option>';
	for ($idx=0; $idx<=12; $idx++)	{
		$ym = date('Y-m', strtotime($idx.' month'));
		echo '<option value="'.$ym.'">'.$ym.'</option>';
	}
?>
</select>
<input type="submit" value="表示">
</form>

<?php
	}else{
?>
		<form action="./tokyo.php" method="POST" style="display:inline;">
		<input type="hidden" name="act" value="">
		<input type="submit" value="最初に戻る">
		</form>
<?php
		$ym = @$_POST['ym'];
		echo '　　対象年月 ： <span style="font-size:14pt; font-weight:bold;">'.$ym.'</span>';

		echo '　　　<input type="button" value="一括実行" onclick="runall();">';

		echo '<hr/>';

	}

	if ($act == 'ym')	{
		// 日付表示 ------------------------------------------------------
		$lastDate = date('d', strtotime('last day of ' . $ym));
		$week = array("日", "月", "火", "水", "木", "金", "土");

?>
		<div style="float:left;">
		<form action="./tokyo.php" method="POST" style="display:inline;">
		<input type="hidden" name="act" value="go">
		<input type="hidden" name="ym" id="ym" value="<?php echo $ym; ?>">
		<table>
		<tr style="background-color:#191970; color:white;"><th>日</th><th>曜日</th><th>人数</th><th>一括</th><th>個別実行</th></tr>
<?php

		for ($idx=1; $idx<=$lastDate; $idx++)	{

			$datetime = new DateTime($ym."-".$idx);
			$w = (int)$datetime->format('w');

			if ($w == 0)	{
				echo '<tr style="background-color:#ff7f50">';
			}elseif ($w == 6)	{
				echo '<tr style="background-color:#00bfff">';
			}else{
				echo '<tr style="background-color:#faf0e6">';
			}
			echo '<td style="text-align:center;width:60px;">'.$idx.'</td>';
			echo '<td style="text-align:center;width:60px;">'.$week[$w].'</td>';
			echo '<td style="text-align:center;width:80px;"><input name="dd" type="text" size=3 style="text-align:right;" onchange="dd_change(this);" value="" id="dd_'.$idx.'" idx="'.$idx.'"></td>';
			echo '<td style="text-align:center;width:60px;"><input name="sel" type="checkbox" onchange="sel_change(this);" value="" id="sel_'.$idx.'" idx="'.$idx.'"></td>';
			echo '<td style="text-align:center;width:100px;"><input value="実行" type=button onclick="go_reg(this);" id="btn_'.$idx.'" idx="'.$idx.'"></td>';
			echo '</tr>';

		}
?>
		</table>
		</form></div>

		<div style="margin-left:50px; padding:10px 10px 10px 10px; width:550px;height:800px; border:1px solid navy;float:left;" id="msg">
			実行結果はここに表示されます
		</div>

<?php
	}
?>

</body>
</html>