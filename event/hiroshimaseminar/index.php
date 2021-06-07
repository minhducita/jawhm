<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
		'title' => '広島',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー in 広島';
$header_obj->description_page='2015年2月広島県のアステールプラザにて、留学＆ワーキングホリデーセミナーを開催致します。ビザの内容や語学学校の必要性など、ワーホリには重要な内容となっていますので、是非ご参加ください。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/hiroshima/hiroshimatop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～広島～';

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
	<img src="../../images/event/hiroshima/hiroshimatop.png"/>
	<?php
	}
	?>

	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～広島～</h2>
		<p>留学＆ワーキングホリデーセミナー～広島～は毎月定期的に開催しています。</p><br/>
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
        <br/>
    <p>
	<center>
		<a href="/event.html"><font size="3" color="red">＞＞日本一周出張ワーホリ＆留学セミナー 各地で定期開催中＜＜</font></a><br/>
		<!--a href="http://www.jawhm.or.jp/seminar.html"><img src="/images/fair_seminar_off.png" width="40%"></a>　<a href="http://www.jawhm.or.jp/ja/4377"><img src="/images/fair_log_off.png"  width="40%"></a><br/-->
	</center>
	</p>
	<br/>
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～広島～　内容</h2>
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
			<br/>

<center><img src="../../images/event/seminar_01.jpg" width="25%">　<img src="../../images/event/seminar_03.jpg" width="25%">　<img src="../../images/event/seminar_02.jpg" width="25%"></center>
			<br/>
			<?php $count = $sm->show(); ?>
					<br/>			
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="45%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="45%"></a></center>
		<br/>
		<br/>

		</p>
<br/>
<?php/*<h2 class="sec-title">講演会：『成功する留学・ワーキングホリデーセミナー』　特別講師紹介</h2>

<p style="margin-left: 40px;">
&nbsp;<br/>
<strong>佐々木健志（ササキ　タケシ）</strong><br/>

</p>

	<p style="text-align:center; margin-top:25px;"><img  src="../../images/kouen/pgic.jpg" alt="" /></p><br/>

<p style="margin-left: 40px;">
<span style="margin-bottom: 10px;"><strong>講師の紹介：　</strong></span><br/>
20歳で大学を休学し、英語力ゼロでカナダ、バンクーバーに留学。<br/>
1年で上級レベルに進級し、TOEICではリスニングで満点を取得。<br/>
海外でのルームシェアや得意分野を活かした野球コーチなど、さまざまな経験を経て海外語学学校のスタッフに。<br/>
現在は、語学学校のマーケティングスタッフをしながら<br/>
日本、カナダ、オーストラリアの3カ国での留学・就労経験などをもとに学生、社会人を対象にしたセミナーを行っている。<br/>
</p>
<br/>
</p>
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
        <br/>
        <br/>*/?>
<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～広島～　セミナー会場詳細</h2>
<div id="step11box">
			<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<p>
<span style="margin-bottom: 10px;"><font size="3"><strong>アステールプラザ</strong></font></span><br/>
広島市中区加古町4番17号<br/>
市内電車利用の場合：江波行「舟入町」下車<br/>
バス利用の場合：広島バス　24番路線 吉島営業所行または吉島病院行 「加古町」下車<br/>

&nbsp;<br/>
アクセスマップ　：　<a href="http://www.cf.city.hiroshima.jp/naka-cs/access/access.html" target="_blank">http://www.cf.city.hiroshima.jp/naka-cs/access/access.html</a><br/>
</p>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3292.53913910446!2d132.44803299999998!3d34.38764!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x355aa26a28766c03%3A0xfe112b67fc844fe5!2z44Ki44K544OG44O844Or44OX44Op44K2!5e0!3m2!1sja!2sjp!4v1399002230769" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>


	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～広島～　過去に開催したセミナー</h2>

	<center><img src="../../images/event/hiroshima/photo1.jpg" width="50%"></center>
	<br/>
	<p>
	<strong>セミナー参加者からの声</strong><br/>
	広島でワーホリセミナーが定期開催していたので、滞在中のプランとかビザの手続きとか、いろいろと相談していました。<br/>
	話を聴いてくれていたスタッフさんと仲良くなっちゃって、ステイ先でもメールで報告したり相談してました。<br/>
	私の場合英語の勉強よりも観光がメインだったから、自分のペースでじっくりと異文化に触れられたのが本当に楽しかったです。<br/>
	行く前とその後じゃ人生観がかなり変わった気がします。<br/>
	検討中の人にはオススメするけど、細かくプランを決めるならセミナーに行ってから考えると参考になると思います。<br/>
	</p>
	<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（24）/台湾・韓国・香港希望</small></font><br></div>

	<p>
	ワーホリセミナーに行く前は分からないことだらけだったんですが、参加して全部すっきりしました。<br/>
	ビザや保険なんて手続きが苦手な私には難しすぎたので、スタッフさんが分かりやすく説明してくれたのが本当に助かりました。
	『仕事の探し方』なんて現地に行ってからじゃ遅いような気がしてたので、セミナーで教わったコツは役立てそうです。<br/>
	迷ってたりこれから行こうかなって考えてる人には、セミナーはいい刺激になるとおもいます。<br/>
	</p>

	<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（27）/フランス・ドイツ希望</small></font><br></div>
       
    <br/>
		<div class="chiiki-box">
		   <p style="margin-left: 35px;">
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
           </p>
       </div>
<h2 class="sec-title">留学＆ワーキングホリデーセミナー～広島～　お問い合わせに関して</h2>
	&nbsp;<br/>
	<p>
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