<?php
/**
 * Template Name: sub_newentry_JP
 */

global $wpdb;

echo '<div class="main_newentry"><ul>';

	$args = array( 
		'post_type'   => 'post',
		'orderby'    => 'date',
		'posts_per_page' => 12,
	);

	$myposts2 = get_posts( $args );
	foreach ( $myposts2 as $post ){
		$djg_count = 0;
			
		echo '<li><a href="'. get_permalink() . '">';

		echo "<div class='imgContainer'>";
			
			echo "<div class='bgtag' style='border-color: transparent transparent " . $inc_color . " transparent;'>" . get_the_post_thumbnail($post_id);
				$category_detail = get_the_category($post_id);//$post->ID
				
				foreach($category_detail as $cd){
					$ancestors = get_ancestors( $cd->term_id, 'category' );
					// $count =  strlen(get_cat_name($ancestors[0]));
					$thisCat = $ancestors[0];
					$count = strlen($yourcat->slug);

					if ($count <= 7 ){
						$css_ = "font-size: 20px; top: 32px;";
					}
					if ($count >= 8){
						$css_ = "font-size: 13px; top: 35px;";
					}
					
					if ($djg_count == 0) {
						// echo "<p style='" . $css_  . "'>" . $ancestors[0] . "</p>";
						echo "<p style='" . $css_  . "'>" . $yourcat->slug . "</p>";
						
						$djg_count++;
					}
				}
				
			echo "</div>"; // div.bgtag

			//if ( get_the_post_thumbnail($post_id) != '' ) {
			$img_link = catch_that_image();
			if ($img_link == '/path/to/default.png') {
				//the_post_thumbnail();
				echo '<img src="';
				$linky = $site_name . 'wp-content/uploads/2014/11/no_image.jpg';
				echo $linky;
				echo '" alt="" />';
			} else {
				echo '<img src="';
				$linky = str_replace('[domain]', $site_name, $img_link);
				echo $linky;
				echo '" alt="" />';
			}
			
		echo '</div>'; // div.imgContainer
		
		echo '<br><p class="n_title">'.get_the_title().'</p></a>';
		$post_content = $post->post_content;
		echo '<p class="n_content">' . mb_substr($post_content, 0,5) . '...</p>';
		echo '<p>' . get_the_date('Y/m/d') . '</p>';
		echo '</li>';
		
	}

echo '</ul></div>';

?>


