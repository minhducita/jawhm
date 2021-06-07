<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='エス・ジー・アイ・シー(SGIC） | 日本ワーキング・ホリデー協会';
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

	  <h2 class="sec-title">エス・ジー・アイ・シー(SGIC）　からの声</h2>
	  <div id="sitemapbox">



    <div class="voice-subtitle">
		エス・ジー・アイ・シー(SGIC）　Daikiさんからの体験談
	</div>         
	
<p>&nbsp;</p>

<p class="text01">
<img src="p01.jpg" width="40%" align="right">
    私は大学では英文学科でしたが英語も話すことが出来ず1年間で絶対英語を話せるようになって帰ると目標を決めて留学することにしました。半年間、SGICの一般英語コースを受講しました。とても濃く楽しくSGICで過ごすことが出来ました。学校で学ぶこと全てが自分にとって初めてで学校に行くたびに成長を実感できました。
</p>

	<p>&nbsp;</p>

<p class="text01">
	カナダに着いた時は右も左も分からない状態だった私が今はこんなにもカナダライフを楽しめているのは SGICで色々な国の人と出会い、友達になり一緒に勉強し、色々な経験をSGICを等して学べたからだと思います。この経験は自分にとってとても貴重で決して忘れることのない大切な思い出となりました。それは質問があれば気楽に質問できる環境、失敗を恐れずに英語を話すことにトライできる環境、授業内でも楽しく英語を学べる環境がSGICにあったからだと思います。<br/>
    また授業外のアクティビティーや英会話クラブなど学校の外でも英語を学ぶことが出来ました。先生はいつも英語を学ぶことの大切さを教えてくれ、常に高いモチベーションをもって英語学習に取り組むことが出来ました。週末も含め日本語を全く話さない環境でしたので英語にも慣れ、また新しい何かに挑戦することが怖くなくなりました。SGICで過ごした期間はとても楽しく充実していました。本当に英語を勉強する上でとても良い環境でした。
</p>

	<p>&nbsp;</p>

<p class="text01">
    <img src="p02.jpg" width="40%" align="left">
	卒業日が近くなると、本当に寂しくなり、学校を卒業するとこの英語を学ぶいい環境が終わってしまうのではないかと怖くもなりずっと学校に通いたいと願う毎日でした。こう思えたのは先生、友達、スタッフの皆さんのおかげです。本当にありがとうございました。現在はレストランでサーバーとして働いています。お客さんはローカルのお客さんばかりで電話で予約を取ったり、フロアを一人で任されています。常に英語の環境で英語をさらにしごかれました。<br/>
    初めは全く話せなかったですが、現在では5人の友人がそれぞれ別の国へ留学しましたが、自信をもって私が一番英語が伸びたと思いますし、一番英語が話せると思います。また、一番充実した楽しい留学生活を送れました。日本に帰ってからはあと1年大学が残っていますが、海外に留学することでとても視野が広がり大学卒業後にまた海外の大学に行きたいという夢も出来ました。日本では出来ない様々な体験が出来ますので、迷わずに一歩前に出て色々なことに挑戦してみてください。これからも色々挑戦してお互いに頑張りましょう。

</p>

	<p>&nbsp;</p>

<p class="info">
<strong>Daiki さんが通った、<a href="/school/can/sgic/">エス・ジー・アイ・シー(SGIC）　の情報はこちらから</a></strong>
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
