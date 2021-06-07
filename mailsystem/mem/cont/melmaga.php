<?php

// 一般メニュー読み込み
require 'php/fnc_menu.php';


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
			// カレンダー表示
			InputCalendar.createOnLoaded(\'ser_hiduke\', {lang:\'ja\'});
			InputCalendar.createOnLoaded(\'ser_hiduketo\', {lang:\'ja\'});

			// イベント検索
			function fncSermaillistList()	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/melmaga/maillist_ser",
					data: jQuery("#form_maillist_list").serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						jQuery("#res_maillist").html(msg);
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
					url: "'.$url_base.'data/melmaga/maillist_showdesc",
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

			function fncSermaillistCsv()	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'csv/melmaga/maillist_csv",
					data: jQuery("#form_maillist_list").serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						if (res[0].result == \'OK\')	{
							if (confirm(res[0].msg + "出力しますか？"))	{
								window.open(\''.$url_base.'csv/melmaga/maillist_csv/?type=out&\' + jQuery("#form_maillist_list").serialize(), \'_blank\', \'width=200,height=200\');
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

		// 検索画面表示
		$body_title[] .= 'メルマガ管理';
		$ser_cond = '';
		$ser_cond2 = '
					<td style="text-align:right;">キーワード無</td>
					<td>
						<input type=checkbox name="ser_keynone" value="none">
					</td>
				';
		$body[] .= '
			<form id="form_maillist_list">
				<table>
					<tr>
						<td style="text-align:right;">更新日</td>
						<td>
							<input id="ser_hiduke" name="ser_hiduke" size="16" type="text" value="'.date('Y/m/d').'"/>
							　～　
							<input id="ser_hiduketo" name="ser_hiduketo" size="16" type="text" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">状態</td>
						<td>
							<input type=checkbox name="vsend_0" value="0">停止　
							<input type=checkbox name="vsend_1" value="1">配信　
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">キーワード</td>
						<td colspan="2">
							'.field_text('ser_keyword1', 20, '').'　and　
							'.field_text('ser_keyword2', 20, '').'　and　
							'.field_text('ser_keyword3', 20, '').'
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input class="button_csv" type="button" value="CSV" id="sermaillistcsv" onclick="fncSermaillistCsv();"">
						</td>
						<td colspan="2" style="text-align:right;">
								<input type="hidden" name="ser_param" value="'.$data_param.'">
								<input class="button_cancel" type="reset" value="clear" onclick="jQuery(\'#res_maillist\').html(\'\');">&nbsp;&nbsp;
								<input class="button_submit" type="button" value="Search" onclick="fncSermaillistList();"">
						</td>
					</tr>
				</table>
			</form>
			<div id="res_maillist" style=""></div>
			';

		if ($e <> '')	{
			$script .= '
				setTimeout("fncSermaillistList()",1000);
			';
		}

		break;

	case "maillist_ser":
		// イベント検索

		$ser_hiduke = fnc_getpost('ser_hiduke');
		$ser_hiduketo = fnc_getpost('ser_hiduketo');
		$vsend_0 = fnc_getpost('vsend_0');
		$vsend_1 = fnc_getpost('vsend_1');
		$ser_keyword1 = fnc_getpost('ser_keyword1');
		$ser_keyword2 = fnc_getpost('ser_keyword2');
		$ser_keyword3 = fnc_getpost('ser_keyword3');

		$body_title[] .= 'イベント検索結果';
		$msg = '';
		$cond = ' 1=1 ';

		$cond_msg = '[検索条件] ';
		if ($ser_hiduke <> '')	{
			$cond .= ' and udate >= "'.$ser_hiduke.'"';
		}
		if ($ser_hiduketo <> '')	{
			$cond .= ' and udate <= "'.$ser_hiduketo.'"';
		}
		if ($vsend_0 <> '' || $vsend_1 <> '')	{
			$cond .= ' and ( 1=0 ';
			if ($vsend_0 <> '')	{	$cond .= ' or vsend ="0" ';	}
			if ($vsend_1 <> '')	{	$cond .= ' or vsend ="1" ';	}
			$cond .= ' ) ';
		}
		if ($ser_keyword1 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' vmail like "%'.$ser_keyword1.'%" or ';
			$cond .= ' vname1 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' vname2 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' riyu like "%'.$ser_keyword1.'%" ) ';
		}
		if ($ser_keyword2 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' vmail like "%'.$ser_keyword2.'%" or ';
			$cond .= ' vname1 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' vname2 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' riyu like "%'.$ser_keyword2.'%" ) ';
		}
		if ($ser_keyword3 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' vmail like "%'.$ser_keyword3.'%" or ';
			$cond .= ' vname1 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' vname2 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' riyu like "%'.$ser_keyword3.'%" ) ';
		}

		// イベント検索
		$msg .= '<table class="listdata">';
		$msg .= '<tr>';
		$msg .= '<th>状態</th>';
		$msg .= '<th>経路</th>';
		$msg .= '<th width="350">メアド</th>';
		$msg .= '<th width="100">名前</th>';
		$msg .= '<th width="">登録日</th>';
		$msg .= '<th width="">更新日</th>';
		$msg .= '</tr>';

		try {
			$stt = $db->prepare('SELECT vtype, vmail, vname1, vname2, cdate, udate, vsend, vcheck FROM maillist WHERE '.$cond.' ORDER BY vmail, vtype, cdate');
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$idx++;
				$cur_vtype = $row['vtype'];
				$cur_vmail = $row['vmail'];
				$cur_vname1 = $row['vname1'];
				$cur_cdate = $row['cdate'];
				$cur_udate = $row['udate'];
				$cur_vsend = $row['vsend'];
				$cur_vcheck = $row['vcheck'];

				if ($idx % 2 == 0)	{
					$msg .= '<tr>';
				}else{
					$msg .= '<tr class="odd">';
				}
				$msg .= '<td>';
				switch ($cur_vsend)	{
					case '0':
						$msg .= '■停止';
						break;
					case '1':
						$msg .= '□配信';
						break;
				}
				$msg .= '</td>';

				$msg .= '<td>'.$cur_vtype.'</td>';
				$msg .= '<td><a id="list'.$cur_vcheck.'" href="#" onclick="fncshowdesc(\''.$cur_vmail.'\',\'div_'.$cur_vcheck.'\');">'.$cur_vmail.'</a><div id="div_'.$cur_vcheck.'"></div></td>';
				$msg .= '<td>'.$cur_vname1.'</td>';
				$msg .= '<td>'.$cur_cdate.'</td>';
				$msg .= '<td>'.$cur_udate.'</td>';
				$msg .= '</tr>';
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		$msg .= '</table>';

		$body[] .= '[該当件数] '.$idx.'件'.$msg;

		break;

	case "maillist_showdesc":
		// 詳細表示

		$cur_id = fnc_getpost('id');

		try {
			$stt = $db->prepare('SELECT vtype, vmail, vname1, vname2, cdate, udate, vsend, vcheck, riyu FROM maillist WHERE vmail = "'.$cur_id.'" and vsend = 0 ORDER BY vmail, vtype, cdate');
			$stt->execute();
			$idx = 0;
			$msg  = '<table border="1">';
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$idx++;
				$cur_vtype = $row['vtype'];
				$cur_vmail = $row['vmail'];
				$cur_vname1 = $row['vname1'];
				$cur_cdate = $row['cdate'];
				$cur_udate = $row['udate'];
				$cur_vsend = $row['vsend'];
				$cur_vcheck = $row['vcheck'];
				$cur_riyu = $row['riyu'];
				$msg .= '<tr><td>'.$cur_vtype.'</td><td>'.$cur_riyu.'</td><td>'.$cur_udate.'</td></tr>';
			}
			$msg .= '</table>';
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		$body[] .= $msg;

		break;

	case "maillist_csv":
		// ＣＳＶ出力

		$type = fnc_getpost('type');

		$ser_hiduke = fnc_getpost('ser_hiduke');
		$ser_hiduketo = fnc_getpost('ser_hiduketo');
		$vsend_0 = fnc_getpost('vsend_0');
		$vsend_1 = fnc_getpost('vsend_1');
		$ser_keyword1 = fnc_getpost('ser_keyword1');
		$ser_keyword2 = fnc_getpost('ser_keyword2');
		$ser_keyword3 = fnc_getpost('ser_keyword3');

		$body_title[] .= 'イベント検索結果';
		$msg = '';
		$cond = ' 1=1 ';

		$cond_msg = '[検索条件] ';
		if ($ser_hiduke <> '')	{
			$cond .= ' and udate >= "'.$ser_hiduke.'"';
		}
		if ($ser_hiduketo <> '')	{
			$cond .= ' and udate <= "'.$ser_hiduketo.'"';
		}
		if ($vsend_0 <> '' || $vsend_1 <> '')	{
			$cond .= ' and ( 1=0 ';
			if ($vsend_0 <> '')	{	$cond .= ' or vsend ="0" ';	}
			if ($vsend_1 <> '')	{	$cond .= ' or vsend ="1" ';	}
			$cond .= ' ) ';
		}
		if ($ser_keyword1 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' vmail like "%'.$ser_keyword1.'%" or ';
			$cond .= ' vname1 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' vname2 like "%'.$ser_keyword1.'%" or ';
			$cond .= ' riyu like "%'.$ser_keyword1.'%" ) ';
		}
		if ($ser_keyword2 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' vmail like "%'.$ser_keyword2.'%" or ';
			$cond .= ' vname1 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' vname2 like "%'.$ser_keyword2.'%" or ';
			$cond .= ' riyu like "%'.$ser_keyword2.'%" ) ';
		}
		if ($ser_keyword3 <> '')	{
			$cond .= ' and ( ';
			$cond .= ' vmail like "%'.$ser_keyword3.'%" or ';
			$cond .= ' vname1 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' vname2 like "%'.$ser_keyword3.'%" or ';
			$cond .= ' riyu like "%'.$ser_keyword3.'%" ) ';
		}

		// 検索
		$msg  = '';
		$msg .= '"経路"';
		$msg .= ',"メアド"';
		$msg .= ',"名前"';
		$msg .= ',"ＩＤ"';
		$msg .= ',"登録日"';
		$msg .= ',"更新日"';
		$msg .= ',"状態"';
		$msg .= ',"お客様番号"';
		$msg .= ',"理由"';
		$msg .= chr(13).chr(10);

		try {
			$sql  = '';
			$sql .= 'SELECT';
			$sql .= '  *';
			$sql .= ' FROM maillist WHERE '.$cond.' ORDER BY vmail, vtype, cdate';
			$stt = $db->prepare($sql);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$idx++;

				$cur_vtype = $row['vtype'];
				$cur_vmail = $row['vmail'];
				$cur_vname1 = $row['vname1'];
				$cur_vname2 = $row['vname2'];
				$cur_cdate = $row['cdate'];
				$cur_udate = $row['udate'];
				$cur_vsend = $row['vsend'];
				$cur_vcheck = $row['vcheck'];
				$cur_vid = $row['vid'];
				$cur_riyu = $row['riyu'];

				$msg .= ''.$cur_vtype.'';
				$msg .= ',"'.$cur_vmail.'"';
				$msg .= ',"'.$cur_vname1.'"';
				$msg .= ',"'.$cur_vname2.'"';
				$msg .= ',"'.$cur_cdate.'"';
				$msg .= ',"'.$cur_udate.'"';
				if ($cur_vsend == '1')	{
					$msg .= ',"配信"';
				}else{
					$msg .= ',"停止"';
				}
				$msg .= ',"'.$cur_vid.'"';
				$msg .= ',"'.$cur_riyu.'"';

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


}


?>