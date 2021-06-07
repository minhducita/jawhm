<?php
require_once '../../include/header.php';

include '../../seminar_module/seminar_module.php';

$sm = new SeminarModule($config);

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='小澤　祐介';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協会の各オフィスのご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/counselor-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '日本ワーキング・ホリデー協会カウンセラー紹介';

$header_obj->add_js_files='<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"><	
<script type="text/javascript" src="script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="styles.css" />';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>

	  <h2 class="sec-title">カウンセラー紹介　小澤　祐介</h2>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		<section class="mgb50">
			<h2 class="counselor-tokyo2">
			<span class="tokyo2">TOKYO</span>
			新宿オフィス</h2>
			<img src="../../images/counselor/tokyo/yusuke_01.jpg" alt="小澤　祐介" class="imagesLeft"/>
				<h3 class="counselorName">小澤　祐介</h3>
				<span class="nameEnglish">Yusuke Ozawa</span>
				<table class="self">
					<tbody>
						<tr class="tB1">
							<th class=" tR1">主な滞在国</th>
							<th class="words">カナダ<br />オーストラリア</th>
						</tr>
						<tr class=" tB1">
							<th class=" tR1">出身</th>
							<th class="words"></th>
						</tr>
						<tr class="tB1">
							<th class="tR1">使用したビザ</th>
							<th class="words">ワーキングホリデービザ</th>
						</tr>
						<tr>
							<th class="tR1">座右の銘</th>
							<th class="words">やらずに後悔よりやって満足</th>
						</tr>
					</tbody>
				</table>
			<div>
				<ul class="experience">
					<li class="lineB3"><b>ユウスケさんの海外経験</b><span class="plane">An experience abroad...</span></li>
					<li class="lineB1"><span class="list1">1</span>カナダ・バンクーバーへ渡航、語学学校に通う</li>
					<li class="lineB1"><span class="list2">2</span>ロッキー山脈に近いバンフの現地ホテルで働く</li>
					<li class="lineB1"><span class="list3">3</span>カナダ東部＆アメリカを旅行し、日本へ一時帰国</li>
					<li class="lineB1"><span class="list4">4</span>オーストラリア・ケアンズへ渡航</li>
					<li class="lineB1"><span class="list4">5</span>ケアンズ⇒ブリスベン⇒ゴールドコースト⇒シドニーと、旅をしながらバスで縦断</li>
					<li class="lineB1"><span class="list4">6</span>シドニーに到着、現地レストランで働く</li>
                   			<li class="line"><span class="list5">7</span>シンガポール＆台湾を旅行し、日本へ帰国</li>
                  
				</ul>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>あなたが海外へ行こうと思ったきっかけは？カナダを選んだ理由は？</b></font></h3>
				<p class="text">物事の視野を広げて見れる人間になりたかった。当時好きだった女の子がバンクーバーに渡航経験があり、勧められて。仕事が忙しかったこともあり、日本での生活に若干嫌気がさしていたので、思い切って海外に行こう！と。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>アナタが海外へ行こうと思ったきっかけはなんですか？</font></h3>
				<p class="text">物事の視野を広げて見れる人間になりたかった。当時好きだった女の子がバンクーバーに渡航経験があり、勧められて。仕事が忙しかったこともあり、日本での生活に若干嫌気がさしていたので、思い切って海外に行こう！と思ったのでした。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>海外ではどんな生活をしていましたか？</b></font></h3>
				<p class="text">どの国でも友達を作り、一緒に遊んだり、旅行に行ったりしました。カナダではホテルの仕事をしていて、週５～6日は働いていました。社員寮に住んでいたこともあり、家賃は安く、食事も朝食無料、昼、夜は2ドルで食べれていました。今思うとかなりオイシイ仕事場だったな～と思います。笑　</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>大変だった体験はありますか？</b></font></h3>
				<p class="text">海外の友達と4人で旅行中、レンタカー内にあったオレンジジュースを飲んだら食中毒にかかりいきなり高熱がでてしまったことがあります・・・　運転中で、しかも運転できるのは私だけだったので車内は大パニックに。コンディション最悪ながらも3時間運転して家につきました。ちなみに熱は39度ありました・・・</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>「きっとこれは自分しか体験していない！」といった体験はありますか？</b></font></h3>
				<p class="text">予約していたホテルが潰れていて、初めて行った知らない街の公園で野宿したことがあります。その日はオーストラリアで大きなイベントが行われる日だったこともあって、代わりのホテルも全く見つからず・・・。でも、同じく野宿していたバックパッカーやホームレスの人たちと仲良くなり、深夜まで話して盛り上がりました！今となってはいい思い出です。</p>
			</div>
			<div>
				<h3 class="title2"><font color="#0062b3"><b>海外のオススメを教えてください</b></font></h3>
				<p class="text">カナダならレイクルイーズとナイアガラフォールズ。日本では絶対に見ることのできない自然の雄大さを感じられます。<br /><br />
						アメリカならやっぱりニューヨーク。日本にはない風景や雰囲気があり、いろんな意味で行ってよかったです。<br /><br />
						そして台湾は人が皆優しくて、食べ物もおいしい。女の子もかわいい（笑）もう一度行きたい国NO.1！</p>
				</div>
			<div>
				<h3 class="title2"><font color="#0062b3"><b>ワーホリ・留学での経験は、今のアナタにどのような影響を与えていますか？</b></font></h3>			
				<p class="text">いろんな国の友達のいろんな考え方を受け入れることで、思考が柔軟になった。また、シャイだった自分が臆することなく人と話せるようになりました。</p>
				<h3 class="title2"><font color="#0062b3"><b>留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</b></font></h3>			
				<p class="text3">人生一度きり！やらずに後悔よりやって満足！</p>
			</div>

		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>

			<center><a href="http://www.jawhm.or.jp/blog/search/tag/?tag=%E3%82%AB%E3%82%A6%E3%83%B3%E3%82%BB%E3%83%A9%E3%83%BC%EF%BC%9A%E5%B0%8F%E6%BE%A4%E3%80%80%E7%A5%90%E4%BB%8B" target="blank"><span class="seminor">カウンセラーが書いたブログ記事はこちらから！</span></a></center>

	  		<table>
				<tr>
					<td><p class="text01"><b><font size="3"><center>このカウンセラーが担当する体験談セミナーに参加しよう！</center></td>
				</tr>
				<tr>
					<td><?php $config = array( 'view_mode' => 'list' ,'list' => array('detail_open' => 'off', count_field_active => 'none','backcolor' => '#0062b3', title => '複数国行ったから話せる！') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show(); ?></td>
				</tr>
			</table>
		<br />
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		</section>

<!--
	  <div class="top-move">
		<p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>-->


	  </div>
	</div>
  </div>
  <!-- </div> -->

<?php fncMenuFooter($header_obj->footer_type); ?>


</body>
</html>