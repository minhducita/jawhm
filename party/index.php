<?php
require_once '../include/header.php';

include '../seminar_module/seminar_module.php';

$sm = new SeminarModule($config);

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='ワーキング・ホリデー交流会（パーティー）';
$header_obj->description_page='日本ワーキングホリデー協会で定期開催している交流パーティーのお知らせです。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/party/images/top_image.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーキング・ホリデー交流会（パーティー）';

$header_obj->add_js_files='<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"><	
<script type="text/javascript" src="script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="styles.css" />';

$header_obj->display_header();

?>

<style>
.tokyo, .tokyo:visited{
	font-size:14px;
	font-weight:bold;
	background:#1e90ff;
	display:inline-block;
	padding:5px 30px 8px 28px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:0px 0px 0px 0;
	vertical-align: middle;
}
.tokyo:hover{
	background:#0062b3;color:#ffffff;
}
.osaka, .osaka:visited{
	font-size:14px;
	font-weight:bold;
	background:#ff69b4;
	display:inline-block;
	padding:5px 30px 8px 28px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:0px 0px 0px 0;
	vertical-align: middle;
}
.osaka:hover{
	background:#c71585;color:#ffffff;
}
.nagoya, .nagoya:visited{
	font-size:14px;
	font-weight:bold;
	background:#2e8b57;
	display:inline-block;
	padding:5px 30px 8px 28px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:0px 0px 0px 0;
	vertical-align: middle;
}
.nagoya:hover{
	background:#006400;color:#ffffff;
}
.fukuoka, .fukuoka:visited{
	font-size:14px;
	font-weight:bold;
	background:#ff8c00;
	display:inline-block;
	padding:5px 30px 8px 28px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:0px 0px 0px 0;
	vertical-align: middle;
}
.fukuoka:hover{
	background:#d2691e;color:#ffffff;
}
.tokyo2, .tokyo2:visited{
	font-size:12px;
	background:#1e90ff;
	display:inline-block;
	padding:2px 10px 2px 10px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:0px 0px 0px 0;
	vertical-align: middle;
}
.tokyo2:hover{
	background:#0062b3;color:#ffffff;
}
.osaka2, .osaka2:visited{
	font-size:12px;
	background:#ff69b4;
	display:inline-block;
	padding:2px 10px 2px 10px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:0px 0px 0px 0;
	vertical-align: middle;
}
.osaka2:hover{
	background:#c71585;color:#ffffff;
}
.nagoya2, .nagoya2:visited{
	font-size:12px;
	background:#2e8b57;
	display:inline-block;
	padding:2px 10px 2px 10px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:0px 0px 0px 0;
	vertical-align: middle;
}
.nagoya2:hover{
	background:#006400;color:#ffffff;
}
.fukuoka2, .fukuoka2:visited{
	font-size:12px;
	background:#ff8c00;
	display:inline-block;
	padding:2px 10px 2px 10px;
	color:#ffffff;
	text-decoration:none;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:none;
	position:relative;
	cursor:pointer;
	margin:0px 0px 0px 0;
	vertical-align: middle;
}
.fukuoka2:hover{
	background:#d2691e;color:#ffffff;
}
letterbox, .letterbox {
	width: 600px;
	clear: both;
	float: left;
	margin-left: 10px;
}
</style>

	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>

	<div class="step_title">
		ワーキング・ホリデー交流会（パーティー）
	</div>
	  <p class="text01">日本ワーキングホリデー協会では、毎月一回オフィスで皆さまと一緒に楽しい時間を過ごすワーキング・ホリデー交流会（パーティー）を開催しています。パーティーにはワーキングホリデーや留学の準備をしている人はもちろん、これから出発される方やすでにワーキングホリデーや留学を終えて日本に帰ってきている人も参加されます。<br/ ><br/ >
				ワーキング・ホリデー交流会（パーティー）に参加して、ワーホリ＆留学仲間を増やしましょう！
			</p>

	  <table class="tableofcontents">
	   	 <tr>
		  <th>目次</th>
		  <td>
		    <ul>
			  <li><a href="#st1">ワーキング・ホリデー交流会（パーティー）って何？</a></li>
			  <li><a href="#st2">次回開催のスケジュール</a></li>
			  <li><a href="#st3">ワーキング・ホリデー交流会（パーティー）の様子</a></li>
			  <li><a href="#st4">過去の交流パーティー</a></li>
		    </ul>
		  </td>
		</tr>
	  </table>

		<br />
	<h2 id="st1" class="sec-title">ワーキング・ホリデー交流会（パーティー）って何？</h2>
		<img src="/party/images/party_image.jpg">
		<p class="text">
		日本ワーキング・ホリデー協会では、毎月1回ワーキング・ホリデー交流会（パーティー）を開催しています。<br/ ><br/ >
		ワーキング・ホリデー交流会（パーティー）では軽食を食べながら、みんなで話したりゲームをして盛り上がります！また、季節に応じてお花見、夏祭り、ハロウィン、クリスマスなど、様々なテーマで趣向を凝らし、皆様をお迎えしています。<br/ ><br/ >
		ワーキング・ホリデー交流会（パーティー）にはワーキングホリデー・留学を検討されている方、出発に向けて準備を進められている方はもちろん、すでにワーキングホリデー・留学から帰国された方々も参加されます。
		今まで海外渡航を夢見ていたけれどなかなか動きだせなかった方！帰国者の体験談聞いたり、出発直前の方の夢や意気込みを直接を聞くことが出来るチャンスですよ♪<br/ ><br/ >
		はじめての参加、お一人での参加、友達と一緒に参加、なんでもＯＫ！
		ワーキング・ホリデー交流会（パーティー）に参加してみんなでワーホリ＆留学仲間をつくり、感動するワーホリ！略して「感ホリ☆」を作っていきましょう♪
		</p>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>


	<h2 id="st2" class="sec-title">次回開催のスケジュール</h2>
		<center>
		<font size="3">
			お近くの会場をお選びください！
		</font>
		</center>

<?php
	if($header_obj->computer_use() || $_SESSION['pc'] == 'on'){
		//PCの場合
?>
		<center>
			<a class="tokyo" href="#tokyo">TOKYO</a>
			<a class="osaka" href="#osaka">OSAKA</a>
			<a class="nagoya" href="#nagoya">NAGOYA</a>
			<a class="fukuoka" href="#fukuoka">FUKUOKA</a>
		</center>
<?php
}else{
		//SPの場合
?>
		<center>
			<a class="tokyo2" href="#tokyo">TOKYO</a>
			<a class="osaka2" href="#osaka">OSAKA</a>
			<a class="nagoya2" href="#nagoya">NAGOYA</a>
			<a class="fukuoka2" href="#fukuoka">FUKUOKA</a>
		</center>
<?php
}
?>

	<br/ >
	
	<hr style="border: dotted; color: #cccccc;" size="1" width="85%"; />

	<br/ >

	  		<table>

				<tr>
					<td><h2 id="tokyo" class="counselor-tokyo2">東京オフィス</h2></td>
				</tr>
				<tr>
					<td>
<?php

						$config = array( 'view_mode' => 'list' ,'list' => array('detail_open' => 'off', count_field_active => 'none','backcolor' => '#1e90ff','place_default' => 'tokyo','keyword' => '東京交流') );
						$sm = new SeminarModule($config);
						echo ($sm->get_add_js());
						echo ($sm->get_add_css());
						echo ($sm->get_add_style());
						$ret = $sm->show();

						echo '<br/>';

						$config = array( 'view_mode' => 'list' ,'list' => array('detail_open' => 'off', count_field_active => 'none','backcolor' => '#1e90ff','place_default' => 'event','keyword' => '東京交流') );
						$sm1 = new SeminarModule($config);
						echo ($sm1->get_add_js());
						echo ($sm1->get_add_css());
						echo ($sm1->get_add_style());
						$ret1 = $sm1->show();

						if ( !($ret === true) && !($ret1 === true))	{
							echo '<span style="display: block; font-size: 14px; text-align: center;">現在、予定はありません。</span>';
						}
?>

					</td>
				</tr>
				<tr>
					<td><h2 id="osaka" class="counselor-osaka">大阪オフィス</h2></td>
				</tr>
				<tr>
					<td><?php $config = array( 'view_mode' => 'list' ,'list' => array('multi_use' => 'on','detail_open' => 'off', count_field_active => 'none','backcolor' => '#ff69b4','place_default' => 'osaka','keyword' => '大阪交流') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show(); echo ($ret === true) ? '' : '<span style="display: block; font-size: 14px; text-align: center;">現在、予定はありません。</span>'; ?></td>
				</tr>
				<tr>
					<td><h2 id="nagoya" class="counselor-nagoya">名古屋オフィス</h2></td>
				</tr>
				<tr>
					<td><?php $config = array( 'view_mode' => 'list' ,'list' => array('multi_use' => 'on','detail_open' => 'off', count_field_active => 'none','backcolor' => '#2e8b57','place_default' => 'nagoya','keyword' => '名古屋交流') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show(); echo ($ret === true) ? '' : '<span style="display: block; font-size: 14px; text-align: center;">現在、予定はありません。</span>'; ?></td>
				</tr>
				<tr>
					<td><h2 id="fukuoka" class="counselor-fukuoka">福岡オフィス</h2></td>
				</tr>
				<tr>
					<td><?php $config = array( 'view_mode' => 'list' ,'list' => array('multi_use' => 'on','detail_open' => 'off', count_field_active => 'none','backcolor' => '#ff8c00','place_default' => 'fukuoka','keyword' => '福岡交流') ); $sm = new SeminarModule($config); echo ($sm->get_add_js()); echo ($sm->get_add_css()); echo ($sm->get_add_style()); $ret = $sm->show(); echo ($ret === true) ? '' : '<span style="display: block; font-size: 14px; text-align: center;">現在、予定はありません。</span>'; ?></td>
				</tr>
			</table>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>


	<h2 id="st4" class="sec-title">過去のワーキング・ホリデー交流会（パーティー）</h2>
		<p class="text">
		過去のワーキング・ホリデー交流会（パーティー）の様子は、ワーホリ協会Facebookから確認できます！
		</p>

<div class="fbdiv" style="text-align: center;">
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4&appId=406032382880241";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	<div class="fb-page" data-href="http://www.facebook.com/JapanWorkingHoliday/photos_stream?tab=photos_albums" 
		data-width="500" data-height="1700" 
		data-small-header="false" 
		data-adapt-container-width="true" 
		data-hide-cover="false" 
		data-show-facepile="true" 
		data-show-posts="true">
		<div class="fb-xfbml-parse-ignore">
			<blockquote cite="http://www.facebook.com/JapanWorkingHoliday">
				<a href="http://www.facebook.com/JapanWorkingHoliday">日本ワーキングホリデー協会　</a>
			</blockquote>
		</div>
	</div>
</div>

	<div class="top-move"><p><a href="#header">▲ページのＴＯＰへ</a></p></div>

</div>

<? include('./step/memline.php'); ?>
	<div class="step_box">

	</div>
	<div style="clear:both; height:10px;">&nbsp;</div>


	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>