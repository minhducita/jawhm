<?php
require_once '../include/header.php';
$header_obj = new Header();

$header_obj->title_page='日本ワーキング・ホリデー協会（ワーホリ)| 年2万人超のセミナー来場者数';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。年間25,000人以上の方に、セミナーに参加頂いています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。ワーホリなら日本ワーキングホリデー協会';
if($header_obj->computer_use() == false && $_SESSION['pc'] != 'on'){
	$header_obj->add_css_files = "<link href='/css/top/top_mobile.css' rel='stylesheet' type='text/css'>";
}
$header_obj->add_css_files = "<link href='css/style.css' rel='stylesheet' type='text/css'>";
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'メンバーログイン | メンバー専用ページ';
$header_obj->full_link_tag = true;

$header_obj->display_header();
?>

<body>

<div id="shindan_wrap">
	<div class="image-area">
		<img src="img/shindan_header01.png" />
	</div>
	<div class="title-area">
		ワーホリダイスキ！<br />
		そんなアナタのタイプを診断！
	</div>
	<div class="common-area">
		ワーホリを通して自分を成長させたい。<br />
		海外生活を思いきり満喫したい。<br />
		たくさんの出会いを経験したい。
	</div>
	<div class="common-area">
		ワーホリタイプはいろいろありますが<br />
		あなたはどのタイプでしょうか？
	</div>
	<div class="common-area">
		早速診断してみましょう！
	</div>
	<div class="button-area">
		<a href="questions"><img src="img/shindan_button.png" /></a>
	</div>
</div>

<?php fncMenuFooter($header_obj->footer_type); ?>
</body>
</html>
