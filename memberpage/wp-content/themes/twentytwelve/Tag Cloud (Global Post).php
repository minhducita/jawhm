<?php 
/**
 * Template Name: tag_cloud_(global_post)
 *
 * created by Joseph B.
 */
 
	$testblog = 16;
	switch_to_blog($testblog);
	
	$tags = get_tags();
	$html = '<p>タグ一覧</p>';
	$x = 0;
	
/* font sizes */
	foreach ( $tags as $tag2 ) {
		$tag_count[] = $tag2->count;
	}
	
	$size = min($tag_count) / max($tag_count);
/* end of font sizes */
/* ---------------------------- */
	
	shuffle($tags);
	
	foreach ( $tags as $tag ) {
		if ($tag->count == 1) {
			$y = $tag->count . " post!";
		} else {
			$y = $tag->count . " posts!";
		}
		if ($x != 0) {
			$html .= " | ";
		}
		if ($tag->count == 1) {
			$fontsize = 1;
		} else {
			$fontsize = 1 + ($size * $tag->count);
			if ($fontsize >= 2) {
				$fontsize = 2;
			}
		}
		
		$html .= "<a href='" . network_home_url() . "search/tag?tag={$tag->slug}' title='{$y}' class='{$tag->slug}'>";
		$html .= "<span style='font-size: " . $fontsize . "em; '>";
		$html .= "{$tag->name}</span></a>";
		$x++;
	}
	
	echo $html;
	
?>