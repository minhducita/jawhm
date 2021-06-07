<?php
/**
 * Template Name: Archive Page Template
 */
 
/**
 * notes
 *
 * $_GET['cat'] = parent category
 * $_GET['month'] = date month
 * $_GET['yr'] = date year
 */

function assignPageTitle(){
	$title = $_GET['yr'] . "年 | " . $_GET['month'] . "月 | " . get_cat_name($_GET['cat']);
	return $title;
}
add_filter('wp_title', 'assignPageTitle');

$site_name = site_name();

$tag_posts = array();

$entry_per_page = 10; //-1 means all posts

get_header();
//include(locate_template('header_2.php'));
?>

<div class="container">

<div class="hero-unit tag_head">
	<?php
		echo $_GET['yr'] . "年 | " . $_GET['month'] . "月 | " . get_cat_name($_GET['cat']);
	?>
</div>

<div class="hero-unit blog_posts">
	<?php
		$setting = custom_site_settings($blog_id);
		$colorz = $setting[0];
		
		$the_query = array( // Define custom query parameters
			'cat' => $_GET['cat'],
			'year' => $_GET['yr'],
			'monthnum' => $_GET['month'],
			'posts_per_page' => $entry_per_page,
		);
		
		$the_query['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		
		$custom_query = new WP_Query( $the_query );
		
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $custom_query;
		
		while ( $custom_query->have_posts() ) : $custom_query->the_post();
			echo '<div class="japan_newentry">';
				include(locate_template('content-japanblog.php'));
			echo '</div>';
		endwhile;
					
		echo '<div class="pagination">';
			numeric_pagination('前の記事', '次の記事');
		echo '</div>';
		
		wp_reset_postdata();
		
		$wp_query = NULL;
		$wp_query = $temp_query;
	?>
</div>

<?php
	if ($blog_id > 6) { // Japanese blogs
		include(locate_template('jp-footer.php'));
	} else {
		include(locate_template('eng-footer.php'));
	}
	
	get_footer();
?>