<?php
/**
 * Template Name: sub_main
 */

get_header(); ?>
	<div class="head_content_wrapper">
		<h2 class="cat_name <?php the_title(); ?>">
		<?php 
			$category = get_the_category();
			$current_category = $category[0];
			$parent_category = $current_category->category_parent;
			
			if ( $parent_category != 0 ) {
				echo '<a id="head_content_link" href="' . get_category_link($parent_category) .'">' . get_cat_name($parent_category) . '</a>';
			}
		?>
		</h2>
	</div>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 1,
				'paged' => $paged,
      );
			 
			query_posts($args);
			
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
				get_template_part( 'content', get_post_format() );

			endwhile;

			// twentytwelve_content_nav( 'nav-below' );
			echo paginate_links( $args );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>