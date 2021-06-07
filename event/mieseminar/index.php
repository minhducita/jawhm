<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'mie',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～三重～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/mie/mietop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～三重～';

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
	<img src="../../images/event/mie/mietop.png"/>
	<?php
	}
	?>
	<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～三重～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～三重～は不定期に開催しています。</p>
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
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～三重～　内容</h2>
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


<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～三重～　セミナー会場詳細</h2>
<div id="step11box">
    <p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>

<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>三重県総合文化センター　生涯学習センター</strong></font></span><br/>
三重県津市一身田上津部田１２３４<br/>
&nbsp;<br/>
アクセスマップ　：　<a href="http://www3.center-mie.or.jp/center/koutsu/map.html" target="_blank">http://www3.center-mie.or.jp/center/koutsu/map.html</a><br/>
&nbsp;<br/>
<div style="text-align:center">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3278.4500992325516!2d136.5006!3d34.744253!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60040b5f4a7284e1%3A0x87bb5e29e04c79b2!2z5LiJ6YeN55yM57eP5ZCI5paH5YyW44K744Oz44K_44O8IOeUn-a2r-Wtpue_kuOCu-ODs-OCv-ODvOimluiBtOimmuODqeOCpOODluODqeODquODvA!5e0!3m2!1sja!2sjp!4v1403587674006" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～三重～　過去に開催したセミナー</h2>

	<strong>	<p style="margin-left: 15px;">
	2014年8月16日（土） 三重県総合文化センター　生涯学習センターにて開催致しました。</strong><br/>
	留学＆ワーキングホリデーセミナー～三重～にたくさんのご参加をありがとうございました。<br/>
	<br/>
	
		<p style="margin-left: 15px;">
	<strong>【三重セミナー参加者からの声】</strong><br/>

	<font color="#82c941" size="4">●</font> 基本について理解することができました。ありがとうございました。<br/>

	<font color="#82c941" size="4">●</font> 名古屋まではなかなか行けないので参考になるお話が聞けて良かった。<br/>

	<font color="#82c941" size="4">●</font> 地方セミナーのほうが質問などしやすそうで来た。<br/>

</p>
	<br/>

	 <center><img src="../../images/event/mie/photo1.jpg" width="40%">　　<img src="../../images/event/mie/photo2.jpg" width="40%"></center>

<br/>
<br/>
	<p><strong>2014年3月30日（日）	じばさん三重にて開催致しました。</strong></p><br/>

<br/>
		</p>
		<p>
		<strong>セミナー参加者からの声</strong><br/>
		英会話教室で英語を教えてるのに実はハワイにぐらいしか行ったことなかったんです。<br/>
	ちょっとステータスみたいに思っていたところもあったけど『海外生活を経験してネイティブな英語が話したい』って思ってました。<br/>
	でも本格的に留学するとなるとお金もかかるし、分からないことだらけだし、一人ぼっちで知らない土地に行くのも不安がいっぱいで、
	何か良い手段はないか探してる時にワーホリセミナーを見つけました。ワーホリ経験者である講師の話は内容が濃くてイメージしやすかったです。現地生活のちょっとしたコツも教わって、ステイ先で役に立ちました。<br/>
<br/>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（20）/ドイツ希望</small></font><br></div>
		</p>

<h2 class="sec-title">留学＆ワーキングホリデーセミナー～三重～　お問い合わせに関して</h2>
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