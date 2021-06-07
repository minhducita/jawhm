<?php
define('WP_USE_THEMES', false);
require(dirname(dirname(__FILE__)) . '/wp-load.php');
?>
<?php
$blog_post = array();
$site_name = site_name();

if (isset($_GET['blog_id'])) {
    $b_id = (int)$_GET['blog_id'];
    switch_to_blog($b_id);
    global $post;

    $blog_name = get_bloginfo('name');
    $setting = custom_site_settings($b_id);

    $args = array(
        'post_type' => 'post',
        'orderby' => 'date',
        'posts_per_page' => 5,
    );
    query_posts($args);
    while (have_posts()) : the_post();
        $category_name = '';
        $post_thumbnail = '';
        $category_detail = get_the_category(get_the_ID());
        if ($b_id <= 6) { // English Blog
            foreach ($category_detail as $cd) {
                $ancestors = get_ancestors($cd->term_id, 'category');
                $p_id = $ancestors[0];
                $c_name = get_cat_name($p_id);
                $yourcat = get_category($p_id);

                $blog_name = triangle_name($b_id, $p_id);

                if ($blog_name == '' or $blog_name == 'slug') {
                    $blog_name = $yourcat->slug;
                }

                if ($blog_name == 'name') {
                    $blog_name = $c_name;
                }

            }
        } else { // Japan Blog
            $blog_name = triangle_name($b_id, 0);
            if ($blog_name == '') {
                $blog_name = get_bloginfo('name');
            }

        }// end check blog

        $count = strlen($blog_name);
        if ($count <= 7) {
            $css_ = "font-size: 17px; top: 37px; color: " . $setting[1] . ";";
        }
        if ($count >= 8) {
            $css_ = "font-size: 12px; top: 40px; left: -40px; color: " . $setting[1] . ";";
        }
        if ($b_id <= 6) {
            $category_name = "<p style='" . $css_ . "'>" . $blog_name . "</p>";
        } else {
            $category_name = "<p style='" . $css_ . "'>" . $blog_name . "</p>";
        }
        $css_ = null;

        $img_link = catch_that_image_custom($site_name, $b_id, $p_id);
        $img_thumb_css = image_thumbnail($img_link, '152', '260', 'px');

        if (!preg_match('#^(?:http|https):\/#i', $img_link)) {
            if ($img_link[0] === '/') {
                $img_link = substr($img_link, 1);
            }
            //format base
            $basePath = $_SERVER['DOCUMENT_ROOT'] . '/';
            $siteUrl  = ($_SERVER['REQUEST_SCHEME'] ? $_SERVER['REQUEST_SCHEME'] : 'http' ). '://' . $_SERVER['HTTP_HOST'] . '/';
            if (!is_file($basePath . $img_link) || !file_exists($basePath . $img_link)) {
                $img_link = $siteUrl . 'blog/wp-content/uploads/defaults/no-image.png';
            } else {
                $img_link = $siteUrl . $img_link;
            }
        }

        $post_thumbnail .= '<img src="'
            . $img_link
            . '" ' . $img_thumb_css
            . '/>';
        $post_thumbnail = preg_replace('/<img([^>]+)(?:style\=\"[^\"]+\")([^>]*)>/Usi', '<img ${1}${3} style="width:100%; height:200px;">', $post_thumbnail);
        $content_post = twentytwelve_trim_excerpt(3);

        $blog_post[] = array(
            'get_permalink' => get_permalink(),
            'get_the_title' => get_the_title(),
            'category_name' => $category_name,
            'post_thumbnail' => $post_thumbnail,
            'img_link' => $img_link,
            'content_post' => $content_post,
            'pdate' => get_the_date('Y-m-d'),
            'color' => $setting[0],
        );
    endwhile;
    wp_reset_query();
    restore_current_blog();

}
die(json_encode($blog_post));
?>
