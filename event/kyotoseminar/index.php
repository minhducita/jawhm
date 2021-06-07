<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
		'keyword' => 'kyoto',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー in 京都';
$header_obj->description_page='2014年8月キャンパスプラザ京都にて、留学＆ワーキングホリデーセミナーを開催致しました。語学学校についてやビザの申請など、渡航に必要な情報ばかりの充実したセミナーでした。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/kyoto/kyototop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～京都～';

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
	<img src="../../images/event/kyoto/kyototop.png"/>
	<?php
	}
	?>
	<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～京都～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～京都～は定期的に開催しています。</p>
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
		<a href="/event/japanseminar/"><font size="3" color="red">＞＞日本一周出張ワーホリ＆留学セミナー 各地で定期開催中＜＜</font></a><br/>
		<!--a href="http://www.jawhm.or.jp/seminar.html"><img src="/images/fair_seminar_off.png" width="40%"></a>　<a href="http://www.jawhm.or.jp/ja/4377"><img src="/images/fair_log_off.png"  width="40%"></a><br/-->
	</center>
	</p>
	<br/>
	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～京都～　内容</h2>

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

<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～京都～　セミナー会場詳細</h2>
<div id="step11box">
		<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>キャンパスプラザ京都</strong></font></span><br/>
京都市下京区西洞院通塩小路下ル（ビックカメラ前）<br/>
お越しの際には、公共交通機関をご利用ください。<br/>
&nbsp;<br/>
アクセスマップ：<a href="http://www.consortium.or.jp/contents_detail.php?co=kak&frmId=593" target="_blank">http://www.consortium.or.jp/contents_detail.php?co=kak&frmId=593</a><br/>
&nbsp;<br/>
<div style="text-align:center">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.811940738949!2d135.75572!3d34.986374999999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108a8c1c87a01%3A0x652137620eafae6d!2z44Kt44Oj44Oz44OR44K544OX44Op44K25Lqs6YO9!5e0!3m2!1sja!2sjp!4v1399003783752" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

<h2 class="sec-title" style="margin-bottom: 10px;">留学＆ワーキングホリデーセミナー～京都～　セミナー参加をお考えの方へ</h2>
	

	<strong>セミナー参加者からの声</strong><br/>
	<p>
	<br/>
	ワーキングホリデー協会の公式セミナーが京都で行われたので行ってみました。<br/>
	ワーホリで行くなら観光で行って気に入ったオーストラリアだなと思っていたのですが、セミナーでは語学・就労・農園などに関する詳しい情報を教えてくれました。
	ワーホリでオーストラリアに長期滞在する場合は農園で働かなければならないと聞いて少し驚きました。
	ただそれもいい経験になるのではないかと思っているので農場労働も含めて楽しみです。
	ここでしか得られないオーストラリアワーホリの新鮮な情報を多数得ることができたので、ワーホリ協会の出張セミナーは充実した内容だったといえます。<br/>
	</p>
	<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（26）/希望</small></font><br></div>

	<p>
	念願かなってワーホリ協会の出張セミナーがキャンパスプラザ京都に来てくれました。<br/>
	ワーホリの講師の人に直に質問できるチャンスなので来てくれるのは大歓迎です。<br/>
	会場で周りの人の話を聞いているとどの人もワーホリ初心者だったようです。<br/>
	体験者の話を聞くのは初めてでどのような生活なのか興味深くうかがいましたが、結局ワーホリ生活は「楽しい」という言葉に集約されると思いました。
	慣れない言葉で奮闘することも就労先で働くことも、日本では味わえない特別な体験ということで「楽しい」なのだと思います。
	海外生活を経て成長するということが実感を伴って理解できたと思っています。<br/>
	ワーホリ出張セミナーで得られたことを実際のワーホリ生活にいかしたいと思っています。<br/>
	</p>
	<div style="text-align:right; margin-bottom: 30px;"><font color="#626262"><small>女性（20）/カナダ・デンマーク・台湾希望</small></font><br></div>



<h2 class="sec-title">留学＆ワーキングホリデーセミナー～京都～　お問い合わせに関して</h2>
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