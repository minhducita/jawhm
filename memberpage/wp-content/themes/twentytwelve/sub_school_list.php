<?php
/**
 * Template Name: sub_school_list

 */
 
 
 
echo '<ul class="ul_school_list">';
		$args = array(
		  'orderby'    => 'name',
		  'parent' => 0
		  );
		$categories = get_categories( $args );
		shuffle( $categories );
		foreach ( $categories as $category ) {
			if($category->term_id != 1){
				if ($category->slug != 'newsvancouver' and $category->slug != 'newssydney') {
					echo '<li><a href=' . get_site_url() . "/" . $category->slug .'>';
						/* print_r($category); */
						echo '<img src="' . z_taxonomy_image_url($category->term_id). '" />';
					echo '</a></li>';
				}
			}
		} 
echo '<li id="ele"><img src="' . network_home_url() . '/wp-content/uploads/2014/11/cute_hamster1.png" /></li></ul>';


?>


