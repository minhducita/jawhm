<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
        'keyword' => 'kobe',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー in 神戸';
$header_obj->description_page='2014年8月神戸国際会館にて、留学＆ワーキングホリデーセミナーを開催致しました。セミナー詳細や参加者の声を掲載していますので、参考になさってください。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/kobe/kobetop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～神戸～';

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
	<img src="../../images/event/kobe/kobetop.png"/>
	<?php
	}
	?>
	<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～神戸～　概要</h2>
	<p>留学＆ワーキングホリデーセミナー～神戸～は不定期に開催しています。</p>
        
        <br/>
	<center>
	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="50%"></a><a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="50%"></a></center>
	<br/>	</center>
	</p>

	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～神戸～　内容</h2>
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


<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～神戸～　セミナー会場詳細</h2>
<div id="step11box">
    <p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>
<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>神戸国際会館</strong></font></span><br/>
兵庫県神戸市中央区御幸通8丁目1番6号<br/>
各線三宮駅より、三宮地下街（さんちか）を通り、雨に濡れずにお越しいただけます。<br/>
地下街・地下通路から【Ａ８出口】【神戸国際会館】への矢印の方向へお進みください。<br/>
&nbsp;<br/>
アクセスマップ　：　<a href="http://www.kih.co.jp/access/index.html" target="_blank">http://www.kih.co.jp/access/index.html</a><br/>
&nbsp;<br/>
<div style="text-align:center">
<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d3280.520142656322!2d135.195957!3d34.6920585!3m2!1i1024!2i768!4f13.1!2m1!1z56We5oi45Zu96Zqb5Lya6aSo!5e0!3m2!1sja!2sjp!4v1399003567725" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>

<br/>
<br/>

<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～神戸～　過去に開催したセミナー</h2>
		<p>
		<strong>過去開催日程</strong><br/>
		2011年8月15日（月）	神戸国際協力交流センター<br/>
		2011年8月30日（火）	兵庫県民会館<br/>
		<br/>
		</p>

		<p>
		<strong>セミナー参加者からの声</strong><br/>
	神戸で行われたワーキングホリデー協会の出張セミナーは、ワーホリ志望者の熱気で非常に盛り上がったと思います。<br/>
	自分一人の稼ぎで海外で生活するとなると誰でも不安になるものです。<br/>
	日本でできる事前準備もたくさんあると思うのでその情報を目当てに行きました。<br/>
	海外で生活したいと思っている時点で自分から溶け込もうという意志はあるはずなので、現地の情報はまさに自分が今後置かれる状況だと想定して聞くことが出来ました。
	食料品や移動手段などはその国のどこで暮らすのかが分からなければ想像することが出来ません。
	「意外と自転車移動が重宝する」という話も貴重な情報でした。<br/>
	出張セミナーに来なければ知ることが出来ないことが多かったと思うので、参加して正解だったと思っています。<br/>
	</p>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（20）/ニュージーランド希望</small></font><br></div>

		<p>
	8月の終わりのこの日にワーホリ協会のイベントが行われました。<br/>
	兵庫に来ると聞いてすぐに予約をして開催日を待っていました。<br/>
	来場者の多さはそのままワーホリや海外への関心の高さを示していると思いましたし、必ずしも「内向き志向」ではないのではないかと思いました。
	協会の人の解説でワーホリの概要は充分に理解することが出来ましたが、参加者の細かな質問が自分にとっても役に立つものだったことが印象的でした。
	やっぱりみんな本気なんだということを知れてワーホリに対する気持ちが高まりました。
	海外生活は簡単ではないと思いますが、出張イベントでの対応が丁寧だったので今後もあてにして大丈夫だろうと思いました。<br/>
	</p>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（27）/カナダ・フランス希望</small></font><br></div>


<h2 class="sec-title">留学＆ワーキングホリデーセミナー～神戸～　お問い合わせに関して</h2>
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
</div>
	<div style="height:20px;">&nbsp;</div>

	</div>
	</div>

	</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>