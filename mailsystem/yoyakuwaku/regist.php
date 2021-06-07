<?php

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

	$act = @$_GET['act'];

	if ($act == 'go')	{
		$ym = @$_GET['ym'];
		$dd = @$_GET['dd'];
		$staff = @$_GET['staff'];

		$ini = parse_ini_file('../../../bin/pdo_mail_list.ini', FALSE);
		$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET CHARACTER SET utf8');

		$ymd = date('Y-m-d', strtotime($ym.'-'.$dd));
		$brk = $staff;

echo ''.$ymd.' の登録を実施しました。<br/>スタッフ人数 : '.$brk.'<br/>&nbsp;<br/>';

		$restno = 0;		// 休憩スタッフＮＯ

		for($idx=11; $idx<=18; $idx++)	{
			$max = $staff;
			$lun = 0;

			// セミナー判定
			$sql = '';
			$sql = $sql.'SELECT DATE_FORMAT(starttime, "%i") as sttime FROM event_list WHERE place = :place and k_use = "1" ';
			$sql = $sql.' and (( starttime >= :stst and starttime <= :sted ) or ( endtime >= :edst and endtime <= :eded ) or (starttime <= :jst1 and endtime >= :jst2 ))';
			$sql = $sql.'  order by starttime,endtime ';
			$stt = $db->prepare($sql);
			$stt->bindValue(':place', "tokyo");
			$stt->bindValue(':jst1', $ymd.' '.($idx + 0).':01:00');
			$stt->bindValue(':jst2', $ymd.' '.($idx + 0).':01:00');
			$stt->bindValue(':stst', $ymd.' '.($idx - 1).':01:00');
			$stt->bindValue(':sted', $ymd.' '.($idx + 0).':59:00');
			$stt->bindValue(':edst', $ymd.' '.($idx + 0).':01:00');
			$stt->bindValue(':eded', $ymd.' '.($idx + 1).':59:00');
			$stt->execute();
			$cur_sttime = '';
			$cnt00 = 0;
			$cnt30 = 0;
			$cntsm = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$cur_sttime = $row['sttime'];
				if ($cur_sttime == '00')	{
					$cnt00++;
					$cntsm++;
				}
				if ($cur_sttime == '30') 	{
					$cnt30++;
					if ($cnt00 == 0)	{
						$cntsm++;
					}
				}
			}
			$max = $max - $cntsm;
			if ($max < 0)		{
				$max = 0;
				$cntsm = $staff;
			}

			// ランチ判定
			if ($idx>=13 && $idx<=16 && $brk>0 && $max > 0)	{
				if ($staff >= 4)	{
					if ($brk == 1)	{
						$lun = 1;
					}else{
						if ($max > 2)	{
							$lun = 2;
						}else{
							$lun = 1;
						}
					}
				}else{
					$lun = 1;
				}
			}

			$max = $max - $lun;
			$brk = $brk - $lun;

			echo '時間帯：'.$idx.'時台　　予約可：'.$max.'名　セミナー：'.$cntsm.'名　休憩：'.$lun.'名<br/>';

			// さ、カレンダー登録だね
			$client = GC_Init($email, $password);

			$staffno = 0;		// スタッフＮＯ

			// 休憩枠を作る
			for ($tt=1; $tt<=$lun; $tt++)	{
				$restno++;
				$title = '[AUTO]休憩 '.$restno;
				$msg = '[自動作成]';
				$sttime = $ymd.'T'.($idx+0).':00';
				$edtime = $ymd.'T'.($idx+1).':00';
				$ccd = '4';
				sleep(1);
				$id = GC_createEvent($client, $title, $msg, $sttime, $edtime, $ccd);
			}

			// セミナー対応枠を作る
			for ($tt=1; $tt<=$cntsm; $tt++)	{
				$staffno++;
				if ($lun > 0)	{
					if ($staffno == $restno)					{	$staffno++;	}
					if ($lun == 2 && ($staffno + 1) == $restno)	{	$staffno++;	$staffno++;	}
				}
				$title = '[AUTO]セミナー対応 '.$staffno;
				$msg = '[自動作成]';
				$sttime = $ymd.'T'.($idx+0).':00';
				$edtime = $ymd.'T'.($idx+1).':00';
				$ccd = '6';
				sleep(1);
				$id = GC_createEvent($client, $title, $msg, $sttime, $edtime, $ccd);
			}

			// 予約枠を作る
			for ($tt=1; $tt<=$max; $tt++)	{
				$staffno++;
				if ($lun > 0)	{
					if ($staffno == $restno)					{	$staffno++;	}
					if ($lun == 2 && ($staffno + 1) == $restno)	{	$staffno++;	$staffno++;	}
				}
				$title = '[AUTO]予約可能 '.$staffno;
				$msg = '[自動作成]';
				$sttime = $ymd.'T'.($idx+0).':00';
				$edtime = $ymd.'T'.($idx+1).':00';
				$ccd = '5';
				sleep(1);
				$id = GC_createEvent($client, $title, $msg, $sttime, $edtime, $ccd);
			}

		}
		$db = NULL;

	}else{
		echo '処理対象を指定してください';
	}

?>