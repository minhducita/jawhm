<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'kitakyushu',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー in 北九州';
$header_obj->description_page='2014年11月北九州国際交流協会にて、留学＆ワーキングホリデーセミナーを開催致しました。後悔しないワーホリのコツやビザ取得の注意点など、ワーホリに欠かせない内容ばかりでした。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/kitakyushu/kitakyushutop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～北九州～';

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
	<img src="../../images/event/kitakyushu/kitakyushutop.png"/>
	<?php
	}
	?>
	<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～北九州～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～北九州～は不定期に開催しています。</p>
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

        
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～北九州～　内容</h2>
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



<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～北九州～　セミナー会場詳細</h2>
<div id="step11box">
    <p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>北九州国際交流協会</strong></font></span><br/>
北九州市八幡西区黒崎3-15-3 コムシティ3F<br/>
筑豊電鉄「黒崎駅」下車
&nbsp;<br/>
アクセスマップ　：　<a href="http://www.kitaq-koryu.jp/access.html" target="_blank">http://www.kitaq-koryu.jp/access.html</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13251.530073370992!2d130.76991870593278!3d33.86691844552921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3543c8e7ab9a5731%3A0x746637ea565cd795!2z5YyX5Lmd5bee5Zu96Zqb5Lqk5rWB5Y2U5Lya77yI5YWs55uK77yI6LKh77yJ77yJ!5e0!3m2!1sja!2sjp!4v1399003211492" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

<?php/*	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～北九州～　過去開催日程</h2>
		<p style="margin-left: 40px;">
		2011年8月21日（日）北方圏センター北九州国際センター<br/>
		2012年5月19日（土）カタオカビル<br/>
		</p>
*/?>

	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～北九州～　過去開催　参加者の声</h2>
<br/>
<p>
	<strong>【北九州市セミナー参加者からの声】</strong><br/>

	<font color="#82c941" size="4">●</font> 知りたいことが細かく聞けて良かった。<br/>

	<font color="#82c941" size="4">●</font> 話が面白かった。説明が分かり易い。<br/>

	<font color="#82c941" size="4">●</font> 体験談の話しとか、実体験の話しとか聞けて良かった。<br/>

</p>
	<br/>
	 <center><img src="../../images/event/kitakyushu/photo1.jpg" width="40%">　　<img src="../../images/event/kitakyushu/photo2.jpg" width="37%"></center>
	<br/>

		<br/>

	</p>

<h2 class="sec-title" style="margin-bottom: 20px;">留学＆ワーキングホリデーセミナー～北九州～　セミナー参加をお考えの方へ</h2>
		<p style="margin-bottom: 20px;">
		<strong>日本ワーキングホリデー協会から皆様へ</strong><br/>
	ワーホリセミナーは無料で参加いただけます。<br/>
	『ワーホリに行きたいけど決心がつかない』『ビザって何をどうすればいいの？』とお悩みの方は是非一度ご来場ください。<br/>
	現地での体験談などを交えつつ英会話の学習法や渡航への準備などワーホリに役立つポイントを分かりやすくご紹介します。<br/>
	ワーホリは国ごとに年齢制限がございます。<br/>
	長期滞在して異文化を学ぶのはそうそう出来るものではありません。今しかできない体験はワーホリにあります。<br/>
	</p>
	

<h2 class="sec-title">留学＆ワーキングホリデーセミナー～北九州～　お問い合わせに関して</h2>
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