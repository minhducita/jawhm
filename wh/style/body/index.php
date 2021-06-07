<?php
require_once '../../../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='ワーホリでの生活の変化で痩せる';
$header_obj->description_page='渡航をしてワーホリ生活を始めると、生活習慣の変化で痩せることも太ることもあります。節約をすることで栄養不足にならないように、また現地に合わせて太り過ぎないように、アクティビティにも参加して体調管理に努めて下さい。';
$header_obj->keyword_page='ワーホリ,痩せる,太る,体調管理,食事';


$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーホリでの生活変化について';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
    
 <!-- コンテンツここから -->

	  <h2 class="sec-title">ワーホリの生活で痩せること、太ること</h2>
    
	 <!-- <p class="text01">
    ワーキングホリデーでホームステイをする際に持って行くと喜ばれるお土産を紹介します。日本独特のものを現地にもっていってプレゼントすると大変、喜んでもらいます。ワーキングホリデー以外にも留学でホームステイを予定している方の参考になれば幸いです。
    </p> --><!-- /.text01 --> 
    
	  <h3 class="h3-01">ワーホリ生活では体調を一定に</h3>
	  <p class="text01">
	  	  ワーホリに行くと痩せることも太ることもあります。原因は生活習慣の違いだといえます。<br>
   		  習慣が変わると食べる量に変化が起き、体調に影響を及ぼすことがあるわけです。心身の健康を保つことで充足感のあるワーホリ生活を送って下さい。</p>
    
	  <h3 class="h3-01">ワーホリ生活で痩せるということ</h3>	 
	  <p class="text01">
	  	  ワーホリ生活を送っている時に節約を意識しすぎて痩せることがあります。<br>
	  	  削りやすい食費を減らすことで痩せるというパターンは珍しくありません。ただし栄養が不足すると病気になりやすくなり、その結果治療費がかかって生活費が増してしまうことがあります。このようなことが続くと、適応障害のような病気を引き起こす可能性があります。<br>
	  	  異文化で生活をしていると気持ちの乱れにつながりやすいですが、精神を一定に保って暮らすことが充実したワーホリ生活を送るポイントになります。</p>
    
    <h3 class="h3-01">食事量の違いに注意</h3>	 
	  <p class="text01">
	    食習慣が変わると太る人のほうが多いようです。<br>
		カナダ人やオーストラリア人は日本人よりも体が大きいので、彼らに合わせた食事をしていると自然に太りやすいです。一般的に彼らは食べる量も飲む量も多く、普段の食事だけでなくバーベキューなども頻繁に行うことから、ホームステイをしているとどうしても一回あたりの食事量が増えてしまします。<br>
		家族に対して遠慮をするのは難しいですが、適正な食事量を心がけることが健康につながります。
		<span class="imgBox"><img src="imges/50_whm.jpg"></span>
		</p>
   
    <h3 class="h3-01">渡航先独自のアクティビティへの参加</h3>	 
	  <p class="text01">
	    アクティビティに積極的に参加をすることは、心身を健康に保つことにプラスになります。<br>
		ワーホリ生活も時間が経つと新鮮味が薄れて、毎日同じような行動を取ることがあります。特に多くアルバイトをこなしていると単調な生活になってしまうので、適度にアクティビティに参加することは生活にアクセントをもたらします。<br>
		日本では行わなかったスポーツに参加できることも、ワーホリならではの機会だといえます。</p>
		
		 <h3 class="h3-01">日本に戻ってからの体調の変化</h3>	 
	  <p class="text01">
	  		 日本に戻ってきてからは生活習慣を戻すことになるので、再び注意が必要です。<br>
	  		 観光やアルバイトを中心とした生活から、規則正しい生活をして企業で働くようになるわけですから、ワーホリ滞在中以上に健康管理が問われることになります。ワーホリで太ってしまった人も、日本で働いているうちに適正な体重に戻るケースがあります。渡航中でも日本に帰ってからも、その環境に適応して体調に波を作らないようにしましょう。</p>
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