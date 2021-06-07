<?php
ini_set( 'display_errors', 0 );

//一般メニュー読み込み
require 'php/fnc_menu.php';

//data取得
if (count($param) > 2) {
	$data_param = $param[2];
}else{
	$data_param = 'main';
}

function fnc_post_array($param) {
    $postdata = @$_POST[$param];
    if (empty($postdata)){
    	$postdata = array();
    }
    return $postdata;
}

switch ($data_param) {

case 'main' :

case 'show' :

	//javascript
	$script = '
	function fncShowEdit(type,id,mode)	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/school/"+type,
					data: "id=" + id +"&mode=" + mode,
					success: function(msg){
						jQuery("#processing").hide();
						jQuery("#div_"+type+"_edit").html("");
						jQuery("#div_"+type+"_edit").html(msg);
						fncShow(\'div_\'+type+\'_edit\', 1140, 600);
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			function fncPostForm(type,formname)	{
				var edit_name = jQuery("input[name=edit_name]");
				var edit_nickname = jQuery("input[name=edit_nickname]");
				if (edit_name.val() == "" || edit_name.val() == null) {
					alert("Please input the [学校名] field");
					edit_name.focus();
					return false;
				} else if(edit_nickname.val() == "" || edit_nickname.val() == null) {
					alert("Please input the [学校名略称] field");
					edit_nickname.focus();
					return false;
				} else if (edit_nickname.val().match(/[^a-zA-Z0-9-_\s]/g)) {
					alert("The [学校名略称] field is invalid. Please input Alphabet.");
					edit_nickname.focus();
					return false;
				}
				jQuery("#"+type+"submit").val("Wait");
				jQuery("#"+type+"submit").prop("disabled",true);
				jQuery("#processing").show();
				if (type == "school") {
					var types = ["desc", "point", "cmp", "voice", "prog", "plus", "slide", "pamphlet"];
					for (var i = 0, len = types.length; i < len; i++) {
						fncSortDelete(types[i]);
					}
					var fd = new FormData(jQuery("#" + formname)[0]);
					jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/school/"+type+"_edit",
					data: fd,
					processData : false,
      				contentType : false,
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						if (res[0].result == "OK")	{
							//alert(res[0].msg);
							jQuery.unblockUI();
						}else{
							alert(msg);
						}
						fncShowList(type+"_list");
					},
					error:function(msg){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
				} else {
					jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/school/"+type+"_edit",
					data: jQuery("#" + formname).serialize(),
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						if (res[0].result == "OK")	{
							//alert(res[0].msg);
							jQuery.unblockUI();
						}else{
							alert(msg);
						}
						fncShowList(type+"_list");
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}

				});
				}

			}

			function fncSortDelete(t){
				var count = jQuery("tr."+t+"_item").length;
					var i = 0;
					jQuery("tr."+t+"_item").each(function(){
						jQuery(this).attr("number",i);
						var n = jQuery(this).attr("number");
						var id = jQuery(this).attr("data-id");
						fncCangeSortNumber(t,id,n);
						i++;
					});
					jQuery("tr."+t+"_item:hidden").each(function(){
						var delete_id = jQuery(this).attr("data-id");
						fncDelete(t, delete_id);
					});
			}
			function fncShowList(t)	{
				jQuery("#processing").show();
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/school/"+t,
					success: function(msg){
						jQuery("#processing").hide();
						jQuery("#res_list").html("");
						jQuery("#res_list").html(msg);
						fncChangeAll(t);
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			function fncHide(){
				jQuery.unblockUI();
			}

			function fncSchoolPublish (id) {
				fncDelete(\'school\',id);
				setTimeout(function () {
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/school/publish",
					data: "id="+id,
					complete: function(msg){
						jQuery("#processing").hide();
						setTimeout("fncShowList(\'school_list\')",100);
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}, 100);
			}

			function fncDelete (t,id) {
				jQuery("#processing").show();
				var str = t + " ";
				if (str.indexOf("list" + " ") !== -1 ) {
					if(!window.confirm("本当に削除しますか？")){
						jQuery("#processing").hide();
						return false;
					};
				}
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/school/delete",
					data:"type="+t+"&id="+id,
					complete: function(msg){
						jQuery("#processing").hide();
						if (t == "school"){
							setTimeout("fncShowList(\'school_list\')",100)
						}
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}

			function fncCangeSortNumber (t,id,n) {
				jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/school/sort_change",
					data:"type="+t+"&id="+id+"&n="+n,
					success: function(msg){
						jQuery("#processing").hide();
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}
			function fncChangeAll(t) {
				var count = jQuery("tr.items").length;
				var i = 1;
				jQuery("tr.items").each(function(){
					jQuery(this).find(".sort_number").html(i);
					var n = jQuery(this).find(".sort_number").html();
					var id = jQuery(this).attr("number");
					fncCangeSortNumber(t,id,n);
					i++;
				});
			}

			function add_item(c,i){
				var n = jQuery("#add_"+c).prev().attr("number");
				if (typeof n === "undefined") {
					n = 0;
				} else {
					n++;
				}

				if (c == "desc_item") {
					jQuery("#add_"+c).before("<tr class=\'desc_item\' number="+n+"><td class=\'border_none\' colspan=3><table><tr class=\'desc_item\'><td class=\'label first\' rowspan=\'2\'>概要<br><button class=\'delete_item\' onclick=\'delete_item(\"desc_item\",\""+n+"\");return false;\'>削除</button></td><td class=\'label second\' nowrap>タイトル</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_descs["+n+"][title]\' value=\'\'><input type=\'hidden\' name=\'edit_descs["+n+"][id]\' value=\'\'></td></tr><tr class=\'desc_item\'><td class=\'label\' nowrap>本文</td><td class=\'infield\' \'><textarea name=\'edit_descs["+n+"][body]\'></textarea></td></tr></table></td></tr>");
				} else if (c == "point_item") {
					jQuery("#add_"+c).before("<tr class=\'point_item\' number="+n+"><td class=\'border_none\' colspan=3><table><tr class=\'point_item\'><td class=\'label first\' rowspan=\'2\'>ポイント<br><button class=\'delete_item\' onclick=\'delete_item(\"point_item\",\""+n+"\");return false;\'>削除</button></td><td class=\'label second\' nowrap>タイトル</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_points["+n+"][title]\' value=\'\'><input type=\'hidden\' name=\'edit_points["+n+"][id]\' value=\'\'></td></tr><tr class=\'point_item\'><td class=\'label\' nowrap>本文</td><td class=\'infield\' \'><p><textarea name=\'edit_points["+n+"][body][]\'></textarea><button class=\'delete_field\' onclick=\'return false;\'>削除</button></p><button class=\'add_button\' id=\'add_point_body"+n+"\' onclick=\'add_field(\"point\",\"body\",\""+n+"\");return false;\' >ポイント詳細を追加する</button></td></tr></table></td></tr>");
				} else if (c == "cmp_item") {
					jQuery("#add_"+c).before("<tr class=\'cmp_item\' number="+n+"><td class=\'border_none\' colspan=3><table><tr><td class=\'label first\' rowspan=\'8\'>キャンパス<br><button class=\'delete_item\' onclick=\'delete_item(\"cmp_item\",\""+n+"\");return false;\'>削除</button></td><td class=\'label second\' nowrap>名称</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_cmps["+n+"][name]\' value=\'\'><input type=\'hidden\' name=\'edit_cmps["+n+"][id]\' value=\'\'></td></tr><tr><td class=\'label second\' nowrap>所在地</td><td class=\'infield third\' \'>住所：<input type=\'text\' style=\'width: 300px;\' name=\'edit_cmps["+n+"][address]\' value=\'\'>URL：<input type=\'text\' style=\'width: 300px;\' name=\'edit_cmps["+n+"][embed]\' value=\'\'></td></tr><tr class=\'cmp_item\'><td class=\'label second\' nowrap>生徒数</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_cmps["+n+"][student]\' value=\'\'></td></tr><tr class=\'cmp_item\'><td class=\'label second\' nowrap>English Only Policy</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_cmps["+n+"][eop]\' value=\'\'></td></tr><tr class=\'cmp_item\'><td class=\'label second\' nowrap>日本人スタッフ</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_cmps["+n+"][jpn]\' value=\'\'></td></tr><tr class=\'cmp_item\'><td class=\'label second\' nowrap>寮</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_cmps["+n+"][dorm]\' value=\'\'></td></tr><tr class=\'cmp_item\'><td class=\'label second\' nowrap>説明</td><td class=\'infield third\' \'><textarea name=\'edit_cmps["+n+"][intro]\'></textarea></td></tr><tr class=\'cmp_item\' number="+n+"><td class=\'label second\' nowrap>国名</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_cmps["+n+"][country]\' value=\'\'></td></tr></table></td></tr>");
				} else if (c == "prog_item") {
					jQuery("#add_"+c).before("<tr class=\'prog_item\' number="+n+"><td class=\'border_none\' colspan=3><table><tr class=\'prog_item\'><td class=\'label first\' rowspan=\'6\'>プログラム<br><button class=\'delete_item\' onclick=\'delete_item(\"prog_item\",\""+n+"\");return false;\'>削除</button></td><td class=\'label second\' nowrap>タイトル</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_progs["+n+"][title]\' value=\'\'><input type=\'hidden\' name=\'edit_progs["+n+"][id]\' value=\'\'></td></tr><tr class=\'prog_item\'><td class=\'label second\' nowrap>内容</td><td class=\'infield third\' \'><textarea name=\'edit_progs["+n+"][body]\'></textarea></td></tr><tr class=\'prog_item\'><td class=\'label second\' nowrap>期間</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_progs["+n+"][period]\' value=\'\'></td></tr><tr class=\'prog_item\'><td class=\'label second\' nowrap>対象</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_progs["+n+"][target]\' value=\'\'></td></tr><tr class=\'prog_item\'><td class=\'label second\' nowrap>条件</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_progs["+n+"][cond]\' value=\'\'></td></tr><tr class=\'prog_item\' number="+n+" ><td class=\'label second\' nowrap>特記事項</td><td class=\'infield third\' \'><p><input type=\'text\' style=\'width: 300px;\' name=\'edit_progs["+n+"][remarks][]\' value=\'\'><button class=\'delete_field\' onclick=\'return false;\'>削除</button></p><button class=\'add_button\' id=\'add_prog_remarks"+n+"\' onclick=\'add_field(\"prog\",\"remarks\",\""+n+"\");return false;\'>特記事項を追加する</button></td></tr></table></td></tr>");
				} else if (c == "plus_item") {
					jQuery("#add_"+c).before("<tr class=\'plus_item\' number="+n+"><td class=\'border_none\' colspan=3><table><tr class=\'plus_item\'><td class=\'label first\' rowspan=\'6\'>プラスアルファ<br><button class=\'delete_item\' onclick=\'delete_item(\"plus_item\",\""+n+"\");return false;\'>削除</button></td><td class=\'label second\' nowrap>タイトル</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_pluses["+n+"][title]\' value=\'\'><input type=\'hidden\' name=\'edit_pluses["+n+"][id]\' value=\'\'></td></tr><tr class=\'plus_item\'><td class=\'label second\' nowrap>内容</td><td class=\'infield third\' \'><textarea name=\'edit_pluses["+n+"][body]\'></textarea></td></tr><tr class=\'plus_item\'><td class=\'label second\' nowrap>期間</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_pluses["+n+"][period]\' value=\'\'></td></tr><tr class=\'plus_item\'><td class=\'label second\' nowrap>対象</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_pluses["+n+"][target]\' value=\'\'></td></tr><tr class=\'plus_item\'><td class=\'label second\' nowrap>条件</td><td class=\'infield third\' \'><input type=\'text\' style=\'width: 300px;\' name=\'edit_pluses["+n+"][cond]\' value=\'\'></td></tr><tr class=\'plus_item\' number="+n+"><td class=\'label second\' nowrap>特記事項</td><td class=\'infield third\' \'><p><input type=\'text\' style=\'width: 300px;\' name=\'edit_pluses["+n+"][remarks][]\' value=\'\'><button class=\'delete_field\' onclick=\'return false;\'>削除</button></p><button class=\'add_button\' id=\'add_plus_remarks"+n+"\' onclick=\'add_field(\"plus\",\"remarks\",\""+n+"\");return false;\'>特記事項を追加する</button></td></tr></table></td></tr>");
				} else if (c == "voice_item") {
					jQuery("#add_"+c).before("<tr class=\'voice_item\' number="+n+"><td class=\'border_none\' colspan=3><table><tr class=\'voice_item\'><td class=\'label first\' rowspan=\'2\'>生徒の声<br><button class=\'delete_item\' onclick=\'delete_item(\"voice_item\",\""+n+"\");return false;\'>削除</button></td><td class=\'label second\' nowrap>アイコン</td><td class=\'infield third\' \'><input type=\'radio\' name=\'edit_voices["+n+"][icon]\' value=\'M\'>男性<input type=\'radio\' name=\'edit_voices["+n+"][icon]\' value=\'F\'>女性<input type=\'hidden\' name=\'edit_voices["+n+"][id]\' value=\'\'></td></tr><tr class=\'voice_item\' number="+n+"><td class=\'label second\' nowrap>本文</td><td class=\'infield third\' \'><textarea name=\'edit_voices["+n+"][body]\'></textarea></td></tr></table></td></tr>");
				} else if (c == "slide_item") {
					jQuery("#add_"+c).before("<tr class=\'slide_item\' number="+n+"><td class=\'label\' nowrap>スライド<br><button class=\'delete_item\' onclick=\'delete_item(\"slide_item\",\""+n+"\");return false;\'>削除</button></td><td class=\'infield\' colspan=\'3\'>画像：<input id=\'imageup_"+n+"\' type=\'file\' name=\'edit_image["+n+"]\'>動画URL：<input id=\'videoup_"+n+"\' type=\'text\' name=\'edit_videos["+n+"]\'><input type=\'hidden\' name=\'edit_slide_id["+n+"]\'><input type=\'hidden\' name=\'edit_image_urls["+n+"]\' value=\'\'><input type=\'hidden\' name=\'edit_slide_url["+n+"]\' value=\'></td></tr>");
				} else if (c == "pamphlet_item") {
					jQuery("#add_"+c).before("<tr class=\'pamphlet_item\' number="+n+"><td class=\'label\' nowrap>パンフレット<br><button class=\'delete_item\' onclick=\'delete_item(\"pamphlet_item\"," + n + ");return false;\'>削除</button></td><td class=\'infield\' colspan=\'3\'>PDF：<input id=\'pamphlet_"+n+"\' type=\'file\' name=\'edit_pamphlet_pdf["+n+"]\'>年：<input type=\'number\' name=\'edit_pamphlet["+n+"][year]\' style=\'margin-right: 100px;\'>言語：<input type=\'radio\' name=\'edit_pamphlet[" + n + "][language]\' value=\'japan\'>日本語<input type=\'radio\' name=\'edit_pamphlet[" + n + "][language]\' value=\'english\'>英語<input type=\'hidden\' name=\'edit_pamphlet_id["+n+"]\'><input type=\'hidden\' name=\'edit_pamphlet_year["+n+"]\' value=\'\'><input type=\'hidden\' name=\'edit_pamphlet_language["+n+"]\' value=\'\'><input type=\'hidden\' name=\'edit_pamphlet_urls["+n+"]\' value=\'\'></td></tr>");
				}
			}

			function delete_item(c,i) {
				jQuery("tr."+c+"[number=\""+i+"\"]").hide();
			}

			function add_field(n,i,j) {
				if (n == "point") {
					var name = jQuery("#add_"+n+"_"+i+j).prev().find("textarea").attr("name");
					jQuery("#add_"+n+"_"+i+j).before("<p><textarea name="+name+"></textarea><button class=\'delete_field\' onclick=\'return false;\'>削除</button></p>");
				} else {
					var name = jQuery("#add_"+n+"_"+i+j).prev().find("input").attr("name");
					jQuery("#add_"+n+"_"+i+j).before("<p><input style=\'width:300px\' type=\'text\' name="+name+" value=\'\'><button class=\'delete_field\' onclick=\'return false;\'>削除</button></p>");
				}
			}

			function add_active (i) {
				jQuery(".tabs").removeClass("active");
				jQuery("#tab_"+i).addClass("active");
			}

			jQuery(function(){
				jQuery(".delete_field").live("click",function(){
						jQuery(this).parent().remove();
						return false;
					});
			});

			function fncPreview (country, nickname, id) {
				jQuery("#processing").show();
				var win = window.open("", "child");
							win.document.body.innerHTML = "loading...";
				var types = ["desc", "point", "cmp", "voice", "prog", "plus", "slide", "pamphlet"];
					for (var i = 0, len = types.length; i < len; i++) {
						fncSortDelete(types[i]);
					}
					var fd = new FormData(jQuery("#form_school_edit")[0]);
					jQuery.ajax({
					type: "POST",
					url: "'.$url_base.'data/school/school_edit",
					data: fd,
					processData : false,
      				contentType : false,
					success: function(msg){
						jQuery("#processing").hide();
						res = eval(msg);
						if (res[0].result == "OK")	{
							//alert(res[0].msg);
							//win.location.href = "http://www.jawhm.or.jp/school/"+country+"/"+nickname+"/?preview=true";
							win.location.href = location.protocol+"//"+location.host+"/school/"+country+"/"+nickname+"/?preview=true";
							//jQuery.unblockUI();
							fncShowEdit("school",id)
						}else{
							alert(msg);
						}
					},
					error:function(){
						jQuery("#processing").hide();
						alert("通信エラーが発生しました。");
					}
				});
			}
	jQuery(document).ready(function () {
			fncShowList(\'school_list\');
		});
			';
	//CSS
	$msg_show = '<link href="/mailsystem/mem/css/school.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/mailsystem/mem/js/jquery-ui.js"></script>
	';

	// 新規登録表示
		$body_title[] .= 'スクール';
		$msg_show .= '<div id="school_tab">
			<ul>
			<li>
				<div id="tab_1" class="tabs active" onclick="fncShowList(\'school_list\'); add_active(\'1\')">語学学校</div>
			<li>
				<div id="tab_2" class="tabs" onclick="fncShowList(\'course_list\'); add_active(\'2\');">コース</div>
			<li>
				<div id="tab_3" class="tabs" onclick="fncShowList(\'licence_list\'); add_active(\'3\');">資格</div>
			<li>
				<div id="tab_4" class="tabs last" onclick="fncShowList(\'point_list\'); add_active(\'4\');">ポイント</div>
			</ul>
			<div class="list_area">
				<div id="div_school_edit" style="display:none; position:fixed; background-color: #fff; text-align: center; top:0px; left:0px; font-size:10pt; cursor:default; overflow-y:auto; height: 100%; width: 100%"></div>
				<div id="div_course_edit" style="display:none; margin:10px 20px 10px 20px; font-size:10pt; cursor:default; overflow-y:auto; height: 150px;"></div>
				<div id="div_licence_edit" style="display:none; margin:10px 20px 10px 20px; font-size:10pt; cursor:default; overflow-y:auto; height: 150px;"></div>
				<div id="div_point_edit" style="display:none; margin:10px 20px 10px 20px; font-size:10pt; cursor:default; overflow-y:auto; height: 150px;"></div>
				<div class="list_box"><div id="res_list" style=""></div></div>
			</div>
			</div>
		';
		$body[] .= $msg_show;
		break;

case 'school' :

	$id = fnc_getpost('id');
	$cur_id = $id;

	//初期値
	if (empty($id))	{
		$title = '【新しいスクールを登録する】';
		$country = '';
		$city = '';
		$name = '';
		$rubi = '';
		$nickname = '';
		$logo = '';
		$course = array();
		$licence = array();
		$point = array();
		$descs[0] = array('id' => '','title' => '','body' => '');
		$points[0] = array('id' => '','title' => '','body' => array(''));
		$cmps[0] = array('id' => '','name' => '','address' => '','student' => '','eop' => '','jpn' => '','dorm' => '','intro' => '','country' => '');
		$level = '';
		$progs[0] = array('id' => '','title' => '','body' => '','period' => '','target' => '','cond' => '','remarks' => array(''));
		$pluses[0] = array('id' => '','title' => '','body' => '','period' => '','target' => '','cond' => '','remarks' => array(''));
		$activity = '';
		$blog = '';
		$voice_url = '';
		$search_word = '';
		$caption = '';
		$slides[0] = array('id' => '', 'image' => '', 'video' => '');
		$voices[0] = array('id' => '','icon' => '','body' => '');
		$pamphlet[0] = array('id' => '', 'school_id' => '', 'year' => '', 'language' => '', 'url' => '');
	} else {
		$title = '【スクール情報修正】';
		try {
			$stt = $db->prepare('SELECT id,country,city,name,rubi,nickname,logo,course,licence,point,level,activity,blog,voice_url,search_word,caption,slide FROM p_school_list WHERE id = :id ');
			$stt->bindvalue(':id',$cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$idx++;
				$cur_id = $row['id'];
				$country = $row['country'];
				$city = $row['city'];
				$name = $row['name'];
				$rubi = $row['rubi'];
				$nickname = $row['nickname'];
				$logo = $row['logo'];
				$course = explode(',',$row['course']);;
				$licence = explode(',',$row['licence']);
				$point = explode(',',$row['point']);
				$level = $row['level'];
				$activity = $row['activity'];
				$blog = $row['blog'];
				$voice_url = $row['voice_url'];
				$search_word = $row['search_word'];
				$caption = $row['caption'];
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('SELECT id, title, body FROM p_school_desc WHERE school_id = :id ORDER BY sort_number ASC, id');
			$stt->bindvalue(':id',$cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$descs[$idx]['id'] = $row['id'];
				$descs[$idx]['title'] = $row['title'];
				$descs[$idx]['body'] = $row['body'];
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('SELECT id, title, body FROM p_school_point WHERE school_id = :id ORDER BY sort_number ASC, id ASC');
			$stt->bindvalue(':id',$cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$points[$idx]['id'] = $row['id'];
				$points[$idx]['title'] = $row['title'];
				$points[$idx]['body'] = explode(',',$row['body']);
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('SELECT id, name, address, student, eop, jpn, dorm, intro, country, embed FROM p_school_cmp WHERE school_id = :id ORDER BY sort_number ASC, id');
			$stt->bindvalue(':id',$cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$cmps[$idx]['id'] = $row['id'];
				$cmps[$idx]['name'] = $row['name'];
				$cmps[$idx]['address'] = $row['address'];
				$cmps[$idx]['student'] = $row['student'];
				$cmps[$idx]['eop'] = $row['eop'];
				$cmps[$idx]['jpn'] = $row['jpn'];
				$cmps[$idx]['dorm'] = $row['dorm'];
				$cmps[$idx]['intro'] = $row['intro'];
				$cmps[$idx]['country'] = $row['country'];
				$cmps[$idx]['embed'] = $row['embed'];
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('SELECT id, title, body, period, target, cond, remarks FROM p_school_prog WHERE school_id = :id ORDER BY sort_number ASC, id');
			$stt->bindvalue(':id',$cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$progs[$idx]['id'] = $row['id'];
				$progs[$idx]['title'] = $row['title'];
				$progs[$idx]['body'] = $row['body'];
				$progs[$idx]['period'] = $row['period'];
				$progs[$idx]['target'] = $row['target'];
				$progs[$idx]['cond'] = $row['cond'];
				$progs[$idx]['remarks'] = explode(',',$row['remarks']);
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('SELECT id, title, body, period, target, cond, remarks FROM p_school_plus WHERE school_id = :id ORDER BY sort_number ASC, id');
			$stt->bindvalue(':id',$cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$pluses[$idx]['id'] = $row['id'];
				$pluses[$idx]['title'] = $row['title'];
				$pluses[$idx]['body'] = $row['body'];
				$pluses[$idx]['period'] = $row['period'];
				$pluses[$idx]['target'] = $row['target'];
				$pluses[$idx]['cond'] = $row['cond'];
				$pluses[$idx]['remarks'] = explode(',',$row['remarks']);
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('SELECT id, icon, body FROM p_school_voice WHERE school_id = :id ORDER BY sort_number ASC, id');
			$stt->bindvalue(':id',$cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$voices[$idx]['id'] = $row['id'];
				$voices[$idx]['icon'] = $row['icon'];
				$voices[$idx]['body'] = $row['body'];
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('SELECT id, image, video FROM p_school_slide WHERE school_id = :id ORDER BY sort_number ASC, id');
			$stt->bindvalue(':id',$cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$slides[$idx]['id'] = $row['id'];
				$slides[$idx]['image'] = $row['image'];
				$slides[$idx]['video'] = $row['video'];
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('SELECT id, school_id, year, language, url FROM p_school_pamphlet WHERE school_id = :id ORDER BY year ASC, id');
			$stt->bindvalue(':id', $cur_id);
			$stt->execute();
			$idx = 0;
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$pamphlet[$idx]['id'] = $row['id'];
				$pamphlet[$idx]['school_id'] = $row['school_id'];
				$pamphlet[$idx]['year'] = $row['year'];
				$pamphlet[$idx]['language'] = $row['language'];
				$pamphlet[$idx]['url'] = $row['url'];
				$idx++;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//選択項目を取得
	try {
		$stt = $db->prepare('SELECT id, name FROM school_course_list');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$course_id[] = $row['id'];
			$course_name[] = $row['name'];
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try {
		$stt = $db->prepare('SELECT id, name FROM school_licence_list');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$licence_id[] = $row['id'];
			$licence_name[] = $row['name'];
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	try {
		$stt = $db->prepare('SELECT id, name FROM school_point_list');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$point_id[] = $row['id'];
			$point_name[] = $row['name'];
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	$msg_school = '<script>
		jQuery(function(){
			jQuery(".slide_sortable").sortable();
			jQuery(".desc_sortable").sortable();
			jQuery(".point_sortable").sortable();
			jQuery(".cmp_sortable").sortable();
			jQuery(".prog_sortable").sortable();
			jQuery(".plus_sortable").sortable();
			jQuery(".voice_sortable").sortable();
			});
	</script>
	 <div id="register_button">
	 <a id="hidden_preview" style="display: none" target="_blank" href="/school/'.$country.'/'.$nickname.'/?preview=true">プレビュー</a>
	<div style="margin:0 0 10px 0; font-size:12pt; font-weight:bold;">'.$title.'</div>
		<button class="register cancel" onclick="fncHide();fncShowList(\'school_list\')">キャンセル</button>
		<button class="register submit" id="schoolsubmit" onclick="fncPostForm(\'school\',\'form_school_edit\');">登録</button>
		<button class="register preview submit" onclick="fncPreview(\''.$country.'\',\''.$nickname.'\',\''.$cur_id.'\');">プレヴュー</button>
	 </div>
		<form id="form_school_edit" method="POST" enctype="multipart/form-data">
			<button onclick="return false" style="display: none;"></button>
			<input type="hidden" name="edit_id" value="'.$cur_id.'">
			<table id="school_table"><tr><td style="vertical-align:top;" colspan="2">
				<table id="first_table">
					<tr>
						<td class="label" nowrap>学校名</td>
						<td class="infield" >
							<input class="text" type="text" name="edit_name" value="'.$name.'">
						</td>
						<td class="label" nowrap>国名</td>
						<td class="infield" >';
						$checked = array('','','','','','','','','');
						switch ($country){
							case 'aus' : $checked[0] = 'checked';break;
							case 'can' : $checked[1] = 'checked';break;
							case 'nz' : $checked[2] = 'checked';break;
							case 'en' : $checked[3] = 'checked';break;
							case 'ww' : $checked[4] = 'checked';break;
							case 'ire' : $checked[5] = 'checked';break;
							case 'fra' : $checked[6] = 'checked';break;
							case 'deu' : $checked[7] = 'checked';break;
							case 'usa' : $checked[8] = 'checked';break;
							default: break;
						}
	$msg_school .= '
							<input id="country_01" type="radio" name="edit_country" value="aus" '.$checked[0].'><label for="country_01">オーストラリア&nbsp;</label>
							<input id="country_02" type="radio" name="edit_country" value="can" '.$checked[1].'><label for="country_02">カナダ&nbsp;</label>
							<input id="country_03" type="radio" name="edit_country" value="nz" '.$checked[2].'><label for="country_03">ニュージーランド&nbsp;</label>
							<input id="country_04" type="radio" name="edit_country" value="en" '.$checked[3].'><label for="country_04">イギリス&nbsp;</label>
							<input id="country_05" type="radio" name="edit_country" value="ww" '.$checked[4].'><label for="country_05">ワールドワイド</label>
							<input id="country_06" type="radio" name="edit_country" value="ire" '.$checked[5].'><label for="country_06">アイルランド&nbsp;</label><br/>
							<input id="country_07" type="radio" name="edit_country" value="fra" '.$checked[6].'><label for="country_07">フランス&nbsp;</label>
							<input id="country_08" type="radio" name="edit_country" value="deu" '.$checked[7].'><label for="country_08">ドイツ&nbsp;</label>
							<input id="country_09" type="radio" name="edit_country" value="usa" '.$checked[8].'><label for="country_09">アメリカ&nbsp;</label>
						</td>
					</tr>
					<tr>
						<td class="label" nowrap>学校名カナ</td>
						<td class="infield" >
							<input class="text" type="text" name="edit_rubi" value="'.$rubi.'">
						</td>
						<td class="label" nowrap>都市名</td>
						<td class="infield" >
							<input class="text" type="text" name="edit_city" value="'.$city.'">
						</td>
					</tr>
					<tr>
						<td class="label" nowrap>学校名略称</td>
						<td class="infield">
							<input class="text" type="text" name="edit_nickname" value="'.$nickname.'">
						</td>
						<td class="label" nowrap>ロゴ</td>
						<td class="infield" >
							<img id="logo_img" src="'.$logo.'" >
							<input id="logoup" type="file" name="edit_logo">
							<input type="hidden" name="edit_logo_url" value="'.$logo.'">
						</td>
					</tr>
					<tr>
						<td class="label" nowrap>ブログ(URL)</td>
						<td class="infield" colspan="3">
							<input class="text" type="text" name="edit_blog" value="'.$blog.'">
						</td>
					</tr><tr>
						<td class="label" nowrap>生徒の声(URL)</td>
						<td class="infield" colspan="3">
							<input class="text" type="text" name="edit_voice_url" value="'.$voice_url.'">
						</td>
					</tr>
					<tr>
						<td class="label" nowrap>セミナー検索<br>ワード</td>
						<td class="infield" colspan="3">
							<input class="text" type="text" name="edit_search_word" value="'.$search_word.'">
						</td>
					</tr>
					<tr>
						<td class="label" nowrap>キャプション</td>
						<td class="infield" colspan="3">
							<input class="text caption" type="text" name="edit_caption" value="'.$caption.'">
						</td>
					</tr>
					<tr>
						<td class="label" nowrap>受講できるコース</td>
						<td id="course_list" class="infield" colspan="3">';
						$idx = 0;
						foreach($course_name as $na) {
							$checked = (in_array($na,$course)) ? 'checked' : '';
							$msg_school .= '<input type="checkbox" id="edit_course_'.$idx.'" name="edit_course[]" value="'.$na.'" '.$checked.'><label for="edit_course_'.$idx.'">'.$na.'　</label>';
							$idx++;
						};
	$msg_school .= '
					</tr>
					<tr>
						<td class="label" nowrap>取得できる資格</td>
						<td class="infield" colspan="3">';
						$idx = 0;
						foreach($licence_name as $na) {
							$checked = (in_array($na,$licence)) ? 'checked' : '';
							$msg_school .= '<input type="checkbox" id="edit_licence_'.$idx.'" name="edit_licence[]" value="'.$na.'" '.$checked.'><label for="edit_licence_'.$idx.'">'.$na.'　</label>';
							$idx++;
						};
	$msg_school .= '
						</td>
					</tr>
					<tr>
						<td class="label" nowrap>オススメポイント</td>
						<td class="infield" colspan="3">';
						$idx = 0;
						foreach($point_name as $na) {
							$checked = (in_array($na,$point)) ? 'checked' : '';
							$msg_school .= '<input type="checkbox" id="edit_point_'.$idx.'" name="edit_point[]" value="'.$na.'" '.$checked.'><label for="edit_point_'.$idx.'">'.$na.'　</label>';
							$idx++;
						};
	$msg_school .=
						'</td>
					</tr>
					</table>
				</td></tr>';

	$msg_school .= '<br><tr>
					<td colspan="4">
					<table id="pamphlet_table" style="width: 100%;">
					<tbody class="pamphlet_sortable">';
					foreach($pamphlet as $key => $item) {
						$jp_check = "";
						$en_check = "";
						if ($item["language"] == "japan") {
							$jp_check = "checked";
						} else {
							$en_check = "checked";
						}
	$msg_school .= '
						<tr class="pamphlet_item" number=' . $key . ' data-id=' . $item["id"] . '>
							<td class="label" nowrap>パンフレット<br><button class="delete_item" onclick="delete_item(\'pamphlet_item\',' . $key . ');return false;">削除</button></td>
							<td class="infield" colspan="3">
								<label>' . $pamphlet[$key]["url"] . '</label><br>
								PDF：<input id="pamphlet_' . $key . '" type="file" name="edit_pamphlet_pdf[' . $key . ']">
								年：<input type="number" name="edit_pamphlet[' . $key . '][year]" style="margin-right: 100px;" value="' . $pamphlet[$key]["year"] . '">
								言語：
								<input type="radio" name="edit_pamphlet[' . $key . '][language]" value="japan" ' . $jp_check . '>日本語
								<input type="radio" name="edit_pamphlet[' . $key . '][language]" value="english" ' . $en_check . '>英語

								<input type="hidden" name="edit_pamphlet_id[' . $key . ']" value="' . $pamphlet[$key]["id"] . '">
								<input type="hidden" name="edit_pamphlet_year[' . $key . ']" value="' . $pamphlet[$key]["year"] . '">
								<input type="hidden" name="edit_pamphlet_language[' . $key . ']" value="' . $pamphlet[$key]["language"] . '">
								<input type="hidden" name="edit_pamphlet_urls[' . $key . ']" value="' . $pamphlet[$key]["url"] . '">
							</td>
						</tr>';
					}
	$msg_school .= '
						<tr id="add_pamphlet_item" class="stop">
							<td class="add_button" colspan="3">
								<button class="add_button" onclick="add_item(\'pamphlet_item\');return false;">パンフレットを追加する
								</button>
							</td>
						</tr>
					</tbody>
					</table>
					</td>
				</tr><br>';

	$msg_school .= '<tr>
					<td colspan="4">
					<table id="slide_table">
					<tbody class="slide_sortable">
					<tr class="slide_item" number=0  data-id="'.$slides[0]['id'].'">
						<td class="label" nowrap>スライド<br><button class="delete_item" onclick="delete_item(\'slide_item\',\'0\');return false;">削除</button></td>
						<td class="infield" colspan="3">';
						if (!empty($slides[0]['image'])) {
							$msg_school .= '<img class="slide_img" src="'.$slides[0]['image'].'" >';
							$image_url = $slides[0]['image'];
						} else {
							$image_url = "";
							$video_url = $slides[0]['video'];
						};
	$msg_school .= '
							画像：<input id="imageup_0" type="file" name="edit_image[0]">
							動画URL：<input id="videoup_0" type="text" name="edit_videos[0]" value="'.$slides[0]['video'].'">
							<input type="hidden" name="edit_slide_id[0]" value="'.$slides[0]['id'].'">
							<input type="hidden" name="edit_image_urls[0]" value="'.$image_url.'">
						</td>
					</tr>';
					$i = 0;
					foreach ($slides as $slide) { if ($i >= 1) {
						$msg_school .= '<tr class="slide_item" number='.$i.'  data-id="'.$slide['id'].'">
						<td class="label" nowrap>スライド<br><button class="delete_item" onclick="delete_item(\'slide_item\',\''.$i.'\');return false;">削除</button></td>
						<td class="infield" colspan="3">';
						if (!empty($slide['image'])) {
							$msg_school .= '<img class="slide_img" src="'.$slide['image'].'" >';
							$image_url = $slide['image'];
							$video_url = '';
						} else {
							$image_url = '';
							$video_url = $slide['video'];
						}
						$msg_school .= '
							画像：<input id="imageup_'.$i.'" type="file" name="edit_image['.$i.']">
							動画URL：<input id="videoup_'.$i.'" type="text" name="edit_videos['.$i.']" value="'.$slide['video'].'">
							<input type="hidden" name="edit_slide_id['.$i.']" value="'.$slide['id'].'">
							<input type="hidden" name="edit_image_urls['.$i.']" value="'.$image_url.'">
						</td>
					</tr>';
					}$i++;
					}
	$msg_school .= '
					<tr id="add_slide_item" class="stop"><td class="add_button" colspan="3"><button class="add_button" onclick="add_item(\'slide_item\');return false;">スライドを追加する</button></td></tr>
					</tbody>
					</table>
					</td>
					</tr>
				<tr><td style="vertical-align:top;">
					<table>
					<tbody class="desc_sortable">
					<tr class="desc_item" number=0  data-id="'.$descs[0]['id'].'"><td class="border_none" colspan=3>
					<table>
					<tr>
						<td class="label first" rowspan="2">概要<br><button class="delete_item" onclick="delete_item(\'desc_item\',\'0\');return false;">削除</button></td>
						<td class="label second" nowrap>タイトル</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_descs[0][title]" value="'.$descs[0]['title'].'">
							<input type="hidden" name="edit_descs[0][id]" value="'.$descs[0]['id'].'">
						</td>
					</tr>
					<tr>
						<td class="label" nowrap>本文</td>
						<td class="infield" >
							<textarea name="edit_descs[0][body]">'.$descs[0]['body'].'</textarea>
						</td>
					</tr></table></td></tr>';
					$i = 0;
					foreach ($descs as $desc) {
						if ($i >= 1) {
						$msg_school .= '<tr class="desc_item" number='.$i.' data-id="'.$desc['id'].'"><td class="border_none" colspan=3>
					<table>
						<tr>
							<td class="label first" rowspan="2">概要<br><button class="delete_item" onclick="delete_item(\'desc_item\',\''.$i.'\');return false;">削除</button></td>
							<td class="label second" nowrap>タイトル</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_descs['.$i.'][title]" value="'.$desc['title'].'">
								<input type="hidden" name="edit_descs['.$i.'][id]" value="'.$desc['id'].'">
							</td>
						</tr>
						<tr>
							<td class="label" nowrap>本文</td>
							<td class="infield" >
								<textarea name="edit_descs['.$i.'][body]">'.$desc['body'].'</textarea>
							</td>
						</tr></table></td></tr>';
						}
					$i++;
					}

					$msg_school .= '
					<tr id="add_desc_item" class="stop"><td class="add_button" colspan="3"><button class="add_button" onclick="add_item(\'desc_item\');return false;">概要を追加する</button></td></tr>
					</tbody>
					<tbody class="point_sortable">
					<tr class="point_item" number=0  data-id="'.$points[0]['id'].'"><td class="border_none" colspan=3>
					<table>
					<tr>
						<td class="label first" rowspan="2">ポイント<br><button class="delete_item" onclick="delete_item(\'point_item\',\'0\');return false;">削除</button></td>
						<td class="label second" nowrap>タイトル</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_points[0][title]" value="'.$points[0]['title'].'">
							<input type="hidden" name="edit_points[0][id]" value="'.$points[0]['id'].'">
						</td>
					</tr>
					<tr number=0 >
						<td class="label second" nowrap>本文</td>
						<td class="infield third" >
						<p><textarea name="edit_points[0][body][]">'.$points[0]['body'][0].'</textarea><button class="delete_field" onclick="return false;" onclick="return false;">削除</button></p>';
						$i = 0;
						foreach ($points[0]['body'] as $body) {
							if ($i >= 1) {
								$msg_school .= '
								<p><textarea name="edit_points[0][body][]">'.$body.'</textarea><button class="delete_field" onclick="return false;">削除</button></p>';
							}
							$i++;
						}
		$msg_school .= '
						<button class="add_button" id="add_point_body0" onclick="add_field(\'point\',\'body\',\'0\');return false;" >ポイント詳細を追加する</button>
					</tr></table></td></tr>';

					$i = 0;
					foreach ($points as $point) {
						if ($i >= 1){
						$msg_school .= '<tr class="point_item" number='.$i.' data-id="'.$point['id'].'"><td class="border_none" colspan=3>
					<table>
						<tr>
							<td class="label first" rowspan="2">ポイント<br><button class="delete_item" onclick="delete_item(\'point_item\',\''.$i.'\');return false;">削除</button></td>
							<td class="label second" nowrap>タイトル</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_points['.$i.'][title]" value="'.$point['title'].'">
								<input type="hidden" name="edit_points['.$i.'][id]" value="'.$point['id'].'">
							</td>
						</tr>
						<tr number='.$i.'>
							<td class="label" nowrap>本文</td>
							<td class="infield" >';
						foreach ($point['body'] as $body) {
						$msg_school .= '
								<p><textarea name="edit_points['.$i.'][body][]">'.$body.'</textarea><button class="delete_field" onclick="return false;">削除</button></p>
							';}
		$msg_school .= '
								<button class="add_button" id="add_point_body'.$i.'" onclick="add_field(\'point\',\'body\',\''.$i.'\');return false;" >ポイント詳細を追加する</button>
							</td>
						</tr></table></td></tr>';
						}
					$i++;
					}

					$msg_school .= '
					<tr id="add_point_item" class="stop" colspan="3"><td class="add_button" colspan="3"><button class="add_button" class="point_item" onclick="add_item(\'point_item\');return false;">ポイントを追加する</button></td></tr>
					</tbody>
					<tbody class="cmp_sortable">
					<tr class="cmp_item" number=0  data-id="'.$cmps[0]['id'].'"><td class="border_none" colspan=3>
					<table>
					<tr>
						<td class="label first" rowspan="8">キャンパス<br><button class="delete_item" onclick="delete_item(\'cmp_item\',\'0\');return false;">削除</button></td>
						<td class="label second" nowrap>名称</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_cmps[0][name]" value="'.$cmps[0]['name'].'">
							<input type="hidden" name="edit_cmps[0][id]" value="'.$cmps[0]['id'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>所在地</td>
						<td class="infield third" >
							住所：<input class="text" type="text" name="edit_cmps[0][address]" value="'.$cmps[0]['address'].'">
							URL：<input class="text" type="text" name="edit_cmps[0][embed]" value="'.$cmps[0]['embed'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>在校生徒数</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_cmps[0][student]" value="'.$cmps[0]['student'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>English Only Policy</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_cmps[0][eop]" value="'.$cmps[0]['eop'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>日本人スタッフ</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_cmps[0][jpn]" value="'.$cmps[0]['jpn'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>寮</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_cmps[0][dorm]" value="'.$cmps[0]['dorm'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>説明</td>
						<td class="infield third" >
							<textarea name="edit_cmps[0][intro]">'.$cmps[0]['intro'].'</textarea>
						</td>
					</tr>
					<tr number=0>
						<td class="label second" nowrap>国名</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_cmps[0][country]" value="'.$cmps[0]['country'].'">
						</td>
					</tr></table></td></tr>';

					$i = 0;
					foreach ($cmps as $cmp) {
						if ($i >= 1) {
						$msg_school .= '
					<tr class="cmp_item" number='.$i.' data-id="'.$cmp['id'].'"><td class="border_none" colspan=3>
					<table>
						<tr>
							<td class="label first" rowspan="8">キャンパス<br><button class="delete_item" onclick="delete_item(\'cmp_item\',\''.$i.'\');return false;">削除</button></td>
							<td class="label second" nowrap>名称</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_cmps['.$i.'][name]" value="'.$cmp['name'].'">
								<input type="hidden" name="edit_cmps['.$i.'][id]" value="'.$cmp['id'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>所在地</td>
							<td class="infield third" >
								住所：<input class="text" type="text" name="edit_cmps['.$i.'][address]" value="'.$cmp['address'].'">
								URL：<input class="text" type="text" name="edit_cmps['.$i.'][embed]" value="'.$cmp['embed'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>生徒数</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_cmps['.$i.'][student]" value="'.$cmp['student'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>English Only Policy</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_cmps['.$i.'][eop]" value="'.$cmp['eop'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>日本人スタッフ</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_cmps['.$i.'][jpn]" value="'.$cmp['jpn'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>寮</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_cmps['.$i.'][dorm]" value="'.$cmp['dorm'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>説明</td>
							<td class="infield third" >
								<textarea name="edit_cmps['.$i.'][intro]">'.$cmp['intro'].'</textarea>
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>国名</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_cmps['.$i.'][country]" value="'.$cmp['country'].'">
							</td>
						</tr></table></td></tr>';
						}
					$i++;
					}

					$msg_school .= '
					<tr id="add_cmp_item" class="stop"><td class="add_button" colspan="3"><button class="add_button" onclick="add_item(\'cmp_item\');return false;">キャンパスを追加する</button></td></tr>
					</tbody>
					<tbody class="voice_sortable">
					<tr class="voice_item" number=0  data-id="'.$voices[0]['id'].'"><td class="border_none" colspan=3>
					<table>
					<tr>
						<td class="label first" rowspan="2">生徒の声<br><button class="delete_item" onclick="delete_item(\'voice_item\',\'0\');return false;">削除</button></td>
						<td class="label second" nowrap>アイコン</td>
						<td class="infield third" >';
					$m_check = "";
					$f_check = "";
					if ($voices[0]['icon'] == "F"){ $f_check = "checked"; } else { $m_check = "checked"; }
					$msg_school .= '
							<input type="radio" name="edit_voices[0][icon]" value="M" '.$m_check.'>男性
							<input type="radio" name="edit_voices[0][icon]" value="F" '.$f_check.'>女性
							<input type="hidden" name="edit_voices[0][id]" value="'.$voices[0]['id'].'">
						</td>
					</tr>
					<tr number=0>
						<td class="label second" nowrap>本文</td>
						<td class="infield third" >
							<textarea name="edit_voices[0][body]">'.$voices[0]['body'].'</textarea>
						</td>
					</tr></table></td></tr>';

					$i = 0;
					foreach ($voices as $voice){
						if ($i >= 1) {
						$msg_school .= '<tr class="voice_item" number='.$i.' data-id="'.$voice['id'].'"><td class="border_none" colspan=3>
					<table>
						<tr>
							<td class="label first" rowspan="2">生徒の声<br><button class="delete_item" onclick="delete_item(\'voice_item\',\''.$i.'\');return false;">削除</button></td>
							<td class="label second" nowrap>アイコン</td>
							<td class="infield third" >';
					$m_check = "";
					$f_check = "";
					if ($voice['icon'] == "F"){ $f_check = "checked"; } else { $m_check = "checked"; }
					$msg_school .= '
							<input type="radio" name="edit_voices['.$i.'][icon]" value="M" '.$m_check.'>男性
							<input type="radio" name="edit_voices['.$i.'][icon]" value="F" '.$f_check.'>女性
								<input type="hidden" name="edit_voices['.$i.'][id]" value="'.$voice['id'].'">
							</td>
						</tr>
						<tr number='.$i.'>
							<td class="label second" nowrap>本文</td>
							<td class="infield third" >
								<textarea name="edit_voices['.$i.'][body]">'.$voice['body'].'</textarea>
							</td>
						</tr></table></td></tr>';
						}
					$i++;
					}

					$msg_school .= '
					<tr id="add_voice_item" class="stop"><td class="add_button" colspan="3"><button class="add_button" onclick="add_item(\'voice_item\');return false;">生徒の声を追加する</button></td></tr>
					</tbody>
					</table>
				</td><td style="vertical-align:top;">
					<table>
					<tr>
						<td class="label" nowrap colspan="2">レベル分け</td>
						<td class="infield">
							<input class="text" type="text" name="edit_level" value="'.$level.'">
						</td>
					</tr>
					<tbody class="prog_sortable">
					<tr class="prog_item" number=0  data-id="'.$progs[0]['id'].'"><td class="border_none" colspan=3>
					<table>
					<tr>
						<td class="label first" rowspan="6">プログラム<br><button class="delete_item" onclick="delete_item(\'prog_item\',\'0\');return false;">削除</button></td>
						<td class="label second" nowrap>タイトル</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_progs[0][title]" value="'.$progs[0]['title'].'">
							<input type="hidden" name="edit_progs[0][id]" value="'.$progs[0]['id'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>内容</td>
						<td class="infield third" >
							<textarea name="edit_progs[0][body]">'.$progs[0]['body'].'</textarea>
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>期間</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_progs[0][period]" value="'.$progs[0]['period'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>対象</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_progs[0][target]" value="'.$progs[0]['target'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>条件</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_progs[0][cond]" value="'.$progs[0]['cond'].'">
						</td>
					</tr>
					<tr number=0>
						<td class="label second" nowrap>特記事項</td>
						<td class="infield third" >
							<p><input class="text" type="text" name="edit_progs[0][remarks][]" value="'.$progs[0]['remarks'][0].'"><button class="delete_field" onclick="return false;">削除</button></p>';
						$i = 0;
					foreach($progs[0]['remarks'] as $remark){
						if ($i >= 1) {
							$msg_school .= '
							<p><input class="text" type="text" name="edit_progs[0][remarks][]" value="'.$remark.'"><button class="delete_field" onclick="return false;">削除</button></p>';}
							$i++;
						}
		$msg_school .= '
							<button class="add_button" id="add_prog_remarks0" onclick="add_field(\'prog\',\'remarks\',\'0\');return false;">特記事項を追加する</button>
						</td>
					</tr></table></td></tr>';

					$i = 0;
					foreach ($progs as $prog) {
						if ($i >= 1) {
						$msg_school .= '<tr class="prog_item" number='.$i.' data-id="'.$prog['id'].'"><td class="border_none" colspan=3>
					<table>
						<tr>
							<td class="label first" rowspan="6">プログラム<br><button class="delete_item" onclick="delete_item(\'prog_item\',\''.$i.'\');return false;">削除</button></td>
							<td class="label second" nowrap>タイトル</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_progs['.$i.'][title]" value="'.$prog['title'].'">
								<input type="hidden" name="edit_progs['.$i.'][id]" value="'.$prog['id'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>内容</td>
							<td class="infield third" >
								<textarea name="edit_progs['.$i.'][body]">'.$prog['body'].'</textarea>
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>期間</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_progs['.$i.'][period]" value="'.$prog['period'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>対象</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_progs['.$i.'][target]" value="'.$prog['target'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>条件</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_progs['.$i.'][cond]" value="'.$prog['cond'].'">
							</td>
						</tr>
						<tr number='.$i.' >
							<td class="label second" nowrap>特記事項</td>
							<td class="infield third" >';
							$j = 0;
						foreach($prog['remarks'] as $remark){
								$msg_school .= '
									<p><input class="text" type="text" name="edit_progs['.$i.'][remarks][]" value="'.$remark.'"><button class="delete_field" onclick="return false;">削除</button></p>';
						}
						$msg_school .= '
								<button class="add_button" id="add_prog_remarks'.$i.'" onclick="add_field(\'prog\',\'remarks\',\''.$i.'\');return false;">特記事項を追加する</button>
							</td>
						</tr></table></td></tr>';
						}
					$i++;
					}

					$msg_school .= '
					<tr id="add_prog_item" class="stop"><td class="add_button" colspan="3"><button class="add_button" onclick="add_item(\'prog_item\');return false;">プログラムを追加する</button></td></tr>
					</tbody>
					<tbody class="plus_sortable">
					<tr class="plus_item" number=0  data-id="'.$pluses[0]['id'].'"><td class="border_none" colspan=3>
					<table>
					<tr>
						<td class="label first" rowspan="6">プラスアルファ<br><button class="delete_item" onclick="delete_item(\'plus_item\',\'0\');return false;">削除</button></td>
						<td class="label second" nowrap>タイトル</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_pluses[0][title]" value="'.$pluses[0]['title'].'">
							<input type="hidden" name="edit_pluses[0][id]" value="'.$pluses[0]['id'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>内容</td>
						<td class="infield third" >
							<textarea name="edit_pluses[0][body]">'.$pluses[0]['body'].'</textarea>
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>期間</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_pluses[0][period]" value="'.$pluses[0]['period'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>対象</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_pluses[0][target]" value="'.$pluses[0]['target'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>条件</td>
						<td class="infield third" >
							<input class="text" type="text" name="edit_pluses[0][cond]" value="'.$pluses[0]['cond'].'">
						</td>
					</tr>
					<tr>
						<td class="label second" nowrap>特記事項</td>
						<td class="infield third" >
							<p><input class="text" type="text" name="edit_pluses[0][remarks][]" value="'.$pluses[0]['remarks'][0].'"><button class="delete_field" onclick="return false;">削除</button></p>';
						$i = 0;
						if (count($pluses[0]['remarks']) > 1 ){
							foreach($pluses[0]['remarks'] as $remark){
								if($i >= 1) {
										$msg_school .= '
										<p><input class="text" type="text" name="edit_pluses[0][remarks][]" value="'.$remark.'"><button class="delete_field" onclick="return false;">削除</button></p>';}
								$i++;
							}
						}
						$msg_school .= '
							<button class="add_button" id="add_plus_remarks0" onclick="add_field(\'plus\',\'remarks\',\'0\');return false;">特記事項を追加する</button>
						</td>
					</tr></table></td></tr>';

					$i = 0;
					foreach ($pluses as $plus) {
						if ($i >= 1) {
						$msg_school .='<tr class="plus_item" number='.$i.' data-id="'.$plus['id'].'"><td class="border_none" colspan=3>
					<table>
						<tr>
							<td class="label first" rowspan="6">プラスアルファ<br><button class="delete_item" onclick="delete_item(\'plus_item\',\''.$i.'\');return false;">削除</button></td>
							<td class="label second" nowrap>タイトル</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_pluses['.$i.'][title]" value="'.$plus['title'].'">
								<input type="hidden" name="edit_pluses['.$i.'][id]" value="'.$plus['id'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>内容</td>
							<td class="infield third" >
								<textarea name="edit_pluses['.$i.'][body]">'.$plus['body'].'</textarea>
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>期間</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_pluses['.$i.'][period]" value="'.$plus['period'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>対象</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_pluses['.$i.'][target]" value="'.$plus['target'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>条件</td>
							<td class="infield third" >
								<input class="text" type="text" name="edit_pluses['.$i.'][cond]" value="'.$plus['cond'].'">
							</td>
						</tr>
						<tr>
							<td class="label second" nowrap>特記事項</td>
							<td class="infield third" >';
						foreach($plus['remarks'] as $remark){
						$msg_school .= '
								<p><input class="text" type="text" name="edit_pluses['.$i.'][remarks][]" value="'.$remark.'"><button class="delete_field" onclick="return false;">削除</button></p>
								';}
						$msg_school .= '
								<button class="add_button" id="add_plus_remarks'.$i.'" onclick="add_field(\'plus\',\'remarks\',\''.$i.'\');return false;">特記事項を追加する</button>
							</td>
						</tr></table></td></tr>';
						}
					$i++;
					}
		$msg_school .='
						<tr id="add_plus_item" class="stop"><td class="add_button" colspan="3"><button class="add_button" onclick="add_item(\'plus_item\');return false;">プラスアルファを追加する</button></td></tr>
						</tbody>
						<tr>
							<td class="label" nowrap colspan="2">アクティビィティ</td>
							<td class="infield" >
								<textarea name="edit_activity" value="">'.$activity.'</textarea>
							</td>
						</tr>
					</table>
				</td></tr>
			</table>
		</form>';
				echo $msg_school;
				break;

case 'course' :
	$cur_id = (isset($_POST['id'])) ? $_POST['id'] : '';
	$mode = fnc_getpost('mode');
	try {
			$stt = $db->prepare('SELECT name FROM school_course_list WHERE id = "'.$cur_id.'"');
			$stt->execute();
			$msg = '<div class="cont_title">コース一覧</div>';
			$row = $stt->fetch(PDO::FETCH_ASSOC);
			$title = ($mode == 'edit') ? '【コースを編集する】' : '【新しいコースを登録する】';
			$cur_name = $row['name'];

		echo '<div style="margin:0 0 10px 0; font-size:12pt; font-weight:bold;">'.$title.'</div>
				<form id="form_course_edit" method="POST">
				<table id="school_table" class="item_table"><tr><td style="vertical-align:top;">
					<table>
						<tr>
							<td class="label item_name" nowrap>コース名</td>
							<td class="infield">'.field_required('edit_course_name', 100, $cur_name).'</td>
								<input type="hidden" name="edit_course_id" value="'.$cur_id.'">
						</tr>
					</table>
				</td></tr>
						<tr>
						<td  style="text-align:center;">
							<button class="register cancel" onclick="fncHide();fncShowList(\'course_list\');return false;">キャンセル</button>　　　
							<button class="register submit" id="coursesubmit" onclick="fncPostForm(\'course\',\'form_course_edit\');return false;">登録</button>
						</td>
						</tr>
				</table>
				</form>';
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	
		break;

case 'licence' :
	$cur_id = (isset($_POST['id'])) ? $_POST['id'] : '';
	$mode = fnc_getpost('mode');
	try {
			$stt = $db->prepare('SELECT name FROM school_licence_list WHERE id = "'.$cur_id.'"');
			$stt->execute();
			$msg = '<div class="cont_title">資格一覧</div>';
			$row = $stt->fetch(PDO::FETCH_ASSOC);
			$title = ($mode == 'edit') ? '【資格を編集する】' : '【新しい資格を登録する】';
			$cur_name = $row['name'];

		echo '<div style="margin:0 0 10px 0; font-size:12pt; font-weight:bold;">'.$title.'</div>
				<form id="form_licence_edit" method="POST">
			<table id="school_table" class="item_table"><tr><td style="vertical-align:top;">
				<table>
					<tr>
						<td class="label item_name" width="18%" nowrap>資格名</td>
						<td class="infield">'.field_required('edit_licence_name', 100, $cur_name).'</td>
							<input type="hidden" name="edit_licence_id" value="'.$cur_id.'">
					</tr>
				</table>
			</td></tr>
						<tr>
						<td  style="text-align:center;">
							<button class="register cancel" onclick="fncHide();fncShowList(\'licence_list\');return false;">キャンセル</button>　　　
							<button class="register submit" id="licencesubmit" onclick="fncPostForm(\'licence\',\'form_licence_edit\');return false;">登録</button>
						</td>
						</tr>
						</table>
				</form>';
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	
		break;

case 'point' :
	$cur_id = (isset($_POST['id'])) ? $_POST['id'] : '';
	$mode = fnc_getpost('mode');

	try {
			$stt = $db->prepare('SELECT name FROM school_point_list WHERE id = "'.$cur_id.'"');
			$stt->execute();
			$msg = '<div class="cont_title">ポイント一覧</div>';
			$row = $stt->fetch(PDO::FETCH_ASSOC);
			$title = ($mode == 'edit') ? '【ポイントを編集する】' : '【新しいポイントを登録する】';
			$cur_name = $row['name'];

		echo '<div style="margin:0 0 10px 0; font-size:12pt; font-weight:bold;">'.$title.'</div>
				<form id="form_point_edit" method="POST">
				<table id="school_table" class="item_table"><tr><td style="vertical-align:top;">
					<table>
						<tr>
							<td class="label item_name" width="18%" nowrap>ポイント名</td>
							<td class="infield">'.field_required('edit_point_name', 100, $cur_name).'</td>
								<input type="hidden" name="edit_point_id" value="'.$cur_id.'">
						</tr>
					</table>
			</td></tr>
					<tr>
						<td  style="text-align:center;">
							<button class="register cancel" onclick="fncHide();fncShowList(\'point_list\');return false;">キャンセル</button>　　　
							<button class="register submit" id="pointsubmit" onclick="fncPostForm(\'point\',\'form_point_edit\');return false;">登録</button>
						</td>
					</tr>
				</table>
				</form>';
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	
		break;

case 'school_edit' :
	//School登録
	$edit_id = (isset($_POST['edit_id'])) ? $_POST['edit_id'] : '';
		date_default_timezone_set('Asia/Tokyo');
	$edit_time = date("Y-m-d H:i:s", time());
	$country =  fnc_getpost('edit_country');
	$city =  fnc_getpost('edit_city');
	$name =  fnc_getpost('edit_name');
	$rubi =  fnc_getpost('edit_rubi');
	$nickname =  fnc_getpost('edit_nickname');
	$nickname = preg_replace("/( |　)/", "", $nickname);
	//ロゴ画像処理
	if(!empty($_FILES['edit_logo']['name'])) {
		$tmp_logo =  $_FILES['edit_logo']['tmp_name'];
		$logo = dirname(__FILE__).'/../images/logo/'.$_FILES['edit_logo']['name'];
		rename($tmp_logo, $logo);
		//localhost
		$logo = '/mailsystem/mem/images/logo/'.$_FILES['edit_logo']['name'];
		} else {$logo = fnc_getpost('edit_logo_url');};
	$course =  implode(',',fnc_post_array('edit_course'));
	$licence =  implode(',',fnc_post_array('edit_licence'));
	$point =  implode(',',fnc_post_array('edit_point'));
	$descs =  fnc_getpost('edit_descs');
	$points =  fnc_getpost('edit_points');
		$i = 0;
		foreach($points as $p){
			$points[$i]['body'] = implode(',',$p['body']);
			$i++;
		}
	$cmps =  fnc_getpost('edit_cmps');
	$level =  fnc_getpost('edit_level');
	$progs =  fnc_getpost('edit_progs');
		$i = 0;
		foreach($progs as $prog){
			if(empty($prog['remarks'])) {
				$progs[$i]['remarks'] = '';
			} else {
				$progs[$i]['remarks'] = implode(',',$prog['remarks']);
			}
			$i++;
		}
	$pluses =  fnc_getpost('edit_pluses');
		$i = 0;
		foreach($pluses as $plus){
			$pluses[$i]['remarks'] = implode(',',$plus['remarks']);
			$i++;
		}
	$activity =  fnc_getpost('edit_activity');
	$blog =  fnc_getpost('edit_blog');
	$voice_url =  fnc_getpost('edit_voice_url');
	$search_word = fnc_getpost('edit_search_word');
	$caption = fnc_getpost('edit_caption');
	//パンフレット処理
	$pamphlets = [];
	$pamphlet = fnc_getpost('edit_pamphlet');
	$i = 0;
	while ($i < count($_FILES['edit_pamphlet_pdf']['name'])) {
		if (!empty($_FILES['edit_pamphlet_pdf']['name'][$i])) {
			$path = dirname(__FILE__) . '/../../../school/pamphlet/' . $country . '/' . $pamphlet[$i]["year"] . '/' . $pamphlet[$i]["language"];
			if (!is_dir($path))
				mkdir($path, 0775, true);
			$tmp_pamphlet =  $_FILES['edit_pamphlet_pdf']['tmp_name'][$i];
			$pamphlets[$i]['url'] = $path . '/' . $_FILES['edit_pamphlet_pdf']['name'][$i];
			rename($tmp_pamphlet, $pamphlets[$i]['url']);
			chmod($pamphlets[$i]['url'], 0775);
			//テスト環境
			$pamphlets[$i]['url'] = '/school/pamphlet/' . $country . '/' . $pamphlet[$i]["year"] . '/' . $pamphlet[$i]["language"] . '/' . $_FILES['edit_pamphlet_pdf']['name'][$i];
		} else {
			$url = fnc_getpost('edit_pamphlet_urls');
			$pamphlets[$i]['url'] = $url[$i];
		}
		$ids = fnc_getpost('edit_pamphlet_id');
		$pamphlets[$i]['id'] = $ids[$i];
		$pamphlets[$i]['year'] = $pamphlet[$i]['year'];
		$pamphlets[$i]['language'] = $pamphlet[$i]['language'];
		$i++;
	}
	//スライド画像処理
	$i = 0;
	while ($i < count($_FILES['edit_image']['name'])) {
		if (!empty($_FILES['edit_image']['name'][$i])){
			$datetime = date('YnjHi',time());
			$tmp_slide =  $_FILES['edit_image']['tmp_name'][$i];
			$slides[$i]['image'] = dirname(__FILE__).'/../images/slide/'.$datetime.$_FILES['edit_image']['name'][$i];
			rename($tmp_slide, $slides[$i]['image']);
			//テスト環境
			$slides[$i]['image'] = '/mailsystem/mem/images/slide/'.$datetime.$_FILES['edit_image']['name'][$i];
		} else {
			$images = fnc_getpost('edit_image_urls');
			$slides[$i]['image'] = $images[$i];
		}
		$videos = fnc_getpost('edit_videos');
		$ids = fnc_getpost('edit_slide_id');
		$slides[$i]['video'] = $videos[$i];
		$slides[$i]['id'] = $ids[$i];
		$i++;
	}
	$voices =  fnc_getpost('edit_voices');

	if (empty($edit_id)) {
		//新規登録
		$sql  = 'INSERT INTO p_school_list (';
		$sql .= 'edit_time, country,city,name,rubi,nickname,logo,course,licence,point,level,activity,blog,voice_url,search_word,caption';
		$sql .= ') VALUES (';
		$sql .= ' :edit_time, :country,:city,:name,:rubi,:nickname,:logo,:course,:licence,:point,:level,:activity,:blog,:voice_url,:search_word,:caption ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':edit_time', $edit_time);
		$stt->bindvalue(':country', $country);
		$stt->bindvalue(':city', $city);
		$stt->bindvalue(':name', $name);
		$stt->bindvalue(':rubi', $rubi);
		$stt->bindvalue(':nickname', $nickname);
		$stt->bindvalue(':logo', $logo);
		$stt->bindvalue(':course', $course);
		$stt->bindvalue(':licence', $licence);
		$stt->bindvalue(':point', $point);
		$stt->bindvalue(':level', $level);
		$stt->bindvalue(':activity', $activity);
		$stt->bindvalue(':blog', $blog);
		$stt->bindvalue(':voice_url', $voice_url);
		$stt->bindvalue(':search_word', $search_word);
		$stt->bindvalue(':caption', $caption);
		$stt->execute();
		$arr = array(
					array(
					"result" => "OK",
					"msg"  => "登録しました"
					));

		$last_id = $db->lastinsertid();

		foreach($descs as $desc) {
			$sql  = 'INSERT INTO p_school_desc (';
			$sql .= ' school_id, title, body ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:title,:body ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $last_id);
			$stt->bindvalue(':title', $desc['title']);
			$stt->bindvalue(':body', $desc['body']);
			$stt->execute();
		}
		foreach($points as $point) {
			$sql  = 'INSERT INTO p_school_point (';
			$sql .= ' school_id, title, body ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:title,:body ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $last_id);
			$stt->bindvalue(':title', $point['title']);
			$stt->bindvalue(':body', $point['body']);
			$stt->execute();
		};
		foreach($cmps as $cmp) {
			$sql  = 'INSERT INTO p_school_cmp (';
			$sql .= ' school_id, name, address, student, eop, jpn, dorm, intro, country, embed ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:name,:address,:student,:eop,:jpn,:dorm,:intro,:country,:embed ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $last_id);
			$stt->bindvalue(':name', $cmp['name']);
			$stt->bindvalue(':address', $cmp['address']);
			$stt->bindvalue(':student', $cmp['student']);
			$stt->bindvalue(':eop', $cmp['eop']);
			$stt->bindvalue(':jpn', $cmp['jpn']);
			$stt->bindvalue(':dorm', $cmp['dorm']);
			$stt->bindvalue(':intro', $cmp['intro']);
			$stt->bindvalue(':country', $cmp['country']);
			$stt->bindvalue(':embed', $cmp['embed']);
			$stt->execute();
		}
		foreach($progs as $prog) {
			$sql  = 'INSERT INTO p_school_prog (';
			$sql .= ' school_id, title, body, period, target, cond, remarks ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:title,:body,:period,:target,:cond,:remarks ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $last_id);
			$stt->bindvalue(':title', $prog['title']);
			$stt->bindvalue(':body', $prog['body']);
			$stt->bindvalue(':period', $prog['period']);
			$stt->bindvalue(':target', $prog['target']);
			$stt->bindvalue(':cond', $prog['cond']);
			$stt->bindvalue(':remarks', $prog['remarks']);
			$stt->execute();
		}
		foreach($pluses as $plus) {
			$sql  = 'INSERT INTO p_school_plus (';
			$sql .= ' school_id, title, body, period, target, cond, remarks ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:title,:body,:period,:target,:cond,:remarks ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $last_id);
			$stt->bindvalue(':title', $plus['title']);
			$stt->bindvalue(':body', $plus['body']);
			$stt->bindvalue(':period', $plus['period']);
			$stt->bindvalue(':target', $plus['target']);
			$stt->bindvalue(':cond', $plus['cond']);
			$stt->bindvalue(':remarks', $plus['remarks']);
			$stt->execute();
		}
		foreach($voices as $voice) {
			$sql  = 'INSERT INTO p_school_voice (';
			$sql .= ' school_id, icon, body ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:icon,:body ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $last_id);
			$stt->bindvalue(':icon', $voice['icon']);
			$stt->bindvalue(':body', $voice['body']);
			$stt->execute();
		}
		foreach($slides as $slide) {
			$sql  = 'INSERT INTO p_school_slide (';
			$sql .= ' school_id, image, video ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:image,:video ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $last_id);
			$stt->bindvalue(':image', $slide['image']);
			$stt->bindvalue(':video', $slide['video']);
			$stt->execute();
		}
		foreach($pamphlets as $pamphlet) {
			$sql  = 'INSERT INTO p_school_pamphlet (';
			$sql .= ' school_id, year, language, url ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id, :year, :language, :url ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $last_id);
			$stt->bindvalue(':year', $pamphlet['year']);
			$stt->bindvalue(':language', $pamphlet['language']);
			$stt->bindvalue(':url', $pamphlet['url']);
			$stt->execute();
		}
	} else {
		//編集登録
		$sql  = 'UPDATE p_school_list SET ';
		$sql .='edit_time = :edit_time';
		$sql .=',country = :country';
		$sql .=',city = :city';
		$sql .=',name = :name';
		$sql .=',rubi = :rubi';
		$sql .=',nickname = :nickname';
		$sql .=',logo = :logo';
		$sql .=',course = :course';
		$sql .=',licence = :licence';
		$sql .=',point = :point';
		$sql .=',level = :level';
		$sql .=',activity = :activity';
		$sql .=',blog = :blog';
		$sql .=',voice_url = :voice_url';
		$sql .=',search_word = :search_word';
		$sql .=',caption = :caption';
		$sql .= ' WHERE id = :edit_id';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':edit_time', $edit_time);
		$stt->bindvalue(':country', $country);
		$stt->bindvalue(':city', $city);
		$stt->bindvalue(':name', $name);
		$stt->bindvalue(':rubi', $rubi);
		$stt->bindvalue(':nickname', $nickname);
		$stt->bindvalue(':logo', $logo);
		$stt->bindvalue(':course', $course);
		$stt->bindvalue(':licence', $licence);
		$stt->bindvalue(':point', $point);
		$stt->bindvalue(':level', $level);
		$stt->bindvalue(':activity', $activity);
		$stt->bindvalue(':blog', $blog);
		$stt->bindvalue(':voice_url', $voice_url);
		$stt->bindvalue(':search_word', $search_word);
		$stt->bindvalue(':caption', $caption);
		$stt->bindvalue(':edit_id', $edit_id);
		$stt->execute();
		$arr = array(
			array(
			"result" => "OK",
			"msg"  => "更新しました"
			)
		);

		foreach($descs as $desc) {
			if (!empty($desc['id'])){
			$sql  = 'UPDATE p_school_desc SET ';
			$sql .= ' school_id = :school_id';
			$sql .=',title = :title';
			$sql .=',body = :body';
			$sql .= ' WHERE id = :id';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':title', $desc['title']);
			$stt->bindvalue(':body', $desc['body']);
			$stt->bindvalue(':id', $desc['id']);
			$stt->execute();
			} else {
			$sql  = 'INSERT INTO p_school_desc (';
			$sql .= ' school_id, title, body ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:title,:body ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':title', $desc['title']);
			$stt->bindvalue(':body', $desc['body']);
			$stt->execute();
			}
		}
		foreach($points as $point) {
			if (!empty($point['id'])){
			$sql  = 'UPDATE p_school_point SET ';
			$sql .= ' school_id = :school_id';
			$sql .= ',title = :title';
			$sql .= ',body = :body';
			$sql .= ' WHERE id = :id';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':title', $point['title']);
			$stt->bindvalue(':body', $point['body']);
			$stt->bindvalue(':id', $point['id']);
			$stt->execute();
			} else {
			$sql  = 'INSERT INTO p_school_point (';
			$sql .= ' school_id, title, body ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:title,:body ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':title', $point['title']);
			$stt->bindvalue(':body', $point['body']);
			$stt->execute();
			}
		};
		foreach($cmps as $cmp) {
			if (!empty($cmp['id'])){
			$sql  = 'UPDATE p_school_cmp SET ';
			$sql .= ' school_id = :school_id';
			$sql .= ',name = :name';
			$sql .= ',address = :address';
			$sql .= ',student = :student';
			$sql .= ',eop = :eop';
			$sql .= ',jpn = :jpn';
			$sql .= ',dorm = :dorm';
			$sql .= ',intro = :intro';
			$sql .= ',country = :country';
			$sql .= ',embed = :embed';
			$sql .= ' WHERE id = :id';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':name', $cmp['name']);
			$stt->bindvalue(':address', $cmp['address']);
			$stt->bindvalue(':student', $cmp['student']);
			$stt->bindvalue(':eop', $cmp['eop']);
			$stt->bindvalue(':jpn', $cmp['jpn']);
			$stt->bindvalue(':dorm', $cmp['dorm']);
			$stt->bindvalue(':intro', $cmp['intro']);
			$stt->bindvalue(':country', $cmp['country']);
			$stt->bindvalue(':embed', $cmp['embed']);
			$stt->bindvalue(':id', $cmp['id']);
			$stt->execute();
			} else {
			$sql  = 'INSERT INTO p_school_cmp (';
			$sql .= ' school_id, name, address, student, eop, jpn, dorm, intro, country, embed ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:name,:address,:student,:eop,:jpn,:dorm,:intro,:country,:embed ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':name', $cmp['name']);
			$stt->bindvalue(':address', $cmp['address']);
			$stt->bindvalue(':student', $cmp['student']);
			$stt->bindvalue(':eop', $cmp['eop']);
			$stt->bindvalue(':jpn', $cmp['jpn']);
			$stt->bindvalue(':dorm', $cmp['dorm']);
			$stt->bindvalue(':intro', $cmp['intro']);
			$stt->bindvalue(':country', $cmp['country']);
			$stt->bindvalue(':embed', $cmp['embed']);
			$stt->execute();
			}
		}
		foreach($progs as $prog) {
			if (!empty($prog['id'])){
			$sql  = 'UPDATE p_school_prog SET ';
			$sql .= ' school_id = :school_id';
			$sql .= ',title = :title';
			$sql .= ',body = :body';
			$sql .= ',period = :period';
			$sql .= ',target = :target';
			$sql .= ',cond = :cond';
			$sql .= ',remarks = :remarks';
			$sql .= ' WHERE id = :id';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':title', $prog['title']);
			$stt->bindvalue(':body', $prog['body']);
			$stt->bindvalue(':period', $prog['period']);
			$stt->bindvalue(':target', $prog['target']);
			$stt->bindvalue(':cond', $prog['cond']);
			$stt->bindvalue(':remarks', $prog['remarks']);
			$stt->bindvalue(':id', $prog['id']);
			$stt->execute();
			} else {
			$sql  = 'INSERT INTO p_school_prog (';
			$sql .= ' school_id, title, body, period, target, cond, remarks ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:title,:body,:period,:target,:cond,:remarks ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':title', $prog['title']);
			$stt->bindvalue(':body', $prog['body']);
			$stt->bindvalue(':period', $prog['period']);
			$stt->bindvalue(':target', $prog['target']);
			$stt->bindvalue(':cond', $prog['cond']);
			$stt->bindvalue(':remarks', $prog['remarks']);
			$stt->execute();
			}
		}
		foreach($pluses as $plus) {
			if (!empty($plus['id'])){
			$sql  = 'UPDATE p_school_plus SET ';
			$sql .= ' school_id = :school_id';
			$sql .= ',title = :title';
			$sql .= ',body = :body';
			$sql .= ',period = :period';
			$sql .= ',target = :target';
			$sql .= ',cond = :cond';
			$sql .= ',remarks = :remarks';
			$sql .= ' WHERE id = :id';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':title', $plus['title']);
			$stt->bindvalue(':body', $plus['body']);
			$stt->bindvalue(':period', $plus['period']);
			$stt->bindvalue(':target', $plus['target']);
			$stt->bindvalue(':cond', $plus['cond']);
			$stt->bindvalue(':remarks', $plus['remarks']);
			$stt->bindvalue(':id', $plus['id']);
			$stt->execute();
			} else {
			$sql  = 'INSERT INTO p_school_plus (';
			$sql .= ' school_id, title, body, period, target, cond, remarks ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:title,:body,:period,:target,:cond,:remarks ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':title', $plus['title']);
			$stt->bindvalue(':body', $plus['body']);
			$stt->bindvalue(':period', $plus['period']);
			$stt->bindvalue(':target', $plus['target']);
			$stt->bindvalue(':cond', $plus['cond']);
			$stt->bindvalue(':remarks', $plus['remarks']);
			$stt->execute();
			}
		}
		foreach($voices as $voice) {
			if (!empty($voice['id'])){
			$sql  = 'UPDATE p_school_voice SET ';
			$sql .= ' school_id = :school_id';
			$sql .=',icon = :icon';
			$sql .=',body = :body';
			$sql .= ' WHERE id = :id';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':icon', $voice['icon']);
			$stt->bindvalue(':body', $voice['body']);
			$stt->bindvalue(':id', $voice['id']);
			$stt->execute();
			} else {
			$sql  = 'INSERT INTO p_school_voice (';
			$sql .= ' school_id, icon, body ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:icon,:body ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':icon', $voice['icon']);
			$stt->bindvalue(':body', $voice['body']);
			$stt->execute();
			}
		}
		foreach($slides as $slide) {
			if (!empty($slide['id'])){
			$sql  = 'UPDATE p_school_slide SET ';
			$sql .= ' school_id = :school_id';
			$sql .=',image = :image';
			$sql .=',video = :video';
			$sql .= ' WHERE id = :id';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':image', $slide['image']);
			$stt->bindvalue(':video', $slide['video']);
			$stt->bindvalue(':id', $slide['id']);
			$stt->execute();
			} else {
			$sql  = 'INSERT INTO p_school_slide (';
			$sql .= ' school_id, image, video ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id,:image,:video ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':image', $slide['image']);
			$stt->bindvalue(':video', $slide['video']);
			$stt->execute();
			}
		}
		foreach($pamphlets as $pamphlet) {
			if (!empty($pamphlet['id'])){
			$sql  = 'UPDATE p_school_pamphlet SET ';
			$sql .= ' school_id = :school_id';
			$sql .=', year = :year';
			$sql .=', language = :language';
			$sql .=', url = :url';
			$sql .= ' WHERE id = :id';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':year', $pamphlet['year']);
			$stt->bindvalue(':language', $pamphlet['language']);
			$stt->bindvalue(':url', $pamphlet['url']);
			$stt->bindvalue(':id', $pamphlet['id']);
			$stt->execute();
			} else {
			$sql  = 'INSERT INTO p_school_pamphlet (';
			$sql .= ' school_id, year, language, url ';
			$sql .= ') VALUES (';
			$sql .= ' :school_id, :year, :language, :url ';
			$sql .= ')';
			$stt = $db->prepare($sql);
			$stt->bindvalue(':school_id', $edit_id);
			$stt->bindvalue(':year', $pamphlet['year']);
			$stt->bindvalue(':language', $pamphlet['language']);
			$stt->bindvalue(':url', $pamphlet['url']);
			$stt->execute();
			}
		}
	}
	$msg = json_encode($arr);
	echo $msg;
	break;

case 'course_edit' :

	//コース登録
	$edit_course_id 	  = (isset($_POST['edit_course_id'])) ? $_POST['edit_course_id'] : '';
	$edit_course_name     = fnc_getpost('edit_course_name');

	if (empty($edit_course_id)) {
		//新規登録
		$sql = 'SELECT MAX(sort_number) FROM school_course_list';
		$stt = $db->prepare($sql);
		$stt->execute();
		$row = $stt->fetch(PDO::FETCH_ASSOC);
		$max_sort_number = $row['MAX(sort_number)'];
		$max_sort_number++;

		$sql  = 'INSERT INTO school_course_list (';
		$sql .= ' sort_number, name ';
		$sql .= ') VALUES (';
		$sql .= ' :sort_number, :name ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindValue(':sort_number'	, $max_sort_number);
		$stt->bindValue(':name'	, $edit_course_name);
		$stt->execute();
		$arr = array(
					array(
					"result" => "OK",
					"msg"  => "登録しました"
					));
	} else {
		//編集登録
		$sql  = 'UPDATE school_course_list SET ';
		$sql .= 'name = :name';
		$sql .= ' WHERE id = :id';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':name',$edit_course_name);
		$stt->bindvalue(':id',$edit_course_id);
		$stt->execute();
		$arr = array(
			array(
			"result" => "OK",
			"msg"  => "更新しました"
			)
		);
	}
	$msg = json_encode($arr);
	echo $msg;

	break;

case 'licence_edit' :

	//資格登録
	$edit_licence_id 	   = (isset($_POST['edit_licence_id'])) ? $_POST['edit_licence_id'] : '';
	$edit_licence_name     = fnc_getpost('edit_licence_name');

	if (empty($edit_licence_id)) {
		//新規登録
		$sql = 'SELECT MAX(sort_number) FROM school_licence_list';
		$stt = $db->prepare($sql);
		$stt->execute();
		$row = $stt->fetch(PDO::FETCH_ASSOC);
		$max_sort_number = $row['MAX(sort_number)'];
		$max_sort_number++;

		$sql  = 'INSERT INTO school_licence_list (';
		$sql .= ' sort_number, name ';
		$sql .= ') VALUES (';
		$sql .= ' :sort_number, :name ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindValue(':sort_number'	, $max_sort_number);
		$stt->bindValue(':name'	, $edit_licence_name);
		$stt->execute();
		$arr = array(
					array(
					"result" => "OK",
					"msg"  => "登録しました"
					));
	} else {
		//編集登録
		$sql  = 'UPDATE school_licence_list SET ';
		$sql .= 'name = :name';
		$sql .= ' WHERE id = :id';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':name',$edit_licence_name);
		$stt->bindvalue(':id',$edit_licence_id);
		$stt->execute();
		$arr = array(
			array(
			"result" => "OK",
			"msg"  => "更新しました"
			)
		);
	}
	$msg = json_encode($arr);
	echo $msg;
	break;

case 'point_edit' :

	//ポイント登録
	$edit_point_id 	   	 = (isset($_POST['edit_point_id'])) ? $_POST['edit_point_id'] : '';
	$edit_point_name     = fnc_getpost('edit_point_name');

	if (empty($edit_point_id)) {
		//新規登録
		$sql = 'SELECT MAX(sort_number) FROM school_point_list';
		$stt = $db->prepare($sql);
		$stt->execute();
		$row = $stt->fetch(PDO::FETCH_ASSOC);
		$max_sort_number = $row['MAX(sort_number)'];
		$max_sort_number++;

		$sql  = 'INSERT INTO school_point_list (';
		$sql .= ' sort_number, name ';
		$sql .= ') VALUES (';
		$sql .= ' :sort_number, :name ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindValue(':sort_number'	, $max_sort_number);
		$stt->bindValue(':name'	, $edit_point_name);
		$stt->execute();
		$arr = array(
					array(
					"result" => "OK",
					"msg"  => "登録しました"
					));
	} else {
		//編集登録
		$sql  = 'UPDATE school_point_list SET ';
		$sql .= 'name = :name';
		$sql .= ' WHERE id = :id';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':name',$edit_point_name);
		$stt->bindvalue(':id',$edit_point_id);
		$stt->execute();
		$arr = array(
			array(
			"result" => "OK",
			"msg"  => "更新しました"
			)
		);
	}
	$msg = json_encode($arr);
	echo $msg;
	break;

case 'school_list' :

	try {
		$stt = $db->prepare('SELECT id, nickname, country, edit_time FROM p_school_list ORDER BY id DESC');
		$stt->execute();
		$idx = 0;
		$msg = '<button class="register" onclick="fncShowEdit(\'school\',\'\');">新しい語学学校を登録する</button>';
		$msg .= '<a href="/school/?preview=true" target="_blank"><button class="register">プレヴュー</button></a>';
		$msg .= '<table class="list_table" style="margin-bottom: 10px">';
		$msg .= '<thead><tr class="head"><th class="list_name">学校名</th><th class="list_country">国名</th><th>編集中</th><th>公開中</th><th colspan="3">操作</th></tr></thead><tbody id="sortable">';
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$cur_id = $row['id'];
			$cur_name = $row['nickname'];
			$cur_country = $row['country'];
			$edit_time = $row['edit_time'];
			try{
				$stt2 = $db->prepare('SELECT edit_time FROM school_list WHERE id = "'.$cur_id.'"');
				$stt2->execute();
				while($row2 = $stt2->fetch(PDO::FETCH_ASSOC)){
					$publish_time[$idx] = $row2['edit_time'];
				}
				} catch (PDOException $e) {
					die($e->getMessage());
				}
			if (!empty($publish_time[$idx])) {
				if ($edit_time == $publish_time[$idx]) {
					$button_disable = '';
					$edited = '';
					$published = '●';
				} else {
					$button_disable = '';
					$edited = '●';
					$published = '●';
				}
			} else {
				$button_disable = 'disabled';
				$edited = '●';
				$published = '';
			}
			$msg .= '<tr>
					<td class="list_name">'.$cur_name.'</td>
					<td class="list_country">'.$cur_country.'</td>
					<td>'.$edited.'</td>
					<td>'.$published.'</td>
					<td class="list_control"><button class="edit" href="" onclick="fncShowEdit(\'school\',\''.$cur_id.'\');return false;" >編集</button></td>
					<td class="list_control"><button class="edit" href="" onclick="fncSchoolPublish(\''.$cur_id.'\');return false;" >保存して公開</button></td>
					<td class="list_control"><button class="delete" onclick="fncDelete(\'school\',\''.$cur_id.'\');return false;" '.$button_disable.'>非公開</button></td></tr>';
		$idx++;
		}
		$msg .= '</tbody></table>';
		echo $msg;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	break;

case 'course_list' :

	try {
		$stt = $db->prepare('SELECT id, sort_number, name FROM school_course_list ORDER BY sort_number');
		$stt->execute();
		$idx = 0;
		$msg = '<button class="register" onclick="fncShowEdit(\'course\',\'\');">新しいコースを登録する</button>';
		$msg .= '<table class="list_table" style="margin-bottom: 10px">';
		$msg .= '<thead><tr class="head"><th class="sort_number">順番</th><th class="list_name">コース名</th><th colspan="2">操作</th></tr></thead><tbody id="sortable">';
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$cur_id = $row['id'];
			$cur_sort_number = $row['sort_number'];
			$cur_name = $row['name'];
			$msg .= '<tr class="items" sort_number='.$cur_sort_number.' number="'.$cur_id.'">
					<td class="sort_number">'.$cur_sort_number.'</td>
					<td class="list_name">'.$cur_name.'</td>
					<td class="list_control"><button class="edit" href="" onclick="fncShowEdit(\'course\',\''.$cur_id.'\',\'edit\');return false;">編集</button></td>
					<td class="list_control"><button class="delete" href="" onclick="fncDelete(\'course_list\',\''.$cur_id.'\');fncShowList(\'course_list\');return false;" >削除</button></td></tr>';
		}
		$msg .= '</tbody></table>';
		$msg .= '<script>
					jQuery(function(){
						jQuery("#sortable").sortable();
						jQuery("#sortable").disableSelection();
						jQuery("#sortable").sortable({
							stop : function () {
								fncChangeAll(\'course_list\');
							}
						});

						});
				</script>';
		echo $msg;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	break;

case 'licence_list' :

	try {
		$stt = $db->prepare('SELECT id, sort_number, name FROM school_licence_list ORDER BY sort_number');
		$stt->execute();
		$idx = 0;
		$msg = '<button class="register" onclick="fncShowEdit(\'licence\',\'\');">新しい資格を登録する</button>';
		$msg .= '<table class="list_table" style="margin-bottom: 10px">';
		$msg .= '<thead><tr class="head"><th>順番</th><th>資格名</th><th colspan="2">操作</th></tr></thead><tbody id="sortable">';
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$cur_id = $row['id'];
			$cur_sort_number = $row['sort_number'];
			$cur_name = $row['name'];
			$msg .= '<tr class="items" sort_number='.$cur_sort_number.' number="'.$cur_id.'">
					<td class="sort_number">'.$cur_sort_number.'</td>
					<td class="list_name">'.$cur_name.'</td>
					<td class="list_control"><button class="edit" href="" onclick="fncShowEdit(\'licence\',\''.$cur_id.'\',\'edit\');return false;">編集</button></td>
					<td class="list_control"><button class="delete" href="" onclick="fncDelete(\'licence_list\',\''.$cur_id.'\');fncShowList(\'licence_list\');return false;" >削除</button></td></tr>';
		}
		$msg .= '</tbody></table>';
		$msg .= '<script>
					jQuery(function(){
						jQuery("#sortable").sortable();
						jQuery("#sortable").disableSelection();
						jQuery("#sortable").sortable({
							stop : function () {
								fncChangeAll(\'licence_list\');
							}
						});
					});
				</script>';
		echo $msg;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	break;

case 'point_list' :

	try {
		$stt = $db->prepare('SELECT id, sort_number, name FROM school_point_list ORDER BY sort_number');
		$stt->execute();
		$idx = 0;
		$msg = '<button class="register" onclick="fncShowEdit(\'point\',\'\');">新しいポイントを登録する</button>';
		$msg .= '<table class="list_table" style="margin-bottom: 10px">';
		$msg .= '<thead><tr class="head"><th>順番</th><th>ポイント</th><th colspan="2">操作</th></tr></thead><tbody id="sortable">';
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$cur_id = $row['id'];
			$cur_sort_number = $row['sort_number'];
			$cur_name = $row['name'];
			$msg .= '<tr class="items" sort_number='.$cur_sort_number.' number="'.$cur_id.'">
					<td class="sort_number">'.$cur_sort_number.'</td>
					<td class="list_name">'.$cur_name.'</td>
					<td class="list_control"><button class="edit" href="" onclick="fncShowEdit(\'point\',\''.$cur_id.'\',\'edit\');return false;">編集</button></td>
					<td class="list_control"><button class="delete" href="" onclick="fncDelete(\'point_list\',\''.$cur_id.'\');fncShowList(\'point_list\');return false;" >削除</button></td></tr>';
		}
		$msg .= '</tbody></table>';
		$msg .= '<script>
					jQuery(function(){
						jQuery("#sortable").sortable();
						jQuery("#sortable").disableSelection();
						jQuery("#sortable").sortable({
							stop : function(){
								fncChangeAll(\'point_list\');
							}
						});
					});
				</script>';
		echo $msg;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	break;

case 'publish' :
	$id = (isset($_POST['id'])) ? $_POST['id'] : '';
	try {
		$stt = $db->prepare('SELECT id,edit_time,country,city,name,rubi,nickname,logo,course,licence,point,level,activity,blog,search_word,caption,voice_url FROM p_school_list WHERE id = "'.$id.'"');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$idx++;
			$cur_id = $row['id'];
			$edit_time = $row['edit_time'];
			$country = $row['country'];
			$city = $row['city'];
			$name = $row['name'];
			$rubi = $row['rubi'];
			$nickname = $row['nickname'];
			$logo = $row['logo'];
			$course = $row['course'];;
			$licence = $row['licence'];
			$point = $row['point'];
			$level = $row['level'];
			$activity = $row['activity'];
			$blog = $row['blog'];
			$search_word = $row['search_word'];
			$caption = $row['caption'];
			$voice_url = $row['voice_url'];
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	try {
		$stt = $db->prepare('SELECT id, title, body, sort_number FROM p_school_desc WHERE school_id = "'.$cur_id.'"');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$descs[$idx]['id'] = $row['id'];
			$descs[$idx]['title'] = $row['title'];
			$descs[$idx]['body'] = $row['body'];
			$descs[$idx]['sort_number'] = $row['sort_number'];
			$idx++;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	try {
		$stt = $db->prepare('SELECT id, title, body, sort_number FROM p_school_point WHERE school_id = "'.$cur_id.'"');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$points[$idx]['id'] = $row['id'];
			$points[$idx]['title'] = $row['title'];
			$points[$idx]['body'] = $row['body'];
			$points[$idx]['sort_number'] = $row['sort_number'];
			$idx++;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	try {
		$stt = $db->prepare('SELECT id, name, address, student, eop, jpn, dorm, intro, country, sort_number, embed FROM p_school_cmp WHERE school_id = "'.$cur_id.'"');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$cmps[$idx]['id'] = $row['id'];
			$cmps[$idx]['name'] = $row['name'];
			$cmps[$idx]['address'] = $row['address'];
			$cmps[$idx]['student'] = $row['student'];
			$cmps[$idx]['eop'] = $row['eop'];
			$cmps[$idx]['jpn'] = $row['jpn'];
			$cmps[$idx]['dorm'] = $row['dorm'];
			$cmps[$idx]['intro'] = $row['intro'];
			$cmps[$idx]['country'] = $row['country'];
			$cmps[$idx]['sort_number'] = $row['sort_number'];
			$cmps[$idx]['embed'] = $row['embed'];
			$idx++;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	try {
		$stt = $db->prepare('SELECT id, title, body, period, target, cond, remarks, sort_number FROM p_school_prog WHERE school_id = "'.$cur_id.'"');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$progs[$idx]['id'] = $row['id'];
			$progs[$idx]['title'] = $row['title'];
			$progs[$idx]['body'] = $row['body'];
			$progs[$idx]['period'] = $row['period'];
			$progs[$idx]['target'] = $row['target'];
			$progs[$idx]['cond'] = $row['cond'];
			$progs[$idx]['remarks'] = $row['remarks'];
			$progs[$idx]['sort_number'] = $row['sort_number'];
			$idx++;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	try {
		$stt = $db->prepare('SELECT id, title, body, period, target, cond, remarks, sort_number FROM p_school_plus WHERE school_id = "'.$cur_id.'"');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$pluses[$idx]['id'] = $row['id'];
			$pluses[$idx]['title'] = $row['title'];
			$pluses[$idx]['body'] = $row['body'];
			$pluses[$idx]['period'] = $row['period'];
			$pluses[$idx]['target'] = $row['target'];
			$pluses[$idx]['cond'] = $row['cond'];
			$pluses[$idx]['remarks'] = $row['remarks'];
			$pluses[$idx]['sort_number'] = $row['sort_number'];
			$idx++;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	try {
		$stt = $db->prepare('SELECT id, icon, body, sort_number FROM p_school_voice WHERE school_id = "'.$cur_id.'"');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$voices[$idx]['id'] = $row['id'];
			$voices[$idx]['icon'] = $row['icon'];
			$voices[$idx]['body'] = $row['body'];
			$voices[$idx]['sort_number'] = $row['sort_number'];
			$idx++;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	try {
		$stt = $db->prepare('SELECT id, image, video, sort_number FROM p_school_slide WHERE school_id = "'.$cur_id.'"');
		$stt->execute();
		$idx = 0;
		while($row = $stt->fetch(PDO::FETCH_ASSOC)){
			$slides[$idx]['id'] = $row['id'];
			$slides[$idx]['image'] = $row['image'];
			$slides[$idx]['video'] = $row['video'];
			$slides[$idx]['sort_number'] = $row['sort_number'];
			$idx++;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	$sql  = 'INSERT INTO school_list (';
	$sql .= ' id, edit_time, country,city,name,rubi,nickname,logo,course,licence,point,level,activity,blog,search_word,caption,voice_url ';
	$sql .= ') VALUES (';
	$sql .= ' :id, :edit_time, :country,:city,:name,:rubi,:nickname,:logo,:course,:licence,:point,:level,:activity,:blog,:search_word,:caption,:voice_url ';
	$sql .= ')';
	$stt = $db->prepare($sql);
	$stt->bindvalue(':id', $id);
	$stt->bindvalue(':edit_time', $edit_time);
	$stt->bindvalue(':country', $country);
	$stt->bindvalue(':city', $city);
	$stt->bindvalue(':name', $name);
	$stt->bindvalue(':rubi', $rubi);
	$stt->bindvalue(':nickname', $nickname);
	$stt->bindvalue(':logo', $logo);
	$stt->bindvalue(':course', $course);
	$stt->bindvalue(':licence', $licence);
	$stt->bindvalue(':point', $point);
	$stt->bindvalue(':level', $level);
	$stt->bindvalue(':activity', $activity);
	$stt->bindvalue(':blog', $blog);
	$stt->bindvalue(':search_word', $search_word);
	$stt->bindvalue(':caption', $caption);
	$stt->bindvalue(':voice_url', $voice_url);
	$stt->execute();
	$arr = array(
				array(
				"result" => "OK",
				"msg"  => "登録しました"
				));

	foreach($descs as $desc) {
		$sql  = 'INSERT INTO school_desc (';
		$sql .= 'id, school_id, title, body, sort_number ';
		$sql .= ') VALUES (';
		$sql .= ':id,:school_id,:title,:body,:sort_number ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':id', $desc['id']);
		$stt->bindvalue(':school_id', $cur_id);
		$stt->bindvalue(':title', $desc['title']);
		$stt->bindvalue(':body', $desc['body']);
		$stt->bindvalue(':sort_number', $desc['sort_number']);
		$stt->execute();
	}
	foreach($points as $point) {
		$sql  = 'INSERT INTO school_point (';
		$sql .= 'id, school_id, title, body, sort_number ';
		$sql .= ') VALUES (';
		$sql .= ':id,:school_id,:title,:body,:sort_number ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':id', $point['id']);
		$stt->bindvalue(':school_id', $cur_id);
		$stt->bindvalue(':title', $point['title']);
		$stt->bindvalue(':body', $point['body']);
		$stt->bindvalue(':sort_number', $point['sort_number']);
		$stt->execute();
	}
	foreach($cmps as $cmp) {
		$sql  = 'INSERT INTO school_cmp (';
		$sql .= ' id, school_id, name, address, student, eop, jpn, dorm, intro, country, sort_number, embed ';
		$sql .= ') VALUES (';
		$sql .= ' :id,:school_id,:name,:address,:student,:eop,:jpn,:dorm,:intro,:country,:sort_number,:embed ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':id', $cmp['id']);
		$stt->bindvalue(':school_id', $cur_id);
		$stt->bindvalue(':name', $cmp['name']);
		$stt->bindvalue(':address', $cmp['address']);
		$stt->bindvalue(':student', $cmp['student']);
		$stt->bindvalue(':eop', $cmp['eop']);
		$stt->bindvalue(':jpn', $cmp['jpn']);
		$stt->bindvalue(':dorm', $cmp['dorm']);
		$stt->bindvalue(':intro', $cmp['intro']);
		$stt->bindvalue(':country', $cmp['country']);
		$stt->bindvalue(':sort_number', $cmp['sort_number']);
		$stt->bindvalue(':embed', $cmp['embed']);
		$stt->execute();
	}
	foreach($progs as $prog) {
		$sql  = 'INSERT INTO school_prog (';
		$sql .= ' id, school_id, title, body, period, target, cond, remarks, sort_number ';
		$sql .= ') VALUES (';
		$sql .= ' :id,:school_id,:title,:body,:period,:target,:cond,:remarks,:sort_number ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':id', $prog['id']);
		$stt->bindvalue(':school_id', $cur_id);
		$stt->bindvalue(':title', $prog['title']);
		$stt->bindvalue(':body', $prog['body']);
		$stt->bindvalue(':period', $prog['period']);
		$stt->bindvalue(':target', $prog['target']);
		$stt->bindvalue(':cond', $prog['cond']);
		$stt->bindvalue(':remarks', $prog['remarks']);
		$stt->bindvalue(':sort_number', $prog['sort_number']);
		$stt->execute();
	}
	foreach($pluses as $plus) {
		$sql  = 'INSERT INTO school_plus (';
		$sql .= ' id, school_id, title, body, period, target, cond, remarks, sort_number ';
		$sql .= ') VALUES (';
		$sql .= ' :id,:school_id,:title,:body,:period,:target,:cond,:remarks,:sort_number ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':id', $plus['id']);
		$stt->bindvalue(':school_id', $cur_id);
		$stt->bindvalue(':title', $plus['title']);
		$stt->bindvalue(':body', $plus['body']);
		$stt->bindvalue(':period', $plus['period']);
		$stt->bindvalue(':target', $plus['target']);
		$stt->bindvalue(':cond', $plus['cond']);
		$stt->bindvalue(':remarks', $plus['remarks']);
		$stt->bindvalue(':sort_number', $plus['sort_number']);
		$stt->execute();
	}
	foreach($voices as $voice) {
		$sql  = 'INSERT INTO school_voice (';
		$sql .= ' id, school_id, icon, body, sort_number ';
		$sql .= ') VALUES (';
		$sql .= ' :id, :school_id,:icon,:body,:sort_number ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':id', $voice['id']);
		$stt->bindvalue(':school_id', $cur_id);
		$stt->bindvalue(':icon', $voice['icon']);
		$stt->bindvalue(':body', $voice['body']);
		$stt->bindvalue(':sort_number', $voice['sort_number']);
		$stt->execute();
	}
	foreach($slides as $slide) {
		$sql  = 'INSERT INTO school_slide (';
		$sql .= ' id, school_id, image, video, sort_number ';
		$sql .= ') VALUES (';
		$sql .= ' :id, :school_id,:image,:video,:sort_number ';
		$sql .= ')';
		$stt = $db->prepare($sql);
		$stt->bindvalue(':id', $slide['id']);
		$stt->bindvalue(':school_id', $cur_id);
		$stt->bindvalue(':image', $slide['image']);
		$stt->bindvalue(':video', $slide['video']);
		$stt->bindvalue(':sort_number', $slide['sort_number']);
		$stt->execute();
	}

	break;

case 'delete' :
	$type = fnc_getpost('type');
	$id = fnc_getpost('id');
	$lists = array('point_list','course_list','licence_list');
	if (in_array($type,$lists)) {
		try {
			$stt = $db->prepare('DELETE FROM school_'.$type.' WHERE id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	} elseif ($type == 'school') {
		try {
			$stt = $db->prepare('DELETE FROM school_list WHERE id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('DELETE FROM school_desc WHERE school_id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('DELETE FROM school_point WHERE school_id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('DELETE FROM school_cmp WHERE school_id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('DELETE FROM school_prog WHERE school_id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('DELETE FROM school_plus WHERE school_id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('DELETE FROM school_voice WHERE school_id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		try {
			$stt = $db->prepare('DELETE FROM school_slide WHERE school_id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	} else {
		try {
			if ($type == "slide"){
				$stt = $db->prepare('SELECT image FROM p_school_slide WHERE id = :id');
				$stt->bindvalue(':id', $id);
				$stt->execute();
				while($row = $stt->fetch(PDO::FETCH_ASSOC)){
					$image = $row['image'];
					if(!empty($image)){
						$res = unlink($image);
					}
				}
			} elseif ($type == "pamphlet") {
				$stt = $db->prepare('SELECT url FROM p_school_pamphlet WHERE id = :id');
				$stt->bindvalue(':id', $id);
				$stt->execute();
				while($row = $stt->fetch(PDO::FETCH_ASSOC)){
					$pdf = $row['url'];
					if(!empty($pdf)){
						$res = unlink(dirname(__FILE__) . '/../../..' . $pdf);
					}
				}
			}
			$stt = $db->prepare('DELETE FROM p_school_'.$type.' WHERE id ='.$id);
			$stt->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

		break;

case 'sort_change' :
	$type = fnc_getpost('type');
	$id = fnc_getpost('id');
	$n = fnc_getpost('n');
	try {
		$sql  = 'UPDATE p_school_'.$type.' SET ';
		$sql .= 'sort_number = "'.$n.'"';
		$sql .= ' WHERE id = "'.$id.'"';
		$stt = $db->prepare($sql);
		$stt->execute();
		$arr = array(
			array(
			"result" => "OK",
			"msg"  => "更新しました"
			)
		);
	} catch (PDOException $e) {
		die($e->getMessage());
	}

}


?>
