<?php
require_once '../include/header.php';

$header_obj = new Header();

$header_obj->fncFacebookMeta_function=true;

$header_obj->title_page='家電について';
$header_obj->description_page='ページの説明が入ります';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = '電圧対応機器';

$header_obj->add_js_files='<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.flip.min.js"></script>
<script type="text/javascript" src="script.js"></script>';
$header_obj->add_css_files='<link rel="stylesheet" type="text/css" href="styles.css" />';

$header_obj->display_header();

?>
	<div id="maincontent">
	  <?php echo $header_obj->breadcrumbs(); ?>
    
    <section>
      <h2 class="sec-title">電化製品について</h2>
      <h3 class="h3-01">コンセントと家電の関係</h3>
      
      <p class="text01">
      電化製品は、充電タイプ・充電が必要ないタイプ共に、基本的にコンセントから電気の供給を受ける必要があります。<br>
      その中には、ACアダプターを間に挟むタイプと、そうでないタイプがあります。<br>
      日本国内ではType-Aのコンセントが使用されており、国内販売されている家電もそれに準じた仕様になっていますが、海外ではそれぞれの国に応じてコンセントの形や電圧などが様々なため、自身の行く国にあったものを使用する必要があります。

      <span class="imgBox"><img src="../images/counselor/denatsu01.jpg"></span>
      </p><!-- /.text01 -->
    </section>
    
    <section>
      <h2 class="sec-title">電圧対応機器の確認方法</h2>
      <h3 class="h3-01">一部の電化製品はプラグを変換するだけで現地でも利用を継続できる</h3>
      
      <p class="text01">
      デジタルカメラ、ノートPC、携帯電話などの一部の電化製品はプラグだけを変換すればそのまま海外でも使用可能なので充電器をチェックしてください。充電器に100-240V対応と記載してあれば留学先のジャックに合わせるだけで利用可能です。アメリカやカナダは差し込むだけで使用可能です。
      <span class="imgBox"><img src="../images/counselor/electronics_denatsu.png"></span>
      </p><!-- /.text01 -->
    </section>
    
    <section>
      <h3 class="h3-01">全世界対応電化製品を使う</h3>
      <p class="text01">
      湯沸し器、ドライヤー、ヘアアイロン、電子ジャーは全世界対応製品があるので国内で用意してから渡航するのも用意でしょう。留学先の電源差込口に合わせたものにして使用しましょう。滞在先だけでなく今後、海外旅行に出かける際も利用することができます。<br><br>※海外対応であっても、切り替えスイッチなどがある場合があるので注意！！<br>        
      </p>
      
      <h4>国内・海外対応済みドライヤー</h4>
      <span class="imgBox"><img src="../images/afi_kari.png"></span>
      
      <h4>全世界対応電子ジャー</h4>
      <span class="imgBox"><img src="../images/afi_kari.png"></span>
      
      <h4>全世界対応ヘアアイロン</h4>
      <span class="imgBox"><img src="../images/afi_kari.png"></span>
    </section>
		
    <section>
      <h3 class="h3-01">変圧器を使用する</h3>	 
      <p class="text01">
      海外対応変圧トランスを通せば日本製の電化製品も安全に利用できます。限度はありますが変圧器に電源タップを通して利用することも十分に可能です。安全な環境で日本の電化製品を利用することができます。小さなワット数であれば、変圧器を挟んでもOKです。
      </p>
      <h4>全世界対応変圧器</h4>
      <span class="imgBox"><img src="../images/afi_kari.png"></span>
    </section>
    
    <section>
      <h3 class="h3-01">プラグがさせても使用するのは危険です</h3>	 
      <p class="text01">
      「入力AC100Vまで」と記載してあったら例え電源に差し込めても危険なので使用は控えてください。電化製品が破損するだけでなく火花が怪我や火事の原因になったり、器物破損した場合には賠償問題に発展する可能性があります。<br>どうしても100V対応のドライヤーを持って行きたい！とお思いの方もいらっしゃるかと思いますが、その場合には1500Wの変圧器が必要になります。安全な渡航生活のためにも、正しい使い方を心がけましょう。
      </p>
      
      <h4>電圧＆差し込みプラグ対応表</h4>
      <p class="text01">渡航先の電圧、電源差し込み口の質問が沢山よせられたので早見表にまとめました。滞在先に併せて用意してください。<br>
      ※オーストラリアのコンセントは、３つ穴がありますが、基本的に使うのは２つの穴です。</p>
      <span class="imgBox"><img src="../images/counselor/ele_type.jpg"></span>          
      <table class="eleType">
      	<tr><th colspan="3">アジア</th></tr>
      	<tr>
        	<th class="w160">香港</th>
          <td>220V</td>
          <td>TYPE-B <img src="../images/counselor/icon_b.jpg"></td>
        </tr>
        <tr>
        	<th>韓国</th>
          <td>110Vもしくは220V</td>
          <td>
          TYPE-A <img src="../images/counselor/icon_a.jpg"><br>
          TYPE-C <img src="../images/counselor/icon_c.jpg"><br>
          TYPE-SE <img src="../images/counselor/icon_se.jpg"></td>
        </tr>
        <tr>
        	<th>台湾</th>
          <td>110V</td>
          <td>TYPE-A <img src="../images/counselor/icon_a.jpg"></td>
        </tr>
      </table>      
     
      <table class="eleType">
      	<tr><th colspan="3">オセアニア</th></tr>
      	<tr>
        	<th class="w160">オーストラリア</th>
          <td>240V</td>
          <td>TYPE-O <img src="../images/counselor/icon_o.jpg"></td>
        </tr>
        <tr>
        	<th>ニュージーランド</th>
          <td>230-240V</td>
          <td>TYPE-O <img src="../images/counselor/icon_o.jpg"></td>
        </tr>
      </table>      
      
      <table class="eleType">
      	<tr><th colspan="3">北米</th></tr>
      	<tr>
        	<th class="w160">カナダ</th>
          <td>120V</td>
          <td>TYPE-A <img src="../images/counselor/icon_a.jpg"></td>
        </tr>
        <tr>
        	<th>アメリカ</th>
          <td>110-120V</td>
          <td>TYPE-A <img src="../images/counselor/icon_a.jpg"></td>
        </tr>
      </table>
      
      <table class="eleType">
      	<tr><th colspan="3">ヨーロッパ</th></tr>
      	<tr>
        	<th class="w160">イギリス</th>
          <td>240V</td>
          <td>
          TYPE-B <img src="../images/counselor/icon_b.jpg"><br>
          TYPE-C <img src="../images/counselor/icon_c.jpg">
          </td>
        </tr>
        <tr>
        	<th>アイルランド</th>
          <td>230V</td>
          <td>TYPE-C <img src="../images/counselor/icon_c.jpg"></td>
        </tr>
        <tr>
        	<th>フランス</th>
          <td>230V</td>
          <td>TYPE-C <img src="../images/counselor/icon_c.jpg"></td>
        </tr>
        <tr>
        	<th>ドイツ</th>
          <td>230V</td>
          <td>TYPE-C <img src="../images/counselor/icon_c.jpg"></td>
        </tr>
        <tr>
        	<th>デンマーク</th>
          <td>230V</td>
          <td>TYPE-C <img src="../images/counselor/icon_c.jpg"></td>
        </tr>
        <tr>
        	<th>ノルウェー</th>
          <td>230V</td>
          <td>TYPE-C <img src="../images/counselor/icon_c.jpg"></td>
        </tr>
      </table>
    </section>
   
	  <div class="top-move">
	    <p><a href="#header">▲ページのＴＯＰへ</a></p>
	  </div>
	</div>
  </div>
  </div>

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>