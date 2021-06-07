<?php
require_once '../../include/header.php';
require_once '../../include/links.php';

$links_obj = new Links();
$header_obj = new Header();

$header_obj->title_page='ワーホリ協定国・アイスランド基本情報';
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
			<p class="country-name-img"><img src="../../images/flag-isl.gif" alt="" /></p>

			<div id="area-map-img">
				<img src="../images/ISL_PC.png" />
			</div>
		</div>
		<div class="area-display-sp">
			<a href="/country/" class="btn-back-list area-round-corner">ワーホリ協定国一覧へ戻る</a>

			<div id="area-map-img">
				<img src="../images/ISL_SP.png" />
			</div>
		</div>


		<h2 class="h2-title"><span>人気都市　BEST3</span></h2>
		<div class="area-main-content">
			<ul class="list-best3">
				<li><img src="../images/crown-1.gif" />Reykjavik</li>
				<li><img src="../images/crown-2.gif" />Akureyri  </li>
				<li style="margin-right:0"><img src="../images/crown-3.gif" />Grindavik</li>
			</ul>
		</div>


		<h2 class="h2-title"><span>基本情報</span></h2>
		<div class="area-main-content clearfix">

			<div class="area-display-pc">
				<div class="area-left">
					<table class="table-info">
						<tr>
							<th>首都</th><td id="td-capital">Reykjavík</td>
						</tr>
						<tr>
							<th>言語</th><td id="td-language">Icelandic</td>
						</tr>
						<tr>
							<th>面積</th><td>103,000km2;<span>（北海道＋四国）</span></td>
						</tr>
						<tr>
							<th>人口</th><td>337,610人<span>（那覇市と同じくらい）</td>
						</tr>
						<tr>
							<th>通貨</th><td>íslensk króna (ISK)</td>
						</tr>
					</table>
					<p class="text-attention" style="padding-right:10px">＊2014 年10 月時点の数値です</p>
				</div>

				<div class="area-right">
					<table class="table-clock">
						<caption>日本との時差</caption>
						<tr>
							<th>日本時間</th><th>Budapest </th>
						</tr>
						<tr>
							<td style="border-right:1px solid #000">
								<img src="../images/TOKYO.png" /><br />
								1月1日<br />
								09:00am
							</td>
							<td>
								<img src="../images/ISL.png" /><br />
								1月1日<br />
								12:00am
							</td>
						</tr>
					</table>
					<p class="text-attention">＊サマータイムの期間は時差が変動します</p>
				</div>
			</div>

			<div class="area-display-sp clearfix">
				<table class="table-info">
					<tr>
						<th>首都</th><td id="td-capital">Reykjavík</td>
					</tr>
					<tr>
						<th>面積</th><td>103,000km2;<span>（北海道＋四国）</span></td>
					</tr>
					<tr>
						<th>人口</th><td>337,610人<span>（那覇市と同じくらい）</td>
					</tr>
				</table>
				<table class="table-info" style="margin-right:0">
					<tr>
						<th>言語</th><td id="td-language">Icelandic</td>
					</tr>
					<tr>
						<th>通貨</th><td>íslensk króna (ISK)</td>
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
						<th>日本時間</th><th>Budapest</th>
					</tr>
					<tr>
						<td style="border-right:1px solid #000">
							<img src="../images/TOKYO.png" /><br />
							1月1日<br />
							09:00am
						</td>
						<td>
							<img src="../images/ISL.png" /><br />
							1月1日<br />
							12:00am
						</td>
					</tr>
				</table>
				<p class="text-attention">＊サマータイムの期間は時差が変動します</p>
			</div>
		</div>

		<h2 class="h2-title"><span>アイスランドってどんな国？</span></h2>
		<div class="area-main-content">
		    <p class="text01">ヨーロッパのはずれ、イギリスやアイルランドのさらに北部に位置する小さな島国、アイスランド。アイスランドは北海道と四国を足したくらいの大きさで、ヨーロッパ国内でもイギリスに次ぐ広い国土を誇ります。通称「火と氷の島」とも呼ばれており、200を超す活火山と国土の12%を占める氷河が両立する、非常に美しい国です。 </p>
		    <p class="text01">「アイスランド」という名前と国の緯度の高さから「年中氷に包まれた非常に寒い国」というイメージを持たれがちですが、実は極寒の地というわけではありません。夏でも平均気温が10℃前後と低いですが、冬になっても平均気温も０℃ほどであり、日本ほど寒暖の差がなく年間通して過ごしやすいです。これは暖流であるメキシコ湾流が流れる西海岸性気候の特徴。風が強いため体感温度はもう少し下がるものの、暑さが苦手な人には最高の国といえるのではないでしょうか。 </p>
		    <p class="text01">アイスランドの大きな特徴は、圧倒的な活火山の多さです。もちろん主要都市は火山から離れているため危険はありません。この活火山の影響もあり、アイスランド国内には数多くの温泉が点在しています。 </p>
		    <p class="text01">首都 レイキャヴィークをはじめ、アイスランドの国土全域がオーロラベルトの下にあるため、冬になると各所でオーロラが観測できるようになります。また、夏には一日中太陽が沈まない「白夜」を体験することもできます。どちらもなかなか体験できない現象なので、アイスランドに行ったら是非体験してみてください。</p>
		    <p class="text01">日本からアイスランドへは直行便が出ていないため、基本的にはヨーロッパ諸国を経由して入国することになります。飛行機を使えばイギリスまで約２~３時間なので、週末の小旅行も可能ですね。アイスランドの街は小さくまとまっているので生活やしやすいですが、鉄道がないため国内の移動は基本的にバスか車になります。 </p>
		    <p class="text01">広大で美しい国土を持つアイスランドですが、一方で人口は約32万人とほぼ沖縄県那覇市とおなじくらいとなっています。しかし、国民一人当たりの収入が世界トップクラスであり、首都 レイキャヴィークも生活水準の高さや治安の良さは非常に高い評価を獲得しているなど、非常に住みやすく人気の高いとしてしても認知されています。 </p>
			<p class="text01">アイスランドの公用語はアイスランド語。難解な言語として知られていますが、アイスランド人はアイスランド語以外にも英語とデンマーク語を学んでいるので、英語だけでも十分意思疎通は可能です。ただし、ワーキングホリデーの期間中に仕事を探すのであれば、最低限のアイスランド語学力が必要になるでしょう。</p>
			<p class="text01">物価はやや高め。長期滞在をするなら多めに予算を準備しておく必要があります。</p>
			<p class="text01">アイスランドでの就労でポイントとなるのは、正社員や非正規雇用者といった雇用形態の括りがなく、「フルタイム」か「パートタイム」で区別する職場がほとんどということです。また、職場の福利厚生が手厚く、女性が活躍できる土壌も整っているため、挑戦してみるにはもってこいの管区用かもしれません。</p>
		</div>


	<div class="area-display-pc">
		<div class="centered-btn_set3"><a class="visa-btn3" href="../../visa/v-isl.html" title="アイスランドワーキングホリデー（ワーホリ）ビザ情報へ">アイスランドワーキングホリデー（ワーホリ）ビザ情報へ</a></div>
	  	<div class="seminar-listing-title-red">▼▼▼まずは無料セミナーへ！ワーキングホリデー＆留学の無料セミナーはこちら！▼▼▼</div>
	</div>
	<div class="area-display-sp">
		<a href="../../visa/v-esp.html" class="btn-visa area-round-corner">
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