<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'shizuoka',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～静岡～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/shizuoka/shizuokatop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～静岡～';

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
	<img src="../../images/event/shizuoka/shizuokatop.png"/>
	<?php
	}
	?>
	<br/><h2 class="sec-title">留学＆ワーキングホリデーセミナー～静岡～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～静岡～は不定期に開催しています。</p>
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
	<center>
		<a href="/event/japanseminar/"><font color="red"><p>＞＞日本一周出張ワーホリ＆留学セミナー 各地で定期開催中＜＜</p></font></a><br/>
		<br/>
		
		<!--a href="http://www.jawhm.or.jp/seminar.html"><img src="/images/fair_seminar_off.png" width="40%"></a>　<a href="http://www.jawhm.or.jp/ja/4377"><img src="/images/fair_log_off.png"  width="40%"></a><br/-->
	</center>
	</p>


	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～静岡～　内容</h2>

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


<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～静岡～　セミナー会場詳細</h2>
<div id="step11box">
<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>静岡駅前会議室 A館403号室</strong></font></span><br/>
静岡市葵区紺屋町8-12 金清軒ビル<br/>
&nbsp;<br/>
アクセスマップ　：　<a href="http://kaigishitsu-shizuoka.com/index.html" target="_blank">http://kaigishitsu-shizuoka.com/index.html</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3269.345222035782!2d138.38676414999998!3d34.97301659999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601a49f7a9c5aeb5%3A0x9eefd4e0e1af43b6!2z44CSNDIwLTA4NTcg6Z2Z5bKh55yM6Z2Z5bKh5biC6JG15Yy657S65bGL55S677yY4oiS77yR77ySIOmHkea4hei7kuODk-ODqw!5e0!3m2!1sja!2sus!4v1403519574839" width="90%" height="300" frameborder="0" style="border:0"></iframe>

</div>
</p>
</div>

<br/>
<br/>

	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～静岡～　過去に開催したセミナー</h2>
		<p>
		<strong>過去開催日程</strong><br/>
		2011年8月13日（土）	静岡市民文化会館<br/>
		2011年8月27日（土）/2011年8月29日（月）	静岡県教育会館<br/><br/><br/>
		</p>
		<p>
		<strong>セミナー参加者からの声</strong><br/>
		ネットでワーホリの情報を見ててもなかなか決断できなくて、セミナーに行こうにも東京と静岡は微妙な距離だから通うってなると面倒だったんです。
		ウダウダ迷ってる時に近くでワーホリセミナーが開催されることを知って参加しました。<br/>
		講演で【現地で英語が上達していく話】を聴いてると、英語を話せている未来の自分がイメージできて『早く行きたい！』って気持ちで胸が膨らみました。
		他にもビザの手配とか失敗しないための渡航準備とか、体験しないと分からないような話も聴けたので現地に行った時に役立ちました。<br/>
	</p>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（28）/オーストラリア・ドイツ希望</small></font><br></div>

	<p>
		『初めての海外生活がこんなにうまくいくなんて』って感じで驚きです。<br/>
		帰国後のＴＥＩＣのリスニングテストで４６３点取った時はワーホリ体験が生きてるって実感できました。<br/>
		ワーホリに行ったきっかけは地元の静岡でセミナーがあって『ちょっと話を聴いてみようかな？』っていう軽い感じだったんです。<br/>
		グアムか韓国しか行ったことのない私でも、海外で生活するノウハウを分かりやすく紹介していたので、その時の話は私にはすっごく助けになりました。
		ワーホリセミナーは迷ってる人にとって決断する絶好のチャンスです！<br/>
	<br/>
	</p>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（22）/イギリス・アイルランド・ノルウェー希望</small></font><br></div>

	<p>
		講師の『カナダで仕事探しに苦労した話』は、静岡から出たことのない私にはいい刺激になりました。<br/>
		高校卒業後の進路が決まらなくて、そんな時に親の勧めでワーホリセミナーに行きました。<br/>
		海外で生活するなんてめんどくさいし、英語の成績がガタガタの私なんかには手が出せるはずないと下向きに考えてました。<br/>
		セミナーが始まって現地の写真や異文化の面白い話を聴いてるとなんだか『行ってみたい』って自然と思えたんです。<br/>
		ビザや保険の難しい話もよく理解できたし、セミナーは本当に良いきっかけになりました。<br/>
	<br/>
	</p>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（24）/カナダ希望</small></font><br></div>


		<h2 class="sec-title">留学＆ワーキングホリデーセミナー～静岡～　お問い合わせに関して</h2>
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
	<div style="height:40px;">&nbsp;</div>

	</div>
	</div>
	</div>

	</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>