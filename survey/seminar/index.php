<?php
require_once '../../include/header.php';

$header_obj = new Header();

$header_obj->title_page='ワーホリ・留学セミナーへのご意見をお待ちしております';
$header_obj->description_page='ご希望のセミナー日程や会場、内容など、ワーキングホリデー・留学セミナーへのご意見を聞かせてください。';
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーキングホリデー＆留学　パッケージプラン紹介';

$header_obj->display_header();

include('../calendar_module/mod_event_horizontal.php');
?>	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
	  <h2 class="sec-title">ご希望のセミナーが無い場合は、あなたが理想とするセミナーをリクエストしてください。</h2>
		<iframe src="https://docs.google.com/forms/d/1In75SuOXPk4tkUDRHV9oZtlrz21WmACnQPEhAVtpKXI/viewform?embedded=true" width="100%" height="1000px" frameborder="0" marginheight="0" marginwidth="0" scrolling="yes">読み込み中...</iframe>
	</div>
	  

  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>