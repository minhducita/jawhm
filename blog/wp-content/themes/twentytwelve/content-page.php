<?php

/**

 * The template used for displaying page content in page.php

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */

?>



	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">

			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>

			<?php the_post_thumbnail(); ?>

			<?php endif; ?>

			<!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
			<?php
				$eng = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
				$jap = array('（日）', '（月）', '（火）', '（水）', '（木）', '（金）', '（土）');
				for ($x=0; $x<=count($eng); $x++) {
					if (get_post_time('l') == $eng[$x]) {
						$det = $jap[$x];
						break;
					}
				}
				echo '<span class="post_date">' . get_post_time('Y年m月d日') . ' ' . $det . '</span>';
			?>

		</header>



		<div class="entry-content">

			<?php the_content(); ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>

		</div><!-- .entry-content -->



		<footer class="entry-meta">

			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>

		</footer><!-- .entry-meta -->

	</article><!-- #post -->

