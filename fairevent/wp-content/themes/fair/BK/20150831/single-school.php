<?php
get_header();

$start_date = date('Y-m-d');

if (wp_is_mobile()) {
    $config = array(
        'view_mode' => 'list',
        'start_date' => $start_date,
        'end_date' => '',
        'list' => array(
            'place_default' => '',
            'title' => get_the_title(),
            'count_field_active' => 'deactive',
        ),
    );
} else {
    $config = array(
        'start_date' => $start_date,
        'end_date' => '',
        'view_mode' => 'list',
        'list' => array(
            'place_default' => '',
            'title' => array(get_the_title(),),
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
}
$sm = new SeminarModule($config);
?>

<div class="underSec schoolList">

    <a href="<?php bloginfo("url") ?>/school/" class="returnHd">学校一覧に戻る</a>      

    <!-- ▼ ワーキングホリデー＆留学フェアとは？ ▼ -->      
    <section id="main_box01" class="normalBox schoolback">
    <?php $term = get_the_terms($post->ID, 'country'); $flag = get_field('flag','country_'.$term[0]->term_id); ?>
        <p id="sch_place_det" class="area aus" style="background: url('<?php echo $flag; ?>') no-repeat 10px center;">
            <?php echo $term[0]->name;
            ?>　<?php the_field("place") ?></p>
        <div class="sclLogo">
            <img id="school_logo" src="<?php the_field('logo') ?>" alt="<?php the_title() ?>">
            <div class="headName">
              <!-- <h2><span class="ruby"><?php the_field('rubi'); ?></span><?php the_title(); ?>/</h2> -->
              <h2 id="sch_name_h2"><?php the_title(); ?>/<?php the_field('rubi'); ?></h2>
              <p class="nameTxt"><?php the_field('schoolname_detail'); ?></p>
            </div><!-- /.headName -->
        </div>
        <!--<ul class="bxslider">
              <li><img src="<?php the_field('image') ?>" alt="スライド画像"></li>
        </ul>-->
        <div id="wrapper">
 
        <!-- slider start -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/js/diapo/diapo.css">
        <div id="diapoBox" class="contentBox" align="center">
            <section> 
                <div id="slideBox" style="margin-left:-20px;"> 
                        <div class="pix_diapo">
                            <?php foreach (get_field('slides') as $slide) : ?>
                            <div data-thumb="<?php echo $slide['thumbnail']; ?>">
                            <?php if (!empty($slide['image'])) : ?>
                                <img style="max-width: 100%; height: auto;" src="<?php echo $slide['image']; ?>" alt="画像名" />
                            <?php endif;
                                  if (!empty($slide['video'])) : ?>
                                <iframe class="iframe_video" style="width: 100%; height:50vw;" src="<?php echo $slide['video']; ?>" data-fake="<?php echo $slide['thumbnail']; ?>" frameborder="0"></iframe>
                            <?php endif; ?>
                            </div>
                            <?php endforeach; ?>

                        </div>
                </div>
            </section>
        </div>
        <!-- slider end -->

        <div id="content_box01" class="contentBox noPad"> 

            <?php if(get_field('staff_comment') != NULL): ?>
                <div class="comment" style="border-color: <?php the_field("color") ?>">
                    <h3>現地スタッフからのコメント</h3>
                    <img class="left" src="<?php the_field('staff_image') ?>" alt="スタッフ写真">
                    <p class="text">
                        <?php the_field('staff_comment') ?>
                    </p><!-- /.text -->
                </div><!-- /.comment -->
            <?php endif; ?>

            <div class="btnShadow2 mgb20 w90"><a href="#semSche" class="btn Orng" style="background-color: <?php the_field("color") ?>">語学学校セミナーはこちら</a></div>

            <section id="school_feature" class="feature">
                <h3>この語学学校の特徴</h3>
                <dl>
                    <?php
                    foreach (get_field('features') as $feature):
                        ?>
                        <dt><?php echo $feature['caption'] ?></dt>
                        <dd><?php echo $feature['text'] ?></dd>
                    <?php endforeach; ?>             
                </dl>
            </section><!-- /.feature -->

            <section id="semSche" class="semSche">
                <h3>この語学学校のセミナースケジュール</h3>
                <div class="school-seminar-schedule">
                    <?php $sm->show() ?>
                </div>
            </section><!-- /.semSche -->

            <a class="returnFt spview" href="<?php bloginfo("url") ?>/school/">学校一覧に戻る</a>
        </div><!-- /.contentBox -->         
    </section><!-- /.normalBpx -->
</div><!-- /.underSec -->

<div class="btnShadow w80 mgb60 mgt60 spview"><a class="btn Orng" href="<?php bloginfo("url") ?>/seminar/" style="background-color: <?php the_field("color") ?>">スケジュール＆ご予約はこちら</a></div>
<style>
    .seminar_date{
        background-color: <?php the_field("color") ?> !important;
    }
</style>
<section class="normalBox footSec pad50 schoolback">
    <div class="btnShadow w60 mgb30"><a class="btn Orng" href="<?php bloginfo("url") ?>/seminar/">スケジュール＆ご予約はこちら</a></div>  
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/school.js"></script>
    <style media="(min-width: 699px)">
        div.schoolList div.comment h3 {
            background: url("<?php the_field("icon_comment") ?>") no-repeat left center;
            -webkit-background-size: 40px 40px;
            -moz-background-size: 25px 17px;
            background-size: 40px 40px;
            min-height: 34px;
            padding-top: 6px;
        }
        div.schoolList section.feature h3, div.schoolList section.semSche h3 {
            background: url("<?php the_field("icon_features") ?>") no-repeat left center;
            -webkit-background-size: 40px 40px;
            -moz-background-size: 40px 40px;
            background-size: 40px 40px;
        }
    </style>
    <style media="(max-width: 700px)">
        div.schoolList div.comment h3 {
            background: url("<?php the_field("icon_comment") ?>") no-repeat left center;
            -webkit-background-size: 25px 17px;
            -moz-background-size: 25px 17px;
            background-size: 25px 17px;
        }
        div.schoolList section.feature h3, div.schoolList section.semSche h3 {
            background: url("<?php the_field("icon_features") ?>") no-repeat left center;
            -webkit-background-size: 25px 25px;
            -moz-background-size: 25px 25px;
            background-size: 25px 25px;
        }
    </style>
    <?php get_footer() ?>