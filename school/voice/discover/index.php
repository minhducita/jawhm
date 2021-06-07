<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='ディスカバー・イングリッシュ（Discover English） | 日本ワーキング・ホリデー協会';
$header_obj->description_page='オーストラリアの学校。ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->add_js_files='<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="/school/voice/jquery.flip.min.js"></script>
<script type="text/javascript" src="/school/voice/script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="/school/voice/styles.css" />';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../../images/mainimg/school-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学・ワーホリ経験者からの声（Fusion）';
$header_obj->fncFacebookMeta_function=true;

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs('school','school-voice'); ?>

	  <h2 class="sec-title">ディスカバー・イングリッシュ（Discover English）　からの声</h2>
	  <div id="sitemapbox">



    <div class="voice-subtitle">
		ディスカバー・イングリッシュ（Discover English） 卒業生　Senaさんからの体験談
	</div>

<p>&nbsp;</p>

<p class="text01">
ディスカバーイングリッシュで勉強をはじめて、英語を使う仕事がしたくてカフェをとりあえず探そうと思って履歴書をたくさん配りました。しかし、全然手ごたえがなく、先生に相談していたら「隣のカフェいいよ～」と紹介してもい閉店間際に履歴書を持って行ったところ、コーヒー入れてみて！と言われすぐその場でコーヒーを入れさせてくれました。そして、翌日トライアルで働ける事に！すごくタイミングよく、学校が終わる週に採用され、翌週からフルタイムで働けることになりました。
</p>
	<p>&nbsp;</p>

<p class="text01">
	<span style="font-weight:bold; font-size: small;">■ メルボルンを選んだ理由</span><br/>
	カフェが多い街と聞いて！来る前はオーストラリアは「おしゃれに興味がない」というイメージだったけど、メルボルンの人はすごくおしゃれです。そして、意外と都会なんだなぁと感動しました。
</p>
	<p>&nbsp;</p>


<p class="text01">
	<span style="font-weight:bold; font-size: small;">■ メルボルンでの生活 </span><br/>
	家の近くのサウスメルボルンマーケットに行くのが大好きです！食材が充実してて、新鮮で安い！料理をして友達と食べてるのが楽しいです。
</p>

	<p>&nbsp;</p>

<p class="text01">
	<span style="font-weight:bold; font-size: small;">■ ディスカバーイングリッシュを選んだ理由</span><br/>
	<img src="./p1.jpg" width="35%" align="right" style="margin-top: -40px;">
いくつかある学校の中から、ディスカバーはアクティビティが多いと聞き参加したいと思い選びました。学校がスタートし、毎日あるアクティビティの中からほとんど参加しました！特に好きだったアクティビティはビクトリアマーケット、シティウォーク系と英語で歌を歌うSinglish！<br /><br />
クラスは初中級からスタートし、最終的には中級で卒業しました。先生はすごく楽しくて、授業ではしっかり勉強しつつもゲームをしたり、カンバセーションを多く取り入れられておりました。最初は日本人同士かたまりがちだったけど、２週目から授業を通して他の国籍の子と話すようになり、多国籍の友達が増えました。普段遊ぶお友達はタイ、韓国、コロンビア、イタリアなど。
</p>

<p class="text01">
	<span style="font-weight:bold; font-size: small;">■ これからメルボルンへ行こうと思っている方へ </span><br/>
メルボルンには色んな国からの学生が多いので、勉強するにはとても良い環境だと思います。また、生活もしやすいし、学割が聞くのも魅力的！そして、何よりも怖がらず、なんでもやってみること！日本ではできない経験がたくさんできると思います。
</p>

<p class="info">
<strong>Sena さんが通った、<a href="/school/aus_discover/">ディスカバー・イングリッシュ（Discover English）の情報はこちらから</a></strong>
</p>


	<div style="height:30px;">&nbsp;</div>

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