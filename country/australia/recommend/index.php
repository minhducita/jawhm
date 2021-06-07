<?php
	require_once '../../../include/header.php';
	require_once '../../../include/links.php';

	$links_obj = new Links();
	$header_obj = new Header();

	$header_obj->title_page='ワーホリ協定国・オーストラリアの基本情報';
	$header_obj->description_page='日本とワーキングホリデー協定を結ぶオーストラリアについてご紹介します。オーストラリアならではの大自然の風景や現地の文化など、興味深い情報がもりだくさん。渡航される方は是非ご一読ください。';
	$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../../images/mainimg/AU-countrypage.gif" alt="" width="970" height="170" />';
	$header_obj->fncMenuHead_h1text = 'オーストラリア | ワーホリで行ける国（ワーキングホリデー協定国）';

	//add javascript for country info
	$header_obj->add_js_files='
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<!--[if IE]><script type="text/javascript" src="/country/country_info/js/excanvas.js"></script><![endif]-->
	<script type="text/javascript" src="/country/country_info/js/coolclock.js"></script>
	<script type="text/javascript" src="/country/country_info/js/moreskins.js"></script>
	';

	if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') {
		$header_obj->add_css_files='<link href="../../css/style.css" rel="stylesheet" type="text/css" /><link href="../../css/style-m.css" rel="stylesheet" type="text/css" />';
	} else {
		$header_obj->add_css_files='<link href="../../css/style.css" rel="stylesheet" type="text/css" /><link href="../../css/style-p.css" rel="stylesheet" type="text/css" />';
	}
	
	//add resource jusst this link
	$header_obj->add_css_files = '
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
		<link rel="stylesheet" href="css/magnific-popup.css" >
		<link rel="stylesheet" href="css/style.css" >
	';
	
	$header_obj->add_js_files = '
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js" ></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
	';
	

	$header_obj->display_header();

	//include('../../../calendar_module/mod_event_horizontal.php');

	if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on')
	{
		//include('./m-index.php');
		//exit;
	}

?>

<?php
	$ini = parse_ini_file('../../../../bin/pdo_mail_list.ini', FALSE);
	$tmpdb = new PDO($ini['dsn'], $ini['user'], $ini['password']);
	$tmpdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$tmpdb->query('SET CHARACTER SET utf8');
	
	$like = array();
	
	$tmpstt = $tmpdb->prepare("SELECT * FROM recommend");
	$tmpstt->execute();
	while($row = $tmpstt->fetch(PDO::FETCH_ASSOC)){
		
		$like[$row['name']] = $row['value'];
		
	}
?>


<div id="maincontent">
	<?php echo $header_obj->breadcrumbs('country'); ?>
	<div id="main">
		<div id="top">
			<img class="img-fluid" src="./images/aus_img.jpg">
		</div>
		<!-- AUSTRALIA -->
		<div class="what-aus">
			<div>
				<div class="text-center">
					<p style="text-align: center; font-size: 16px; font-weight: 600">What’s Australia ?</p>
					<h1 class="decoration res-wh-aus">オーストラリアってどんな国？</h1>
					<img src="./images/aus_map.jpg" style="padding: 20px;margin-top: 40px;">
				</div>
				<p>広大な大地に広がる、美しい自然。世界中でもここでしか出会えない動植物。そして、世界遺産として17箇所も登録がある大自然がいっぱいのオーストラリア。</p><br />

				<p>オーストラリアは古くから多様な移民を受けいれ、様々な文化が融合した独自の文化を作り上げている国です。</p><br />

				<p>また、日本に劣らず大変治安の良い国と知られ、衛生面及び医療面においてもオーストラリアは世界最高位順の国でもあります。</p>
				
				<h2 class="h2-title"><span>オーストラリア基本情報</span></h2>
				<div class="area-display-sp clearfix">
					<!-- LuuDV Card2108 -->
					<table class="table-info" style="width: 100%;">
						<tbody>
							<tr style="border-bottom: none;">
								<th style="border-bottom: 1px solid #333;">首都</th>
								<td style="font-size: 16px; border-bottom: 1px solid #333;" id="td-capital">Canberra</td>
								<td>&nbsp;</td>
								<th style="border-bottom: 1px solid #333;">言語</th>
								<td id="td-language" style="border-bottom: 1px solid #333;">English</td>
							</tr>
							<tr style="border-bottom: none;">
								<th style="border-bottom: 1px solid #333;">面積</th>
								<td style="font-size: 16px; border-bottom: 1px solid #333;">7,686,850 km²<span>(世界6位)</span></td>
								<td>&nbsp;</td>
								<th style="border-bottom: 1px solid #333;">通貨</th>
								<td style="font-size: 16px; border-bottom: 1px solid #333;">Australia Dollar (AUD)</td>
							</tr>
							<tr style="border-bottom: none;">
								<th style="border-bottom: 1px solid #333;">人口</th>
								<td style="font-size: 16px; border-bottom: 1px solid #333;">21,293,000人<span>(世界51位)</span></td>
								<td>&nbsp;</td>
								<td colspan="2"><p class="text-attention">＊2014 年10 月時点の数値です</p></td>
							</tr>
						</tbody>
					</table>
					
					<!--
					<table class="table-info">
						<tbody>
							<tr>
								<th>首都</th><td style="font-size: 16px" id="td-capital">Canberra</td>
							</tr>
							<tr>
								<th>面積</th><td style="font-size: 16px">7,686,850 km²<span>(世界6位)</span></td>
							</tr>
							<tr>
								<th>人口</th><td style="font-size: 16px">21,293,000人<span>(世界51位)</span></td>
							</tr>
						</tbody>
					</table>
					<table class="table-info" style="margin-right:0">
						<tbody>
							<tr>
								<th>言語</th><td id="td-language">English</td>
							</tr>
							<tr>
								<th>通貨</th><td style="font-size: 16px">Australia Dollar (AUD)</td>
							</tr>
							<tr style="border-bottom:none">
								<td colspan="2"><p class="text-attention" style="padding-right:10px">＊2014 年10 月時点の数値です</p></td>
							</tr>
						</tbody>
					</table>-->
					
				</div>
				
				<img class="img-responsive" src="images/line.png" alt="">
				<div id="main2"></div>
				<img class="img-responsive img-center" src="images/what-australia.jpg"alt="">
				<p class="text-center" style="padding-top: 20px; padding-bottom: 20px;">オーストラリアは都市によって様々な特徴があります。<br>
					あなたにぴったりの都市を診断してみましょう！</p>
				<a href="#start" class="open-popup-link"><img class="btn-start img-responsive" src="images/btn-start.jpg" alt=""></a>
				<img class="img-responsive" src="images/line-bottom.jpg" alt="">
			</div>
		</div><!-- AUSTRALIA -->
		<!-- SYDNEY -->
		<div class="sydney" id="syd">
			<div>
				<img src="images/sydney1.jpg" alt="">
				<p style="padding-top: 20px;">オーストラリア最大の経済都市。仕事・情報量・語学学校の数もNo.1。オペラハウスなどの観光スポットも多く、<br />大都市ながらオーストラリアらしいビーチも多数。
					エンターテイメントが充実の魅了的な都市です。</p>
				<div class="list">
					<p>SYDNEYさんはこんな人！？</p>
					<h4>シドニーのオススメポイント</h4>	
					<ul>
						<li>&bull; 田舎より都会派</li>
						<li>&bull; できるだけ長く働きたい</li>
						<li>&bull; 街もビーチも楽しみたい！</li>
						<li>&bull; 渡航が初めてで情報収集がしやすい方がいい。</li>
					</ul>
				</div>
				<div class="new-list">
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/nagoyablog/総合/3480/" target="_blank">
								<img class="img-responsive" src="images/sysdney/img1.jpg" alt=""><p>【厳選】　シドニーのビーチ紹介！</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/nagoyablog/総合/2595/" target="_blank">
								<img class="img-responsive" src="images/sysdney/img2.jpg" alt=""><p>シドニーワーホリ生活の知恵</p>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/tokyoblog/総合/7054/" target="_blank">
								<img class="img-responsive" src="images/sysdney/img3.jpg" alt=""><p>ワーホリ人気No.1都市Sydneyとは？</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="http://www.whstory.com/14" target="_blank">
								<img class="img-responsive" src="images/sysdney/img4.jpg" alt=""><p>リンクを経験し、帰国後に夢を叶えた！</p>
							</a>	
						</div>
					</div>
				</div>
				<div>
					<img src="images/sysdney/s1_update.png" alt="">
					<p style="padding: 10px 0 20px 0;">小さい頃からの夢だった保育士をしていた私は、ただ保育するだけでなくもっと私が子どもに伝えれることが<br />あるはずだと思い英語を子どもに教えたいと思った事がきっかけで、語学留学を決めました。</p>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-5 list-img"><img src="images/sysdney/img4.jpg" alt=""></div>
					<div class="col-xs-6 col-sm-7 list-img"><p class="nomargin">シドニーでは様々な国籍の友だちができ、<br />この出会いは私の宝物です。<br />このかけがえのない友だちが出来ただけで、<br />シドニーに行ってよかった！と思えるくらいです。</p></div>
				</div>
				<div class="btn01">
					<div class="btn-heart"><a class="btn-format" href="" title="syd"><i class="fa fa-heart-o"></i>いいね！&nbsp;<span id="count"><?php  echo $like['syd']; ?></span>&nbsp;件</a></div>
				</div>
				
				<div class="box">
					<h3>　他の都市も見る</h3>
					<a href="#bne" title="">ブリスベン</a>
					<a href="#ool" title="">ゴールドコースト </a>
					<a href="#mel" title="">メルボルン</a>
					<a href="#per" title="">パース</a>
					<a href="#cns" title="">ケアンズ</a>
				</div>
				<a href="#main2" class="fl-right">▲ ステップチャートに戻る</a>
				<img src="images/line-bottom.jpg" alt="">
			</div>
		</div><!-- SYDNEY -->
		<!-- MELBOURNE -->
		<div id="mel" class="melbourne">
			<div>
				<img src="images/melbourne/banner-melbourne.png" alt="">
				<p style="padding-top: 20px;">ヨーロピアン調の街並みが多くオシャレな都市。<br />日本人が比較的少なく観光化されていない特徴から落ち着いた環境でしっかり勉強したい方に最適。<br />カフェ文化発祥の地としても有名。</p>

				<div class="list">
					<p>MELBOURNEさんはこんな人！？</p>
					<h4>メルボルンのオススメポイント</h4>	
					<ul>
						<li>&bull; カフェやコーヒーが好き</li>
						<li>&bull; おしゃれな海外生活に憧れ</li>
						<li>&bull; EURO行きたかった人</li>
						<li>&bull; ファッション、音楽、アートに興味ある人</li>
					</ul>
				</div>
				
				<div class="new-list">
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/osakablog/総合/4265/" target="_blank">
								<img class="img-responsive" src="images/melbourne/m1.jpg" alt="">
								<p>留学/ワーホリ【メルボルンの魅力】</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/osakablog/総合/4283/" target="_blank">
								<img class="img-responsive" src="images/melbourne/m2.jpg" alt="">
								<p>お洒落な街で住みたいなら・・・</p>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/osakablog/総合/3373/" target="_blank">
							<img class="img-responsive" src="images/melbourne/m3.jpg" alt=""><p>オーストラリア観光記グレートオーシャンロード</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="http://www.whstory.com/498" target="_blank">
							<img class="img-responsive" src="images/melbourne/m4.jpg" alt=""><p>感謝の気持ちが大切なことが身にしみたワーホリ生活。</p>
							</a>
						</div>
					</div>

				</div>
				<div>
					<img src="images/melbourne/mel1_update.png" alt="">
				</div>
				<p style="padding-top: 10px;">■ふーちゃんの海外生活に点数をつけると・・・<br />私の海外生活は１００点中…９９点！</p>
				<p style="padding-bottom: 10px;">■あなたが渡航を決めたきっかけを教えてください<br />大学生活に行き詰まって思い切って海外で働こうと思った。</p>
				<div class="row">
					<div class="col-xs-5 list-img"><img src="images/melbourne/m5.jpg" alt=""></div>
					<div class="col-xs-7 list-img"><p class="nomargin">■ワーホリ/留学での経験は、今のあなたに<br />どんな影響を与えていますか？<br><br>
						<p class="nomargin">
						度胸がついたので、どこでも行けるようになったし<br />挑戦する事が多くなった。<br />当たり前なことが当たり前じゃない、<br />ありがたいことやと気づいて、<br />感謝の気持ちが仏レベルになった。</p>
						</p>
					</div>
				</div>
				<div class="btn01">
					<div class="btn-heart"><a class="btn-format" title="mel"><i class="fa fa-heart-o"></i>いいね！&nbsp;<span id="count"><?php  echo $like['mel']; ?></span>&nbsp;件</a></div>
				</div>
				<div class="box">
					<h3>　他の都市も見る</h3>
					<a href="#syd" title="" style="white-space: nowrap;">シドニー</a>
					<a href="#bne" title="" style="white-space: nowrap;">ブリスベン</a>
					<a href="#ool" title="" style="white-space: nowrap;">ゴールドコースト </a>
					<a href="#per" title="" style="white-space: nowrap;">パース</a>
					<a href="#cns" title="" style="white-space: nowrap;">ケアンズ</a>
				</div>
				<a href="#main" class="fl-right">▲ ステップチャートに戻る</a>
				<img src="images/line-bottom.jpg" alt="">
			</div>
		</div><!-- MELBOURNE -->
		<!-- BRISBANE -->
		<div id="bne" class="brisbane">
			<div>
				<img src="images/brisbane/banner-brisbane.png" alt="">
				<p style="padding-top: 20px;">都会過ぎず田舎過ぎず生活にちょうどいい落ち着いた都市。<br />比較的1年中温暖な気候で日本人の数が少ないのも特徴。<br />セカンドビザ取得を考えている方への情報収集の場としてもオススメ。</p>

				<div class="list">
					<p>BRISBANEさんはこんな人！？</p>
					<h4>ブリスベンのオススメポイント</h4>	
					<ul class="sydney-list">
						<li>&bull; 勉強に集中したい</li>
						<li>&bull; 暖かい場所に行きたい</li>
						<li>&bull; 都会すぎるところは好きじゃない</li>
						<li>&bull; ファームにものちに行きたい</li>
					</ul>
				</div>
				
				<div class="new-list">
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/tokyoblog/総合/6974/" target="_blank">
								<img class="img-responsive" src="images/brisbane/img1.jpg" alt="">
								<p>オーストラリア3大都市 ブリスベンの魅力</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/nagoyablog/総合/3625/" target="_blank">
								<img class="img-responsive" src="images/brisbane/img2.jpg" alt="">
								<p>オーストラリアでファームしたい人！</p>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/nagoyablog/総合/3630/" target="_blank">
								<img class="img-responsive" src="images/brisbane/img3.jpg" alt=""><p>ブリスベンで海に入る？！</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="http://www.whstory.com/586" target="_blank">
								<img class="img-responsive" src="images/brisbane/img4.jpg" alt=""><p>動物園でボランティアできる！</p>
							</a>
						</div>
					</div>

				</div>
				<div>
					<img src="images/brisbane/1_update.png" alt="">
				</div>
				<p style="padding: 10px 0;">体験談：渡航して3カ月がたち、今は生活も落ち着いて、クラスもupper intermediate に上がり、<br />腰を据えて英語と向き合っているところで、speaking は話さないと(自分より英語が話せる人と)伸びないという<br />壁にぶつかっています。実際に習った文法を使って話すというより実践的な部分を埋めるには、学校だけでなく、<br />座学だけでなく、行動が必要だなと思うようになってから、積極的に出会いや交流の場に足を運ぶようになりました。<br />話すというところに着目したきっかけは、仕事も関係しています。<br />今ゴールドコーストでエクササイズのインストラクターの仕事をさせいて頂いていますが、<br />英語に自信がなくてついつい日本語でインストラクションしてしまいます。<br />そんな時スポンサーの方に言われたのが「日本語でやるならあなたはいらないし、日本でやればいい。<br />たかだか1年いるかいないかだったらそのペースじゃ夢は叶わないよ」と喝を言われました。<br />私がオーストラリアに来た理由は仕事に就くことで、そのために語学学校で英語も勉強しています。</p>
				<div class="row">
					<div class="col-xs-6 col-sm-5 list-img"><img src="images/brisbane/img5.jpg" alt=""></div>
					<div class="col-xs-6 col-sm-7 list-img"><p class="nomargin">現地情報：Mirageline Gold Coast Pty. Ltd<br />ゴールドコーストにある<br />日本人のエージェントさんです。<br />ブリスベンだけでもたくさんのエージェントさんが<br />いらっしゃいますが、私はこちらのエージェントさん<br />に渡航以来1番お世話になっています。<br />本当のことしか言わない、<br />筋の通ったエージェントさんです。<br>
					</div>
				</div>
				<div class="btn01">
					<div class="btn-heart"><a class="btn-format" href="" title="bne"><i class="fa fa-heart-o"></i>いいね！&nbsp;<span id="count"><?php  echo $like['bne']; ?></span>&nbsp;件</a></div>
				</div>
				<div class="box">
					<h3>　他の都市も見る</h3>
					<a href="#syd" title="">シドニー</a>
					<a href="#ool" title="">ゴールドコースト </a>
					<a href="#mel" title="">メルボルン</a>
					<a href="#per" title="">パース</a>
					<a href="#cns" title="">ケアンズ</a>
				</div>
				<a href="#main2" class="fl-right">▲ ステップチャートに戻る</a>
				<img src="images/line-bottom.jpg" alt="">
			</div>
		</div><!-- BRISBANE -->
		<!-- GOLD COAST -->
		<div id="ool" class="goldcoast">
			<div>
				<img src="images/goldcoast/banner-goldcoast.png" alt="">
				<p style="padding-top: 20px;">青い海、白い砂浜、サーファーズパラダイスという地名もあるサーフィンの聖地！<br />リゾート気分を味わいながら生活を楽しみたい方はココ。</p>

				<div class="list">
					<p>GOLD COASTさんはこんな人！？</p>
					<h4>ゴールドコーストのオススメポイント</h4>	
					<ul class="sydney-list">
						<li>&bull; AUSといえば海！</li>
						<li>&bull; サーフィンのために渡航する</li>
						<li>&bull; とりあえず楽しみにいきたい</li>
						<li>&bull; 海外が初めてで、日本人がいた方が安心の人</li>
					</ul>
				</div>
				
				<div class="new-list">
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/tokyoblog/総合/6984/" target="_blank">
								<img class="img-responsive" src="images/goldcoast/img1.jpg" alt=""><p>海好きが集まるゴールドコーストの魅力</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/osakablog/総合/3447/" target="_blank">
								<img class="img-responsive" src="images/goldcoast/img2.jpg" alt=""><p>必見！ゴールドコーストは遊園地だらけ!？</p>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/tokyoblog/総合/7309/" target="_blank">
								<img class="img-responsive" src="images/goldcoast/img3.jpg" alt=""><p>ゴールドコーストの海を遊びつくせ！</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="http://www.whstory.com/95" target="_blank">
								<img class="img-responsive" src="images/goldcoast/img4.jpg" alt=""><p>ワーキングホリデーのおかげで、世界を意識しつつ考えられるようになった！</p>
							</a>
						</div>
					</div>

				</div>
				<!-- card 2499 LuuDV delete it -->
				<!--<div>
					<img src="images/goldcoast/1.jpg" alt="">
				</div>
				<p>広大な大地に広がる、とても美しい自然。世界中でもここでしか出会えない動植物。そして、世界遺産として17箇所も登録がある大自然がいっぱいのオーストラ</p>
				<div class="row">
					<div class="col-xs-12 list-img" style="text-align: center;"><img src="images/goldcoast/2.jpg" alt=""></div>
					<div class="col-xs-12 list-img"><p class="nomargin">広大な大地に広がる、とても美しい自然。世界中でもここでしか出会えない動植物。そして、世界遺産として17箇所も登録がある大自然がいっぱいのオーストラてすとの文章です。テストの文章です。</p></div>
				</div>
				<div class="btn01">
					<div class="btn-heart"><a class="btn-format" href="" title="ool"><i class="fa fa-heart-o"></i>いいね！&nbsp;<span id="count"><?php echo $like['ool']; ?></span>&nbsp;件</a></div>
				</div>-->
				<div class="box">
					<h3>　他の都市も見る</h3>
					<a href="#syd" title="">シドニー</a>
					<a href="#bne" title="">ブリスベン </a>
					<a href="#mel" title="">メルボルン</a>
					<a href="#per" title="">パース</a>
					<a href="#cns" title="">ケアンズ</a>
				</div>
				<a href="#main2" class="fl-right">▲ ステップチャートに戻る</a>
				<img src="images/line-bottom.jpg" alt="">
			</div>
		</div><!-- GOLD COAST -->
		<!-- CAIRNS -->
		<div id="cns" class="cairns">
			<div>
				<img src="images/cairns/banner-cainrs.png" alt="">
				<p style="padding-top: 20px;">日本人向けのお店やお仕事などが豊富で英語が苦手な方でも生活しやすい都市。<br />多くの方がイメージされるよりも規模が小さく日本人が多いため、生活の拠点には不向きな面も。</p>

				<div class="list">
					<p>CAIRNSさんはこんな人！？</p>
					<h4>ケアンズのオススメポイント</h4>	
					<ul class="sydney-list">
						<li>&bull; たくさん観光したい</li>
						<li>&bull; リゾート気分</li>
						<li>&bull; スキューバーダイビングのライセンスを活かしたい</li>
					</ul>
				</div>
				
				<div class="new-list">
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/nagoyablog/総合/3512/" target="_blank">
								<img class="img-responsive" src="images/cairns/img1.jpg" alt=""><p>これだけは外せない！絶対するべき3つの事</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/nagoyablog/総合/3569/" target="_blank">
								<img class="img-responsive" src="images/cairns/img2.jpg" alt=""><p>ワーホリ！安く行くなら絶対ケアンズ！</p>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/nagoyablog/総合/3585/" target="_blank">
								<img class="img-responsive" src="images/cairns/img3.jpg" alt=""><p>いろんなお仕事経験するならCairuns！！</p>
							</a>	
						</div>
					</div>

				</div>
				<div>
					<img src="images/cairns/1.jpg" alt="">
				</div>
				<p style="padding: 10px 0;">体験談：ケアンズで勉強したり、仕事をしていて毎日思うことは、<br />ここに住んでいる人が凄く暖かく住みやすいなということです。<br />様々な国から観光客が訪れる大自然に囲まれた町なので外国人に親切でフレンドリー。<br />自分も含め、外国人である（英語以外にも言語が話せ、文化理解がある）ということで仕事を探すことも出来ます。<br />インターンの仕事も本職もどちらも毎日英語の勉強の必要性を感じさせられます。<br />英語ができると入ってくる情報もネットワークもぐんと増えるのでもっともっと英語力を伸ばしたいと日々思っています。<br />さらにケアンズには世界遺産のグレートバリアリーフ、世界最古の熱帯雨林など<br />2つの自然世界遺産がありそれにちなんだツアー、アクティビティなども豊富にあり<br />身近に自然の凄さを感じることができます。</p>
				<div class="row">
					<div class="col-xs-6 col-sm-5 list-img"><img src="images/cairns/2.jpg" alt=""></div>
					<div class="col-xs-6 col-sm-7 list-img"><p class="nomargin">現地情報：ライフスタイルを楽しむのがケアンズで<br />生活する醍醐味です。<br />近隣のビーチでのんびり読書、友人とBBQ、飲みにい<br />ったり、食事会、習い事、Esplanade沿いを散歩。<br />大きな町と比べ、人はのんびりしていますが、町には<br />なんでも揃っているので過ごしやすいし安心です。<br />私はもう4年住んでいますが日本食も作れますし、<br />長く住んでこのリゾート地での生活になれるほど<br />この町が好きになります。</p></div>
				</div>
				<div class="btn01">
					<div class="btn-heart"><a class="btn-format" href="" title="cns"><i class="fa fa-heart-o"></i>いいね！&nbsp;<span id="count"><?php echo $like['cns']; ?></span>&nbsp;件</a></div>
				</div>
				<div class="box">
					<h3>　他の都市も見る</h3>
					<a href="#syd" title="">シドニー</a>
					<a href="#ool" title="">ゴールドコースト </a>
					<a href="#mel" title="">メルボルン</a>
					<a href="#per" title="">パース</a>
					<a href="#bne" title="" style="white-space: nowrap;">ブリスベン</a>
				</div>
				<a href="#main2" class="fl-right">▲ ステップチャートに戻る</a>
				<img src="images/line-bottom.jpg" alt="">
			</div>
		</div><!-- CAIRNS -->
		<!-- PERTH -->
		<div id="per" class="perth">
			<div>
				<img src="images/perth/banner-perth.png" alt="">
				<p style="padding-top: 20px;">海・川・山の自然環境に恵まれ「世界で一番美し都市」にも選ばれたこともあります。<br />ローカルの人々が多く、必然的にお仕事では【語学力】が大切になる都市です。</p>
				<div class="list">
					<p>PERTHさんはこんな人！？</p>
					<h4>パースのオススメポイント</h4>	
					<ul class="sydney-list">
						<li>&bull; 英語力がある人</li>
						<li>&bull; リゾート地でのほほんと暮らしたい人</li>
						<li>&bull; 海近くの街で、日本人はなるべく避けたい</li>
						<li>&bull; 渡航経験があり、自ら行動することが出来る人</li>
					</ul>
				</div>
				
				<div class="new-list">
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/osakablog/総合/4312/" target="_blank">
								<img class="img-responsive" src="images/perth/img1.jpg" alt=""><p>パースを拠点に行ける観光地</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/osakablog/総合/4320/" target="_blank">
								<img class="img-responsive" src="images/perth/img2.jpg" alt=""><p>パースから日帰りで行ける観光地</p>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/osakablog/総合/4191/" target="_blank">
								<img class="img-responsive" src="images/perth/img3.jpg" alt=""><p>パースが永住したいと言われる3つの理由</p>
							</a>
						</div>
						<div class="col-xs-6">
							<a href="https://www.jawhm.or.jp/blog/nagoyablog/総合/3496/" target="_blank">
								<img class="img-responsive" src="images/perth/img4.png" alt=""><p>苦しかった経験も、今では良い思い出！</p>
							</a>
						</div>
					</div>

				</div>
				<div>
					<img src="images/perth/1.jpg" alt="">
				</div>
				<p style="padding: 10px 0;">体験談：オーストラリア人の友だちもいたことから最初はパースへ渡航。<br />現地のストロベリー農園でセカンドワーキングホリデービザを取得。<br />シドニーに移動し、現地の日系企業で約１０ヶ月ドライバーとしてアジアンレストラン、バーにアジアン食材を配達。<br />語学学校に計８ヶ月（２回ともパースで４ヶ月＋４ヶ月）通う。<br />２回目の４ヶ月の時は、FCEコースを受講。結果は落ちてしまいましたが、<br />自分の英語がFCEコースを受ける事ができるレベルまで上がってよかったです。<br />帰国２ヶ月前にオーストラリア国内を旅行。<br />アルバニー、メルボルン、シドニー、ケアンズと南から、東の上の方まで行きました。</p>
				<div class="row">
					<div class="col-xs-6 col-sm-5 list-img"><img src="images/perth/2.jpg" alt=""></div>
					<div class="col-xs-6 col-sm-7 list-img"><p class="nomargin">現地情報：メインストリートも大体30分ほどで歩けて<br />しまうくらい、こじんまりとした都市です。<br />その中でおすすめなのは、なんといっても海。<br />日本とは比べ物にならない位きれいです。<br />また、パースから電車で30分南に行けば、<br />フリーマントルという港町があり、<br />市場や地元のビール工場が<br />運営するレストランでおいしい魚介類を<br />食べながら優雅な時を過ごせます。</p></div>
				</div>
				<div class="btn01">
					<div class="btn-heart"><a class="btn-format" href="" title=""><i class="fa fa-heart-o"></i>いいね！&nbsp;<span id="count"><?php echo $like['cns']; ?></span>&nbsp;件</a></div>
				</div>
				<div class="box">
					<h3>　他の都市も見る</h3>
					<a href="#syd" title="" style="white-space: nowrap;">シドニー</a>
					<a href="#bne" title="" style="white-space: nowrap;">ブリスベン </a>
					<a href="#mel" title="" style="white-space: nowrap;">メルボルン</a>
					<a href="#ool" title="" style="white-space: nowrap;">ゴールドコースト</a>
					<a href="#cns" title="" style="white-space: nowrap;">ケアンズ</a>
				</div>
				<a href="#main" class="fl-right">▲ ステップチャートに戻る</a>
				<img src="images/line-bottom.jpg" alt="">
			</div>
		</div><!-- PERTH -->
	</div>
	
	<!---- POPUP FRAME ----->
	<div id="start" class="popup-content white-popup mfp-hide"> <!-- start -->
		<div id="pop-bottom">
			<!--p>Q.田舎より都会が好き</p>
			<div class="pop-button">
				<button onclick="getpopup(9);" class="btn-no"></button>
				<button onclick="getpopup(2);" class="btn-yes"></button>
			</div-->
			<p>Q.田舎より都会が好き</p>
			<div class="pop-button">
				<button onclick="getpopup(14);" class="btn-no"></button>
				<button onclick="getpopup(2);" class="btn-yes"></button>
			</div>
			
		</div>
		
	</div>
	<!---end FRAME --->
	
	<!--div class="seminar-listing-title-red">まずは無料セミナーへ！<br />ワーキングホリデー＆留学の無料セミナーはこちら！</div-->
	
</div>
	<?php fncMenuFooter($header_obj->footer_type); ?>
	
	
	<script>
		$('.open-popup-link').magnificPopup({
			disableOn:0,
			alignTop: false,
			closeBtnInside: false,
			preloader: false,
			showCloseBtn: false,
			fixedContentPos: true
		});
	
	</script>
	
	<!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	