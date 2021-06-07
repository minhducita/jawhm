<?php
	unset($taggy);
	unset($taggy2);
	unset($taggy_name);
	
	$taggy = array();
	$taggy2 = array();
	$taggy_name = array();
	
	$cat = get_query_var('cat');
	$yourcat2 = get_category ($cat);
	//echo '<br />' . $yourcat->slug;
	
	$posttags = get_the_tags(get_the_ID());
	if ($posttags) {
		foreach($posttags as $tag) {
			//$taggy[] = $tag->slug;
			$taggy[] = tag_link($tag->name);
			$taggy_name[] = $tag->name;
		}
	}
	
	$get_permalink = get_permalink();

	$get_the_title = get_the_title();
	$category_name = "";
	
	if ($blog_id <= 6) {
		/* English Blog Exclusive */
		$category_detail = get_the_category($post->ID);
		
		foreach ($category_detail as $cd) {
			$ancestors = get_ancestors( $cd->term_id, 'category' );
			$p_id = $ancestors[0];
			$c_name = get_cat_name($p_id);
			$yourcat = get_category ($p_id);
			
			$blog_name = triangle_name($blog_id, $p_id);
			
			if ($blog_name == '' or $blog_name == 'slug') {
				$blog_name = $yourcat->slug;
			}
			if ($blog_name == 'name') {
				$blog_name = $c_name;
			}
		}
		/* End of English Blog Exclusive */
		/* ----------------------------- */
	} else {
		$blog_name = triangle_name($blog_id, 0);
		if ($blog_name == '') {
			$blog_name = get_bloginfo('name');
		}
	}
	
	$img_link = catch_that_image($site_name, $blog_id, $p_id);
		
	/* normal method */
	/* $post_thumbnail =  '<img src="';
	$post_thumbnail .=  $img_link;
	$post_thumbnail .=  '" alt="" style="width:100%;" />'; */
	/* ------------- */
		
	/* formula method */
	$img_thumb_css = image_thumbnail($img_link, '100', '187', 'px');
	
	$post_thumbnail = '<img src="';
	$post_thumbnail .= $img_link;
	$post_thumbnail .= '" ' . $img_thumb_css;
	//$post_thumbnail .= '" ';
	$post_thumbnail .= '/>';
	/* -------------- */
	
	$count = strlen($blog_name);
	
	if ($count <= 7 ){
		$css_ = "font-size: 17px; top: 37px; color: " . $setting[1];
	}
	if ($count >= 8){
		$css_ = "font-size: 12px; top: 40px; left: -40px; color: " . $setting[1];
	}
	
	$category_name = "<p style='" . $css_  . "'>" . $blog_name . "</p>";
	
	$css_ = "";
	
	//$colorz = $color[((int)$blog_id) - 2];
	//if ($blog_id == 20) {
		//$colorz = 'black';
	//}
	
	$d_date = get_the_date('Y-m-d');
	
	$content_post = mb_substr(get_the_excerpt(), 0, 200);
?>

<li class="search">
	<a href="<?php echo $get_permalink; ?>" rel="bookmark">
		<!-- <div class="imgContainer" style="background-image: url('<?php echo $img_link; ?>');"> -->
		<div class="imgContainer">
			<div class="bgtag" style="background-color: <?php echo $colorz; ?>;">
				<?php echo $category_name; ?>
			</div> <!-- div.bgtag -->
		<?php echo $post_thumbnail; ?>
		</div> <!-- div.imgContainer -->
	</a>
	<div class="li_data">
		<header class="entry-header">
			<p>
				<span class="post_date nf"><?php echo $d_date; ?></span>
			</p>
			<h1 class="entry-title nf">
				<a href="<?php echo $get_permalink; ?>" rel="bookmark"><?php echo $get_the_title; ?></a>
			</h1>
			<p class="search_content"><?php echo $content_post; ?></p>
			<!-- <p style="color: black; margin-top: 5px; font-size: 10px;">カテゴリ ： <a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a></p> -->
		<?php 
			$taggy = array_filter($taggy);
			if (!empty($taggy)) { 
		?>
			<p class="search_content_tags">タグ ： <?php 
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
			?></p>
		<?php } ?>
		</header>
	</div>
</li>