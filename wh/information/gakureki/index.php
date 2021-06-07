<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='ワーホリと低学歴';
$header_obj->description_page='ワーキングホリデーで渡航することや語学力の向上に、日本での学歴は関係ありません。低学歴でも高学歴でも、目的を持って意欲的に取り組むことで、ワーホリ生活を充実させられます。';
$header_obj->keyword_page='ワーホリ,低学歴,語学力,経験,就職';


$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーホリと低学歴について';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
    
 <!-- コンテンツここから -->

	  <h2 class="sec-title">ワーキングホリデーと学歴について</h2>
    
	 <!-- <p class="text01">
    ワーキングホリデーでホームステイをする際に持って行くと喜ばれるお土産を紹介します。日本独特のものを現地にもっていってプレゼントすると大変、喜んでもらいます。ワーキングホリデー以外にも留学でホームステイを予定している方の参考になれば幸いです。
    </p> --><!-- /.text01 --> 
    
	  <h3 class="h3-01">ワーキングホリデーと学歴の現状</h3>
	  <p class="text01">
	  	  ワーキングホリデーに学歴は関係ありません。<br>
	  	  渡航をすることの目的と目標をしっかりと持ち、準備を万全にして積極的に現地に溶け込む。そうして得た経験は渡航者にとって必ずプラスになります。日本での学歴にこだわらず、自分だけの体験や思考を身につけるためにワーホリという機会を最大限に利用しましょう。</p>
    
	  <h3 class="h3-01">語学力の向上</h3>	 
	  <p class="text01">
	  	  ワーホリで語学力を向上させることに学歴は必要ありません。<br>ワーホリの期間中、目的を持って現地で語学を学ぶことは大きな成長につながります。その際には会話だけでなく読み書きにも力を入れるようにして下さい。いざ外国語を用いて働くとなるとメールやビジネス文書の作成に読み書き能力が必要になるからです。学校の語学の授業が苦手だったとしても、現地にいるのなら現地語に親しむことになり、地元の新聞や広告を読んで理解することもプラスに働きます。
	 <span class="imgBox"><img src="imges/54_whm.jpg"></span>
	 	 </p>
    
    <h3 class="h3-01">経験を生かして日本で働く</h3>	 
	  <p class="text01">
	    単純に日本で就職を考えた場合、高学歴のほうが望む仕事に就きやすいことはご存知の通りです。<br>
	    そういった状況の中でワーホリの体験を生かすには、実際に現地で働くという方法があります。日本人観光客を相手にすることや、日本料理店で働くのではなく、企業で働くことが求められます。そうなると一定以上の語学能力とその分野での経験があることが望ましいです。<br>
	    この方法を考えた場合渡航前から渡航後のことを考えて行動をするべきですが、ワーホリの機会を最大限に生かすためにこのようなプランを立ててもいいと思います。</p>
   
    <h3 class="h3-01">現地で就職をして働く</h3>	 
	  <p class="text01">
	    現地で本格的に就職をするのであれば、日本での学歴は関係なくなります。<br>
	    簡単には就職できないので、現地で活発に交流をして人脈を作って就職に結びつけましょう。その場合は、長期に渡って現地で働くことを前提として計画を立てることです。<br>
	    つまり、ビザの切り替えを法律に則って行わなければならないということになります。国によってルールが違うので確認が必要です。また現地での就職を考えたら、同程度の能力の現地人よりも秀でたものがなければなりません。帰国してからの就職と同様に、計画を立てて柔軟に行動しましょう。</p>
		
		 <h3 class="h3-01">諸外国と学歴</h3>	 
	  <p class="text01">
	  		 先進国は日本と同じように学歴社会であることがほとんどです。<br>
			 お隣の韓国では学歴が将来の仕事に大きな影響を与えるので、大学受験が社会的にも重要視されています。ワーホリ非対象国ではありますが、アメリカ・ニューヨークでは幼稚園入試のための塾での競争が加熱しています。先進国ではこのような事態は珍しくないものの、ワーホリでは受験や学歴にとらわれない様々な体験によって知見を広げることが可能です。<br>
			 そのような機会が多くあるワーホリ生活を充実したものにしてもらいたいと思います。</p>
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