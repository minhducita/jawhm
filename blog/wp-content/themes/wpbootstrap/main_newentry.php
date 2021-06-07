<?php
/**
 * Template Name: main_newentry
 *
 * created by Joseph B.
 */
	$site_name = site_name();
	include(locate_template('../twentytwelve/favorite-list.php'));

	$fav_blog_id = array();
	$fav_post_id = array();

	foreach ($favorite_list as $k => $v) {
		if ($k % 2 == 0) {
			$fav_blog_id[] = ((int) $v);
		}
		else {
			$fav_post_id[] = $v;
		}
	}
	$fav_blog_id = array_filter($fav_blog_id);
	$fav_post_id = array_filter($fav_post_id);
	
	$eng_posts = array();
	$jap_posts = array();
	$blogs = array('2', '3', '4', '5', '6', );
	$fav_list = array();
	
	$counter = 0;
	$counter2 = 0;
	
	foreach ( $blogs as $b_id ) {
		switch_to_blog($b_id);
		$setting = custom_site_settings($b_id);
		
		unset($fav_list);
		$xx = 0;
		
		foreach ($fav_blog_id as $f_b_id) {
			if ($f_b_id == $b_id) {
				$fav_list[] = $fav_post_id[$xx];
			}
			$xx++;
		}
		
		global $post;
		$cat_ID = array();
		$categories = get_the_category();
		
		foreach($categories as $category) {
			array_push($cat_ID,$category->cat_ID);
		} 

		$args = array( 
			'post_type' => 'post',
			'orderby' => 'date',
			'posts_per_page' => 10,
			'post__not_in' => $fav_list,
		);
		
		$arrgs = new WP_query($args);
		
		while($arrgs->have_posts()){
			$arrgs->the_post();
		
			$get_permalink = get_permalink();
			
			$get_the_title = get_the_title();
			$category_name = "";
			$post_thumbnail = "";
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

			$count =  strlen($p_name);
			
			if ($count <= 7 ){
				$css_ = "font-size: 11px; color: " . $setting[1] . ";";
			}
			if ($count >= 8){
				$css_ = "font-size: 10px; color: " . $setting[1] . ";";
			}
			$category_name = "<p style='" . $css_  . "'>" . $p_name . "</p>";

			$css_ = "";

			$img_link = catch_that_image($site_name, $b_id, $p_id);
			
			/* normal method */
			/* $post_thumbnail .=  '<img src="';
			$post_thumbnail .=  $img_link;
			$post_thumbnail .=  '" alt="" />'; */
			/* ------------- */
			
			/* formula method */
			$img_thumb_css = image_thumbnail($img_link, '115', '219', 'px', 'mobile');
			
			$post_thumbnail = '<img src="';
			$post_thumbnail .= $img_link;
			$post_thumbnail .= '" ' . $img_thumb_css;
			//$post_thumbnail .= '" ';
			$post_thumbnail .= '/>';
			/* -------------- */

			$content_post = mb_substr(strip_tags(get_the_excerpt()), 0, 30);

			if($ancestors[0] != ""){
				$eng_posts[$counter2]['get_permalink'] = $get_permalink;
				$eng_posts[$counter2]['get_the_title'] = $get_the_title;
				$eng_posts[$counter2]['category_name'] = $category_name;
				$eng_posts[$counter2]['post_thumbnail'] = $post_thumbnail;
				$eng_posts[$counter2]['img_link'] = $img_link;
				$eng_posts[$counter2]['content_post'] = $content_post;
				$eng_posts[$counter2]['pdate'] = get_the_date('Y-m-d');
				$eng_posts[$counter2]['color'] = $setting[0];
				$counter2++;
			}
		}
		
		wp_reset_query();
		
		$counter++;
	}
	
	/* JAPAN BLOGS */
	$blogs_JP = array('7', '8', '9', '10', '11'); // Japan Blogs
	
	$counter = 0;
	$counter2 = 0;
	
	foreach ( $blogs_JP as $b_id ) {
	
		switch_to_blog($b_id);
		
		$setting = custom_site_settings($b_id);
		
		unset($fav_list);
		$xx = 0;
		
		foreach ($fav_blog_id as $f_b_id) {
			if ($f_b_id == $b_id) {
				$fav_list[] = $fav_post_id[$xx];
			}
			$xx++;
		}
		
		global $post;
		
		$blog_name = triangle_name($b_id, 0);
		if ($blog_name == '') {
			$blog_name = get_bloginfo('name');
		}
		
		$count = strlen($blog_name);
		
		if ($count <= 7 ){
			$css_ = "font-size: 11px; color: " . $setting[1] . ";";
		}
		if ($count >= 8){
			$css_ = "font-size: 10px; color: " . $setting[1] . ";";
		}
		$category_name = "<p style='" . $css_  . "'>" . $blog_name . "</p>";
		
		$css_ = "";
		
		$args = array( 
			'post_type' => 'post',
			'orderby' => 'date',
			'posts_per_page' => 10,
			'post__not_in' => $fav_list,
		);
		
		query_posts($args);
		
		while ( have_posts() ) : the_post();
			
			$get_permalink = get_permalink();

			$get_the_title = get_the_title();
			$post_thumbnail = "";
			$category_detail = get_the_category($post_id);

			$img_link = catch_that_image($site_name, $b_id, 0);
			
			/* normal method */
			/* $post_thumbnail .=  '<img src="';
			$post_thumbnail .=  $img_link;
			$post_thumbnail .=  '" alt="" />'; */
			/* ------------- */
			
			/* formula method */
			$img_thumb_css = image_thumbnail($img_link, '115', '219', 'px', 'mobile');
			
			$post_thumbnail = '<img src="';
			$post_thumbnail .= $img_link;
			$post_thumbnail .= '" ' . $img_thumb_css;
			//$post_thumbnail .= '" ';
			$post_thumbnail .= '/>';
			/* -------------- */

			$content_post = strip_tags($post->post_content);
			
			$jap_posts[$counter2]['get_permalink'] = $get_permalink;
			$jap_posts[$counter2]['get_the_title'] = $get_the_title;
			$jap_posts[$counter2]['category_name'] = $category_name;
			$jap_posts[$counter2]['post_thumbnail'] = $post_thumbnail;
			$jap_posts[$counter2]['img_link'] = $img_link;
			$jap_posts[$counter2]['content_post'] = $content_post;
			$jap_posts[$counter2]['pdate'] = get_the_date('Y-m-d');
			$jap_posts[$counter2]['color'] = $setting[0];
			
			$counter2++;
		
		endwhile;
		
		wp_reset_query();
		
		$counter++;
		
	}
	
	restore_current_blog();
	
	$x = 0;
	usort($eng_posts, make_comparer('pdate', SORT_ASC, 'date_create'));
	usort($jap_posts, make_comparer('pdate', SORT_ASC, 'date_create'));
	
	echo '<div class="main_newentry"><ul>';
	
		foreach($jap_posts as $post_data){
		
			if ($x < 6) {
			
				if ($x % 2 == 0) {
					$add_class = 'li_left';
				} else {
					$add_class = 'li_right';
				}
				
				echo '<a href="'. $post_data['get_permalink'] .'"><li class="' . $add_class . '">';
				
					echo '<div class="new_Container">';
					
						echo '<div class="new_entry_title" style="color: ' . $post_data['color'] . '">' . $post_data['get_the_title'] . '</div>';
						
						// echo '<div class="imgContainer" style="background-image: url(' . $post_data['img_link'] . ');">';
						echo '<div class="imgContainer">';
						
							echo '<div class="bgtag" style="background-color: ' . $post_data['color'] . '">';
							
								echo $post_data['category_name'];
							
							echo '</div>';
							
							echo $post_data['post_thumbnail'];
						
						echo '</div>'; // .imgContainer
					
					echo '</div>'; // .new_Container
				
				echo '</li></a>';
				
				$x++;
				
			}
		}
	
		foreach($eng_posts as $post_data){
		
			if ($x < 12) {
			
				if ($x % 2 == 0) {
					$add_class = 'li_left';
				} else {
					$add_class = 'li_right';
				}
				
				echo '<a href="'. $post_data['get_permalink'] .'"><li class="' . $add_class . '">';
				
					echo '<div class="new_Container">';
					
						echo '<div class="new_entry_title" style="color: ' . $post_data['color'] . '">' . $post_data['get_the_title'] . '</div>';
						
						//echo '<div class="imgContainer" style="background-image: url(' . $post_data['img_link'] . ');">';
						echo '<div class="imgContainer">';
						
							echo '<div class="bgtag" style="background-color: ' . $post_data['color'] . '">';
							
								echo $post_data['category_name'];
								
							echo '</div>';
							
							echo $post_data['post_thumbnail'];
						
						echo '</div>'; // .imgContainer
					
					echo '</div>'; // .new_Container
				
				echo '</li></a>';
				
				$x++;
				
			}
		}
	
	echo '</ul></div>';
	
	restore_current_blog();
	
?>
