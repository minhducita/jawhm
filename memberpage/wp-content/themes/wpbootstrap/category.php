<?php
/**
 * Template Name: category
 */

get_header(); 
include(locate_template('header_2.php'));

$site_name = site_name();

$search_key = $_GET['s'];
$search_range = $_GET['r'];
$search_category = $_GET['pc'];

global $post;
global $paged;

?>
	<div class="hero-unit blog_posts">
		<?php
			$cat = get_query_var('cat');
			$parent = get_category ($cat);

			if ($parent->parent) {
				$catty = $cat;
			} else {
				$catty = $parent_category;
			}
			
			//echo $cat;
			
			if ( have_posts() ) : 
			
				if ($blog_id <= 6) {
				
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					
					$the_query = array( 
						'cat' => $catty,
						'paged' => $paged,
						's' => $search_key,
						'posts_per_page' => 10,
					);
					
					$arrgs = new WP_Query( $the_query );
					
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $arrgs;
					
					while ( $arrgs->have_posts() ) : $arrgs->the_post();
						echo '<div class="japan_newentry">';
							include(locate_template('content-japanblog.php'));
							//get_template_part( 'content', get_post_format() );
						echo '</div>';
					
					endwhile;
					
					echo '<div class="pagination">';
						numeric_pagination('前の記事', '次の記事');
					echo '</div>';
					
					wp_reset_postdata();
					
					$wp_query = NULL;
					$wp_query = $temp_query;
					
				} else {
					
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					
					//$the_query = new WP_Query( array( 
					$the_query = array( 
						'cat' => $cat,
						'paged' => $paged,
						's' => $search_key,
						'posts_per_page' => 10,//) 
					);
					
					$arrgs = new WP_Query( $the_query );
					
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $arrgs;
					
					//while ( $the_query->have_posts() ) : $the_query->the_post();
					while ( have_posts() ) : the_post();
						echo '<div class="japan_newentry">';
							include(locate_template('content-japanblog.php'));
							//get_template_part( 'content', get_post_format() );
						echo '</div>';
					endwhile;
					
					wp_reset_postdata();
					
					echo '<div class="pagination">';
						numeric_pagination('前の記事', '次の記事');
					echo '</div>';
					
					$wp_query = NULL;
					$wp_query = $temp_query;
					
				}
			
			endif;
		?>
	</div>

<?php 
	if ($blog_id > 6) { // Japanese Blogs
		include(locate_template('jp-footer.php'));
	} else { // English Blogs
		include(locate_template('eng-footer.php'));
	}
	
	get_footer();
?>