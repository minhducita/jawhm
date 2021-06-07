<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'sendai',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～仙台～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/sendai/sendaitop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～仙台～';

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
	<img src="../../images/event/sendai/sendaitop.png"/>
	<?php
	}
	?>

	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～仙台～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～仙台～は不定期に開催しています。</p>

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

	<center>

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
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～仙台～　内容</h2>
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
				        <div class="chiiki-box">
			<?php $count = $sm->show(); ?>
					<br/>			
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="45%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="45%"></a></center>
		<br/>
		<br/>
</div>
		</p>

<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～仙台～　セミナー会場詳細</h2>
<div id="step11box">
<p>
	<font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>エルソーラ・仙台</strong></font></span><br/>
仙台市青葉区中央1丁目3-1　アエル　28階・29階<br/>
J R：仙台駅から徒歩2分<br/>
地下鉄：仙台市営地下鉄南北線仙台駅から徒歩4分<br/>
&nbsp;<br/>
アクセスマップ：　<a href="http://www.sendai-l.jp/whats_ls/" target="_blank">http://www.sendai-l.jp/whats_ls/</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3132.727311368585!2d140.88109899999998!3d38.26263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f8a28222db8ec0f%3A0x89a809d4447c1b15!2z5LuZ5Y-w5biC55S35aWz5YWx5ZCM5Y-C55S75o6o6YCy44K744Oz44K_44O8IOOCqOODq-ODu-OCveODvOODqeS7meWPsA!5e0!3m2!1sja!2sjp!4v1424759251966" width="90%" height="300" frameborder="0" style="border:0"></iframe></div>
</p>
</div>

<br/>
<br/>

	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～仙台～　過去に開催したセミナー</h2>

		<strong>セミナー参加者からの声</strong><br/>

		<br/>
<ul class="list-disc">
	<li>ワーホリについて全体的なイメージがもてました。</li>

	<li>学校選びや仕事の情報など知って得するお話をたくさん聞けてよかったです。</li>

	<li>正しい情報を得ることができるのがよかったです。遠方でも電話やメールでのやりとりもできると知ったので会員登録をしたいと思いました。</li>

	<li>今後もう少し情報得られるように動いていきたいです。具体的に何をしたいか少し見えてきました。</li>

	<li>最後に質問に答えてくれる時間を設けてくれて良かった。</li>
</ul>
<br/>
	<p>
	日本ワーキングホリデー協会の出張セミナーが仙台で行われると聞き、いい機会だと思って参加することにしました。<br/>
	協会の公式HPでは都内の各種セミナーについていくつもの予定が表示されますが、さすがに仙台から頻繁に参加することなどは不可能です。
	ワーホリ未経験者としては不安を払しょくするためにこういったセミナーへの参加が不可欠だと思っていたわけです。<br/>
	「出発前の準備」「ビザ等の申請」「語学学校の選び方」「仕事と普段の生活」など、仙台のセミナーは初心者に対して非常に丁寧な内容でした。
	かといって必要以上にかたい雰囲気にならず、自由に質問できたこともよかったと思います。<br/>
	事前にしっかりと準備をして臨むのが好きな自分にふさわしいセミナー内容でした。<br/>
	ワーホリ協会の出張セミナーは自分にとって得ることが多いイベントでした。<br/>
	</p>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（22）/ニュージーランド・カナダ・フランス希望</small></font><br></div>

	<p>
	エル・ソーラ仙台で行われた出張セミナーに参加しました。<br/>
	思ったことは「自分で適当に調べたものとプロが直接教えてくれることには差があるな」ということでした。<br/>
	同じ国に行くのであれば他の人とあまり変わらない状況になるのではないかと思っていましたが、語学学校やホストファミリー及び就労先で環境は変わってくるそうです。
	そこは人と人との出会いでありどこの国であっても変わらないということも勉強になりました。
	やはり「ワーキングホリデーというものは勉強である」と思いましたが、「楽しむことを忘れるな」というメッセージも私には響きました。
	今回仙台で出張セミナーを行ってくれてありがとうございました。<br/>これでますますワーホリへの気持ちが強まりました。<br/>
	</p>
<div style="text-align:right;"><font color="#626262"><small>男性（25）/オーストラリア・デンマーク希望</small></font><br></div>
<br/>
	<?php $count = $sm->show(); ?>
	<br/>
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="45%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="45%"></a></center>
<br/>
<br/>
<h2 class="sec-title">留学＆ワーキングホリデーセミナー～仙台～　お問い合わせに関して</h2>
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