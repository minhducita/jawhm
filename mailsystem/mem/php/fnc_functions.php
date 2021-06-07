<?php

// require_once 'Zend/Loader.php';
// Zend_Loader::loadClass('Zend_Gdata');
// Zend_Loader::loadClass('Zend_Gdata_AuthSub');
// Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
// Zend_Loader::loadClass('Zend_Gdata_HttpClient');
// Zend_Loader::loadClass('Zend_Gdata_Calendar');
// require_once $_SERVER['DOCUMENT_ROOT'].'/yoyaku/gdata/src/Google_Client.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/yoyaku/gdata/src/contrib/Google_CalendarService.php';

// const CLIENT_ID = '1076014466835-92tsbc0e3fsrl4c8huu87a1kmm7bq6pe.apps.googleusercontent.com';
// const SERVICE_ACCOUNT_NAME = '1076014466835-92tsbc0e3fsrl4c8huu87a1kmm7bq6pe@developer.gserviceaccount.com';
// const KEY_FILE = '/var/www/html/yoyaku/gdata/Project-9cb05754fee7.p12';
// const CAL_ID = 'toiawase@jawhm.or.jp';

require_once 'fnc_googleapi.php';



function fnc_getpost($param) {
    $getdata = @$_GET[$param];
    $postdata = @$_POST[$param];
    if ($getdata <> '') {
        return $getdata;
    } else {
        return $postdata;
    }
}

function fnc_state($code) {
    switch ($code) {
        case "0":
            return '×仮登録';
            break;
        case "1":
            return '×メアド承認';
            break;
        case "5":
            return '○通常';
            break;
        case "9":
            return '×期限切れ';
            break;
    }
}

function getRandomString($nLengthRequired = 8) {
    $sCharList = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
    mt_srand();
    $sRes = "";
    for ($i = 0; $i < $nLengthRequired; $i++)
        $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
    return $sRes;
}

function GC_Init($calendar = "keisai") {
// Google アカウントの情報を指定します
//    $email = 'jawhm@plate.co.jp'; /* Khang comment */
//    $passwd = 'jawhmJawhm'; /* Khang comment */
    //$client = Zend_Gdata_ClientLogin::getHttpClient($email, $passwd, 'cl');
    $GCD = new Google_Calendar_Data();
    $cal_config = $GCD->get_config($calendar);

    unset($GCD);

    $client = new Google_Client();
    $client->setApplicationName("Google Prediction Sample");
    $client->setAssertionCredentials(new Google_AssertionCredentials(
    		$cal_config["SERVICE_ACCOUNT_NAME"],
    		array('https://www.googleapis.com/auth/calendar'),
    		file_get_contents($cal_config["KEY_FILE"])
    ));
    $client->setClientId($cal_config["CLIENT_ID"]);
    return $client;
}

function GC_createEvent($client, $title = 'Tennis with Beth', $desc = 'Meet for a quick lesson', $where = '', $startDate = '2008-01-20', $startTime = '10:00', $endDate = '2008-01-20', $endTime = '11:00', $tzOffset = '+09', $calendar = "keisai") {
    /*
    $gc = new Zend_Gdata_Calendar($client);
    $newEntry = $gc->newEventEntry();
    $newEntry->title = $gc->newTitle(trim($title));
    $newEntry->where = array($gc->newWhere($where));
    $newEntry->content = $gc->newContent($desc);
    $newEntry->content->type = 'text';
    $when = $gc->newWhen();
    $when->startTime = "{$startDate}T{$startTime}:00.000{$tzOffset}:00";
    $when->endTime = "{$endDate}T{$endTime}:00.000{$tzOffset}:00";
    $newEntry->when = array($when);
    $createdEntry = $gc->insertEvent($newEntry);
    return $createdEntry->id->text;
    */
    $GCD = new Google_Calendar_Data();
    $cal_config = $GCD->get_config($calendar);
    unset($GCD);

    $service = new Google_CalendarService($client);
  	$event = new Google_Event();
  	$start_time = new Google_EventDateTime();
  	$start_time->setDateTime("{$startDate}T{$startTime}:00.000{$tzOffset}:00");
  	$event->setStart($start_time);
  	$end_time = new Google_EventDateTime();
  	$end_time->setDateTime("{$endDate}T{$endTime}:00.000{$tzOffset}:00");
  	$event->setEnd($end_time);
  	$event->setSummary(trim($title));
  	$event->setDescription($desc);
  	$createdEntry = $service->events->insert($cal_config["CAL_ID"], $event);

  	return ($createdEntry['id']);
}

function GC_getEvent($client, $url , $calendar = "keisai") {
	/*
    $gdataCal = new Zend_Gdata_Calendar($client);
    $eventEntry = $gdataCal->getCalendarEventEntry($url);
    return $eventEntry;
    */

    $GCD = new Google_Calendar_Data();
    $cal_config = $GCD->get_config($calendar);
unset($GCD);

	$service = new Google_CalendarService($client);
	$event = $service->events->get($cal_config["CAL_ID"], $url);

	return $event;
}

/**
*
* @param class Google_Cleint $client 
* @param string $url {google_event_id}
* @param string $calendar choose a calendar from Google_Calendar_Data
**/
function GC_deleteEvent($client, $url, $calendar = "keisai")
{
//	$evt = GC_getEvent($client, $url);
//	$evt->delete();

    $GCD = new Google_Calendar_Data();
    $cal_config = $GCD->get_config($calendar);
    unset($GCD);

	$service = new Google_CalendarService($client);
	$service->events->delete($cal_config["CAL_ID"], $url);
}

function GC_Edit($event_id , $calendar = "keisai") {

    $msgconst = '***---------- ここから下は変更禁止！！ ----------***';
    $msgconst = '+----- Do not edit below this line. ------+';

    try {
        $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_mail_list.ini', FALSE);
        $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->query('SET CHARACTER SET utf8');
        $stt = $db->prepare('SELECT id, hiduke, date_format(hiduke, \'%Y%m%d\') as ymd, year(hiduke) as y, month(hiduke) as m, day(hiduke) as d, date_format(starttime,\'%H:%i\') as sttime, date_format(endtime,\'%H:%i\') as edtime, place, k_use, k_title1, k_title2, k_desc1, k_desc2, k_stat, free, type, pax, booking, waitting, new, gcode, crmid FROM event_list WHERE id = "' . $event_id . '"');
        $stt->execute();
        $idx = 0;
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            $idx++;
            $cur_id = $row['id'];
            $cur_hiduke = $row['hiduke'];
            $cur_ymd = $row['ymd'];
            $cur_year = $row['y'];
            $cur_month = $row['m'];
            $cur_day = $row['d'];
            $cur_sttime = $row['sttime'];
            $cur_edtime = $row['edtime'];
            $cur_place = $row['place'];
            $cur_use = $row['k_use'];
            $cur_stat = $row['k_stat'];
            $cur_title1 = $row['k_title1'];
            $cur_title2 = $row['k_title2'];
            $cur_desc1 = $row['k_desc1'];
            $cur_desc2 = $row['k_desc2'];
            $cur_free = $row['free'];
            $cur_type = $row['type'];
            $cur_pax = $row['pax'];
            $cur_booking = $row['booking'];
            $cur_waitting = $row['waitting'];
            $cur_new = $row['new'];
            $cur_gcode = $row['gcode'];
            $cur_crmid = $row['crmid'];
        }
        $db = NULL;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    // カレンダー書き込み
    $cont = '';
    $client = GC_Init($calendar);
    if ($cur_gcode <> '') {
        try {
            $evt = GC_getEvent($client, $cur_gcode, $calendar);
			$cont = "  ".$evt['description'];
            GC_deleteEvent($client, $cur_gcode, $calendar);
		}catch(Exception $e)	{
            $cont = '';
        }
    }

    if ($cur_title2 == '') {
        $cur_title2 = $cur_title1;
    }

    $title = '【' . strtoupper($cur_place) . '】' . $cur_title2 . ' 【人数：' . $cur_booking . '(' . $cur_waitting . ')/' . $cur_pax . '】';
    if ($cur_free == '1') {
        $title .= '【会員限定】';
    }

    $msg = '';
    if (mb_strpos($cont, $msgconst) > 0) {
        $msg .= mb_substr($cont, 0, mb_strpos($cont, $msgconst) - 1);
    } else {
        $msg .= $cont;
    }
    $msg .= '';
    $msg .= chr(10);
    $msg .= $msgconst;
    $msg .= chr(10);
    $msg .= 'http://www.jawhm.or.jp/mailsystem/mem/main/event?e=' . $cur_id;
    $msg .= chr(10);
    $msg .= '【予約者リスト】';
    $msg .= chr(10);

    try {
        $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_mail_list.ini', FALSE);
        $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->query('SET CHARACTER SET utf8');
        $stt = $db->prepare('SELECT namae, furigana, tel, email, kyomi, jiki, sonota, ninzu, stat, wait FROM entrylist WHERE seminarid = "' . $event_id . '" ORDER BY wait, id');
        $stt->execute();
        $idx = 0;
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            $cur_namae = $row['namae'];
            $cur_furigana = $row['furigana'];
            $cur_tel = $row['tel'];
            $cur_email = $row['email'];
            $cur_kyomi = $row['kyomi'];
            $cur_jiki = $row['jiki'];
            $cur_sonota = $row['sonota'];
            $cur_ninzu = $row['ninzu'];
            $cur_stat = $row['stat'];
            $cur_wait = $row['wait'];

            $stat = '';
            if ($cur_wait == '1') {
                $stat = 'CXL待ち';
            } else {
                if ($cur_stat == '0' || $cur_stat == '3') {
                    $stat = '仮予約';
                }
                if ($cur_stat == '1') {
                    $stat = '予約';
                }
                if ($cur_stat == '2') {
                    $stat = '参加';
                }
                if ($cur_stat == '7') {
                    $stat = '不参加';
                }
            }
            if ($stat <> '') {
                $idx++;
                $msg .= '' . $idx . '. (' . $cur_ninzu . ':' . $stat . ')' . $cur_namae . '(' . $cur_furigana . ') 様 / ' . $cur_kyomi . ' / ' . $cur_jiki . ' / ' . $cur_sonota;
                $msg .= chr(13);
            }
        }
        $db = NULL;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    $tzOffset = '+09';
    $evtid = '';
    $evtid = GC_createEvent($client, $title, $msg, '', $cur_hiduke, $cur_sttime, $cur_hiduke, $cur_edtime, $tzOffset, $calendar);
    $crmid = strtoupper('A' . substr($cur_place, 0, 1) . $cur_ymd . '-' . $cur_id);

    // GoogleIDを設定
    try {
        $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_mail_list.ini', FALSE);
        $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->query('SET CHARACTER SET utf8');
        $sql = 'UPDATE event_list SET ';
        $sql .= '  gcode = "' . $evtid . '"';
        $sql .= ' ,crmid = "' . $crmid . '"';
        $sql .= ' WHERE id = "' . $event_id . '"';
        $stt = $db->prepare($sql);
        $stt->execute();
        $db = NULL;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    // 社内通知
    $subject = "カレンダー変更：" . $event_id;
    $body = '';
    $body .= 'Google カレンダー変更';
    $body .= chr(10);
    $body .= '' . $title;
    $body .= chr(10);
    $body .= '' . $cur_hiduke;
    $body .= chr(10);
    $body .= '' . $cur_sttime;
    $body .= chr(10);
    $body .= '' . mb_strpos($cont, $msgconst) . '/000';
    $body .= chr(10);
    $body .= chr(10);
    $body .= chr(10);
    $body .= '--OLD------------------------------------';
    $body .= chr(10);
    $body .= chr(10);
    $body .= $cont;
    $body .= chr(10);
    $body .= chr(10);
    $body .= '-----------------------------------------';
    $body .= chr(10);
    $body .= '--NEW------------------------------------';
    $body .= chr(10);
    $body .= chr(10);
    $body .= $msg;
    $body .= chr(10);
    $body .= chr(10);
    $body .= '-----------------------------------------';
    $body .= chr(10);
    foreach ($_SERVER as $post_name => $post_value) {
        $body .= chr(10);
        $body .= $post_name . " : " . $post_value;
    }
    $body .= '';
    $from = mb_encode_mimeheader(mb_convert_encoding("日本ワーキングホリデー協会","JIS"))."<info@jawhm.or.jp>";
    mb_send_mail('meminfo@jawhm.or.jp',$subject,$body,"From:".$from);

    if (mb_strpos($cont, $msgconst) > 0 && $evtid == '') {
        $subject = "Googleカレンダーの更新に失敗した可能性があります。" . $event_id;
        mb_send_mail('meminfo@jawhm.or.jp',$subject,$body,"From:".$from);
    }

      // ＣＲＭに転送
      $data = array(
      'pwd' => '303pittST'
      ,'act' => 'event'
      ,'evt_crmid' => $crmid
      ,'evt_oldid' => $cur_crmid
      ,'evt_hiduke' => $cur_hiduke
      ,'evt_ymd' => $cur_ymd
      ,'evt_time' => $cur_sttime.'～'.$cur_edtime
      ,'evt_place' => $cur_place
      ,'evt_title1' => $cur_title1
      ,'evt_use' => $cur_use
      );

      $url = 'https://toratoracrm.com/crm/';
      $val = wbsRequest($url, $data);
      $ret = json_decode($val, true);

}

function wbsRequest($url, $params) {
    $data = http_build_query($params);
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );
    $content = file_get_contents($url . '?' . $data, false, stream_context_create($arrContextOptions));
    return $content;
}

function item_alias($type, $code = NULL) {
    $_items = array(
        // 所属エリア
        'area' => array(
            'default' => 'Default',
            'tokyo' => '東京',
            'osaka' => '大阪',
            'nagoya' => '名古屋',
            'fukuoka' => '福岡',
            'sendai' => '仙台',
            'toyama' => '富山',
            'okinawa' => '沖縄',
            'event' => 'その他イベント',
			'kumamoto' => '熊本',
        ),
    );

    if (isset($code))
        return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
    else
        return isset($_items) ? $_items[$type] : false;
}

function nihon_youbi($h){
	switch(date("w",strtotime($h))){
		case 0:
			return "日";
			break;
		case 1:
			return "月";
			break;
		case 2:
			return "火";
			break;
		case 3:
			return "水";
			break;
		case 4:
			return "木";
			break;
		case 5:
			return "金";
			break;
		case 6:
			return "土";
			break;
	}
}

?>