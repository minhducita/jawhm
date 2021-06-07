<?php
/**
 * Mobile version of displaying content
 */
	global $post;
	
	$site_name = site_name();
	
	$eng = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	$jap = array('（日）', '（月）', '（火）', '（水）', '（木）', '（金）', '（土）');
	
	for ($x=0; $x<=count($eng); $x++) {
		if (get_post_time('l') == $eng[$x]) {
			$det = $jap[$x];
			break;
		}
	}
	
	$post_date = '<p class="date">' . get_post_time('Y年m月d日') . ' ' . $det . '</p>';
	
	$posttags = get_the_tags(get_the_ID());
	if ($posttags) {
		foreach($posttags as $tag) {
			//$taggy[] = $tag->slug;
			$taggy[] = tag_link($tag->name);
			$taggy_name[] = $tag->name;
		}
	} //else {
		//$taggy[] = $tag->slug;
		//$taggy_name[] = $tag->name;
	//}
	
	$get_permalink = get_permalink();
	
	$title = '<p class="title"><a href="' . $get_permalink . '">' . get_the_title() . '</a></p>';
	
	//$post_content =  $post->post_content;
	//$post_content = str_replace('[domain]', $site_name, $post_content);
	
	global $post;
	$categories = get_the_category($post->ID);
	
	$cat_link = get_category_link($categories[0]->term_id );
	$cat_name = $categories[0]->cat_name;
	
	$post_category = '<a href="' . $cat_link . '">' . $cat_name . '</a>';
?>
<div class="hero-unit content" id="content_test">
	<div class="title_n_date">
		<?php
			//edit
			echo $post_date;
			echo $title;
		?>
	</div>

	<div class="post_content">
		<?php
			//echo $post_content;
			the_content();
		?>
	</div>

	<div class="tags">
		<p>カテゴリ ： <?php echo $post_category; ?></p>
		<p>タグ ： 
			<?php
				$nummy = 0;
				foreach($taggy as $taggy2) {
					if($nummy > 0) {
						echo ' / ';
					}
					echo '<a href="' . network_home_url() .'search/tag/?tag='. $taggy2 .'">';
					
					echo $taggy_name[$nummy];
					
					echo '</a>';
					
					$nummy++;
				}
			?>
		</p>
	</div>
</div>