<?php
require_once '../../include/header.php';
require_once '../../include/links.php';

$links_obj = new Links();
$header_obj = new Header();

$header_obj->title_page='スウェーデンに関する基本情報';
$header_obj->description_page='太陽が降り注ぐ、陽気で明るい国スペイン。北はピレネー山脈を挟んでフランスと隣接し、南はジブラルタル海峡の先にモロッコがあります。スペインには長い歴史の中で様々な民族が侵入し、国の発展に大きな影響を与え続けてきました。その結果、民族と文化が交錯してきたこの国では、地方や町ごとに多彩な個性を有するようになりました。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/mainimg/banner-isl.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = ' アイスランド | ワーホリで行ける国（ワーキングホリデー協定国）';

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
			<p class="country-name-img"><img src="../images/sweden.gif" alt="" /></p>

			<div id="area-map-img">
				<img src="../images/SWE_PC.png" />
			</div>
		</div>
		<div class="area-display-sp">
			<a href="/country/" class="btn-back-list area-round-corner">ワーホリ協定国一覧へ戻る</a>

			<div id="area-map-img">
				<img src="../images/SWE_SP.png" />
			</div>
		</div>


		<h2 class="h2-title"><span>人気都市　BEST3</span></h2>
		<div class="area-main-content">
			<ul class="list-best3">
				<li><img src="../images/crown-1.gif" />Stockholm</li>
				<li><img src="../images/crown-2.gif" />Gothenburg</li>
				<li style="margin-right:0"><img src="../images/crown-3.gif" />Malmö</li>
			</ul>
		</div>


		<h2 class="h2-title"><span>基本情報</span></h2>
		<div class="area-main-content clearfix">

			<div class="area-display-pc">
				<div class="area-left">
					<table class="table-info">
						<tr>
							<th>首都</th><td id="td-capital">Stockholm</td>
						</tr>
						<tr>
							<th>言語</th><td id="td-language">Swedish</td>
						</tr>
						<tr>
							<th>面積</th><td>450,295 km2;<span>（日本の約1.3倍）</span></td>
						</tr>
						<tr>
							<th>人口</th><td>9,910,000人<span>（神奈川県の人口同じくらい）</td>
						</tr>
						<tr>
							<th>通貨</th><td>Svensk krona（SEK）</td>
						</tr>
					</table>
					<p class="text-attention" style="padding-right:10px">＊2014 年10 月時点の数値です</p>
				</div>

				<div class="area-right">
					<table class="table-clock">
						<caption>日本との時差</caption>
						<tr>
							<th>日本時間</th><th>Stockholm</th>
						</tr>
						<tr>
							<td style="border-right:1px solid #000">
								<img src="../images/TOKYO.png" /><br />
								1月1日<br />
								09:00am
							</td>
							<td>
								<img src="../images/SWE.png" /><br />
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
						<th>首都</th><td id="td-capital">Stockholm</td>
					</tr>
					<tr>
						<th>面積</th><td>450,295 km2;<span>（日本の約1.3倍）</span></td>
					</tr>
					<tr>
						<th>人口</th><td>9,910,000人<span>（神奈川県の人口同じくらい）</td>
					</tr>
				</table>
				<table class="table-info" style="margin-right:0">
					<tr>
						<th>言語</th><td id="td-language">Swedish</td>
					</tr>
					<tr>
						<th>通貨</th><td>Svensk krona（SEK）</td>
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
						<th>日本時間</th><th>Stockholm</th>
					</tr>
					<tr>
						<td style="border-right:1px solid #000">
							<img src="../images/TOKYO.png" /><br />
							1月1日<br />
							09:00am
						</td>
						<td>
							<img src="../images/SWE.png" /><br />
							1月1日<br />
							02:00am
						</td>
					</tr>
				</table>
				<p class="text-attention">＊サマータイムの期間は時差が変動します</p>
			</div>
		</div>
		<h2 class="h2-title"><span>スウェーデンはどんな国ですか？</span></h2>
		<div class="area-main-content">
		    <p class="text01">スウェーデンは北ヨーロッパのスカンディナビア半島の東側に位置する国で、国土の6割が森や湖などで締められる豊かな自然あふれる美しい国です。スウェーデンの街並みの特徴として、絵のように美しいカラフルな建物があげられます。なかでも首都のストックホルムには今もなお古い町並みがそのままの状態で残されており、14の島を橋で結んだ水の都は「北欧のベネチア」とも称され多くの観光客に愛されています。また、城壁で囲まれた中世都市カルマル、大聖堂や海洋博物館などがあり運河沿いの港町として発展したスウェーデン第2の都市ヨーテボリ、ホテル全体が氷で作られた幻想的な「ICE HOTEL」が有名なユッカスヤルヴィなど、ストックホルム以外にも個性的な街々が点在しています。 </p>
		    <p class="text01">スウェーデンには「フィーカ」と呼ばれる独特な文化があります。フィーカとはスウェーデンにおけるコーヒーブレイクの時間のこと。スウェーデン人は1日に何度もコーヒーブレイクをする習慣があり、その際は一人ではなく恋人や家族、仕事仲間と一緒にコーヒーの時間を楽しみます。スウェーデンでは年間のコーヒー消費量が日本の2倍以上であることからも、フィーカの時間が大切にされていることが分かります。</p>
			<p class="text01">フィーカのように知人との和を大切にする一方で、スウェーデンには個人主義の考えも強く根付いています。スウェーデンの人々は自立心が強く、真面目で、「個」の在り方を尊重します。女性の就職率が80%を超えていることも、その一端といえるのではないでしょうか。</p>
			<p class="text01">スウェーデンは「とにかく寒い」というイメージが先行しがちですが、メキシコ湾からの暖流もあり、想像よりも穏やかで四季をしっかり感じることができます。特に北極圏の天候が特徴的で、夏は1日中太陽が沈まない「白夜」があり、冬になると今度は逆に1日中太陽がでない「極夜」になります。冬は夜の時間が長くなるため、オーロラを見ることができるチャンスが高まります。</p>
			
		   
		</div>
			
			
	<div class="area-display-pc">
		<div class="centered-btn_set3"><a class="visa-btn3" href="../../visa/v-swe.html" title="アイスランドワーキングホリデー（ワーホリ）ビザ情報へ">アイスランドワーキングホリデー（ワーホリ）ビザ情報へ</a></div>
	  	<div class="seminar-listing-title-red">▼▼▼まずは無料セミナーへ！ワーキングホリデー＆留学の無料セミナーはこちら！▼▼▼</div>
	</div>
	<div class="area-display-sp">
		<a href="../../visa/v-swe.html" class="btn-visa area-round-corner">
			アイスランド<br />ビザ情報はこちらから
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