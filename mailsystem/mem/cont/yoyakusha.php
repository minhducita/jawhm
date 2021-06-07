<?php

// 一般メニュー読み込み
require 'php/fnc_menu.php';


if (count($param) > 2) {
	$data_param = $param[2];
} else {
	$data_param = 'main';
}

switch ($data_param) {
	case "main":
	case "list":
		// イベント管理
		$e = fnc_getpost('e');

		// イベント操作系ＪＳ
		$script .= '
			// カレンダー表示
			InputCalendar.createOnLoaded(\'ser_hiduke\', {lang:\'ja\'});
			InputCalendar.createOnLoaded(\'ser_hiduketo\', {lang:\'ja\'});

			// イベント検索
			function fncSereventList()	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "' . $url_base . 'data/yoyakusha/search_event",
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
			
            function fncCheckAll(event) {
                if(jQuery("#select-all").prop("checked")) {
                    jQuery(".cb_item:checkbox").prop("checked", true);
                } else {
                    jQuery(".cb_item:checkbox").prop("checked", false);
                }
            }
            
            function OpenWindowWithPost(url, windowoption, name, params)
            {
                var form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", url);
                form.setAttribute("target", name);
                for (var i in params)
                {
                    if (params.hasOwnProperty(i))
                    {
                         var input = document.createElement("input");
                         input.type = "hidden";
                         input.name = i;
                         input.value = params[i];
                         form.appendChild(input);
                    }
                }
                document.body.appendChild(form);
                
                window.open("", name, windowoption);
                form.submit();
                document.body.removeChild(form);
            }
            
            function objectifyForm(formArray) {//serialize data function
                var returnArray = {};
                for (var i = 0; i < formArray.length; i++){
                    returnArray[formArray[i][\'name\']] = formArray[i][\'value\'];
                }
                return returnArray;
            }
            	
			function fncExportCsv(id_selected = "")	{
				jQuery("#processing").show();
				var ids_selected = [];
				if(id_selected != "") {
				     ids_selected.push(id_selected);
				} else {
				    jQuery("#res_event_list .cb_item:checkbox:checked").each(function() {
                        ids_selected.push(this.value);
				    });
				}
				var data = jQuery("#form_event_list").serializeArray();
				data.push({ "name": "ids_selected", "value": ids_selected });
				jQuery.ajax({
					type: "POST",
					url: "' . $url_base . 'csv/yoyakusha/export_csv",
					data: data,
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						if (res[0].result == "OK")	{
							if (confirm(res[0].msg + "出力しますか？"))	{
							    var relativeUrl = " '. $url_base . 'csv/yoyakusha/export_csv?type=out' . '";
							    var param = objectifyForm(data);
							    OpenWindowWithPost(relativeUrl, "location=yes, width=400, height=200", "newWindow", param);
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
		';

        $body_title[] .= '予約者検索';
		$body[] .= '
			<form id="form_event_list">
				<table class="w100">
					<tr>
						<td style="text-align:right; width: 60px">日付</td>
						<td>
							<input id="ser_hiduke" name="ser_hiduke" size="16" type="text" value="' . date('Y/m/d') . '"/>
							<span>～</span>
							<input id="ser_hiduketo" name="ser_hiduketo" size="16" type="text" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right; vertical-align: top;">開催地</td>
						<td>
							<label><input type="checkbox" id="ser_p1" name="ser_p1" value="tokyo">東京</label>　
							<label><input type="checkbox" id="ser_p2" name="ser_p2" value="osaka">大阪</label>　
							<label><input type="checkbox" id="ser_p3" name="ser_p3" value="fukuoka">福岡</label>　
							<label><input type="checkbox" id="ser_p8" name="ser_p8" value="nagoya">名古屋</label>　
							<br>
							<label><input type="checkbox" id="ser_p4" name="ser_p4" value="sendai">仙台</label>　
							<label><input type="checkbox" id="ser_p7" name="ser_p7" value="toyama">富山</label>　
							<label><input type="checkbox" id="ser_p5" name="ser_p5" value="okinawa">沖縄</label>　
							<br>
                            <label><input type="checkbox" id="ser_p10" name="ser_p10" value="online">オンライン</label>　
                            <label><input type="checkbox" id="ser_p6" name="ser_p6" value="event">その他イベント</label>　
						</td>
					</tr>
					<tr>
						<td style="text-align: right">
							<input class="button_csv" type="button" value="CSV" id="sereventcsv" onclick="fncExportCsv();">
						</td>
						<td style="text-align:right; padding-right: 20px;">
								<input type="hidden" name="ser_param" value="' . $data_param . '">
								<input class="button_cancel" type="reset" value="Clear" onclick="jQuery(\'#res_event_list\').html(\'\');">&nbsp;&nbsp;
								<input class="button_submit" type="button" value="Search" onclick="fncSereventList();"">
						</td>
					</tr>
				</table>
			</form>
			<div id="res_event_list" style=""></div>
			';

		if ($e <> '') {
			$script .= '
				setTimeout("fncSereventList()",1000);
			';
		}
		break;
    case "search_event":
        // イベント検索
        $ser_hiduke = fnc_getpost('ser_hiduke');
        $ser_hiduketo = fnc_getpost('ser_hiduketo');
        $ser_p1 = fnc_getpost('ser_p1');
        $ser_p2 = fnc_getpost('ser_p2');
        $ser_p3 = fnc_getpost('ser_p3');
        $ser_p4 = fnc_getpost('ser_p4');
        $ser_p5 = fnc_getpost('ser_p5');
        $ser_p6 = fnc_getpost('ser_p6');
        $ser_p7 = fnc_getpost('ser_p7');
        $ser_p8 = fnc_getpost('ser_p8');
        $ser_p10 = fnc_getpost('ser_p10');

        $body_title[] .= '予約者検索結果';
        $msg = '';
        $cond = ' 1=1 ';

        $cond_msg = '[検索条件] ';
        if ($ser_hiduke <> '') {
            $cond .= ' and hiduke >= "' . $ser_hiduke . '"';
        }
        if ($ser_hiduketo <> '') {
            $cond .= ' and hiduke <= "' . $ser_hiduketo . '"';
        }

        if ($ser_p1 <> '' || $ser_p2 <> '' || $ser_p3 <> '' || $ser_p4 <> '' || $ser_p5 <> '' || $ser_p6 <> '' || $ser_p7 <> '' || $ser_p8 <> '' || $ser_p10 <> '') {
            $cond .= ' and ( 1=0 ';
            if ($ser_p1 <> '') {
                $cond .= ' or place ="' . $ser_p1 . '" ';
            }
            if ($ser_p2 <> '') {
                $cond .= ' or place ="' . $ser_p2 . '" ';
            }
            if ($ser_p3 <> '') {
                $cond .= ' or place ="' . $ser_p3 . '" ';
            }
            if ($ser_p4 <> '') {
                $cond .= ' or place ="' . $ser_p4 . '" ';
            }
            if ($ser_p5 <> '') {
                $cond .= ' or place ="' . $ser_p5 . '" ';
            }
            if ($ser_p6 <> '') {
                $cond .= ' or place ="' . $ser_p6 . '" ';
            }
            if ($ser_p7 <> '') {
                $cond .= ' or place ="' . $ser_p7 . '" ';
            }
            if ($ser_p8 <> '') {
                $cond .= ' or place ="' . $ser_p8 . '" ';
            }
            if ($ser_p10 <> '') {
                $cond .= ' or place ="' . $ser_p10 . '" ';
            }
            $cond .= ' ) ';
        }

		// イベント検索
		$msg .= '<div style="overflow-y: scroll; max-height: calc(100vh - 255px)">';
		$msg .= '<table class="listdata w100 table-head-fixed">';
		$msg .= '<thead>';
		$msg .= '<tr>';
		$msg .= '<th width="40"><label class="td-cb-lb text-center"><input id="select-all" type="checkbox" onclick="fncCheckAll(this)"></label></th>';
		$msg .= '<th width="85">日付</th>';
		$msg .= '<th style="width: 65px">開催地</th>';
		$msg .= '<th width="">タイトル</th>';
		$msg .= '<th width="40">予約数</th>';
		$msg .= '<th width="40">保存</th>';
		$msg .= '</tr>';
        $msg .= '</thead>';
        $msg .= '</tbody>';

		try {
			$sql = 'SELECT event_list.id, event_list.hiduke, date_format(event_list.starttime,\'%H:%i\') as sttime, 
                           date_format(event_list.endtime,\'%H:%i\') as edtime, event_list.place, event_list.k_title1, 
                           COUNT(event_list.id) as count_entry 
                    FROM `event_list` 
                    LEFT JOIN entrylist 
                      ON event_list.id = entrylist.seminarid 
                    WHERE ' . $cond . ' AND entrylist.stat = 1 
                    GROUP BY event_list.id
                    ORDER BY hiduke, starttime, place';
            $stt = $db->prepare($sql);
			$stt->execute();
			$idx = 0;
			while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
				$idx++;
				$cur_id = $row['id'];
				$cur_hiduke = $row['hiduke'];
				$cur_sttime = $row['sttime'];
				$cur_edtime = $row['edtime'];
				$cur_place = $row['place'];
				$cur_title = $row['k_title1'];
				$cur_count_entry = $row['count_entry'];

				if ($idx % 2 == 0) {
					$msg .= '<tr>';
				} else {
					$msg .= '<tr class="odd">';
				}
                $msg .= '<td><label class="td-cb-lb text-center"><input type="checkbox" class="cb_item" value="' . $cur_id . '"></label></td>';
				$msg .= '<td class="text-center">' . $cur_hiduke . '<br/>' . $cur_sttime . '-' . $cur_edtime . '</td>';
				$msg .= '<td class="text-center">';
				switch ($cur_place) {
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
				$msg .= '</td>';
                $msg .= '<td>' . $cur_title . '</td>';
                $msg .= '<td class="text-center">' . $cur_count_entry . '</td>';
                $msg .= '<td class="text-center"><input class="button_csv" type="button" value="CSV" onclick="fncExportCsv('. $cur_id .');"></td>';
				$msg .= '</tr>';
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		$msg .= '</tbody>';
		$msg .= '</table>';
		$msg .= '</div>';

        $body[] .= '[該当件数] ' . $idx . '件' . $msg;

        break;
    case "export_csv":
        // イベントＣＳＶ出力
        $type = fnc_getpost('type');

        $ser_hiduke = fnc_getpost('ser_hiduke');
        $ser_hiduketo = fnc_getpost('ser_hiduketo');
        $ser_p1 = fnc_getpost('ser_p1');
        $ser_p2 = fnc_getpost('ser_p2');
        $ser_p3 = fnc_getpost('ser_p3');
        $ser_p4 = fnc_getpost('ser_p4');
        $ser_p5 = fnc_getpost('ser_p5');
        $ser_p6 = fnc_getpost('ser_p6');
        $ser_p7 = fnc_getpost('ser_p7');
        $ser_p8 = fnc_getpost('ser_p8');
        $ser_p10 = fnc_getpost('ser_p10');
        $ids_selected = fnc_getpost('ids_selected');

        $body_title[] .= 'イベント検索結果';
        $msg = '';
        $cond = ' 1=1 ';

        $cond_msg = '[検索条件] ';
        if($ids_selected) {
            $cond .= 'and event_list.id IN (' . $ids_selected . ')';
        }

        if ($ser_hiduke <> '') {
            $cond .= ' and hiduke >= "' . $ser_hiduke . '"';
        }
        if ($ser_hiduketo <> '') {
            $cond .= ' and hiduke <= "' . $ser_hiduketo . '"';
        }
        if ($ser_p1 <> '' || $ser_p2 <> '' || $ser_p3 <> '' || $ser_p4 <> '' || $ser_p5 <> '' || $ser_p6 <> '' || $ser_p7 <> '' || $ser_p8 <> '' || $ser_p10 <> '') {
            $cond .= ' and ( 1=0 ';
            if ($ser_p1 <> '') {
                $cond .= ' or place ="' . $ser_p1 . '" ';
            }
            if ($ser_p2 <> '') {
                $cond .= ' or place ="' . $ser_p2 . '" ';
            }
            if ($ser_p3 <> '') {
                $cond .= ' or place ="' . $ser_p3 . '" ';
            }
            if ($ser_p4 <> '') {
                $cond .= ' or place ="' . $ser_p4 . '" ';
            }
            if ($ser_p5 <> '') {
                $cond .= ' or place ="' . $ser_p5 . '" ';
            }
            if ($ser_p6 <> '') {
                $cond .= ' or place ="' . $ser_p6 . '" ';
            }
            if ($ser_p7 <> '') {
                $cond .= ' or place ="' . $ser_p7 . '" ';
            }
            if ($ser_p8 <> '') {
                $cond .= ' or place ="' . $ser_p8 . '" ';
            }
            if ($ser_p10 <> '') {
                $cond .= ' or place ="' . $ser_p10 . '" ';
            }
            $cond .= ' ) ';
        }

        //Export CSV when type = "out"
        if ($type == 'out') {
            $msg = '';
            $msg .= '"NO"';
            $msg .= ',"日付"';
            $msg .= ',"開始時刻"';
            $msg .= ',"開催地"';
            $msg .= ',"タイトル"';
            $msg .= ',"名前"';
            $msg .= ',"フリガナ"';
            $msg .= ',"メール"';
            $msg .= chr(13) . chr(10);

            try {
                $sql1 = 'SELECT entrylist.customid FROM `event_list` 
                     LEFT JOIN entrylist on event_list.id = entrylist.seminarid
                     WHERE ' . $cond . ' ORDER BY hiduke, starttime, place';
                $stt1 = $db->prepare($sql1);
                $stt1->execute();
                $arr_cusid = "'" . implode("','", $stt1->fetchAll(PDO::FETCH_COLUMN, 0)) . "'";

                $sql2 = "SELECT crmid, furigana FROM memlist 
                     WHERE crmid IN (" . $arr_cusid . ")";
                $stt2 = $db_mem->prepare($sql2);
                $stt2->execute();
                $arr_cusid_furi = $stt2->fetchAll(PDO::FETCH_KEY_PAIR);

                $sql = 'SELECT event_list.id, event_list.hiduke, date_format(event_list.starttime,\'%H:%i\') as sttime,
                           event_list.place, event_list.k_title1, entrylist.namae, entrylist.furigana, entrylist.email,
                           entrylist.customid
                    FROM `event_list` 
                    LEFT JOIN entrylist on event_list.id = entrylist.seminarid 
                    WHERE ' . $cond . ' AND entrylist.stat = 1 ORDER BY hiduke, starttime, place';
                $stt = $db->prepare($sql);
                $stt->execute();
                $idx = 0;
                $arr_cur_id = array();
                while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                    $idx++;
                    $cur_id = $row['id'];
                    $arr_cur_id[] = $cur_id;
                    $cur_hiduke = $row['hiduke'];
                    $cur_sttime = $row['sttime'];
                    $cur_place = $row['place'];
                    $cur_title = $row['k_title1'];
                    $cur_name = $row['namae'];
                    $cur_furigana = isset($arr_cusid_furi[$row['customid']]) ? $arr_cusid_furi[$row['customid']] : $row['furigana'];
                    $cur_email = $row['email'];

                    $msg .= '"' . $idx . '"';
                    $msg .= ',"' . $cur_hiduke . '"';
                    $msg .= ',"' . $cur_sttime . '"';
                    $msg .= ',"' . $cur_place . '"';
                    $msg .= ',"' . $cur_title . '"';
                    $msg .= ',"' . $cur_name . '"';
                    $msg .= ',"' . $cur_furigana . '"';
                    $msg .= ',"' . $cur_email . '"';

                    $msg .= chr(13) . chr(10);
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }

            $body[] = $msg;
        } else {
            //count selected
            $sql = "SELECT COUNT(event_list.id) FROM `event_list` WHERE " . $cond;
            $stt = $db->prepare($sql);
            $stt->execute();
            $count_selected = $stt->fetchColumn();

            $arr = array(
                array(
                    "result" => "OK",
                    "msg"    => "該当件数は " . $count_selected . "件 です。"
                )
            );
            $msg = json_encode($arr);
            $body[] .= $msg;
        }

        break;
}


?>
