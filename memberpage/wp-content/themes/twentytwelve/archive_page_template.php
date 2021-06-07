<?php
/**
 * Template Name: Archive Page Template
 *
 * The template for displaying archives
 *
 * by Joseph B.
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

$entry_per_page = 20; //-1 means all posts

get_header(); ?>

<section id="primary" class="site-content" style="width: 65.104166667%;">
		<div id="content" role="main">

			<header class="archive-header">
				<h1 class="archive-title">
					<span>
						<?php
							echo $_GET['yr'] . "年 | " . $_GET['month'] . "月 | " . get_cat_name($_GET['cat']);
						?>
					</span>
				</h1>
			</header>
		
			<?php
				
				//switch_to_blog(2);
				
				$setting = custom_site_settings($blog_id);
				$colorz = $setting[0];
				
				//$the_query = new WP_Query( array(
				$the_query = array( // Define custom query parameters
					'cat' => $_GET['cat'],
					'year' => $_GET['yr'], // 2013,
					'monthnum' => $_GET['month'], // 3,
					'posts_per_page' => $entry_per_page,//)
				);
				
				// Get current page and append to custom query parameters array
				$the_query['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				
				// Instantiate custom query
				$custom_query = new WP_Query( $the_query );
				
				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $custom_query;
				
				//while ( $the_query->have_posts() ) : $the_query->the_post();
				while ( $custom_query->have_posts() ) : $custom_query->the_post();
				//while ( have_posts() ) : the_post();
					
					//if ( get_the_date('Y') == $_GET['yr'] ) {
						//get_template_part( 'content', get_post_format() );
						include(locate_template('content-category-archive.php'));
					//}
				
				endwhile;
				
				// Reset postdata
				wp_reset_postdata();
				
				echo '<div class="navi" style="clear: both; margin-top: 20px;">';
					numeric_pagination('前', '次');
					//previous_posts_link( 'Older Posts' );
					//next_posts_link( 'Newer Posts', $custom_query->max_num_pages );
				echo '</div>';
					
				//restore_current_blog();
				
				// Reset main query object
				$wp_query = NULL;
				$wp_query = $temp_query;
			
			?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php 
	if ($blog_id <= 6) {
		get_sidebar();
	} else {
		include(locate_template('sidebarJP.php'));
	}
	
?>
<?php get_footer(); ?>