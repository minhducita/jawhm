<?php

// 一般メニュー読み込み
require 'php/fnc_menu.php';
require_once '_includes/functions.php';


if (count($param) > 2) {
	$data_param = $param[2];
}else{
	$data_param = 'main';
}



switch ($data_param)	{
	case "main":
	case "list":
		// イベント管理
		$e = fnc_getpost('e');

		// イベント操作系ＪＳ
		$script .= '
			// グローバル変数
			$goforuse = 0;
			$goforschool = 0;

			// カレンダー表示
			InputCalendar.createOnLoaded(\'ser_hiduke\', {lang:\'ja\'});
			InputCalendar.createOnLoaded(\'ser_hiduketo\', {lang:\'ja\'});

			// イベント検索
			function fncSereventList()	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/event2/event_ser",
					data: jQuery("#form_event_list").serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						jQuery("#res_event_list").html(msg);
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			// 予約者リスト出力
			function fncYoyakuListCsv(hiduke, place)	{
				if(confirm(place + \'会場、\' + hiduke + \'分の予約者リストを出力します。よろしいですか？\')){
					jQuery("#processing").show();
					window.open(\''.$url_base.'csv/yoyaku/yoyakulist_csv/?type=out&seminardate=\' + hiduke + \'&seminarplace=\' + place, \'_blank\', \'width=200,height=200\');
					jQuery("#processing").hide();
				}
			}

			// イベント表示リクエスト
			function fnceventShow(id)	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/event2/event_show",
					data: "id=" + id,
					success: function(msg){
						jQuery("#processing").hide();
						jQuery("#res_event_edit").html(msg);
						fncShow(\'div_event_edit\', 1140, 600);
						fncSetDate();
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			// 新規予約
			function fncyoyakuShow(seminarid)	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/yoyaku/yoyaku_show",
					data: "seminarid=" + seminarid,
					success: function(msg){
						jQuery("#processing").hide();
						jQuery("#res_event_edit").html(msg);
						fncShow(\'div_yoyaku_edit\', 650, 450);
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}
			// 予約入力チェック
			function fncyoyakuPost(formname)	{
				// 入力チェック
				var objform = document.getElementById(formname);
				var obj = objform.getElementsByTagName(\'input\');
				for (idx=0; idx<obj.length; idx++)	{
					if (obj[idx].getAttribute(\'required\') == \'yes\')	{
						if (obj[idx].value == \'\')	{
							alert("入力してください");
							obj[idx].focus();
							return false;
						}
					}
				}
				document.getElementById("yoyakusubmit").value = "Wait";
				document.getElementById("yoyakusubmit").disabled = true;
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/yoyaku/yoyaku_edit",
					data: jQuery("#" + formname).serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						alert(res[0].msg);
						if (res[0].result == \'OK\')	{
							jQuery.unblockUI();
						}
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}
			function checkMail(emailValue){
                var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (filter.test(emailValue)) return true;
                else return false;
            }

			// イベント入力チェック
			function fnceventPost(formname)	{
				// 日付チェック
				if (jQuery("#edit_hiduke").val() == "")	{
					alert("不正な日付です。確認してください。");
					return false;
				}
				// 時間チェック
				if (jQuery("#edit_sttime").val() > jQuery("#edit_edtime").val())	{
					alert("開始時刻が終了時刻より前です。確認してください。");
					return false;
				}
				// 入力チェック
				var objform = document.getElementById(formname);
				var obj = objform.getElementsByTagName(\'input\');
				for (idx=0; idx<obj.length; idx++)	{
					if (obj[idx].getAttribute(\'required\') == \'yes\')	{
						if (obj[idx].value == \'\')	{
							alert("入力してください");
							obj[idx].focus();
							return false;
						}
					}
				}
				if ('.$user_fuk.')	{
					if (jQuery("input[name=edit_place]:checked").val() != "fukuoka")	{
						if (jQuery("input[name=edit_place]:checked").val() != "kumamoto")	{
							if (!confirm("開催地が「福岡」「熊本」以外の設定になっています。よろしいですか？"))	{
								return false;
							}
						}
					}
				}
				document.getElementById("eventsubmit").value = "Wait";
				document.getElementById("eventsubmit").disabled = true;
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/event2/event_edit",
					data: jQuery("#" + formname).serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						alert(res[0].msg);
						if (res[0].result == \'OK\')	{
							jQuery.unblockUI();
						}
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			// イベント削除
			function fncdel(formname)	{
				if (!confirm("このイベントを削除します。よろしいですか？"))	{	return false;	}
				if (!confirm("削除だよ？削除？本当に消すの？？"))	{	return false;	}
				document.getElementById("eventdel").value = "Wait";
				document.getElementById("eventdel").disabled = true;
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/event2/event_del",
					data: jQuery("#" + formname).serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						alert(res[0].msg);
						if (res[0].result == \'OK\')	{
							jQuery.unblockUI();
						}
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			// イベントコピー
			function fnccopy(formname)	{
				if (!confirm("このイベントをコピーします。よろしいですか？"))	{	return false;	}
				jQuery("#edit_id").val("");
				jQuery("#eventdel").hide();
				jQuery("#edit_ongoogle").attr("checked",false);
				jQuery("#hidden_ongoogle").val("");
				jQuery("#edit_use").attr("checked",false);
				jQuery("#lbl_status").html("コピー中");
				jQuery("#lbl_title").html("***　コピー中！！　***　　");
			}

			// 選択チェック
			function fncCheckAll() {
                if(jQuery("#select-all").prop("checked")) {
                    jQuery(".cb_item:checkbox").prop("checked", true);
                } else {
                    jQuery(".cb_item:checkbox").prop("checked", false);
                }
            }

			// 一括掲載
			function fncgo()	{
				var chk = jQuery( "input.cb_item:checked" ).map( function() { return jQuery(this).val(); }).get().join(",");
				if (chk == "")	{
					alert("掲載対象を選択してください。");
				}else{
					if (!confirm("一括掲載を実行します。よろしいですか？"))	{	return false;	}
					jQuery("#processing").show();
					jQuery.ajax({
						type: "POST",
						url: "'.$url_base.'data/event2/event_go",
						data: "id=" + chk,
						success: function(msg){
							jQuery("#processing").hide();
							jQuery("#res_event_edit").html(msg);
							fncShow(\'div_event_edit\', 500, 300);
							goforuse=1;
							setTimeout(\'fncgoforuse()\',500);
						},
						error:function(){
							jQuery("#processing").hide();
							alert("通信エラーが発生しました。");
						}
					});
				}
			}

			// 一括掲載実行
			function fncgoforuse()	{
			if (goforuse == 1)	{
					jQuery.ajax({
						type: "POST",
						url: "'.$url_base.'data/event2/event_goforuse",
						success: function(msg){
							res = eval(msg);
							if (res[0].result == \'END\')	{
								jQuery("#lbl_goforuse").html(res[0].cnt);
								alert(res[0].msg);
								fncHide();
							}
							if (res[0].result == \'OK\')	{
								jQuery("#lbl_goforuse").html(res[0].cnt);
								setTimeout(\'fncgoforuse()\',3000);
							}
							if (res[0].result == \'NG\')	{
								alert(res[0].msg);
								fncHide();
							}
						},
						error:function(){
							jQuery("#processing").hide();
							alert("通信エラーが発生しました。");
						}
					});
				}
			}

			// 一括掲載キャンセル
			function fnccancel()	{
				goforuse = 0;
				alert("キャンセルしました。");
				fncHide();
			}

			// 一括掲載
			function fncgoschool()	{
			    var chk = jQuery( "input.cb_item:checked" ).map( function() { return jQuery(this).val(); }).get().join(",");
				if (chk == "")	{
					alert("掲載対象を選択してください。");
				}else{
					if (!confirm("一括掲載（学校）を実行します。よろしいですか？"))	{	return false;	}
					jQuery("#processing").show();
					jQuery.ajax({
						type: "POST",
						url: "'.$url_base.'data/event2/event_go",
						data: "id=" + chk,
						success: function(msg){
							jQuery("#processing").hide();
							jQuery("#res_event_edit").html(msg);
							fncShow(\'div_event_edit\', 500, 300);
							goforuse=1;
							setTimeout(\'fncgoforschool()\',500);
						},
						error:function(){
							jQuery("#processing").hide();
							alert("通信エラーが発生しました。");
						}
					});
				}
			}

			// 一括掲載実行
			function fncgoforschool()	{
			if (goforuse == 1)	{
					jQuery.ajax({
						type: "POST",
						url: "'.$url_base.'data/event2/event_goforschool",
						success: function(msg){
							res = eval(msg);
							if (res[0].result == \'END\')	{
								jQuery("#lbl_goforuse").html(res[0].cnt);
								alert(res[0].msg);
								fncHide();
							}
							if (res[0].result == \'OK\')	{
								jQuery("#lbl_goforuse").html(res[0].cnt);
								setTimeout(\'fncgoforschool()\',3000);
							}
							if (res[0].result == \'NG\')	{
								alert(res[0].msg);
								fncHide();
							}
						},
						error:function(){
							jQuery("#processing").hide();
							alert("通信エラーが発生しました。");
						}
					});
				}
			}

			// ＣＳＶ出力
			function fncSereventCsv()	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'csv/event2/event_csv",
					data: jQuery("#form_event_list").serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						if (res[0].result == \'OK\')	{
							if (confirm(res[0].msg + "出力しますか？"))	{
								window.open(\''.$url_base.'csv/event2/event_csv/?type=out&\' + jQuery("#form_event_list").serialize(), \'_blank\', \'width=200,height=200\');
								return false;
							}
						}else{
							alert(res[0].msg);
						}
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			// 仮掲載ＣＳＶ出力
			function fncSerKariCsv()	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'csv/event2/kari_csv",
					data: jQuery("#form_event_list").serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						if (res[0].result == \'OK\')	{
							if (confirm(res[0].msg + "出力しますか？"))	{
								window.open(\''.$url_base.'csv/event2/kari_csv/?type=out&\' + jQuery("#form_event_list").serialize(), \'_blank\', \'width=200,height=200\');
								return false;
							}
						}else{
							alert(res[0].msg);
						}
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			// 詳細表示
			function fncshowdesc(id, div)	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/event2/event_showdesc",
					data: "id=" + id,
					success: function(msg){
						jQuery("#processing").hide();
						jQuery("#" + div).html(msg);
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			// 日付設定
			function fncSetDate()	{
				$yobi = new Array("日","月","火","水","木","金","土")
				$hiduke = new Date(jQuery("#y").val(), jQuery("#m").val() - 1 ,jQuery("#d").val());
				if ($hiduke.getFullYear() == jQuery("#y").val() && ($hiduke.getMonth() + 1) == jQuery("#m").val() && $hiduke.getDate() == jQuery("#d").val())	{
					jQuery("#edit_hiduke").val(jQuery("#y").val()+"-"+jQuery("#m").val()+"-"+jQuery("#d").val());
					jQuery("#yobi").html("(" + $yobi[$hiduke.getDay()] + "曜日)");
				}else{
					jQuery("#edit_hiduke").val("");
					jQuery("#yobi").html("不正な日付です");
				}
			}

			// ＰＲＥ画面表示
			function fncprecheck()	{

				$place = jQuery(\'input[name="edit_place"]:checked\').val();
				$url  = "";
				$url += "http://www.jawhm.or.jp/seminar/check_seminar.php?navigation=1";
				$url += "&month=" + jQuery("#m option:selected").val();
				$url += "&year=" + jQuery("#y option:selected").val();
				$url += "&place_name=" + $place;
				$url += "&checked_countryname=0&checked_know=0#calendar_start";
				window.open($url, "win_pre", "width=1260, height=700, menubar=yes, toolbar=yes, scrollbars=yes");
			}

			// キーワード設定
			function setkeyword(btn)	{
				$obj = jQuery(btn);
				$key = jQuery("#edit_desc2");
				$key.val($key.val() + " " + $obj.val());
			}

		';

		// 検索画面表示
		if ($data_param == 'list')	{
			$body_title[] .= '予約状況リスト';
			$ser_cond = '　　　　<label><input type="checkbox" name="ser_cxl">キャンセル待ち発生中のイベント</label>';
		}else{
			$body_title[] .= 'イベント一括登録（検索）';
			$ser_cond = '';
		}
		$body[] .= '
			<form id="form_event_list">
				<table class="w100">
					<tr>
					    <td style="text-align:right;">日付</td>
						<td>
							<input id="ser_hiduke" name="ser_hiduke" size="16" type="text" value="'.date('Y/m/d').'"/>
							<span>～</span>
							<input id="ser_hiduketo" name="ser_hiduketo" size="16" type="text" />
							
							<label style="float: right; padding-right: 20px; width: 254px; display: inline-block;">セミナー番号 <input id="ser_evtno" name="ser_evtno" size="20" type="text" value="'.$e.'" /></label>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">セミナー区分</td>
						<td>
							<label><input type=checkbox name="free_p1" value="0">無料</label>　
							<label><input type=checkbox name="free_p2" value="1">有料</label>　
							'.$ser_cond.'
							　　　　　　　　
							<label><input type=checkbox name="ser_ongoogle">カレンダー登録済みを含む</label>
							<label><input type=checkbox name="ser_keynone" value="none">キーワード無</label>
						</td>
					</tr>
					<tr>
						<td style="text-align:right; vertical-align: top;">開催地</td>
						<td>
						    <label for="ser_p1"><input type="checkbox" id="ser_p1" name="ser_p1" value="tokyo">東京</label>　
							<label for="ser_p2"><input type="checkbox" id="ser_p2" name="ser_p2" value="osaka">大阪</label>　
							<label for="ser_p3"><input type="checkbox" id="ser_p3" name="ser_p3" value="fukuoka">福岡</label>　
							<label for="ser_p8"><input type="checkbox" id="ser_p8" name="ser_p8" value="nagoya">名古屋</label>　
							<br>
							<label for="ser_p4"><input type="checkbox" id="ser_p4" name="ser_p4" value="sendai">仙台</label>　
							<label for="ser_p7"><input type="checkbox" id="ser_p7" name="ser_p7" value="toyama">富山</label>　
							<label for="ser_p5"><input type="checkbox" id="ser_p5" name="ser_p5" value="okinawa">沖縄</label>　
							<br>
							<label for="ser_p10"><input type="checkbox" id="ser_p10" name="ser_p10" value="online">オンライン</label>　
							<label for="ser_p6"><input type="checkbox" id="ser_p6" name="ser_p6" value="event">その他イベント</label>　
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">キーワード</td>
						<td>
							'.field_text('ser_keyword1', 20, '').'　and　
							'.field_text('ser_keyword2', 20, '').'　and　
							'.field_text('ser_keyword3', 20, '').'
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div style="float: left">
                                <input class="button_go" type="button" value="一括掲載" id="button_go" onclick="fncgo();"">　
                                <input class="button_school" type="button" value="一括掲載（学校）" id="button_school" onclick="fncgoschool();"">　
                                <input type=button class="button_home" value="仮確認" onclick="window.open(\'http://www.jawhm.or.jp/seminar/check_seminar.php\', \'win_pre\', \'width=1260, height=700, menubar=yes, toolbar=yes, scrollbars=yes\');">　
                                <input class="button_csv" type="button" value="CSV" id="sereventcsv" onclick="fncSereventCsv();">
                                <input class="button_csv" type="button" value="仮CSV" id="serkaricsv" onclick="fncSerKariCsv();">
                            </div>
                            <div style="float: right; margin-right: 15px">
                                <input type="hidden" name="ser_param" value="'.$data_param.'">
                                <input class="button_cancel" type="reset" value="clear" onclick="jQuery(\'#res_event_list\').html(\'\');">&nbsp;&nbsp;
                                <input class="button_submit" type="button" value="Search" onclick="fncSereventList();"">
                            </div>							
						</td>
					</tr>
				</table>
			</form>
			<div id="res_event_list" style=""></div>
			';

		if ($e <> '')	{
			$script .= '
				setTimeout("fncSereventList()",1000);
			';
		}

		// 新規登録表示
		$body_title[] .= '新規イベント';
		$body[] .= '
			<input type=button class="button_save" value="　新しいイベントを登録する" onclick="fnceventShow(\'\');">
			<div id="res_event_edit" style=""></div>
		';

		break;
	case "event_show":
		// イベント編集（新規）
		$id = fnc_getpost('id');
		$cur_id = $id;

                // load list template mail
                try {
                    $sql = "SELECT * FROM mailtext WHERE keycd LIKE 'mail_temp' ORDER BY id";
                    $stt = $db->prepare($sql);
                    $stt->execute();
                    while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                        $id_mail_temp = $row['id'];
                        $list_mail_template[$id_mail_temp] = stripslashes($row['text1']);
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }

		if ($id == '')	{
			$title = '<span style="font-size:14pt;font-weight:bold;color:red;">【一括登録】</span>　新しいイベントを登録する';
			$cur_id = '';
			$cur_use = '0';
			$cur_preuse = '0';
			$cur_hiduke = date('Y-m-d');
			$cur_year = date('Y');
			$cur_month = date('m');
			$cur_day = date('d');
			$cur_sttime = '13:00';
			$cur_edtime = '14:00';
			$cur_place = 'tokyo';
			$cur_title1 = '';
			$cur_title2 = '';
			$cur_desc1 = '';
			$cur_desc2 = '';
			$cur_stat = '0';
			$cur_free = '0';

                        // first template created is a default template
                        if ($list_mail_template != NULL){
                            foreach($list_mail_template as $k=>$v){
                                $cur_type = $k;
                                break;
                            }
                        } else {
                            $cur_type = '0';
                        }

			$cur_pax = '0';
			$cur_booking = '0';
			$cur_waitting = '0';
			$cur_new = '0';
			$cur_seminar_name = '';
			$cur_short_description = '';
			$cur_country_code = '';
			$cur_indicated_option = '';
			$cur_broadcasting = 0;
			$cur_group_color = '';
			$cur_ongoogle='';
			$cur_mailinfo='';
			$cnt = 1;
			$cur_beginer = 0;
            $cur_online_type = 0;
            $cur_online_url = '';

			$cur_tantousha_name = '日本ワーキングホリデー協会';// 02-12-2016 tantousha name-ten nguoi quan ly
			$cur_tantousha_mail = '';

		}else{
			$title = '<span style="font-size:14pt;font-weight:bold;color:navy;" id="lbl_title"></span><span style="font-size:14pt;font-weight:bold;color:red;">【一括登録】</span>　イベント情報修正';
			try {
				$stt = $db->prepare('SELECT id, hiduke, year(hiduke) as y, month(hiduke) as m, day(hiduke) as d, date_format(starttime,\'%H:%i\') as sttime, date_format(endtime,\'%H:%i\') as edtime, place, k_use, preuse, k_title1, k_title2, k_desc1, k_desc2, k_stat, free, type, pax, booking, waitting, new, seminar_name, short_description, country_code, indicated_option, broadcasting, group_color, ongoogle, mailinfo, beginer, tantousha_name, tantousha_mail, online_type, online_url FROM event_list WHERE id = "'.$cur_id.'"');
				$stt->execute();
				$cnt = 0;
				while($row = $stt->fetch(PDO::FETCH_ASSOC)){
					$cnt++;
					$cur_id = $row['id'];
					$cur_hiduke = $row['hiduke'];
					$cur_year = $row['y'];
					$cur_month = $row['m'];
					$cur_day = $row['d'];
					$cur_sttime = $row['sttime'];
					$cur_edtime = $row['edtime'];
					$cur_place = $row['place'];
					$cur_use = $row['k_use'];
					$cur_preuse = $row['preuse'];
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
					$cur_seminar_name = $row['seminar_name'];
					$cur_short_description = $row['short_description'];
					$cur_country_code = $row['country_code'];
					$cur_indicated_option = $row['indicated_option'];
					$cur_broadcasting = $row['broadcasting'];
					$cur_group_color = $row['group_color'];
					$cur_ongoogle = $row['ongoogle'];
					$cur_mailinfo = $row['mailinfo'];
                    $cur_beginer = $row['beginer'];
					//TA show tantousha_name
					$cur_tantousha_name = $row['tantousha_name'];
					$cur_tantousha_mail = $row['tantousha_mail'];
					//TA end show tantousha_name
                    $cur_online_type = $row['online_type'];
                    $cur_online_url = $row['online_url'];
				}
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		if ($cur_use == '1')	{
			$cur_use = '○本掲載';
		}else{
			$cur_use = '×未掲載';
		}
		if ($cur_preuse == '1')	{
			$cur_preuse = ' checked ';
		}else{
			$cur_preuse = '';
		}
		if ($cur_new == '1')	{
			$cur_new = ' checked ';
		}else{
			$cur_new = '';
		}
		$arrowedit_ongoogle = '';
		if ($cur_ongoogle == '1')	{
			$cur_ongoogle = ' checked disabled';
			$arrowedit_ongoogle = '<input type="hidden" id="hidden_ongoogle" name="edit_ongoogle" value="on">';
		}else{
			$cur_ongoogle = '';
		}

		$place['tokyo'] = '';
		$place['osaka'] = '';
		$place['nagoya'] = '';
		$place['fukuoka'] = '';
		$place['sendai'] = '';
		$place['okinawa'] = '';
		$place['event'] = '';
		$place['toyama'] = '';
		$place['online'] = '';
		$place[$cur_place] = ' checked ';

		$stat['0'] = '';
		$stat['1'] = '';
		$stat['2'] = '';
		$stat[$cur_stat] = ' checked ';

		$free['0'] = '';
		$free['1'] = '';
		$free[$cur_free] = ' checked ';

                $beginer = ($cur_beginer == 0)?'':' checked ';

		for ($idx=0; $idx<=300; $idx++)	{
			$type[$idx] = '';
		}
		$type[$cur_type] = ' selected ';

		$indicated_option[0] = '';
		$indicated_option[1] = '';
		$indicated_option[2] = '';
		$indicated_option[3] = '';
		$indicated_option[$cur_indicated_option] = ' selected ';

		$broadcasting[0] = '';
		$broadcasting[1] = '';
		$broadcasting[$cur_broadcasting] = ' checked ';

		$country_code['none'] = '';
		$country_code['us'] = '';
		$country_code['au'] = '';
		$country_code['ca'] = '';
		$country_code['de'] = '';
		$country_code['dk'] = '';
		$country_code['fr'] = '';
		$country_code['nz'] = '';
		$country_code['uk'] = '';
		$country_code['wd'] = '';
        $country_code['ire'] = '';
		$country_code[$cur_country_code] = ' selected ';

		$group_color['none'] = '';
		$group_color['#474EE6'] = '';
		$group_color['#E64C48'] = '';
		$group_color['#019240'] = '';
		$group_color['#476EE6'] = '';
		$group_color['#FF612E'] = '';
		$group_color['#FF802F'] = '';
		$group_color['#FB6F31'] = '';
		$group_color['#FF6347'] = '';
		$group_color['#000080'] = '';
		$group_color['#00BFFF'] = '';
		$group_color['#F08080'] = '';
		$group_color['#F4A460'] = '';
		$group_color['#FF1A80'] = '';
		$group_color[$cur_group_color] = ' selected ';

        $online_option[0] = '';
        $online_option[1] = '';
        $online_option[2] = '';
        $online_option[$cur_online_type] = ' checked ';

		$msg = '
			<div id="div_event_edit" style="display:none; margin:10px 20px 10px 20px; font-size:10pt; cursor:default; overflow-y:auto; height: 590px;">
				<div style="margin:0 0 10px 0; font-size:12pt; font-weight:bold;">'.$title.'</dib>
				<form id="form_event_edit">
			<table><tr><td style="vertical-align:top;">
				<table>
					<tr>
						<td class="label2" width="20%" nowrap>掲載</td>
						<td class="infield" width="360" colspan="3">
							[<span id="lbl_status">'.$cur_use.'</span>]
							<input type="checkbox" id="edit_use" name="edit_use" '.$cur_preuse.'>仮掲載　　
							<input type="checkbox" id="edit_new" name="edit_new" '.$cur_new.'>フォローメール不要
							<input type="hidden" id="edit_id" name="edit_id" value="'.$cur_id.'">
						</td>
					</tr>
					<tr>
						<td class="label2" nowrap>日程</td>
						<td class="infield" colspan="3">
							<input class="calendar" id="edit_hiduke" name="edit_hiduke" size="16" type="hidden" value="'.$cur_hiduke.'" />
							<select id="y" name="y" onchange="fncSetDate();">';
		for ($idx=2010; $idx<=2030; $idx++)	{
			$msg .= '<option value="'.$idx.'"';
			if ($idx == $cur_year)	{
				$msg .= ' selected ';
			}
			$msg .= '>'.$idx.'</option>';
		}
		$msg .= '			</select>年
							<select id="m" name="m" onchange="fncSetDate();">';
		for ($idx=1; $idx<=12; $idx++)	{
			$msg .= '<option value="'.$idx.'"';
			if ($idx == $cur_month)	{
				$msg .= ' selected ';
			}
			$msg .= '>'.$idx.'</option>';
		}
		$msg .= '			</select>月
							<select id="d" name="d" onchange="fncSetDate();">';
		for ($idx=1; $idx<=31; $idx++)	{
			$msg .= '<option value="'.$idx.'"';
			if ($idx == $cur_day)	{
				$msg .= ' selected ';
			}
			$msg .= '>'.$idx.'</option>';
		}
		$msg .= '			</select>日
							<span id="yobi"></span>
						</td>
					</tr>
					<tr>
						<td class="label2" nowrap>時間</td>
						<td class="infield" colspan="3">
							<select id="edit_sttime" name="edit_sttime">';
		for ($idx=6; $idx<=23; $idx++)	{
			$data = substr("00".$idx,-2).'';
			for ($idx2=0; $idx2<4; $idx2++)	{
				$data2 = $data.':'.substr("00".($idx2 * 15), -2);
				$sel = '';
				if ($data2 == $cur_sttime)	{
					$sel = ' selected ';
				}
				$msg .= '<option value="'.$data2.'"'.$sel.'>'.$data2.'</option>';
			}
		}
		$msg .= '			</select>&nbsp;&nbsp;～&nbsp;
							<select id="edit_edtime" name="edit_edtime">';
		for ($idx=6; $idx<=23; $idx++)	{
			$data = substr("00".$idx,-2).'';
			for ($idx2=0; $idx2<4; $idx2++)	{
				$data2 = $data.':'.substr("00".($idx2 * 15), -2);
				$sel = '';
				if ($data2 == $cur_edtime)	{
					$sel = ' selected ';
				}
				$msg .= '<option value="'.$data2.'"'.$sel.'>'.$data2.'</option>';
			}
		}
		$msg .= '			</select>
						</td>
					</tr>
					<tr>
						<td class="label2" nowrap>開催地</td>
						<td class="infield" colspan="3">
							<label><input type="radio" name="edit_place" value="tokyo"'.$place['tokyo'].'>東京</label>&nbsp;
							<label><input type="radio" name="edit_place" value="osaka"'.$place['osaka'].'>大阪</label>&nbsp;
							<label><input type="radio" name="edit_place" value="fukuoka"'.$place['fukuoka'].'>福岡</label>&nbsp;
							<label><input type="radio" name="edit_place" value="nagoya"'.$place['nagoya'].'>名古屋</label>&nbsp;
							<br>
							<label><input type="radio" name="edit_place" value="sendai"'.$place['sendai'].'>仙台</label>&nbsp;
							<label><input type="radio" name="edit_place" value="toyama"'.$place['toyama'].'>富山</label>&nbsp;
							<label><input type="radio" name="edit_place" value="okinawa"'.$place['okinawa'].'>沖縄</label>&nbsp;
							<br>
							<label><input type="radio" name="edit_place" value="online"'.$place['online'].'>オンライン</label>&nbsp;
							<label><input type="radio" name="edit_place" value="event"'.$place['event'].'>その他イベント</label>
						</td>
					</tr>
					<tr>
						<td class="label2" nowrap>状態</td>
						<td class="infield" colspan="3">
							<input type=radio name="edit_stat" value="0"'.$stat[0].'>空き　
							<input type=radio name="edit_stat" value="1"'.$stat[1].'>混雑　
							<input type=radio name="edit_stat" value="2"'.$stat[2].'>満席
						</td>
					</tr>
					<tr>
						<td class="label2" nowrap>種別</td>
						<td class="infield" colspan="3">
							<input type=radio name="edit_free" value="0"'.$free[0].'>無料　
							<input type=radio name="edit_free" value="1"'.$free[1].'>有料　　
							' . dropdown_list('edit_type', $cur_type, $list_mail_template, array('empty' => 'メールを送信しない')) . '
						</td>
					</tr>
					<tr>
						<td class="label2" nowrap>規模</td>
						<td class="infield" colspan="3">
							定員：'.field_text('edit_pax', 4, $cur_pax).'　　　
							予約：'.$cur_booking.'　　　
							CXL待ち：'.$cur_waitting.'
						</td>
					</tr>
                                        <tr>
                                                <td class="label2">対象者</td>
                                                <td style="width:141px">
                                                    <label><input type=checkbox name="edit_beginer" ' . $beginer . '>初心者誘導なし</label>
                                                </td>
                                        </tr>
					<tr>
						<td class="label2" nowrap>アイコン</td>
						<td class="infield">
							<select id="edit_indicated_option" name="edit_indicated_option">
								<option value="0" '.$indicated_option[0].'>無し</option>
								<!-- <option value="1" disabled '.$indicated_option[1].'>オススメ（★）</option> -->
								<option value="2" '.$indicated_option[2].'>ＮＥＷ</option>
								<option value="3" '.$indicated_option[3].'>注目セミナー</option>
							</select>
						</td>
						<td class="label2" nowrap>Ustream</td>
						<td class="infield">
							<input type=radio name="edit_broadcasting" value="0"'.$broadcasting[0].'>無し　
							<input type=radio name="edit_broadcasting" value="1"'.$broadcasting[1].'>中継セミナー
						</td>
					</tr>

					<tr>
						<td class="label2" nowrap>国旗表示</td>
						<td class="infield">
							<select id="edit_country_code" name="edit_country_code">
								<option value=""   '.$country_code['none'].'>無し</option>
								<option value="us" '.$country_code['us'].'>アメリカ</option>
								<option value="au" '.$country_code['au'].'>オーストラリア</option>
								<option value="ca" '.$country_code['ca'].'>カナダ</option>
								<option value="de" '.$country_code['de'].'>ドイツ</option>
								<option value="dk" '.$country_code['dk'].'>デンマーク</option>
								<option value="fr" '.$country_code['fr'].'>フランス</option>
								<option value="nz" '.$country_code['nz'].'>ニュージーランド</option>
								<option value="uk" '.$country_code['uk'].'>イギリス</option>
								<option value="wd" '.$country_code['wd'].'>ワールドワイド</option>
								<option value="ire" ' . $country_code['ire'] . '>アイルランド</option>
							</select>
						</td>
						<td class="label2" nowrap>表示色</td>
						<td class="infield">
							<select id="edit_group_color" name="edit_group_color">
								<option value=""  '.$group_color['none'].'>選んでね</option>
								<option value="#474EE6" '.$group_color['#474EE6'].'>オーストラリア学校</option>
								<option value="#E64C48" '.$group_color['#E64C48'].'>カナダ学校</option>
								<option value="#019240" '.$group_color['#019240'].'>ニュージーランド学校</option>
								<option value="#476EE6" '.$group_color['#476EE6'].'>学校セミナー</option>
								<option value="#FF612E" '.$group_color['#FF612E'].'>初心者セミナー</option>
								<option value="#FF802F" '.$group_color['#FF802F'].'>歩き方セミナー</option>
								<option value="#FB6F31" '.$group_color['#FB6F31'].'>学生限定セミナー</option>
								<option value="#FF6347" '.$group_color['#FF6347'].'>懇談セミナー</option>
								<option value="#000080" '.$group_color['#000080'].'>出発前準備セミナー</option>
								<option value="#00BFFF" '.$group_color['#00BFFF'].'>講演会セミナー</option>
								<option value="#FF1A80" '.$group_color['#FF1A80'].'>交流会</option>
								<option value="#F08080" '.$group_color['#F08080'].'>その他１</option>
								<option value="#F4A460" '.$group_color['#F4A460'].'>その他２</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label2" nowrap>CALタイトル</td>
						<td class="infield" colspan="3">'.field_required('edit_seminar_name', 60, $cur_seminar_name).'</td>
					</tr>
					<tr>
						<td class="label2" nowrap>CAL補足</td>
						<td class="infield" colspan="3">'.field_text('edit_short_description', 60, $cur_short_description).'</td>
					</tr>
					<tr>
						<td class="label2" nowrap>メール補足</td>
						<td class="infield" colspan="3">
							<textarea name="edit_mailinfo" cols="50" rows="3" style="font-size:9pt; height: 40px;">'.$cur_mailinfo.'</textarea>
						</td>
					</tr>
				</table>
			</td><td>
				<table>
					<tr>
						<td class="label2" width="20%" nowrap>カレンダー登録</td>
						<td class="infield"><input type="hidden" id="edit_ongoogle" name="edit_ongoogle" '.$cur_ongoogle.'>'.$arrowedit_ongoogle.'仮掲載に登録する</td>
					</tr>
					<tr>
						<td class="label2" nowrap>タイトル</td>
						<td class="infield">'.field_required('edit_title1', 100, $cur_title1).'</td>
					</tr>
					<tr>
						<td class="label2" nowrap>内部タイトル</td>
						<td class="infield">'.field_text('edit_title2', 100, $cur_title2).'</td>
					</tr>
					<tr>
						<td class="label2" nowrap>説明文</td>
						<td class="infield">
							<textarea name="edit_desc1" cols="80" rows="13" style="font-size:9pt; height: 176px;">'.$cur_desc1.'</textarea>
						</td>
					</tr>
					<tr>
						<td class="label2" nowrap>キーワード</td>
						<td class="infield">
							<textarea name="edit_desc2" id="edit_desc2" cols="80" rows="1" style="font-size:9pt; height: 22px;">'.$cur_desc2.'</textarea>
							<div style="font-size:9pt;">
								<input type=button class="sml_button" value="初心者" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="プランニング" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="渡航計画相談会" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="学校比較" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="看護師" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="休学" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="住まい仕事" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="学習法" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="セカンド" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="資格" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="女性限定" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="休職" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="体験談" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="学校セミナー" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="学校懇談" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="注目のセミナー" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="学生限定" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="都市比較" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="会員限定" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="出発前" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="パーティー" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="国比較" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="おすすめ" onclick="setkeyword(this);">
								<input type=button class="sml_button" value="就活サポート" onclick="setkeyword(this);">
							</div>
						</td>
						</tr>
						<!--ta add  row new-->
						<tr>
							<td class="label2" nowrap>担当者</td>
							<td class="infield">
								<input id="edit_tantousha_name" type="text" name="edit_tantousha_name" size="100" value="' . $cur_tantousha_name . '">
							</td>
						</tr>
						<tr>
							 <td class="label2" nowrap>担当メアド</td>
							 <td class="infield">
									<input id="edit_tantousha_mail" type="text" name="edit_tantousha_mail" size="100" value="' . $cur_tantousha_mail . '">
							</td>
						</tr>
						<tr>
						 <td class="label2" nowrap>配信設定</td>
						 <td class="infield">
						        <input id="edit_online_type_0" type="radio" name="edit_online_type" ' . $online_option[0] . ' value="0"><label for="edit_online_type_0">None</label>
						        <input id="edit_online_type_1" type="radio" name="edit_online_type" ' . $online_option[1] . ' value="1"><label for="edit_online_type_1">YouTube</label>
						        <input id="edit_online_type_2" type="radio" name="edit_online_type" ' . $online_option[2] . ' value="2"><label for="edit_online_type_2">Zoom</label>
						        <br>
						        <label for="edit_online_url">URL：</label>
						        <input id="edit_online_url" type="text" name="edit_online_url" size="58" value="'. $cur_online_url . '">
					    </td>
					</tr>
						<!--ta add  row new-->
				</table>
			</td></tr>
								<tr>
								<td colspan="2" style="text-align:center;">';
								if ($id <> '' && $cur_ongoogle == '')	{
									$msg .= '<input type=button class="button_del" value="削除" id="eventdel" onclick="fncdel(\'form_event_edit\');">　　　　';
								}
								$msg .= '
							<input type=button class="button_home" value="仮確認" onclick="fncprecheck();">
							<input type=button class="button_list" value="アイコン" onclick="window.open(\'http://www.jawhm.or.jp/mailsystem/icon.php\', \'win_icon\', \'width=500, height=600, menubar=no, toolbar=no, scrollbars=yes\');">
							<input type=button class="button_save" value="画像２" onclick="window.open(\'http://www.jawhm.or.jp/files2/\', \'win_icon\', \'width=1200, height=720, menubar=no, toolbar=no, scrollbars=yes\');">　　　　
						';
								if ($id <> '')	{
									$msg .= '<input type=button class="button_copy" value="コピー" id="eventcopy" onclick="fnccopy(\'form_event_edit\');">　　';
								}
								$msg .= '　
								<input type=button class="button_cancel" value="やめる" onclick="fncHide();">　
								<input type=button class="button_submit" value="登録" id="eventsubmit" onclick="fnceventPost(\'form_event_edit\');">

								</td>
								</tr>
								</table>
				</form>
			</div>
		';
		if ($cnt == 0)	{
			$msg = '
				<div id="div_event_edit" style="display:none; margin:10px 20px 10px 20px; font-size:10pt; cursor:default;">
					<div style="margin:20px 0 30px 0; font-size:12pt; font-weight:bold;">該当イベントがありません</dib>
					<center>
						<form id="form_event_edit">
								<input type=button class="button_cancel" value="やめる" onclick="fncHide();">　　
						</form>
					</center>
				</div>
			';
		}

		$body[] .= $msg;
		break;

	case "event_edit":
		// イベント情報修正

		$edit_id = fnc_getpost('edit_id');
		$edit_use = fnc_getpost('edit_use');
		$edit_hiduke = fnc_getpost('edit_hiduke');
		$edit_sttime = fnc_getpost('edit_sttime');
		$edit_edtime = fnc_getpost('edit_edtime');
		$edit_place = fnc_getpost('edit_place');
		$edit_title1 = fnc_getpost('edit_title1');
		$edit_title2 = fnc_getpost('edit_title2');
		$edit_desc1 = fnc_getpost('edit_desc1');
		$edit_desc2 = fnc_getpost('edit_desc2');
		$edit_stat = fnc_getpost('edit_stat');
		$edit_free = fnc_getpost('edit_free');
		$edit_type = fnc_getpost('edit_type');
		$edit_pax = fnc_getpost('edit_pax');
		$edit_new = fnc_getpost('edit_new');

		$edit_seminar_name = fnc_getpost('edit_seminar_name');
		$edit_short_description = fnc_getpost('edit_short_description');
		$edit_country_code = fnc_getpost('edit_country_code');
		$edit_indicated_option = fnc_getpost('edit_indicated_option');
		$edit_broadcasting = fnc_getpost('edit_broadcasting');
		$edit_group_color = fnc_getpost('edit_group_color');
		$edit_ongoogle = fnc_getpost('edit_ongoogle');
		$edit_mailinfo = fnc_getpost('edit_mailinfo');

		$edit_beginer = fnc_getpost('edit_beginer');
		$edit_beginer = ($edit_beginer == 'on')?1:0;

		//TA post person charge of
		$edit_tantousha_name = fnc_getpost('edit_tantousha_name');
		$edit_tantousha_mail = fnc_getpost('edit_tantousha_mail');
		//TA end post person charge of
        $edit_online_type = fnc_getpost('edit_online_type');
        $edit_online_url = fnc_getpost('edit_online_url');

		if ($edit_use == 'on')	{
			$edit_use = '1';
		}else{
			$edit_use = '0';
		}
		if ($edit_new == 'on')	{
			$edit_new = '1';
		}else{
			$edit_new = '0';
		}
		if ($edit_ongoogle == 'on')	{
			$edit_ongoogle = '1';
		}else{
			$edit_ongoogle = '0';
		}

		try {
			if ($edit_id == '')	{
				// 新規登録
				$sql  = 'INSERT INTO event_list (';
				$sql .= ' hiduke, starttime, endtime, place, preuse, k_title1, k_title2, k_desc1, k_desc2, k_stat, free, type, pax, new, seminar_name, short_description, country_code, indicated_option, broadcasting, group_color, ongoogle, mailinfo, beginer, tantousha_name, tantousha_mail, online_type, online_url ';
				$sql .= ') VALUES (';
				$sql .= ' :hiduke, :sttime, :edtime, :place, :preuse, :k_title1, :k_title2, :k_desc1, :k_desc2, :k_stat, :free, :type, :pax, :new, :seminar_name, :short_description, :country_code, :indicated_option, :broadcasting, :group_color, :ongoogle, :mailinfo, :beginer, :tantousha_name, :tantousha_mail, :online_type, :online_url ';
				$sql .= ')';
				$stt2 = $db->prepare($sql);
				$stt2->bindValue(':hiduke'	, $edit_hiduke);
				$stt2->bindValue(':sttime'	, $edit_hiduke." ".$edit_sttime);
				$stt2->bindValue(':edtime'	, $edit_hiduke." ".$edit_edtime);
				$stt2->bindValue(':place'	, $edit_place);
				//$stt2->bindValue(':k_use'	, $edit_use);
				$stt2->bindValue(':preuse'	, $edit_use);
				$stt2->bindValue(':k_title1', $edit_title1);
				$stt2->bindValue(':k_title2', $edit_title2);
				$stt2->bindValue(':k_desc1'	, $edit_desc1);
				$stt2->bindValue(':k_desc2'	, $edit_desc2);
				$stt2->bindValue(':k_stat'	, $edit_stat);
				$stt2->bindValue(':free'	, $edit_free);
				$stt2->bindValue(':type'	, $edit_type);
				$stt2->bindValue(':pax'		, $edit_pax);
				$stt2->bindValue(':new'		, $edit_new);
				$stt2->bindValue(':seminar_name'		, $edit_seminar_name);
				$stt2->bindValue(':short_description'	, $edit_short_description);
				$stt2->bindValue(':country_code'		, $edit_country_code);
				$stt2->bindValue(':indicated_option'	, $edit_indicated_option);
				$stt2->bindValue(':broadcasting'		, $edit_broadcasting);
				$stt2->bindValue(':group_color'			, $edit_group_color);
				$stt2->bindValue(':ongoogle'			, $edit_ongoogle);
				$stt2->bindValue(':mailinfo'			, $edit_mailinfo);
				$stt2->bindValue(':beginer'			, $edit_beginer);
				$stt2->bindValue(':tantousha_name'			, $edit_tantousha_name);
				$stt2->bindValue(':tantousha_mail'			, $edit_tantousha_mail);
                $stt2->bindValue(':online_type', $edit_online_type);
                $stt2->bindValue(':online_url', $edit_online_url);

				$stt2->execute();
				$arr = array(
					array(
					"result" => "OK",
					"msg"  => "登録しました"
					)
				);
				// イベントＩＤを取得
				$stt = $db->prepare('SELECT max(id) as maxid FROM event_list');
				$stt->execute();
				$idx = 0;
				while($row = $stt->fetch(PDO::FETCH_ASSOC)){
					$idx++;
					$edit_id = $row['maxid'];
				}
			}else{
				// 既存更新
				$sql  = 'UPDATE event_list SET ';
				$sql .= '  hiduke = "'.$edit_hiduke.'"';
				$sql .= ', starttime = "'.$edit_hiduke.' '.$edit_sttime.'"';
				$sql .= ', endtime = "'.$edit_hiduke.' '.$edit_edtime.'"';
				$sql .= ', place = "'.$edit_place.'"';
		//		$sql .= ', k_use = "'.$edit_use.'"';
				$sql .= ', preuse = "'.$edit_use.'"';
				$sql .= ', k_title1 = :k_title1 ';
				$sql .= ', k_title2 = :k_title2 ';
				$sql .= ', k_desc1 = :k_desc1 ';
				$sql .= ', k_desc2 = :k_desc2 ';
				$sql .= ', k_stat = "'.$edit_stat.'"';
				$sql .= ', free = "'.$edit_free.'"';
				$sql .= ', type = "'.$edit_type.'"';
				$sql .= ', pax = "'.$edit_pax.'"';
				$sql .= ', new = "'.$edit_new.'"';

				$sql .= ', seminar_name = :seminar_name';
				$sql .= ', short_description = :short_description';
				$sql .= ', country_code = :country_code';
				$sql .= ', indicated_option = :indicated_option';
				$sql .= ', broadcasting = :broadcasting';
				$sql .= ', group_color = :group_color';
				$sql .= ', ongoogle = :ongoogle';
				$sql .= ', mailinfo = :mailinfo';
                $sql .= ', beginer = :beginer';
				//TA save person charge of
				$sql .= ', tantousha_name = "'.$edit_tantousha_name.'"';
				$sql .= ', tantousha_mail = "'.$edit_tantousha_mail.'"';
				//TA save person charge of
                $sql .= ', online_type = :online_type';
                $sql .= ', online_url = :online_url';

				$sql .= ' WHERE id = "'.$edit_id.'"';
				$stt = $db->prepare($sql);
				$stt->bindValue(':k_title1', $edit_title1);
				$stt->bindValue(':k_title2', $edit_title2);
				$stt->bindValue(':k_desc1' , $edit_desc1);
				$stt->bindValue(':k_desc2' , $edit_desc2);
				$stt->bindValue(':seminar_name'		, $edit_seminar_name);
				$stt->bindValue(':short_description', $edit_short_description);
				$stt->bindValue(':country_code'		, $edit_country_code);
				$stt->bindValue(':indicated_option'	, $edit_indicated_option);
				$stt->bindValue(':broadcasting'		, $edit_broadcasting);
				$stt->bindValue(':group_color'		, $edit_group_color);
				$stt->bindValue(':ongoogle'		, $edit_ongoogle);
				$stt->bindValue(':mailinfo'		, $edit_mailinfo);
                $stt->bindValue(':beginer'		, $edit_beginer);
                $stt->bindValue(':online_type', $edit_online_type);
                $stt->bindValue(':online_url', $edit_online_url);
				$stt->execute();
				$arr = array(
					array(
					"result" => "OK",
					"msg"  => "更新しました"
					)
				);
			}
		} catch (PDOException $e) {
			$arr = array(
				array(
				"result" => "NG",
				"msg"  => $e->getMessage()
				)
			);
		}

		// カレンダー変更
		if ($edit_ongoogle == '1')	{
			GC_Edit($edit_id);
		}else{
			//仮掲載カレンダー
			GC_Edit($edit_id,"karikeisai");
		}



		$msg = json_encode($arr);
		$body[] .= $msg;

		break;

	case "event_del":
		// イベント削除

		$edit_id = fnc_getpost('edit_id');

		try {
			if ($edit_id == '')	{
				// 何もしない
			}else{
				// 仮掲載カレンダーからの削除
				$sql = 'SELECT gcode , ongoogle FROM event_list WHERE id = "' . $edit_id . '"';
				$stt = $db->prepare($sql);
				$stt->execute();
				while($row = $stt->fetch(PDO::FETCH_ASSOC)){
					$gcode = $row["gcode"];
					$ongoogle = $row["ongoogle"];
				}
				if($gcode <> '' && $ongoogle == 0){
					try{
						$client = GC_Init("karikeisai");
						GC_deleteEvent($client,$gcode,"karikeisai");
					}catch(Exception $e){
					}
				}

				// 削除
				$sql  = 'DELETE FROM event_list ';
				$sql .= ' WHERE id = "'.$edit_id.'"';
				$stt = $db->prepare($sql);
				$stt->execute();
				$arr = array(
					array(
					"result" => "OK",
					"msg"  => "削除しました"
					)
				);
			}
		} catch (PDOException $e) {
			$arr = array(
				array(
				"result" => "NG",
				"msg"  => $e->getMessage()
				)
			);
		}

		// カレンダー変更
		if ($edit_ongoogle == '1')	{
				GC_Edit($edit_id);
		}


		$msg = json_encode($arr);
		$body[] .= $msg;

		break;

	case "event_ser":
		// イベント検索

		$ser_hiduke = fnc_getpost('ser_hiduke');
		$ser_hiduketo = fnc_getpost('ser_hiduketo');
		$free_p1 = fnc_getpost('free_p1');
		$free_p2 = fnc_getpost('free_p2');
		$ser_p1 = fnc_getpost('ser_p1');
		$ser_p2 = fnc_getpost('ser_p2');
		$ser_p3 = fnc_getpost('ser_p3');
		$ser_p4 = fnc_getpost('ser_p4');
		$ser_p5 = fnc_getpost('ser_p5');
		$ser_p6 = fnc_getpost('ser_p6');
		$ser_p7 = fnc_getpost('ser_p7');
		$ser_p8 = fnc_getpost('ser_p8');
		$ser_p10 = fnc_getpost('ser_p10');
		$ser_keyword1 = fnc_getpost('ser_keyword1');
		$ser_keyword2 = fnc_getpost('ser_keyword2');
		$ser_keyword3 = fnc_getpost('ser_keyword3');
		$ser_evtno = fnc_getpost('ser_evtno');
		$ser_param = fnc_getpost('ser_param');
		$ser_cxl = fnc_getpost('ser_cxl');
		$ser_ongoogle = fnc_getpost('ser_ongoogle');
		$ser_keynone = fnc_getpost('ser_keynone');

		$body_title[] .= 'イベント検索結果';
		$msg = '';
		$cond = ' 1=1 ';

		$cond_msg = '[検索条件] ';
		if ($ser_hiduke <> '')	{
			$cond .= ' and hiduke >= "'.$ser_hiduke.'"';
		}
		if ($ser_hiduketo <> '')	{
			$cond .= ' and hiduke <= "'.$ser_hiduketo.'"';
		}
		if ($free_p1 <> '' || $free_p2 <> '')	{
			$cond .= ' and ( 1=0 ';
			if ($free_p1 <> '')	{	$cond .= ' or free ="0" ';	}
			if ($free_p2 <> '')	{	$cond .= ' or free ="1" ';	}
			$cond .= ' ) ';
		}
		if ($ser_p1 <> '' || $ser_p2 <> '' || $ser_p3 <> '' || $ser_p4 <> '' || $ser_p5 <> '' || $ser_p6 <> '' || $ser_p7 <> '' || $ser_p8 <> '' || $ser_p10 <> '')	{
			$cond .= ' and ( 1=0 ';
			if ($ser_p1 <> '')	{	$cond .= ' or place ="'.$ser_p1.'" ';	}
			if ($ser_p2 <> '')	{	$cond .= ' or place ="'.$ser_p2.'" ';	}
			if ($ser_p3 <> '')	{	$cond .= ' or place ="'.$ser_p3.'" ';	}
			if ($ser_p4 <> '')	{	$cond .= ' or place ="'.$ser_p4.'" ';	}
			if ($ser_p5 <> '')	{	$cond .= ' or place ="'.$ser_p5.'" ';	}
			if ($ser_p6 <> '')	{	$cond .= ' or place ="'.$ser_p6.'" ';	}
			if ($ser_p7 <> '')	{	$cond .= ' or place ="'.$ser_p7.'" ';	}
			if ($ser_p8 <> '')	{	$cond .= ' or place ="'.$ser_p8.'" ';	}
			if ($ser_p10 <> '')	{	$cond .= ' or place ="'.$ser_p10.'" ';	}
			$cond .= ' ) ';
		}
		if ($ser_keyword1 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword1.'%" ) ';
		}
		if ($ser_keyword2 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword2.'%" ) ';
		}
		if ($ser_keyword3 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword3.'%" ) ';
		}
		if ($ser_keynone <> '')	{
			$cond .= ' and k_desc2 = "" ';
		}
		if ($ser_evtno <> '')	{
			$cond .= ' and id = "'.$ser_evtno.'" ';
		}
		if ($ser_cxl <> '')	{
			$cond .= ' and waitting > 0 ';
		}
		if ($ser_ongoogle == 'on')	{
			// 全てを検索する
		}else{
			// カレンダー未登録のみ
			$cond .= ' and ongoogle = 0 ';
		}

		// イベント検索
		$msg .= '<table class="listdata2 w100">';
        $msg .= '<thead>';
		$msg .= '<tr>';
		$msg .= '<th width="40"><label class="td-cb-lb text-center"><input id="select-all" type="checkbox" onclick="fncCheckAll()"></label></th>';
		$msg .= '<th width="80">編集</th>';
		$msg .= '<th width="60">日付<br/>開始</th>';
		$msg .= '<th width="75">開催地<br/>状態</th>';
		$msg .= '<th width="">タイトル</th>';
		$msg .= '</tr>';
        $msg .= '</thead>';
        $msg .= '</tbody>';

		try {
			$stt = $db->prepare('SELECT id, hiduke, date_format(starttime,\'%H:%i\') as sttime, date_format(endtime,\'%H:%i\') as edtime, place, k_use, preuse, k_title1, k_title2, k_desc1, k_desc2, k_stat FROM event_list WHERE '.$cond.' ORDER BY hiduke, starttime, place');
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				if(!in_array($row["id"],get_hiding_seminar())){
					$idx++;
					$cur_id = $row['id'];
					$cur_hiduke = $row['hiduke'];
					$cur_sttime = $row['sttime'];
					$cur_edtime = $row['edtime'];
					$cur_place = $row['place'];
					$cur_title = $row['k_title1'];
					$cur_use = $row['k_use'];
					$cur_preuse = $row['preuse'];
					$cur_stat = $row['k_stat'];
					$cur_weekday = nihon_youbi($cur_hiduke);
					if ($idx % 2 == 0)	{
						$msg .= '<tr>';
					}else{
						$msg .= '<tr class="odd">';
					}
                    $msg .= '<td><label class="td-cb-lb text-center"><input type="checkbox" id="check_'.$cur_id.'" class="cb_item" value="' . $cur_id . '"></label></td>';
					$msg .= '<td><input type=button class="button_save" value=" 修正" onclick="fnceventShow(\''.$cur_id.'\');"><br/>';
			//		$msg .= '<input type=button class="button_rev" value=" 予約" onclick="fncyoyakuShow(\''.$cur_id.'\');"></td>';
					$msg .= '</td>';
					$msg .= '<td>'.$cur_hiduke.'('.$cur_weekday.')<br/>'.$cur_sttime.'-'.$cur_edtime.'</td>';
					$msg .= '<td>';
					switch ($cur_place)	{
						case 'tokyo':
							$msg .= '[東京]';
							break;
						case 'osaka':
							$msg .= '[大阪]';
							break;
						case 'nagoya':
							$msg .= '[名古屋]';
							break;
						case 'fukuoka':
							$msg .= '[福岡]';
							break;
						case 'sendai':
							$msg .= '[仙台]';
							break;
						case 'toyama':
							$msg .= '[富山]';
							break;
						case 'okinawa':
							$msg .= '[沖縄]';
							break;
						case 'event':
							$msg .= '[イベント]';
							break;
                        case 'online':
                            $msg .= '[WEB]';
                            break;
					}
					$msg .= '<br/>';
					if ($cur_use == '1')	{
						$msg .= '掲';
					}else{
						$msg .= '未';
					}
					$msg .= '/';
					if ($cur_preuse == '1')	{
						$msg .= '仮';
					}else{
						$msg .= '未';
					}
					switch ($cur_stat)	{
						case '0':
							$msg .= '(空)';
							break;
						case '1':
							$msg .= '(混)';
							break;
						case '2':
							$msg .= '<b>(満席)</b>';
							break;
					}
					$msg .= '</td>';
					$msg .= '<td><a id="list'.$cur_id.'" href="#'.$cur_id.'" onclick="fncshowdesc(\''.$cur_id.'\',\'div_'.$cur_id.'\');">'.$cur_title.'</a><div id="div_'.$cur_id.'"></div></td>';
					$msg .= '</tr>';
				}
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
        $msg .= '</tbody>';
		$msg .= '</table>';

		$body[] .= '[該当件数] '.$idx.'件'.$msg;

		break;

	case "event_showdesc":
		// 詳細表示

		$cur_id = fnc_getpost('id');

		try {
			$stt = $db->prepare('SELECT id, hiduke, date_format(starttime,\'%H:%i\') as sttime, date_format(endtime,\'%H:%i\') as edtime, place, k_use, k_title1, k_title2, k_desc1, k_desc2, k_stat, free, type, pax, booking, waitting FROM event_list WHERE id = '.$cur_id.' ORDER BY id');
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$idx++;
				$cur_id = $row['id'];
				$cur_sttime = $row['sttime'];
				$cur_edtime = $row['edtime'];
				$cur_title1 = $row['k_title1'];
				$cur_title2 = $row['k_title2'];
				$cur_desc1 = $row['k_desc1'];
				$cur_desc2 = $row['k_desc2'];
				$cur_free = $row['free'];
				$cur_type = $row['type'];
				$cur_pax = $row['pax'];
				$cur_booking = $row['booking'];
				$cur_waitting = $row['waitting'];
				$cur_hiduke = $row['hiduke'];
				$cur_place = $row['place'];

				$msg  = '<table border="1">';
				$msg .= '<tr><td colspan="3">'.$cur_title2.'</td></tr>';
				$msg .= '<tr><td colspan="3">'.nl2br($cur_desc1).'</td></tr>';
				$msg .= '<tr><td colspan="3">'.nl2br($cur_desc2).'</td></tr>';
				$msg .= '<tr><td>';
				if ($cur_free == '0')	{
					$msg .= '無料';
				}else{
					$msg .= '有料';
				}
                $msg .= '</td>';
                $msg .= '<td>';
                $msg .= '</td>';
				$msg .= '<td>&nbsp;予約件数 ： '.$cur_booking.'&nbsp;('.$cur_waitting.') / '.$cur_pax;
				$msg .= '　　<input type="button" class="button_list" value="　一覧" onclick="window.location.href=\''.$url_base.'main/yoyaku?seminarid='.$cur_id.'\'">';
				$msg .= '　<input type="button" class="button_save" value="CSV" onclick="fncYoyakuListCsv(\''.$cur_hiduke.'\',\''.$cur_place.'\');">';
				$msg .= '</td>';
				$msg .= '</tr>';
				$msg .= '<tr><td colspan="3">&nbsp;時刻 ： '.$cur_sttime.'　～　'.$cur_edtime.'</td></tr>';
				$msg .= '<tr><td colspan="3"><input type="text" size="100" value="https://www.jawhm.or.jp/s/go/'.$cur_id.'"></td></tr>';
				$msg .= '</table>';
				$msg .= '';
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		$body[] .= $msg;

		break;

	case "event_csv":
		// イベントＣＳＶ出力

		$type = fnc_getpost('type');

		$ser_hiduke = fnc_getpost('ser_hiduke');
		$ser_hiduketo = fnc_getpost('ser_hiduketo');
		$free_p1 = fnc_getpost('free_p1');
		$free_p2 = fnc_getpost('free_p2');
		$ser_p1 = fnc_getpost('ser_p1');
		$ser_p2 = fnc_getpost('ser_p2');
		$ser_p3 = fnc_getpost('ser_p3');
		$ser_p4 = fnc_getpost('ser_p4');
		$ser_p5 = fnc_getpost('ser_p5');
		$ser_p6 = fnc_getpost('ser_p6');
		$ser_p7 = fnc_getpost('ser_p7');
		$ser_p8 = fnc_getpost('ser_p8');
		$ser_p10 = fnc_getpost('ser_p10');
		$ser_keyword1 = fnc_getpost('ser_keyword1');
		$ser_keyword2 = fnc_getpost('ser_keyword2');
		$ser_keyword3 = fnc_getpost('ser_keyword3');
		$ser_evtno = fnc_getpost('ser_evtno');
		$ser_param = fnc_getpost('ser_param');
		$ser_cxl = fnc_getpost('ser_cxl');

		$body_title[] .= 'イベント検索結果';
		$msg = '';
		$cond = ' 1=1 ';

		$cond_msg = '[検索条件] ';
		if ($ser_hiduke <> '')	{
			$cond .= ' and hiduke >= "'.$ser_hiduke.'"';
		}
		if ($ser_hiduketo <> '')	{
			$cond .= ' and hiduke <= "'.$ser_hiduketo.'"';
		}
		if ($free_p1 <> '' || $free_p2 <> '')	{
			$cond .= ' and ( 1=0 ';
			if ($free_p1 <> '')	{	$cond .= ' or free ="0" ';	}
			if ($free_p2 <> '')	{	$cond .= ' or free ="1" ';	}
			$cond .= ' ) ';
		}
		if ($ser_p1 <> '' || $ser_p2 <> '' || $ser_p3 <> '' || $ser_p4 <> '' || $ser_p5 <> '' || $ser_p6 <> '' || $ser_p7 <> '' || $ser_p8 <> '' || $ser_p10 <> '')	{
			$cond .= ' and ( 1=0 ';
			if ($ser_p1 <> '')	{	$cond .= ' or place ="'.$ser_p1.'" ';	}
			if ($ser_p2 <> '')	{	$cond .= ' or place ="'.$ser_p2.'" ';	}
			if ($ser_p3 <> '')	{	$cond .= ' or place ="'.$ser_p3.'" ';	}
			if ($ser_p4 <> '')	{	$cond .= ' or place ="'.$ser_p4.'" ';	}
			if ($ser_p5 <> '')	{	$cond .= ' or place ="'.$ser_p5.'" ';	}
			if ($ser_p6 <> '')	{	$cond .= ' or place ="'.$ser_p6.'" ';	}
			if ($ser_p7 <> '')	{	$cond .= ' or place ="'.$ser_p7.'" ';	}
			if ($ser_p8 <> '')	{	$cond .= ' or place ="'.$ser_p8.'" ';	}
			if ($ser_p10 <> '')	{	$cond .= ' or place ="'.$ser_p10.'" ';	}
			$cond .= ' ) ';
		}
		if ($ser_keyword1 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword1.'%" ) ';
		}
		if ($ser_keyword2 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword2.'%" ) ';
		}
		if ($ser_keyword3 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword3.'%" ) ';
		}
		if ($ser_evtno <> '')	{
			$cond .= ' and id = "'.$ser_evtno.'" ';
		}
		if ($ser_cxl <> '')	{
			$cond .= ' and waitting > 0 ';
		}

		// イベント検索
		$msg  = '';
		$msg .= '"登録"';
		$msg .= ',"セミナー番号"';
		$msg .= ',"掲載"';
		$msg .= ',"日付"';
		$msg .= ',"開始時刻"';
		$msg .= ',"終了時刻"';
		$msg .= ',"開催地"';
		$msg .= ',"状態"';
		$msg .= ',"種別１"';
		$msg .= ',"種別２"';
		$msg .= ',"定員"';
		$msg .= ',"アイコン"';
		$msg .= ',"中継"';
		$msg .= ',"国旗"';
		$msg .= ',"表示色"';
		$msg .= ',"ＣＡＬタイトル"';
		$msg .= ',"ＣＡＬ補足"';
		$msg .= ',"タイトル"';
		$msg .= ',"内部タイトル"';
		$msg .= ',"説明文"';
		$msg .= ',"キーワード"';
		$msg .= chr(13).chr(10);

		try {
			$sql  = '';
			$sql .= 'SELECT';
			$sql .= '  id';
			$sql .= ' ,hiduke';
			$sql .= ' ,date_format(starttime,\'%H:%i\') as sttime';
			$sql .= ' ,date_format(endtime,\'%H:%i\') as edtime';
			$sql .= ' ,place';
			$sql .= ' ,k_use, preuse';
			$sql .= ' ,k_title1';
			$sql .= ' ,k_title2';
			$sql .= ' ,k_desc1';
			$sql .= ' ,k_desc2';
			$sql .= ' ,k_stat';
			$sql .= ' ,free';
			$sql .= ' ,type';
			$sql .= ' ,pax';
			$sql .= ' ,seminar_name';
			$sql .= ' ,short_description';
			$sql .= ' ,country_code';
			$sql .= ' ,indicated_option';
			$sql .= ' ,broadcasting';
			$sql .= ' ,group_color';
			$sql .= ' FROM event_list WHERE '.$cond.' ORDER BY hiduke, starttime, place';
			$stt = $db->prepare($sql);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$idx++;

				$cur_id = $row['id'];
		//		$cur_use = $row['k_use'];
				$cur_use = $row['preuse'];
				$cur_hiduke = $row['hiduke'];
				$cur_sttime = $row['sttime'];
				$cur_edtime = $row['edtime'];
				$cur_place = $row['place'];
				$cur_stat = $row['k_stat'];
				$cur_free = $row['free'];
				$cur_type = $row['type'];
				$cur_pax = $row['pax'];
				$cur_indicated_option = $row['indicated_option'];
				$cur_broadcasting = $row['broadcasting'];
				$cur_country_code = $row['country_code'];
				$cur_group_color = $row['group_color'];
				$cur_seminar_name = $row['seminar_name'];
				$cur_short_description = $row['short_description'];
				$cur_title1 = $row['k_title1'];
				$cur_title2 = $row['k_title2'];
				$cur_desc1 = $row['k_desc1'];
				$cur_desc2 = $row['k_desc2'];

				$msg .= '"既存"';
				$msg .= ',"'.$cur_id.'"';
				$msg .= ',"'.$cur_use.'"';
				$msg .= ',"'.$cur_hiduke.'"';
				$msg .= ',"'.$cur_sttime.'"';
				$msg .= ',"'.$cur_edtime.'"';
				$msg .= ',"'.$cur_place.'"';
				$msg .= ',"'.$cur_stat.'"';
				$msg .= ',"'.$cur_free.'"';
				$msg .= ',"'.$cur_type.'"';
				$msg .= ',"'.$cur_pax.'"';
				$msg .= ',"'.$cur_indicated_option.'"';
				$msg .= ',"'.$cur_broadcasting.'"';
				$msg .= ',"'.$cur_country_code.'"';
				$msg .= ',"'.$cur_group_color.'"';
				$msg .= ',"'.$cur_seminar_name.'"';
				$msg .= ',"'.$cur_short_description.'"';
				$msg .= ',"'.$cur_title1.'"';
				$msg .= ',"'.$cur_title2.'"';
				$msg .= ',"'.$cur_desc1.'"';
				$msg .= ',"'.$cur_desc2.'"';

				$msg .= chr(13).chr(10);
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}

		if ($type == 'out')	{
			$body[] = $msg;
		}else{
			$arr = array(
				array(
				"result" => "OK",
				"msg"  => "該当件数は ".$idx."件 です。"
				)
			);
			$msg = json_encode($arr);
			$body[] .= $msg;
		}

		break;
	case "kari_csv":
		// 仮イベントＣＳＶ出力

		$type = fnc_getpost('type');

		$ser_hiduke = fnc_getpost('ser_hiduke');
		$ser_hiduketo = fnc_getpost('ser_hiduketo');
		$free_p1 = fnc_getpost('free_p1');
		$free_p2 = fnc_getpost('free_p2');
		$ser_p1 = fnc_getpost('ser_p1');
		$ser_p2 = fnc_getpost('ser_p2');
		$ser_p3 = fnc_getpost('ser_p3');
		$ser_p4 = fnc_getpost('ser_p4');
		$ser_p5 = fnc_getpost('ser_p5');
		$ser_p6 = fnc_getpost('ser_p6');
		$ser_p7 = fnc_getpost('ser_p7');
		$ser_p8 = fnc_getpost('ser_p8');
		$ser_p10 = fnc_getpost('ser_p10');
		$ser_keyword1 = fnc_getpost('ser_keyword1');
		$ser_keyword2 = fnc_getpost('ser_keyword2');
		$ser_keyword3 = fnc_getpost('ser_keyword3');
		$ser_evtno = fnc_getpost('ser_evtno');
		$ser_param = fnc_getpost('ser_param');
		$ser_cxl = fnc_getpost('ser_cxl');

		$body_title[] .= 'イベント検索結果';
		$msg = '';
		$cond = ' 1=1 and ongoogle = 0 ';

		$cond_msg = '[検索条件] ';
		if ($ser_hiduke <> '')	{
			$cond .= ' and hiduke >= "'.$ser_hiduke.'"';
		}
		if ($ser_hiduketo <> '')	{
			$cond .= ' and hiduke <= "'.$ser_hiduketo.'"';
		}
		if ($free_p1 <> '' || $free_p2 <> '')	{
			$cond .= ' and ( 1=0 ';
			if ($free_p1 <> '')	{	$cond .= ' or free ="0" ';	}
			if ($free_p2 <> '')	{	$cond .= ' or free ="1" ';	}
			$cond .= ' ) ';
		}
		if ($ser_p1 <> '' || $ser_p2 <> '' || $ser_p3 <> '' || $ser_p4 <> '' || $ser_p5 <> '' || $ser_p6 <> '' || $ser_p7 <> '' || $ser_p8 <> '' || $ser_p10 <> '')	{
			$cond .= ' and ( 1=0 ';
			if ($ser_p1 <> '')	{	$cond .= ' or place ="'.$ser_p1.'" ';	}
			if ($ser_p2 <> '')	{	$cond .= ' or place ="'.$ser_p2.'" ';	}
			if ($ser_p3 <> '')	{	$cond .= ' or place ="'.$ser_p3.'" ';	}
			if ($ser_p4 <> '')	{	$cond .= ' or place ="'.$ser_p4.'" ';	}
			if ($ser_p5 <> '')	{	$cond .= ' or place ="'.$ser_p5.'" ';	}
			if ($ser_p6 <> '')	{	$cond .= ' or place ="'.$ser_p6.'" ';	}
			if ($ser_p7 <> '')	{	$cond .= ' or place ="'.$ser_p7.'" ';	}
			if ($ser_p8 <> '')	{	$cond .= ' or place ="'.$ser_p8.'" ';	}
			if ($ser_p10 <> '')	{	$cond .= ' or place ="'.$ser_p10.'" ';	}
			$cond .= ' ) ';
		}
		if ($ser_keyword1 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword1.'%" ) ';
		}
		if ($ser_keyword2 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword2.'%" ) ';
		}
		if ($ser_keyword3 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' k_title1 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_title2 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_desc1 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' k_desc2 like "%'.$ser_keyword3.'%" ) ';
		}
		if ($ser_evtno <> '')	{
			$cond .= ' and id = "'.$ser_evtno.'" ';
		}
		if ($ser_cxl <> '')	{
			$cond .= ' and waitting > 0 ';
		}

		// イベント検索
		$msg  = '';
		$msg .= '"セミナー番号"';
		$msg .= ',"日付"';
		$msg .= ',"開始時刻"';
		$msg .= ',"終了時刻"';
		$msg .= ',"タイトル"';
		$msg .= ',"開催地"';
		$msg .= chr(13).chr(10);

		try {
			$sql  = '';
			$sql .= 'SELECT';
			$sql .= ' id';
			$sql .= ' ,hiduke';
			$sql .= ' ,date_format(starttime,\'%H:%i\') as sttime';
			$sql .= ' ,date_format(endtime,\'%H:%i\') as edtime';
			$sql .= ' ,place';
			$sql .= ' ,k_title1';
			$sql .= ' ,k_desc2';
			$sql .= ' FROM event_list WHERE '.$cond.' ORDER BY k_title1,hiduke, starttime, place';
			$stt = $db->prepare($sql);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$idx++;

				$cur_id = $row['id'];
				$cur_hiduke = $row['hiduke'];
				$cur_sttime = $row['sttime'];
				$cur_edtime = $row['edtime'];
				$cur_title1 = $row['k_title1'];
				$cur_place = $row['place'];

				$msg .= '"'.$cur_id.'"';
				$msg .= ',"'.$cur_hiduke.'"';
				$msg .= ',"'.$cur_sttime.'"';
				$msg .= ',"'.$cur_edtime.'"';
				$msg .= ',"'.$cur_title1.'"';
				$msg .= ',"'.$cur_place.'"';
				$msg .= chr(13).chr(10);
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}

		if ($type == 'out')	{
			$body[] = $msg;
		}else{
			$arr = array(
				array(
				"result" => "OK",
				"msg"  => "該当件数は ".$idx."件 です。",
				// "body" => $msg
				)
			);
			$msg = json_encode($arr);
			$body[] = $msg;
		}

		break;

	case "event_go":
		// 一括掲載
		$edit_ids = fnc_getpost('id');

		$arr_id = explode(',' , $edit_ids);

		$err_msg = '';
		$tbl_msg = '';

		try {
			// 一回クリア
			$stt = $db->prepare('UPDATE event_list SET goforuse = 0 WHERE goforuse = 1');
			$stt->execute();
			// 該当イベント設定
			$no  = 0;
			$idx = 0;
			while ($idx<count($arr_id))	{
				$stt = $db->prepare('UPDATE event_list SET goforuse = 1 WHERE id = "'.$arr_id[$idx].'"');
				$stt->execute();
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}

		$msg  = '';
		$msg .= '
				<div id="div_event_edit" style="display:none; margin:10px 20px 10px 20px; padding: 10px 10px 10px 10px; font-size:10pt; cursor:default; background-color:green; color:white;">
					<div style="font-size:14pt; font-weight:bold;">【　一括掲載　】</div>
					<div style="width:480px; height:60px; text-align:center; font-size:14pt; padding:20px 0 20px 0;">
						あと、<span id="lbl_goforuse">'.$idx.'</span>件のイベント掲載を処理します。<br/>
						このまましばらくお待ちください。<br/>
					</div>
					<div style="text-align:right; width:400px;">
						<input type=button class="button_cancel" value="　中断　" onclick="fnccancel();">
					</div>
				</div>
			</div>
		';

		$body[] .= $msg;

		break;

	case "event_goforuse":
		// 一括掲載実行

		try {
			$sql  = '';
			$sql .= 'SELECT';
			$sql .= '  id, gcode ';
			$sql .= ' FROM event_list WHERE goforuse = 1 ORDER BY hiduke DESC, starttime DESC, place DESC';
			$stt = $db->prepare($sql);
			$stt->execute();
			$cnt = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$cnt++;
				$cur_id = $row['id'];
				$cur_gcode = $row['gcode'];
			}

			// 掲載実行
			$stt = $db->prepare('UPDATE event_list SET k_use = preuse, ongoogle = 1, goforuse = 0 WHERE id = "'.$cur_id.'"');
			$stt->execute();

			//仮掲載を消す
			$client = GC_Init("karikeisai");
			GC_deleteEvent($client,$cur_gcode,"karikeisai");

			// カレンダー掲載
			GC_Edit($cur_id);

			if ($cnt == 1)	{
				$arr = array(
					array(
					"result" => "END",
					"cnt" => $cnt,
					"msg"  => "一括掲載が完了しました。"
					)
				);
			}else{
				$arr = array(
					array(
					"result" => "OK",
					"cnt" => $cnt,
					"msg"  => "残処理があります。"
					)
				);
			}

		} catch (PDOException $e) {
			$arr = array(
				array(
				"result" => "NG",
				"msg"  => $e->getMessage()
				)
			);
		}

		$msg = json_encode($arr);
		$body[] .= $msg;

		break;


	case "event_goforschool":
		// 一括掲載実行（学校掲載）

		try {
			$sql  = '';
			$sql .= 'SELECT';
			$sql .= '  id, gcode ';
			$sql .= ' FROM event_list WHERE goforuse = 1 ORDER BY hiduke DESC, starttime DESC, place DESC';
			$stt = $db->prepare($sql);
			$stt->execute();
			$cnt = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$cnt++;
				$cur_id = $row['id'];
				$cur_gcode = $row['gcode'];
			}

			// 掲載実行
			$stt = $db->prepare('UPDATE event_list SET schoolap = 1, ongoogle = 1, goforuse = 0 WHERE id = "'.$cur_id.'"');
			$stt->execute();

			//仮掲載を消す
			$client = GC_Init("karikeisai");
			GC_deleteEvent($client,$cur_gcode,"karikeisai");

			// カレンダー掲載
			GC_Edit($cur_id);

			if ($cnt == 1)	{
				$arr = array(
					array(
					"result" => "END",
					"cnt" => $cnt,
					"msg"  => "一括掲載（学校）が完了しました。"
					)
				);
			}else{
				$arr = array(
					array(
					"result" => "OK",
					"cnt" => $cnt,
					"msg"  => "残処理があります。"
					)
				);
			}

		} catch (PDOException $e) {
			$arr = array(
				array(
				"result" => "NG",
				"msg"  => $e->getMessage()
				)
			);
		}

		$msg = json_encode($arr);
		$body[] .= $msg;

		break;


}

?>