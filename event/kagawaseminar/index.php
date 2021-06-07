<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'kagawa',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー in 香川';
$header_obj->description_page='2014年8月アイパル香川にて、留学＆ワーキングホリデーセミナーを開催致しました。セミナー概要や参加者の感想などを掲載しておりますので、参加を希望される方は、参考になさってください。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/kagawa/kagawatop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～香川～';

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
	<img src="../../images/event/kagawa/kagawatop.png"/>
	<?php
	}
	?>
	<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～香川～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～香川～は不定期に開催しています。</p>
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

        
        
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～香川～　内容</h2>
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


<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～香川～　セミナー会場詳細</h2>
<div id="step11box">
        	<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>アイパル香川</strong></font></span><br/>
香川県高松市番町１丁目１１−６３<br/>
香川駅北口から徒歩5分
&nbsp;<br/>
アクセスマップ　：　<a href="http://www.i-pal.or.jp/what/" target="_blank">http://www.i-pal.or.jp/what/</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3294.3323922714544!2d134.04599125000004!3d34.342017649999974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3553eb9120451fe7%3A0xf1de1d88c7af4efd!2z44Ki44Kk44OR44Or6aaZ5bed!5e0!3m2!1sja!2sjp!4v1399002650506" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～香川～　過去開催日程</h2>
		<p>
		<strong>過去開催日程</strong><br/>
		2011年8月16日（火）/2012年3月9日（土）/2013年8月24日（土）	香川国際交流会館（アイパル香川）<br/><br/><br/>
		</p>

		<p>
		<strong>セミナー参加者からの声</strong><br/>
	「ワーホリに行くならワーキングホリデー協会のイベントに参加した方がいいのだろうけど、開催場所が遠いからどうしようか」<br/>と思っていた私には朗報でした。
私の地元の香川県でワーホリの出張セミナーが開かれると知ったからです。<br/>
「このイベントがあったから自分はワーホリに行くと決めることができた」といえるほど、自分にとってワーホリ生活を身近に<br/>感じられたイベントでした。<br/>
普段からワーホリに関わっている人たちだからこそ不安を払拭し、ワーホリに向けて背中を押してくれたんだと思います。<br/>
他の人達も同じ思いだったようで、セミナーが終わったあとは誰もがやる気にあふれた顔になっていたことが印象的でした。<br/>
	</p>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（22）/オーストラリア・ドイツ希望</small></font><br></div>

<h2 class="sec-title">留学＆ワーキングホリデーセミナー～香川～　お問い合わせに関して</h2>
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