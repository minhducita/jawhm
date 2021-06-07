<?php
require_once '../../include/header.php';

include '../../seminar_module/seminar_module.php';

$sm = new SeminarModule($config);

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='樋口 愛子';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協会の各オフィスのご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/counselor-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '日本ワーキング・ホリデー協会カウンセラー紹介';

$header_obj->add_js_files='<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"><	
<script type="text/javascript" src="script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="styles.css" />';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>

	  <h2 class="sec-title">カウンセラー紹介　樋口 愛子</h2>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		<section class="mgb50">
		  <h2 class="counselor-osaka">
			<span class="osaka">OSAKA</span>
			大阪オフィス</h2>
			<img src="../../images/counselor/osaka/higuchi_sam2.JPG" alt="樋口 愛子" class="imagesLeft"/>
				<h3 class="counselorName">樋口 愛子</h3>
				<span class="nameEnglish">Aiko Higuchi</span>
				<table class="self">
					<tbody>
						<tr class="tB1">
							<th class=" tR1">渡航した国</th>
							<th class="words">ニュージーランド<br />オーストラリア</th>
						</tr>
                        <tr class=" tB1">
							<th class=" tR1">出身</th>
							<th class="words">大阪府</th>
						</tr>
						<tr class=" tB1">
							<th class=" tR1">使用したビザ</th>
							<th class="words">学生ビザ<br />ワーキングホリデー</th>
						</tr>
						<tr>
							<th class="tR1">座右の銘</th>
							<th class="words">良くも悪くも自分次第</th>
						</tr>
					</tbody>
				</table>
			<div>
				<ul class="experience">
					<li class="lineB3">アイコさんの海外経験<span class="plane">An experience abroad...</span></li>
					<li class="lineB1"><span class="list1">1</span>オーペアをするためにニュージーランドへ。</li>
					<li class="lineB1"><span class="list2">2</span>老人ホームボランティアなどを体験したが、ファミリーの都合でオーペアはできなくなる。。</li>
					<li class="lineB1"><span class="list3">3</span>ホームステイしながらニュ―ジーランドの語学学校に通う。</li>
					<li class="lineB1"><span class="list4">4</span>卒業後、オーペアがスタート。英語ができず子供も苦手だったので、毎日悪戦苦闘していた。</li>
			                <li class="lineB1"><span class="list4">5</span>アルバイトをしながらお金を貯め、再度語学学校へ。</li>
			                <li class="lineB1"><span class="list4">6</span>ニュージーランド縦断旅行の後日本に帰国。</li>
			                <li class="lineB1"><span class="list4">7</span>日本で就職し、お金を貯めて今度はオーストラリアへワーホリに！</li>
			                <li class="lineB1"><span class="list4">8</span>語学学校で勉強した後、レストラン、日本語教師アシスタントボランティアなどを経験。</li>
			                <li class="lineB1"><span class="list4">9</span>セカンドワーホリを取得する為にファームを転々とする。</li>
			                <li class="lineB1"><span class="list4">10</span>セカンドワーホリ取得後もアルバイトをしながら生活。お金が貯まったので、学生ビザに切り替え滞在延長。</li>
					<li class="line"><span class="list5">11</span>帰国後、ワーホリの経験を活かして今の業界に就職。</li>
				</ul>
			</div>
			<div>
				<h3 class="title_osaka"><font color="#f66f92"><b>アナタが渡航を決めたきっかけを教えてください。</font></b></h3>
				<img src="../../images/counselor/osaka/higuchi2.JPG" alt="樋口 愛子" class="imagesLeftMgl20"/>
				<p class="textMgl">①自分の事をだれも知らない場所に行きたくなった。一回自分に係る人から離れてみたくなったから。ニュージーランドに決めた理由は、物価の安い国だと聞いていたから。ビザも安くいけると勧められ、その時はワーホリじゃないと行けないと聞いていたのでニュージーランドへワーホリに。<br /><br />
						②ニュージーランドへのワーホリでたくさんの事を学び、さらにそれらを深めたい、次回こそは納得のいくワーホリにしたいと感じ、オーストラリアに行くことを決意。ワーホリにした理由は、当時はオーストラリアのビザが一番取得しやすかったことと、ワーホリ以外の渡航方法を知らなかったのも理由です。
				</p>
			</div>
			<div>
			  <h3 class="title_osaka"><font color="#f66f92"><b>海外ではどんな生活をしていましたか？</font></b></h3>
				<p class="text">ニュージーランドとオーストラリア、それぞれ生活は若干ことなりますが、大体は働いていました。<br /><br />
						ニュージーランドでは知らないことが多過ぎ＋自分の事すら自分で決められないような子だったので、何事にも『どうしよう…』としか言ってなかったです。しかしこのままじゃいけないと自分の中でキャラ設定をし、極度の人見知りの性格を『社交的な人見知り』で徐々に切り拓いていきました。<br /><br />
						この時『何事も自分次第』と再認識し、老人ホームボランティア、語学学校、オーペア、バイト等を経験。そして再びオーストラリアへとワーホリで再渡航。ニュージーランドでの経験を活かし、改めて語学学校、ローカルでのバイト（イタリアンレストラン2件、ハイランクホテル、デパートのフードコート）、日本語教師アシスタントボランティア、ファーム、ラウンドとやれそうなことは何でもチャレンジしました。時には家も仕事もない生活もし、テントで生活したり、ファームで住み込みしたり、またスリや空き巣の被害にも。。。(笑)　<br /><br />
						最終的には現地のカレッジに編入し、ITを学びました。</p>
			</div>
			<div>
				<h3 class="title_osaka"><font color="#f66f92"><b>苦労した事、大変だった事、やばかった事、もう二度としたくない事を教えてください！</font></b></h3>
				<p class="text">■苦労したこと：英語！まったくわからなかったので、どこに行くにも一苦労！<br />銀行口座開設、公共交通機関利用時等。オーストラリア時代ではお仕事探しにも一苦労！！電話で必死になって伝えた。<br /><br />■大変だった事：いかにして子供を20時に寝かしつけるか。ニュージーランドは20時半まで明るいです。<br />オーストラリア時代ではお仕事探し。そう簡単にはみつからないです。<br /><br />■ヤバかった事：雨の山道下り坂で車の操縦が効かなくなった時。Au Pairでお留守番中に空き巣に入られた時。<br /><br />■もう二度としたくない事：ステップワゴンで4人で寝泊まり。ファームでの雑草抜きと種植えのお仕事。</p>
			</div>
			<div>
				<h3 class="title_osaka"><font color="#f66f92"><b>「きっとこれは自分しか験していない！」といった体験はありましたか？</font></b></h3>
				<p class="text">マインドコントロール寸前になったこと！大袈裟に聞こえると思いますが、閉鎖的な環境で事実上軟禁状態である場合、人は簡単におかしくなれると実感！</p>
			</div>
			<div>
			  <h3 class="title2_osaka"><font color="#f66f92"><b>海外でのオススメを教えてください。</font></b></h3>
			
				<p class="text">■食べ物：カンガルー、ベジマイト、タイヌードル、ココナッツライスなど、日本では馴染みのない食べ物でも、正しい食べ方を習うとさらにおいしくなる！<br /><br />
				  		■観光地：ハットリバー王国<br /><br />■プラン：１ヶ国目は心から愛おしく、２ヶ国目は充実する。<br />なので『学生ビザ⇒ワーホリビザ』がオススメです！<br /><br />
						■学校：値段重視ではなく、本当に自分が通いたいと思える学校！<br /><br />■仕事：最初はジャパレスでも構わない。学べることは必ずある。でも日本で経験できないファームでのお仕事はオススメです！<br /><br />■ライフスタイル：一日のどこかで必ず完全な英語環境があること！（例：職場、学校、お住まい等）
			  </p>
		  </div>
			<div>
			  <h3 class="title2_osaka"><font color="#f66f92"><b>海外での経験は、今のアナタにどのような影響を与えていますか？</font></b></h3>
				<img src="../../images/counselor/osaka/higuchi.JPG" alt="樋口 愛子" class="imagesRight"/>
				<p class="textMgr">『生き方』『在り方』『考え方』すべて。<br />
				  あの頃の経験がなければ今は語れないと思う。<br /><br />何事にも意味があり、自分次第で良くも悪くもなるので、どんなことでも原則前向きにとらえようとするようになった。<br /><br />いろんな視点から物事が見れるようになったような気がします。<br /><br />
			  </p>

				<h3 class="title2_osaka"><font color="#f66f92"><b>留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</font></b></h3>
				<p class="text3">『迷う』と言う事は、『やりたい！』けども『踏ん切りがつかない』とか『最初の一歩』が出ない場合が多いです。<br /><br />なので迷ったら勇気を持って一歩踏み出しましょう！<br />大きな壁にぶつかったとしても、『やらなかった場合の後悔』よりも爽快だから。
				</p>
		  </div>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>

			<center><a href="http://www.jawhm.or.jp/blog/search/tag/?tag=%E3%82%AB%E3%82%A6%E3%83%B3%E3%82%BB%E3%83%A9%E3%83%BC%EF%BC%9Aaiko-higuchi" target="blank"><span class="seminor">カウンセラーが書いたブログ記事はこちらから！</span></a></center>

		  <h2 class="sec-title">セミナー情報</h2>

	  		<table>
				<tr>
					<td><p class="text01"><b><font size="3"><center>このカウンセラーが担当する体験談セミナーに参加しよう！</center></td>
				</tr>
				<tr>
					<td><?php  $config = array( 'view_mode' => 'list' ,'list' => array('multi_use' => 'on','detail_open' => 'off', count_field_active => 'none','backcolor' => '#f66f92', title => 'ラウンド','place_default' => 'osaka') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show();  ?></td>
				</tr>
			</table>

		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
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