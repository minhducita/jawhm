<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='エスピーシーブリスベン/エスピーシーケアンズ(SPC） | 日本ワーキング・ホリデー協会';
$header_obj->description_page='オーストラリアの学校。ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->add_js_files='<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="/school/voice/jquery.flip.min.js"></script>
<script type="text/javascript" src="/school/voice/script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="/school/voice/styles.css" />';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../../images/mainimg/school-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学・ワーホリ経験者からの声（SPC）';
$header_obj->fncFacebookMeta_function=true;

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs('school','school-voice'); ?>

	  <h2 class="sec-title">エスピーシーブリスベン/エスピーシーケアンズ(SPC）からの声</h2>
	  <div id="sitemapbox">


    <div class="voice-subtitle">
		SPC卒業生　M.Y　さん 
	</div>
	<p>&nbsp;</p>
<div align="center">
<img src="./p01.jpg">
</div>

<p>&nbsp;</p>

<p class="text01">
学生ビザ1年で、SPC2都市留学しました。初級（エレメンタリー）だった私にとってケアンズでの寮スタートは安心でした。チリ人ルームメイトの親友アナもできました。上級（アッパー）に上がって、アナとブリスベン校へ転校し、一緒にシェアハウスも探しました。遂に夢だった英語を使ったアルバイトをすることもできました。大成長・大満足です！
</p>
<p class="text01">
<p class="info" style= "margin-top: 3%;">
M.Yさんが通った、<a href="/school/aus_spc/">SPC Brisbane/SPC Cairns(SPC)の情報はこちらから</a>
</p>
</p>


	<div style="height:50px;">&nbsp;</div>

	</div>




<?php
	include '../voice.php';
?>

	  <div class="top-move">
	    <p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>