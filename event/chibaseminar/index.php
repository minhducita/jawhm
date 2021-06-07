<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'chiba',
		'past_view' => 'off',
		'count_field_active' => '',
		'place_default' => '',
	)
);
$sm = new SeminarModule($config);

require_once '../../include/header.php';
//require_once '/seminar/include/kouen_function.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='留学＆ワーキングホリデーセミナー～千葉～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/chiba/chibatop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～千葉～';

$header_obj->add_js_files = '<script type="text/javascript" src="/js/linkboxes.js"></script>';
$header_obj->add_css_files = '<style>
a.steps	{
	color:	red;
	font-size: 16pt;
	text-decoration: none;
	border-bottom: 2px dotted navy;
	padding-bottom: 5px;
	margin-bottom: 10px;
}


#step11box {
	width: 680px;
	margin-left: 15px;
	margin-bottom: 10px;
	background-repeat: no-repeat;
	padding-top: 5px;
	padding-left: 20px;
	clear: both;
}

</style>
' . $sm->get_add_style();
$header_obj->add_css_files = $sm->get_add_css();
$header_obj->add_js_files = $sm->get_add_js();

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>

	<div style="padding: 5px;">

	<?php
		if($header_obj->computer_use() || $_SESSION['pc'] == 'on'){
			//PCの場合
	?>
	<?php
	}else{
			//SPの場合
	?>
	<img src="../../images/event/chiba/chibatop.png"/>
	<?php
	}
	?>

	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～千葉～　概要</h2>
	<p style="margin-left: 15px;">
	<p>留学＆ワーキングホリデーセミナー～千葉～は不定期に開催しています。</p>
	<br/>
				        <div class="chiiki-box">
			<?php $count = $sm->show(); ?>
			<!--
            <span class="chiiki<?php if($header_obj->computer_use()) echo' openlist'; ?>" id="pgkouen">
                >> この講演会のスケジュール・ご予約はこちら
            </span>
            <div class="list">
				<?php
					//$data = get_list('pgkouen');
					//display_list($data);
				?>
            </div>
             -->
        </div>

	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="40%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="40%"></a></center>

<br/>

	<h2 class="sec-title" style="margin-bottom: 30px; margin-top: 30px;">留学＆ワーキングホリデーセミナー～千葉～　内容</h2>
		
	<?php
		if($header_obj->computer_use() || $_SESSION['pc'] == 'on'){
			//PCの場合
	?>
			<p style="margin-left: 40px;">
		<div class="navy-dotted" >
			<center>
			<small>
			<br/>
			ワーキングホリデーの魅力 <font color="cccccc">／</font> 後悔しないワーキングホリデーのために <font color="cccccc">／</font> ビザ取得の注意点<br/>
			各国の魅力 <font color="cccccc">／</font> 語学の習得法 <font color="cccccc">／</font> 語学学校の案内 <font color="cccccc">／</font> 仕事の見つけ方・予算・ワーホリ計画の仕方<br/>
			帰国後の就職に生かす方法 <font color="cccccc">／</font> 体験談 <font color="cccccc">／</font> ワーキングホリデー協会でできること　・・・・<br/>
			<br/>
			</small>
			</center>
		</div>
		</p>
	<?php
	}else{
			//SPの場合
	?>
	<ul class="list-disc">
			<li>ワーキングホリデーの魅力</li>
			<li>後悔しないワーキングホリデーのために</li>
			<li>ビザ取得の注意点</li>
			<li>各国の魅力</li>
			<li>語学の習得法</li>
			<li>語学学校の案内</li>
			<li>仕事の見つけ方・予算・ワーホリ計画の仕方</li>
			<li>帰国後の就職に生かす方法</li>
			<li>体験談</li>
			<li>ワーキングホリデー協会でできること　・・・・</li><br/>
	</ul>
	<?php
	}
	?>
		<p>
			■初心者向けセミナー（英語圏）<br/>
			<br/>
			≪内容≫<br/>
			国の魅力・現地のこと丸分かりセミナー。<br/>
			気になることNo.1のビザの内容や語学学校の必要性<br/>
			失敗しない渡航準備・海外生活の為のお話。<br/>
			<br/>

<center><img src="../../images/event/seminar_01.jpg" width="25%">　<img src="../../images/event/seminar_03.jpg" width="25%">　<img src="../../images/event/seminar_02.jpg" width="25%"></center>
		<div class="chiiki-box">
			<?php $count = $sm->show(); ?>
			<!--
            <span class="chiiki<?php if($header_obj->computer_use()) echo' openlist'; ?>" id="pgkouen">
                >> この講演会のスケジュール・ご予約はこちら
            </span>
            <div class="list">
				<?php
					//$data = get_list('pgkouen');
					//display_list($data);
				?>
            </div>
             -->
        </div>
		</p>
<br/>

<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～千葉～　セミナー会場詳細</h2>
<div id="step11box">
			<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
	
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>千葉商工会議所</strong></font></span><br/>
千葉県千葉市中央区中央2-5-1 千葉中央ツインビル2号館<br/>
ＪＲ千葉駅より　徒歩約１０分<br/>
京成千葉中央駅より　徒歩約８分<br/>
千葉都市モノレール葭川公園駅より　徒歩約３分<br/>
&nbsp;<br/>
アクセスマップ　：　<a href="http://www.chiba-cci.or.jp/general.php?cms_id=0" target="_blank">http://www.chiba-cci.or.jp/general.php?cms_id=0</a><br/>
&nbsp;<br/>
<div style="text-align:center">


<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3243.730292724564!2d140.121983!3d35.60971899999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x602284ca7a7c1835%3A0xd7751171f3b9202!2z5Y2D6JGJ5ZWG5bel5Lya6K2w5omA!5e0!3m2!1sja!2sjp!4v1403587390013" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>


	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～千葉～　過去に開催したセミナー</h2>
	<p>
	<strong>2014年8月2日(土)千葉商工会議所にて開催致しました。</strong><br/>
	留学＆ワーキングホリデーセミナー～千葉～にたくさんのご参加をありがとうございました。<br/>
	<br/>
	<strong>【8月2日セミナー参加者からの声】</strong><br/>
	<br/>
	<font color="#82c941" size="4">●</font> 各国の比較があったので自分にあった国を決める参考になりました。<br/>
	これからどうするか、まずセミナーに行ってみて今後についてよく考えたいと思います。（26歳 女性　会社員）<br/>
	<br/>
	<font color="#82c941" size="4">●</font> とてもパワーポイントやパンフがわかりやすくてよかったです。気になる事も細かく書いてあったり説明してくださったので助かりました。（28歳 女性　会社員）<br/>
	<br/>
	<font color="#82c941" size="4">●</font> ワーホリやその他ビザの大まかな内容を知る事ができてよかった（21歳 男性 大学生）<br/>
	<br/>	<br/>
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="40%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="40%"></a></center>
	<br/>
	</p>

		<p>
		<strong>過去開催日程</strong><br/>
		2011年8月27日（土）	千葉市男女共同参画センター<br/>
		2012年5月1日（火）	船橋市勤労市民センター<br/><br/><br/>
		</p>
		<p>
	<strong>セミナー参加者からの声</strong><br/>
	8月27日に行われた出張セミナーに軽い気持ちで参加してみました。<br/>
	私は「絶対にワーホリに行きたい」という気持ちはなく、興味を持っている程度だったのですが今は参加してよかったと思っています。
	「一ヶ国につき滞在できるのは１年間だけだが、オーストラリアには２年間いられる」「まっとうな語学学校を選び積極的に使えば語学力は向上する」「ビザなどの申請はきちんと行えば難しいことはない」
	このような基本情報を知ることができ、漠然と憧れていた海外での生活が具体的に分かったことが嬉しかったです。<br/>
	何となく海外に憧れている私にも協会の人は丁寧に対応してくれました。<br/>
	少しでもワーキングホリデーに興味があれば出張セミナーに参加してみるべきだと思います。<br/>
	</p>
	<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（25）/オーストラリア・ニュージーランド希望</small></font><br></div>

	<p>
	行こうと思えば都内にも行けるけど近い場所に来てくれるのは嬉しいので、船橋で行われた出張セミナーに行ってみました。<br/>
	会場では豊富な資料とともに基本的な情報が丁寧に説明されました。<br/>
	せっかく参加するのだから私は積極的に質問をしようと思い、「美味い料理と酒は？」「観光には行くべきか？」「日本の暮らしとどちらがいいか？」などの少し答えにくいことを訊いてしまいました。
	講師の方はスタッフの人と話しながらそのひとつひとつにきちんと答えてくれました。
	「いくつもの都市で暮らすことが勉強になる」というような答えでしたが、細かい体験談を交えてくれてありがたかったです。
	今度は自分がワーホリに行って体験談を語る番だと思っています。<br/>
	</p>
	<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（20）/韓国・香港希望</small></font><br></div>

<h2 class="sec-title">留学＆ワーキングホリデーセミナー～千葉～　お問い合わせに関して</h2>
	&nbsp;<br/>
	<p>
	ご質問等、お問い合わせはこちらのメールアドレスまでご連絡下さいませ。<br/>
<br/>
	info@jawhm.or.jp<br/>
<br/>	
	【注意】お電話でのお問い合わせは受け付けておりませんのでご了承ください。<br/>
<br/>
	<div style="height:30px;">&nbsp;</div>
</div>
	</div>
	</div>

	</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>