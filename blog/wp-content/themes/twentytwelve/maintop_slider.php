<?php
/**
* Template Name: maintop_slider
* by Joseph B.
*/

include(locate_template('favorite-list.php'));

$fav_blog_id = array();
$fav_post_id = array();

$counter = 0;
$counter2 = 0;

foreach ($favorite_list as $k => $v) {
	if ($counter == 10) { // limit slider to display only 5 posts
		break;
	}
	
	if ($k % 2 == 0) {
		$fav_blog_id[] = ((int) $v);
	}
	else {
		$fav_post_id[] = $v;
	}
	
	$counter++;
}

//$fav_blog_id = array_unique($fav_blog_id);
//$fav_post_id = array_unique($fav_post_id);
$fav_blog_id = array_filter($fav_blog_id);
$fav_post_id = array_filter($fav_post_id);

$arr_post = array();
$site_name = site_name();

foreach ( $fav_blog_id as $b_id ) {
	switch_to_blog($b_id);
	global $post;
	$blog_name = get_bloginfo('name');
	
	$setting = custom_site_settings($b_id);
	
	$args = array(
		'post_type'   => 'post',
		'orderby' => 'date',
		'post__in' => array($fav_post_id[$counter2]),
	);
	
	//$the_query = get_posts( $args );
	query_posts($args);
	
	while ( have_posts() ) : the_post();
		$get_permalink = get_permalink();
		$get_the_title = get_the_title();
		$category_name = "";
		$post_thumbnail = "";
		$category_detail = get_the_category($post_id);
		
		if ($b_id <= 6) { // English Blog
			foreach ($category_detail as $cd) {
				$ancestors = get_ancestors( $cd->term_id, 'category' );
				$p_id = $ancestors[0];
				$c_name = get_cat_name($p_id);
				$yourcat = get_category ($p_id);
				
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
		}
		
		$count = strlen($blog_name);
		
		if ($count <= 7 ){
			$css_ = "font-size: 17px; top: 37px; color: " . $setting[1] . ";";
		}
		if ($count >= 8){
			$css_ = "font-size: 12px; top: 40px; left: -40px; color: " . $setting[1] . ";";
		}
		
		if ($b_id <= 6) { // English Blog
			$category_name = "<p style='" . $css_  . "'>" . $blog_name . "</p>";
		} else { // Japan Blog
			$category_name = "<p style='" . $css_  . "'>" . $blog_name . "</p>";
		}
		
		$css_ = "";
		
		$img_link = catch_that_image($site_name, $b_id, $p_id);
		
		/* normal method */
		/* $post_thumbnail .=  '<img src="';
		$post_thumbnail .=  $img_link;
		$post_thumbnail .=  '" alt="" />'; */
		/* ------------- */
		
		/* formula method */
		$img_thumb_css = image_thumbnail($img_link, '152', '260', 'px');
		
		$post_thumbnail .= '<img src="';
		$post_thumbnail .= $img_link;
		$post_thumbnail .= '" ' . $img_thumb_css;
		//$post_thumbnail .= '" ';
		$post_thumbnail .= '/>';
		/* -------------- */
		
		//$content_post2 = strip_tags($post->post_content);
		//$content_post = mb_substr($content_post2, 0, 250);
		$content_post = mb_substr(get_the_excerpt(), 0, 250);
		
		$arr_post[$counter2]['get_permalink'] = $get_permalink;
		$arr_post[$counter2]['get_the_title'] = $get_the_title;
		$arr_post[$counter2]['category_name'] = $category_name;
		$arr_post[$counter2]['post_thumbnail'] = $post_thumbnail;
		$arr_post[$counter2]['img_link'] = $img_link;
		$arr_post[$counter2]['content_post'] = $content_post;
		$arr_post[$counter2]['pdate'] = get_the_date('Y-m-d');
		$arr_post[$counter2]['color'] = $setting[0];
		//$arr_post[$counter2]['p_id'] = get_the_ID();
		//$arr_post[$counter2]['post_exclude'] = 'e';
		$counter2++;
		
	endwhile;
	
	wp_reset_query();
}

restore_current_blog();

/* Shuffle Posts In Slider */
//shuffle($arr_post);
/* ----------------------- */

foreach($arr_post as $post_data){
	echo '<li>';
	
		echo '<div class="slide_content_left">';
	
			echo '<a href="'. $post_data['get_permalink'] .'"></a>';
			
			echo '<div class="imgContainer">';
			//echo '<div class="imgContainer" style="background-image: url(' . $post_data['img_link'] . ');">';
			
				echo '<div class="bgtag" style="background-color: ' . $post_data['color'] . '">';
					echo $post_data['category_name'];
				echo '</div>'; // .bgtag
				
				echo $post_data['post_thumbnail'];
			echo '</div>'; // .imgContainer
			
		echo '</div>'; // .slide_content_left
		
		echo '<div class="slide_content">';
		
			echo '<p class="p_title" style="color: ' . $post_data['color'] . ';">' . $post_data['get_the_title'] . '</p>';
			echo '<div class="slider_content">' . $post_data['content_post'];// . $post_data['p_id'];

		echo '</div></div>'; // .slide_content
	
	echo '</li>';
}

?>
