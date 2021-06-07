<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'nara',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～奈良～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/nara/naratop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～奈良～';

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
	<img src="../../images/event/nara/naratop.png"/>
	<?php
	}
	?>
	<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～奈良～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～奈良～は不定期に開催しています。</p>
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
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～奈良～　内容</h2>
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

<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～奈良～　セミナー会場詳細</h2>
<div id="step11box">
    	<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>やまと会議室</strong></font></span><br/>
奈良県奈良市登大路町36番地 大和ビル2Ｆ　大東興産株式会社<br/>
近鉄奈良駅下車。
&nbsp;<br/>
アクセスマップ　：　<br/><a href="http://yamatobill.jp/company.html#map1" target="_blank">http://yamatobill.jp/company.html#map1</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3280.810217750766!2d135.82994499999998!3d34.68473900000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600139870c3a638b%3A0x5f77a52e21e854cf!2z44KE44G-44Go5Lya6K2w5a6k!5e0!3m2!1sja!2sjp!4v1399005324274" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>
	
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～奈良～　セミナー参加をお考えの方へ</h2>
<?php/*
		<p style="margin-left: 40px;">
		<strong>過去開催日程</strong><br/>
		2011年8月21日（日）北方圏センター奈良国際センター<br/>
		2012年5月19日（土）カタオカビル<br/>
		</p>
*/?>
	<p style="margin-bottom: 20px;">
	<strong>日本ワーキングホリデー協会から皆様へ</strong><br/>
	奈良県で日本ワーキングホリデー協会の出張セミナーを開催できることを喜ばしく思います。<br/>
	若い頃のみ利用できるワーキングホリデーの制度を利用して異国の地で働くことは、志望者の皆さんにとってかけがえのない財産になります。
	いいことも悪いことも体験することを「挑戦」と呼べるのだと思いますが、事前の準備を万全にすることでワーホリ生活をより楽しくすることが可能です。<br/>
	私共としましては志がある皆さんの力添えをするために出張セミナーを開催するつもりです。<br/>
	ご来場の際は遠慮なさらずワーホリ生活の疑問点をスタッフにお訊きください。<br/>
	一人でも多くの方と出張セミナーでお会いできることを願っております。<br/>
	</p>
<br/>
<h2 class="sec-title">留学＆ワーキングホリデーセミナー～奈良～　お問い合わせに関して</h2>
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
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>