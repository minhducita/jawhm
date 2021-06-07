<?php
require_once '../../include/header.php';

include '../../seminar_module/seminar_module.php';

$sm = new SeminarModule($config);

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='辻　真実';
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

	  <h2 class="sec-title">カウンセラー紹介　辻　真実</h2>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		<section class="mgb50">
		  <h2 class="counselor-osaka">
			<span class="osaka">OSAKA</span>
			大阪オフィス</h2>
			<img src="../../images/counselor/osaka/mami_01.jpg" alt="辻　真実" class="imagesLeft"/>
				<h3 class="counselorName">辻　真実</h3>
				<span class="nameEnglish">Mami Tsuji</span>
				<table class="self">
					<tbody>
						<tr class="tB1">
							<th class=" tR1">渡航した国</th>
							<th class="words">イギリス　　カナダ</th>
						</tr>
<!--						<tr class=" tB1">
							<th class=" tR1">出身</th>
							<th class="words">大阪府</th>
						</tr>
-->						<tr class=" tB1">
							<th class=" tR1">使用したビザ</th>
							<th class="words">観光ビザ<br />ワーキングホリデー</th>
						</tr>
						<tr>
							<th class="tR1">座右の銘</th>
							<th class="words">一期一会</th>
						</tr>
					</tbody>
				</table>
			<div>
				<ul class="experience">
					<li class="lineB3">マミさんの海外経験<span class="plane">An experience abroad...</span></li>
					<li class="lineB1"><span class="list1">1</span>２０歳の夏、始めての短期留学。イギリス・オックスフォードへ。</li>
					<li class="lineB1"><span class="list2">2</span>２１歳の冬、再び短期留学。カナダ・バンクーバーへ。</li>
					<li class="lineB1"><span class="list3">3</span>社会人を経て、再びカナダ・バンクーバーへ。　ワーキングホリデーの始まり。</li>
					<li class="lineB1"><span class="list4">4</span>J-shine取得。日本語学校でボランティア。</li>
			                <li class="lineB1"><span class="list4">5</span>現地日本食レストランでアルバイトを始める。</li>
			                <li class="lineB1"><span class="list4">6</span>目標だった「留学業界」での仕事が決まり、語学学校でカウンセラーとして働く。</li>
					<li class="line"><span class="list5">7</span>日本に帰国後、ワーホリの経験を活かして今の業界に就職。</li>
				</ul>
			</div>
			<div>
				<h3 class="title_osaka"><font color="#f66f92"><b>留学・ワーホリに行こうと決めたきっかけを教えてください</font></b></h3>
				<img src="../../images/counselor/osaka/mami_02.jpg" alt="辻　真実" class="imagesLeftMgl20"/>
				<p class="textMgl">記念すべき20歳！ハタチの夏休みを忘れられないものにしたい！！という想いから短期留学を経験するためにイギリス・オックスフォードに１ヵ月行きました！！<br/ ><br />
					「英語」が出来れば日本人以外の人とも話ができる！！！世界が広がる！！という喜びをかみしめ、その後、カナダ・バンクーバーに再度１ヵ月の短期留学をしました。<br /><br />
					そして帰国して、ふっと思ってしまったのです！今度はVisit（訪問）ではなくStay（滞在）をしたい！！次はワーキングホリデーで渡航して現地で仕事をしながら暮らしたい！！！！と思い、社会人を経て退職後、ワーキングホリデーとして大好きなカナダ・バンクーバーに戻りました！！
				</p>
			</div>
			<div>
			  <h3 class="title_osaka"><font color="#f66f92"><b>海外ではどんな生活をしていましたか？</font></b></h3>
				
				<p class="text">イギリスとカナダの短期留学中は、語学学校＋旅行みたいな感じでした。どちらでもホームステイを経験して、世界各国の友達が沢山出来ました！<br/ ><br />
					カナダへワーキングホリデーに行った時は、まず語学学校に通ってJ-shineの資格を取得！その後日本語学校のボランティアや、日本食のレストランでのアルバイト、語学学校のカウンセラーなどを経験しました。住んでいた場所は1年間ずっとホームステイ！カフェ英会話などを通してネイティブと出会い、アジア、南米、ヨーロッパなど、たくさんの友達や同僚ができました。
				</p>
			</div>
			<div>
				<h3 class="title_osaka"><font color="#f66f92"><b>海外では、どんなことに苦労しましたか？</font></b></h3>
				<p class="text">短期留学中は、とにかく自分の発言力のなさに驚きました。他の国の友達はどんどん意見を言っているのに言えなかったり、自分の国の事を相手に伝えられなかったりで悔しい思いもしました。文化の違いにも苦労しました。例えば、出した洗濯物が１週間返ってこなかったり、すごく時間にルーズだったり・・・。<br /><br />
						ワーキングホリデー中は留学関連の仕事を探していたのですが、留学業界はワーホリじゃなくて移民件を持っている人を欲しがっていたので苦戦しました。また、学校卒業後の英語力キープも苦労したところです。
				</p>
			</div>
			<div>
				<h3 class="title_osaka"><font color="#f66f92"><b>「きっとこれは自分しか体験していない！」といった体験はありますか？</font></b></h3>
				<p class="text">Pride Parade（同性愛文化を讃えるイベント）に、観客ではなくパレードする側として学校の友達みんなで出た！！！
				</p>
			</div>
			<div>
			  <h3 class="title2_osaka"><font color="#f66f92"><b>海外でのオススメを教えてください！</font></b></h3>
				<p class="text"><b>■食べ物</b><br />
						イギリス：フィッシュ＆チップス/屋台で買えるチップス<br /><br />
						カナダ：プーティン/ホットチョコレート/メープル味のドーナツ/ジャパドッグ（ホットドッグ）<br /><br />
						<b>■観光地</b><br />
						イギリス：Bath/クライストチャーチ（ハリーポッターの食堂）<br /><br />
						カナダ：ロッキーマウンテン/ナイアガラの滝/White Rock<br /><br />
						<b>■仕事</b><br />
						ベビーシッター：子供の英語はまだ発達段階なので聞きとる力が鍛えられる。また、こちらもきちんと発音しないと伝わらないのでスピーキング力も伸びる。そしてその国の教育方針も間近で学べる<br /><br />
						日本語教師及びボランティア：日本語だけでなく文化も英語で教えられる機会。日本語を継承させたいと強く願う親御さんとの貴重な出会いもある。<br /><br />
						<b>■ライフスタイル</b><br />
						とにかく外に出て色んな人と出会う！！文化や価値観の違いを知り学ぶ！一生を通して付き合っていける友人が出来る！！そしてコネクションも出来、仕事探しにもつながる

			  </p>
		  </div>
			<div>
			  <h3 class="title2_osaka"><font color="#f66f92"><b>ワーホリ・留学での経験は、今のアナタにどのような影響を与えていますか？</font></b></h3>
				<p class="text">①価値観・人間的成長<br />
						世界を相手に色んな国から来た人たちと話をし、一緒に学び、遊び、働いたことで今まで以上に物事に対する考え方の幅が広がりそれを理解し、受け入れようとする力がついた。<br /><br />
						②周りの助けと感謝<br />
						言葉や国籍が違う異国の地でも、しんどい時、大変な時に最終的に助けてくるのは人というのを実感した。<br />
						仕事が決まらない時に励まし続けてくれたホストファミリー、レジュメを添削してくれた友達、ポジションを与えてくださった校長先生。目標を持って行動し続けていれば、異国の地でも必ず応援して助けてくれる人は居ることを痛感したし、夢は叶う！と自信を持って言える。
			  </p>
                
				<h3 class="title2_osaka"><font color="#f66f92"><b>留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</font></b></h3>
				<p class="text3">人生の中で大きな決断をしなければいけない時が何度かある。海外に飛び出すことでお金、時間、キャリア。。。もちろん失うものがあるのは確か。<br /><br />
					でも全ては自分の決断と行動と考え方次第でどうにだって変えられる。自分への最大限の自己投資とプラスに考えてみる。一歩世界に出ることで日本では出来ない経験が無数に待っていて得るものがあって結果、失ったものと比べられないくらい得るものがある！！！
				</p>
		  </div>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>

			<center><a href="http://www.jawhm.or.jp/blog/search/tag/?tag=%E3%82%AB%E3%82%A6%E3%83%B3%E3%82%BB%E3%83%A9%E3%83%BC%EF%BC%9A%E8%BE%BB%E3%80%80%E7%9C%9F%E5%AE%9F" target="blank"><span class="seminor">カウンセラーが書いたブログ記事はこちらから！</span></a></center>

		  <h2 class="sec-title">セミナー情報</h2>

	  		<table>
				<tr>
					<td><p class="text01"><b><font size="3"><center>このカウンセラーが担当する体験談セミナーに参加しよう！</center></td>
				</tr>
				<tr>
					<td><?php  $config = array( 'view_mode' => 'list' ,'list' => array('multi_use' => 'on','detail_open' => 'off', count_field_active => 'none','backcolor' => '#f66f92', title => '長期滞在だからこそ味わう喜びと苦しさ','place_default' => 'osaka') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show();  ?></td>
				</tr>
			</table>

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