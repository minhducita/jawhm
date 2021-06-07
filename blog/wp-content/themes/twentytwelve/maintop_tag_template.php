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
		/*
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
		}		*/				$filter = array(						'海外生活',						'ワーキングホリデー',						'留学',						'人気国',						'費用',						'ビザ',						'セミナー',						'語学学校',						'英会話',						'観光',						'体験談',						'イベント',						'仕事',						'グルメ',						'カウンセラー',						'トロント',						'バンクーバー',						'シドニー',						'メルボルン',						'ロンドン'		);		foreach ( $filter as $count => $tag) {				$tag_link = clean_url($tag_links[$tag]);				$tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));				// print "<li><a href='" . network_home_url() . "tag?tag=" . $tag . "' title=\"$count\">$tag</a></li>";				$tag_list[] = "<li><a href='" . network_home_url() . "search/tag?tag=" . $tag . "' title=\"$count\">$tag</a></li>";		}		for($x=0;$x<count($tag_list);$x++){		echo $tag_list[$x];		
	}
}	
	restore_current_blog();
?>