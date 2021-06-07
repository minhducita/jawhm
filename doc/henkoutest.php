<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page='留学プログラム変更依頼';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->full_link_tag=true;
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学プログラム変更依頼';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>

<?php

	mb_language("Ja");
	mb_internal_encoding("utf8");

	$e = @$_GET['e'];
	$act = @$_POST['act'];

?>


<h2 class="sec-title">留学プログラム変更依頼</h2>
<div style="padding-left:30px;">


<?php
	if ($act == 'send')	{

		$fname = $_POST['お名前'];
		$fmail = $_POST['連絡用・メールアドレス'];

		// $vmail = 'toiawase@jawhm.or.jp,sodan@jawhm.or.jp,sodan-osaka@jawhm.or.jp,sodan-nagoya@jawhm.or.jp,sodan-fukuoka@jawhm.or.jp';
		$vmail = 'headoffice@jawhm.or.jp';
		$subject = "留学プログラム変更・解約依頼	　".$fname."様";

		$body  = '';
		$body .= '[留学プログラム変更・解約依頼]';
		$body .= chr(10);

		$sqlfront = 'INSERT INTO corona_school_change (';
		$sqlback = ') VALUES (';
		$params = array(
			"お名前"=>"お名前",
			"記入日・年"=>"年",
			"記入日・月"=>"月",
			"記入日・日"=>"日",
			"連絡用・電話番号"=>"電話番号",
			"連絡用・メールアドレス"=>"メールアドレス",
			"変更解約内容"=>"変更解約内容",
			"出発予定月"=>"出発予定月",
			"出発予定国"=>"出発予定国",
			"学校名"=>"学校名",
			"入学日変更・変更後"=>"変更後",
			"同意確認"=>"同意確認",
		);

		foreach($_POST as $post_name => $post_value){
			$body .= chr(10);
			$body .= $post_name." : ".$post_value;
			if(in_array($post_name,array_keys($params))){
				$sqlfront .= $params[$post_name] . ",";
				$sqlback .= "'".$post_value."',";
			}
		}

		$body .= chr(10);
		$body .= chr(10);
		$body .= '--------------------------------------';
		$body .= chr(10);
		foreach($_SERVER as $post_name => $post_value){
			$body .= chr(10);
			$body .= $post_name." : ".$post_value;
		}
		$body .= '';
		$from = mb_encode_mimeheader(mb_convert_encoding($fname,"JIS"))."<$fmail>";
		mb_send_mail($vmail,$subject,$body,"From:".$from);

		$sqlfront .= "insert_date,mailbody";
		$sqlback .= "'".date("Y-m-d H:i:s")."','".$body."')";
		$sql = $sqlfront . $sqlback;
		try {
			$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
			$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->query('SET CHARACTER SET utf8');
			$stt = $db->prepare($sql);

			$stt->execute();

		} catch (Exception $e) {
			die($e->getMessage());
		}

		//mail to customer
		$subject = "【".$fname."様】ご入学日変更完了のお知らせ";
		$body = "";
		$body .= $fname."様".chr(10);
		$body .= chr(10);
		$body .= "いつもお世話になっております。".chr(10);
		$body .= "日本ワーキングホリデー協会です。".chr(10);
		$body .= chr(10);
		$body .= "この度は、留学プログラム変更フォームにご回答いただき誠にありがとうございます。".chr(10);
		$body .= "このメールは、ご回答完了のお知らせのための自動返信メールです。".chr(10);
		$body .= "返信いただくことはできませんのでご注意くださいませ。".chr(10);
		$body .= chr(10);
		$body .= "▼以下の内容で回答を受付いたしました▼".chr(10);
		$body .= "-------------------------------------------".chr(10);
		$body .= "お名前：".$fname."様".chr(10);
		$body .= "ご記入日： ".date("Y/m/d").chr(10);
		$body .= "電話番号： " . $_POST['連絡用・電話番号'] . chr(10);
		$body .= "メールアドレス： " . $fmail . chr(10);
		$body .= "変更後のご入学日： ".$_POST['入学日変更・変更後'].chr(10);
		$body .= "学校名： ".$_POST["学校名"].chr(10);
		$body .= "--------------------------------------------".chr(10);
		$body .= chr(10);
		$body .= "当協会に複数のメールアドレスをご登録いただいているお客様には、".chr(10);
		$body .= "各メールアドレス宛に同じ内容のメールが届いているかと存じます。".chr(10);
		$body .= "ご回答は一つのメールアドレスからのみで構いません。".chr(10);
		$body .= chr(10);
		$body .= "また、本メールを受信したメールアドレス以外での変更のご登録は、".chr(10);
		$body .= "変更システムに反映されない可能性がございます。".chr(10);
		$body .= "必ず本メールを受信したメールアドレス(当協会に登録済のメールアドレス)より、".chr(10);
		$body .= "変更のご登録をいただくようお願い申し上げます。".chr(10);
		$body .= chr(10);
		$body .= "その他ご不明な点ございましたらお気軽にお問い合わせくださいませ。".chr(10);
		$body .= chr(10);
		$body .= "どうぞよろしくお願い致します。".chr(10);
		$body .= chr(10);
		$body .= "日本ワーキングホリデー協会".chr(10);

		$to = mb_encode_mimeheader(mb_convert_encoding($fmail,"JIS"));
		$from = mb_encode_mimeheader(mb_convert_encoding("info@jawhm.or.jp","JIS"))."<info@jawhm.or.jp>";
		mb_send_mail($to,$subject,$body,"From:".$from);

?>
	<p style="margin-top:20px;">
		ご入力ありがとうございました。<br/>
		内容を確認の上、担当者よりご連絡申し上げます。<br/>
	</p>

<?php
	}else{
?>
	<p style="margin:10px 0 6px 0; font-size:10pt; font-weight:bold;">
		申込済み留学プログラムの変更を希望の場合、以下のフォームにご入力お願い致します。<br/>
	</p>
<!--
	<p style="margin:0px 0 10px 0;">
		※メンバー登録は当協会の各サービス提供前の場合のみ取消可能です。<br/>
		　また、登録料の返金を銀行振込にて行う場合は、振込手数料はお客様負担となります。<br/>
	</p>
-->

<script>
function fncCheck()	{
	if (jQuery('#douicheck').get(0).checked)	{
		return confirm('入力内容を送信します。よろしいですか？')
	}else{
		alert('確認にチェックをお願いします。');
	}
	return false;
}
function changeYotei(){
	// $(".school-date").parent().css("visibility","visible");
	// jQuery("#school-select").val(0);
	// renderDates("");
	changeSchool();
}
function changeSchool(){
	var school = $("#school-select").val();
	$(".school-date").parent().css("visibility","visible");
	let country = $("input[name='出発予定国']:checked").val();
	var x = "";
	switch(school){
		case "EC":
			if(country == "AUS"){
				x = ".no-aus-ec";
			}else if(country == "NZ"){
				x = ".no-nz-ec";
			}
		break;
		case "ILSC":
			x = ".no-ilsc";
		break;
		case "IH(Brisbane)":
			x = ".no-ihbri";
		break;
		case "IH(Sydney)":
			x = ".no-ihsyd";
		break;
		case "IH(Vancouver)":
			x = ".no-ihvan";
			x = "";
		break;
		case "UMC":
			x = ".no-umc";
		break;
		case "ILAC":
			x = ".no-ilac";
		break;
		case "NZLC":
			x = ".no-nzlc";
		break;
		case "ELS":
			x = ".no-els";
		break;
		case "SGIC":
			x = ".no-sgic";
		break;
		case "WWSE":
			x = ".no-wwse";
		break;
		case "Browns":
			x = ".no-browns";
		break;
		case "CCE":
			 x = ".no-cce";
			 x = "";
		break;
		case "Discover":
			x = ".no-discover";
		break;
		case "ELC":
			x = ".no-elc";
		break;
		case "Greenwich":
			x = ".no-greenwich";
		break;
		case "AEA":
			x = ".no-aea";
		break;
		case "Tamwood":
			x = ".no-tamwood";
		break;
		case "Bloomsbury":
			x = ".no-bloom";
		break;
	}
	$(x).css("visibility","hidden");
	renderDates(x);
}
function changeCountry(country){
	jQuery("#school-select").val(0);
	$(".school-date").parent().css("visibility","visible");
	$("#school-select option").hide();
	$(".emp").show();
	$("#school-select ."+country).show();
	if(country == "NZ"){
		renderDates("NZ");
	}else{
		renderDates("");
	}
}
function renderDates(x){
	let m = $("input[name='出発予定月']:checked").val();
	let country = $("input[name='出発予定国']:checked").val();
	//not ther anymore-------------------
	if(x!=""){
	// 	$(".m7,m8").parent(":not("+x+")").css("visibility","visible");
	 	$(".m10").parent(":not("+x+")").css("visibility","visible");
	}
	//------------------------------------
	if( country == "NZ" ){
		$(".m12").parent().css("visibility","hidden");
		$(".m11").parent().css("visibility","hidden");
		$(".m10").parent().css("visibility","hidden");
	}
	if(m>=4) {
		$(".m10").parent().css("visibility","hidden");
		$(".m11").parent().css("visibility","hidden");
		$(".m12").parent().css("visibility","hidden");
	}
	if (m==12) {
		$(".m1").parent().css("visibility","hidden");
	}
	if(m==1){
		$(".m10").parent().css("visibility","hidden");
		$(".m11").parent().css("visibility","hidden");
		$(".m12").parent().css("visibility","hidden");
		$(".m1").parent().css("visibility","hidden");
		$(".m2").parent().css("visibility","hidden");
	}
	if(m==2){
		$(".m10").parent().css("visibility","hidden");
		$(".m11").parent().css("visibility","hidden");
		$(".m12").parent().css("visibility","hidden");
		$(".m1").parent().css("visibility","hidden");
		$(".m2").parent().css("visibility","hidden");
		$(".m3").parent().css("visibility","hidden");
	}
	if(m==3){
		$(".m10").parent().css("visibility","hidden");
		$(".m11").parent().css("visibility","hidden");
		$(".m12").parent().css("visibility","hidden");
		$(".m1").parent().css("visibility","hidden");
		$(".m2").parent().css("visibility","hidden");
		$(".m3").parent().css("visibility","hidden");
		$(".m4").parent().css("visibility","hidden");
	}
	note_visibility();
}
function note_visibility(){
	let country = $("input[name='出発予定国']:checked").val();
	let school = $("#school-select").val();
	if(school == "EC" && (country == "AUS" || country == "NZ")){
		// $("#ec-note").css("visibility","visible");
	}else{
		// $("#ec-note").css("visibility","hidden");
	}
}
</script>

<form name="form1" method="post" action="./henkou2.php" onSubmit="return fncCheck();">
	<input type="hidden" name="act" value="send">
	<table style="font-size:10pt;" border="1">

	<tr>
		<td style="text-align:center;width: 130px;">お名前</td>
		<td style="padding:8px 10px 8px 10px;width: 500px;">
			<input type="text" size="20" name="お名前" value="" required="">
		</td>
	</tr>
	<tr>
		<td style="text-align:center;">記入日</td>
		<td style="padding:8px 10px 8px 10px;">
			<input type="text" size="10" name="記入日・年" value="<?php echo date("Y"); ?>" required="">年　
			<input type="text" size="6" name="記入日・月" value="<?php echo date("m"); ?>" required="">月　
			<input type="text" size="6" name="記入日・日" value="<?php echo date("d"); ?>" required="">日
		</td>
	</tr>
	<tr>
		<td style="text-align:center;">ご連絡先</td>
		<td style="padding:8px 10px 8px 10px;">
			電話番号：<br/>
			<input type="text" size="50" name="連絡用・電話番号" value="" required=""><br/>
			メールアドレス：<br/>
			<input type="text" size="50" name="連絡用・メールアドレス" value="" required=""><br/>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;">現在の渡航月</td>
		<td style="padding:8px 10px 8px 10px;">
			変更の内容を選択し、詳細を入力してください。<br/>
			&nbsp;<br/>
			<label>2020年</label><br>
			<input type="radio" name="変更解約内容" value="入学日変更" style="display: none;" checked>
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="4" required="">&nbsp;4月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="5" required="">&nbsp;5月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="6" required="">&nbsp;6月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="7" required="">&nbsp;7月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="8" required="">&nbsp;8月&nbsp;&nbsp;<br>
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="9" required="">&nbsp;9月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="10" required="">&nbsp;10月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="11" required="">&nbsp;11月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="12" required="">&nbsp;12月
			&nbsp;<hr/>
			<label>2021年</label><br>
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="1" required="">&nbsp;1月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="2" required="">&nbsp;2月&nbsp;&nbsp;
			<input type="radio" name="出発予定月" class="yoteituki" onchange="changeYotei()" value="3" required="">&nbsp;3月
			&nbsp;<br/>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;">国</td>
		<td style="padding:8px 10px 8px 10px;">
			<input type="radio" name="出発予定国" class="yoteikuni" onchange="changeCountry('AUS')" value="AUS" required="">&nbsp;AUS&nbsp;&nbsp;
			<input type="radio" name="出発予定国" class="yoteikuni" onchange="changeCountry('CAN')" value="CAN" required="">&nbsp;CAN&nbsp;&nbsp;
			<input type="radio" name="出発予定国" class="yoteikuni" onchange="changeCountry('NZ')" value="NZ" required="">&nbsp;NZ&nbsp;&nbsp;
			<input type="radio" name="出発予定国" class="yoteikuni" onchange="changeCountry('IRE')" value="IRE" required="">&nbsp;IRE&nbsp;&nbsp;
			<input type="radio" name="出発予定国" class="yoteikuni" onchange="changeCountry('UK')" value="UK" required="">&nbsp;UK&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td style="text-align:center;">変更の内容</td>
		<td style="padding:8px 10px 8px 10px;">
			&nbsp;<br/>
			&nbsp;<br/>

			<div>
			&nbsp;学校&nbsp;
			<select name="学校名" id="school-select" style="width: 300px;padding: 5px;" onchange="changeSchool()" required="">
				<option class="emp"></option>
				<option class="AUS CAN NZ UK IRE" value="Kaplan" style="display:none;">Kaplan (Kaplan International Languages)</option>
				<option class="AUS CAN NZ UK IRE" value="EC" style="display:none;">EC (EC English Language Centres)</option>
				<option class="AUS CAN UK IRE" value="OHC" style="display:none;">OHC (Oxford House College)</option>
				<option class="AUS CAN" value="ILSC" style="display:none;">ILSC (ILSC Language Schools)</option>
				<option class="AUS" value="Navitas" style="display:none;">Navitas (Navitas English)</option>
				<option class="AUS" value="Greenwich" style="display:none;">Greenwich (Greenwich English College)</option>
				<option class="AUS" value="Browns" style="display:none;">Browns (Browns English Language School)</option>
				<option class="AUS" value="IH(Sydney/Melbourne)" style="display:none;">(International House Sydney/Melbourne)</option>
				<option class="AUS" value="Discover" style="display:none;">Discover (Discover English)</option>
				<option class="AUS" value="Inforum" style="display:none;">Inforum (Inforum Education Australia)</option>
				<option class="AUS" value="IH(Brisbane)" style="display:none;">IH(Brisbane) (International House Brisbane)</option>
				<option class="AUS" value="LAB" style="display:none;">LAB (Languages Across Borders)</option>
				<option class="AUS" value="CCE" style="display:none;">CCE(Cairns College of English)</option>
				<option class="AUS" value="SPC" style="display:none;">SPC (Sun Pacific College)</option>
				<option class="AUS" value="ELC" style="display:none;">ELC (English Language Company)</option>
				<option class="AUS" value="BBELS" style="display:none;">BBELS (Byron Bay English Language School)</option>
				<option class="AUS" value="SCE" style="display:none;">SCE (Sydney College of English)</option>
				<option class="AUS" value="La lingua'" style="display:none;">La lingua (La Lingua Language School)</option>
				<option class="AUS" value="Lloyds" style="display:none;">Lloyds (Lloyds International College)</option>
				<option class="CAN" value="ILAC" style="display:none;">ILAC (International Languages Academy of Canada)</option>
				<option class="CAN" value="UMC" style="display:none;">UMC (Upper Madison College)</option>
				<option class="CAN" value="Eurocentres" style="display:none;">Eurocentres (Oxford International Eurocentres)</option>
				<option class="CAN" value="IH(Vancouver)" style="display:none;">IH(Vancouver) (International House Vancouver)</option>
				<option class="CAN" value="Tamwood" style="display:none;">Tamwood (Tamwood International College)</option>
				<option class="CAN" value="Quest" style="display:none;">Quest (Quest Language Studies)</option>
				<option class="CAN" value="SELC(Vancouver)" style="display:none;">SELC(Vancouver)</option>
				<option class="CAN" value="Vanwest" style="display:none;">VanWest (VanWest College)</option>
				<option class="CAN" value="SSLC" style="display:none;">SSLC (Sprott Shaw Language College)</option>
				<option class="CAN" value="ELS" style="display:none;">ELS (ELS Language Centers)</option>
				<option class="CAN" value="SGIC" style="display:none;">SGIC (St. George International College)</option>
				<option class="NZ" value="NZLC" style="display:none;">NZLC (New Zealand Language Centre)</option>
				<option class="NZ" value="WWSE" style="display:none;">WWSE (Worldwide School of English)</option>
				<option class="NZ" value="AEA" style="display:none;">AEA (Auckland English Academy)</option>
				<option class="NZ" value="LSNZ" style="display:none;">LSNZ (Language Schools New Zealand)</option>
				<option class="IRE" value="Atlas" style="display:none;">Atlas (Atlas Language School)</option>
				<option class="IRE" value="ECI" style="display:none;">ECI (Emerald Cultural Institute)</option>
				<option class="CAN" value="CCEL" style="display:none;">CCEL (Canadian College of English Language)</option>
				<option class="UK" value="Bloomsbury" style="display:none;">Bloomsbury</option>
			</select>
			<p id="ec-note" style="visibility: hidden;">
				※但し、24週間以上の長期コース[Language Semester Abroad]を申込の方は、指定の入学日がございます。
　　お手数ですが、メールにてスタッフに直接お問い合わせくださいませ。</p>
			</div>

			<br/>
			<br/>
			<!-- <input type="text" size="20" name="入学日変更・変更前" value="">&nbsp;から -->
<!-- 			<label class="no-ilsc no-ihbri no-umc no-els no-sgic no-aus-ec no-nz-ec no-nzlc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m7 school-date"
				name="入学日変更・変更後" value="2020/7/6" required="">7月6日&nbsp;&nbsp;
			</label>
			<label class="no-ihbri no-ilac no-els no-sgic no-aus-ec no-nz-ec no-nzlc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m7 school-date"
				name="入学日変更・変更後" value="2020/7/13" required="">7月13日&nbsp;&nbsp;
			</label>
			<label class="no-ilsc no-umc no-els no-aus-ec no-nz-ec no-nzlc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m7 school-date"
				name="入学日変更・変更後" value="2020/7/20" required="">7月20日&nbsp;&nbsp;
			</label>
			<label class="no-ilsc no-ihbri no-ilac no-umc no-els no-sgic no-aus-ec no-nz-ec no-nzlc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m7 school-date"
				name="入学日変更・変更後" value="2020/7/27" required="">7月27日&nbsp;&nbsp;
			</label>
			<br/>
			<label class="no-ilsc no-ihbri no-umc no-els no-sgic" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m8 school-date"
				name="入学日変更・変更後" value="2020/8/3" required="">8月3日&nbsp;&nbsp;
			</label>
			<label class="no-aus-ec no-ilac no-nz-ec no-nzlc no-els no-sgic" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m8 school-date"
				name="入学日変更・変更後" value="2020/8/10" required="">8月10日&nbsp;&nbsp;
			</label>
			<label class="no-ilsc no-ihbri no-aus-ec no-nz-ec no-umc no-nzlc no-els" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m8 school-date"
				name="入学日変更・変更後" value="2020/8/17" required="">8月17日&nbsp;&nbsp;
			</label>
			<label class="no-ilsc no-ihbri no-aus-ec no-nz-ec no-ilac no-umc no-nzlc no-sgic" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m8 school-date"
				name="入学日変更・変更後" value="2020/8/24" required="">8月24日&nbsp;&nbsp;
			</label>
			<label class="no-ilsc no-aus-ec no-nz-ec no-umc no-nzlc no-els no-sgic" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m8 school-date"
				name="入学日変更・変更後" value="2020/8/31" required="">8月31日&nbsp;&nbsp;
			</label>
			<br/>
			<label class="no-aus-ec no-ihbri no-ilac no-els no-sgic no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m9 school-date"
				name="入学日変更・変更後" value="2020/9/7" required="">9月7日&nbsp;&nbsp;
			</label>
			<label class="no-umc no-ilsc  no-ihbri no-els no-nzlc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m9 school-date"
				name="入学日変更・変更後" value="2020/9/14" required="">9月14日&nbsp;&nbsp;
			</label>
			<label class="no-umc no-aus-ec no-ilsc no-ilac no-sgic no-nzlc no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m9 school-date"
				name="入学日変更・変更後" value="2020/9/21" required="">9月21日&nbsp;&nbsp;
			</label>
			<label class="no-umc no-aus-ec no-ilsc no-ihbri no-els no-sgic no-nzlc no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m9 school-date"
				name="入学日変更・変更後" value="2020/9/28" required="">9月28日&nbsp;&nbsp;
			</label>
			<br/>
 			<label class="no-aus-ec no-ihbri no-ilac no-els no-sgic no-nzlc no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m10 school-date"
				name="入学日変更・変更後" value="2020/10/5" required="">10月5日&nbsp;
			</label>
			<label class="no-umc no-aus-ec no-ilsc no-els no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m10 school-date"
				name="入学日変更・変更後" value="2020/10/12" required="">10月12日&nbsp;
			</label>
			<label class="no-umc no-aus-ec no-ilsc no-ihbri no-ilac no-sgic no-nzlc no-nz-ec"  style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m10 school-date"&nbsp;
				name="入学日変更・変更後" value="2020/10/19" required="">10月19日
			</label>
			<label class="no-umc no-ilsc no-ihbri no-els no-sgic no-nzlc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m10 school-date"
				name="入学日変更・変更後" value="2020/10/26" required="">10月26日&nbsp;
			</label>
			<br/>
			<label class=" no-ilac no-els no-sgic no-nzlc no-aus-ec no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m11 school-date"
				name="入学日変更・変更後" value="2020/11/2" required="">11月2日&nbsp;
			</label>
			<label class="no-umc no-ilsc no-ihbri no-els no-nzlc no-aus-ec no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m11 school-date"
				name="入学日変更・変更後" value="2020/11/9" required="">11月9日&nbsp;
			</label>
			<label class="no-umc no-ilsc no-ihbri no-ilac no-sgic no-aus-ec no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m11 school-date"
				name="入学日変更・変更後" value="2020/11/16" required="">11月16日&nbsp;
			</label>
			<label class="no-umc no-ilsc no-els no-sgic no-nzlc no-aus-ec no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m11 school-date"
				name="入学日変更・変更後" value="2020/11/23" required="">11月23日&nbsp;
			</label>
			<label class="no-ihbri no-ilac no-els no-sgic no-nzlc no-aus-ec no-nz-ec" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m11 school-date"
				name="入学日変更・変更後" value="2020/11/30" required="">11月30日&nbsp;
			</label>
			<br/>
			<label class="no-umc no-ilsc no-ihbri no-nz-ec no-wwse" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m12 school-date"
				name="入学日変更・変更後" value="2020/12/7" required="">12月7日&nbsp;
			</label>
			<label class="no-umc no-ilsc no-ihbri no-nz-ec no-wwse" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m12 school-date"
				name="入学日変更・変更後" value="2020/12/14" required="">12月14日&nbsp;
			</label>
			<br/>
-->
			<label>2021年</label><br>
			<label class="no-cce no-ihbri no-ihvan no-els no-bloom no-umc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m1 school-date"
				name="入学日変更・変更後" value="2021/1/4" required="">1月4日&nbsp;
			</label>
			<label class="no-cce no-nzlc no-ihvan no-bloom no-ilac no-sgic no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m1 school-date"
				name="入学日変更・変更後" value="2021/1/11" required="">1月11日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-els no-bloom no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m1 school-date"
				name="入学日変更・変更後" value="2021/1/18" required="">1月18日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-els no-bloom no-ilac no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m1 school-date"
				name="入学日変更・変更後" value="2021/1/25" required="">1月25日&nbsp;
			</label>
			<br/>
			<label class="no-cce no-nzlc no-ihvan no-els no-bloom no-umc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m2 school-date"
				name="入学日変更・変更後" value="2021/2/1" required="">2月1日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-bloom no-ilac no-sgic no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m2 school-date"
				name="入学日変更・変更後" value="2021/2/8" required="">2月8日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-ihvan no-els no-bloom no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m2 school-date"
				name="入学日変更・変更後" value="2021/2/15" required="">2月15日&nbsp;
			</label>
			<label class="no-cce no-nzlc no-ihvan no-els no-bloom no-ilac no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m2 school-date"
				name="入学日変更・変更後" value="2021/2/22" required="">2月22日&nbsp;
			</label>
			<br/>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-els no-bloom no-umc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m3 school-date"
				name="入学日変更・変更後" value="2021/3/1" required="">3月1日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-bloom no-ilac no-sgic no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m3 school-date"
				name="入学日変更・変更後" value="2021/3/8" required="">3月8日&nbsp;
			</label>
			<label class="no-cce no-nzlc no-ihvan no-els no-bloom no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m3 school-date"
				name="入学日変更・変更後" value="2021/3/15" required="">3月15日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-els no-bloom no-ilac no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m3 school-date"
				name="入学日変更・変更後" value="2021/3/22" required="">3月22日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-ihvan no-els no-bloom no-umc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m3 school-date"
				name="入学日変更・変更後" value="2021/3/29" required="">3月29日&nbsp;
			</label>
			<br/>
			<label class="no-cce no-nzlc no-ihvan no-bloom no-ilac no-sgic no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m4 school-date"
				name="入学日変更・変更後" value="2021/4/5" required="">4月5日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-els no-bloom no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m4 school-date"
				name="入学日変更・変更後" value="2021/4/12" required="">4月12日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-els no-bloom no-ilac no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m4 school-date"
				name="入学日変更・変更後" value="2021/4/19" required="">4月19日&nbsp;
			</label>
			<label class="no-cce no-nzlc no-ihvan no-els no-bloom no-umc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m4 school-date"
				name="入学日変更・変更後" value="2021/4/26" required="">4月26日&nbsp;
			</label>
			<br/>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-bloom no-ilac no-sgic no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m5 school-date"
				name="入学日変更・変更後" value="2021/5/3" required="">5月3日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-ihvan no-els no-bloom no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m5 school-date"
				name="入学日変更・変更後" value="2021/5/10" required="">5月10日&nbsp;
			</label>
			<label class="no-cce no-nzlc no-ihvan no-els no-bloom no-ilac no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m5 school-date"
				name="入学日変更・変更後" value="2021/5/17" required="">5月17日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-els no-bloom no-umc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m5 school-date"
				name="入学日変更・変更後" value="2021/5/24" required="">5月24日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-bloom no-ilac no-sgic no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m5 school-date"
				name="入学日変更・変更後" value="2021/5/31" required="">5月31日&nbsp;
			</label>
			<br/>
			<label class="no-cce no-nzlc no-ihvan no-els no-bloom no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m6 school-date"
				name="入学日変更・変更後" value="2021/6/7" required="">6月7日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-nzlc no-ihvan no-els no-bloom no-ilac no-sgic no-umc no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m6 school-date"
				name="入学日変更・変更後" value="2021/6/14" required="">6月14日&nbsp;
			</label>
			<label class="no-cce no-ihbri no-ihvan no-els no-bloom no-umc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m6 school-date"
				name="入学日変更・変更後" value="2021/6/21" required="">6月21日&nbsp;
			</label>
			<label class="no-cce no-nzlc no-ihvan no-bloom no-ilac no-sgic no-ilsc" style="width: 85px;display: inline-block;">
				&nbsp;<input type="radio" class="m6 school-date"
				name="入学日変更・変更後" value="2021/6/28" required="">6月28日&nbsp;
			</label>
			<br/>
			<br/>
			<label>※月曜日が祝日の場合、火曜日の入学になります。</label>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;">確認</td>
		<td style="padding:8px 10px 8px 10px;">
			<input type="checkbox" id="douicheck" name="同意確認" value="同意します">&nbsp;<b>私は、上記の通り申込済み留学プログラムの変更を希望します。<br/>
			</b>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<p align="left" style="font-size:11pt; margin:15px 0 15px 10px;">
				内容を確認の上、送信ボタンをクリックしてください。
			</p>
		</td>
	</tr>

</table>

	<input class="submit" type="submit" value="送信" style="width:150px; height:30px; margin:18px 0 30px 0; font-size:11pt; font-weight:bold;" />

</form>

</div>

<?php
	}
?>

	</div>


	</div>
  </div>
  </div>
  <div id="footer">

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>

