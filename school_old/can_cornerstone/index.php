<?php
require_once '../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='コーナーストーン・アカデミック・カレッジ（CAC）';
$header_obj->description_page='カナダ：コーナーストーン・アカデミック・カレッジワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
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
$header_obj->fncMenuHead_h1text = 'コーナーストーン・アカデミック・カレッジ';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs('school','school-can'); ?>
	  <div id="sitemapbox">

        <table class="school-title">
		<tr>
		<td class="name">
			<a href="http://www.cacenglish.com/xe/" target="_blank">コーナーストーン・アカデミック・カレッジ　（Cornerstone Academic College）</a>
		</td>
		<td class="kuni">
			<a href="../can.html"><img src="../../images/flag03.gif"><br/>Canada</a>
		</td>
		</tr>
		</table>

		<div style="height:20px;">&nbsp;</div>

		<img src="p01.jpg" alt="" style="float:left; padding-right:10px;" />
			<p>
			Cornerstone Academic Collegeはバンクーバー、トロントにキャンパスを持つ語学学校です。
			リスニング・スピーキング・文法などすべてのスキルを関連付けて学ぶ「Integrated method」を採用し、日常会話から仕事で使う英語までをカリキュラムでカバーしております。
			また、スピーキング集中コースや、ビジネス英語などの専門コースにも力を入れており、目的に特化した英語学習をしたい方にもオススメの学校です。
			</p>

			<div style="height:18px;">&nbsp;</div>
			<center>
			<a href="/school/voice/cornerstone/"><img src="../voice/img/schoolvoice_off.gif" alt="留学・ワーホリ体験者の声"></a>
			</center>

	  </div>




	  <h2 class="sec-title">学校の様子</h2>
	  <div id="sitemapbox">

		<table>
		<tr>
			<td><a href="p11_lrg.jpg" rel="facebox"><img src="p11_sml.jpg"></a></td>
			<td><a href="p12_lrg.jpg" rel="facebox"><img src="p12_sml.jpg"></a></td>
		</table>

	  </div>

	  <h2 class="sec-title">Cornerstoneとは？</h2>
	  <div id="sitemapbox">

		<div class="school-subtitle">
			バンクーバーキャンパス
		</div>
		<p>&nbsp;</p>
		<table width="100%">
		<tr>
		<td  style="background:url(ehlogo.png) no-repeat right bottom">
		<p>
		週25時間しっかり英語の勉強をしながら、1日の貴重な時間をより自由に使う事ができるユニークなESLプログラムを提供。
		午前コースなら午後1時には授業が終了するので、ワーホリの学生であれば午後から仕事をすることも可能に。
		国際色豊かでアットホームな環境のなか、しゃめる力が確実に伸びる学校です。<br />
		<br />
		■　バンクーバーキャンパス　人気コース<br />
		<br />
		・ ESL<br />
		週25時間のフルタイムESLでは、午前か午後のどちらかが選択できます。午後は観光や仕事をしたい、という方は「午前コース（8：00～13：0）」を、午前中はじぶんでゆっくり勉強をする時間をとりたい、という方は「午後コース（13：15～18：15）」が選択できます。
		また授業以外にも、毎日完全予約制の少人数制特別クラスが開講されているのも特徴です。<br />
		<br />
		・　スぺ―キング集中（RealSpeaking）<br />
		初級・上級の２レベルで開講。初級レベルでは日常生活のサバイバル英語を中心に、上級レベルではよりネイティブに近いスピーキング力を目指します。<br />
		<br />
		・　ビジネスワールドイングリッシュ<br />
		12週間かけて、英語を使って仕事をするうえで知っておかなければならない用語、表現、文章作成、プレゼンテーションの作り方から発表等を学びながら、ビジネスパーソンとして自信を持ってコミュニケーションがとれる事を目指します。<br />
		</p>
		</td>
		</tr>
		</table>
		<p>&nbsp;</p>

		<div class="school-subtitle">
			トロントキャンパス
		</div>
		<p>&nbsp;</p>
		<p>
		初級からビジネス英語を学べるESLプログラムのほか、スピーキングを伸ばしたい！英語教師になりたい！ビジネスで通用する英語を身につけたい！など、それぞれの目的に応じた豊富な専門プログラムを開講。<br />
		<br />
		■　トロントキャンパス　人気コース<br />
		<br />
		・　ESL<br />
		日常会話だけでなく、仕事で通用する英語を学ぶ「Work Place English」のコンセプトを初級レベルから採用。カナダ現地や、帰国後に英語を使う仕事に就きたい人にオススメです。<br />
		<br />
		・　スピーキング集中（Real Speaking）<br />
		初級・中級の２レベルで開講。ネイティブスピードのリスニングに慣れ、自らも流暢に話せるようになることを目的にした、大人気のスピーキングプログラムです。中級では1分間スピーチや、プレゼンテーションなどのパブリックスピーキングも行います。<br />
		<br />
		・　英語教師養成<br />
		中高生向け英語教授法（TESOL）、児童向け英語教授法（TEYC）を開講。理論だけでなく、プラクティカム（実践）をカリキュラムに取り入れ、現地の学校視察や、投稿のジュニアコースで実際に授業を教えるなど、4週間という短期間で凝縮したプログラムが受講可能です。<br />
		<br />
		・　ビジネス英語コース<br />
		マーケティング、組織、会計などに関する北米の基本的なビジネス知識を、ケーススタディ等を元に学んでいきます。北米のビジネスマナーだけでなく、論理的思考力、課題解決力などの思考アプローチも同時に学べます。また、プレゼンテーションでは、英語でのプレゼン資料制作方法、効果的なプレゼン方法などを身につけながら、最終的に全校生の前でプレゼンする機会があります。<br />
		</p>

		<p>&nbsp;</p>

		<div class="school-subtitle">
			語学学校ブログ
		</div>
		<p>&nbsp;</p>
		<p>
		現地情報や学校情報が盛りだくさん！
		語学学校Cornerstone　公式ブログは<font color=red><a href="http://www.jawhm.or.jp/blog/canada/cornerstone/" title="語学学校Cornerstone　公式ブログ"><u>こちら</u></a></font>から

	<div style="height:50px;">&nbsp;</div>

	  </div>
	  </div>

	</div>

  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>
