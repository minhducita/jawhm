<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='お土産';
$header_obj->description_page='ページの説明が入ります';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '喜ばれるお土産';

$header_obj->add_js_files='<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"></script>
<script type="text/javascript" src="script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="styles.css" />';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
    
	  <h2 class="sec-title">喜ばれるお土産を持参していって文化交流を！</h2>
    
	  <p class="text01">
    ワーキングホリデーでホームステイをする際に持って行くと喜ばれるお土産を紹介します。日本独特のものを現地にもっていってプレゼントすると大変、喜んでもらいます。ワーキングホリデー以外にも留学でホームステイを予定している方の参考になれば幸いです。
    </p><!-- /.text01 -->
    
	  <h3 class="h3-01">手軽に日本文化を伝えることができる和紙</h3>
	  <p class="text01">
    和紙は日本文化を伝えやすいのでお土産にオススメです。そのまま渡してもいいですし、折り紙状ならファミリーの目の前で鶴などを作ってみせれば驚くことでしょう。作り方を教える過程で家族とコミュニケーションをとる良いきっかけになります。手頃な値段で様々なバリエーションが用意されているので滞在先の家族が多い時もバッチリ対応できます。
    <span class="imgBox"><img src="../images/afi_kari.png"></span>
    </p>

	  <h3 class="h3-01">海外でも市民権を得ている抹茶をお手軽に作れるセット</h3>	 
	  <p class="text01">
    <span class="imgBox"><img src="../images/afi_kari.png"></span>
		海外でも「マッチャグリーンティー」の呼称で抹茶は市民権を得ているので茶道セットをプレゼントしてみるのも良いでしょう。全世界展開をしているコーヒー店でも「抹茶ラテ」が販売されるほど世界中で抹茶は知られています。本格的な茶道セットをホストファミリーにプレゼントすると大変、喜んでいただけます。茶道セットは割れ物なので持っていく際は機内持ち込みで運搬するのが良いでしょう。
		</p>
    
    <h3 class="h3-01">好評価を集めている日本のお菓子</h3>	 
	  <p class="text01">
		日本製のお菓子はとても美味しく出来ているので渡航先にプレゼントとして持って行くと喜んでもらえます。特に海外でも販売されている商品の日本限定味は珍しさも併せて大喜びしてもらえるでしょう。<br><br>
    ※オーストラリアに行く場合は、食べ物の持ち込み規制があるので注意です！！<br>　<a href="http://www.australia.or.jp/aqis/overview.php">http://www.australia.or.jp/aqis/overview.php</a><br>
    <span class="imgBox">
<img src="../images/afi_kari.png"></span>
    お菓子ならば旅立つ空港の売店でも購入できるからお手軽に用意できます。ワーキングホリデー先に持ち込む際はしっかりと持込食品として申告してください。わからないことがあったら機内のキャビンアテンダントに尋ねれば適切な申告方法を教えてくれます。
		</p>
   
	  <div class="top-move">
	    <p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>