<?php
require_once '../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='セミナー会場・オフィスのご案内';
$header_obj->description_page='ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';
$header_obj->fncMenuHead_h1text = 'セミナー会場・オフィスのご案内';

$header_obj->add_js_files='<script>
function PrintPage(){
	if(document.getElementById || document.layers){
		window.print();		//印刷をします
	}
}
</script>';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_link = 'nolink';
$header_obj->fncMenubar_function = false;

$header_obj->display_header();

if($header_obj->mobilepage && $header_obj->tablet_type === false)
{
	$iframe_width = 300;
	$iframe_height = 300;

}
else
{
	$iframe_width = 550;
	$iframe_height = 360;
}
?>

<style>
.access, .access:visited{
	font-size:14px;
	font-weight:bold;
	background:#ff9900;
	display:inline-block;
	padding:5px 10px 5px 10px;
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
.access:hover{
	background:#ff0000;color:#fff;
}
</style>
<link href="../../css/event_map.css" rel="stylesheet" type="text/css" />
	<div id="maincontent" class="marginL150">
	  <?php echo $header_obj->breadcrumbs(); ?>
	<div id="top-main" style="margin-bottom:20px;">
		<?php /*
		<div class="event-map" style="text-align:right;">
			<input type="button" value="このページを印刷" onclick="javascript:PrintPage();" style="width:200px; font-size:11pt;"><br/>
		</div> */
	$key = @$_GET['p'];
	switch($key){
		case 'tokyo':
			include("content_map/tokyo.php");
			break;
		case 'osaka':
			include("content_map/osaka.php");
			break;
		case 'nagoya':
			include("content_map/nagoya.php");
			break;
		case 'fukuoka':
			include("content_map/fukuoka.php");
			break;
		case 'okinawa':
			include("content_map/okinawa.php");
			break;
		default:
			include("content_map/tokyo.php");
			include("content_map/osaka.php");
			include("content_map/nagoya.php");
			include("content_map/fukuoka.php");
			include("content_map/okinawa.php");
			break;
	}
?>
	</div><!--top-mainEND-->
	</div><!--maincontentEND-->

  </div><!--contentsEND-->
  </div><!--contentsboxEND-->

<?php fncMenuFooter($header_obj->footer_type);?>
</body>
</html>