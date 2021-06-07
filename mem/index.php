<?php

//ini_set( "display_errors", "On");

?>

<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->title_page='メンバー登録について';
$header_obj->description_page='イベントカレンダー：オーストラリア・ニュージーランド・カナダを初めとしたワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。';
$header_obj->keywords_page='オーストラリア,ニュージーランド,カナダ,カナダ,韓国,フランス,ドイツ,イギリス,アイルランド,デンマーク,台湾,香港,ビザ,取得,方法,申請,手続き,渡航,外務省,厚生労働省,最新,ニュース,大使館';
$header_obj->add_js_files='<script type="text/javascript" src="/js/jquery.corner.js"></script>
<script type="text/javascript">
jQuery(function () {
	$("#step1").corner();
	$("#step2").corner();
	$("#step3").corner();
	$("#step4").corner();
	$("#step5-1").corner();
	$("#step5-2").corner();
	$("#step5-3").corner();
	$("#step6").corner();
	$("#step7").corner();
})
</script>
';
$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="../images/mainimg/mem.png" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'メンバー登録はワーホリ成功の第一歩';


$header_obj->display_header();

?>
	<div id="maincontent" class="memPage">
	  <?php echo $header_obj->breadcrumbs(); ?>
    
 	<div class="btnBox"><a href="/ryugakusupport/"><img src="/images/ryugakubanner_off.gif" alt="ワーキング・ホリデー協会では留学サポートもしています！"></a></div>

	<h2 class="sec-title">メンバー登録はワーホリ成功の第一歩</h2>
  	<div class="firstStep">
    	<img class="firstImg" src="images/first_photo01.jpg" alt="写真">
      <p class="text01">
        ワーキングホリデーや留学に興味があるけれど、海外で何ができるのか？ 何をしなければいけないのか？ どんな準備や手続きが必要なのか？ どのくらい費用がかかるのか？
        渡航先で困ったときはどうすればよいのか？ 解らない事が多すぎて、もっと解らなくなってしまいます。<br/>
        そんな皆様を支援するために当協会では、ワーホリ成功のためのメンバーサポート制度をご用意しています。
        当協会のメンバーになれば、個別相談をはじめビザ取得のお手伝い、出発前の準備、到着後のサポートまで、フルにサポートさせていただきます。<br/>
      </p>
    </div><!-- /.firstStep -->

	<div style="margin:0 10px 0 10px;">
        <div class="btnBox">
        	<a class="spView" href="./register.php"><img class="w350" src="images/memBtn.png" alt="メンバー登録フォームへ進む"></a>
          <a class="pcView" href="./register.php"><img src="images/memBtnPc.png" alt="メンバー登録フォームへ進む"></a>
        </div><!-- /.btnBox -->
    </div>

	<h2 id="meritt" class="sec-title">メンバー登録で３つのメリット</h2>
    	<p class="text01">&nbsp;&nbsp;日本ワーキング・ホリデー協会のメンバーになると、以下のサポートを受けることができます。</p>
      
      <div class="mem-box">
      
      	<section class="pcBox">        
          <p class="merit-title"><span class="txtBlue">■</span> メリット１</p>
          <div id="slidebox1" class="merit-blueframe">
            <p class="headBox">カウンセリング<br/><span><small>[完全予約制]</small></span></p>
            <ul class="float">
              <li>■ 一人一人に最適なプラン作りを支援</li>
              <li>■ 経験豊富なプロのカウンセラーがお話</li>
              <li>■ オフィスにご来店が難しい場合、電話でのご相談も可能</li>
            </ul>
          </div><!-- /.merit-blueframe -->
        </section><!-- /.pcBox -->
        
        <section class="pcBox">        
          <p class="merit-title"><span class="txtBlue">■</span> メリット２</p>
          <div id="slidebox2" class="merit-blueframe">
            <p class="headBox">ビザ申請<br/>サポート</p>
            <ul class="float">
              <li>■ 各国のワーキングホリデービザを取得する為に必要な書類のご案内</li>
              <li>■ 申請書類の書き方などビザ申請方法のご説明</li>
            </ul>
          </div><!-- /.merit-blueframe -->
        </section><!-- /.pcBox -->
        
        <section class="pcBox last">        
          <p class="merit-title"><span class="txtBlue">■</span> メリット３</p>
          <div id="slidebox3" class="merit-blueframe">
            <p class="headBox">語学学校のお手配</p>
            <ul class="float">
              <li>■ お客様のプランやニーズにあった各種学校をご紹介 </li>
              <li>■ 各種学校お申込書類の準備、お手続きをサポート</li>
              <li>■ 学生ビザ取得のお手伝い (サポート対象国のみ)</li>
            </ul>
          </div><!-- /.merit-blueframe -->
        </section><!-- /.pcBox -->
        
        <div id="slidebox4" class="merit-blueframe clear">
					<h3><span class="txtBlue">■</span> その他出発前～到着後まで様々なことをお手伝い</h3>
          <img class="center" src="images/flagImg.jpg" alt="国旗画像">
          <ul class="normalList">
          	<li>特別セミナーへのご参加</li>
<!--        <li>通常セミナーのオンライン視聴</li>-->
            <li>メンバー専用ページのご提供</li>
            <li>格安航空券のご案内</li>
            <li>宿泊先等のご案内と手配</li>
            <li>ワーキングホリデー・留学仲間との情報交換会</li>
            <li>帰国後のご相談</li>
            <li>２カ国目のワーキングホリデービザ相談</li>
            <li>世界各地のサポートオフィスの利用</li>
          </ul>
        </div><!-- /.merit-blueframe -->
        
        <div class="meritGrayBox">
        	<h3><span>登録を迷っている方…</span>無料セミナーにご参加ください！</h3>
          <p>
            当協会ではワーキングホリデー・留学について毎日無料セミナーを行っています。
            メンバー登録をされていなくても、どなたでも無料でご参加いただけますのでぜひ一度当協会へお越しください。
          </p>
        	<a class="spView" href="/seminar/seminar_syoshin.php"><img src="images/semBanner.jpg" alt="無料セミナー毎日開催中"></a>
          <a class="pcView" href="/seminar/seminar_syoshin.php"><img src="/images/seminar_b_off.png" alt="無料セミナー毎日開催中"></a>   
        </div><!-- /.meritGrayBox -->
                
        <div class="btnBox">
        	<a class="spView" href="./register.php"><img class="w350" src="images/memBtn.png" alt="メンバー登録フォームへ進む"></a>
          <a class="pcView" href="./register.php"><img src="images/memBtnPc.png" alt="メンバー登録フォームへ進む"></a>        
        </div><!-- /.btnBox -->
        
        <div id="slidebox5" class="merit-blueframe">
          <p class="fontB">
            <big><span class="txtPink">5000円</span>で<span class="txtPink">３年間有効なメンバー登録</span>で<br>
            充実のサポートを受けることができます。</big>
          </p><!-- fontB -->
          <p>メンバー登録料は５０００円で、３年間有効です。クレジットカード(VISAまたはマスター)、コンビニエンスストア、銀行振り込みでお支払頂けます。</p>
                
          <div class="paymentBox">
            <p>■ご利用いただけるクレジットカード</p>
            <img src="images/cardImg.jpg" alt="cardImg">
            <span>※JCB、アメリカンエキスプレス、ダイナース等のクレジットカードではお支払いいただけません。</span>      
    
            <p>■ご利用いただけるコンビニエンスストア</p>
            <img src="images/storeImg.jpg" alt="storeImg">
            <span>
              ※振込手数料はお客様のご負担となります。<br>
              ※領収書の発行はコンビニ店舗では行われません。<br>
              ※海外からのメンバー登録の場合、コンビニエンス決済対象外となります。
            </span>      
    
            <p>■銀行振込の場合</p>
            <img src="images/bankImg.jpg" alt="bankImg">
            <span>※振込手数料はお客様のご負担となります。</span>      
          </div><!-- /.paymentBox -->	
        </div><!-- /.merit-blueframe -->
        
        <div class="btnBox">
        	<a class="spView" href="./register.php"><img class="w350" src="images/memBtn.png" alt="メンバー登録フォームへ進む"></a>
          <a class="pcView" href="./register.php"><img src="images/memBtnPc.png" alt="メンバー登録フォームへ進む"></a>        
        </div><!-- /.btnBox -->
        
        <div class="meritGrayBox">
          <h3>ワーキングホリデーが可能な国一覧</h3>
          <img class="center" src="images/flagImg.jpg" alt="ワーキングホリデーが可能な国一覧">
          <p>
            上記の中に行きたい国がない場合も諦めないでください。日本ワーキング・ホリデー協会ではアメリカをはじめとした、ワーキングホリデー協定国以外の留学もサポートしています。
          </p>
          
          <p class="center">▼　詳細はこちら　▼</p>
          <div class="btnBox"><a href="/ryugakusupport/"><img src="/images/ryugakubanner_off.gif" alt="ワーキング・ホリデー協会では留学サポートもしています！"></a></div>        
        </div><!-- /.meritGrayBox -->           
    </div><!-- /.mem-box -->    
    
    
	<div style="height:30px;">&nbsp;</div>
    
    <div style="text-align:center;">
        <img src="../images/flag01.gif">
        <img src="../images/flag03.gif">
        <img src="../images/flag09.gif">
        <img src="../images/flag05.gif">
        <img src="../images/flag06.gif">
        <img src="../images/mflag11.gif" width="40" height="26">
        <img src="../images/flag08.gif">
        <img src="../images/flag04.gif">
        <img src="../images/flag02.gif">
        <img src="../images/flag10.gif">
        <img src="../images/flag07.gif">
    </div>

	<div style="height:50px;">&nbsp;</div>

	</div>

	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>

