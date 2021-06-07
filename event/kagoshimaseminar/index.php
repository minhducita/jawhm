<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'kagoshima',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー in 鹿児島';
$header_obj->description_page='2014年9月かごしま県民交流センターにて、留学＆ワーキングホリデーセミナーを開催致しました。ワーホリの魅力や語学学校の案内など、ワーホリに欠かせない内容ばかりでした。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/kagoshima/kagoshimatop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～鹿児島～';

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
	<img src="../../images/event/kagoshima/kagoshimatop.png"/>
	<?php
	}
	?>
	<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～鹿児島～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～鹿児島～は不定期に開催しています。</p>
			<?php $count = $sm->show(); ?>
			<br/>

								      <!--  <div class="chiiki-box">
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
             
        </div>
-->	<center>
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="50%"></a><a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="50%"></a></center>
	<br/>	</center>
	</p>
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～鹿児島～　内容</h2>
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
<br/>
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


<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～鹿児島～　セミナー会場詳細</h2>
<div id="step11box">
        <p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>かごしま県民交流センター</strong></font></span><br/>
鹿児島市山下町１４－５０<br/>
・市電「水族館口電停」下車　徒歩４分<br/>
・ＪＲ「鹿児島駅」下車 徒歩10分<br/>
・バス「水族館口」下車 徒歩５分<br/>
&nbsp;<br/>
<a href="http://www.kagoshima-pac.jp/jp/center/access/index.html" target="_blank">■アクセスの詳細はこちら</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d3398.2511601062365!2d130.55781649999997!3d31.599577!3m2!1i1024!2i768!4f13.1!2m1!1z44GL44GU44GX44G-55yM5rCR5Lqk5rWB44K744Oz44K_44O8!5e0!3m2!1sja!2sjp!4v1399002945750" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～鹿児島～　過去に開催したセミナー</h2>
		<p>
		<strong>過去開催日程</strong><br/>
		2011年8月17日（水）/2011年9月1日（木）	かごしま県民交流センター<br/>
        2014年9月18日（木） かごしま県民交流センター  <br/><br/>
		</p>
	<p>
	<strong>セミナー参加者からの声</strong><br/>
	『田舎から出たい！出来れば海外に』っていう気持ちはあったんですが、もう３０も近いし今から勉強しなおすのはちょっと無理かなって諦めかけてたんです。
	私の薩摩訛は強い方なので日本語すら大丈夫かと思うくらいで、ワーホリセミナーが鹿児島に来なかったら人生が変わっていたかもしれません。
	セミナーで実際に経験した人から話を聴いていると意欲がわいてきました。
	外に出たいって気持ちが自分で感じている以上に大きかったみたいで『ビザの申請はどうしたらいいのか？』『現地で仕事探すには？』ってどんどん興味がわいてきたんです。
	私の分かりずらい日本語でも（笑）的確に答えてくれたので助かりました。
	ワーホリに行きたいって思ったなら、まずはセミナーに通ってみるべきですね。<br/>
	</p>
	<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（29）/オーストラリア・カナダ・フランス希望</small></font><br></div>

	<p>
	福岡にワーホリ協会のオフィスがあって、そこに通うとなるとお金と時間が馬鹿にならなくて。<br/>
	それまではネットで調べるくらいだったんですが、地元にセミナーが来たんで一気に夢が現実に近づきました。<br/>
	ワーホリに反対してた両親も講演を聴くと納得してくれて、セミナーはこういう使い方もあるんだなって気づきました。<br/>
	渡航準備はビザの申請とか保険の加入とか、一人でやっても分からないこと尽くしだったので、セミナーは本当に役立ちました。<br/>
	</p>
	<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（21）/ドイツ・イギリス・アイルランド希望</small></font><br></div>


<h2 class="sec-title">留学＆ワーキングホリデーセミナー～鹿児島～　お問い合わせに関して</h2>
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
	<div style="height:50px;">&nbsp;</div>

	</div>
	</div>
	</div>
	</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>