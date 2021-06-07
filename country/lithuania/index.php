<?php
require_once '../../include/header.php';
require_once '../../include/links.php';

$links_obj = new Links();
$header_obj = new Header();

$header_obj->title_page='リトアニアに関する基本情報';
$header_obj->description_page='太陽が降り注ぐ、陽気で明るい国スペイン。北はピレネー山脈を挟んでフランスと隣接し、南はジブラルタル海峡の先にモロッコがあります。スペインには長い歴史の中で様々な民族が侵入し、国の発展に大きな影響を与え続けてきました。その結果、民族と文化が交錯してきたこの国では、地方や町ごとに多彩な個性を有するようになりました。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/mainimg/banner-isl.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = ' リトアニア | ワーホリで行ける国（ワーキングホリデー協定国）';

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
			<p class="country-name-img"><img src="../images/Lithuania.gif" alt="" /></p>

			<div id="area-map-img">
				<img src="../images/LTU_PC.png" />
			</div>
		</div>
		<div class="area-display-sp">
			<a href="/country/" class="btn-back-list area-round-corner">ワーホリ協定国一覧へ戻る</a>

			<div id="area-map-img">
				<img src="../images/LTU_SP.png" />
			</div>
		</div>


		<h2 class="h2-title"><span>人気都市　BEST3</span></h2>
		<div class="area-main-content">
			<ul class="list-best3">
				<li><img src="../images/crown-1.gif" />Vilnius</li>
				<li><img src="../images/crown-2.gif" />Kaunas</li>
				<li style="margin-right:0"><img src="../images/crown-3.gif" />Klaipėda</li>
			</ul>
		</div>


		<h2 class="h2-title"><span>基本情報</span></h2>
		<div class="area-main-content clearfix">

			<div class="area-display-pc">
				<div class="area-left">
					<table class="table-info">
						<tr>
							<th>首都</th><td id="td-capital">Vilnius</td>
						</tr>
						<tr>
							<th>言語</th><td id="td-language">Lithuanian</td>
						</tr>
						<tr>
							<th>面積</th><td>65,200 ㎢;<span>（北海道と同じサイズ）</span></td>
						</tr>
						<tr>
							<th>人口</th><td>2,810,000人<span>（神奈川県の人口同じくらい）</td>
						</tr>
						<tr>
							<th>通貨</th><td>Euro（EUR）</td>
						</tr>
					</table>
					<p class="text-attention" style="padding-right:10px">＊2018年1月 月時点の数値です</p>
				</div>

				<div class="area-right">
					<table class="table-clock">
						<caption>日本との時差</caption>
						<tr>
							<th>日本時間</th><th>Vilnius</th>
						</tr>
						<tr>
							<td style="border-right:1px solid #000">
								<img src="../images/TOKYO.png" /><br />
								1月1日<br />
								09:00am
							</td>
							<td>
								<img src="../images/LTU.png" /><br />
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
						<th>首都</th><td id="td-capital">Vilnius</td>
					</tr>
					<tr>
						<th>面積</th><td>65,200 ㎢;<span>（日本の約1.3倍）</span></td>
					</tr>
					<tr>
						<th>人口</th><td>2,810,000人<span>（北海道と同じサイズ）</td>
					</tr>
				</table>
				<table class="table-info" style="margin-right:0">
					<tr>
						<th>言語</th><td id="td-language">Lithuanian</td>
					</tr>
					<tr>
						<th>通貨</th><td>Euro（EUR））</td>
					</tr>
					<tr style="border-bottom:none">
						<td colspan="2"><p class="text-attention" style="padding-right:10px">＊2018年1月時点の数値です</p></td>
					</tr>
				</table>
			</div>

		</div>

		<div class="area-display-sp">
			<h2 class="h2-title"><span>日本との時差</span></h2>
			<div class="area-main-content">
				<table class="table-clock">
					<tr>
						<th>日本時間</th><th>Vilnius</th>
					</tr>
					<tr>
						<td style="border-right:1px solid #000">
							<img src="../images/TOKYO.png" /><br />
							1月1日<br />
							09:00am
						</td>
						<td>
							<img src="../images/LTU.png" /><br />
							1月1日<br />
							02:00am
						</td>
					</tr>
				</table>
				<p class="text-attention">＊サマータイムの期間は時差が変動します</p>
			</div>
		</div>
		<h2 class="h2-title"><span>リトアニアってどんな国？</span></h2>
		<div class="area-main-content">
		    <p class="text01">近年ヨーロッパの穴場観光地として「バルト三国」が注目されています。リトアニアはそのバルト三国の中で一番南に位置する小国で、様々な美しい教会が街を彩るヴィリニュスや、リトアニアの巡礼地シャウレイの十字架の丘など、味わい深い観光地がたくさんある美しい森と湖の国です。</p>
 			<p class="text01">リトアニアの国民は敬虔なクリスチャンが多く、８割近い方がカトリックです。そのため国中に協会が点在しており、特に中世の街並みがそのまま残る首都ヴィリニュスでは旧市街を歩くだけでいくつもの協会を見つけることができるでしょう。ただ、すべての協会が今も機能しているわけではなく、一部は音楽ホールなどの用途で利用されています。</p>
 			<p class="text01">今も中世の面影をそのまま残す首都ヴァリニュスの旧市街は、都市がまるごと世界遺産として登録されています。淡いピンクやイエローで彩られた街並みを歩くだけでも、のんびりとした牧歌的な雰囲気を満喫することができます。</p>
 			<p class="text01">公用語はリトアニア語ですが、地域によってはロシア語も話されています。英語も通じるのでリトアニア語が話せなくても生活はできるかもしれませんが、ワーキングホリデー（ワーホリ）を使って仕事をするならリトアニア語を習得する必要があります。</p>
				<p class="text01">リトアニアの天候は日本と比べて少し寒いくらいです。夏でも朝や天気の悪い日は少し肌寒く感じることがあり、冬は同じ緯度の他の国と比べると暖流の影響でそれほど寒くはありませんが、日によっては-20℃ぐらいまで下がることもありますので、防寒対策はしっかりしていきましょう。</p>
					<p class="text01">日本とリトアニアでの繋がりとして有名なのが、日本人外交官としてナチス・ドイツから6000人以上のユダヤ人を救った杉浦千畝氏でしょう。彼が「命のビザ」を発給した日本領事館は現在「杉原記念館」として公開されています。日本とリトアニアの架け橋を担っているので、チャンスがあればぜひ足を運んでみてください。</p>
		    
				   
		</div>
			
			
	<div class="area-display-pc">
		<div class="centered-btn_set3"><a class="visa-btn3" href="../../visa/v-ltu.html" title="アイスランドワーキングホリデー（ワーホリ）ビザ情報へ">アイスランドワーキングホリデー（ワーホリ）ビザ情報へ</a></div>
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