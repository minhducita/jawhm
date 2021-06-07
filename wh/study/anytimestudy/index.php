<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='ワーホリ中勉強できる時間';
$header_obj->description_page='ワーホリ中に何を学びたいのかを明確にし、長期的な予定に組み込むことで、滞在中に勉強できる時間を確実に確保することができます。現地にいるメリットを生かして語学力の向上や歴史・文化を学ぶことを紹介しています。';
$header_obj->keyword_page='ワーキングホリデー,滞在中,勉強時間,語学力,文化';


$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーホリ期間中の勉強できる時間';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
    
 <!-- コンテンツここから -->

	  <h2 class="sec-title">ワーホリ中は勉強できる時間を自分で作れます！</h2>
    
	 <!-- <p class="text01">
    ワーキングホリデーでホームステイをする際に持って行くと喜ばれるお土産を紹介します。日本独特のものを現地にもっていってプレゼントすると大変、喜んでもらいます。ワーキングホリデー以外にも留学でホームステイを予定している方の参考になれば幸いです。
    </p> --><!-- /.text01 --> 
    
	  <h3 class="h3-01">勉強したい内容を明確にすることから！　</h3>
	  <p class="text01">
    ワーキングホリデー中の勉強するための時間は、自分の計画の立て方によって確実に作ることができます。<br>「何についての勉強をしたいのか」をはっきりさせ、それに合わせて滞在中の長期プランを立てれば、滞在先で確実に成長することができます。
    </p>

	  <h3 class="h3-01">ワーホリ中の時間の作り方！</h3>	 
	  <p class="text01">
	綿密な日常の計画を立てて、仕事の時間とアクティビティへの参加のバランスを取れば、適切な勉強時間を作ることができます。<br>最初の数ヶ月間語学学校での勉強を終えたら、あとは働きながら各アクティビティに参加するのが一般的な滞在中の日常になりますが、やはり求められることは積極性です。ワーホリ生活中であっても、日常にメリハリをつけて行動しなければ、時間が無駄になることがあります。そのため、やりたいことをはっきりさせ、語学学校で勉強している間に、その後何ができるのかを調べ上げることが生活の充実につながります。
	 	 	 </p>
    
    <h3 class="h3-01">日常会話の効果的な勉強法</h3>	 
	  <p class="text01">
	その言語の日常会話能力を向上させるためには、会話をしなければならない状況を作ることです。<br>例えば困ったことがあったらできるだけ電話をして聞いてみる／分かっていても道順を聞く／商品を買う時は要望を細かく伝えて説明を聞く／などです。こういった機会を何度も自分から作ることでやりとりの能力は確実に上がります。そして、話を聞いてくれた人との会話の終わりに相手にお礼を言うのを忘れないようにすれば、爽やかに別れることができるでしょう。<br>以上のような行動は特別な時間を作らないでもできることなので、非常に効率がいいです。
		</p>
   
    <h3 class="h3-01">会話と読み書きの能力は別物！</h3>	 
	  <p class="text01">
	その言語の読み書き能力を上達させるためには、会話とは別に勉強をしなければなりません。<br>これはアメリカ人であってもスペリングを身につけるための勉強をしている、ということからも分かるでしょう。読み書き能力向上のためには、日本にいる時と同じように机に向かうことになります。これはもちろん会話力の向上に寄与しますが、現地にいるからこそ身につけやすい能力／時間を取るべき勉強が何なのかを判別して学ぶようにしましょう。
		</p>
		
		 <h3 class="h3-01">文化や歴史を学ぶ</h3>	 
	  <p class="text01">
	ワーホリでの滞在中はその国の文化や歴史を学ぶのに最適な状況です。<br>滞在中は観光する時間が充分にあるといえるので、資料を元に現場を訪れ価値や歴史を理解することができます。その歴史や制度が人々の生活にどのような影響を与えているかは、現地で生活しているからこそ分かるといえます。<br>このような機会を無駄にせずに学ぶことがワーホリ生活の充実につながります。
		<span class="imgBox"><img src="imges/22_whm.jpg"></span>
	 		</p>
 <!-- コンテンツここまで -->  
   
	  <div class="top-move">
	    <p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>
    
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>