<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='イー・エル・エス・ランゲージ・センター(ELS） | 日本ワーキング・ホリデー協会';
$header_obj->description_page='カナダの学校。ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->add_js_files='<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="/school/voice/jquery.flip.min.js"></script>
<script type="text/javascript" src="/school/voice/script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="/school/voice/styles.css" />';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../../images/mainimg/school-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学・ワーホリ経験者からの声（ELS）';
$header_obj->fncFacebookMeta_function=true;

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs('school','school-voice'); ?>

	  <h2 class="sec-title">イー・エル・エス・ランゲージ・センター (ELS)　からの声</h2>
	  <div id="sitemapbox">



    <div class="voice-subtitle">
		イー・エル・エス・ランゲージ・センター (ELS)　Sayakaさんからの体験談
	</div>         
	
<p>&nbsp;</p>

<p class="text01">
    <img src="./p01.jpg" align="right">
    ELSは日本人が比較的少なく、学校のカリキュラムが、自分の求めているものに当てはまったため選びました。。
	ELSの授業の構成はとてもしっかりしていて、宿題も多いです。
	文の構成をしっかり勉強することによって、自分が何を伝えたいか、相手が何を伝えようとしているかなどのコミュニケーション力もついていきます。
</p>

	<p>&nbsp;</p>

<p class="text01">
	先生方は、生徒一人ひとりに目を向けてくれます。先生方にももちろん個性がありますが、どの先生も授業は気合を入れて教えてくれます。
	生徒がセッション最終週に、10項目程先生の評価をし、その評価が重要視されていると思います。私は当初、1ヶ月間だけの申し込みでしたが、延長し合計３ヶ月通いました。
</p>

	<p>&nbsp;</p>

<p class="text01">
	ワーキングホリデービザなので、仕事をした後、また３ヶ月程、次はビジネスイングリッシュを学びにこの学校へ通いたいと考えています。
	ELSは先生、生徒がお互いに尊重しあい学校生活をしていける、人としても成長して行ける場所だと思います。
</p>

	<p>&nbsp;</p>

<p class="info">
<strong>Sayaka さんが通った、<a href="/school/can/ELS/">イー・エル・エス・ランゲージ・センター (ELS)　の情報はこちらから</a></strong>
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
