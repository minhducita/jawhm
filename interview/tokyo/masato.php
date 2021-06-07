<?php
require_once '../../include/header.php';

include '../../seminar_module/seminar_module.php';

$sm = new SeminarModule($config);

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='高梨　将人';
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

	  <h2 class="sec-title">カウンセラー紹介　高梨　将人</h2>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>
		<section class="mgb50">
			<h2 class="counselor-tokyo2">
			<span class="tokyo2">TOKYO</span>
			新宿オフィス</h2>
			<img src="../../images/counselor/tokyo/masato_01.jpg" alt="高梨　将人" class="imagesLeft"/>
				<h3 class="counselorName">高梨　将人</h3>
				<span class="nameEnglish">Masato Takanashi</span>
				<table class="self">
					<tbody>
						<tr class="tB1">
							<th class=" tR1">主な滞在国</th>
							<th class="words">カナダ<br />ニュージーランド</th>
						</tr>
						<tr class=" tB1">
							<th class=" tR1">出身</th>
							<th class="words"></th>
						</tr>
						<tr class="tB1">
							<th class="tR1">使用したビザ</th>
							<th class="words">観光ビザ<br />ワーキングホリデー</th>
						</tr>
						<tr>
							<th class="tR1">座右の銘</th>
							<th class="words">日々是前進！</th>
						</tr>
					</tbody>
				</table>
			<div>
				<ul class="experience">
					<li class="lineB3"><b>マサトさんの海外経験</b><span class="plane">An experience abroad...</span></li>
					<li class="lineB1"><span class="list1">1</span>大学を卒業後、お金を貯めてバンクーバーへ</li>
					<li class="lineB1"><span class="list2">2</span>まずは3ヶ月学校＆ホームステイ</li>
					<li class="lineB1"><span class="list3">3</span>仕事を探しにバンフへ移動</li>
					<li class="lineB1"><span class="list4">4</span>半年間バンフで貯金＆会話力UP</li>
					<li class="lineB1"><span class="list4">5</span>貯めたお金でカルガリー・トロントを旅行</li>
					<li class="lineB1"><span class="list4">6</span>ホームタウン・バンクーバーへ帰省</li>
					<li class="lineB1"><span class="list4">7</span>残り数カ月をもう一度学校に！最後の仕上げ</li>
                   			<li class="line"><span class="list5">8</span>帰国。　営業職をいくつか経て、現在の業界に飛び込む</li>
                  
				</ul>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>あなたが海外へ行こうと思ったきっかけは？カナダを選んだ理由は？</b></font></h3>
				<p class="text">高校時代に経験したニュージーランドの短期交換留学がキッカケで海外に興味を持ちました。　カナダに決めたのは、学校に通える期間が大きかったです。ニュージーランドと迷った結果、知らない国を見てみたいとの気持ちが優り、当時の英語力が低かったこともあって、バンクーバーに決まりました。　<br /><br />
					ワーキングホリデービザに決めた理由は資金面ですね。予算が少なめだったので自然と資金調達のしやすいワーキングホリデーになりました。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>カナダではどんな生活をされていましたか？</b></font></h3>
				<p class="text">現地の語学学校に3ヶ月通った後、バンフという観光地のホテルで半年間ハウスキーパーとして働きました。この地を選んだ理由としては、都市の日本人の多さに甘え無いように、英語環境から整えてしまいたかったと言うのが大きかったです。勿論、資金調達が必要だったこともありますが、カナダならではの雄大な自然環境の中で働けるサマーホテルは当時の私にはかなり魅力的でした。<br /><br />
					実際、英語環境は相当な物で、日本人は私を含め4人だけでした。その他50名程いた従業員は全てネイティブ。毎日英語を話す環境は厳しくもありましたが充実はしていました。住み込みの為、お金もあまりかからずかなりの金額を稼げたと思います。仕事を終えた後は、トロント方面を旅行しつつ、ホームタウンのバンクーバーへ戻りました。	<br /><br />
					最後の数カ月をカフェで働きながら、稼いだお金でもう一度学校へ。自身の英語への最終的なブラッシュアップをかけました。帰国までには自身でも納得出来る1年間の経験と、英語力を習得することが出来たと思います。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>カナダでの生活で、苦労したことは何ですか？</b></font></h3>
				<p class="text">私は留学エージェントを使わずに、1人でビザと航空券だけを取得して無計画で渡航しました。結果何をどうしたらいいか全く分からなくなり、最初の数日で本気で帰ろうと思いました。行き場所のない海外はとっても辛かったです。無計画だけは皆さん絶対にやめて下さい。</p>
			</div>
			<div>
				<h3 class="title"><font color="#0062b3"><b>カナダで、あなただけの特別な体験はありましたか？</b></font></h3>
				<p class="text">ロッキー山脈観光地の中心にあるバンフと呼ばれる街にいた時、湖に1人で従業員用のボートをだして、お酒を飲みながら昼寝をしたこと。</p>
			</div>
			<div>
				<h3 class="title2"><font color="#0062b3"><b>カナダでのライフスタイルはどうでしたか？</b></font></h3>
			<p class="text">やはり日本とは違ったその国々特有の空気感があります。カナダは凄くスローだった。そしてそれがすごく良かった。お勧めの場所はバンフ！これぞカナダ!といった風景が堪能できます。</p>
				</div>
			<div>
				<h3 class="title2"><font color="#0062b3"><b>ワーホリ・留学での経験は、今のアナタにどのような影響を与えていますか？</b></font></h3>			
				<p class="text">みなさんの留学・ワーホリに関わることができる今の仕事に出会えました。ありがとうございます。</p>
				<h3 class="title2"><font color="#0062b3"><b>留学・ワーホリを悩んでいるあなたに、カウンセラーから一言！</b></font></h3>
				<p class="text3">行きたければ行けばいいと思いますよ。　無責任に聞こえるかもしれませんが、自分の気持ちが全てです。　まず決断すること！そしてその決断に責任を持つこと！</p>
				</div>
		<a href="/interview/" class="shirushi"><span class="mgr10">&lt;</span>一覧へ戻る</a>

			<center><a href="http://www.jawhm.or.jp/blog/search/tag/?tag=%E3%82%AB%E3%82%A6%E3%83%B3%E3%82%BB%E3%83%A9%E3%83%BC%EF%BC%9A%E9%AB%98%E6%A2%A8%E3%80%80%E5%B0%86%E4%BA%BA" target="blank"><span class="seminor">カウンセラーが書いたブログ記事はこちらから！</span></a></center>

		  <h2 class="sec-title">セミナー情報</h2>

	  		<table>
				<tr>
					<td><p class="text01"><b><font size="3"><center>マサトさんが担当する体験談セミナーに参加しよう！</center></td>
				</tr>
				<tr>
					<td><?php $config = array( 'view_mode' => 'list' ,'list' => array('detail_open' => 'off', count_field_active => 'none','backcolor' => '#0062b3', title => '休学ワーホリ！カナダ丸ごと知っ得情報！') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show(); ?></td>
				</tr>
			</table>
		<br />
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