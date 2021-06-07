<?php
/**
 * Template Name: maintop's_tag_list_template
 *
 * created by Joseph B.
 */
	$testblog = 16;
	switch_to_blog($testblog);
	// include_page(6);
	
	$tags = get_tags();
	
	if ($tags) {
		
		$counts = $tag_links = array();
		$tag_list = array();
		
		foreach ( (array) $tags as $tag ) {
			$counts[$tag->name] = $tag->count;
			$tag_links[$tag->name] = get_tag_link( $tag->term_id );
		}

		asort($counts);
		$counts = array_reverse( $counts, true );

		$i = 0;
		
		foreach ( $counts as $tag => $count ) {
			$i++;
			$tag_link = clean_url($tag_links[$tag]);
			$tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
			
			if($i <= 20){
				$tag_list[$i] = "<li class='li-tag-list'><p class='p-tag-list'><a href='" . network_home_url() . "search/tag?tag=" . $tag . "' title=\"$count\"><img class='li-tag-list-2' src=\"" . site_url() . "/wp-content/uploads/2014/11/triangle.gif\" /> $tag</a></p></li>";
			}
		}
		
		shuffle($tag_list);
		for($x=0;$x<count($tag_list);$x++){
			echo $tag_list[$x];
		}
	}
	
	restore_current_blog();
?>