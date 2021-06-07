<?php
include '../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
		'title' => '熊本',
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

$header_obj->title_page='留学＆ワーキングホリデーセミナー～熊本～のご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/event/kumamoto/kumamototop.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '留学＆ワーキングホリデーセミナー～熊本～';

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
	<img src="../../images/event/kumamoto/kumamototop.png"/>
	<?php
	}
	?>

	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～熊本～</h2>
	<p style="margin-left: 15px;">
	<p>留学＆ワーキングホリデーセミナー～熊本～は毎月定期的に開催しています。</p>

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
        <br/>

	<center><a href="/seminar.html"><img src="../../images/event/seminar_off.gif" width="40%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="../../images/event/event_off.gif"  width="40%"></a></center>

<br/>


	<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～熊本～　内容</h2>
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

<div style="height:30px;">&nbsp;</div>

<h2 class="sec-title" id="map">留学＆ワーキングホリデーセミナー～熊本～　セミナー会場詳細</h2>

<div id="step11box">
				<p><font color="red">※開催日程によって会場が変更になる場合がございます。ご予約時に再度ご確認ください。</font><br/></p>

<p>
<br/>
<span style="margin-bottom: 10px;"><font size="3"><strong>熊本市国際交流会館</strong></font></span><br/>
熊本県熊本市中央区花畑町４番１８号<br/>
&nbsp;<br/>
アクセスマップ：<a href="http://www.kumamoto-if.or.jp/kcic/access/access.asp" target="_blank">http://www.kumamoto-if.or.jp/kcic/access/access.asp</a><br/>
&nbsp;<br/>
<div style="text-align:center">

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3353.6310034298576!2d130.705061!3d32.802042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xda4851616a752f83!2z54aK5pys5biC5Zu96Zqb5Lqk5rWB5Lya6aSo!5e0!3m2!1sja!2sjp!4v1394185686345" width="90%" height="300" frameborder="0" style="border:0"></iframe>
</div>
</p>
</div>
<br/>
<br/>

<h2 class="sec-title" style="margin-bottom: 30px;">留学＆ワーキングホリデーセミナー～熊本～　過去開催日程</h2>
	<p>

	<strong>2014年7月12日(土)熊本市国際交流会館にて開催致しました。</strong><br/>
	留学＆ワーキングホリデーセミナー～熊本～にたくさんのご参加をありがとうございました。<br/>
	<br/>
	<strong>【7月12日セミナー参加者からの声】</strong><br/>
	<br/>
	●行くか迷っていましたが、セミナーに参加して具体的なプランを考える事が出来ました。<br/>
	行くことを前提に前向きに計画してみようと思います。(女性)<br/>
	<br/>
	●セミナーに参加するのは2回目でしたが、勉強方法とか聞けてモチベーションが上がりました！(女性)<br/>
	<br/>

	<center><img src="20140712.jpg" width="40%"> <img src="20140712_2.jpg" width="40%"></center>
	<br/>
	<p>
	<strong>過去開催日程</strong><br/>
	2011年8月17日（水）/2011年9月1日（木）/2014年3月26日（水）	熊本国際交流会館<br/><br/><br/>
	</p>
	<p>
	<strong>セミナー参加者からの声</strong><br/>
	大学を卒業したら留学しようって前々から考えていました。<br/>
	でも貯金もないし学費をどうしようか迷ってる時にワーホリセミナーに行ってみたんです。<br/>
	ワーホリなら働きながら生活費も学費も稼げるので、もってこいだって思いました。<br/>
	セミナー講師の話で『日本食レストランで働ける』って聴いて意外でした。<br/>
	職場で日本人の仲間を見つければ寂しくないだろうし、セミナーに行ってワーホリの計画が現実的になりました。<br/>
	今では現地の友達作りのイメージトレーニングをしてます。<br/>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>男性（28）/香港・台湾希望</small></font><br></div>
	</p>
	<p>
	元々歴史好きが高じて旅行することが多かったのですが、本格的に現地で勉強したいと思うようになりました。<br/>
	私が興味を持ったのがイギリスです。イギリスはワーホリ出来る国の中にあったのでワーホリの制度を使おうと思いました。<br/>
	長期滞在となると勝手が違い旅行と同じ気分ではいけないと思いセミナーに参加しました。<br/>
	ワーホリセミナーでは現地での仕事を探すコツだとか語学学校の選び方だとか、実用的な話が聴けたのが良かったです。<br/>
<div style="text-align:right; margin-bottom: 20px;"><font color="#626262"><small>女性（23）/イギリス希望</small></font><br></div>
	</p>
	<p>
	前の仕事を辞めて、貯金もあることだし長期の旅行でもしようと探していたらワーホリを見つけました。<br/>
	ネットで検索するとちょうど地元熊本でセミナーをやる予定があったので参加しました。<br/>
	講演を聴いていると自分が思っているよりも楽しそうだったのでますます参加してみたくなりました。<br/>
	ビザの手続きととか知らないことを分かりやすく説明してくれたので助かりました。<br/>
	すでに行く前から英語をマスターしてそのまま仕事につなげようと計画してます。<br/>
<div style="text-align:right;"><font color="#626262"><small>男性（27）/オーストラリア・ニュージーランド希望</small></font><br></div>
		</p>
		<br/>
	<h2 class="sec-title">留学＆ワーキングホリデーセミナー～熊本～　お問い合わせに関して</h2>
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