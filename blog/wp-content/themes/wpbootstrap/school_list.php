<?php
/**
 * Template Name: school_list
 *
 * by Neil Solomon
 * modified by Joseph B.
 */
 
	$eng_blog = array('2', '3', '4', '5', '6');
	$logo_list = array();
	$counter = 0;
	
	$current = $blog_id;

	foreach ( $eng_blog as $b_id ) {
		switch_to_blog($b_id);
		
		unset($categories);
		$logo = '';
		
		$args = array(
			'orderby'    => 'name',
			'parent' => 0
		);
		
		$categories = get_categories( $args );
		
		foreach ( $categories as $category ) {
			if($category->term_id != 1){
				if ($category->slug != 'newsvancouver') {
					$logo = '<li><a href=' . get_site_url() . "/" . $category->slug .'>';
					$logo .= '<img src="' . z_taxonomy_image_url($category->term_id). '" />';
					$logo .= '</a></li>';
					
					$logo_list[$counter] = $logo;
				}
				
				$counter++;
			}
		}
	}
	
	switch_to_blog($current);

	echo '<ul>';
	
	shuffle($logo_list);
	
	foreach($logo_list as $logo_data){
		echo $logo_data;
	}
	
	//echo '<li><img src="' . network_home_url() . '/wp-content/uploads/2014/11/cute_hamster1.png" /></li>';
	
	echo '</ul>';

?>