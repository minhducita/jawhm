<?php
require_once '../../include/header.php';

include '../../seminar_module/seminar_module.php';

$sm = new SeminarModule($config);

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='AMY KOMAGINE';
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

	  <h2 class="sec-title">カウンセラー紹介　AMY KOMAGINE</h2>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		<section class="mgb50">
			<h2 class="counselor-tokyo2">
			<span class="tokyo2">TOKYO</span>
			新宿オフィス</h2>
			<img src="../../images/counselor/tokyo/ami_01.jpg" alt="AMY KOMAGINE" class="imagesLeft"/>
				<h3 class="counselorName">AMY KOMAGINE</h3>
				<span class="nameEnglish">Amy Komagine</span>
				<table class="self">
					<tbody>
						<tr class="tB1">
							<th class=" tR1">主な滞在国</th>
							<th class="words">ヨーロッパ圏</th>
						</tr>
						<tr class=" tB1">
							<th class=" tR1">出身</th>
							<th class="words">茨城県日立市</th>
						</tr>
						<tr>
							<th class="tR1">座右の銘</th>
							<th class="words">心でしかよく見えないんだ。<br />大切なものは目には見えない</th>
						</tr>
					</tbody>
				</table>
			<div>
				<ul class="experience">
					<li class="lineB3"><b>アミさんの海外経験</b><span class="plane">An experience abroad...</span></li>
					<li class="lineB1"><span class="list1">1</span>小学生の時に家族でハワイ旅行</li>
					<li class="lineB1"><span class="list2">2</span>高校生の時に父が台湾に単身赴任になり海外移住の危機に！</li>
					<li class="lineB1"><span class="list3">3</span>結局なくなったが、年に1回台湾に旅行</li>
					<li class="lineB1"><span class="list4">4</span>大学2年の夏にフランスに短期留学</li>
					<li class="lineB1"><span class="list4">4</span>大学3年の冬に韓流ブームにのって円高韓国旅行！</li>
					<li class="lineB1"><span class="list4">4</span>大学4年に休学をしてフランス留学</li>
                   			<li class="line"><span class="list5">5</span>日本に帰国後、留学の経験を活かして今の業界に就職</li>
                  
				</ul>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>あなたが渡航を決めたきっかけを教えてください。</b></font></h3>
				<p class="text">フランスに渡航したきっかけは、名前がAMY（フランス語で友達の意味）だったからです。幼いころからフランスに親しみを感じていました。<br /><br />
					さらに閉鎖的な田舎育ったことから、外に行きたいという憧れが成長をするにつれて大きくなり、興味が海外へ！しかし、英語だけの勉強で4年間終わるのに意味が見いだせず海外の芸術を勉強する大学に進学しました。その後フランス映画に興味が出たのですが、言葉や習慣や歴史をもっと理解したいと思いフランス留学を決意しました。
				</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>留学中は、どんな生活をしていましたか？</b></font></h3>
				<p class="text">フランスのモンペリエで就学をメインに生活していました。私立語学学校に6カ月、その後大学付属に3ケ月在学。この期間はホームステイをしていたのですが、ホストファミリーととても仲良くなり、9月に渡って同じ家にステイしていました。その後はパリに移動し、語学学校に3ケ月通いました。<br /><br />
				基本的には学校中心の生活を送り、午前中は学校へ、午後はフリーの時間を満喫して、慣れてきた時にお仕事経験（STAGE）もチャレンジをしました。渡航当初は日本人が全くいない環境だったので、フランスで生活を始めて3ヶ月目にようやく日本人に出会えました。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>フランス生活中、大変だったことはありませんでしたか？</b></font></h3>
				<p class="text">フランスに就いてすぐは、言葉が全く通じない環境になじめす、慣れるまでとても時間がかかりました。その他にも交通機関がストライキを起こした時、すべての交通機関がストップしてしまい、帰宅難民になったこともあります。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>「きっとこれは自分しか体験していない！」といった体験はありますか？</b></font></h3>
				<p class="text">ホームステイ先に養子にならないかと本気で打診された事があります（笑</p>
			</div>
			<div>
				<h3 class="title2"><font color="#0062b3"><b>フランスのオススメを教えてください！</b></font></h3>
			<p class="text">フランス　ニースの近くにあるエズという街がラピュタみたいでとっても綺麗です！それと、フランスに行くならフランス語は絶対必要！パリ以外の都市では、基本的に英語が通じないです。</p>
				</div>
			<div>
				<h3 class="title2"><font color="#0062b3"><b>フランスでの経験は、今のあなたにどのような影響を与えていますか？</b></font></h3>
				<p class="text"> フランス人の自分の欲求に素直なところや家族を大切にしている姿をみて人生の大切なことを思いだし、 自分らしく生きればいいんだと思い直すことができました。また将来設計や自分の意見をもっている人が多かったので、とても刺激を受けました。</p>
				<h3 class="title2"><font color="#0062b3"><b>留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</b></font></h3>
				<p class="text3">「On ne voit bien qu'avec le coeur. L'essentiel est invisible pour les yeux.（心でしかよく見えないんだよ。大切なものは目には見えないんだ。）」私の大好きな言葉です。生きる上での原動力はいつも【好奇心】だと考えています。あなたの素直な心に是非したがってみてください。そしたら人生において宝物のような日々を手に入れられるでしょう。</p>
				</div>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>

			<center><a href="http://www.jawhm.or.jp/blog/search/tag/?tag=%E3%82%AB%E3%82%A6%E3%83%B3%E3%82%BB%E3%83%A9%E3%83%BC%EF%BC%9Aamy-komagine" target="blank"><span class="seminor">カウンセラーが書いたブログ記事はこちらから！</span></a></center>

		  <h2 class="sec-title">セミナー情報</h2>

	  		<table>
				<tr>
					<td><p class="text01"><b><font size="3"><center>このカウンセラーが担当する体験談セミナーに参加しよう！</center></td>
				</tr>
				<tr>
					<td><?php $config = array( 'view_mode' => 'list' ,'list' => array('detail_open' => 'off', count_field_active => 'none','backcolor' => '#0062b3', title => 'フランス体験談') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show(); ?></td>
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