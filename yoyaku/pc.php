<?php
require_once '../include/header.php';

$show_place = false;

$header_obj = new Header();

$header_obj->title_page='イベント（セミナー）予約';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->keywords_page='ワーキングホリデー,ワーホリ,オーストラリア,ニュージーランド,カナダ,カナダ,韓国,フランス,ドイツ,イギリス,アイルランド,デンマーク,台湾,香港,ビザ,取得,方法,申請,手続き,渡航,外務省,厚生労働省,最新,ニュース,大使館';
$header_obj->add_js_files='<script type="text/javascript" src="/js/jquery.corner.js"></script>

<script type="text/javascript">
$(function () {
	$("#div_mail").corner();
});
</script>';
$header_obj->fncMenuHead_imghtml='<img id="top-mainimg" src="../../../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text='イベント（セミナー）予約';
$header_obj->display_header(false);
?>
	<div id="maincontent">
	  <?php if (!$header_obj->is_mobile())  {
			echo $header_obj->breadcrumbs();
		}?>

<?php

	ini_set( "display_errors", "On");

	mb_language("Ja");
	mb_internal_encoding("utf8");

	require_once 'googleapi.php';

	$youbi = Array("日","月","火","水","木","金","土");

	$yoyakuno = @$_GET['n'];
	if ($yoyakuno == '')	{
		$yoyakuno = @$_POST['n'];
	}
	$checkmail = @$_GET['e'];
	if ($checkmail == '')	{
		$checkmail = @$_POST['e'];
	}

	$act = @$_POST['act'];
	$chk = @$_POST['chk'];

	$msg = '';
	$moji_aboutus = '<div class="aboutus_seminar">
						<p> 日本ワーキング・ホリデー協会は、</p>
						<p> 皆さま一人一人に向けたプロのサポートを提供いたします。</p>
						<div class="service_seminar">
							<span> 完全予約制の<br>カウンセリング</span>
							<span> ビザ申請<br>サポート</span>
							<span> 留学学校の<br>お手配</span>
						</div>
						<div class="clear"> </div>
						<div class="moji_butonmem">
							<a href="/mem">
								<span class="moji_span"> 計画からビサ申請までフルサポート！ </span><br />
								<span class="moji_span2"> メンバー登録について </span>
							</a>
						</div>
					</div>';
	$moji_aboutus_show = 0;
	$button_moji = "btn_cancel";

	// 予約状況をチェック
	try {
		$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
		$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET CHARACTER SET utf8');
		$stt = $db->prepare('SELECT id, seminarid, namae, email, ninzu, stat, wait FROM entrylist WHERE id = "'.$yoyakuno.'" ');
		$stt->execute();
		$idx = 0;
		$cur_yoyakuno = '';
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$cur_yoyakuno = $row['id'];
			$cur_seminarid = $row['seminarid'];
			$cur_namae = $row['namae'];
			$cur_email = $row['email'];
			$cur_ninzu = $row['ninzu'];
			$cur_stat = $row['stat'];
			$cur_wait = $row['wait'];

		}
		$db = NULL;
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	$cur_mailinfo = '';
	try {
		$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
		$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET CHARACTER SET utf8');
		$stt = $db->prepare('SELECT id, place, hiduke, year(hiduke) as y, month(hiduke) as m, day(hiduke) as d, date_format(hiduke,\'%w\') as yobi, date_format(starttime,\'%k:%i\') as sttime, k_title1, k_desc1, mailinfo, online_type, online_url  FROM event_list WHERE id = "'.$cur_seminarid.'" ');
		$stt->execute();
		$idx = 0;
		$cur_id = '';
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$cur_id = $row['id'];
			$cur_place = $row['place'];
			$cur_hiduke = $row['hiduke'];
			$cur_y = $row['y'];
			$cur_m = $row['m'];
			$cur_d = $row['d'];
			$cur_yobi = $row['yobi'];
			$cur_sttime = $row['sttime'];

			$cur_title1 = $row['k_title1'];
			$cur_title1 = strip_tags($cur_title1);
			$cur_title1 = preg_replace("/<img[^>]+\>/i", "", $cur_title1);
			$cur_title1 = mb_convert_kana($cur_title1, "K");

			$cur_desc1 = $row['k_desc1'];
			$cur_desc1 = strip_tags($cur_desc1);
			$cur_desc1 = preg_replace("/<img[^>]+\>/i", "", $cur_desc1);
			$cur_desc1 = mb_convert_kana($cur_desc1, "K");

			$cur_mailinfo = $row['mailinfo'];
			$cur_online_url = $row['online_url'];
			$cur_online_type = $row['online_type'];

		}
		$db = NULL;
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	if ($cur_id == '')	{
		$msg = 'エラーが発生しました。[B227]';
	}

	if (md5($cur_email) <> $checkmail)	{
		$msg = 'エラーが発生しました。[E894]';
	}

	if ($msg == '')	{

		$button = '';
		$moji = '';

		if ($act == 'upd')	{
			try {
				$sql = '';
				$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
				$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->query('SET CHARACTER SET utf8');
				if ($cur_wait == '1')	{
					if ($chk = 'cxl')	{
						// キャンセル待ちを取消し
						$sql = 'UPDATE event_list SET waitting = waitting - '.$cur_ninzu.' WHERE id = '.$cur_seminarid;
						$stt = $db->prepare($sql);
						$stt->execute();
						$sql = 'UPDATE entrylist SET stat = "6", wait = "0", upddate = "'.date('Y/m/d H:i:s').'" WHERE id = '.$yoyakuno;
						$cur_stat = '6';
						$cur_wait = '0';
						$moji .= 'キャンセル待ちを取り消しました。<br/>またのご予約をお待ちしております。';
					}else{
						$msg = '画面遷移が不正です。このページを一度閉じて再表示してください。[Y2819]';
					}
				}else{
					switch ($cur_stat)	{
						case "0":
							// 仮予約を確定
							$sql = 'UPDATE entrylist SET stat = "1", upddate = "'.date('Y/m/d H:i:s').'" WHERE id = '.$yoyakuno;
							$cur_stat = '1';
							$moji .= '予約を確定しました。<br/>';
							// $moji .= '会場でお会いできますことを楽しみにしております。';
							$moji .= 'セミナーでお会いできますことを楽しみにしております。';

							// $moji .= '<br/>';
							// $moji .= 'どうぞお気をつけてご来場ください。';

							//緊急文字列追加
							$moji .= '<br/><br/>';
							$moji .= '===========<br/><br/>';

							// $moji .= '【重要】この度、新型コロナウィルス感染症（COVID-19）の動向に鑑みて、3月10日(火)から4月30日(木)まで当協会各オフィスにて行われるセミナーに関しましては、すべてオンラインのみでの開催させていただく運びとなりました。';
							if($cur_place == "online"){
								$moji .= '【重要】この度、新型コロナウィルス感染症(COVID-19)の動向に鑑みて、すべてオンラインのみでの開催させていただく運びとなりました。';
								$moji .= '<br/><br/>';
								$moji .= 'セミナーご予約時にご登録いただきましたメールアドレスに、オンラインセミナー参加に関するご案内を事前に送付させていただきます。メールが届かない場合や、その他お問い合わせ等ございましたら、お電話かメールにてご連絡くださいませ。<br/><br/>';
								$moji .= '詳細はこちらでもご確認いただけます。 ';
								$moji .= '<br/>';
								$moji .= 'https://www.jawhm.or.jp/ja/13612';
								$moji .= '<br/><br/>===========<br/>';
							}
							//--------------

							$moji_aboutus_show = 1;
							break;
						case "1":
							if ($chk == 'cxl')	{
								// 予約をキャンセル
								$sql = 'UPDATE event_list SET booking = booking - '.$cur_ninzu.' WHERE id = '.$cur_seminarid;
								$stt = $db->prepare($sql);
								$stt->execute();
								$sql = 'UPDATE entrylist SET stat = "6", upddate = "'.date('Y/m/d H:i:s').'" WHERE id = '.$yoyakuno;
								$cur_stat = '6';
								$moji .= 'ご予約をキャンセルしました。<br/>またのご予約をお待ちしております。';
							}else{
								$msg = '画面遷移が不正です。このページを一度閉じて再表示してください。[W8894]';
							}
							break;
					}
				}
				if ($sql <> '')	{
					// ＤＢ更新
					$stt = $db->prepare($sql);
					$stt->execute();

					// メール送信
					$subject = "イベント（セミナー）のご案内";
					$body  = '';
					$body .= ''.$cur_namae.'様'.chr(10);
					$body .= chr(10);
					$body .= '日本ワーキングホリデー協会です。'.chr(10);
					$body .= chr(10);
					$body .= '以下のイベント（セミナー）の、'.mb_ereg_replace('<br/>',chr(10),$moji).chr(10);

					// WEBページ「Go my way」の周知のための文章を追加---------------
		            // Pardotの使用終了でinfo.jawhmが使われなくなりました。
					// $body .= '……‥‥‥‥‥・・‥‥‥‥‥……'.chr(10);
					// $body .= '日本ワーキング・ホリデー協会は、ワーホリや留学を経験された後、';
					// $body .= '「海外での経験が今の自分にどのような影響を与えているか」をテーマに、';
					// $body .= '帰国者の方へインタビューを行っています。';
					// $body .= 'これから渡航を考えている方、'.chr(10);
					// $body .= '参考にしてみませんか？'.chr(10);
					// $body .= 'http://info.jawhm.or.jp/gmw.mail'.chr(10);
					// ----------------------------------------------------

					$body .= chr(10);
					$body .= '─────────────────────────'.chr(10);
					$body .= '　「'.$cur_title1.'」'.chr(10);
					$body .= '─────────────────────────'.chr(10);
					$body .= chr(10);
					$body .= '≪日時≫'.chr(10);
					$body .= '　'.$cur_y.'年 '.$cur_m.'月 '.$cur_d.'日 ('.$youbi[$cur_yobi].'曜日)   '.$cur_sttime.' 開始'.chr(10);
					$body .= chr(10);

					//会場の非表示設定
					if($cur_place == "online" && $cur_stat == "1"){
						$body .= '≪会場≫'.chr(10);
						switch ($cur_place)	{
							case 'tokyo':
								$body .='　東京会場'.chr(10);
								$body .='　https://www.jawhm.or.jp/event/map?p=tokyo&wh=s02'.chr(10);
								$body .='　=== 新宿駅からの道順はこちら ==='.chr(10);
								$body .='　https://www.jawhm.or.jp/blog/tokyoblog/item/496'.chr(10);
								break;
							case 'osaka':
								$body .='　大阪会場'.chr(10);
								$body .='　https://www.jawhm.or.jp/event/map?p=osaka&wh=s02'.chr(10);
								break;
							case 'fukuoka':
								$body .='　福岡会場'.chr(10);
								$body .='　https://www.jawhm.or.jp/event/map?p=fukuoka&wh=s02'.chr(10);
								break;
							case 'sendai':
								$body .='　仙台会場'.chr(10);
								break;
							case 'toyama':
								$body .='　富山会場'.chr(10);
								break;
							case 'okinawa':
								$body .='　沖縄会場'.chr(10);
								$body .='　https://www.jawhm.or.jp/event/map?p=okinawa&wh=s02'.chr(10);
								break;
							case 'nagoya':
								$body .='　名古屋会場'.chr(10);
								$body .='　https://www.jawhm.or.jp/event/map?p=nagoya&wh=s02'.chr(10);
								break;
					        case 'online':
					            $body .='　オンライン会場' . chr(10);
					            if($cur_online_type == 1){
					                $body .='【YouTube】' . chr(10);
					                $body .= $cur_online_url . chr(10);
					                $body .= chr(10);
					            }elseif ($cur_online_type == 2) {
					                $body .='【Zoom Cloud Meetings】' . chr(10);
					                $body .= $cur_online_url . chr(10);
					                $body .= chr(10);
					                $body .= '・パソコンから利用される場合は、アプリ等をダウンロードする必要なく下記リンクからそのまま利用できます。';
					                $body .= chr(10);
					                $body .= '・スマートフォン/タブレットからの方は、事前にZoomアプリをダウンロードして頂き上記リンクからご利用頂けます。';
					                $body .= chr(10);
					                $body .= chr(10);
					            }
					            break;
						}
					}

					$body .= chr(10);
			//		$body .= '≪内容≫'.chr(10);
					$body .= ''.$cur_desc1.''.chr(10);
					$body .= chr(10);
					if ($cur_ninzu == 2)	{
						$body .= '---------------'.chr(10);
						$body .= '　ご同伴者あり（お二人様のお席をご用意いたします。）'.chr(10);
						$body .= '---------------'.chr(10);
						$body .= chr(10);
					}
					$body .= chr(10);
					if ($cur_mailinfo <> '')	{
						$body .= '≪その他≫'.chr(10);
						$body .= $cur_mailinfo.chr(10);
						$body .= chr(10);
					}
					$body .= chr(10);
					if ($cur_stat == '1')	{
						$body .= '≪キャンセルの場合≫'.chr(10);
						$body .= 'ご都合によりセミナー（イベント）にご参加頂けなくなった場合は、'.chr(10);
						$body .= '以下URLよりキャンセルのご連絡をお願い致します。'.chr(10);
					}else{
						$body .= '≪状態確認≫'.chr(10);
						$body .= '現在の予約状態を確認する場合は、以下のURLを表示してください。'.chr(10);
					}
					$body .= 'https://www.jawhm.or.jp/yoyaku/disp/'.$yoyakuno.'/'.$checkmail.chr(10);
					$body .= chr(10);
					$body .= chr(10);

					$body .= '┏┓━━━━━━━━━━━━━━'.chr(10);
					$body .= '┗■　メンバー登録のご案内'.chr(10);
					$body .= '━━━━━━━━━━━━━━━━'.chr(10);
					$body .= 'メンバー登録はワーホリ成功の第一歩！'.chr(10);
					$body .= ''.chr(10);
					$body .= 'ワーキングホリデーや留学には興味があるけれど、'.chr(10);
					$body .= '　● 海外で何ができるのか？'.chr(10);
					$body .= '　● 何をしなければいけないのか？'.chr(10);
					$body .= '　● どんな準備や手続きが必要なのか？'.chr(10);
					$body .= '　● どのくらい費用がかかるのか？'.chr(10);
					$body .= '　● 渡航先で困ったときはどうすればよいのか？'.chr(10);
					$body .= ''.chr(10);
					$body .= '解らない事が多すぎて、もっと解らなくなってしまいます。'.chr(10);
					$body .= ''.chr(10);
					$body .= 'そんな皆様を支援するために当協会では、'.chr(10);
					$body .= 'ワーホリ成功のためのメンバーサポート制度をご用意しています。'.chr(10);
					$body .= '当協会のメンバーになれば、個別相談をはじめビザ取得のお手伝い、'.chr(10);
					$body .= '出発前の準備、到着後のサポートまで、フルにサポートさせて頂きます。'.chr(10);
					$body .= ''.chr(10);
					$body .= '▼▼▼▼▼ メンバー登録はこちらから ▼▼▼▼▼'.chr(10);
					$body .= '　https://www.jawhm.or.jp/mem?wh=s02'.chr(10);
					$body .= ''.chr(10);
					$body .= ''.chr(10);

					//LINEボタン追加
					// $body .= '★LINE始めました★'.chr(10);
					// $body .= '<a href="https://lin.ee/8nCk50S"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>'.chr(10);
					// $body .= ''.chr(10);
					$body .= '▼▼▼▼▼ ★LINE始めました★ ▼▼▼▼▼'.chr(10);
					$body .= 'https://lin.ee/8nCk50S'.chr(10);
			        $body .= '' . chr(10);

					$body .= '……‥‥‥‥‥・・‥‥‥‥‥……'.chr(10);
					$body .= '　日本ワーキングホリデー協会'.chr(10);
					$body .= '　https://www.jawhm.or.jp'.chr(10);
					$body .= '　E-mail : info@jawhm.or.jp'.chr(10);
					$body .= '……‥‥‥‥‥・・‥‥‥‥‥……'.chr(10);
					$body .= ''.chr(10);
					$body .= '';

				    $from = "From:" . mb_encode_mimeheader(mb_convert_encoding("日本ワーキングホリデー協会", "JIS")) . "<info@jawhm.or.jp>";
				    $from .= "\n";
				    $from .= "Bcc:" . mb_encode_mimeheader(mb_convert_encoding("日本ワーキングホリデー協会", "JIS")) . "<info@jawhm.or.jp>";
				    $from .= "," . mb_encode_mimeheader(mb_convert_encoding("日本ワーキングホリデー協会", "JIS")) . "<meminfo@jawhm.or.jp>";
					mb_send_mail($cur_email,$subject,$body,$from);

					// カレンダー変更
					GC_Edit($cur_seminarid);

				}
				$db = NULL;
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		// 表示処理
		$msg .= '
			<table class="yoyaku">
				<tr>
					<th>予約の状態</th>
					<td>
		';

		$chk = '';
		if ($cur_wait == '1')	{
			$msg .= 'キャンセル待ち';
			$button = 'キャンセル待ちを取消する';
			$moji .= '他の方がこのイベント（セミナー）をキャンセルした場合に、自動的にご連絡致します。<br/>このままお待ちください。';
			$chk = 'cxl';
		}else{
			switch ($cur_stat)	{
				case "0":
					$msg .= '仮予約';
					$button = '予約を確定する';
					$button_moji = "btn_send";
					$moji .= '【ご注意】<br/>';
					if( $cur_id == "35089"){
						$moji .= '<span style="color:red">！！本イベントはキャンセル不可のイベントとなります！！</span><br/>';
					}
					$moji .= '現在、この予約は仮予約状態です。<br/>参加される場合は、必ず上のボタンをクリックして予約を確定させてください。';
					break;
				case "1":
					$msg .= '予約（確定）';
					$button = '予約をキャンセルする';
					$chk = 'cxl';

					if ($cur_y == date("Y") &&
						$cur_m == date("n") &&
						$cur_d == date("j") &&
						$cur_place == "tokyo"	)	{
						// 東京のセミナー、当日はキャンセル不可
						$button = '';
						$moji = 'ご予約は確定されています。<br/>なお、セミナー当日はキャンセルできません。';
					}
					if( $cur_id == "35089")	{
						$button = '';
						$moji = 'ご予約は確定されています。';
					}



					break;
				case "2":
					$msg .= '終了';
					break;
				case "5":
					$msg .= 'キャンセル済み';
					if ($moji == '')	{
						$moji .= 'このご予約はキャンセルされております。<br/>またのご予約をお待ちしております。';
						$moji_aboutus_show = 1;
					}
					break;
				case "6":
					$msg .= 'キャンセル済み';
					$moji_aboutus_show = 1;
					if ($moji == '')	{
						$moji .= 'このご予約はキャンセルされております。<br/>またのご予約をお待ちしております。';
						$moji_aboutus_show = 1;
					}
					break;
				case "7":
					$msg .= '終了';
					break;
			}
		}
		$msg .= '		</td>
				</tr>';
		switch ($cur_place)	{
			case 'tokyo':
				$msg .= '<tr><th>開催地</th><td><a href="https://www.jawhm.or.jp/event/map?p=tokyo" target="_blank">東京会場</a></td></tr>';
				break;
			case 'osaka':
				$msg .= '<tr><th>開催地</th><td><a href="https://www.jawhm.or.jp/event/map?p=osaka" target="_blank">大阪会場</a></td></tr>';
				break;
			case 'nagoya':
				$msg .= '<tr><th>開催地</th><td><a href="https://www.jawhm.or.jp/event/map?p=nagoya" target="_blank">名古屋会場</a></td></tr>';
				break;
			case 'sendai':
				$msg .= '<tr><th>開催地</th><td>仙台会場</td></tr>';
				break;
			case 'toyama':
				$msg .= '<tr><th>開催地</th><td>富山会場</td></tr>';
				break;
			case 'fukuoka':
				$msg .= '<tr><th>開催地</th><td><a href="https://www.jawhm.or.jp/event/map?p=fukuoka" target="_blank">福岡会場</a></td></tr>';
				break;
			case 'okinawa':
				$msg .= '<tr><th>開催地</th><td><a href="https://www.jawhm.or.jp/event/map?p=okinawa" target="_blank">沖縄会場</a></td></tr>';
				break;
		}
		$msg .= '	<tr>
					<th>日程</th>
					<td>'.$cur_y.'年 '.$cur_m.'月 '.$cur_d.'日 ('.$youbi[$cur_yobi].'曜日)　'.$cur_sttime.'開始</td>
				</tr>
				<tr>
					<th>タイトル</th>
					<td>'.$cur_title1.'</td>
				</tr>
			</table>
		';
		//if(confirm(\'本当に、'.mb_substr($button ,0 ,mb_strlen($button)-2).'してよろしいですか？\')){document.getElementById(\'btn_submit\').disabled=true; return true;};
		if ($button <> '')	{
			$msg .= '<div style="margin:20px auto 0 auto; text-align:center;">
					<form action="" method="POST" onsubmit="return confirm(\'本当に、'.mb_substr($button ,0 ,mb_strlen($button)-2).'してよろしいですか？\');">
						<input type="hidden" name="act" value="upd">
						<input type="hidden" name="n" value="'.$yoyakuno.'">
						<input type="hidden" name="e" value="'.$checkmail.'">
						<input type="hidden" name="chk" value="'.$chk.'">
						<p class="p_sendbutton">
							<input id="btn_submit" class="'.$button_moji.'" type=submit value="'.$button.'">
						</p>
					</form>
				</div>
			';
		}
		if ($moji <> '') {
			$msg .= '<div class="moji">'.$moji.'</div>';
		}

		if($moji_aboutus_show == 1) {
			$msg .= $moji_aboutus;
		}

	}

	$msg .= '<div>
				<table style="margin: 20px 0 0 0; padding: 10px 20px 10px 20px; border: 2px #8a0000 dotted;';
	$msg .= (!$header_obj->is_mobile()) ? ' font-size: 11pt;' : ' font-size: 10pt;';

	$msg .=	' font-weight: bold; text-align: center; display: block;">
					<tr>
			            <td style="vertical-align:top;"></td>
			            <td style="color:red;">・セミナー予約のキャンセルの際には必ず前日までにキャンセル手続きをお願い申し上げます。<br/>・当日のキャンセルや、キャンセル手続き無くセミナーへの欠席が続いた場合、その後のご予約をご遠慮する場合もございます。<br/>多くの方に情報提供をさせていただくためのセミナーとなりますのでご理解ください。</td>
			        </tr>
			    </table>
			</div>';
?>


	<h2 style="margin-top: 5px;" id="onlinesemi" class="sec-title">イベント（セミナー）予約</h2>
	<div id="sitemapbox">
		<p>
			<?php print $msg; ?>
		</p>
		<div style="height:10px;">&nbsp;</div>
	</div>

	</div>
  </div>
  </div>

  	<?php if (!$header_obj->is_mobile()) {
  		fncMenuFooter($header_obj->footer_type);
  	} else {?>

		<div id="footer-copyright-new">
	        <div class="social-box">
	            <script type="text/javascript">
	                (function(d, s, id) {
	                    var js, fjs = d.getElementsByTagName(s)[0];
	                    if (d.getElementById(id)) {return;}
	                    js = d.createElement(s); js.id = id; js.async = true;
	                    js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&amp;appId=158074594262625";
	                    fjs.parentNode.insertBefore(js, fjs);
	                }(document, "script", "facebook-jssdk"));
	            </script>
	            <div id="social_tool">
	                <table style="display: inline-block;margin-bottom: 10px">
	                	<tr>
	                        <td style="vertical-align:top;">
	                            <div class="fb-like" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="arial"></div>
	                        </td>
	                        <td style="vertical-align:top;">
	                            <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="jawhm">Tweet</a>
	                            <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
	                        </td>
	                        <td style="vertical-align:top;">
	                            <!--<g:plusone></g:plusone>-->
	                            <div class="g-plusone"></div>
	                            <script type="text/javascript">
	                                window.___gcfg = {lang: "ja"};

	                                (function() {
	                                    var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
	                                    po.src = "https://apis.google.com/js/plusone.js";
	                                    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
	                                })();
	                            </script>
	                        </td>
	                    </tr>
	                </table>
	            </div>

	        </div>
			<div style="margin-top:0px; margin-bottom:8px; color:white; font-size:10pt;">
				<!--a href="http://wh-c.jp" target="_blank">日本ワーキングホリデー協会では、<br/>ワーホリを「つなげる」「つながる」<br/>原宿カフェを運営しております。</a-->
				<a style="color: #428bca; text-decoration: none;" href="https://www.jawhm.or.jp">日本ワーキングホリデー協会は、みなさまのワーキングホリデー（ワーホリ）と留学を全力で応援します</a>
			</div>
			Copyright© JAPAN Association for Working Holiday Makers All right reserved.
		</div>
	<?php } ?>

</body>
</html>