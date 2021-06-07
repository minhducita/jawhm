﻿<?php
require_once '../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='留学・ワーホリ経験者からの声';
$header_obj->description_page='オーストラリアの学校。ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->add_js_files='<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="/school/voice/jquery.flip.min.js"></script>
<script type="text/javascript" src="/school/voice/script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="/school/voice/styles.css" />';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/mainimg/school-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学・ワーホリ経験者からの声';
$header_obj->fncFacebookMeta_function=true;

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs('school'); ?>

<?php
	include './voice.php';
?>

	  <h2 class="sec-title">各国の学校</h2>

	  <div class="mcontent-country-box">
	    <ul class="country-box-01">
		  <li class="c-01"><a href="../aus.html">オーストラリア</a></li>
		  <li class="c-02"><a href="../kor.html">韓国</a></li>
		  <li class="c-03"><a href="../uk.html">イギリス</a></li>
		  <li class="c-04"><a href="../ywn.html">台湾</a></li>
		</ul>
		<ul class="country-box-01">
		  <li class="c-05"><a href="../nz.html">ニュージーランド</a></li>
		  <li class="c-06"><a href="../fra.html">フランス</a></li>
		  <li class="c-07"><a href="../ire.html">アイルランド</a></li>
		  <li class="c-08"><a href="../hkg.html">香港</a></li>
		</ul>
		<ul class="country-box-02">
		  <li class="c-09"><a href="../can.html">カナダ</a></li>
		  <li class="c-10"><a href="../deu.html">ドイツ</a></li>
		  <li class="c-11"><a href="../dnk.html">デンマーク</a></li>
		  <li class="c-12"><a href="../worldwide.html">ワールドワイド</a></li>

		</ul>
	  </div>

	  <div class="top-move">
	    <p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>