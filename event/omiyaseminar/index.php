<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'omiya',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～大宮～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/omiya/omiyatop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～大宮～';

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
	<img src="../../images/event/omiya/omiyatop.png"/>
	<?php
	}
	?>

	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～大宮～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～大宮～は定期的に開催しています。</p>
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
             <br/>
             <br/>
             	<center>
		<!--a href="http://www.jawhm.or.jp/seminar.html"><img src="/images/fair_seminar_off.png" width="40%"></a>　<a href="http://www.jawhm.or.jp/ja/4377"><img src="/images/fair_log_off.png"  width="40%"></a--><br/>
	</center>
	</p>
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～大宮～　内容</h2>
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
		<p style="margin-left: 40px;">
			■初心者向けセミナー（英語圏）<br/>
<br/>
			≪内容≫<br/>
			国の魅力・現地のこと丸分かりセミナー。<br/>
			気になることNo.1のビザの内容や語学学校の必要性<br/>
			失敗しない渡航準備・海外生活の為のお話。<br/>
<br/>
<br/>
<center><img src="../../images/event/seminar_01.jpg" width="25%">　<img src="../../images/event/seminar_03.jpg" width="25%">　<img src="../../images/event/seminar_02.jpg" width="25%"></center>
<?php $count = $sm->show(); ?>
		<br/>			
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="45%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="45%"></a></center>
		<br/>
		<br/>
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


<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～大宮～　セミナー会場詳細</h2>
<div id="step11box">
		<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>

<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>大宮ソニックシティ</strong></font></span><br/>
埼玉県さいたま市大宮区桜木町1-7-5　ソニックシティビル5F<br/>
西口から歩行者デッキにて直結3分
&nbsp;<br/>
アクセスマップ　：　<a href="http://www.sonic-city.or.jp/modules/access/" target="_blank">http://www.sonic-city.or.jp/modules/access/</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d3231.69322080713!2d139.6196245!3d35.905528499999996!3m2!1i1024!2i768!4f13.1!2m1!1z5aSn5a6u44K944OL44OD44Kv44K344OG44Kj!5e0!3m2!1sja!2sjp!4v1399007949439" width="400" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～大宮～　過去に開催したセミナー</h2>
		<p>
		<strong>過去開催日程</strong><br/>
		月１～2回定期開催中　大宮ソニックシティ<br/><br/><br/>
		</p>
		<p>
		<strong>セミナー参加者からの声</strong><br/>
		大宮で定期的に開催されているワーキングホリデー協会の出張セミナーに参加してみました。<br/>
		ワーホリセミナーが都内で頻繁に行われているのは知っていましたが、自分の地元で開催してくれるとやはり助かります。<br/>
		現地の暮らしは実際に行った人から直接聞きたいと思っていたので、実際にワーホリをしたことのある講師の方の話は具体性があって非常に参考になりました。
		ワーキングホリデー制度の細かいところまで聞けたので、異国での生活・勉強という目標の実現に近づけたと思っています。
		今後もワーキングホリデー協会の公式HPで情報を確認していきたいと思います。<br/>
<p style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（24）/オーストラリア・デンマーク希望</small></font><br></p>
		</p>
	<ul class="list-disc">
			<li>初めて参加しましたが、とても詳しくわかりやすい説明でワーホリにより興味がわきました。</li>
			<li>それぞれの国の違いを知ることができて、行先に迷っていたので良かったです。</li>
			<li>質問の時間が結構あったので知りたいことが聞けたので良かったです。</li>
			<li>どんな質問も聞いていただきその度丁寧に説明してくださった。ワーキングホリデーや海外に対して益々興味がわいた。</li>
	</ul>
	<br/>
					<?php $count = $sm->show(); ?>
		<br/>			
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="45%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="45%"></a></center>
		<br/>
		<br/>
<h2 class="sec-title">留学＆ワーキングホリデーセミナー～大宮～　お問い合わせに関して</h2>
	&nbsp;<br/>
	<p style="margin-left: 15px;">
	ご質問等、お問い合わせはこちらのメールアドレスまでご連絡下さいませ。<br/>
<br/>
	info@jawhm.or.jp<br/>
<br/>	
	【注意】お電話でのお問い合わせは受け付けておりませんのでご了承ください。<br/>
<br/>
</p>

	<div style="height:30px;">&nbsp;</div>

	</div>
	</div>
	</div>

	</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>