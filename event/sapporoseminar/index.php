<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
		'title' => 'sapporo',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～札幌～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/sapporo/sapporotop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～札幌～';

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
	<img src="../../images/event/sapporo/sapporotop.png"/>
	<?php
	}
	?>
	<br/>

	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～札幌～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～札幌～は不定期に開催しています。</p>
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
    <br/>
	<center>
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="45%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="45%"></a></center>
		<!--a href="http://www.jawhm.or.jp/seminar.html"><img src="/images/fair_seminar_off.png" width="40%"></a>　<a href="http://www.jawhm.or.jp/ja/4377"><img src="/images/fair_log_off.png"  width="40%"></a><br/-->
	</center>
	</p>
	<br/>

<?php/*
	<h2 class="sec-title" style="margin-bottom: 30px;">タイトル　40文字以内</h2>
		<p style="margin-left: 40px;">
		本文　最大700文字目安<br/>
		</p>

	<h2 class="sec-title" style="margin-bottom: 30px;">タイトル　40文字以内</h2>
		<p style="margin-left: 40px;">
		本文　最大700文字目安<br/>
		</p>

	<h2 class="sec-title" style="margin-bottom: 30px;">タイトル　40文字以内</h2>
		<p style="margin-left: 40px;">
		本文　最大700文字目安<br/>
		</p>
*/?>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～札幌～　内容</h2>
	　<br/>
				<?php $count = $sm->show(); ?>

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
	<br/>
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
			<br/>
		</p>
<center><img src="../../images/event/seminar_01.jpg" width="25%">　<img src="../../images/event/seminar_03.jpg" width="25%">　<img src="../../images/event/seminar_02.jpg" width="25%"></center>
						        <div class="chiiki-box">
　<br/>
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
        <br/>
        <br/>
		</p>
<br/>

<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～札幌～　セミナー会場詳細</h2>
<div id="step11box">
<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>北農健保会館</strong></font></span><br/>
北海道札幌市中央区北4条西7丁目1番4<br/>
JR札幌駅より徒歩 5分
&nbsp;<br/>
アクセスマップ　：　<br/>
<a href="http://www.hokunoukenpo.or.jp/kaikan/access.html" target="_blank">http://www.hokunoukenpo.or.jp/kaikan/access.html</a><br/>
&nbsp;<br/>
<div style="text-align:center">

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1457.4205653852841!2d141.3455468601193!3d43.06580877485559!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0b299f9c0e784f%3A0xf24b056e5ce365e4!2z5YyX6L6y5YGl5L-d5Lya6aSo!5e0!3m2!1sja!2sjp!4v1428460381847" frameborder="0" style="border:0" width="90%" height="300" frameborder="0"></iframe>

</div>
</p>
</div>

<br/>
<br/>


	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～札幌～　過去に開催したセミナー</h2>
		<p>
		<strong>過去開催日程</strong><br/>
		2011年8月21日（日）北方圏センター札幌国際センター<br/>
		2012年5月19日（土）カタオカビル<br/>
		2014年7月19日 (土) カタオカビル<br/>
		2014年12月14日 (日) 札幌北口カンファレンスプラザ<br/>
		<br/><br/>
		</p>
	<p>

	<strong>【2014年7月19日(土) 札幌セミナー参加者からの声】</strong><br/>

	<font color="#4d85ff" size="3">●</font> 初めて聞くことが多く、勉強になりました。ビザの種類選びを今後考えて、色々決めていきたい<br/>
	<font color="#4d85ff" size="3">●</font> 不安点が詳しく聞けて良かったです<br/>
	<font color="#4d85ff" size="3">●</font> 経験を踏まえた説明でわかりやすかったです。<br/>
	<font color="#4d85ff" size="3">●</font> ワーホリの心構え　家さがし　さまざまな情報が聞けて役に立ちました<br/>
	<font color="#4d85ff" size="3">●</font> もっと札幌でもセミナーをしてほしい<br/>

	<br/>

		<strong>その他セミナー参加者からの声</strong><br/>

		首都圏でばかり開催されていると思っていたワーキングホリデー協会の出張セミナーが札幌で行われると聞いて、すぐに予約をして駆けつけました。
	ワーホリでは一カ国につき一年しかいられないので、ワーホリ生活で後悔したくないという想いでしっかりと講義を聞いてきました。
	「現地での生活がそう簡単にいくと考えるのは甘い話で、自分で努力して語学力と仕事を獲得しなければならない」という話はもっともで、遊びに行くようないい加減な気持ちを持っていた自分にはいい薬になったと思っています。<br/>
	面倒に思える法律や制度もひとつひとつ落ち着いて対処すればいいということも分かりましたし、やはり協会のセミナーはためになると思いました。今後は準備を万全にしてワーホリの本番に備えたいと思います。<br/>
	<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（24）/カナダ、オーストラリア希望</small></font><br></div>
		</p>
		<p>
		ワーキングホリデーの初心者ではない私でも、ワーキングホリデー協会が札幌で出張セミナーを開いてくれるとあれば行かない手はないと思い参加しました。
		会場は熱気があって誰もがワーホリを勉強の手段として捉えていることが伝わってきました。
		「もう少し肩の力を抜いて大丈夫だよ」と思いましたが、自分のも初参加の時はそうだったなと以前のことを思い出すこともありました。
		講師の方の話は自分の体験にもとづいた実際的なものであり、行った国によっていろいろ違うことがあるのだと参考になりました。
		ワーホリが何回目であっても自分にとってその国に行くのが初めてであるのは今後も変わりません。
		自分の体験が全てだと思わないように気を引き締められたので、ワーホリの出張セミナーに参加してよかったなと思いました。<br/>
		<div style="text-align:right;"><font color="#626262"><small>女性（21）/オーストラリア希望</small></font><br></div>
		</p>
<br/>
<h2 class="sec-title">留学＆ワーキングホリデーセミナー～札幌～　お問い合わせに関して</h2>
	&nbsp;<br/>
	<p>
	ご質問等、お問い合わせはこちらのメールアドレスまでご連絡下さいませ。<br/>
<br/>
	info@jawhm.or.jp<br/>
<br/>
	【注意】お電話でのお問い合わせは受け付けておりませんのでご了承ください。<br/>
<br/>
</p>
<br/>
<br/>
	<div style="height:30px;">&nbsp;</div>


	</div>
	</div>
</div>
	</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>