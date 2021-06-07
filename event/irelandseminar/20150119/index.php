<?php
include '../../../seminar_module/seminar_module.php';
$config = array(
	'view_mode' => 'list',
	'list' => array(
		'keyword' => 'アイルランド大使館',
		'past_view' => 'on',
		'count_field_active' => '',
		'place_default' => '',
	)
);
$sm = new SeminarModule($config);

require_once '../../../include/header.php';
//require_once '/seminar/include/kouen_function.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='アイルランド大使館協力 アイルランドワーキングホリデーセミナーのご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/event/ireland/top.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'アイルランド大使館協力 アイルランドワーキングホリデーセミナー';

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

	<div style="width:500px; margin-left:350px; font-size:10pt; margin-top:10px;">
	</div>
	<img src="/images/event/ireland/main.jpg" alt="アイルランドセミナー" style="margin-bottom: 10px;">
	<div style="font-size:20pt; color: #333333; margin-left:5%; margin-bottom:10px;">
	<strong>アイルランド<br/>
	ワーキングホリデーセミナー開催のご案内</strong>
	</div>

	<div style="font-size:10pt; margin-bottom: 10px;">
	<center>主催：日本ワーキング・ホリデー協会　協力：アイルランド大使館<br/></center>
	</div>

	<h2 class="sec-title">アイルランド大使館協力 アイルランドワーキングホリデーセミナー　概要</h2>

	&nbsp;
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
        	&nbsp;
        	<p style="margin:  0px 5px;">
		アイルランド大使館の方をお呼びしアイルランドの魅力・またワーキングホリデー（ワーキング・ホリデー・オーソリゼーション（許可証））について
		セミナーを開催いたします。大使館の方のお話が直接聞ける滅多にない貴重な機会です。来年度の第1期（2015年8月31日以前のご出発を希望される方対象）の申請は2015年1月1日（木）からになります。
		申請予定の方もアイルランドに興味がある方もぜひこの機会にご参加くださいませ。<br/>
		<br/>
		また、その前にはワーキングホリデー協会によるワーキングホリデーヨーロッパ初心者セミナーも開催いたしますので
		初めて協会にお越しになる方、ワーキングホリデーの基礎的な部分が知りたい方はぜひ併せてご参加くださいませ（別途ご予約が必要です）<br/>			

	<!--<center><a href="/seminar.html"><img src="/images/event/seminar_off.gif" width="40%"></a>　<a href="http://www.jawhm.or.jp/event.html"><img src="/images/event/event_off.gif"  width="40%"></a></center>-->
	
   		 &nbsp;<br/>
	</p>

	<h2 class="sec-title" style="margin-bottom: 20px;">アイルランド大使館協力 アイルランドワーキングホリデーセミナー　内容</h2>

		<p style="margin:  0px 5px;">
			<strong>12:00~<br/>
			ワーキング・ホリデー協会<br/>ヨーロッパ圏初心者向けセミナー</strong><br/>
			<br/>
			≪内容≫<br/>
			日本ワーキングホリデー協会のご紹介<br/>
			ワーキングホリデー制度の概要<br/>
			ワーキングホリデー協定国（ヨーロッパ）のご紹介<br/>
			<br/>
			<br/>
			<strong>13:00~<br/>
			アイルランド大使館セミナー</strong><br/>
			客員講演者：アイルランド大使館　<br/>
			<br/>
			≪内容≫<br/>
			・アイルランド ビザの概要<br/>
			・アイルランド ビザの申請方法<br/>
			・アイルランドの魅力<br/>
	        <br/>
        	セミナー終了後に質疑応答のお時間を設けさせていただいております。<br/>
			ぜひお時間に余裕を持ってお越しくださいませ。<br/>
			<br/>
			<center><img src="/images/event/seminar_01.jpg" width="30%"> <img src="/images/event/seminar_03.jpg" width="30%"> <img src="/images/event/seminar_02.jpg" width="30%"></center>

        <br/>

        <div style="font-size:8pt; margin:  0px 5px;">
			【ご注意】セミナー内容の詳細については、一部変更になる可能性もあります。予めご了承ください。
		</div>
			<br/>
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
		</p>
			<br/>

<h2 class="sec-title" id="map">アイルランドってどんなところ？ <img src="/images/event/ireland/d2.gif" style="width:4%; margin-top: 3px;"></h2>
    &nbsp;<br/>
	<p style="margin:  0px 5px;">
		アイルランドは首都をダブリンとする北欧に位置する島。自然な豊かなアイルランドは別名“エメラルドの島”と呼ばれ、多くの神秘的な物語、
		巨大遺跡群やケルト文化が生まれました。その昔、ケルト人は自然のすべてに精霊が宿っていると信じ、神や妖精と生きていました。
		その神秘的な文化は今も各地に息づいており、訪れた者は心を奪われるに違いありません。
		今回は、その魅力的なアイルランドでワーキングホリデーを利用し、人々と生活を共にするための魅力と方法をご紹介いたします。<br/>
			<div style="height: 25px;">&nbsp;</div>
			<center><a href="/visa/v-ire.html" target="_blank"><img src="/images/event/ireland/visa.jpg"></center></a>
			<div style="height: 10px;">&nbsp;</div>
			<center><img src="/images/event/ireland/photo01.jpg" width="30%"> <img src="/images/event/ireland/photo02.jpg" width="30%"> <img src="/images/event/ireland/photo03.jpg" width="30%"></center>

	</p>
	<br/>
	
<p class="text01"> 
	<center>
		<?php
		  //irelandgalley

		  // The MAX_PATH below should point to the base of your OpenX installation
		  define('MAX_PATH', '/var/www/html/ad');
		  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
		    if (!isset($phpAds_context)) {
		      $phpAds_context = array();
		    }
		    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
		    $phpAds_raw = view_local('', 134, 0, 0, '_blank', '', '0', $phpAds_context, '');
		    $phpAds_context[] = array('!=' => 'campaignid:'.$phpAds_raw['campaignid']);
		  }
		  echo $phpAds_raw['html'];
		?>
	</center>
</p>

<br/>


<h2 class="sec-title">アイルランド大使館協力 アイルランドワーキングホリデーセミナー　お問い合わせに関して</h2>
	&nbsp;<br/>
	<p style="margin:  0px 5px;s">
		ご質問等、お問い合わせはこちらのメールアドレスまでご連絡下さいませ。<br/>
		<br/>
		info@jawhm.or.jp<br/>
		<br/>	
		【注意】お電話でのお問い合わせは受け付けておりませんのでご了承ください。<br/>
		<br/>
	</p>

	<div style="height:50px;">&nbsp;</div>

</div>
</div>

</div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>