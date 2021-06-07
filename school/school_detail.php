
<?php

require_once '../include/header.php';
require_once 'school_db.php';

$header_obj = new Header();

$header_obj->title_page = $name;
$header_obj->description_page = $rubi.'。ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->add_css_files='<link href="/school/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = $rubi;

if ($header_obj->computer_use() == false && $_SESSION['pc'] != 'on') {
  $header_obj->add_css_files.='<link href="/school/css/style_sp.css" rel="stylesheet" type="text/css" />';
  $header_obj->add_js_files.='<script src="/school/js/sp_common.js?v=1" type="text/javascript"></script><script src="/school/js/flexslider/jquery.flexslider.js" type="text/javascript"></script>';
} else {
  $header_obj->add_css_files.='<link href="/school/css/style.css" rel="stylesheet" type="text/css" />';
  $header_obj->add_js_files.='<script src="/school/js/flexslider/jquery.flexslider.js" type="text/javascript"></script><script src="/school/js/pamphlet.js?v=2" type="text/javascript"></script>';
}

$header_obj->is_school = true;

$header_obj->display_header();

include '../seminar_module/seminar_module.php';
$start_date = date('Y-m-d');
    $config = array(
        'start_date' => $start_date,
        'end_date' => '',
        'view_mode' => 'list',
        'list' => array(
            'place_default' => '',
            'keyword' => $search_word,
            'keyword2' => $search_word,
            'place_active' => 'deactive',
            'country_active' => 'deactive',
            'know_active' => 'deactive',
            'calendar_icon_active' => 'deactive',
            'count_field_active' => 'deactive',
            'calendar_title_active' => 'deactive',
            'calendar_desc_active' => 'deactive',
            'footer_desc_active' => 'deactive',
        ),
    );
$sm = new SeminarModule($config);

echo $sm->get_add_css();
echo $sm->get_add_js();
echo $sm->get_add_style();
?>
<script type="text/javascript">
$(function() {
  var s = $('script[src="/js/scroll.js"]').remove();
  $('#tabs a[href^="#panel"]').click(function(){
    $("#tabs li").removeClass("active");
      $(this).parent().addClass("active");
    $("#tabs .panel").hide();
    $(this.hash).fadeIn();
    return false;
  });
  
  // Start 2273 LuuDV
  $('#tabs_btn a[href="#tabs"]').click(function(e){
    var this_link = $(this).attr('mydata');
    $("#tabs li").removeClass("active");
    if(this_link == "panel1") {
      $('#tabs a[href="#panel1"]').parent().addClass("active");
      $("#tabs .panel").hide();
      $("#panel1").fadeIn();
    }
    if(this_link == "panel2") {
      $('#tabs a[href="#panel2"]').parent().addClass("active");
      $("#tabs .panel").hide();
      $("#panel2").fadeIn();
    }
    if(this_link == "panel3") {
      $('#tabs a[href="#panel3"]').parent().addClass("active");
      $("#tabs .panel").hide();
      $("#panel3").fadeIn();
    }
    if(this_link == "panel4") {
      $('#tabs a[href="#panel4"]').parent().addClass("active");
      $("#tabs .panel").hide();
      $("#panel4").fadeIn();
    }
    if(this_link == "panel5") {
      $('#tabs a[href="#panel5"]').parent().addClass("active");
      $("#tabs .panel").hide();
      $("#panel5").fadeIn();
    }
  });
  // End 2273 LuuDV
  
  $('#tabs a[href^="#panel"]:eq(0)').trigger('click');
  $('.flexslider').flexslider();
});
</script>
<link href="/school/js/flexslider/flexslider.css" rel="stylesheet" type="text/css" />
<?php if(empty($name)) : ?>
<div id="maincontent">
お探しの学校はありません。
<?php else : ?>
      <div id="maincontent">
        <?php echo $header_obj->breadcrumbs(); ?>
        <?php
        $country_list = array('aus' => 'オーストラリア','can' => 'カナダ','nz' => 'ニュージーランド','en' => 'イギリス','ww' => 'ワールドワイド','usa' => 'アメリカ','fra' => 'フランス','deu' => 'ドイツ ','ire' => 'アイルランド',);
        $class_list = array('aus' => 'Aus','can' => 'Can','nz' => 'Nez','en' => 'Eng','ww' => 'WW','usa' => 'Usa','fra' => 'Fra','deu' => 'Deu','ire' => 'Ire',);
        ?>
        <section id="schoolSec" class="school<?php echo $class_list[$country]; ?>">
          <p class="sclArea" style="background: url(/school/images/icon_flag<?php echo $class_list[$country]; ?>.png) no-repeat 10px center;"><?php echo $country_list[$country]; ?>の語学学校</p>
          <h2>         
            <span class="ruby"><?php echo $rubi; ?></span>
            <?php echo $name;?>
          </h2>
          
            <div class="flexslider">
              <ul class="slides">
              <?php foreach ($slides as $slide) : ?>
                <?php if (!empty($slide['image'])) : ?>
                <li><img src="/school/images/slide/<?php echo basename($slide['image']); ?>" /></li>
                <?php else : if (!empty($slide['video'])) : ?>
                <li><iframe src="<?php echo $slide['video']; ?>"></iframe></li>
                <?php endif; endif; endforeach; ?>
              </ul>
            </div>
          <!-- /.visualBox -->
          
          <div id="tabs">
            <ul class="topTab">
              <li><a href="#panel1">概要</a></li>
              <li><a href="#panel2">キャンパス</a></li>
              <li><a href="#panel3">コース</a></li>
              <li><a href="#panel5" id="pamphlet">パンフレット</a></li>
              <li><a href="#panel4">ブログ</a></li>
            </ul><!-- /.topTab -->
           
            <section id="panel1" class="panel">              
            <?php foreach ($descs as $desc) : if(!empty($desc['title'])) : ?>
              <h3><?php echo $desc['title']; ?><span><?php echo $name; ?></span></h3>
              <p class="planeTxt">
              <?php echo $desc['body']; ?>
              </p><!-- /.planeTxt -->
            <?php endif; endforeach; ?>
              
              <h3>この学校をオススメする理由<span><?php echo $name; ?></span></h3>
            <?php $i=0; foreach ($points as $point) : if(!empty($point['title'])) : ?>
                <?php if ($i%2 == 0) : ?><div class="clearfix"><?php endif; ?>
                  <section class="point <?php if ($i%2 == 0) {echo 'left';} else {echo 'right';}?>">
                    <h4><?php echo $point['title']; ?></h4>
                    <ul>
                    <?php foreach ($point['body'] as $body) : ?>
                      <li><?php echo $body; ?></li>
                    <?php endforeach; ?>
                    </ul>
                  </section><!-- /.point -->
                <?php if ($i%2 == 1) : ?></div><!-- /.clearfix --><?php endif; ?>
            <?php endif; $i++; endforeach; ?>

            </section><!-- / 概要 -->         
           
            <section id="panel2" class="panel">
            <?php if ($country == 'ww') : ?>
              <?php foreach($cmps as $cmp){ $countries[] = $cmp['country']; $cmps_array[$cmp['country']][] = $cmp; } $countries = array_unique($countries); ?>
              <?php foreach($countries as $c) : if(!empty($c)) :?>
              <section class="sclBox">
                <h3><?php echo $c; ?><span><?php echo $name; ?></span></h3>
                <table class="commonTbl">
                <?php foreach($cmps_array[$c] as $cm) : ?>
                  <tr class="center">
                    <th><?php echo $cm['name']; ?></th>
                  <td><?php echo $cm['address']; ?></td>
                  </tr>
                <?php endforeach; ?>
                </table>
              </section>
            <?php endif; endforeach; ?>
            <?php else : ?>
              <?php foreach ($cmps as $cmp) : if (!empty($cmp['name'])) : ?>
                <section class="sclBox">
                  <h3><?php echo $cmp['name']; ?><span><?php echo $name; ?></span></h3>
                  <table class="commonTbl">
                    <tr>
                      <th>住所</th>
                      <td><?php echo $cmp['address']; ?></td>
                    </tr>
                    <tr class="center">
                      <th>在校生徒数</th>
                      <td><?php echo $cmp['student']; ?></td>
                    </tr>
                    <tr>
                      <th>English Only Policy</th>
                      <td class="fs25"><?php echo $cmp['eop']; ?></td>
                    </tr>
                    <tr>
                      <th>日本人スタッフ</th>
                      <td class="fs25"><?php echo $cmp['jpn']; ?></td>
                    </tr>
                    <tr>
                      <th>学生寮</th>
                      <td class="fs25"><?php echo $cmp['dorm']; ?></td>
                    </tr>
                  </table>
                  <p class="planeTxt">
                  <?php echo $cmp['intro']; ?>
                  </p>
                  <div class="map alCenter">
                  <!-- <iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.jp/maps?q=<?php echo $cmp['address']; ?>&z=15&output=embed&iwloc=J&t=m"></iframe> -->
                  <iframe src="https://www.google.com/maps/embed?pb=<?php echo $cmp['embed']; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div><!-- /.map -->
                </section>
              <?php endif; endforeach; ?>
            <?php endif; ?>
            </section>

            <section id="panel3" class="panel">
              <h3>プログラム紹介<span><?php echo $name; ?></span></h3>
              <table class="commonTbl">
                <tr>
                  <th>レベル分け</th>
                    <td><?php echo $level; ?></td>
                </tr>
              </table><!-- /.commonTbl -->
              
              <dl class="programList">
              <?php foreach ($progs as $prog) : if (!empty($prog['title'])) : ?>
                <dt><?php echo $prog['title']; ?></dt>
                <dd>
                  <table class="commonTbl">
                  <?php if (!empty($prog['body'])) : ?>
                    <tr>
                      <th>内容</th>
                        <td><?php echo $prog['body']; ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if (!empty($prog['period'])) : ?>
                    <tr>
                      <th>期間</th>
                        <td><?php echo $prog['period']; ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if (!empty($prog['target'])) : ?>
                    <tr>
                      <th>対象</th>
                        <td><?php echo $prog['target']; ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if (!empty($prog['cond'])) : ?>
                    <tr>
                      <th>条件</th>
                        <td><?php echo $prog['cond']; ?></td>
                    </tr>
                  <?php endif; ?>
                  </table>
                  <?php if (!empty($prog['remarks'][0])) : ?>
                  <ul>
                  <?php foreach ($prog['remarks'] as $remark) : ?>
                    <li><?php echo $remark; ?></li>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  </ul>
                </dd>
              <?php endif; endforeach; ?>
                
                <?php if (count($pluses) > 0) : ?>
                <dt>プラスアルファ</dt>
                <dd>
                <?php foreach($pluses as $plus) : if (!empty($plus['title'])) : ?>
                  <h4><?php echo $plus['title']; ?></h4>
                  <table class="commonTbl">
                  <?php if (!empty($plus['body'])) : ?>
                    <tr>
                      <th>内容</th>
                        <td><?php echo $plus['body']; ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if (!empty($plus['period'])) : ?>
                    <tr>
                      <th>期間</th>
                        <td><?php echo $plus['period']; ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if (!empty($plus['target'])) : ?>
                    <tr>
                      <th>対象</th>
                        <td><?php echo $plus['target']; ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if (!empty($plus['cond'])) : ?>
                    <tr>
                      <th>条件</th>
                        <td><?php echo $plus['cond']; ?></td>
                    </tr>
                  <?php endif; ?>
                  </table>
                  <?php if (!empty($plus['remarks'][0])) : ?>
                  <ul>
                  <?php foreach ($plus['remarks'] as $remark) : ?>
                    <li><?php echo $remark; ?></li>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  </ul>
                <?php endif; endforeach; ?>
                </dd>
              <?php endif; ?>
              </dl><!-- /.programList -->
              
              <dl class="activeList">
                <dt>アクティビティ</dt>
                <dd>
                <?php echo $activity; ?>
                </dd>
              </dl><!-- /.activeList -->
            </section><!-- / コース -->    

            <section id="panel5" class="panel">
              <h3>パンフレット<span><?php echo $name; ?></span></h3>
              <dl class="programList active">
                <dt>パンフレット一覧</dt>
                <dd>
                  <table class="commonTbl">
                    <?php foreach ($pamphlet as $key => $item) : ?>
                      <?php if ($key == 0) : ?>
                      <tr>
                        <th><?php echo $item["year"]; ?>年版</th>
                        <td style="line-height: 2em;">
                          <a href="<?php echo "https://$_SERVER[HTTP_HOST]" ?><?php echo $item['url']; ?>" target="_blank">パンフレット(<?php if ($item["language"] == "japan") { echo "日本語"; } else { echo "英語"; } ?>版)PDF<img src="/school/images/125_arr_hoso.png" width="25px" style="vertical-align: middle;">
                          </a>
                      <?php elseif ($item["year"] == $pamphlet[$key - 1]["year"]) : ?>
                          <br>
                          <a href="<?php echo "https://$_SERVER[HTTP_HOST]" ?><?php echo $item['url']; ?>" target="_blank">パンフレット(<?php if ($item["language"] == "japan") { echo "日本語"; } else { echo "英語"; } ?>版)PDF<img src="/school/images/125_arr_hoso.png" width="25px" style="vertical-align: middle;">
                          </a>
                      <?php elseif ($item["year"] != $pamphlet[$key - 1]["year"]) : ?>
                        </td>
                      </tr>
                      <tr>
                        <th><?php echo $item["year"]; ?>年版</th>
                        <td style="line-height: 2em;">
                          <a href="<?php echo "https://$_SERVER[HTTP_HOST]" ?><?php echo $item['url']; ?>" target="_blank">パンフレット(<?php if ($item["language"] == "japan") { echo "日本語"; } else { echo "英語"; } ?>版)PDF<img src="/school/images/125_arr_hoso.png" width="25px" style="vertical-align: middle;">
                          </a>
                      <?php endif; ?>
                    <?php endforeach; ?>
                        </td>
                      </tr>
                  </table>
                </dd>

                <?php if ($header_obj->computer_use() !== false) : ?>
                <dt>最新のパンフレット</dt>
                <dd>
                  <?php if (!empty($pamphlet[0]['url'])) : ?>
                  <iframe id="iframe-pamphlet" src="<?php echo "https://$_SERVER[HTTP_HOST]" ?><?php echo $pamphlet[0]['url']; ?>" width="610" height="450" frameborder="0" style="border:0"></iframe>
                  <?php endif; ?>
                </dd>
              <?php endif; ?>
              </dl>
            </section>

            <section id="panel4" class="panel">
              <div class="blog mgb40">
                <ul class="blog_article_list">
                 <?php
                    $blog_url = parse_url($blog);
                    $path = $blog_url['path'];
                    $paths = explode('/',$path);
                    $path_country = $paths[2];
                    $path_category = $paths[3];

                    $context = stream_context_create(array(
                        "http" => array(
                            'method'  => 'POST',
                            'header'  => implode("\r\n", array(
                                 'Content-Type: application/x-www-form-urlencoded',
                            )),
                            'content' => http_build_query(array(
                                 'country' => $path_country,
                                 'category_name'     => $path_category,
                            )),
                        )
                    ));
                    //$url = 'https://'. $_SERVER["SERVER_NAME"] .'/blog/school_blog/';
                    $url = 'https://www.jawhm.or.jp/blog/school_blog/';
                    echo file_get_contents($url, false, $context);
                     ?>
                    </ul>
                <a class="moreView" href="<?php echo $blog; ?>" target="_blank"><span>もっとブログを読む</span></a>                
              </div>
              
              <section class="voice">
              <h3>生徒からの声<span><?php echo $name; ?></span></h3>
                <?php $i = 0; foreach ($voices as $voice) : if (!empty($voice['body'])) :?>
                <?php if ($i%2 == 0) : ?><ul><?php endif; ?>
                  <li>
                  <?php if ($voice['icon'] == 'M') : ?>
                    <img src="/school/images/icon_man<?php echo $class_list[$country]; ?>.png" alt="男性">
                  <?php elseif ($voice['icon'] == 'F') : ?>
                    <img src="/school/images/icon_female<?php echo $class_list[$country]; ?>.png" alt="女性">
                  <?php endif; ?>
                    <p><?php echo $voice['body']; ?></p>
                  </li>
                  <?php if ($i%2 == 1 || $i+1 == count($voices)) : ?></ul><?php endif; ?>
                <?php endif; $i++; endforeach; ?>
                <?php if (!empty($voice_url)) : ?>
                <a class="moreView" href="<?php echo $voice_url; ?>" target="_blank"><span>この学校の体験談を読む</span></a>
                <?php endif; ?>
              </section>
            </section><!-- / ブログ -->
            
          </div><!-- /#tabs -->
          
          <section class="seminar">
            <h3>無料セミナー<span><?php echo $name; ?></span></h3>

            <p class="alCenter">
              <?php if($sm->tp_getEventCount() > 0 ) $sm->show(); 
             
                   else echo '<span style="color:red;font-size: 16px;text-align:center">現在セミナースケジュールの調整中です。</span>';
              ?>
            </p>
          </section>
          
          <div id="tabs_btn">
            <ul class="bottomTab">
              <!--li><a href="#panel1">概　要</a></li>
              <li><a href="#panel2">キャンバス</a></li-->
              <li><a href="#tabs" mydata="panel1">概　要</a></li>
              <li><a href="#tabs" mydata="panel2">キャンバス</a></li>
            </ul><!-- /.bottomTab -->
            
            <ul class="bottomTab">
              <!--li><a href="#panel3">コース</a></li>
              <li><a href="#panel4">ブログ</a></li-->
              <li><a href="#tabs" mydata="panel3">コース</a></li>
              <li><a href="#tabs" mydata="panel4">ブログ</a></li>
            </ul><!-- /.bottomTab -->

            <ul class="bottomTab">
              <li><a href="#tabs" mydata="panel5">パンフレット</a></li>
              <li></li>
            </ul>
          </div>
          
          <div class="pgTop"> 
            <a href="#schoolSec"><span><?php echo $name; ?></span>TOPに戻る</a>
          </div><!-- /.pgTop -->
        
        </section><!-- /.schoolSec -->
    
        
      </div><!-- /.maincontent -->
<?php endif; ?>
    </div><!-- /.#contents -->
  </div><!-- /.#contentsbox -->

<?php fncMenuFooter($header_obj->footer_type); ?>

</body>
</html>
