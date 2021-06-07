<?php

	$param = explode('/', $_SERVER['PATH_INFO']);

?>
<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page='スタッフメニュー';
$header_obj->keywords_page='ワーキングホリデー,ワーホリ,オーストラリア,ニュージーランド,カナダ,カナダ,韓国,フランス,ドイツ,イギリス,アイルランド,デンマーク,台湾,香港,ビザ,取得,方法,申請,手続き,渡航,外務省,厚生労働省,最新,ニュース,大使館';
$header_obj->description_page='オーストラリア・ニュージーランド・カナダを初めとしたワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '一般社団法人日本ワーキング・ホリデー協会';
$header_obj->fncMenuHead_link='nolink';

$header_obj->fncMenubar_function=false;

$header_obj->display_header();

?>
	<div id="maincontent" style="">
	<div id="top-main" style="margin-bottom:20px; font-size:12pt; margin: 20px 0 20px 0;">

	やぁ！！ <?php echo $param[1]; ?>さん<br/>きょうのてんきはどうかな？<br/>
	&nbsp;<br/>

<DIV style="font-size:12px;text-align:center;"><IFRAME src="http://link.tenki-yoho.com/img.php?all,acrweb" width=150 height=180 scrolling=NO frameborder=0 marginwidth=0 marginheight=0><A href="http://www.tenki-yoho.com/" target=_blank>天気予報</A></IFRAME><br>-<A href="http://www.tenki-yoho.com/" target=_blank>天気予報コム</A>-</DIV>

	</div><!--top-mainEND-->
	</div><!--maincontentEND-->

  </div><!--contentsEND-->
  </div><!--contentsboxEND-->
<?php fncMenuFooter('nolink'); ?>
</body>
</html>