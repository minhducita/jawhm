<?php
	global $blog_id;
	global $post_id;
	
	if ($blog_id != 1 and $blog_id != 16) {
		$category = get_the_category();
		$current_category = $category[0];
		$parent_category = $current_category->category_parent;
	
		if ( $parent_category != 0 ) {
			$category_parent = get_term( $parent_category, 'category' );
			$p_name = $category_parent->slug;
			$p_id = $parent_category;
		} else {
			$p_name = $category[0]->slug;
			$p_id = $category[0];
		}
	
		include(locate_template('../twentytwelve/skin_setting.php'));
	
		if ($blog_id <= 6) {
			//$head = '<a id="head_content_link" href="' . get_category_link($parent_category) . '" style="color: ' . $setting[1] . ';">';
			$cat_top_link = get_category_link($parent_category);
			$head = '<a id="head_content_link" href="' . $cat_top_link . '" style="color: #39648F;">';
			
			if ($header_name == '') {
				$header_name = get_cat_name($parent_category);
			}
		} else {
			//$head = '<a id="head_content_link" href="' . get_site_url() . '" style="color: ' . $header_font_color . '">';
			$cat_top_link = get_site_url();
			$head = '<a id="head_content_link" href="' . $cat_top_link . '" style="color: #39648F;">';
			
			if ($header_name == '') {
				$header_name = $category[0]->cat_name;
			}
		}
			
		$head .= $header_name;
		
		echo '<div class="header_name">';
			echo $head;
		echo '</div>';
	}
?>

<?php
	if ($blog_id != 16) {
		
		if ($blog_id <= 6) {
			$category = get_the_category();
			$current_category = $category[0];
			$parent_category = $current_category->category_parent;
			
			if ( $parent_category != 0 ) {
				$p_id = $parent_category;
			} else {
				$p_id = $category[0];
			}
		} else {
			$p_id = 0;
		}
	
		if ($p_id == NULL) { // in case blog has no posts
			$p_id = $cat;
		}
?>
		<div class="eng_banner s_logo <?php $siteTitle = get_bloginfo('name'); echo str_replace(" ", "", $siteTitle); ?>_head">
			<?php
				$site_name = site_name();
				echo site_header_img($site_name, $blog_id, $p_id);
			?>
		</div>
<?php
	}
?><!--<img src="wp-content/uploads/2014/11/hamster.png">--></a></div>
</div>

<div class="container">