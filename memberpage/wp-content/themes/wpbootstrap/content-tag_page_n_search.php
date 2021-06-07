<?php
	$org_blog_id = get_post_meta ($post->ID, 'blogid', true);
	//if($org_blog_id) {
		//$blog_details = get_blog_details($org_blog_id);
		//$blog_name = $blog_details->blogname;
		//$blog_slug = $blog_details->siteurl;
		//$category_test = get_the_category($post->ID);
		//$firstCategory = $category_test[0]->cat_name;
	//}
	
	unset($taggy);
	unset($taggy2);
	unset($taggy_name);
	$taggy = array();
	$taggy2 = array();
	$taggy_name= array();

	$posttags = get_the_tags(get_the_ID());
	if ($posttags) {
		foreach($posttags as $tag) {						
			$taggy[] = $tag->slug;
			$taggy_name[] = $tag->name;
		}
	}
	
	$get_permalink = get_permalink();

	$get_the_title = get_the_title();
	$category_name = "";

	$setting = custom_site_settings($org_blog_id);
	$colorz = $setting[0];
	
	/* get proper categories */
	$current_blog = $blog_id;
	switch_to_blog($org_blog_id);
	
	if ($org_blog_id <= 6) {
		$piece = explode('/', $get_permalink);
		
		$pop = $piece[ count($piece) - 2];
		//$pop = $piece[7];
		$category_detail = get_the_category($pop);
		
		foreach ($category_detail as $cd) {
			$ancestors = get_ancestors( $cd->term_id, 'category' );
			$p_id = $ancestors[0];
			$c_name = get_cat_name($p_id);
			$yourcat = get_category ($p_id);
			
			$blog_name = triangle_name($org_blog_id, $p_id);
			
			if ($blog_name == '' or $blog_name == 'slug') {
				$blog_name = $yourcat->slug;
			}
			if ($blog_name == 'name') {
				$blog_name = $c_name;
			}
		}
	} else {
		$blog_name = triangle_name($org_blog_id, 0);
		if ($blog_name == '') {
			$blog_name = get_bloginfo('name');
		}
	}
	
	$img_link = catch_that_image($site_name, $org_blog_id, $p_id);
	//$post_thumbnail =  '<img src="';
	//$post_thumbnail .=  $img_link;
	//$post_thumbnail .=  '" alt="" style="width:100%;" />';
	
	$count = strlen($blog_name);

	if ($count <= 7 ){
		$css_ = "font-size: 11px; color: " . $setting[1] . ";";
	}
	if ($count >= 8){
		$css_ = "font-size: 10px; color: " . $setting[1] . ";";
	}
	$category_name = "<p style='" . $css_  . "'>" . $blog_name .  "</p>";
	//$category_name = "<p style='" . $css_  . "'>" . $pop .  "</p>";
	
	$css_ = "";
	
	$d_date = get_the_date('Y-m-d');

	$img_link = catch_that_image($site_name, $org_blog_id, $p_id);
	
	$img_thumb_css = image_thumbnail($img_link, '105', '219', 'px', 'mobile');
	
	$content_post = mb_substr(strip_tags(get_the_excerpt()), 0, 100);
	$post_thumbnail = '<img src="';
	$post_thumbnail .= $img_link;
	$post_thumbnail .= '" ' . $img_thumb_css;
	$post_thumbnail .= '/>';
	
	$content_post = mb_substr(strip_tags(get_the_excerpt()), 0, 80); 
	
	switch_to_blog($current_blog);
	/* --------------------- */
	
?>
			
<div class="japan_newentry">
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
				//$title = '<div class="japan_newentry_title" style="color: ' . $setting[0] . '"><p><a href="' . $get_permalink . '">' . get_the_title() . '</p></div>';
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
				$taggy[] = $tag->slug;					
				$taggy_name[] = $tag->name;
			}
		}
	?>
	<div class="japan_newentry_tags">
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