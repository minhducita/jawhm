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
			
			if($i <= 25){
				// print "<li><a href='" . network_home_url() . "tag?tag=" . $tag . "' title=\"$count\">$tag</a></li>";
				$tag_list[$i] = "<li><a href='" . network_home_url() . "search/tag?tag=" . $tag . "' title=\"$count\">$tag</a></li>";
			}
		}
		
		shuffle($tag_list);
		for($x=0;$x<count($tag_list);$x++){
			echo $tag_list[$x];
		}
	}
	
	restore_current_blog();
?>