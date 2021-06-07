<?php
/**
 * Template Name: sub_newentry
 */

global $wpdb;
$site_name = site_name();
$top_6_posts = array();
$next_6_posts = array();

/* test area */

/* notes
 * Australia - オーストラリア
 * canada - カナダ
 * new zealand - ニュージーランド
 * UK - イギリス
 **/

// $num_entry = 6;
// $counter = 1;

global $blog_id;

if ($blog_id == 2) { // 2 = australia blog
	$tag_inclusive = array('オーストラリア');
}
if ($blog_id == 3) { // 3 = canada blog
	$tag_inclusive = array('カナダ');
}
if ($blog_id == 4) { // 4 = new zealand blog
	$tag_inclusive = array('ニュージーランド');
}
if ($blog_id == 5) { // 5 = united kingdom blog
	$tag_inclusive = array('イギリス');
}
if ($blog_id == 6) { // 6 = world blog
	$tag_inclusive = array('韓国', 'フランス', 'ドイツ', 'アイルランド', 'デンマーク', '台湾', '香港', 'ノルウェー', 'アメリカ');
}

	$current_blog = $blog_id;

	$blogs = array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11');
	
	$counter = 0;
	$counter2 = 0;
	$x = 0;

	foreach ( $blogs as $b_id ) {
		switch_to_blog($b_id);
		$setting = custom_site_settings($b_id);
		
		$djg_count = 0;
		global $post;
		
		$args = array( 
			'post_type'   => 'post',
			'orderby'    => 'date',
			'posts_per_page' => 6,
			'tag_slug__in' => $tag_inclusive
		);
		
		$arrgs = new WP_query($args);
		
		query_posts($args);
		while ( have_posts() ) : the_post();
		//while($arrgs->have_posts()){
			//$arrgs->the_post();
			$djg_count = 0;
			
			$post_exlude = $post->ID;
			$get_the_title = get_the_title();
			$get_permalink = get_permalink();
			$date = get_the_date('Y/m/d');
			
			$category_detail = get_the_category($post_id);
			if ($b_id <= 6) {
				foreach($category_detail as $cd){
					$ancestors = get_ancestors( $cd->term_id, 'category' );
					$p_id = $ancestors[0];
					$c_name = get_cat_name($p_id);
					$yourcat = get_category ($p_id);
					
					$tri_name = triangle_name($b_id, $p_id);
						
					if ($tri_name == '' or $tri_name == 'slug') {
						$tri_name = $yourcat->slug;
					}
					if ($tri_name == 'name') {
						$tri_name = $c_name;
					}
				}
			} else {
				$tri_name = triangle_name($b_id, 0);
				if ($tri_name == '') {
					$tri_name = get_bloginfo('name');
				}
			}
		
			$count = strlen($tri_name);
			
			if ($count <= 7 ){
				$css_ = "font-size: 11px; color: " . $setting[1] . ";";
			}
			if ($count >= 8){
				$css_ = "font-size: 10px; color: " . $setting[1] . ";";
			}
			
			$category_name = "<p style='" . $css_  . "'>" . $tri_name . "</p>";
			
			$css_ = "";
			
			$img_link = catch_that_image($site_name);
			
			$top_6_posts[$counter2]['color'] = $setting[0];
			$top_6_posts[$counter2]['img_link'] = $img_link;
			$top_6_posts[$counter2]['get_permalink'] = $get_permalink;
			$top_6_posts[$counter2]['category'] = $category_name;
			$top_6_posts[$counter2]['pdate'] = $date;
			$top_6_posts[$counter2]['post_exlude'] = $post_exlude;
			$top_6_posts[$counter2]['get_the_title'] = $get_the_title;
			
			$counter2++;
		endwhile;
		wp_reset_query();
		$counter++;
	}
	
	usort($top_6_posts, make_comparer('pdate', SORT_ASC, 'date_create'));

	echo '<div class="main_newentry"><ul>';
	
	//for ($y = 0; $y <= 6; $y++) {
	$y = 0;
	foreach($top_6_posts as $post_data){
		if ($y < 6) {
			
			if ($y % 2 == 0) {
				$add_class = 'li_left';
			} else {
				$add_class = 'li_right';
			}
				
			echo '<a href="'. $post_data['get_permalink'] .'"><li class="' . $add_class . '">';
			
				echo '<div class="new_Container">';
				
					echo '<div class="new_entry_title" style="color: ' . $post_data['color'] . '">' . $post_data['get_the_title'] . '</div>';
					
					echo '<div class="imgContainer" style="background-image: url(' . $post_data['img_link'] . ');">';
					
						echo '<div class="bgtag" style="background-color: ' . $post_data['color'] . '">';
						
							echo $post_data['category'];
							
						echo '</div>';
					
					echo '</div>'; // .imgContainer
				
				echo '</div>'; // .new_Container
				
			//echo '<div class="new_entry_date"><span class="new_entry_date">' . $post_data['pdate'] . '</span></div>';
			
			echo '</li></a>';
			
			$post_exlude_2[$y] = $post_data['post_exlude'];
			
			$y++;
		} else {
			break;
		}
	}

	wp_reset_query();
	//restore_current_blog();
	switch_to_blog($current_blog);
	$setting = custom_site_settings($current_blog);

	if ($x == 0 or $x == 6) {
		$x2 = 6;
	} else {
		$x2 = 6 + ( 6 - $x );
	}

/* end of test area */
	
	$counter2 = 0;

	$args = array( 
		'post_type'   => 'post',
		'orderby'    => 'date',
		'posts_per_page' => 6, /*$x2,*/
		'post__not_in' => $post_exlude_2
	);

	$myposts2 = get_posts( $args );
	foreach ( $myposts2 as $post ){
		$djg_count = 0;
			
		$get_permalink = get_permalink();
		$get_the_title = get_the_title();
		
		$category_detail = get_the_category($post_id);//$post->ID
			
		$current_category = $category_detail[0];
		$parent_category = $current_category->category_parent;

		if ( $parent_category != 0 ) {
			$category_parent = get_term( $parent_category, 'category' );
			$p_id = $parent_category;
			$c_slug = $category_parent->slug;
			$c_name = get_cat_name($parent_category);
		} else {
			$p_id = $category[0];
			$c_slug = $category[0]->slug;
			$c_name = get_cat_name($category[0]);
		}
		
		$p_name = triangle_name($blog_id, $p_id);
		if ($p_name == '' or $p_name == 'slug') {
			$p_name = $c_slug;
		}
		if ($p_name == 'name') {
			$p_name = $c_name;
		}

		$count =  strlen($p_name);

		if ($count <= 7 ){
			$css_ = "font-size: 11px; color: " . $setting[1] . ";";
		}
		if ($count >= 8){
			$css_ = "font-size: 10px; color: " . $setting[1] . ";";
		}
		
		if ($djg_count == 0) {
			$category = "<p style='" . $css_  . "'>" . $p_name . "</p>";
			
			$djg_count++;
		}

		$img_link = catch_that_image($site_name, $blog_id, p_id);
		
		$date = get_the_date('Y/m/d');
		
		$next_6_posts[$counter2]['color'] = $setting[0];
		$next_6_posts[$counter2]['img_link'] = $img_link;
		$next_6_posts[$counter2]['get_permalink'] = $get_permalink;
		$next_6_posts[$counter2]['category'] = $category;
		$next_6_posts[$counter2]['pdate'] = $date;
		$next_6_posts[$counter2]['get_the_title'] = $get_the_title;
		
		$counter2++;
		
	}
	
	usort($next_6_posts, make_comparer('pdate', SORT_ASC, 'date_create'));
	
	foreach($next_6_posts as $post_data){
		if ($y % 2 == 0) {
			$add_class = 'li_left';
		} else {
			$add_class = 'li_right';
		}
		
		echo '<a href="'. $post_data['get_permalink'] .'"><li class="' . $add_class . '">';
		
			echo '<div class="new_Container">';
			
				echo '<div class="new_entry_title" style="color: ' . $post_data['color'] . '">' . $post_data['get_the_title'] . '</div>';
				
					echo '<div class="imgContainer" style="background-image: url(' . $post_data['img_link'] . ');">';
				
					echo '<div class="bgtag" style="background-color: ' . $post_data['color'] . '">';
					
						echo $post_data['category'];
						
					echo '</div>';
				
				echo '</div>'; // .imgContainer
			
			echo '</div>'; // .new_Container
				
			//echo '<div class="new_entry_date"><span class="new_entry_date">' . $post_data['pdate'] . '</span></div>';
		
		echo '</li></a>';
		
		$y++;
	}

echo '</ul></div>';

?>


