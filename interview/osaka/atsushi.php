<?php
require_once '../../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='下中　敦史';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協会の各オフィスのご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/counselor-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '日本ワーキング・ホリデー協会カウンセラーインタビュー';

$header_obj->add_js_files='<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"><	
<script type="text/javascript" src="script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="styles.css" />';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>

	  <h2 class="sec-title">カウンセラーインタビュー　下中　敦史</h2>
		<a href="/counselor/counselor.php" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		<section class="mgb50">
		  <h2 class="counselor-osaka">
			<span class="osaka">OSAKA</span>
			大阪オフィス</h2>
			<img src="../../images/counselor/no_image2.jpg" alt="下中　敦史" class="imagesLeft"/>
				<h3 class="counselorName">下中　敦史</h3>
				<span class="nameEnglish">Aiko Higuchi</span>
				<table class="self">
					<tbody>
						<tr class="tB1">
							<th class=" tR1">渡航した国</th>
							<th class="words"></th>
						</tr>
                        <tr class=" tB1">
							<th class=" tR1">出身</th>
							<th class="words"></th>
						</tr>
						<tr class=" tB1">
							<th class=" tR1">使用したビザ</th>
							<th class="words"></th>
						</tr>
						<tr>
							<th class="tR1">座右の銘</th>
							<th class="words"></th>
						</tr>
					</tbody>
				</table>
			<div>
				<ul class="experience">
					<li class="lineB3">下中　敦史さんの海外経験<span class="plane">An experience abroad...</span></li>
					<li class="lineB1"><span class="list1">1</span></li>
					<li class="lineB1"><span class="list2">2</span></li>
					<li class="lineB1"><span class="list3">3</span></li>
					<li class="lineB1"><span class="list4">4</span></li>
					<li class="line"><span class="list5">5</span></li>
				</ul>
			</div>
			<div>
				<h3 class="title_osaka">渡航を決めたきっかけ / その国に決めた理由 / そのビザに決めた理由</h3>	<img src="../../images/counselor/osaka/higuchi2.JPG" alt="下中　敦史" class="imagesLeftMgl20"/>
				<p class="text"></p>
			</div>
			<div>
			  <h3 class="title_osaka">留学・ワーホリ期間中は、どんな生活をしていたか（生活 / 仕事 / 学校 / 友達 / ＨＳ）</h3>
				
				<p class="text"></p>
			</div>
			<div>
				<h3 class="title_osaka">苦労した事、大変だった事、やばかった事、もう二度としたくない事</h3>
				<p class="text"></p>
			</div>
			<div>
				<h3 class="title_osaka">「きっとこれは自分しか体験していない！」といった体験</h3>
				<p class="text">マインドコントロール寸前になった！<br />⇒大袈裟に聞こえると思いますが、閉鎖的な環境で事実上軟禁状態である場合、人は簡単におかしくなれると実感！　　　　
				</p>
			</div>
			<div>
			  <h3 class="title2_osaka">海外でオススメの何か（食べ物 / 観光地 / プラン / 学校 / 仕事 / ライフスタイル）</h3>
			
				<p class="text"></p>
		  </div>
			<div>
			  <h3 class="title2_osaka">ワーホリ・留学での経験は、今のアナタにどのような影響を与えていますか？</h3>
				<p class="text"></p>
                
				<h4 class="title3_osaka">留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</h4>
				<p class="text3"></p>
		  </div>
		<a href="/counselor/counselor.php" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		</section>

<!--
	  <div class="top-move">
		<p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>-->


	  </div>
	</div>
  </div>
  <!-- </div> -->

<?php fncMenuFooter($header_obj->footer_type); ?>


</body>
</html>