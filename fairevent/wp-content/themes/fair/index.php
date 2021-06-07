<?php get_header(); ?>
<?php if (!get_banner_text_status()): ?>
    <?php if (wp_is_mobile()) : ?>
    <?php list($w,$h) = getimagesize(get_banner_sp_image_url()); $high = 100*$h/$w - 10;?>
    <div class="keyvisual index" style="padding-bottom: <?php echo $high ?>%;">
<?php else : ?>
    <div class="keyvisual index">
<?php endif; ?>
        <?php 
        if(get_banner_flight() != ''){
            $banner_flight = get_banner_flight();
        }else{
            // $banner_flight = get_template_directory_uri() . '/images/icon_plane.png';
            $banner_flight = '';
        }
        list($width, $height) = getimagesize($banner_flight);
        ?>
        <div id="flight" style="background:url('<?php echo $banner_flight ?>') no-repeat; background-size:contain; width:10%;height: <?php echo $height ?>px;position: absolute;top:<?php echo get_banner_flight_top() ?>%;left:0px;opacity: 0;"></div>
        <p class="keyvisual-text"></p>
        <!--img src="images/icon_plane.png" alt="飛行機"-->
    </div><!-- /.keyvisual -->
<?php endif; ?>

<?php if (!get_free_space_1_status()): ?>
    <!-- ▼ フリースペース１   ▼ -->
    <section class="normalBox topSec1">
        <h2 class="hukidashi"><?php echo get_free_space_1_text() ?><span><?php echo get_free_space_1_title() ?></span></h2>
        <div class="contentBox">
            <p>
                <?php echo get_free_space_1_body(); ?>
            </p><!-- /.planeText -->
        </div><!-- /.contentBox -->
    </section><!-- /.normalBpx -->
<?php endif; ?>

<?php if (!get_about_status()): ?>
    <!-- ▼ ワーキングホリデー＆留学フェアとは？ ▼ -->
    <section class="normalBox topSec1">
        <h2 class="hukidashi"><?php echo get_about_text() ?><span>ABOUT</span></h2>
        <img class="w100 spview" src="<?php echo get_about_image_url() ?>" alt="キービジュアル">

        <div class="contentBox">
            <?php if (get_about_image_url() != ''): ?>
                <img class="pcview left" src="<?php echo get_about_image_url() ?>" alt="キービジュアル">          
            <?php endif; ?>
            <p class="planeText mgb20 pdl430">
                <?php echo get_about_description() ?>
            </p><!-- /.planeText -->
            <ul class="btnList pdl55 about">
                <li class="left w60"><a class="btn Orng2" href="<?php bloginfo("url") ?>/seminar/">セミナースケジュール</a></li>
                <li class="right w40"><a class="btn Orng2" href="<?php bloginfo("url") ?>/access/">アクセス</a></li>
            </ul><!-- /.btnList -->
        </div><!-- /.contentBox -->
    </section><!-- /.normalBpx -->
<?php endif; ?>

<?php if (!get_point_status()): ?>
    <!-- ▼ ワーキングホリデー＆留学フェアのポイント ▼ -->      
    <section class="normalBox">
        <h2 class="hukidashi"><?php echo get_point_text() ?><span>POINT</span></h2>
        <div class="contentBox topSec2">
            <?php
            $tmp_point = '';
            $tmp_point_modal = '';
            $args = array(
                'post_type' => 'point',
                'posts_per_page' => 5,
                'orderby' => array('date' => 'ASC'),
            );
            $loop = new WP_Query($args);
            //
            if ($loop->have_posts()) {
                $p = 1;
                $p_open_tag = false;
                //
                $tmp_point .= '<div class="point-sp block-center">';
                while ($loop->have_posts()) {
                    $loop->the_post();
                    if ($p % 2 !== 0) {
                        if ($p_open_tag === false) {
                            $p_lastUl = '';
                            if ($p == $loop->post_count) {
                                $p_lastUl = 'lastUl';
                            } elseif ($p == 1) {
                                $p_lastUl = 'mgb10';
                            }
                            $tmp_point .= '<ul class="point green ' . $p_lastUl . '">';
                            $p_open_tag = true;
                        }
                        $tmp_point .= '<li>';
                        $tmp_point .= '<p><span>POINT.' . $p . '</span>' . get_the_title() . '</p>';
                        $tmp_point .= '<a href="javascript:void(0);" class="btn more-btn ' . 'sp-panel' . get_the_ID() . '">+more</a>';
                        $tmp_point .= '</li>';
                        if ($p == $loop->post_count) {
                            $tmp_point .= '</ul><!-- /.point -->';
                        }
                    } else {
                        $tmp_point .= '<li>';
                        $tmp_point .= '<p><span>POINT.' . $p . '</span>' . get_the_title() . '</p>';
                        $tmp_point .= '<a href="javascript:void(0);" class="btn more-btn ' . 'sp-panel' . get_the_ID() . '">+more</a>';
                        $tmp_point .= '</li>';
                        if ($p_open_tag === true) {
                            $tmp_point .= '</ul><!-- /.point -->';
                            $p_open_tag = false;
                        }
                    }
                    $p++;

                    $tmp_point_modal .= '<div class="modal ' . 'sp-panel' . get_the_ID() . '">';
                    $tmp_point_modal .= '<p>' . get_field('text') . '</p>';
                    $tmp_point_modal .= '<div class="close"><span>close</span></div>';
                    $tmp_point_modal .= '</div>';
                }
                $tmp_point .= '</div>';
                
                $p = 1;
                $tmp_point .= '<div class="point-pc block-center">';
                $tmp_point .= '<ul class="point green">';
                while ($loop->have_posts()) {
                    $loop->the_post();
                    $tmp_point .= '<li>';
                    $tmp_point .= '<p><span>POINT.' . $p . '</span>' . get_the_title() . '</p>';
                    $tmp_point .= '<a href="javascript:void(0);" class="btn more-btn ' . 'pc-panel' . get_the_ID() . '">+more</a>';
                    $tmp_point .= '</li>';
                    
                    $tmp_point_modal .= '<div class="modal ' . 'pc-panel' . get_the_ID() . '">';
                    $tmp_point_modal .= '<p>' . get_field('text') . '</p>';
                    $tmp_point_modal .= '<div class="close"><span>close</span></div>';
                    $tmp_point_modal .= '</div>';
                    
                    $p++;
                }
                $tmp_point .= '</ul>';
                $tmp_point .= '</div>';
                
            }
            //
            wp_reset_postdata();
            ?>

            <?php echo $tmp_point ?>

            <div class="modal-area">
                <?php echo $tmp_point_modal ?>       
            </div><!-- /.modal-area -->


            <div class="btnShadow mgt30 w60 pcview"><a class="btn Orng" style="background: <?php echo get_point_button_color() ?>" href="<?php bloginfo("url") ?>/seminar/">スケジュール＆ご予約はこちら</a></div>        
            <div class="btnShadow mgt30 w90 spview"><a class="btn Orng" style="background: <?php echo get_point_button_color() ?>" href="<?php bloginfo("url") ?>/seminar/">スケジュール＆ご予約はこちら</a></div>
        </div><!-- /.contentBox -->
    </section><!-- /.normalBpx -->
<?php endif; ?>

<?php if (!get_guide_status()): ?>
    <!-- ▼ フェアセミナー参加ガイドここから ▼ -->      
    <section class="normalBox">
        <h2 class="hukidashi"><?php echo get_guide_text() ?><span>GUIDE</span></h2>
        <div class="contentBox">
            <?php
            query_posts("post_type=step&posts_per_page=-1&orderby=date&order=asc");
            if (have_posts()): while (have_posts()): the_post();
                    ?>
            <style>
                section.semBox h3.step-<?php echo the_ID() ?>{
                    background: url('<?php the_field("icon") ?>') no-repeat left center;
                    color: <?php the_field("color") ?>;
                }
                /*sp*/
                @media screen and (max-device-width: 700px){
                section.semBox h3.step-<?php echo the_ID() ?>{
                    background-size: 10%;
                }
                }
            </style>
                    <section class="semBox mgb30">
                        <h3 class="step-<?php echo the_ID() ?>" style="background: url('') 2/3"><span><?php the_title() ?></span><p><?php the_field("caption") ?></p></h3>
                        <div class="inner">
                            <img src="<?php the_field("image") ?>" alt="<?php the_title() ?>">
                            <p>
                                <?php the_field("body") ?>
                                <?php
                                foreach (get_field("buttons") as $button):
                                    ?>
                                    <a href="<?php echo $button["link"] ?>" class="btnShadow2 block pcview mgt30">
                                        <span class="btn Green" style="background: <?php echo $button["color"] ?>">
                                            <?php echo $button["text"] ?>
                                        </span>
                                    </a>
                                <?php endforeach; ?>
                            </p>
                        </div><!-- /.inner -->
                        <?php
                        foreach (get_field("buttons") as $button):
                            ?>
                            <div class="btnShadow2 w90 spview">
                                <a class="btn Green" style="background: <?php echo $button["color"] ?>" href="<?php echo $button["link"] ?>"><?php echo $button["text"] ?></a>
                            </div>
                        <?php endforeach; ?>
                    </section><!-- /.semBox -->
                    <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
        </div><!-- /.contentBox -->
    </section><!-- /.normalBox -->
<?php endif; ?>

<?php if (!get_index_seminar_status()): ?>
    <!-- ▼ セミナー紹介ここから ▼ -->            
    <section class="normalBox">
        <h2 class="hukidashi"><?php echo get_index_seminar_text() ?><span>SEMINAR</span></h2>
        <div class="contentBox sp-seminar">
            <?php if (get_index_seminar_description() != ''): ?>
                <p class="planeText mgb20"><?php echo get_index_seminar_description() ?></p>
            <?php endif; ?>

            <?php
            $args = array(
                'post_type' => 'seminar',
                'posts_per_page' => -1,
                'orderby' => array('date' => 'ASC'),
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <?php $i = 0; ?>
                <?php while ($loop->have_posts()): $loop->the_post(); ?>
                    <style>
            <?php if ($i % 2 === 0): ?>
                            section.semBox2.cuz-seminar-<?php echo the_ID() ?>{
                                float: left;
                            }
            <?php else: ?>
                            section.semBox2.cuz-seminar-<?php echo the_ID() ?>{
                                float: right;
                            }
            <?php endif; ?>
                        section.semBox2.cuz-seminar-<?php echo the_ID() ?> h3{
                            background: url("<?php echo get_field('icon') ?>") no-repeat scroll left center / 30px auto rgba(0, 0, 0, 0);
                            color: <?php echo get_field('color') ?>;
                        }
                        section.semBox2.cuz-seminar-<?php echo the_ID() ?> ul.feature > li{
                            color: <?php echo get_field('color') ?>;
                        }
                        section.semBox2.cuz-seminar-<?php echo the_ID() ?> ul.feature > li:before{
                            -moz-border-bottom-colors: none;
                            -moz-border-left-colors: none;
                            -moz-border-right-colors: none;
                            -moz-border-top-colors: none;
                            border-color: transparent transparent transparent <?php echo get_field('color') ?>;
                            border-image: none;
                            border-style: solid;
                            border-width: 7px;
                        }
                        .btn.cuz-btn-seminar-<?php echo the_ID() ?>{
                            background: url("<?php echo get_template_directory_uri() ?>/images/arrow_white.png") no-repeat scroll 96% center / 7px 10px <?php echo get_field('color') ?>;
                            color: #fff;
                        }
                    </style>
                    <section class="semBox2 cuz-seminar-<?php echo the_ID() ?>">
                        <div class="inner">
                            <img src="<?php echo get_field('image') ?>" alt="<?php echo the_title() ?>">
                            <div class="textBox">
                                <h3><?php echo the_title() ?></h3>
                                <p><?php echo get_field('description') ?></p>
                            </div><!-- /.textBox -->
                        </div><!-- /.inner -->
                        <?php if (have_rows('points')): ?>
                            <ul class="feature">
                                <?php while (have_rows('points')): the_row(); ?>
                                    <li><?php echo the_sub_field('point') ?></li>
                                <?php endwhile; ?>
                            </ul><!-- /.feature -->
                        <?php endif; ?>
                        <div class="btnShadow2 w90"><a class="btn cuz-btn-seminar-<?php echo the_ID() ?>" href="<?php echo get_field('keyword') ?>">このセミナーを予約する</a></div>
                    </section><!-- /.semBox2 firstSem -->
                    <?php if ($i % 2 !== 0 && $i !== 0): ?>
                        <div class="pcview clearfix"></div>
                    <?php endif; ?>
                    <?php $i++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- /.contentBox -->        
    </section><!-- /.normalBox -->
<?php endif; ?>

<?php if (!get_voice_status()): ?>
    <!-- ▼ セミナー参加者の声 ▼ -->            
    <section class="normalBox mgb30">
        <h2 class="hukidashi"><?php echo get_voice_text() ?><span>VOICE</span></h2>
        <div class="contentBox">
            <?php
            $args = array(
                'post_type' => 'voice',
                'posts_per_page' => -1,
                'orderby' => array('date' => 'ASC'),
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <ul class="voiceList">
                    <?php while ($loop->have_posts()): $loop->the_post(); ?>
                        <li>
                            <img src="<?php echo get_field('image') ?>" alt="<?php echo the_title() ?>">
                            <p>
                                <?php echo get_field('body') ?>
                                <span>（<?php echo get_field('profile') ?>）</span>
                            </p>
                        </li>

                    <?php endwhile; ?>
                </ul><!-- /.voiceList -->
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- /.contentBox -->
    </section><!-- /.normalBox -->
<?php endif; ?>

<?php if (!get_free_space_2_status()): ?>
    <!-- ▼ フリースペース１   ▼ -->
    <section class="normalBox topSec1">
        <h2 class="hukidashi"><?php echo get_free_space_2_text() ?><span><?php echo get_free_space_2_title() ?></span></h2>
        <div class="contentBox">
            <p>
                <?php echo get_free_space_2_body(); ?>
            </p><!-- /.planeText -->
        </div><!-- /.contentBox -->
    </section><!-- /.normalBpx -->
<?php endif; ?>

<?php if (!get_footer_nav()) : ?>
<div class="btnShadow w80 mgb30 spview"><a class="btn Orng" href="<?php bloginfo("url") ?>/seminar/">スケジュール＆ご予約はこちら</a></div>
<?php endif; ?>

<section class="normalBox footSec">

<?php if (!get_footer_nav()) : ?>
    <div class="btnShadow w60 mgb30"><a class="btn Orng" href="<?php bloginfo("url") ?>/seminar/">スケジュール＆ご予約はこちら</a></div>      
<?php endif; ?>
    <?php get_footer(); ?>