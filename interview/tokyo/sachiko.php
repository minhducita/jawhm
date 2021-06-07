<?php
require_once '../../include/header.php';

include '../../seminar_module/seminar_module.php';

$sm = new SeminarModule($config);

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='根　幸子';
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

	  <h2 class="sec-title">カウンセラー紹介　根　幸子</h2>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		<section class="mgb50">
			<h2 class="counselor-tokyo2">
			<span class="tokyo2">TOKYO</span>
			新宿オフィス</h2>
			<img src="../../images/counselor/tokyo/sachiko_01.jpg" alt="根　幸子" class="imagesLeft"/>
				<h3 class="counselorName">根　幸子</h3>
				<span class="nameEnglish">Sachiko Kon</span>
				<table class="self">
					<tbody>
						<tr class="tB1">
							<th class=" tR1">主な滞在国</th>
							<th class="words">カナダ</th>
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
							<th class="words">いつでも前向きに</th>
						</tr>
					</tbody>
				</table>
			<div>
				<ul class="experience">
					<li class="lineB3"><b>サチコさんの海外経験</b><span class="plane">An experience abroad...</span></li>
					<li class="lineB1"><span class="list1">1</span>小学生の頃、中国を訪れる。初めて異文化に触れ、外国人の友人もできる。</li>
					<li class="lineB1"><span class="list2">2</span>高校生の時、夏休みを使いニュージーランドに短期留学。</li>
					<li class="lineB1"><span class="list3">3</span>大学ではアメリカ経済を専攻し、海外の経済事情について学ぶ。</li>
					<li class="lineB1"><span class="list4">4</span>大学在学中、長期で海外経験がしたいと思いワーキングホリデーを使いカナダへ。</li>
					<li class="lineB1"><span class="list4">5</span>語学学校に通い、その後現地のレストランでアルバイトをする。</li>
					<li class="lineB1"><span class="list4">6</span>英語力をさらに上げるため、アルバイトしながら再度語学学校に通う。</li>
					<li class="lineB1"><span class="list4">7</span>帰国前にTOEICの専門学校に通う。</li>
                   			<li class="line"><span class="list5">8</span>帰国後、大学に戻り就職活動を行い、今の業界に就職。</li>
                  
				</ul>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>アナタが海外留学・ワーホリに行こうと思ったきっかけは何ですか？</b></font></h3>
				<p class="text">元々、外国人の友人をたくさん作りたくて、中学生の頃からペンパル（海外の人との文通）などをしていました。その後、高校の時にニュージーランドでの短期留学を経験したことで、長期間海外で生活したい！という意欲がさらに高まりました。本当はアメリカに留学したかったので、大学ではアメリカ経済を専攻していたのですが、予算面などで厳しかったので現地で働きながら生活できるワーキングホリデー制度を知り興味を持ちました。結局アメリカにも行きやすく治安もいいという点でカナダに渡航することに決めたんです。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>カナダではどんな生活をしていましたか？</b></font></h3>
				<p class="text">カナダに到着してからは、まず語学学校に１２週間通いました。そこで英語を学びながら、４ヶ月目から日本食レストランでアルバイトをスタート！日本食のレストランだったので「英語を使わないかも」という不安があったのですが、私が思っていたより英語使いました。その後もアルバイト変えながら生活し、日本に帰る前に資格の勉強をする為再度学校へ入学。最後はTOEICの専門学校に通い、最終的にTOEICのスコアが約200点UPしました！<br /><br />
					生活スタイルは、最初の１ヶ月半はホームステイし、それ以降はシェアハウスで生活していました。１回目のシェアハウスは日本人と8カ月ほど一緒にいたのですが、やはり日本語しか使わない環境だったのは考えものでした。でも同じ国の出身だから、文化的な衝突はなかったです。その後２回目のルームシェアでは他の国（韓国人やメキシコ）の方一緒に住みました。２カ月ほどの期間、大きな衝突はなかったものの、誰も物を片付けてくれなかったりして少し不満もありました。その後は日本人オーナーの貸部屋スタイルでオウンルームに住んだり、現地の友人宅に居候をしたりして、日本へ帰ってきました。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>カナダで生活している間、大変だったことはありましたか？</b></font></h3>
				<p class="text">ルームシェアをした際、直接大家さんと契約を結んだのですが、光熱費などを全部自分で契約しなければならず、大変でした。また、友人を呼びすぎてオーナーに怒られたこともあります。<br /><br />
					コインランドリーを使って洗濯していて、洋服を取りに行くと私の衣類が盗まれていた、なんてこともありました。（目を離していたので自己責任なのですが・・・）<br /><br />
					アルバイトをしていた時は、レストランのど真ん中（お客さんがいる場で）うまく店を回せられていないとオーナーに怒られたこともあります。私の状況確認が甘かったのですが、なかなかきつかったです。でもその後、お客様が慰めてくれてチップもくださいました。（笑<br /><br />
				</p>
			</div>
			<div>
				<h3 class="title"><b><font color="#0062b3">「きっとこれは自分しか体験していない！」といった体験はありますか？</b></font></h3>
				<p class="text">カナダで東日本大震災の募金活動に参加したことです。多くの方の優しさに触れることができ、とても感動したのを覚えています。
				</p>
			</div>
			<div>
				<h3 class="title2"><font color="#0062b3"><b>オススメのカナダライフを教えてください！</b></font></h3>
			<p class="text">カナダはとにかく移民国家なのでたくさんの国の料理を食べれます！特に電車に乗らなくても中心部であれば一週間違う国の料理を食べ続けることも可能！私はジャンクフードが好きなのでアメリカ発のレッドロビンはとってもお勧め！ハンバーガーレストランでポテトはお替り無料です！←これによりかなり太りました。　<br /><br />
					カナダといったらプーティンもあるので試してみてください！あとはカナダの大自然を体感してください！私はしょっちゅう吊り橋を渡り山登り？してました。笑　あとは大きな公園をサイクリングしたりビーチでまったりしたり。ウィスラーでウィンタースポーツやイエローナイフにオーロラを見に行くのもオススメですね！<br /><br />
					あとはたくさんのイベントに参加してください！イタリアンフェスティバルやインディアンフェスティバル、カナダデイの等の国のお祭りやゲイパレードやクリスマスパレード、花火大会、寒中水泳、映画祭等年間を通してイベントが盛りだくさんですよ！！	

				</p>
				</div>
			<div>
				<h3 class="title2"><font color="#0062b3"><b>カナダでのワーホリ経験は、今のアナタにどのような影響を与えていますか？</b></font></h3>			
				<p class="text">いろんな国の友人ができ、またそれぞれの国について理解が深まったことが自分の中で一番大きいです。もちろん日本についても理解が深まりました。日本のよさや一方で外国を見習うべき点など・・日本は本当に便利で安全で、何よりも日本人は勤勉でとても丁寧な方が多いと今でも思います。でもその反面、日本人は積極性やフレンドリーさに欠ける面もあると思います。日本にいるだけではわからない他国のよさや日本のよさをみなさんが海外に飛び出してぜひ体感してください！
				</p>
				<h3 class="title2"><font color="#0062b3"><b>留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</b></font></h3>
				<p class="text3">迷っている時間があったら行動してみましょう！時間はあっという間にすぎてしまいます！やらないで後悔するよりやってから後悔する方がマシですよ！笑　ぜったいあなたにとって一生の思い出に残る、あるいは人生の分岐点となる体験になります！人生一度きりなので目先の不安よりその先の期待を大きくもって行動してみましょう！					</p>
				</div>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>

			<center><a href="http://www.jawhm.or.jp/blog/search/tag/?tag=%E3%82%AB%E3%82%A6%E3%83%B3%E3%82%BB%E3%83%A9%E3%83%BC%EF%BC%9A%E6%A0%B9%E3%80%80%E5%B9%B8%E5%AD%90" target="blank"><span class="seminor">カウンセラーが書いたブログ記事はこちらから！</span></a></center>

		  <h2 class="sec-title">セミナー情報</h2>

	  		<table>
				<tr>
					<td><p class="text01"><b><font size="3"><center>このカウンセラーサチコさんが担当する体験談セミナーに参加しよう！</center></td>
				</tr>
				<tr>
					<td><?php $config = array( 'view_mode' => 'list' ,'list' => array('detail_open' => 'off', count_field_active => 'none','backcolor' => '#0062b3', title => '仕事を掴め！') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show(); ?></td>
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