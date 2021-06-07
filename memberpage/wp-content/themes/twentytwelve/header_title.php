<?php
	$blog_id = get_current_blog_id();

	$category = get_the_category();
	$current_category = $category[0];
	$parent_category = $current_category->category_parent;
	
	//$p_name = $parent_category->slug;
	
	if ( $parent_category != 0 ) {
		$category_parent = get_term( $parent_category, 'category' );
		$p_name = $category_parent->slug;
		$p_id = $parent_category;
	} else {
		$p_name = $category[0]->slug;
		$p_id = $category[0];
	}
	
	if ($p_id == NULL) { // in case blog has no posts
		$p_id = $cat;
	}

	//$cat = get_query_var('cat');
	//$yourcat = get_category ($cat);
	
	include(locate_template('skin_setting.php'));
	
	if ($blog_id <= 6) {
		$head = '<a id="head_content_link" href="' . get_category_link($parent_category) . '" style="color: ' . $setting[1] . ';">';
		
		if ($header_name == '') {
			$header_name = get_cat_name($parent_category);
		}
	} else {
		$head = '<a id="head_content_link" href="' . get_site_url() . '" style="color: ' . $header_font_color . '">';
		
		if ($header_name == '') {
			$header_name = $category[0]->cat_name;
		}
	}
		
	$head .= $header_name . '</a>';
?>

<div class="head_content_wrapper" style="background: transparent url('<?php echo  network_home_url() . $header_bg; ?>') top center no-repeat">
	<h2 class="cat_name <?php the_title(); ?>">
	<?php
		echo $head;
		//echo '<br/>' . $blog_title;
		//echo '<br />' . $p_id;
	?>
	</h2>
</div>