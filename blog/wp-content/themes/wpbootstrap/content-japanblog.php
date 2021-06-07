<?php
	$setting = custom_site_settings($blog_id);
	
	$get_permalink = get_permalink();
	
	$category_name = "";
	$category_detail = get_the_category($post_id);
	
	$current_category = $category_detail[0];
	$parent_category = $current_category->category_parent;
	
	if ($blog_id <= 6) {
		if ( $parent_category != 0 ) {
			$category_parent = get_term( $parent_category, 'category' );
			$p_id = $parent_category;
			$c_slug = $category_parent->slug;
			$c_name = get_cat_name($parent_category);
		} else {
			$p_id = $category[0];
			$c_slug = $category[0]->slug;
			$c_name = get_cat_name($category[0]);
		}
		
		$p_name = triangle_name($blog_id, $p_id);
		if ($p_name == '' or $p_name == 'slug') {
			$p_name = $c_slug;
		}
		if ($p_name == 'name') {
			$p_name = $c_name;
		}
	} else {
		$p_name = triangle_name($blog_id, 0);
		if ($p_name == '') {
			$p_name = get_bloginfo('name');
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
	
	$img_link = catch_that_image($site_name, $blog_id, $p_id);
	
	$img_thumb_css = image_thumbnail($img_link, '105', '219', 'px', 'mobile');
	
	$content_post = mb_substr(strip_tags(get_the_excerpt()), 0, 100);
	$post_thumbnail = '<img src="';
	$post_thumbnail .= $img_link;
	$post_thumbnail .= '" ' . $img_thumb_css;
	$post_thumbnail .= '/>';
?>

<div class="japan_newentry_left">
	<a href="<?php echo $get_permalink; ?>">
		<div class="post_time">
			<p><?php echo get_post_time('Y年m月d日');// . ' ' . $det; ?></p>
		</div>

		<!--<div class="post_img" style="background-image: url('<?php //echo $img_link; ?>')">-->
		<div class="post_img">
			<div class="bgtag" style="background-color: <?php echo $setting[0]; ?>; ">
		
				<?php echo $category_name; ?>
			
			</div>
			
			<?php echo $post_thumbnail; ?>
			
		</div>
	</a>
</div>

<div class="japan_newentry_right">
	<div class="title_n_content">
		<?php
			$title = '<a href="' . $get_permalink . '"><div class="japan_newentry_title simple_title"><p>' . get_the_title() . '</p></div>';
			
			$content = '<p class="content">' . $content_post . '</p>';
			
			$img_button = '<p class="img_button"><img src="' . network_site_url() . '/wp-content/uploads/2015/01/blue-btn.png" width="100%" /></p>';
			
			echo $title . $content . '</a>';// . $img_button;
			
		?>
	</div>
</div>

<?php
	global $post;
	unset($taggy);
	unset($taggy_name);
	
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
?>
<div class="japan_newentry_tags">
	<p>タグ ： 
		<?php
			$nummy = 0;
			foreach($taggy as $taggy2) {
				if($nummy > 0) {
					echo ', ';
				}
				echo '<a href="' . network_home_url() .'search/tag/?tag='. $taggy2 .'">';
				
				echo $taggy_name[$nummy];
				
				echo '</a>';
				
				$nummy++;
			}
		?>
	</p>
</div>