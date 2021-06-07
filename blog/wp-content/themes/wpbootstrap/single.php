<?php

/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

	get_header();
	include(locate_template('header_2.php'));

	$site_name = site_name();
	$setting = custom_site_settings($blog_id);

	$category = get_the_category();
	$current_category = $category[0];
	$parent_category = $current_category->category_parent;

	if ($blog_id <= 6) { // English Blogs
		if ( $parent_category != 0 ) {
			$cat_link = get_category_link($parent_category);
		}
	} else { // Japanese Blogs
		$firstCategory = $category[0]->cat_name;
		$cat_link = get_category_link($category[0]);
	}

	$args2 = array('parent' => $parent_category,);
	$catty = get_categories($args2);
	$catties = '';
	foreach($catty as $childcat) {
		$catties .= $childcat->term_id . ', ';
	}
?>

<div class="hero-unit navi-top">
	<div class="nav-prev-base">
		<?php
			previous_post_link_plus_mobile( array('in_cats' => $catties) );
		?>
	</div>
	<div class="nav-home">
		<p class="p-top-img">
			<a href="<?php echo $cat_top_link; ?>">
				<img src="<?php echo network_home_url(); ?>wp-content/uploads/2014/12/home-img.png" />
			</a>
		</p>
	</div>
	<div class="nav-next-base">
		<?php
			next_post_link_plus_mobile( array('in_cats' => $catties) );
		?>
	</div>
</div>

<?php
	while ( have_posts() ) : the_post();
		include(locate_template('content.php'));
	endwhile; // end of the loop.
?>

<div class="hero-unit navi-bottom">
	<div class="nav-prev-base">
		<?php
			previous_post_link_plus_mobile( array('in_cats' => $catties) );
		?>
	</div>
	<div class="nav-home">
		<p class="p-top-img">
			<a href="<?php echo $cat_top_link; ?>">
				<img src="<?php echo network_home_url();?>wp-content/uploads/2014/12/home-img.png" />
			</a>
		</p>
	</div>
	<div class="nav-next-base">
		<?php
			next_post_link_plus_mobile( array('in_cats' => $catties) );
		?>
	</div>
</div>

<!--<script>
$(function() {
jQuery(document).ready(function() { // <-- try this one and see if it works
	$(".test_area").swipe( {
		swipeLeft:function(event, direction, distance, duration,) {
			//if($("#a_next").get(0)){
				//var href = $('#a_next').attr('href');
				//window.location.href = href;
			//}
			$("#test_p").text("You swiped " + direction );	
		},
		swipeRight:function(event, direction, distance, duration,) {
			//if($("#a_prev").get(0)){
				//var href = $('#a_prev').attr('href');
				//window.location.href = href;
			//}
			$("#test_p").text("You swiped " + direction );	
		},
		
		threshold:0
	});
});
</script>-->

<?php
	if ($blog_id > 6) { // Japanese blogs
		include(locate_template('jp-footer.php'));
	} else { // English blogs
		include(locate_template('eng-footer.php'));
	}
	get_footer();
?>