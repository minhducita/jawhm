<?php 
get_header();

if (wp_is_mobile()) {
    $config = array(
        'view_mode' => 'list',
        'start_date' => get_start_date(),
        'end_date' => get_end_date(),
        'list' => array(
            'place_default' => '',
            'title' => get_the_title(),
            'count_field_active' => 'deactive',
        ),
    );
} else {
    $config = array(
        'start_date' => get_start_date(),
        'end_date' => get_end_date(),
        'view_mode' => 'list',
        'calendar' => array(
            'place_default' => '',
            'title' => get_the_title(),
            'place_active' => 'deactive',
            'country_active' => 'deactive',
            'know_active' => 'deactive',
            'calendar_icon_active' => 'deactive',
            'count_field_active' => 'deactive',
            'calendar_title_active' => 'deactive',
            'calendar_desc_active' => 'deactive',
            'footer_desc_active' => 'deactive',
        )
    );
}
$sm = new SeminarModule($config);
?>

      <div class="underSec schoolList">
      
        <a href="" class="returnHd">学校一覧に戻る</a>      
        
        <!-- ▼ ワーキングホリデー＆留学フェアとは？ ▼ -->      
        <section class="normalBox">
    <?php $term = get_the_terms($post->ID, 'country'); $flag = get_field('flag','country_'.$term[0]->term_id); ?>
        	<p class="area aus"><?php echo $term[0]->name; ?>　<?php the_field("place") ?></p>
          <div class="sclLogo">
          	<img src="<?php the_field('logo') ?>" alt="<?php the_title() ?>">
            <div class="headName">
              <h2><span class="ruby"><?php the_field('rubi'); ?></span><?php the_title(); ?></h2>
              <p class="nameTxt"><?php the_field('schoolname_detail'); ?></p>
            </div><!-- /.headName -->
          </div><!-- /.sclLogo -->
          
          <ul class="bxslider">
          	<li><img src="../../images/school/browns/slider_01.jpg" alt="スライド画像"></li>
          </ul>
                             
          <div class="contentBox noPad"> 
                            
          	<div class="comment">
            	<h3>現地スタッフからのコメント</h3>
              <img class="left" src="../../images/school/browns/staff.jpg" alt="スタッフ写真">
              <p class="text">
              	BROWNS English Language Schoolはゴールドコーストとブリスベンにキャンパスを持つ家族経営の語学学校です。<br>
                全教室に46インチの液晶テレビとPCを設置するなど、キャンパスには最新の設備とテクノロジーを導入しています。<br>
                科目別レベル分けシステム（Active8)や教師から個別アドバイスがもらえた上で学習できるユニークなシステム（Accelerate）も大変好評で、当校を選ばれる一つの理由となっています。毎日無料のアクティビティも行っておりますので、世界各国からの学生さんと友達を作るためにも是非様々なイベントにご参加頂ければと思います。<br>
                会場にて皆様にお会いできます事を楽しみに致しております。当日は是非何でもお気軽にご相談下さい。
              </p><!-- /.text -->
            </div><!-- /.comment -->
            
            <div class="btnShadow2 mgb20 w90"><a href="" class="btn Orng">語学学校セミナーはこちら</a></div>
            
            <section class="feature">
            	<h3>この語学学校の特徴</h3>
              <dl>
              	<dt>独自のプログラム Active8</dt>
                <dd>Active8とは英語習得に必要な8分野のスキル（読む、書く、話す、聞く、語彙、文法、発音、場面英語）を総合的に学習するシステムです。</dd>
                
                <dt>Accelerateでしっかりサポート！</dt>
                <dd>ブラウンズパスポートを使用して、講師からアドバイスが届きます。弱点を把握した上でAccelerate の教材を使い勉強に集中できます。</dd>
                
                <dt>ブラウンズならではの無料アクティビティ</dt>
                <dd>週5回の無料のアクティビティーが行われています。世界各国からの学生と友達になるには、アクティビティの参加が近道！</dd>
                
                <dt>大人気！学生アパートメント </dt>
                <dd>学校から徒歩圏内で通える豪華学生アパートメントが人気。希望者が多い為、お早めにお問い合わせ下さい！</dd>
                
                <dt>充実した英語プラスコース</dt>
                <dd>5週間の短期集中バリスタコース（ブリスベンのみ）やビジネス専門学校への進学、企業インターンシップの手配なども行っています！</dd>              
              </dl>
            </section><!-- /.feature -->
            
            <section class="semSche">
            	<h3>この語学学校のセミナースケジュール</h3>
              <p class="mgt10 mgb30">セミナースケジュールが入ります</p>
            </section><!-- /.semSche -->
            
            <a class="returnFt spview" href="">学校一覧に戻る</a>
          </div><!-- /.contentBox -->         
        </section><!-- /.normalBpx -->
      </div><!-- /.underSec -->
      
       <div class="btnShadow w80 mgb30 spview"><a class="btn Orng" href="">スケジュール＆ご予約はこちら</a></div>
      
      <section class="normalBox footSec pad50">
      	<div class="btnShadow w60 mgb30"><a class="btn Orng" href="">スケジュール＆ご予約はこちら</a></div>           	
	<?php include('../../footer.php'); ?>