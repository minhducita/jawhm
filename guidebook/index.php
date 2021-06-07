<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page = 'ワーキングホリデー・留学ガイドブック';

$header_obj->description_page = '当協会ではこれからワーキングホリデー・留学を考えるみなさまの為に、「ワーキングホリデー・留学ガイドブック」を配布しています。ガイドブックは当協会無料セミナー、また各国際交流センター、大学などで無料で配布しています。ぜひみなさまのご渡航にお役立て下さい！';

$header_obj->keywords_page = 'ワーキングホリデー,ワーホリ,留学,ガイドブック';

$header_obj->fncFacebookMeta_function = true;

if ($header_obj->computer_use() === false && $_SESSION['pc'] != 'on') {
	$header_obj->add_css_files = '<link href="/guidebook/css/style.css" rel="stylesheet" type="text/css" /><link href="/guidebook/css/style-m.css" rel="stylesheet" type="text/css" />';


	$header_obj->add_js_files = '<script src="/wh/js-sp/jquery.jtruncsubstr-1.0rc.js" type="text/javascript"></script><script src="/wh/js-sp/script.js" type="text/javascript"></script>';

} else {
	$header_obj->add_css_files = '<link href="/guidebook/css/style.css" rel="stylesheet" type="text/css" /><link href="/guidebook/css/style-p.css" rel="stylesheet" type="text/css" />';

	$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/guidebook/images/image-main.png" alt="ワーキングホリデー・留学ガイドブック" width="970" height="170" />';
}

$header_obj->fncMenuHead_h1text = 'ワーキングホリデー・留学ガイドブック';

$header_obj->display_header();

?>

	<div id="maincontent">
		<?php echo $header_obj->breadcrumbs(); ?>

		<h2 class="sec-title"><span>ワーキングホリデー・留学ガイドブック</span></h2>
		<div class="sec-contents clearfix mb_none">
			<img class="image-left" id="image-01" src="/guidebook/images/image-01.png" />
			当協会ではこれからワーキングホリデー・留学を考えるみなさまの為に、「ワーキングホリデー・留学ガイドブック」を配布しています。<br />
			<br />
			ガイドブックでは、<br />
			・出発までの準備・流れ<br />
			・各国の魅力、ビザ情報<br />
			・現地でのお仕事・お住まい・全体の予算について<br />
			・語学学校の必要性<br />
			・語学学校のご紹介<br />
			など様々な役立つ情報が盛りだくさんです。<br />
			<br />
			ガイドブックは当協会無料セミナー、また各国際交流センター、大学などで無料で配布しています。<br />
			ぜひみなさまのご渡航にお役立て下さい！<br />
			<br />
			<div class="area-btn-seminar">
				<span class="attention-text-01">ワーキングホリデー・留学ガイドブックがもらえる！</span><br />
				<a href="/seminar/seminar/"><img id="btn-seminar" src="/guidebook/images/btn-seminar.png" alt="無料セミナーはこちら！" /></a>
			</div>
		</div>
		
		<div class="sec-contents clearfix pc_none">
			<p>当協会ではこれからワーキングホリデー・留学を考えるみなさまへ「ワーキングホリデー＆留学ガイドブック」を配布しています。</p>
			<img id="image-02" src="/guidebook/images/image-02.jpg" />
			<p>ガイドブックは当協会無料セミナー、また各国際交流センター、大学などで無料で配布しています。<br><br>
				ぜひ、みなさまのご渡航にお役立てください！</p>
			<ul>
				<li>■ 出発までの準備・流れ</li>
				<li>■ 各国の魅力、ビザ情報</li>
				<li>■ 現地でのお仕事・お住まい・全体の予算について</li>
				<li>■ 語学学校の必要性</li>
				<li>■ 語学学校のご紹介</li>
			</ul>
			<img id="image-03" src="/guidebook/images/image-03.jpg" />
			<div class="area-btn-seminar">
				<span class="attention-text-01">ワーキングホリデー・留学ガイドブックがもらえる！</span><br />
				<a href="/seminar/seminar/"><img id="btn-seminar" src="/guidebook/images/btn-seminar.png" alt="無料セミナーはこちら！" /></a>
			</div>
		</div>

		<h2 class="sec-title"><span>ガイドブック配布場所一覧</span></h2>
		<div class="sec-contents">

			<p class="table-caption"><span>▼</span>北海道・東北</p>
			<table class="table-list-guidebook">
				<tr>
					<th class="th-title th-title-01" style="border-right: 1px solid #fff">配布場所</th><th class="th-title th-title-02">公式サイトURL</th>
				</tr>
        <tr>
					<th class="th-place">公益社団法人　北海道国際交流・協力総合センター</th><td class="td-url"><a href="http://www.hiecc.or.jp/" target="_blank">http://www.hiecc.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">一般財団法人　北海道国際交流センター(HIF)</th><td class="td-url"><a href="http://www.hif.or.jp/" target="_blank">http://www.hif.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人 札幌国際プラザ</th><td class="td-url"><a href="http://www.plaza-sapporo.or.jp/" target="_blank">http://www.plaza-sapporo.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　岩手県国際交流協会</th><td class="td-url"><a href="http://www.iwate-ia.or.jp/" target="_blank">http://www.iwate-ia.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　仙台観光国際交流会　国際化事業部ウェブサイト</th><td class="td-url"><a href="http://www.sira.or.jp/" target="_blank">http://www.sira.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　山形県国際交流協会（AIRY）</th><td class="td-url"><a href="http://www.airyamagata.org/" target="_blank">http://www.airyamagata.org/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　福島県国際交流協会（FIA）</th><td class="td-url"><a href="http://www.worldvillage.org/" target="_blank">http://www.worldvillage.org/</a></td>
				</tr>		
			</table>

			<p class="table-caption"><span>▼</span>関東</p>
			<table class="table-list-guidebook">
				<tr>
					<th class="th-title th-title-01" style="border-right: 1px solid #fff">配布場所</th><th class="th-title th-title-02">公式サイトURL</th>
				</tr>
				<!-- <tr>
					<th class="th-place">川崎市国際交流協会</th><td class="td-url"><a href="http://www.kian.or.jp/kic/infokic.shtml" target="_blank">http://www.kian.or.jp/kic/infokic.shtml</a></td>
				</tr> -->
        <tr>
					<th class="th-place">公益財団法人　ちば国際コンベンションビューロー</th><td class="td-url"><a href="http://www.ccb.or.jp/" target="_blank">http://www.ccb.or.jp/</a></td>
				</tr>
			</table>

			<p class="table-caption"><span>▼</span>北陸・甲信越</p>
			<table class="table-list-guidebook">
				<tr>
					<th class="th-title th-title-01" style="border-right: 1px solid #fff">配布場所</th><th class="th-title th-title-02">公式サイトURL</th>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　山梨県国際交流協会（YIA）</th><td class="td-url"><a href="http://yia.or.jp/wordpress/" target="_blank">http://yia.or.jp/wordpress/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　新潟県国際交流協会</th><td class="td-url"><a href="http://www.niigata-ia.or.jp/" target="_blank">http://www.niigata-ia.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">高岡市国際交流協会</th><td class="td-url"><a href="http://www.senmaike.net/kokusaikoryu/index.htm" target="_blank">http://www.senmaike.net/kokusaikoryu/index.htm</a></td>
				</tr>								
				<tr>
					<th class="th-place">公益財団法人　とやま国際センター</th><td class="td-url"><a href="http://www.tic-toyama.or.jp/" target="_blank">http://www.tic-toyama.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">富山市民国際交流協会</th><td class="td-url"><a href="http://www.tca-toyama.jp/" target="_blank">http://www.tca-toyama.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　石川県国際交流協会（IFIE)</th><td class="td-url"><a href="http://www.ifie.or.jp/index.php" target="_blank">http://www.ifie.or.jp/index.php</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　福井県国際交流協会</th><td class="td-url"><a href="http://www.f-i-a.or.jp/ja/" target="_blank">http://www.f-i-a.or.jp/ja/</a></td>
				</tr>
			</table>

			<p class="table-caption"><span>▼</span>東海</p>
			<table class="table-list-guidebook">
				<tr>
					<th class="th-title th-title-01" style="border-right: 1px solid #fff">配布場所</th><th class="th-title th-title-02">公式サイトURL</th>
				</tr>
        <tr>
					<th class="th-place">静岡市国際交流協会</th><td class="td-url"><a href="http://www.samenet.jp/" target="_blank">http://www.samenet.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　浜松国際交流協会（HICE)</th><td class="td-url"><a href="http://www.hi-hice.jp/index.php" target="_blank">http://www.hi-hice.jp/index.php</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　岐阜県国際交流センター</th><td class="td-url"><a href="http://www.gic.or.jp/" target="_blank">http://www.gic.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">名古屋国際センター</th><td class="td-url"><a href="http://www.nic-nagoya.or.jp/lang.htm" target="_blank">http://www.nic-nagoya.or.jp/lang.htm</a></td>
				</tr>
			</table>

			<p class="table-caption"><span>▼</span>関西</p>
			<table class="table-list-guidebook">
				<tr>
					<th class="th-title th-title-01" style="border-right: 1px solid #fff">配布場所</th><th class="th-title th-title-02">公式サイトURL</th>
				</tr>
        <tr>
					<th class="th-place">公益財団法人 滋賀県国際協会</th><td class="td-url"><a href="http://www.s-i-a.or.jp/" target="_blank">http://www.s-i-a.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　大阪府国際交流財団</th><td class="td-url"><a href="http://www.ofix.or.jp/" target="_blank">http://www.ofix.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　大阪国際交流センター</th><td class="td-url"><a href="http://www.ih-osaka.or.jp/" target="_blank">http://www.ih-osaka.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　京都府国際センター</th><td class="td-url"><a href="http://www.kpic.or.jp/index.html" target="_blank">http://www.kpic.or.jp/index.html</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　京都市国際交流協会</th><td class="td-url"><a href="http://www.kcif.or.jp/" target="_blank">http://www.kcif.or.jp/</a></td>
				</tr>        
        <tr>
					<th class="th-place">公益財団法人　和歌山県国際交流協会（WIXAS）</th><td class="td-url"><a href="http://www.wixas.or.jp/" target="_blank">http://www.wixas.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　兵庫県国際交流協会</th><td class="td-url"><a href="https://www.hyogo-ip.or.jp/" target="_blank">https://www.hyogo-ip.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益社団法人　まちづくり国際交流センター（奈良県）</th><td class="td-url"><a href="http://nara-c.com/" target="_blank">http://nara-c.com/</a></td>
				</tr>
        <tr>
					<th class="th-place">みえ市民活動ボランティアセンター</th><td class="td-url"><a href="https://www.mienpo.net/" target="_blank">https://www.mienpo.net/</a></td>
				</tr>
			</table>

			<p class="table-caption"><span>▼</span>中国・四国</p>
			<table class="table-list-guidebook">
				<tr>
					<th class="th-title th-title-01" style="border-right: 1px solid #fff">配布場所</th><th class="th-title th-title-02">公式サイトURL</th>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　ひろしま国際センター</th><td class="td-url"><a href="http://hiroshima-ic.or.jp/" target="_blank">http://hiroshima-ic.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　広島平和文化センター　国際交流・協力課</th><td class="td-url"><a href="http://www.pcf.city.hiroshima.jp/ircd/" target="_blank">http://www.pcf.city.hiroshima.jp/ircd/</a></td>
				</tr>			
     				<tr>
					<th class="th-place">公益財団法人徳島県国際交流協会（とくしま国際戦略センター）</th><td class="td-url"><a href="http://www.topia.ne.jp/" target="_blank">http://www.topia.ne.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">アイパル香川　公益財団法人　香川県国際交流協会</th><td class="td-url"><a href="http://www.i-pal.or.jp/" target="_blank">http://www.i-pal.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　鳥取県国際交流財団</th><td class="td-url"><a href="http://www.torisakyu.or.jp/ja/" target="_blank">http://www.torisakyu.or.jp/ja/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　高知県国際交流協会</th><td class="td-url"><a href="https://www.kochi-kia.or.jp/" target="_blank">https://www.kochi-kia.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人 しまね国際センター</th><td class="td-url"><a href="https://www.sic-info.org/" target="_blank">https://www.sic-info.org/</a></td>
				</tr>
			</table>

			<p class="table-caption"><span>▼</span>九州</p>
			<table class="table-list-guidebook">
				<tr>
					<th class="th-title th-title-01" style="border-right: 1px solid #fff">配布場所</th><th class="th-title th-title-02">公式サイトURL</th>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　長崎県国際交流協会</th><td class="td-url"><a href="http://www.nia.or.jp/" target="_blank">http://www.nia.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　福岡よかトピア国際交流財団</th><td class="td-url"><a href="http://www.rainbowfia.or.jp/" target="_blank">http://www.rainbowfia.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　福岡県国際交流センター</th><td class="td-url"><a href="http://www.kokusaihiroba.or.jp/" target="_blank">http://www.kokusaihiroba.or.jp/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　佐賀県国際交流協会</th><td class="td-url"><a href="https://www.spira.or.jp/" target="_blank">https://www.spira.or.jp/</a></td>
				</tr>
        <tr>
					<th class="th-place">公益財団法人　鹿児島県国際交流協会</th><td class="td-url"><a href="http://www.synapse.ne.jp/kia/" target="_blank">http://www.synapse.ne.jp/kia/</a></td>
				</tr>
				<tr>
					<th class="th-place">公益財団法人　北九州国際交流協会</th><td class="td-url"><a href="http://www.kitaq-koryu.jp/" target="_blank">http://www.kitaq-koryu.jp/</a></td>
				</tr>				
				<tr>
					<th class="th-place">熊本県国際交流協会</th><td class="td-url"><a href="http://www.kuma-koku.jp/" target="_blank">http://www.kuma-koku.jp/</a></td>
				</tr>
			</table>
			<br />

			<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>


		</div>

	</div>



  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>