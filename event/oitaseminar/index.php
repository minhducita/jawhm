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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～大分～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/oita/oitatop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～大分～';

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
	<img src="../../images/event/oita/oitatop.png"/>
	<?php
	}
	?>
	<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～大分～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～大分～は不定期に開催しています。</p>
        
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

        
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～大分～　内容</h2>
        
        
        
        
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



<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～大分～　セミナー会場詳細</h2>
<div id="step11box">
        <p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>大分国際交流会館（別府市）</strong></font></span><br/>
大分市高砂町2-33(B1F)<br/>
大分駅から徒歩約10分&nbsp;<br/>
<a href="http://www2.oitaplaza.jp/japanese/modules/doc01/index.php?id=8" target="_blank">■アクセスの詳細はこちら</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3335.239032613415!2d131.505796!3d33.286409!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3546a6df571cf381%3A0x52afc5fcea5dea4a!2z5aSn5YiG5Zu96Zqb5Lqk5rWB5Lya6aSo!5e0!3m2!1sja!2sjp!4v1399009615735" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～大分～　セミナー参加をお考えの方へ</h2>

	<p style="margin-bottom: 20px;">
	<strong>日本ワーキングホリデー協会から皆様へ</strong><br/>
	ワーキングホリデーを活用していただくために当協会はセミナーを開催しています。<br/>
	【ビザの発給】【保険の加入】【現地での職探し】とワーホリに関する疑問を解決します。<br/>
	講演会で話をする講師はワーホリ経験者なのでより現実的なイメージがわくかと思います。<br/>
	また、ワーホリをしようか迷っている方にも当局はサポートいたします。<br/>
	一生に一度の貴重な体験を有効活用していただくためにも、当協会の主催するワーホリセミナーを是非ご活用ください。<br/>
	</p>

<h2 class="sec-title">留学＆ワーキングホリデーセミナー～大分～　お問い合わせに関して</h2>
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