<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='ワーホリへ行く際に衣類など事前に準備するべき必需品';
$header_obj->description_page='ワーホリに行く際に荷物はもちろん少ないほうがいいですが、肌に触れるものや海外とのサイズの関係で日本で用意したほうが良い物もあります。事前に何が必要なのかを調べましょう。';
$header_obj->keyword_page='ワーホリ,衣類,気候,靴,必需品';


$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーホリの事前準備について';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
    
 <!-- コンテンツここから -->

	  <h2 class="sec-title">ワーホリに行く際、衣類などの必需品は持って行くべき？</h2>
    
	 <!-- <p class="text01">
    ワーキングホリデーでホームステイをする際に持って行くと喜ばれるお土産を紹介します。日本独特のものを現地にもっていってプレゼントすると大変、喜んでもらいます。ワーキングホリデー以外にも留学でホームステイを予定している方の参考になれば幸いです。
    </p> --><!-- /.text01 --> 
    
	<h3 class="h3-01">事前に必要な衣類はある程度準備しておこう！</h3>
	  <p class="text01">
	    ワーホリに持って行く衣類は現地の気候と滞在期間を考えた上で選びましょう。<br>
	    もちろん現地で衣類を調達することはできますが、日本製の衣類は断然質が高く、自分の好みや体質に合ったものを準備しやすいです。快適な現地生活を送るためにも渡航前に現地の状況をしっかりと調べておきましょう。
    
	      </p>
    
	<h3 class="h3-01">渡航先の気候を事前に知ろう！</h3>	 
	  <p class="text01">
	    現地の気候を下調べするとその国での必需品が自ずと分かります。<br>
	  	例えば、オーストラリアは日差しが強い国なので帽子・日焼け止め・サングラスは欠かせません。帽子とサングラスは現地で調達するとして、日焼け止めなど直接肌に塗りこむものなどは、肌トラブルに繋がることもあるため、普段使用しているものを準備して持って行くと安心できます。<br>
	  	このように事前に日本で必要なものを考え、準備しておくことが重要です。</p>
    
    <h3 class="h3-01">使いやすく履きやすい靴を持ってワーホリへ</h3>	 
	  <p class="text01">
	    渡航先の暮らし方に合った靴を用意しましょう。<br>
	    普段よく履く靴は日本から持参することをオススメします。やはり履き慣れたものがよいということが主な理由です。<br>
	    またワーホリではアクティビティに参加し、雄大な自然と親しむ機会があります。その為、野山に入って活動する際にはブーツやトレッキングシューズなどが必要になります。<br>
	    その他様々な状況を想定してたくさん靴を持っていきたいと考える方も多いと思いますが、できるだけ厳選して荷物は少なく渡航しましょう。もちろんそれらの靴は現地で購入が可能です。
	    <span class="imgBox"><img src="imges/32_whm.jpg"></span></p>
   
    <h3 class="h3-01">現地調達できるものを知ろう！</h3>	 
	  <p class="text01">
	    日本で事前に用意して持ち込んだほうが良い物もありますが、一方で、やはり渡航する際の荷物はできるだけ少ないほうが望ましいです。<br>
	    なので、日本から持っていく必要があるものと現地で調達できそうなもの・してもいいものを事前に確認しておきましょう。前述したことも参考にしつつ、その上でどうするか計画を立てましょう。<br>
	    持っていくものは最小限で、なるべくは現地でそろえることができるものはそろえるようにしましょう。</p>
	    
	<h3 class="h3-01">衣類の収納方法</h3>	 
	  <p class="text01">
	    衣類を持ち込むとした場合、荷物がかさばるのが問題としてあげられます。<br>
	    その問題を解消するアイテムが「圧縮袋」です。衣類は圧縮袋に入れておけばかなり荷物を少なくすることができます。<br>
	    昨今では、100円均一で手軽に購入することができるので、ワーホリの際には是非活用してみてください。</p>
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