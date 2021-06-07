<?php
require_once '../../include/header.php';

include '../../seminar_module/seminar_module.php';

$sm = new SeminarModule($config);

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='永島 拓也';
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

	  <h2 class="sec-title">カウンセラー紹介　永島 拓也</h2>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		<section class="mgb50">
		  <h2 class="counselor-nagoya">
			<span class="nagoya">NAGOYA</span>
			名古屋オフィス</h2>
			<img src="../../images/counselor/nagoya/nagashima1_sam2.JPG" alt="永島 拓也" class="imagesLeft"/>
				<h3 class="counselorName">永島 拓也</h3>
				<span class="nameEnglish">Takuya Nagashima</span>
				<table class="self">
					<tbody>
						<tr class="tB1">
							<th class=" tR1">主な滞在国</th>
							<th class="words">カナダ・オーストラリア<br />ニュージーランド・アメリカ</th>
						</tr>
						
						<tr class="tB1">
							<th class="tR1">使用したビザ</th>
							<th class="words">ワーキングホリデービザ</th>
						</tr>
						<tr>
							<th class="tR1">座右の銘</th>
							<th class="words">It's kind of fun <br />to do the impossible!!</th>
						</tr>
					</tbody>
				</table>
			<div>
				<ul class="experience">
					<li class="lineB3">タクヤさんの海外経験<span class="plane">An experience abroad...</span></li>
					<li class="lineB1"><span class="list1">1</span>16歳の時にアメリカに１ヶ月滞在。</li>
					<li class="lineB1"><span class="list2">2</span>ミュージシャンの仕事を辞めて、カナダへ渡航。</li>
					<li class="lineB1"><span class="list3">3</span>カナディアンオーナーのメキシカンレストラン・テキーラのショットバーで仕事開始。</li>
					<li class="lineB1"><span class="list4">4</span>北米の大学進学を目指してTOEFL&IELTSコースを受講。</li>
                    <li class="lineB1"><span class="list4">5</span>ビザの期限もあり、やむなく帰国。３週間後すぐにオーストラリアへ渡航。</li>
                    <li class="lineB1"><span class="list4">6</span>ブリスベン・ゴールドコースト・シドニー・メルボルンとさまざまな街を住みながら１年半滞在。</li>
                    <li class="lineB1"><span class="list4">7</span>その後ニュージーランドとアメリカへ渡航。</li>
					<li class="line"><span class="list5">8</span>自分の経験を活かそうと思い、ワーキング・ホリデー協会　東京に就職。2013年より名古屋オフィスマネージャーとなる。</li>
				</ul>
			</div>
			<div>
				<h3 class="title_nagoya"><font color="#00b38c"><b>アナタが海外へ行こうと思ったきっかけは何ですか？</b></font></h3>
				<p class="text">中学１年の頃からギターを始めて、専門学校もずっと音楽の専門学校を出て、ずっと音楽のみをやってきました。<br /><br />ただミュージシャンの道が難しくなった際に、何をしようかと考えて、海外への憧れもあり覚悟を決めて海外へ飛び出しました！<br />スノーボードも好きで、音楽も盛んな北米のトロントを選びました。<br />アメリカにも興味がありましたが、やはり海外での仕事の経験もしてみたい！<br /><br />そして、自分の力で生活をしていろいろな経験をしてみたいという事もあり、ワーキングホリデービザで渡航しました！
				</p>
			</div>
			<div>
				<h3 class="title_nagoya"><font color="#00b38c"><b>海外ではどんな生活をされていましたか？</b></font></h3>
				
				<p class="text">現地では学校を長期で通い、海外のたくさんの友達とアクティビティでサッカーをしたり、ナイアガラへ行ったりと楽しんできました。<br /><br />授業では資格のコースを選択をして、IELTS/TOEFLの資格も取得しました。<br />仕事はダウンタウンでメキシカンレストラン・テキーラのショットバーでのウエイターやバーテンダーのお仕事を経験しました。<br />そこでネイティブのスタッフとネイティブのお客様とに囲まれて、頑張ってきました。</p>
			</div>
			<div>
			  <h3 class="title_nagoya"><font color="#00b38c"><b>海外で特に苦労したことは何ですか？</b></font></h3>
				<img src="../../images/counselor/nagoya/nagashima3.JPG" alt="永島 拓也" class="imagesRight"/>
				<p class="textMgr">セミナーでもお話をさせていただいておりますが、現地に行けばなんとかなるだろう～と思って出発をしてしまったので、とにかく分からない事が多かったです。。<br /><br />その割にはプライドは高く、日本人の友達にいろいろ聞いたりしなかったので、お金がとにかくかかりました。。<br />毎日分からない事が多く、やはりネイティブとは生活や文化も違うので、こんな僕でもホームシック気味になってしまった事は今でもつらかった思い出です。
</p>
			</div>
			<div>
				<h3 class="title_nagoya"><font color="#00b38c"><b>「きっとこれは自分しか体験していない！」といった体験を教えてください</b></font></h3>
				<p class="text">カナダ・オーストラリア・ニュージーランド・アメリカとさまざまな国を経験してきた事は、自分しか経験をしていない体験だと思います。<br />海外渡航する際にはどこの国が良いだろうか？何が違うのだろうか？とさまざまな質問があると思います。<br /><br />ですが、さまざまな国で滞在し、現地の方とふれあい、たくさんの方と友達になり、話をしてきました事が自分しか持っていないたくさんの思い出と体験になります！
				</p>
			</div>
			<div>
			  <h3 class="title2_nagoya"><font color="#00b38c"><b>海外でのオススメを色々教えてください！</b></font></h3>
				<img src="../../images/counselor/nagoya/nagashima2.JPG" alt="永島 拓也" class="imagesLeftMgl20"/>
				<p class="textMgl">カナダは移民が多く、カナダ料理というのが基本的にはありません。<br /><br />
				  ただ街の中にはイタリアンタウンやギリシャ人街などさまざまな文化の都市も多いので、本格的な料理が食べれます！<br /><br />そしてやはり世界最大のナイアガラの滝は凄く、一度は見るべきだと思います！<p/>
                  <p class="text2">オーストラリアとニュージーランドはアクティビティが多くあるので、バンジージャンプやラフティング、ダイビングなどさまざまな自然に触れる事ができます。<br />文化的な建物や歴史もあるので、ぜひ日本語のガイドブックには載っていない現地の穴場や現地の方から聞く、生活の話などを聞いてみてください。
			  </p>
		  </div>
			<div>
			  <h3 class="title2_nagoya"><font color="#00b38c"><b>ワーホリでの経験は、今のアナタにどのような影響を与えていますか？</b></font></h3>
			<img src="../../images/counselor/nagoya/nagashima4.JPG" alt="永島 拓也" class="imagesRight"/>
				<p class="textMgr">さまざまな国へ行き、いろいろな方と話をして生活をしたので、世界への関心が増えました。そして英語を話せるようになったことで、日本以外の方と話すようになり、外国人から見た日本や日本の不便な事などを聞き、改めて海外を好きになり日本が好きになりました！<br /><br /><br /><br /><br />
				</p>
				<h3 class="title2_nagoya"><font color="#00b38c"><b>留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</b></font></h3>
				<p class="text3">僕の座右の銘にも書いた『It's kind of fun to do the impossible!!』という言葉はウォルト・ディズニーの言葉です。<br />僕は海外でツライ時などにはこの言葉を思い出しましたし、ぜひこれからワーホリに行く方にもこの言葉を贈ります！<br /><br />この言葉は『不可能を可能にする事は楽しい』という意味です。<br />僕の場合も出発前にはまわりから「英語も出来ないのにどうするの？」「海外でなんて生活出来ないでしょ？」と言われて不安になりました。<br /><br />もちろん英語を学ぶという事は凄く大変ですが、どんどん話せるようになり、ネィテイブと飲み明かして、笑いあってという生活を出来た時に不可能を可能に出来るなんてこんなにも楽しいんだと本気で思いました。<br /><br />ぜひ皆様も自分を信じて、海外生活・英語というもの挑戦して楽しみましょう！！
				</p>
		  </div>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>


		  <h2 class="sec-title">セミナー情報</h2>

	  		<table>
				<tr>
					<td><p class="text01"><b><font size="3"><center>このカウンセラーが担当する体験談セミナーに参加しよう！</center></td>
				</tr>
				<tr>
					<td><?php  $config = array( 'view_mode' => 'list' ,'list' => array('multi_use' => 'on','past_view' => 'off','detail_open' => 'off', count_field_active => 'none','backcolor' => '#00b38c', title => '自分にあった国選びを！','place_default' => 'nagoya') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show();   ?></td>
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