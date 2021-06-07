<?php
/*
Template Name:school_blog
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>日本ワーキング・ホリデー協会　公式ブログ</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Le styles
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet"> -->

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
    remove_action( 'wp_head', 'wp_print_styles',8);
    remove_action( 'wp_head', 'wp_print_head_scripts',9);
    remove_action( 'wp_head', 'wp_print_footer_scripts',20);
?>
<?php wp_head(); ?>
</head>
<body>
<?php
    $country = $_POST['country'];
    $category_name = $_POST['category_name'];

    $counter = 0;
    $counter2 = 0;

    $arr_post = array();

    $blog_list = array(
        'aus' => 2,
        'can' => 3,
        'nz' => 4,
        'en' => 5,
        'ww' => 6,
        );

    $b_id = $blog_list[$country];
    switch_to_blog($b_id);
    global $post;
    $blog_name = get_bloginfo('name');
    
    $setting = custom_site_settings($b_id);
    
    $args = array(
        'post_type'   => 'post',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'category_name' => $category_name
    );
    
    query_posts($args);
    
    while ( have_posts() ) : the_post();
        $get_permalink = get_permalink();
        $get_the_title = get_the_title();
        $category_name = "";
        $post_thumbnail = "";
        $category_detail = get_the_category($post_id);

        $category_detail = get_the_category($post_id);
            foreach($category_detail as $cd){
                $ancestors = get_ancestors( $cd->term_id, 'category' );
                $p_id = $ancestors[0];
                $c_name = get_cat_name($p_id);
                $yourcat = get_category ($p_id);
                
                $p_name = triangle_name($b_id, $p_id);
                    
                if ($p_name == '' or $p_name == 'slug') {
                    $p_name = $yourcat->slug;
                }
                if ($p_name == 'name') {
                    $p_name = $c_name;
                }
            }
        $category_name = $p_name;
        
        $count = strlen($blog_name);
        
        $img_link = catch_that_image($site_name, $b_id, $post->ID);
        
        /* formula method */
        $img_thumb_css = image_thumbnail($img_link, '152', '260', 'px');
        
        $post_thumbnail .= '<img src="/blog';
        $post_thumbnail .= $img_link;
        $post_thumbnail .= '"/>';

        $content_post = mb_substr(get_the_excerpt(), 0, 250);
        
        $arr_post[$counter2]['get_permalink'] = $get_permalink;
        $arr_post[$counter2]['get_the_title'] = $get_the_title;
        $arr_post[$counter2]['category_name'] = $category_name;
        $arr_post[$counter2]['post_thumbnail'] = $post_thumbnail;
        $arr_post[$counter2]['img_link'] = $img_link;
        $arr_post[$counter2]['content_post'] = $content_post;
        $arr_post[$counter2]['pdate_pc'] = get_the_date('Y-n-j');
        $arr_post[$counter2]['pdate_sp'] = get_the_date('Y年n月j日');
        $arr_post[$counter2]['color'] = $setting[0];

        $counter2++;
        
    endwhile;
    
    wp_reset_query();


restore_current_blog();
foreach ($arr_post as $post) :
?>
<li>
    <p class="blog_date_sm"><?php echo $post['pdate_sp'] ; ?></p>
    <div class="img_container">
        <div class="bgtag" style="background-color: <?php echo $post['color']; ?>;"><p><?php echo $post['category_name']; ?></p></div>
        <?php echo $post['post_thumbnail']; ?>
    </div>
    <div class="txt_container">
        <span class="blog_date_pc"><?php echo $post['pdate_pc'] ; ?></span>
        <a href="<?php echo $post['get_permalink'] ; ?>"><p class="title"><?php echo $post['get_the_title']; ?></p></a>
        <!-- 記事タイトル、mobile19文字、pc39文字まで表示 -->
        <p class="content"><?php echo $post['content_post']; ?></p>
        <!-- 記事本文、mobile30文字、pc48文字まで表示 -->
    </div>
</li>
<?php endforeach; ?>
    </body>
</html>
