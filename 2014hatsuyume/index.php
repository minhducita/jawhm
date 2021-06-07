<?php
//ini_set( "display_errors", "On");

	session_start();

	ini_set( "display_errors", "Off");
	mb_language("Ja");
	mb_internal_encoding("utf8");
	
	// パラメータ確認
	$d = @$_GET['d'];

	// ログイン情報
	$mem_id = @$_SESSION['mem_id'];
	$mem_name = @$_SESSION['mem_name'];
	$mem_level = @$_SESSION['mem_level'];


	// 状態確認
	if ($mem_id <> '')	
	{
		try {
			$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
			$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->query('SET CHARACTER SET utf8');
			$stt = $db->prepare('SELECT id, email, namae, furigana, tel, country FROM memlist WHERE id = :id ');
			$stt->bindValue(':id', $mem_id);
			$stt->execute();
			$mem_namae = '';
			$mem_furigana = '';
			$mem_tel = '';
			$mem_email = '';
			$mem_country = '';
			while($row = $stt->fetch(PDO::FETCH_ASSOC)){
				$mem_email = $row['email'];
				$mem_namae = $row['namae'];
				$mem_furigana = $row['furigana'];
				$mem_tel = $row['tel'];
				$mem_country = $row['country'];
			}
			$db = NULL;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	function is_mobile () 
	{
		$useragents = array(
			'iPhone',         // Apple iPhone
			'iPod',           // Apple iPod touch
			'iPad',           // Apple iPad touch
			'Android',        // 1.5+ Android
			'dream',          // Pre 1.5 Android
			'CUPCAKE',        // 1.5+ Android
			'blackberry9500', // Storm
			'blackberry9530', // Storm
			'blackberry9520', // Storm v2
			'blackberry9550', // Storm v2
			'blackberry9800', // Torch
			'webOS',          // Palm Pre Experimental
			'incognito',      // Other iPhone browser
			'webmate'         // Other iPhone browser
		);
		
		$pattern = '/'.implode('|', $useragents).'/i';
		return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
	}
?>
<?php

//if (is_mobile())	{
//	header('Location: http://www.jawhm.or.jp/seminar/ser') ;
//	exit();
//}

//get number from module calendar or banner
if(isset($_GET['num']) && !isset($_GET['navigation']))
{
	if(!empty($_GET['num']))
	{
		//secure data
		$num = htmlentities(trim($_GET['num']));
		$num = stripslashes(stripslashes($num));
	
		try 
		{
			$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
				
			$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->query('SET CHARACTER SET utf8');
			
			$stt = $db->query('SELECT place, year(hiduke) as yyy, month(hiduke) as mmm, day(hiduke) as ddd FROM event_list WHERE id = "'.$num.'"');
	

			while($row = $stt->fetch(PDO::FETCH_ASSOC))
			{
				$yyy	= $row['yyy'];
				$mmm  	= $row['mmm'];
				$ddd	= $row['ddd'];
				$selected_day_place	= $row['place'];
			}
			$db = NULL;
			
			//prepare date format for other function that use date(Ymd)
			if($mmm < 10)
				$Ymd_month = '0'.$mmm;
			else
				$Ymd_month = $mmm;
				
			if($ddd < 10)
				$Ymd_day = '0'.$ddd;
			else
				$Ymd_day = $ddd;
				

			//event pc seminar redirection
			if( $selected_day_place	== 'event')
			{
				if(!is_mobile())
				{
					
					header('Location:/event.html#'.$yyy.$Ymd_month.$Ymd_day) ;
					exit();
				}

			}
			
		} 
		catch (PDOException $e) 
		{
			die($e->getMessage());
		}
		//pc settings
		$selected_day = $ddd;
		$get_param = 0;
		
		$show_listing ='
		<script type="text/javascript">

			$(document).ready(function() {
				$.blockUI({
					message: $("#'.$selected_day_place.$yyy.$Ymd_month.$Ymd_day.'"),
					css: { 	left: ($(window).width()-800)/2 +"px",
							overflow: "auto",
							cursor:"default",
							width: "auto",
							height: "auto"
					}
				});
				
				$(".blockMsg").css("max-height", 90 +"%");
				$(".blockMsg").css("min-height",200 +"px");
				$(".blockMsg").css("max-width",800+"px");
				$(".blockMsg").css("top", ($(window).height()-$(".blockMsg").height())/2 +"px");
			});
		</script>';

		
		//mobile settings
		$mobile_place = 'place/'.$selected_day_place.'/';
		$mobile_date =  $yyy.'/'.$mmm.'/'.$ddd.'/'.$num;
	}
	else
	{
		$mobile_place = '';
		$mobile_date = '';
	}
}

 
$redirection='/seminar/ser/'.$mobile_place.$mobile_date;

require_once '../include/header.php';

$header_obj = new Header();

$title = 'ワーホリ・留学初夢フェア2014';
if (@$_GET['place_name'] == 'tokyo')	{	$title .= '【東京】';	}
if (@$_GET['place_name'] == 'osaka')	{	$title .= '【大阪】';	}
if (@$_GET['place_name'] == 'nagoya')	{	$title .= '【名古屋】';	}
if (@$_GET['place_name'] == 'fukuoka')	{	$title .= '【福岡】';	}
if (@$_GET['place_name'] == 'okinawa')	{	$title .= '【沖縄】';	}


$header_obj->title_page='ワーホリ＆留学初夢フェア2014を開催しました';

$header_obj->description_page='2014年新しい自分に出会うきっかけ作りのために、日本ワーキング・ホリデー協会では初夢セミナーを開催し、無事に終了致しました。';

$header_obj->fncFacebookMeta_function= true;

$header_obj->mobileredirect=$redirection;

$header_obj->size_content_page='big';

$header_obj->add_js_files = '<script type="text/javascript" src="/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="/js/fixedui/fixedUI.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="https://www.taglog.jp/www.jawhm.or.jp/taglog-x.js" async></script>
<script type="text/javascript">
jQuery(function($) {
	$(".feedshow").click(function() {
	  $.fixedUI("#feedbox");
	});
	$("#feedhide").click(function() {
	  $.unfixedUI();
	});
	$("#feedform").submit(function() {
		$senddata = $("#feedform").serialize();
		$.ajax({
			type: "POST",
			url: "http://www.jawhm.or.jp/feedback/sendmail.php",
			data: $senddata + "&subject=Seminar Request",
			success: function(msg){
				alert("リクエストありがとうございました。");
				$.unfixedUI();
			},
			error:function(){
				alert("通信エラーが発生しました。");
				$.unfixedUI();
			}
		});
	  return false;
	});

	jQuery( "input:checkbox", "#shiborikomi" ).button();
	jQuery( "input:radio", "#shiborikomi" ).button();
//	fncsemiser();

});

function cplacesel()	{
	jQuery("#place-tokyo").button("destroy");
	jQuery("#place-tokyo").removeAttr("checked");
	jQuery("#place-tokyo").button();
	fncsemiser();
}
function fncplacesel(obj)	{
	if (jQuery(obj).attr("checked"))	{
		jQuery( "input:radio", "#shiborikomi" ).button("destroy");
		if (obj.value != "tokyo")	{	jQuery("#place-tokyo").removeAttr("checked");	}
		if (obj.value != "osaka")	{	jQuery("#place-osaka").removeAttr("checked");	}
		if (obj.value != "sendai")	{	jQuery("#place-sendai").removeAttr("checked");	}
		if (obj.value != "nagoya")	{	jQuery("#place-nagoya").removeAttr("checked");	}
		if (obj.value != "toyama")	{	jQuery("#place-toyama").removeAttr("checked");	}
		if (obj.value != "fukuoka")	{	jQuery("#place-fukuoka").removeAttr("checked");	}
		if (obj.value != "okinawa")	{	jQuery("#place-okinawa").removeAttr("checked");	}
		jQuery( "input:radio", "#shiborikomi" ).button();
	}
	fncsemiser();
}
function fnccountrysel()	{
	jQuery("#country-all").button("destroy");
	jQuery("#country-all").removeAttr("checked");
	jQuery("#country-all").button();
	fncsemiser();
}
function fnccountryall()	{
	if (jQuery("#country-all").attr("checked"))	{
		jQuery("input:checkbox", "#shiborikomi" ).button("destroy");
		jQuery("#country-aus").removeAttr("checked");
		jQuery("#country-nz").removeAttr("checked");
		jQuery("#country-can").removeAttr("checked");
		jQuery("#country-uk").removeAttr("checked");
		jQuery("#country-fra").removeAttr("checked");
		jQuery("#country-other").removeAttr("checked");
		jQuery( "input:checkbox", "#shiborikomi" ).button();
	}
	fncsemiser();
}
function fncknowsel()	{
	jQuery("#know-all").button("destroy");
	jQuery("#know-all").removeAttr("checked");
	jQuery("#know-all").button();
	fncsemiser();
}
function fncknowall()	{
	if (jQuery("#know-all").attr("checked"))	{
		jQuery("input:checkbox", "#shiborikomi" ).button("destroy");
		jQuery("#know-first").removeAttr("checked");
		jQuery("#know-sanpo").removeAttr("checked");
		jQuery("#know-sc").removeAttr("checked");
		jQuery("#know-ga").removeAttr("checked");
		jQuery("#know-si").removeAttr("checked");
		jQuery("#know-kouen").removeAttr("checked");
		jQuery( "input:checkbox", "#shiborikomi" ).button();
	}
	fncsemiser();
}
function fncsemiser()	{
	jQuery("#semi_show").html("<div style=\"vertical-align:middle; text-align:center; margin:30px 0 30px 0; font-size:20pt;\"><img src=\"../images/ajax-loader.gif\">セミナーを探しています...</div>");
	$senddata = jQuery("#kensakuform").serialize();
	$.ajax({
		type: "POST",
		url: "./seminar_search_hatsuyume.php",
		data: $senddata,
		success: function(msg){
			jQuery("#semi_show").html(msg);
		},
		error:function(){
			alert("通信エラーが発生しました。");
			$.unblockUI();
		}
	});
}

</script>

<script>
function fnc_next()	{
	document.getElementById("form1").style.display = "none";
	document.getElementById("form2").style.display = "";
}

function fnc_yoyaku(obj)	{
	document.getElementById("form1").style.display = "";
	document.getElementById("form2").style.display = "none";

	document.getElementById("btn_soushin").disabled = false;
	document.getElementById("btn_soushin").value = "送信";
	document.getElementById("div_wait").style.display = "none";


	document.getElementById("form_title").innerHTML = obj.getAttribute("name");
	document.getElementById("txt_title").value = obj.getAttribute("name");
	document.getElementById("txt_id").value = obj.getAttribute("uid");
	$.blockUI({ message: $("#yoyakuform"),
	css: { 
		top:  ($(window).height() - 500) /2 + "px", 
		left: ($(window).width() - 600) /2 + "px", 
		width: "600px" 
	}
 }); 
}
function btn_cancel()	{
	$.unblockUI();
}
function btn_submit()	{
	obj = document.getElementById("txt_name");
	if (obj.value == "")	{
		alert("お名前（氏）を入力してください。");
		obj.focus();
		return false;
	}
	obj = document.getElementById("txt_name2");
	if (obj)	{
		if (obj.value == "")	{
			alert("お名前（名）を入力してください。");
			obj.focus();
			return false;
		}
	}
	obj = document.getElementById("txt_furigana");
	if (obj.value == "")	{
		alert("フリガナ（氏）を入力してください。");
		obj.focus();
		return false;
	}
	obj = document.getElementById("txt_furigana2");
	if (obj)	{
		if (obj.value == "")	{
			alert("フリガナ（名）を入力してください。");
			obj.focus();
			return false;
		}
	}
	obj = document.getElementById("txt_mail");
	if (obj.value == "")	{
		alert("メールアドレスを入力してください。");
		obj.focus();
		return false;
	}
	obj = document.getElementById("txt_tel");
	if (obj.value == "")	{
		alert("電話番号を入力してください。");
		obj.focus();
		return false;
	}

	if (!confirm("ご入力頂いた内容を送信します。よろしいですか？"))	{
		return false;
	}

	$senddata = $("#form_yoyaku").serialize();

	document.getElementById("div_wait").style.display = "";

	document.getElementById("btn_soushin").value = "処理中...";
	document.getElementById("btn_soushin").disabled = true;

	$.ajax({
		type: "POST",
		url: "http://www.jawhm.or.jp/yoyaku/yoyaku.php",
		data: $senddata,
		success: function(msg){
			document.getElementById("div_wait").style.display = "none";
			alert(msg);
			$.unblockUI();
		},
		error:function(){
			alert("通信エラーが発生しました。");
			$.unblockUI();
		}
	});
}
</script>'.$show_listing.
'<script type="text/javascript">
	$(document).ready(function() {

		$(".day_information").bind("mouseenter", function() {
			this.position = setInterval(function (){
				
				if($(".day_information .det").is(":animated")){$(".blockMsg").css("top", ($(window).height()-$(".blockMsg").height())/2 +"px");}
							
			},1);
		}).bind("mouseleave", function() {
			//this.position && clearInterval(this.position);
		});
		
		$(window).resize(function () {
			if(($(window).width()-800)/2 >10)
			{
				$(".blockMsg").css("left", ($(window).width()-800)/2 +"px");
				
			}
			else
			{
				$(".blockMsg").css("left", "2%");
				$(".blockMsg").css("width", "95%");
			}
			$(".blockMsg").css("top", ($(window).height()-$(".blockMsg").height())/2 +"px");
		});
	});
</script>';
$header_obj->add_css_files='
<!--[if lte IE 8 ]>
    <link rel="stylesheet" href="/css/style_ie.css" />
<![endif]-->

<link type="text/css" href="/css/jquery-ui-1.8.16.custom.css" rel="stylesheet" />';

$header_obj->add_style='<style>
.selected_day_in_list{
	background-color:#FFFFAA;
}
</style>';

$header_obj->full_link_tag = true;
$header_obj->fncMenuHead_h1text = 'ワーホリ＆留学初夢フェア2014';

/*
  // member
  define('MAX_PATH', '/var/www/html/ad');
  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
    if (!isset($phpAds_context)) {
      $phpAds_context = array();
    }
    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
    $phpAds_raw = view_local('', 144, 0, 0, '', '', '0', $phpAds_context, '');
    echo $phpAds_raw['html'];
  }
*/

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="images/seminar-mainimg.gif" alt="" />';


$header_obj->display_header();
?>
<script type="text/javascript" src="../js/wz_tooltip.js"></script>

        <div id="maincontent">
    
	  <?php echo $header_obj->breadcrumbs(); ?>
    
    	<h2 class="sec-title">ワーホリ＆留学初夢フェア2014は終了致しました</h2>
	<p class="text01">
		ワーホリ＆留学初夢フェア2014は2014年1月25日をもちまして終了致しました。<br/>
		全国各地からたくさんのご参加本当にありがとうございました。<br/>
	<center><a href="http://www.jawhm.or.jp/seminar.html"><img src="../images/fair_seminar_off.png" width="40%"></a>　<a href="http://www.jawhm.or.jp/ja/4377"><img src="../images/fair_log_off.png"  width="40%"></a></center><br/>
	</p>


	<h2 class="sec-title">ワーホリ協会"初夢フェア"って？</h2>
			
			 <div style="padding-left:20px; float:left; margin-bottom: 10px; width:95%;" >
			<br/>
			    <div class="kadomaru">
						<p>
						<font size="4"><b><u><font color="#ff710a">ワーホリ＆留学の可能性が広がるイベント ワーホリ協会"初夢フェア"って？</font></u></b></font><br/>
						<br/>
						あなたの夢は何ですか？2014年に向けて新しいスローガンはお決まりでしょうか。<br/>
						新しい自分に出会うきっかけになればと思いを込めて、日本ワーキング・ホリデー協会では初夢セミナーを開催します。 <br/>
						<!--<br/>
						「今年こそ海外に行きたい！」でも何から準備すればいいのか分からない。<br/>
						ワーホリ・留学に興味がある、海外で生活してみたい！<br/>
						英語が話せるようになって就職活動などに活かしたい　…etc<br/>
						<br/>
						どなたでもセミナーに参加可能です。<br/>-->
						<br/>
						スペシャルゲスト、また日本ワーキング・ホリデー協会のスタッフによる”夢”をテーマにしたセミナーを通して、<br/>
						どんなワーホリ・留学プランが自分に一番合っているのか、知りたい方は初夢フェアのセミナーにお越し下さい。<br/>
						海外のプロであるスペシャルゲスト、当協会留学カウンセラーが皆さまのプラン作成のお手伝いをいたします。<br/>
						
						<a href="http://www.jawhm.or.jp/ja/5285" target="_blank"><img src="images/1516_off.png" style="margin-top: -270px; margin-left: 650px;"></a>
						</p>
				</div>
			</div>
			
			


<!--			<center><img src="images/copy.png"></center>-->
	
			<div style="float: left; width: 195px; margin-left: 60px; border: 0px dotted #cccccc; ">
				
				<center><font color="#ff710a"><b><big>ワーホリ＆留学の基本がわかる</b></big></font></center>
				<center><img src="images/p2.jpg"  width="180px"></center><br/>
			</div>	

			<div style="float: left; width: 195px;  border: 0px dotted #cccccc;" >
				
				<center><b><big><font color="#ff710a">初夢フェアだけの特別セミナー</b></big></font></center>
				<center><img src="images/p3.jpg" width="180px"></center><br/>
			</div>
		
			<div style="float: left; width: 195px;  border: 0px dotted #cccccc;" >
				
				<center><b><big><font color="#ff710a">海外語学学校スタッフに相談しよう</b></big></font></center>
				<center><img src="images/p1.jpg" width="180px"></center><br/>
	
			</div>
		
		
		<div style="float: left; width: 195px; margin-bottom: 10px; border: 0px dotted #cccccc;">
			
			<center><b><big><font color="#ff710a">渡航費用が安くなる!?参加者特典</b></big></font></center>
			<center><img src="images/p4.jpg" width="180px"></center><br/>
		
		</div>
		
		
		
		<clear="both" />
			
			
			
			
			<div style="padding-left:20px; float:left; margin-bottom: 20px; width:100%;" >
				<div style="border: 2px dotted #cccccc; padding: 20px 20px 20px 20px; width: 90%; background-image : url(images/seminar.jpg);background-repeat : no-repeat; background-position : 96%">
					<p>
						<font size="4"><strong>ワーキングホリデー初心者向けセミナー</strong></font> では、こんなお話を致します。
					</p>
		
					<table style="margin: 10px 0 10px 20px; font-size:10pt;">
						<tr>
							<td width="45%">●　ワーキングホリデービザの取得方法</td>
							<td width="10%">&nbsp;</td>
							<td>●　ワーキングホリデービザで出来ること</td>
						</tr>
						<tr>
							<td>●　ワーキングホリデーに必要なもの</td>
							<td>&nbsp;</td>
							<td>●　各国の特徴</td>
						</tr>
						<tr>
							<td colspan="3">●　ワーキングホリデーに興味はあるけれど、何から始めていいのか解らない方</td>
						</tr>
					</table>
		
					<p>
					参加者の９割の方は、お一人でのご参加です。
					お一人でもお気軽にお越しください。<br/>
					</p>
			
				</div>
			</div>
	
			<div style="float: left; width: 269px; margin-left: 10px; border: 1px dotted #cccccc; padding: 10px 10px 0px 10px;">
				<b><big><font color="#0d5edc">経験者だから話せる実際のワーホリ＆留学とは？</font></b></big>
				<img src="images/taiken.png" style="margin-bottom: 5px;"><br/>
				<center><img src="images/taiken.jpg" ></center><br/>
			
				<p>
					渡航のきっかけ、ビザについて、現地でのお仕事・住まい、語学学校、実際の予算、渡航までの準備…。
					少人数制でアットホームな雰囲気もこのセミナーの特徴です。
					体験談を交えながら皆さまのプラン作成のお手伝いをします。
					<br/>
				</p>
				<br/>
				<clear="both"/>
			</div>	

			<div style="float: left; width: 269px; margin-left: 5px; border: 1px dotted #cccccc; padding: 10px 10px 0px 10px;" >
				<b><big><font color="#0d5edc">渡航前に絶対知っておきたい！</font></b></big>
				<img src="images/kouen.png" style="margin-bottom: 5px;"><br/>
				<center><img src="images/kouen.jpg"></center><br/>
				<p>
					海外のプロである豪華講師陣が皆さまの不安・疑問にお答えします。
					よく当協会に寄せられる質問を元に、各テーマごとの講演会を開催します。
					今回のフェアだけの特別企画です。
					気になる国のセミナーは参加しましょう！<br/><br/>
				</p>
				<clear="both"/>
			</div>
		

		
		<div style="float: right; width: 269px; margin-bottom: 10px; border: 1px dotted #cccccc; padding: 10px 10px 0px 10px;">
			<b><big><font color="#0d5edc">渡航費用が安くなる参加者特典付き</font></b></big>
			<img src="images/school.png" style="margin-bottom: 5px;"><br/>
			<center><img src="images/school.jpg"></center><br/>
			<p>
				実際に海外で生活されている学校のスタッフ様を講師に招き、
				語学学校についてはもちろん、海外の生活や体験談など様々なお話をして頂きます。
				参加後にその場でお見積もり＆お申込も可能です。<br/>
				<br/>
			</p>
			<clear="both"/>
		</div>
		<clear="both" />
		
		
			

		<h2 class="sec-title">次回の留学・ワーキングホリデーフェアは2014年春を予定しております。</h2>
	<p class="text01">
		当協会留学・ワーキングホリデーフェアは毎年二回、春（5月～）と秋（10月～）に開催しております。<br/>
		またミニフェアとして初夢フェア（1月～）や夏休み日本一周ワーホリ留学出張セミナー（7月～）なども不定期に開催しております。<br/>
		今回残念ながらご参加できなかった方は次回のご参加を心よりお待ちしております。<br/>
		スケジュールは<strong><a href="/">当協会トップページ</a></strong>、<strong><a href="http://www.jawhm.or.jp/seminar.html">無料セミナーページ</a></strong>より順次お知らせいたします。<br/>
	</p>
</div>
</div>
</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>

