<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div class="head_content_wrapper">
		<h2 class="cat_name">
		<?php 
			global $post;
			
			include(locate_template('header_title.php'));
		?>
		</h2>
	</div>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
				the_post();
				
				rewind_posts();
			?>

			<?php //twentytwelve_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<div class="navi">
				<?php
					/* Instructions */
					/* numeric_pagination('Previous Text', 'Next Text'); */
					numeric_pagination('前', '次');
					//twentytwelve_content_nav( 'nav-below' );
				?>

			</div>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar();//include(locate_template('sidebar.php')); ?>
<?php get_footer(); ?>