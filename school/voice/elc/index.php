<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='イングリッシュ・ランゲージ・カンパニー(ELC） | 日本ワーキング・ホリデー協会';
$header_obj->description_page='カナダの学校。ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->add_js_files='<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="/school/voice/jquery.flip.min.js"></script>
<script type="text/javascript" src="/school/voice/script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="/school/voice/styles.css" />';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../../images/mainimg/school-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学・ワーホリ経験者からの声（ELC）';
$header_obj->fncFacebookMeta_function=true;

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs('school','school-voice'); ?>

	  <h2 class="sec-title">イングリッシュ・ランゲージ・カンパニー(ELC）　からの声</h2>
	  <div id="sitemapbox">



    <div class="voice-subtitle">
		イングリッシュ・ランゲージ・カンパニー(ELC）　Yukaさんからの体験談
	</div>         
	
<p>&nbsp;</p>

<p class="text01">
    <img src="p01.jpg" width="40%" align="right">
    私はもともとケンブリッジ検定を受けることに興味があったので、ケンブリッジ対策授業の評価が高い点、あとはアジア人の割合が低い点や、ロケーションの良さからELCを選びました。<br/>

実際、授業の内容は試験に向けてリーディング、ライティング、リスニング、スピーキングを、調度良い早さと難易度で均等に学習しています。先生も明るく的確な指導で、生徒の弱点や小さな疑問にも積極的に解決しようとしてくれる為、モチベーションを高めてくれます。
</p>

	<p>&nbsp;</p>

<p class="text01">
生徒の国籍は、日本人もいますが、フランス語もしくはスペイン語を話す人が多いように感じます。なので、英語を話す機会を増やすか増やさないかは自分次第だと思います。<br/>

そして、ELCはアクティビティの数も多いです。シドニーに来て始めの頃は、毎週火曜日に行われるウェルカムパーティーに参加して友達を増やしていました。ELCの3軒ほど隣にあるパブでハッピーアワータイムにお酒を飲みながら生徒同士でお喋りします。このパブはビリヤード台があったり、10時以降クラブに変わるので初対面の生徒とでも一緒に楽しめて仲良くなりやすかったです。
</p>

	<p>&nbsp;</p>

<p class="text01">
    <img src="p02.jpg" width="40%" align="left">
ロケーションは、シドニーの都心部にありかなり都会です。でも少し歩けば広い芝生や港、オペラハウスもあって、こういうところが日本と違うなと思いながらゆっくりした時間を時々過ごします。

文法はできるけど会話はできず大人しくなってしまう日本人に対して、他の国の人達はどんどん話して輪を広げていきます。<br/>

仕事やアクティビティなど色々なことに挑戦する機会があり、お話好きなオージーが暮らすシドニーは、私たちが英会話力を伸ばす最適な場所ではないでしょうか。
</p>

	<p>&nbsp;</p>
<br/>
<p class="info">
<strong>Sayaka さんが通った、<a href="/school/aus/ELC/">イングリッシュ・ランゲージ・カンパニー(ELC）　の情報はこちらから</a></strong>
</p>

<p>&nbsp;</p><p>&nbsp;</p>


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
