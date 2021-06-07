<?php
//	ini_set( "display_errors", "On");

	session_start();

	mb_language("Ja");
	mb_internal_encoding("utf8");

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



include '../seminar_module/seminar_module.php';

// 場所(tokyo,osaka,nagoya,fukuoka)
$p = @$_GET['p'];
if ($p == '')	{	$p = @$_SESSION['fair_p'];	}
if ($p == '')	{	$p = 'tokyo';			}
$_SESSION['fair_p'] = $p;

// 種類(first,school,taiken)
$s = @$_GET['s'];
if ($s == '')	{	$s = @$_SESSION['fair_s'];	}
if ($s == '')	{	$s = '';			}
$_SESSION['fair_s'] = $s;

$sword = '';
switch($s)	{
	case 'first':
		$sword = '初心者向け';
		break;
	case 'school':
		$sword = 'の語学学校';
		break;
	case 'taiken':
		$sword = '体験談セミナー';
		break;
}

$config = array(
	'view_mode' => 'calendar',
	'seminar_id' => '',
	'start_date' => '2014-04-20',
	'end_date' => '2014-06-14',
	'calendar' => array(
		'title' => array(
			'秋のワーホリ・留学フェア2014', $sword
		),
		'use_area' => 'off',
		'place_list' => array($p),
		'place_default' => $p,
		'place_active' => '',
		'country_active' => '',
		'know_active' => '',
		'calendar_icon_active' => '',
		'count_field_active' => '',
		'calendar_title_active' => '',
		'calendar_desc_active' => '',
		'footer_desc_active' => '',
	)
);

$sm = new SeminarModule($config);






	require_once '../include/menubar.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>日本ワーキング・ホリデー協会　秋のワーキングホリデー＆留学フェア2014 -</title>
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<meta name="keywords" content="オーストラリア,ニュージーランド,カナダ,カナダ,韓国,フランス,ドイツ,イギリス,アイルランド,デンマーク,台湾,香港,ビザ,取得,方法,申請,手続き,渡航,外務省,厚生労働省,最新,ニュース,大使館," />
<meta name="description" content="オーストラリア・ニュージーランド・カナダを初めとしたワーキングホリデー協定国の最新のビザ取得方法や渡航情報などを発信しています。" />
<meta name="author" content="Japan Association for Working Holiday Makers" />
<meta name="copyright" content="Japan Association for Working Holiday Makers" />
<link rev="made" href="mailto:info@jawhm.or.jp" />
<link rel="Top" href="index.html" type="text/html" title="一般社団法人 日本ワーキング・ホリデー協会" />

<link rel="Author" href="mailto:info@jawhm.or.jp" title="E-mail address" />

<link href="../css/headhootg-nav.css" rel="stylesheet" type="text/css" />
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link href="css/contents_wide.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/button.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-easing.js"></script>
<script type="text/javascript" src="../js/scroll.js"></script>
<script type="text/javascript" src="../js/linkboxes.js"></script>
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/fixedui/fixedUI.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.tipTip.minified.js"></script>
<script type="text/javascript" src="js/fitiframe.js?auto=0"></script>
<script type="text/javascript" src="/js/img-rollover.js">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<link href="css/flexslider.css" rel="stylesheet" type="text/css" />

<?php
	echo ($sm->get_add_js());
	echo ($sm->get_add_css());
	echo ($sm->get_add_style());

?>

<script type="text/javascript">
$("document").ready(function(){
    $('.flexslider').flexslider({
controlNav: false,
slideshowSpeed : 4000
});
});
</script>



<link href="css/tipTip.css" rel="stylesheet" type="text/css" />

<!--[if lte IE 8 ]>
    <link rel="stylesheet" href="../css/style_ie.css" />
<![endif]-->

<link type="text/css" href="../css/jquery-ui-1.8.16.custom.css" rel="stylesheet" />';


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20563699-1']);
  _gaq.push(['_setDomainName', '.jawhm.or.jp']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!--Make sure your page contains a valid doctype at the very top-->
<link rel="stylesheet" type="text/css" href="css/haccordion.css" />

<script type="text/javascript" src="js/haccordion.js">
/***********************************************
* Horizontal Accordion script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script><style type="text/css">

/*CSS for example Accordion #hc1*/

#hc1 li{
margin:0 3px 0 0; /*Spacing between each LI container*/
}

#hc1 li .hpanel{
padding: 5px; /*Padding inside each content*/
background:#8bdc13;
}

/*CSS for example Accordion #hc2*/

#hc2 li{
margin:0 0 0 0; /*Spacing between each LI container*/
border: 12px solid black;
}

#hc2 li .hpanel{
padding: 5px; /*Padding inside each content*/
background: #8bdc13;
cursor: hand;
cursor: pointer;
}
</style>

<script>
jQuery(function($) {
  
var nav    = $('#fixedbox'),
    offset = nav.offset();
  
$(window).scroll(function () {
  if($(window).scrollTop() > offset.top) {
    nav.addClass('fixed');
  } else {
    nav.removeClass('fixed');
  }
});
  
});
</script>
<style>
.fixed {
    position: fixed;
    top: 50px;
    width: 878px;
    z-index: 10000;
	background-color:white;
	height:28px;
}
.navi	{
	margin:-52px -20px 0px -20px;
	padding: 58px 6px 0px 6px;

}
</style>

</head>
<body>

<script type="text/javascript" src="../js/wz_tooltip.js"></script>

<div id="header">
	<font color="#ffffff">秋のワーキングホリデー＆留学フェア2014</font><br/>
    <h1><a href="http://www.jawhm.or.jp/index.html"><img src="http://www.jawhm.or.jp/images/h1-logo.jpg" alt="一般社団法人日本ワーキング・ホリデー協会" width="410" height="33" /></a></h1>
</div>
  <div id="contentsbox"><img id="bgtop" src="images/top.gif" alt="" />
  <div id="contents">

	<div id="maincontent" style="margin-left:30px;">
	<div id="top-main" style="width:300px;margin-bottom:20px;">

		<div class="top-entry01" style="width:900px;">
			
<div class="top-entry0">


<div class="flexslider" id="top">
   <ul class="slides">
    <li>
       <img src="images/top/1.jpg" />
    </li>

    </ul>
</div>


<div id="fixedbox" class="navi">
	<ul id="menu">
	  <li><a href="./">留学&ワーホリフェアって?</a></li>
	  <li><a href="./schedule.php">ご予約・スケジュール</a></li>
	  <li><a href="./school.php">参加学校</a></li>
	  <li><a href="./qanda.php">よくある質問</a></li>
	  <li><a href="./voice.php">参加者の声</a></li>
	</ul>
</div>

&nbsp;<br/>
	<div style="margin: 10px 0 10px 0; padding: 35px 50px 35px 50px; border: 2px orange dotted; font-size:8pt; font-bold: bold;">
	<p>
		<font color="red" size="5.5">秋の留学＆ワーキングホリデーフェア2015は終了致しました。</font><br/><br/>
		<big>みなさまたくさんのご参加本当にありがとうございました。<br/>
&nbsp;<br/>
		当協会留学・ワーキングホリデーフェアは毎年二回、秋（5月～）と秋（10月～）に開催しております。<br/>
		今回残念ながらご参加できなかった方は次回のご参加を心よりお待ちしております。<br/>
		スケジュールは<strong><a href="/">当協会トップページ</a></strong>、<strong><a href="http://www.jawhm.or.jp/seminar.html">無料セミナーページ</a></strong>より順次お知らせいたします。<br/>
&nbsp;<br/>
		当協会では毎日<a href="http://www.jawhm.or.jp/seminar/seminar"><strong>４都市（東京・大阪・名古屋・福岡）のセミナー</strong></a>、<br/>
		また<a href="http://www.jawhm.or.jp/event.html"><strong>その他都市でも定期的にセミナー</strong>の開催をしております。</a><br/>
		今後とも日本ワーキング・ホリデー協会を宜しくお願い致します。<br/></big>
&nbsp;<br/>
		<center><img src="http://www.jawhm.or.jp/event/getlist/img/hana-ani02.gif"> <font size="4"><strong>次回の留学・ワーキングホリデーフェアは2013年秋を予定しております。</strong></font><img src="http://www.jawhm.or.jp/event/getlist/img/hana-ani02.gif"></center>

	<center><a href="http://www.jawhm.or.jp/seminar.html"><img src="/images/fair_seminar_off.png" width="40%"></a>　<a href="http://www.jawhm.or.jp/ja/4377"><img src="/images/fair_log_off.png"  width="40%"></a></center><br/>

</div>

&nbsp;<br/>
<h3> <img width="25" src="images/title/5_icon.png" id="voice">　参加者の声</h3>
<br/>
		
		<div class="wrapper_m" style="float:right;">
            <div class="box_m">
				<p class="voice">
				学校のスタッフの方とお話させてもらって、初めは緊張したけど<br/>
				自分の不安なこととか海外での生活など親身になって回答してくださったので安心しました。参加してよかったです。<br/></p>
				<p class="voice_p">（22歳 女性 大学生）</p>
            </div>
     </div>
		
		
			<div class="wrapper" style="float:right;">
            <div class="box">
				<p class="voice">なんとなく海外に興味があって初めてセミナーに参加しました。<br/>
					渡航が決まっていなくても協会の方が丁寧に説明してくださり、
					とてもわかりやすかったです。他のセミナーにも参加してみようと思います。</p>
				<p class="voice_p">（30歳 女性 会社員）</p>
            </div>
        </div>
		
		<div class="wrapper_m" style="float:right;">
            <div class="box_m">
				<p class="voice">学校の方と直接話をして、申し込みもして、どんどん渡航が現実的になってきました！
				ネットとかパンフレットとかではよくわからなかった部分が多かったのですが明確にできてすっきりしました。特典を貰えたのもよかった。
				今から学校に通うのが楽しみです！</p>
				<p class="voice_p">（男性 学生）</p>
            </div>
        </div>
		
<br clear="both" />	
&nbsp;<br/>	
		 <div class="wrapper" style="float:right;">
            <div class="box">
				<p class="voice">皆さん同じように迷っている事が分かって心強くなりました。留学している子はみんな学生の時から…だったので遅いかなと思っていたのですが、その悩みが今日でなくなったので参加してよかったです。</p>
				<p class="voice_p">（女性 事務員）</p>
            </div>
        </div>
	 
	 
	 	 <div class="wrapper_m"  style="float:right;">
            <div class="box_m">
				<p class="voice">海外での生活、ワーキングホリデーに行くまでの経緯、感じたことなど色々お話しをきけて、これから何を準備すればいいか、目的意識など考えるきっかけになりました。</p>
				<p class="voice_p">（25歳 男性 図書館勤務）</p>
            </div>
        </div>
	 
	 	 <div class="wrapper" style="float:right;">
            <div class="box">
				<p class="voice">カウンセラーの方の体験談がいい事も悪い事もリアルで泣きそうになった。色んな年齢、職業の人がどのような目的やきっかけで海外に行こうと思ったかなど話が聞けて楽しかった</p>
				<p class="voice_p">（26歳 女性 美容院）</p>
            </div>
        </div>
	 
		
<br clear="both" />
&nbsp;<br/>
&nbsp;<br/>
&nbsp;<br/>
&nbsp;<br/>
&nbsp;<br/>
&nbsp;<br/>
<a href="./schedule.php#schedule" id="button_wide2">全フェアスケジュール＆ご予約はこちら▶▶︎︎</a><A href="javascript:w=window.open('bamukun.html','','scrollbars=yes,Width=800,Height=700');w.focus();"><img src="images/bakukun_off.png" style="margin-left:70%; margin-top: -80px;"></a>
	</div>
	</div>
	

  </div>
  
	</div>
		
    	<center><img src="images/back.png" style=" margin-top: -39px; margin-left:-10px;"></center>

	
  </div>

  </div>

  </div>


<?php fncMenuFooter(); ?>


</body>
</html>