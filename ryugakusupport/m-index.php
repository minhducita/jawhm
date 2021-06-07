<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='留学サポートサービス';
$header_obj->description_page='ワーキングホリデー（ワーホリ）の費用をお話させて頂く上でまず知っておいて頂きたい事は、
				ワーキングホリデー（ワーホリ）で必要な費用は、自分が行く国や地域、時期、目的や目標、期間によって大きく左右されるということです。
				しっかりとした語学や専門知識を学ぼうとすると語学学校に通う必要があり、費用的な面では高くなります。
				また費用を抑えて低予算で渡航してしまうと、ワーキングホリデー（ワーホリ）に行ったはいいけど生活が安定する前に
				予算が底をついて途中帰国を余儀なくされてしまう、といった場合もあります。
				実際にワーキングホリデー（ワーホリ）で海外に渡航すると、どの程度の費用がかかるのか、目安でも良いので知っておくことは非常に重要です。';


//新ヘッダーフッター適用までは一時的に2ファイル設定
//$header_obj->add_css_files='<link href="./css-sp/style.css" rel="stylesheet" type="text/css" />';
$header_obj->add_css_files='<link href="../css/base_mobile.css" rel="stylesheet" type="text/css" /><link href="../css/base_mobile_temp.css" rel="stylesheet" type="text/css" /><link href="./css-sp/style.css" rel="stylesheet" type="text/css" />';


//$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="./img-sp/main-image.jpg" alt="">';

$header_obj->fncMenuHead_h1text = '留学サポートサービス';


//$header_obj->display_header_temp();
$header_obj->display_header();

include('../calendar_module/mod_event_horizontal.php');
?>

	<div id="mobile-page-main-image">
		<img src="./img-sp/main-image.jpg" alt="留学サポートサービス" class="responsive-img">
	</div>

	<div id="maincontent" class="page_ryugaku">

		<?php echo $header_obj->breadcrumbs(''); ?>

		<section id="section-01">
			<div class="section-inner">
				<dl>
					<dt>
						<h1><img src="./img-sp/section-01-question.png" alt="わたし、留学したいんですけど、ワーホリ協会じゃダメですよね？" class="responsive-img"></h1>
					</dt>
					<dd>
						<p class="image-text"><img src="./img-sp/section-01-answer.png" alt="ワーキングホリデー協会では留学サポートもしています！" class="responsive-img"></p>
						<p class="texts">
						日本ワーキング・ホリデー協会ではビザの説明をするうえで留学ビザの取得方法、留学ビザの活用方法、観光ビザでの勉強・留学の仕方、ワーホリビザでの留学も詳しく説明しています。世界ではワーキングホリデービザも長期・短期留学用学生ビザも同じ留学ビザとして扱われています。そのため各大使館、各国の留学機関のご協力のもと留学ビザに変更がされるとすぐに当協会に連絡が入り新しい留学ビザ申請方法を皆様にお伝えする事が可能となっています。
						</p>
						<p class="figure"><img src="./img-sp/section-01-figure.png" class="responsive-img"></p>
					</dd>
				</dl>
			</div>
		</section>
		<!-- (end) section-01 -->

		<div class="area-info-banner">
			<a href="/mem2/register.php"><img src="./img-sp/info-btn.png" alt="メンバー登録はこちら" class="responsive-img"></a>
		</div>
		<!-- (end) area-info-banner -->

		<section id="section-02">
			<div class="section-inner">
				<dl>
					<dt>
						<h1><img src="./img-sp/section-02-title.png" alt="ワーキングホリデーだけじゃない。留学という選択肢。" class="responsive-img"></h1>
					</dt>
					<dd>
						<p class="texts">
							皆さんが海外へ飛び立つ理由は様々あると思います。語学を身につけるため、新しい自分を見つけるため、将来に役立つ経験を積むため……しかし、その目的・目標にたどり着くまでの道は決して一つではありません。どんな留学プランが自分に一番合っているのか、夢を叶えるためには何から始めたらいいのか、私たちにも一緒に考えさせて下さい。
						</p>

						<div class="area-clip">
							<dl class="clearfix">
								<dt class="area-clip-title"><a href="http://www.jawhm.or.jp/package/"><img src="./img-sp/section-02-example-01-title.gif" alt="短期留学" class="responsive-img"></a></dt>
								<dd class="area-clip-title-sub">短期留学は「次に繋げる為の留学」です。</dd>
							</dl>
							<dl class="clearfix">
								<dt class="area-clip-text">
									期間が短いので気楽に行くことができる半面、できることも限られてしまいます。そのため「目標を見つけることを目的」にして留学される方や、短期留学で海外での感覚をつかんだ後ワーキングホリデーに行かれる方も多くいらっしゃいます。
								</dt>
								<dd class="area-clip-pic"><img src="./img-sp/section-02-example-01-pic.jpg" class="responsive-img"></dd>
							</dl>

							<span class="clip-image"><img src="./img-sp/section-02-clip.png" class="responsive-img"></span>
						</div>

						<div class="area-clip">
							<dl class="clearfix">
								<dt class="area-clip-title"><a href="http://www.jawhm.or.jp/package/"><img src="./img-sp/section-02-example-02-title.gif" alt="長期留学" class="responsive-img"></a></dt>
								<dd class="area-clip-title-sub">長期留学は「目標を達成する留学」です。</dd>
							</dl>
							<dl class="clearfix">
								<dt class="area-clip-text">
									海外で生活できる期間が長いため、資格や進学など選択肢が大きく増え、自分のしたい事により集中して取り組むことができるでしょう。長期留学は日本や海外での就職だけでなく、その後の皆さんの人生にとても大きな影響力を持つでしょう。
								</dt>
								<dd class="area-clip-pic"><img src="./img-sp/section-02-example-02-pic.jpg" class="responsive-img"></dd>
							</dl>

							<span class="clip-image"><img src="./img-sp/section-02-clip.png" class="responsive-img"></span>
						</div>
					</dd>
				</dl>
			</div>
		</section>
		<!-- (end) section-02 -->

		<div class="area-info-banner">
			<a href="/mem2/register.php"><img src="./img-sp/info-btn.png" alt="メンバー登録はこちら" class="responsive-img"></a>
		</div>
		<!-- (end) area-info-banner -->

		<section id="section-03">
			<div class="section-inner">
				<dl>
					<dt>
						<h1><img src="./img-sp/section-03-question.png" alt="" class="responsive-img"></h1>
					</dt>
					<dd>
						<p class="image-text"><img src="./img-sp/section-03-answer.png" alt="" class="responsive-img"></p>
						<p class="texts">
							学生ビザは学校に通う人に対して発行されるビザで、年齢制限もありません。
						</p>
					</dd>
				</dl>

				<dl class="set-qa">
					<dt><h2><img src="./img-sp/section-03-01-question.png" alt="海外で授業についていけるか心配です。" class="responsive-img"></h2></dt>
					<dd>
						多くの語学学校にはレベル分けの制度があり、自分の英語力に合った授業を受けることができますのでご安心下さい！
					</dd>
				</dl>

				<dl class="set-qa">
					<dt><h2><img src="./img-sp/section-03-02-question.png" alt="学校の違いがわかりません…" class="responsive-img"></h2></dt>
					<dd>
						授業内容、雰囲気、設備…など学校によって大きく違いがあります。<br>
						当協会でも語学学校のセミナーにて分かりやすくご案内しておりますのでぜひ一度ご参加下さい！
					</dd>
				</dl>

				<dl class="set-qa">
					<dt><h2><img src="./img-sp/section-03-03-question.png" alt="ワーホリ協会ではどんな留学サポートがあるの？" class="responsive-img"></h2></dt>
					<dd>
						日本ワーキングホリデー協会は、長年にわたって海外の語学学校と連携をしてまいりました。その結果、現在では現地サポートオフィスをワーキングホリデーでも学生ビザ留学生でも利用できるようになりました。誰でも安心してご利用いただけます。<br><br>
						語学学校選びから入学手続きまで、出発前準備、現地サポートオフィスによる現地サポート等、初めての留学で不安な方は当協会の留学カウンセラーが親身になってご相談にのります。「留学」が頭に浮かんだら、お気軽にご相談ください。
					</dd>
				</dl>

				<p class="figure"><img src="./img-sp/section-03-pic.png" class="responsive-img"></p>
			</div>
		</section>
		<!-- (end) section-03 -->

		<div class="area-info-banner">
			<a href="/mem2/register.php"><img src="./img-sp/info-btn.png" alt="メンバー登録はこちら" class="responsive-img"></a>
		</div>
		<!-- (end) area-info-banner -->

		<section id="section-04">
			<div class="section-inner">
				<dl>
					<dt>
						<h1><img src="./img-sp/section-04-title.png" alt="年間1万8000人も受けている初心者向セミナー" class="responsive-img"></h1>
					</dt>
					<dd>
						<p class="texts">
							初心者セミナーではよく聞かれる質問をセミナー形式で説明しております。<br>
							一人で受けられる方がほとんどですので一度は初心者セミナーを受けられることをお勧めしております。<br>
							<br>
							ワーキングホリデー初心者セミナーでは海外語学学校に通うためのアメリカ留学、カナダ留学、イギリス留学、オーストラリア留学、ニュージーランド留学のためのビザの説明をしています。ワーホリビザと留学ビザを一緒に賢く使う方法や、長期留学で働ける国や方法などをご説明しています。<br>
							<br>
							初心者セミナーを受けたら次は懇談セミナーや国比較セミナーを受けて下さい。そして語学学校比較セミナーを受けて頂くと具体的に日程や行きたい国やしたいことが決まるはずですので留学カウンセラーが具体的な計画を一緒に作成していきます。
						</p>
						<p class="figure"><img src="./img-sp/section-04-pic.png" class="responsive-img"></p>
					</dd>
				</dl>
			</div>
		</section>
		<!-- (end) section-04 -->

		<div class="area-info-banner">
			<a href="/mem2/register.php"><img src="./img-sp/info-btn.png" alt="メンバー登録はこちら" class="responsive-img"></a>
		</div>
		<!-- (end) area-info-banner -->

		<section id="section-05">
			<div class="section-inner">
				<dl>
					<dt>
						<h1><img src="./img-sp/section-05-title.png" alt="当協会は皆様の留学を応援しています" class="responsive-img"></h1>
					</dt>
					<dd>
						<p class="texts">
							皆様の海外留学を支援するため、当協会ではワーホリ成功のためのメンバーサポート制度をご用意しています。 当協会のメンバーになっていただくことで、個別相談をはじめビザ取得のお手伝い、出発前の準備、到着後のサポートまで、フルにサポートさせていただきます。
						</p>
						<p class="figure"><a href="https://www.jawhm.or.jp/mem2/register.php"><img src="./img-sp/section-05-figure.png" alt="ワーキングホリデー協会メンバーサポート" class="responsive-img"></a></p>
					</dd>
				</dl>
			</div>
		</section>
		<!-- (end) section-05 -->

		<div class="area-message">
			<p>
				遠方にお住まいでセミナー等への参加が難しい<br>
				皆さまもご安心ください。<br>
				協会では電話やメールでのお問い合わせも<br>
				承っております。
			</p>
		</div>
		<!-- (end) area-message -->

		<div class="area-regist-btn">
			<ul class="clearfix">
				<li><img src="./img-sp/section-05-pic.png" class="responsive-img"></li>
				<li><a href="/mem2/register.php"><img src="./img-sp/section-05-btn.png" class="responsive-img"></a></li>
			</ul>
		</div>
		<!-- (end) area-regist-btn -->

		<!-- (end) area-info-banner -->

<style>
.page_top{
	position:fixed;
	bottom:18px;
	right:0px;
	padding:10px 20px;
	color:#5fddff;
	font-size:20px;
	text-decoration:none;
	background:green;
	border-top-left-radius: 8px;
	border-bottom-left-radius: 8px;
	width:10px;
}
.page_top a{
	color:black;
	font-size:20px;
	text-decoration:none;
}
.page_top:hover { background:#e74c3c; }
</style>
<script>
$(function() {
	var pageTop = $('.page_top');
	pageTop.hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
			pageTop.css("background-color","#5fddff");
//			pageTop.fadeIn("normal",function(){});
			pageTop.show();
			pageTop.animate({
					width:"200px",
				},800);
			if ($(this).scrollTop() > 1000 + 200) {
				pageTop.css("background-color","#e4b5ea");
			}
			if ($(this).scrollTop() > 2000 + 200) {
				pageTop.css("background-color","#ffb8dc");
			}
			if ($(this).scrollTop() > 3000 + 200) {
				pageTop.css("background-color","#ff9c9c");
			}
	} else {
		pageTop.fadeOut();
		pageTop.css("width","0px");
	}
	});
});
</script>
<span class="page_top">
<a href="/mem2/register.php" alt="メンバー登録"><img src="./img/bamu-trans.png"></a>
</span>
	</div>
	<!-- (end) #maincontent -->

	</div>
	</div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>