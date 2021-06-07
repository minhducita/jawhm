<?php
require_once 'include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;


$header_obj->title_page='セミナー参加者の声';

$header_obj->description_page='無料の留学・ワーキングホリデーセミナーにご参加頂いた方の声をご紹介しています。日本ワーキングホリデー協会の無料セミナーは全国５都市で毎日開催しています。';
$header_obj->keyword_page = '留学,ワーホリ,ワーキングホリデー,セミナー,説明会,参加者,フィードバック,アンケート,口コミ';

$header_obj->add_js_files = '';
$header_obj->add_css_files='<link href="/css/feedback.css" rel="stylesheet" type="text/css" />';
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="images/mainimg/feedback-banner.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'はじめてのワーキングホリデー';

$header_obj->display_header();
include('calendar_module/mod_event_horizontal.php');

?>
<?php // access

require_once $_SERVER['DOCUMENT_ROOT'].'/mailsystem/mem/php/fnc_dbopen.php';

require(dirname(__FILE__) . '/feedback/_includes/functions.php');
require(dirname(__FILE__) . '/feedback/_includes/FeedBack.php');
$feedback = new FeedBack();

$feedback_header = $feedback->find('`onShow` = :onShow ORDER BY createdDate  ', array(':onShow'=>1)); 
?>
<div id="maincontent">
	<?php echo $header_obj->breadcrumbs(); ?>
	<h2 class="sec-title">ワーホリ・留学の無料セミナーのご案内</h2>
    <div class="topfeedback">
        <p>ワーキングホリデーセミナーでは</p>
        <table class="pcflg" style="margin: 10px 0 10px 20px; font-size:10pt;">
            <tbody><tr>
                <td>●　ワーキングホリデービザの取得方法</td>
                <td>&nbsp;</td>
                <td>●　ワーキングホリデービザで出来ること</td>
            </tr>
            <tr>
                <td>●　ワーキングホリデーに必要なもの</td>
                <td>&nbsp;</td>
                <td>●　各国の特徴</td>
            </tr>
            <tr>
                <td>●　ワーキングホリデーの最近の傾向</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">●　ワーキングホリデーに興味はあるけれど、何から始めていいのか解らない方</td>
            </tr>
		</tbody></table>
		<ul class="mbflg">
                <li>ワーキングホリデービザの取得方法</li>
                <li>ワーキングホリデービザで出来ること</li>
                <li>ワーキングホリデーに必要なもの</li>
                <li>各国の特徴</li>
                <li>ワーキングホリデーの最近の傾向</li>
                <li>ワーキングホリデーに興味はあるけれど、何から始めていいのか解らない方</li>
		</ul>
		<div style="width: 100%; height: 1px; clear: both; padding-bottom: 10px;"></div>
        <p>などのお話を致します。</p>
        <p>
            &nbsp;<br>
            各セミナーには質疑応答時間もありますので、遠慮されずに積極的に質問してくださいね。<br>
            &nbsp;<br>
            現地でのアルバイトやシェアハウスの見つけ方等、なんでもご質問にお答え致します。<br>
            お友達もお誘いの上、どうぞご参加ください。<br>
            &nbsp;<br>
            また、参加者の９割の方は、お一人でのご参加です。<br>
            お一人でもお気軽にお越しください。<br>
            <a href="http://www.jawhm.or.jp/qa_seminar.html" target="blank">⇒　セミナーに関するQ&amp;Aはこちらから</a>
            &nbsp;<br><br>
        </p>
    </div>
	<a href="/seminar/">
		<div class="feedbackregister fbrtop">
			<p>海外生活があなたを変える</p>
			<h3>留学・ワーホリの無料セミナーはこちら <span class="fa fa-play-circle-o"></span></h3>
		</div>
	</a>
	<h2 class="sec-title">当協会のセミナーにご参加頂いた方の声をご紹介します</h2>
    <div class="clear"></div>
	
		<?php if(!empty($feedback_header)){$star_type = "blue";$j=0;$mal = 1;$fam = 1;$defa = 1;$total_fb = count($feedback_header);foreach($feedback_header as $i => $v){?>
			<?php 
				$j++;
				/*icon gender*/
				if(strpos($v['comment'],"女性")){
					$gender_img  = "/images/feedback/iconfemale".$mal++.".png";
					$mal= ($mal == 4)?1:$mal;
				}elseif(strpos($v['comment'],"男性")){
					$gender_img  = "/images/feedback/iconmale".$fam++.".png";
					$fam = ($fam == 4)?1:$fam;
				}else
					$gender_img  = "/images/feedback/iconrandom".$defa++.".png";
					$defa = ($defa == 3)?1:$defa;
				$star_type = ($i%2 == 0)?"blue":"red";
				$button = "";
				$header = "";
				$footer = "";
				if($j == 1){
					$header = '<div class="capture">';
				}
				if($j == 12){
					$footer = '</div><div class="clear"></div>
								<a href="/seminar/">
									<div class="feedbackregister">
										<p>海外生活があなたを変える</p>
										<h3>留学・ワーホリの無料セミナーはこちら <span class="fa fa-play-circle-o"></span></h3>
									</div>
								</a>';
					$j = 0;
				}
				if(($i == $total_fb - 1) and empty($footer)){
					$footer = '</div><div class="clear"></div>
								<a href="/seminar/">
									<div class="feedbackregister">
										<p>海外生活があなたを変える</p>
										<h3>留学・ワーホリの無料セミナーはこちら <span class="fa fa-play-circle-o"></span></h3>
									</div>
								</a>';
					$j = 0;
				}
				echo $header;
			?>
			<div class="dotted <?php echo $star_type?>">
				<img src="<?php echo $gender_img?>">
				<p><?php echo $v['comment']?></p>
			</div>	
			<?php echo $footer ?>
		<?php }}?>
		<div class="clear"></div>
	</div>
</div><!--maincontentEND-->
	<div style="margin:20px 0 0 0;">&nbsp;</div>
  </div>
  </div>
<?php fncMenuFooter($header_obj->footer_type); ?> 