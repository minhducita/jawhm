<?php
require_once '../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='タムウッド・インターナショナル（Tamwood）';
$header_obj->description_page='カナダ：タムウッド・インターナショナル。ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->add_css_files='<link href="/school/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />';
$header_obj->add_js_files='<script src="/school/lib/jquery.js" type="text/javascript"></script>
<script src="/school/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$("a[rel*=facebox]").facebox({
loadingImage : "../src/loading.gif",
closeImage   : "../src/closelabel.png"
})
})
</script>';


$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'タムウッド・インターナショナル';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs('school','school-can'); ?>
	  <div id="sitemapbox">

        <table class="school-title">
		<tr>
		<td class="name">
			<a href="http://www.tamwood.com/" target="_blank">タムウッド・インターナショナル　（Tamwood International）</a>
		</td>
		<td class="kuni">
			<a href="../can.html"><img src="../../images/flag03.gif"><br/>Canada</a>
		</td>
		</tr>
		</table>

		<div style="height:20px;">&nbsp;</div>

		<img src="p01.jpg" alt="" style="float:left; padding-right:10px;" />
			<p>
				タムウッドは中規模ながら世界各国から生徒がバランス良く集まる学校です。
				Productionつまり英語を作る、訳すのではなく実際に英語を使う練習をします。
				またStudy HallやPersonal Coachingと個別指導を提供しており、
				グループレッスンではカバーできない個人の弱点をバックアップするシステムがある世界でも数少ない学校です。
				インターンやボランティアプログラムを提供するGo International、COOPビザで
				学習・研修するTamwood Careers専門学校をグループ内に持つ、ユニークな学校となります。
				学ぶ、体験する、夢を実現するを3つの組織でインハウスで提供できるのがTamwoodです。
			</p>
	  </div>

	  <h2 class="sec-title">学校の様子</h2>
	  <div id="sitemapbox">

		<table>
		<tr>
			<td><a href="p11_lrg.jpg" rel="facebox"><img src="p11_sml.jpg"></a></td>
			<td><a href="p12_lrg.jpg" rel="facebox"><img src="p12_sml.jpg"></a></td>
		</table>

	  </div>

	  <h2 class="sec-title">Tamwood とは？</h2>
	  <div id="sitemapbox">
		<p>&nbsp;</p>
		<table width="100%">
		<tr>
		<td  style="background:url(ehlogo.png) no-repeat right bottom">
		<p>
			バランスの取れた多国籍な環境とアットホームな環境を長く提供している中規模校です。<br /><br />
			Production、つまり訳すのではなく実際に英語を使う練習をします。このため、文法と会話の時間が分かれておらず、生徒は習ったことを使いやすいフレーズやイディオムが提供されて英語を作ることをプッシュされます。<br /><br />
			Study HallやPersonal Coachingと個別指導も特徴の一つです。特にPersonal Coachingは放課後にグループレッスンではカバーできない個人の弱点の克服方法を教授するタムウッドだけの指導方法となり、多くの日本人生徒が利用し弱点を克服しています。これらのサポートは授業料金内で受けることができます。<br /><br />
			またGo Internationalというインターンやボランティアの斡旋子会社は、ワーホリに認定された数少ない会社でカナダ政府のサイトにも紹介されています。タムウッドで勉強する日本人生徒の多くはインターンやボランティアへ向けて勉強しています。<br /><br />
			<b>インターン</b>：オフィスでの仕事を体験します。(無給)<br /><br />
			<b>ワーホリプラン</b>：リゾートでホスピタリティー系の仕事を体験します。(有給)<br /><br />
			<b>ボランティアプログラム</b>：バン服国立公園などで自然保護、社会福祉団体、動物保護団体<br /><br />
			数多くの手配先があるため、目的に合わせてプログラムを用意することができるのもタムウッドのプログラムの特徴となります。
			英語だけでなく、日本とカナダの違いをいろいろな面で感じることができ、キャリアアップなどに有効なプログラムとなります。

		</p>
		</td>
		</tr>
		</table>
		<p>&nbsp;</p>

		<div class="school-subtitle">
			キャンパスごとの生徒数
		</div>
		<p>&nbsp;</p>
		<p>
			<b>バンクーバー校</b>　：　100人から220人(最大220名)　-　日本人平均22%<br />
			<b>ウィスラー校</b>　　　：　夏30人から冬100人(最大110名)　-　日本人平均 13%<br />
			<b>トロント校</b>　　　　　：　30人から60人 (最大90名)　-　日本人平均16％<br />

		<p>&nbsp;</p>

		<div class="school-subtitle">
			日本人スタッフの有無
		</div>
		<p>&nbsp;</p>
		<p>
			<b>バンクーバー校</b>　：　常時勤務しています。<br />
			<b>ウィスラー校</b>　　　：　スカイプで連絡を取れます。<br />
			<b>トロント校</b>　　　　　：　パートタイムで勤務しているスタッフがいます。<br />

		<p>&nbsp;</p>

		<div class="school-subtitle">
			English Only Policy
		</div>
		<p>&nbsp;</p>
		<p>
			すべての校舎でEnglish Only Policyです。1回目は注意、2回目が早退、3回目が3日間の停学、4回目が退学となります。
			もともとどの校舎も偏った国籍比率にはならないか、ヨーロッパや南米の生徒が多いので、自然とEnglish Onlyになっています。
			名前も掲示板に張り出されるので、普通は1回の注意を受けて終わります。3日間の停学になる生徒は年に2から3名で、退学になる生徒はいません。
		</p>

		
<!--
		<div class="school-subtitle">
			語学学校ブログ
		</div>
		<p>&nbsp;</p>
		<p>
		現地情報や学校情報が盛りだくさん！
		語学学校 Tamwood　公式ブログは<font color=red><a href="http://www.jawhm.or.jp/blog/canada/tamwood/" title="語学学校 Tamwood　公式ブログ"><u>こちら</u></a></font>から
-->
	<div style="height:50px;">&nbsp;</div>

	  </div>
	  </div>

	</div>

  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>
