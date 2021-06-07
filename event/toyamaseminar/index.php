<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'toyama',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～富山～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/toyama/toyamatop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～富山～';

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
	<img src="../../images/event/toyama/toyamatop.png"/>
	<?php
	}
	?>
	<br/><h2 class="sec-title">留学＆ワーキングホリデーセミナー～富山～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～富山～は不定期に開催しています。</p>
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

		<center><a href="/event/japanseminar/"><font color="red"><p>＞＞日本一周出張ワーホリ＆留学セミナー 各地で定期開催中＜＜</p></font></a><br/>
		<br/>
		
		<!--a href="http://www.jawhm.or.jp/seminar.html"><img src="/images/fair_seminar_off.png" width="40%"></a>　<a href="http://www.jawhm.or.jp/ja/4377"><img src="/images/fair_log_off.png"  width="40%"></a><br/-->
	</center>
	</p>

	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～富山～　内容</h2>


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
		<br/>
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
		</p>
<br/>


<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～富山～　セミナー会場詳細</h2>
<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<div id="step11box">
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>富山市民プラザ　AVスタジオ</strong></font></span><br/>
富山市大手町6番14号<br/>
ＪＲ富山駅より徒歩約15分
&nbsp;<br/>
アクセスマップ　：<br/>　<a href="http://www.siminplaza.co.jp/?tid=100008" target="_blank">http://www.siminplaza.co.jp/?tid=100008</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3199.3372073759388!2d137.21086900000003!3d36.69043399999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5ff7906207911b5b%3A0x18450ceb3b3dc3d3!2z5a-M5bGx5biC5rCR44OX44Op44K2!5e0!3m2!1sja!2sjp!4v1399011844594" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

<?php/*
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～富山～　過去開催日程</h2>
		<p style="margin-left: 40px;">
		2011年8月21日（日）北方圏センター富山国際センター<br/>
		2012年5月19日（土）カタオカビル<br/>
		</p>
*/?>



	<h2 class="sec-title">留学＆ワーキングホリデーセミナー〜富山～　【セミナー参加者からの声】</h2>
		<p>
	<br/>

	<font color="#82c941" size="4">●</font> ワーホリへの興味がさらに高まりました。<br/>

	<font color="#82c941" size="4">●</font> 富山など地方に来ていただけたので行きやすかった。<br/>
	　ビザの種類がいっぱいあって組み合わせてできることを知らなかったのでよかった。<br/>

	<font color="#82c941" size="4">●</font> オーストラリアのことを詳しく聞かせてもらえたところがよかった。<br/>
			　あとビザの種類、学生ビザ、ワーホリ、観光ビザの違いがわかった。<br/>
	
	<font color="#82c941" size="4">●</font> 冊子があってよかった。<br/>
	
	<br/>
	<br/>


<h2 class="sec-title">留学＆ワーキングホリデーセミナー～富山～　お問い合わせに関して</h2>
	&nbsp;<br/>
	<p style="margin-left: 15px;">
	ご質問等、お問い合わせはこちらのメールアドレスまでご連絡下さいませ。<br/>
<br/>
	info@jawhm.or.jp<br/>
<br/>	
	【注意】お電話でのお問い合わせは受け付けておりませんのでご了承ください。<br/>
<br/>
</p>
<br/>
<br/>
	<div style="height:20px;">&nbsp;</div>

	</div>
	</div>
    </div>
	</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>