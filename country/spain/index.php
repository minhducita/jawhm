<?php
require_once '../../include/header.php';
require_once '../../include/links.php';

$links_obj = new Links();
$header_obj = new Header();

$header_obj->title_page='ワーホリ協定国・スペインの基本情報';
$header_obj->description_page='太陽が降り注ぐ、陽気で明るい国スペイン。北はピレネー山脈を挟んでフランスと隣接し、南はジブラルタル海峡の先にモロッコがあります。スペインには長い歴史の中で様々な民族が侵入し、国の発展に大きな影響を与え続けてきました。その結果、民族と文化が交錯してきたこの国では、地方や町ごとに多彩な個性を有するようになりました。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/mainimg/country-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'スペイン | ワーホリで行ける国（ワーキングホリデー協定国）';

//add javascript for country info
$header_obj->add_js_files='
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<!--[if IE]><script type="text/javascript" src="/country/country_info/js/excanvas.js"></script><![endif]-->
<script type="text/javascript" src="/country/country_info/js/coolclock.js"></script>
<script type="text/javascript" src="/country/country_info/js/moreskins.js"></script>
';

if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') {
	$header_obj->add_css_files='<link href="../css/style.css" rel="stylesheet" type="text/css" /><link href="../css/style-m.css" rel="stylesheet" type="text/css" />';
} else {
	$header_obj->add_css_files='<link href="../css/style.css" rel="stylesheet" type="text/css" /><link href="../css/style-p.css" rel="stylesheet" type="text/css" />';
}

$header_obj->display_header();
include('../../calendar_module/mod_event_horizontal.php');
?>

	<div id="maincontent">
    <?php echo $header_obj->breadcrumbs('country'); ?>

		<div class="area-display-pc" style="padding-top:35px">
			<a href="/country/" class="btn-back-list area-round-corner">協定国一覧へ戻る</a>
			<p class="country-name-img"><img src="../../images/flag-esp.png" alt="" /></p>

			<div id="area-map-img">
				<img src="../images/map-esp.png" />
			</div>
		</div>
		<div class="area-display-sp">
			<a href="/country/" class="btn-back-list area-round-corner">ワーホリ協定国一覧へ戻る</a>

			<div id="area-map-img">
				<img src="../images/map-esp-sp.png" />
			</div>
		</div>


		<h2 class="h2-title"><span>スペイン人気都市　BEST3</span></h2>
		<div class="area-main-content">
			<ul class="list-best3">
				<li><img src="../images/crown-1.gif" />Madrid</li>
				<li><img src="../images/crown-2.gif" />Barcelona </li>
				<li style="margin-right:0"><img src="../images/crown-3.gif" />Valencia</li>
			</ul>
		</div>


		<h2 class="h2-title"><span>スペイン基本情報</span></h2>
		<div class="area-main-content clearfix">

			<div class="area-display-pc">
				<div class="area-left">
					<table class="table-info">
						<tr>
							<th>首都</th><td id="td-capital">Madrid</td>
						</tr>
						<tr>
							<th>言語</th><td id="td-language">español</td>
						</tr>
						<tr>
							<th>面積</th><td>504,782 km&#178;<span>（50位)（本州の約2倍）</span></td>
						</tr>
						<tr>
							<th>人口</th><td>46,524,943人<span>(日本の3分の1)</td>
						</tr>
						<tr>
							<th>通貨</th><td>Euro（EUR）</td>
						</tr>
					</table>
					<p class="text-attention" style="padding-right:10px">＊2014 年10 月時点の数値です</p>
				</div>

				<div class="area-right">
					<table class="table-clock">
						<caption>日本との時差</caption>
						<tr>
							<th>日本時間</th><th>Budapest</th>
						</tr>
						<tr>
							<td style="border-right:1px solid #000">
								<img src="../images/clock-tokyo.png" /><br />
								1月1日<br />
								09:00am
							</td>
							<td>
								<img src="../images/clock-esp.png" /><br />
								1月1日<br />
								02:00am
							</td>
						</tr>
					</table>
					<p class="text-attention">＊サマータイムの期間は時差が変動します</p>
				</div>
			</div>

			<div class="area-display-sp clearfix">
				<table class="table-info">
					<tr>
						<th>首都</th><td id="td-capital">Parris</td>
					</tr>
					<tr>
						<th>面積</th><td>632,759 km&#178;<span>(世界43位)</span></td>
					</tr>
					<tr>
						<th>人口</th><td>61,083,916人<span>(世界20位)</td>
					</tr>
				</table>
				<table class="table-info" style="margin-right:0">
					<tr>
						<th>言語</th><td id="td-language">French</td>
					</tr>
					<tr>
						<th>通貨</th><td>Euro（EUR）</td>
					</tr>
					<tr style="border-bottom:none">
						<td colspan="2"><p class="text-attention" style="padding-right:10px">＊2014 年10 月時点の数値です</p></td>
					</tr>
				</table>
			</div>

		</div>

		<div class="area-display-sp">
			<h2 class="h2-title"><span>日本との時差</span></h2>
			<div class="area-main-content">
				<table class="table-clock">
					<tr>
						<th>日本時間</th><th>Parris</th>
					</tr>
					<tr>
						<td style="border-right:1px solid #000">
							<img src="../images/clock-tokyo.png" /><br />
							1月1日<br />
							09:00am
						</td>
						<td>
							<img src="../images/clock-fra.png" /><br />
							1月1日<br />
							02:00am
						</td>
					</tr>
				</table>
				<p class="text-attention">＊サマータイムの期間は時差が変動します</p>
			</div>
		</div>

		<h2 class="h2-title"><span>スペインってどんな国？</span></h2>
		<div class="area-main-content">
		    <p class="text01">太陽が降り注ぐ、陽気で明るい国スペイン。北はピレネー山脈を挟んでフランスと隣接し、南はジブラルタル海峡の先にモロッコがあります。スペインには長い歴史の中で様々な民族が侵入し、国の発展に大きな影響を与え続けてきました。その結果、民族と文化が交錯してきたこの国では、地方や町ごとに多彩な個性を有するようになりました。 </p>
		    <p class="text01">刺激に溢れ、芸術面で独特の彩りを放つスペインは、ピカソをはじめとした世界的知名度を誇る芸術家を数多く生み出しました。サグラダファミリアや古都トレドの町並みなど、スペインでしか見ることのできない独特な建築物も、国内に数多く点在しています。また、闘牛やフラメンコで知られるスペインの情熱的な文化はスペイン人の国民性に大きな影響を与えており、一つの物事に対して非常に情熱を傾けます。自由奔放ながら個人の考えを尊重し、家族や親しい友人との関係を何よりも大切にするのもスペイン人の特徴。海外でもスペインほど家族愛のある国は他にないと言っても過言ではありません。 </p>
		    <p class="text01">海と山の幸をふんだんに使ったスペイン料理も忘れてはいけません。スペイン原産のオリーブオイルをふんだんに使ったアヒージョや、取れたての海鮮物が盛りだくさんのパエリアなどが有名です。バル（Bar）と呼ばれる食堂とバーが一緒になったような飲食店も多く点題しているので、おいしい料理とスペイン産のワインを楽しんでみるのはいかがでしょうか。 </p>
		    <p class="text01">スペインのライフスタイルとして覚えておきたいのが、「シエスタ」の存在です。シエスタとは午睡（お昼休み）の事で、スペインでは少し遅めの昼食の後に1~2時間ほどしっかりとした休みをとります。シエスタはスペインで伝統的な生活習慣として認められており、シエスタの時間には多くの店が休業されます。そのため、タイミングを間違えると「どこに行ってもお店が閉まっている」なんて状態になってしまうかもしれません。 </p>
		    <p class="text01">スペインの母国語はスペイン語です。現在スペイン語を母国語としている国は21カ国あり、世界第3位の国際言語です！特にアメリカでは英語に次ぐ第2言語として幅広く使われています。首都圏であれば英語やフランス語も通じますが、ワーキングホリデーの期間中にスペインで仕事をされたい方は、しっかりとしたスペイン語を身に付ける必要があるでしょう。 </p>
		    <p class="text01">「太陽の国」の名が示す通り、スペインはその温暖で過ごしやすい気候で知られています。中央部は夏暑く冬寒い大陸性気候ですが、南部に行けば1年を通して生活しやすい地中海性気候になります。 </p>

		</div>


	<div class="area-display-pc">
		<div class="centered-btn_set3"><a class="visa-btn3" href="../../visa/v-esp.html" title="スペインのワーキングホリデー（ワーホリ）ビザ情報へ">スペインのワーキングホリデー（ワーホリ）ビザ情報へ</a></div>
	  	<div class="seminar-listing-title-red">▼▼▼まずは無料セミナーへ！ワーキングホリデー＆留学の無料セミナーはこちら！▼▼▼</div>
	</div>
	<div class="area-display-sp">
		<a href="../../visa/v-esp.html" class="btn-visa area-round-corner">
			スペインの<br />ビザ情報はこちらから
		</a>
	  	<div class="seminar-listing-title-red">まずは無料セミナーへ！<br />ワーキングホリデー＆留学の無料セミナーはこちら！</div>
	</div>


    <?php 
    //settings for the calendar module display
          $country_to_display = 'スペイン';
          $number_to_display = '2';
          
    display_horizontal_calendar($country_to_display,$number_to_display); 
    ?>
    <div style="position:relative;text-align:center;">
      <a href="/seminar/seminar"><img src="/images/canausseminar.gif" title="ワーキングホリデー＆留学無料セミナー毎日開催中！"/></a>
      <p style="text-align:right;padding-right:20px;"><a href="/seminar/seminar" title="無料セミナー">＞＞＞  無料セミナー情報をもっと見る</a></p>
    </div> 
    <div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>


	<div class="area-display-pc">
		<h2 class="h2-title"><span>ワーキングホリデー協定国一覧</span></h2>
		<?php include('../flags_country_list.php'); ?>
	</div>
	<div class="area-display-sp">
		<a href="/country/" class="btn-back-list area-round-corner">ワーホリ協定国一覧へ戻る</a>
	</div>

<?php $links_obj->display_links(); ?>

	</div><!-- /#maincontent -->

  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>