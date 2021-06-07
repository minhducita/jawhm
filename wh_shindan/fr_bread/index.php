<?php
$start_date = date('Y-m-d');
$end_date = date('Y-m-d', strtotime(date('Y-m-d') . "+14 days"));
include '../../seminar_module/seminar_module.php';
$config = array(
    'view_mode' => 'list',
    'dummy_mode' => 'on'
);
$sm = new SeminarModule($config);
$config = array(
	'view_mode' => 'list',
  'start_date' => $start_date,
  'end_date' => $end_date,
  'show_limit' => 15,
  'list' => array(
    'past_view' => '',
    'keyword' => '渡航相談会',
    'count_field_active' => '',
  )
);
require_once '../../include/header.php';
$header_obj = new Header();

$header_obj->title_page='日本ワーキング・ホリデー協会（ワーホリ)| 年2万人超のセミナー来場者数';
$header_obj->description_page='わたしはフランスパンタイプでした！　┃あなたはどのタイプ？　ワーホリ ダイスキ診断　┃日本ワーキング・ホリデー協会';
if($header_obj->computer_use() == false && $_SESSION['pc'] != 'on'){
	$header_obj->add_css_files = "<link href='/css/top/top_mobile.css' rel='stylesheet' type='text/css'>";
}
$header_obj->add_css_files = "<link href='../css/style.css' rel='stylesheet' type='text/css'>";
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../../images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'メンバーログイン | メンバー専用ページ';
$header_obj->full_link_tag = true;
$header_obj->add_js_files = $sm->get_add_js() . '<script type="text/javascript" src="/wh_shindan/script.js"></script>';

/** Config meta Facebook **/
$header_obj->metaAdd = true;
$header_obj->metaOgTitle = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$header_obj->metaOgDescription = 'わたしはフランスパンタイプでした！　┃あなたはどのタイプ？　ワーホリ ダイスキ診断　┃日本ワーキング・ホリデー協会';
$header_obj->metaOgUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
/** end Facebook **/
$header_obj->display_header();
?>

<body>

<div id="pancake_wrap">
	<div class="head-area">
		結果発表！
	</div>
	<div class="image-area">
		<img src="../img/shindan_result_fr_bread.png" />
	</div>
	<div class="title-area">
		調理されても崩れない！<br />
		その安定感がポイントです。
	</div>
	<div class="common-area">
		先のことをしっかり考えて行動する<br />
		慎重行動派なタイプです。
	</div>
	<div class="common-area">
		自分が納得するプランを追求するため、<br />
		時間がかかってしまうこともあります。
	</div>
	<div class="common-area">
		しかし、持ち前の芯の強さから<br />
		渡航後は抜群の安定感を誇ります。
	</div>
	<div class="image-text">
		<img src="../img/shindan_result_seminar.png" />
	</div>
	<?php include '../include/fr_bread.php'; ?>
	
	<div class="common-area">
		結果を友達にシェアしよう！
	</div>
	<div class="share-area">
		<table>
			<tr>
				<td>
					<a class="fb-share" href="https://www.facebook.com/sharer/sharer.php?u=http://<?php echo $_SERVER[HTTP_HOST]; ?>/wh_shindan/fr_bread/" target="_blank"><img src="../img/shindan_fb.png" /></a>
				</td>
				<td><a href="https://twitter.com/intent/tweet?original_referer=https://jawhm.bluecloudvn.com%2F&amp;ref_src=twsrc%5Etfw&amp;text=わたしはフランスパンタイプでした！　┃あなたはどのタイプ？　ワーホリ ダイスキ診断　┃日本ワーキング・ホリデー協会&tw_p=tweetbutton&amp;url=https://<?php echo $_SERVER[HTTP_HOST]; ?>/wh_shindan/fr_bread/"><img src="../img/shindan_tw.png" /></a></td>
				<td><a class="line-share" href="https://social-plugins.line.me/lineit/share?url=https://<?php echo $_SERVER[HTTP_HOST]; ?>/wh_shindan/fr_bread/" target="_blank"><img src="../img/shindan_line.png" /></a></td>
			</tr>
		</table>
	</div>
	<div class="common-area">
		<!-- old: href="#contentsbox-new" -->
		<a href="/wh_shindan"><img src="../img/shindan_circle.png" /> <b>診断 TOP に戻る</b></a>
	</div>
</div>
<?php fncMenuFooter($header_obj->footer_type); ?>

<script>
$(document).ready(function() {
    $('.fb-share').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'fbShareWindow', 'top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        return false;
    });
	$('.line-share').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'fbShareWindow', 'top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        return false;
    });
});
</script>
</body>
</html>
