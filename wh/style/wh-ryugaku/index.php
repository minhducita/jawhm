<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='ワーキングホリデーの留学デビュー';
$header_obj->description_page='ワーキングホリデーから留学を考えた場合は、ビザの変更が必要となります。ビザは国によって違うものなので注意が必要であり、何のための滞在かをはっきりさせる必要もあります。ワーホリと留学の違いも掲載しています。';
$header_obj->keyword_page='ワーキングホリデー,留学,デビュー,ビザ,期限';


$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーキングホリデーと留学の違いについて';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
    
 <!-- コンテンツここから -->

	  <h2 class="sec-title">ワーキングホリデーからの留学デビュー</h2>
    
	 <!-- <p class="text01">
    ワーキングホリデーでホームステイをする際に持って行くと喜ばれるお土産を紹介します。日本独特のものを現地にもっていってプレゼントすると大変、喜んでもらいます。ワーキングホリデー以外にも留学でホームステイを予定している方の参考になれば幸いです。
    </p> --><!-- /.text01 --> 
    
	  <h3 class="h3-01">ワーキングホリデーから、留学デビューを果たそう！</h3>
	  <p class="text01">
   ワーキングホリデーで海外体験をしたあとに、留学をする人がいます。<br>
   ワーホリと留学ではビザも目的も生活も異なってくるものなので、両者の違いを理解しておくことが成功につながります。
    </p>
    
	  <h3 class="h3-01">ワーキングホリデーと留学の違い</h3>	 
	  <p class="text01">
	第一の目的として、ワーキングホリデーは休暇を過ごし勉強や働きながらその国の文化を学ぶ、留学は学校に通い勉強をするという違いがあります。<br>ワーホリは、期間も1年間限定と短く設定されています。またワーホリは18～30歳という年齢制限があります。一方留学は学生ビザで渡航するもので、語学習得などのため海外の学校に通うことができます。大学などの研究機関に所属をして技術の習得や単位の取得を目指すこともできます。所属している期間によって、留学の期間が決まります。年齢制限はありません。
	 <span class="imgBox"><img src="imges/42_whm.png"></span>
	 	 </p>
    
    <h3 class="h3-01">ワーホリビザからの切り替え</h3>	 
	  <p class="text01">
ワーキングホリデービザで入国したあとに、学生ビザに切り替えて現地で勉強をするというパターンがあります。<br>これはカナダなどのワーホリで行われることで、滞在を延長することができます。この場合は学校に入学する必要が生じるので費用がかかることになります。また就労ビザに変更をして働くことをメインに滞在することも可能です。ただし国によって事情は違い、変更が不可能な場合もあるので、ご自分の渡航先のルールを確認するようにしてください。<br>また、自分の目的に応じた正しいビザを選択するよう日本ワーキングホリデー協会のカウンセラーにご相談ください。</p>
   
    <h3 class="h3-01">海外生活と語学留学が目的なら</h3>	 
	  <p class="text01">
	「海外生活を経験したい」ということが目的であれば、ワーキングホリデーをおすすめします。<br>留学ほど勉強に主眼を置かなくとも渡航可能であり、事前に費用を用意しておくことで生活ができるからです。また語学留学をする場合でも、ワーホリで代替がききます。<br>ワーホリの場合は就労が可能なので、積極的に外国人だけの企業で働くことで、現地の言葉を使わなければならない環境で自分を鍛えられます。</p>
		
		 <h3 class="h3-01">多様な留学</h3>	 
	  <p class="text01">
ワーキングホリデーと違い、留学には語学留学から弁護士としての留学まであり、多種多様だといえます。<br>語学留学は帰国後のキャリアアップのために渡航される方が多いです。培われた語学能力をいかして他の仕事に就くという方法です。一方医者・弁護士・公務員でも留学をすることが多いです。その場合は外国の先進的な技術やシステムを学ぶことが目的です。その際は現地の言語をその場で修得することが求められるので、更なる勉強が求められるといえます。<br>どのような場合も、留学の成功は目標をしっかりと持つことです。
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