<?php
require_once '../../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='ワーホリ協定国を知ろう！';
$header_obj->description_page='ワーホリ協定国を知ろう！ハーグ条約。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/country_intro.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーホリ協定国を知ろう！';

$header_obj->add_js_files='<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"><	
<script type="text/javascript" src="script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="styles.css" />';

$header_obj->display_header();

?>

<style>

.country, .country:visited{
	font-size:15px;
	font-weight:bold;
	background:#ff9900;
	display:inline-block;
	padding:3px 10px 3px 10px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:3px 0px 0px 0;
	vertical-align: middle;
}
.country:hover{
	background:#ff6347;color:#fff;
}

.blog, .blog:visited{
	font-size:15px;
	font-weight:bold;
	background:#6495ed;
	display:inline-block;
	padding:5px 15px 5px 15px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:3px 0px 0px 0;
	vertical-align: middle;
}
.blog:hover{
	background:#4169e1;color:#fff;
}

</style>


	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>

	<div class="step_title">
		ワーホリ協定国を知ろう！
	</div>
		<p class="text01">
			<br />
			ワーキングホリデーとは、日本と協定を結んだ国に一定期間滞在でき、その間の滞在費を補うための働いたりできる制度のことです。<br />
			では、今日本とワーホリ協定を結んでいる国の事を、皆さんはどれくらい知っていますか？<br />
			<br />
			ワーホリ協定国は12カ国！どの国もとっても魅力にあふれる国です。<br />
			<br />
			普段、日本とあまり馴染みのない国もたくさんあるので、色々な国のことを知ってみましょう。<br />

		</p>
		<a class="country" href="#aus">オーストラリア</a>
		<a class="country" href="#can">カナダ</a>
		<a class="country" href="#uk">イギリス</a>
		<a class="country" href="#nz">ニュージーランド</a>
		<a class="country" href="#fra">フランス</a>
		<a class="country" href="#ger">ドイツ</a>
		<a class="country" href="#ire">アイルランド</a>
		<a class="country" href="#den">デンマーク</a>
		<a class="country" href="#nor">ノルウェー</a>
		<a class="country" href="#tai">台湾</a>
		<a class="country" href="#hk">香港</a>
		<a class="country" href="#kor">韓国</a>

	<h2 class="sec-title">ワーホリ協定国を知ろう！</h2>

	<image src="/images/bflag01.gif" alt="australia" id="aus">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>国際的にも高い評価を得る教育大国。広大な大地に近代都市と世界遺産が調和する国。</b></center></font>
		<br />
		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/1616"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/aus_03.png" alt="australia"/>
					<span class="motto">オーストラリア<br />最東部の秘境</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1556"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/aus_04.png" alt="australia"/>
					<span class="motto">人生で絶対<br />一度は行きたい場所！</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1556"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/aus_05.png" alt="australia"/>
					<span class="motto">Great Barrie Reef<br />を大紹介！</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%82%AA%E3%83%BC%E3%82%B9%E3%83%88%E3%83%A9%E3%83%AA%E3%82%A2" target="blank">オーストラリアに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag03.gif" alt="canada" id="can">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>多国籍、他民族、多言語が混ざり合う「小さな地球」。四季折々に移り変わる大自然も魅力的。</b></center></font>
		<br />

		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/fukuokablog/item/1481"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/can_01.png" alt="canada"/>
					<span class="motto">カナダに行ったら<br />必ず見ておきたいもの</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/nagoyablog/item/1595"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/can_02.png" alt="canada"/>
					<span class="motto">様々な文化に触れられる<br />カナダ最大の街！</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/fukuokablog/item/1504"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/can_03.png" alt="canada"/>
					<span class="motto">花あふれる優雅な州都<br />ビクトリア</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>
	  		<table border="3" bordercolor="#87ceeb" width="100%" style="border-radius: 5px;">
				<tr>
					<td>
						<p class="text01"><font size="2">≪その他のカナダ紹介記事≫<br />
						◆<a href="http://www.jawhm.or.jp/blog/fukuokablog/item/1583" target="blank" style="text-decoration: none;"><font color="#0000ff" size="2">大自然が作り出したパノラマ！カナディアン・ロッキー</font></a>
					</td>
				</tr>
			</table>
		<br />
		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%82%AB%E3%83%8A%E3%83%80" target="blank">カナダに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag07.gif" alt="united kingdom" id="uk">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>伝統ある歴史と近代的な文化が混ざり合う国。世界最高峰の博物館なども堪能できる。</b></center></font>
		<br />
		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/1581"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/uk_01.png" alt="united kingdom"/>
					<span class="motto">イギリス料理の朝食事情♪<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/910"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/uk_02.png" alt="united kingdom"/>
					<span class="motto">歴史と文化が<br />混ざり合う国イギリス</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/bloomsbury/item/192"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/uk_03.png" alt="united kingdom"/>
					<span class="motto">絶対行きたい！<br />テムズ川沿い観光スポット</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%82%A4%E3%82%AE%E3%83%AA%E3%82%B9" target="blank">イギリスに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag02.gif" alt="new zealand" id="nz">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>安全な治安と心優しい人々に囲まれ、緩やかな気候の中でゆったりと時間を過ごせる。</b></center></font>
		<br />
		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/nagoyablog/item/1607"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/nz_01.png" alt="newzealand"/>
					<span class="motto">ニュージーランドはこんな国<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1094"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/nz_03.png" alt="newzealand"/>
					<span class="motto">夏の終わりに<br />ランタンフェスティバル</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/815"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/nz_02.png" alt="newzealand"/>
					<span class="motto">ニュージーランドの秋<br />Guy Fawkes Day</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%83%8B%E3%83%A5%E3%83%BC%E3%82%B8%E3%83%BC%E3%83%A9%E3%83%B3%E3%83%89" target="blank">ニュージーランドに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag05.gif" alt="france" id="fra">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>優れた芸術やエンターテインメントと触れ合うことができ、活気にあふれ世界中の人々を魅了する「花の都」。</b></center></font>
		<br />

		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/1577"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/fra_01.png" alt="france"/>
					<span class="motto">革命記念日に<br />パリで花火を見る<br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/306"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/fra_02.png" alt="france"/>
					<span class="motto">ワーホリを使って<br />フランスを楽しもう！</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/fukuokablog/item/1504"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/fra_03.png" alt="france"/>
					<span class="motto">ツールドフランス！<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%83%95%E3%83%A9%E3%83%B3%E3%82%B9" target="blank">フランスに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag06.gif" alt="germany" id="ger">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>中世の趣を残す古城や街並みに、最先端の現代アートが交差する、歴史と文化に彩られた国。</b></center></font>
		<br />

		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1647"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/ger_01.png" alt="german"/>
					<span class="motto">歴史を体感できる街<br />ハイデルベルク</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/nagoyablog/item/1661"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/ger_02.png" alt="german"/>
					<span class="motto">ドイツって<br />どんな国？</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1648"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/ger_03.png" alt="german"/>
					<span class="motto">世界遺産と共に<br />ケルンを紹介！</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%83%89%E3%82%A4%E3%83%84" target="blank">ドイツに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag08.gif" alt="ireland" id="ire">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>ケルトの文化が息づく、緑豊かな美しい島。陽気で素朴な人々があなたを出迎えます。</b></center></font>
		<br />
		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/nagoyablog/item/1617"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/ire_01.png" alt="ireland"/>
					<span class="motto">アイルランドって<br />こんな国！</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/217"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/ire_02.png" alt="ireland"/>
					<span class="motto">アイルランドの<br />魅力発見セミナー！</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
<!--					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/fukuokablog/item/1504"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/can_03.png" alt="newzealand"/>
					<span class="motto">花あふれる優雅な州都<br />ビクトリア</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
-->				</ul>
		</section>

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%82%A2%E3%82%A4%E3%83%AB%E3%83%A9%E3%83%B3%E3%83%89" target="blank">アイルランドに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag09.gif" alt="denmark" id="den">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>北欧諸国の中で最も南に位置し、500以上の島々からなる大自然の美しい島国。</b></center></font>
		<br />
		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1609"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/den_01.png" alt="denmark"/>
					<span class="motto">デンマークといえばこれ！<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/1568"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/den_02.png" alt="denmark"/>
					<span class="motto">デンマークは<br />幸せと平和を願う国</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1598"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/den_03.png" alt="denmark"/>
					<span class="motto">世界一幸福な国！！<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>
	  		<table border="3" bordercolor="#87ceeb" width="100%" style="border-radius: 5px;">
				<tr>
					<td><p class="text01"><font size="2">≪その他のデンマーク紹介記事≫
					<br />
					◆<a href="http://www.jawhm.or.jp/blog/osakablog/item/1609" target="blank" style="text-decoration: none;"><font color="#0000ff" size="2">デンマークの人は魚が嫌いな国！？</font></a><br />
					◆<a href="ttp://www.jawhm.or.jp/blog/osakablog/item/1609" target="blank" style="text-decoration: none;"><font color="#0000ff" size="2">デンマーク人の国民性～褒められるのは得意じゃない！？～</font></a></td>
				</tr>
			</table>
		<br />
		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%82%A2%E3%82%A4%E3%83%AB%E3%83%A9%E3%83%B3%E3%83%89" target="blank">デンマークに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag12.gif" alt="norway" id="nor">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>国土の半分は森林に覆われ、9万を超す湖沼をもつ北欧最大の「森と湖の国」。</b></center></font>
		<br />
		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/1526"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/ire_01.png" alt="ireland"/>
					<span class="motto">ノルウェーの公用語？？<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1489"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/ger_02.png" alt="newzealand"/>
					<span class="motto">オーロラ＆フィオルドなど<br />大自然に向き合える国</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
<!--					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/fukuokablog/item/1504"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/can_03.png" alt="newzealand"/>
					<span class="motto">花あふれる優雅な州都<br />ビクトリア</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
-->				</ul>
		</section>

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E3%83%8E%E3%83%AB%E3%82%A6%E3%82%A7%E3%83%BC" target="blank">ノルウェーに関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag10.gif" alt="taiwan" id="tai">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>どこか懐かしい風景でノスタルジックな雰囲気に浸ることができる、自然と近代文化が両立する場所。</b></center></font>
		<br />
		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1406"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/tai_01.png" alt="taiwan"/>
					<span class="motto">台湾は隠れた温泉王国！<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1500"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/tai_02.png" alt="taiwan"/>
					<span class="motto">日本と台湾の友好関係<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/osakablog/item/1531"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/tai_03.png" alt="taiwan"/>
					<span class="motto">台湾にもゆるキャラ！？<br />タイワンダーくんとは？？</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>
	  		<table border="3" bordercolor="#87ceeb" width="100%">
				<tr>
					<td><p class="text01"><b><font size="3">≪その他の台湾紹介記事≫
					<br />
					◆<a href="http://www.jawhm.or.jp/blog/osakablog/item/1530" target="blank" style="text-decoration: none;"><font color="#0000ff" size="2">新幹線を使って、快適台湾旅行♪</font></a></td>
				</tr>
			</table>
		<br />
		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E5%8F%B0%E6%B9%BE" target="blank">台湾に関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag11.gif" alt="hong kong" id="hk">
		<br />
		<br />
			<font color="#4169e1" size="2"><center><b>貿易、金融におけるアジアの中心都市として、世界的に急成長した雅やかな近代大都市。</b></center></font>
		<br />
		<section>
				<ul  class="mobile_center">
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/1408"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/hk_01.png" alt="hong kong"/>
					<span class="motto">絶対行きたい香港の<br />3大オススメスポット</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/1563"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/hk_02.png" alt="hong kong"/>
					<span class="motto">香港に行ってみよう<br />気になる物価は？</span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
					<li class="ichiran_fukuoka">
						<a href="http://www.jawhm.or.jp/blog/tokyoblog/item/1602"class="trans_fukuoka" target="blank">
					<img src="/country/country_intro/images/hk_03.png" alt="hong kong"/>
					<span class="motto">香港の2大○○○！<br /><br /></span>
					<p class="midashi">ブログ記事を読む</p>
					</a>
					</li>
				</ul>
		</section>

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E9%A6%99%E6%B8%AF" target="blank">香港に関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

	<image src="/images/bflag04.gif" alt="korea" id="kor">
		<br />
			<font color="#4169e1" size="2"><center><b>全土にわたり長い歴史を持つ主要都市が点在し、今尚発展を続ける国、韓国。</b></center></font>
		<br />
		<center><image src="/country/country_intro/images/kor_01.png" alt="korea">　　　　<image src="/country/country_intro/images/kor_02.png" alt="korea"></center>
		<br />

		<center><a class="blog" href="http://www.jawhm.or.jp/blog/tag/%E9%9F%93%E5%9B%BD" target="blank">韓国に関するブログ記事はこちらから！</a></center>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

<? include('./step/memline.php'); ?>
	<div class="step_box">

	</div>
	<div style="clear:both; height:10px;">&nbsp;</div>

	  <div class="advbox03">
<?php
	// 111
  define('MAX_PATH', '/var/www/html/ad');
  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
    if (!isset($phpAds_context)) {
      $phpAds_context = array();
    }
    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
    $phpAds_raw = view_local('', 86, 0, 0, '', '', '0', $phpAds_context, '');
  }
  echo $phpAds_raw['html'];
?>
	  </div>
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>