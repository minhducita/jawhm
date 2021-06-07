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
    'view_mode' => 'list',
    'seminar_id' => '',
    'start_date' => '2014-04-20',
    'end_date' => '2014-04-20',
    'list' => array(
        'title' => 'ダミー',
        'use_area' => 'off',
        'place_list' => array('tokyo'),
        'place_default' => 'tokyo',
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
<title>日本ワーキング・ホリデー協会　春のワーキングホリデー＆留学フェア2015 -</title>
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

.button-back {
    background-color: #8B80DB;
    color: #fff;
    border: 1px solid transparent;
    border-radius: 11px;
    cursor: pointer;
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    line-height: 1.42857;
    margin-bottom: 0;
    padding: 3px 12px;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
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
    top: 10px;
    width: 878px;
    z-index: 10000;
    background-color:white;
    height:28px;
}
.navi	{
    margin: -10px -20px 70px -20px;
    padding: 58px 6px 0px 6px;


}
</style>

</head>
<body>

<script type="text/javascript" src="../js/wz_tooltip.js"></script>

<div id="header">
    <font color="#ffffff">春のワーキングホリデー＆留学フェア2015</font><br/>
    <h1><a href="http://www.jawhm.or.jp/index.html"><img src="http://www.jawhm.or.jp/images/h1-logo.jpg" alt="一般社団法人日本ワーキング・ホリデー協会" width="410" height="33" /></a></h1>
</div>
  <div id="contentsbox"><img id="bgtop" src="images/top.gif" alt="" />
  <div id="contents">

    <div id="maincontent" style="margin-left:30px;">
    <div id="top-main" style="width:300px;margin-bottom:20px;">

        <div class="top-entry01" style="width:900px;">
            
<div class="top-entry0">

<div id="fixedbox" class="navi">
    <ul id="menu">
      <li><a href="./">ワーホリ&留学フェアって?</a></li>
      <li><a href="./schedule.php">ご予約・スケジュール</a></li>
      <li><a href="./school.php">参加学校</a></li>
      <li><a href="./qanda.php">よくある質問</a></li>
      <li><a href="./voice.php">参加者の声</a></li>
    </ul>
</div>

<div class="flexslider" id="top" style="margin-bottom: 30px;">
   <ul class="slides">
       <li>
       <img src="images/top/1.jpg" />
    </li>
    </ul>
</div>





<!--	<div style="margin: 10px 0 10px 0; padding: 35px 50px 35px 50px; border: 2px orange dotted; font-size:8pt; font-bold: bold;">
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

&nbsp;<br/>-->
<h3 id="school">参加語学学校</h3>

<!--<img src="images/school.png" style="margin-left:-5px;">-->

<style>
.waku	{
    background: white;
    width: 150px;
}
.naka	{
    background: white;

}

</style>

<TABLE id="logo-list" align="center">

    <tr>
        <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/browns.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> BROWNS </div>
        <center>
        <img src="images/browns.gif">
        </center>
        <p>綺麗な校舎と最新設備。独自の"Active8"は必見！</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

                <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/discover.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> Discover </div>
        <center>
        <img src="images/discover.gif">
        </center>
        <p>生徒目線のAcademicとFunを取り入れた学習環境</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

    <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/fusion.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> Fusion </div>
        <center>
        <img src="images/fusion.gif">
        </center>
        <p>少人数・カジュアルなキャンパスで海外生活を満喫！</p>
        </center>
        </a>
    </div>
    </div>
        </TD>
    
        
                <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/greenwich.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> Greenwich </div>
        <center>
        <img src="images/greenwich.gif">
        </center>
        <p>大規模校だけどアットホームな環境で英語を学べる</p>
        </center>
        </a>
    </div>
    </div>
        </TD>


<TD>
        <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/icqa.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> ICQA </div>
        <center>
        <img src="images/icqa.gif">
        </center>
        <p>ホテルインターンやボランティアが充実した学校</p>
        </center>
        </a>
    </div>
    </div>
        </TD>
</tr>
    

<tr>
    
    <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/ih_bne.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> IH Brisbane </div>
        <center>
        <img src="images/ihbrisbane.gif">
        </center>
        <p>勉強、仕事、そして楽しい留学生活を両立しよう</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

        <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/ih_aus.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> IH Sydney </div>
        <center>
        <img src="images/ih_sy.gif">
        </center>
        <p>英語の先生になれる資格 "J-shine"をとるならココ</p>
        </center>
        </a>
    </div>
    </div>
        </TD>




        <TD>
        <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/impact.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> Impact </div>
        <center>
        <img src="images/impact.gif">
        </center>
        <p>徹底したEnglish Onlyポリシーが大人気</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

<TD>
<div id="div_cic" class="waku">
<div class="naka">
<a href="../fair/inforum.html" class="goto_content">
<div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> Inforum </div>
<center>
<img src="images/inforum.gif">
</center>
<p>海外初心者の方へ。アットホームな雰囲気もGOOD！</p>
</center>
</a>
</div>
</div>
</TD>

        <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/navitas.html" class="goto_content">
        <div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> Navitas </div>
        <center>
        <img src="images/navitas.gif">
        </center>
            <p>選べるロケーションと多彩なコースが魅力の伝統校</p>
        </center>
        </a>
    </div>
    </div>
        </TD>


</tr>

  </tbody>
</table>






<TABLE id="logo-list2" align="center">
    <tr>

        <TD>
<div id="div_cic" class="waku">
<div class="naka">
<a href="../fair/selc.html" class="goto_content">
<div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> SELC </div>
<center>
<img src="images/selc.gif">
</center>
<p>接客英語習得やバリスタを目指そう</p>
</center>
</a>
</div>
</div>
</TD>

<TD>
<div id="div_cic" class="waku">
<div class="naka">
<a href="../fair/viva.html" class="goto_content">
<div class="logo4"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Australia.png"> Viva </div>
<center>
<img src="images/viva.gif">
</center>
<p>多国籍な環境で、実践的な英語”Smart Talk”を</p>
</center>
</a>
</div>
</div>
</TD>

                <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/ccel.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> CCEL </div>
        <center>
        <img src="images/ccel.gif">
        </center>
        <p>接客英語を学ぶなら!バンクーバー有数の大規模校
        </p>
        </center>
        </a>
    </div>
    </div>
        </TD>

                            <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/cornerstone.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> Cornerstone </div>
        <center>
        <img src="images/cornerstone.gif">
        </center>
        <p>日常会話とビジネス英語を同時に取得!選択授業も魅力
        </p>
        </center>
        </a>
    </div>
    </div>
        </TD>

                    <TD>
        <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/eurocentres.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> Eurocentres </div>
        <center>
        <img src="images/eurocentres.gif">
        </center>
        <p>目標達成に向けた個別サポートとカリキュラム設定</p>
        </center>
        </a>
    </div>
    </div>
        </TD>
    

    
        


</tr>

<tr>
    
        <TD>
        <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/ih_can.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> IH vancouver </div>
        <center>
        <img src="images/ih_can.gif">
        </center>
        <p>大都市から少し離れ落ち着いた環境で学びたい方へ</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

    <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/ilac.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> ILAC </div>
        <center>
        <img src="images/ilac.gif">
        </center>
        <p>世界70カ国以上の仲間と、国際社会へ飛び出そう！</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

                <TD>
        <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/kgic.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> KGIC </div>
        <center>
        <img src="images/kgic.gif">
        </center>
        <p>スキルごとのレベルで自分に合った英語を学べる！</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

        <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/pgic.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> PGIC </div>
        <center>
        <img src="images/pgic.gif">
        </center>
        <p>英語を本気でモノに!本物のコミュニケーション力を</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

        <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/quest.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> QUEST </div>
        <center>
        <img src="images/quest.gif">

        </center>
                </a>
        <p>Questで英語を学び、新たな機会を発見しよう！</p>
        </center>
    </div>
    </div>
        </TD>
    </tr>

<tr>

        <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/sec.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> SEC </div>
        <center>
        <img src="images/sec.gif">

        </center>
                </a>
        <p>アットホームな環境の中で総合英語と専門科目を学ぶ</p>
        </center>
    </div>
    </div>
        </TD>

    <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/selc_can.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> SELC CANADA </div>
        <center>
        <img src="images/selccanada.gif">

        </center>
                </a>
        <p>カフェ英語やインターンなどにも挑戦できる！ </p>
        </center>
    </div>
    </div>
    </TD>

        <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/tamwood.html" class="goto_content">
        <div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> Tamwood </div>
        <center>
        <img src="images/tamwood.gif">

        </center>
                </a>
        <p>「経験し」「学び」「夢に向かって成長させる」</p>
        </center>
    </div>
    </div>
    </TD>

    <TD>
<div id="div_cic" class="waku">
<div class="naka">
<a href="../fair/umc.html" class="goto_content">
<div class="logo3"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/Canada.png"> UMC </div>
<center>
<img src="images/umc.gif">
</center>
<p>アットホームな環境で安心して勉強できる学校</p>
</center>
</a>
</div>
</div>
</TD>

                <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/nzlc.html" class="goto_content" >
        <div class="logo2"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/New-Zealand.png"> NZLC </div>
        <center>
        <img src="images/nzlc.gif">
        </center>
        <p>生徒数No.1！ニュージーランドで最も歴史ある学校</p>
        </center>
        </a>
    </div>
    </div>
        </TD>
</tr>




    <tr>

                <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/wwse.html" class="goto_content">
        <div class="logo2"><img width="15" src="http://www.jawhm.or.jp/event/getlist/img/New-Zealand.png"> WWSE </div>
        <center>
        <img src="images/wwse.gif">
        </center>
        <p>コミュニケーション主体に「生きた英語」が学べます</p>
        </center>
        </a>
    </div>
    </div>
        </TD>

        <TD>
        <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/embassy.html" class="goto_content">
        <div class="logo">Embassy</div>
        <center>
        <img src="images/embassy.gif">
        </center>
        <p>人気の英語圏にキャンパスを持つ大規模校！</p>
        </center>
        </a>
    </div>
    </div>
        </TD>
        <TD>
        <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/ilsc.html" class="goto_content">
        <div class="logo">ILSC </div>
        <center>
        <img src="images/ilsc.gif">
        </center>
        <p>豊富な選択授業で自分の目的にあったカリキュラム
    </p>
        </center>
        </a>
    </div>
    </div>
        </TD>

                <TD>
    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/kaplan.html" class="goto_content">
        <div class="logo">Kaplan </div>
        <center>
        <img src="images/kaplan.gif">
        </center>
        <p>世界主要英語圏6ヶ国にキャンパスがある大規模校</p>
        </center>
        </a>
    </div>
    </div>
        </TD>
                        <TD>

    <div id="div_cic" class="waku">
    <div class="naka">
        <a href="../fair/ohc.html" class="goto_content">
        <div class="logo">OHC </div>
        <center>
        <img src="images/ohc.gif">
        </center>
        <p>日本人が少ない環境で勉強したい方におススメ</p>
        </center>
        </a>
    </div>
    </div>
        </TD>
        
</tr>
</TABLE>


<br />
<div align="center">
<table cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="5" height="5" background="images/hidariue.gif"></td>
      <td background="images/ue.gif"></td>
      <td width="5" background="images/migiue.gif"></td>
    </tr>
    <tr>
      <td background="images/hidari.gif"></td>
      <td width="850" style="padding: 5px 5px 5px 5px;">

<button id="back-top" class="button-back">参加学校一覧に戻る</button>
<iframe src="../fair/top.html" width="850" height="500" frameborder="0" name="school" marginwidth="0" marginheight="0" hspace="0" vspace="0" onload="fitIfr();">お使いのブラウザはフレームに対応しておりません。</iframe>


</td>
      <td width="5" background="images/migi.gif"></td>
    </tr>
    <tr>
      <td height="5" background="images/hidarisita.gif"></td>
      <td background="images/sita.gif"></td>
      <td background="images/migisita.gif"></td>
    </tr>
  </tbody>
</table>
</div>

&nbsp;<br/>
&nbsp;<br/>
&nbsp;<br/>

<div align="right"><a href="#top"><img src="images/pagetop_off.png" /></a></div>
&nbsp;<br/>

<?php
    $sm->show();
?>


<!--<a href="./schedule.php#schedule" id="button_wide2">全フェアスケジュール＆ご予約はこちら▶▶︎︎</a><A href="javascript:w=window.open('bamukun.html','','scrollbars=yes,Width=800,Height=700');w.focus();"><img src="images/bakukun_off.png" style="margin-left:70%; margin-top: -80px;"></a>-->
    </div>
    </div>

  </div>
  
    </div>
        
    	<center><img src="images/back.png" style=" margin-top: -39px; width: 100%;"></center>

    
  </div>

  </div>

  </div>


<?php fncMenuFooter(); ?>

<script>
    $(".goto_content").click(function() {
        // get school page
        var src = $(this).attr("href");
        $("[name=school]").attr("src","");
        $("[name=school]").attr("src",src);
        
        // after load iframe, scroll iframe's top
        var $iframe = $("[name=school]");
        $iframe.load(function() {
            // scroll iframe's top
            var i = $(this).index(this);
            var p = $("#back-top").eq(i).offset().top;
            $('html,body').animate({scrollTop: p - 180}, 'fast');
        });
        
        return false;
    });
    
    $("#back-top").click(function() {
        var i = $(this).index(this);
        var p = $("#school").eq(i).offset().top;
        $('html,body').animate({scrollTop:p}, 'fast');
        return false;
    });
</script>

</body>
</html>
