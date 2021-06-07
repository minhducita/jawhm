<?php

/**

 * Template Name: sub_newentry

 */



global $wpdb;

$site_name = site_name();

$top_6_posts = array();



echo '<div class="main_newentry"><ul>';



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

if ($blog_id == 5) { // 5 = Europe

	$tag_inclusive = array('イギリス','フランス','ドイツ','アイルランド','デンマーク','ノルウェー','ポーランド','ポルトガル','スロバキア');

}

if ($blog_id == 6) { // 6 = world blog

	$tag_inclusive = array('韓国', '台湾', '香港', 'アメリカ');

}



	$current_blog = $blog_id;



	$blogs = array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '19', '20', '21', '22',);

	

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

		

		query_posts($args); //$myposts2 = get_posts( $args );

		while ( have_posts() ) : the_post(); //foreach ( $myposts2 as $post ){

		//while($arrgs->have_posts()){

			//$arrgs->the_post();

			$djg_count = 0;

			$category = "";

			

			$post_exlude = $post_id = $post->ID;

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

					$css_ = "font-size: 17px; top: 37px; color: " . $setting[1] . ";";

			}

			if ($count >= 8){

					$css_ = "font-size: 12px; top: 40px; left: -40px; color: " . $setting[1] . ";";

			}

			$category = "<p style='" . $css_  . "'>" . $tri_name . "</p>";

			

			$css_ = "";

			

			$img_link = catch_that_image($site_name);

			

			/* normal method */

			//$thumbnail = "<img src='". $img_link . "' alt='' />";

			/* ------------- */

		

			/* formula method */

			$img_thumb_css = image_thumbnail($img_link, '100', '214', 'px');

			

			$thumbnail = '<img src="';

			$thumbnail .= $img_link;

			$thumbnail .= '" ' . $img_thumb_css;

			//$thumbnail .= '" ';

			$thumbnail .= '/>';

			/* -------------- */

			

			//$post_content = strip_tags($post->post_content);

			$post_content = mb_substr(get_the_excerpt(), 0,100);

			

			$top_6_posts[$counter2]['color'] = $setting[0];

			$top_6_posts[$counter2]['post_content'] = $post_content;

			$top_6_posts[$counter2]['thumbnail'] = $thumbnail;

			$top_6_posts[$counter2]['get_permalink'] = $get_permalink;

			$top_6_posts[$counter2]['category'] = $category;

			$top_6_posts[$counter2]['pdate'] = $date;

			$top_6_posts[$counter2]['post_exlude'] = $post_exlude;

			$top_6_posts[$counter2]['get_the_title'] = $get_the_title;

			

			$counter2++;

		endwhile; //}

		wp_reset_query();

		$counter++;

	}

	

	usort($top_6_posts, make_comparer('pdate', SORT_ASC, 'date_create'));

	

	//for ($y = 0; $y <= 6; $y++) {

	$y = 0;

	foreach($top_6_posts as $post_data){

		if ($y < 6) {

		

			echo '<li class="n_li"><a href="'. $post_data['get_permalink'] . '">';

				echo '<div class="imgContainer">';

					echo '<div class="bgtag" style="background-color: ' . $post_data['color'] . ';">';

						echo $post_data['category'];

					echo '</div>'; // .bgtag

					

					echo $post_data['thumbnail'];

				echo '</div>'; // .imgContainer

				

				echo '<br><p class="n_title">'. $post_data['get_the_title'] .'</p></a>';

				echo '<p class="n_content">' . $post_data['post_content'] . '</p>';

				echo '<p class="n_date">' . $post_data['pdate'] . '</p>';

				

			echo '</li>';

			

			$post_exlude_2[$y] = $post_data['post_exlude'];

			

			$y++;

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



	$args = array( 

		'post_type'   => 'post',

		'orderby'    => 'date',

		'posts_per_page' => 6, /*$x2,*/

		'post__not_in' => $post_exlude_2

	);



	$myposts2 = get_posts( $args );

	foreach ( $myposts2 as $post ){

		$djg_count = 0;

			

		echo '<li class="n_li"><a href="'. get_permalink() . '">';



		echo "<div class='imgContainer'>";

			

			echo "<div class='bgtag' style='background-color: " . $setting[0] . ";'>";// . get_the_post_thumbnail($post_id);

				$category_detail = get_the_category($post_id);//$post->ID

				

				foreach($category_detail as $cd){

					$ancestors = get_ancestors( $cd->term_id, 'category' );

					$p_id = $ancestors[0];

					$c_name = get_cat_name($p_id);

					$yourcat = get_category ($p_id);

					

					$blog_name = triangle_name($blog_id, $p_id);

				

					if ($blog_name == '' or $blog_name == 'slug') {

						$blog_name = $yourcat->slug;

					}

					if ($blog_name == 'name') {

						$blog_name = $c_name;

					}

					

					$count = strlen($blog_name);



					if ($count <= 7 ){

						$css_ = "font-size: 17px; top: 37px; color: " . $setting[1] . ";";

					}

					if ($count >= 8){

						$css_ = "font-size: 12px; top: 40px; left: -40px; color: " . $setting[1] . ";";

					}

					

					if ($djg_count == 0) {

						echo "<p style='" . $css_  . "'>" . $blog_name . "</p>";

						

						$djg_count++;

					}

				}

				

			echo "</div>"; // div.bgtag



			$img_link = catch_that_image($site_name);

			

			/* normal method */

			//$thumbnail_2 = "<img src='". $img_link . "' alt='' />";

			/* ------------- */

		

			/* formula method */

			$img_thumb_css = image_thumbnail($img_link, '100', '214', 'px');

			

			$thumbnail_2 = '<img src="';

			$thumbnail_2 .= $img_link;

			$thumbnail_2 .= '" ' . $img_thumb_css;

			//$thumbnail_2 .= '" ';

			$thumbnail_2 .= '/>';

			/* -------------- */

			

			//echo '<img src="' . $img_link . '" alt="" />';

			echo $thumbnail_2;

				

			echo '</div>'; // div.imgContainer

			

			echo '<br><p class="n_title">'.get_the_title().'</p></a>';

			$post_content = strip_tags($post->post_content);

			echo '<p class="n_content">' . $post_content . '</p>';

			echo '<p class="n_date">' . get_the_date('Y/m/d') . '</p>';

			echo '</li>';

		

	}



echo '</ul></div>';



?>





