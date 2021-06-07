<?php

get_header();
 
//$category = get_the_category();
//$current_category = $category[0];
//$parent_category = $current_category->category_parent;

$site_name = site_name();

$tag_posts = array();

$cat = get_query_var('cat');
$check_category = get_category($cat);
if ($check_category->category_parent == 0) {
	if ($blog_id <= 6) {
		$entry_per_page = 3; //-1 means all posts
	} else {
		$entry_per_page = 20; //-1 means all posts
	}
	$temp = 'school_top';
} else {
	$entry_per_page = 20; //-1 means all posts
	$temp = 'school_posts';
}

?>

<?php
	//echo get_category($cat);
?>

<?php 
	global $post;
	global $paged;
	
	include(locate_template('header_title.php'));
	//echo '<br />' . $parent_category;

	//$cat = get_query_var('cat');
	//$yourcat = get_category ($cat);
	//echo '<br />' . $yourcat->slug;
?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
		
		<?php
			// $school_name = explode('/', $_SERVER['REQUEST_URI']);
			$cat = get_query_var('cat');
			$parent = get_category ($cat);
				
			$setting = custom_site_settings($blog_id);
			$colorz = $setting[0];
			
			if ($parent->parent) {
				$catty = $cat;
			} else {
				$catty = $parent_category;
			}
			
			//echo $cat;
			
			if ( have_posts() ) : 
				
				if ($blog_id <= 6) { // English School Blogs
			
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // setup pagination
					
					/* Start the Loop */
					$the_query = array( 
						'orderby' => 'date',
						'cat' => $catty,
						'paged' => $paged,
						'posts_per_page' => $entry_per_page, 
					);
					
					$arrgs = new WP_Query( $the_query );
					
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $arrgs;
					
					echo '<ul>';
					while ( $arrgs->have_posts() ) : $arrgs->the_post();
						if ($temp == 'school_top') {
							get_template_part( 'content', get_post_format() );
						}
						if ($temp == 'school_posts') {
							include(locate_template('content-category-archive.php'));
						} 

					endwhile;
					echo '</ul>';
					
					wp_reset_postdata();	// avoid errors further down the page
					
					echo '<div class="navi" style="clear: both; margin-top: 20px;">';
						numeric_pagination('前', '次');
						//twentytwelve_content_nav( 'nav-below' );
					echo '</div>';
					
					$wp_query = NULL;
					$wp_query = $temp_query;
					
				} else { // Japanese Blogs
			
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // setup pagination
					
					/* Start the Loop */
					$the_query = array( 
						'paged' => $paged,
						'cat' => $cat,
						'posts_per_page' => $entry_per_page, 
					);
					
					$arrgs = new WP_Query( $the_query );
					
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $arrgs;
				
					echo '<ul>';
					while ( have_posts() ) : the_post();
					//while ( $arrgs->have_posts() ) : $arrgs->the_post();
					
						include(locate_template('content-category-archive.php'));
						//get_template_part( 'content', get_post_format() );

					endwhile;
					echo '</ul>';
					
					echo '<div class="navi" style="clear: both; margin-top: 20px;">';
						numeric_pagination('前', '次');
					echo '</div>';
					
					wp_reset_postdata();	// avoid errors further down the page
					
					$wp_query = NULL;
					$wp_query = $temp_query;
					
				}
				
			else :
			
				get_template_part( 'content', 'none' );
				
			endif;  ?>





		</div><!-- #content -->
	</section><!-- #primary -->

<?php
	if ($blog_id <= 6) { // English School Blogs
		get_sidebar();
	} else { // Japanese blogs
		include(locate_template('sidebarJP.php'));
	}
?>
<?php get_footer(); ?>