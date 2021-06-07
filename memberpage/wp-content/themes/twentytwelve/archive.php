<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div class="head_content_wrapper">
		<h2 class="cat_name <?php the_title(); ?>"><?php 
			global $post;
			$categories = get_the_category($post->ID);
			echo $categories[0]->cat_name;
		?></h2>
	</div>
	<section id="primary" class="site-content">
		<div id="content" role="main">
		
			<?php
				//$the_query = new WP_Query( array(
					//'cat' => $_GET['cat'],
					//'year' => $_GET['year'], // 2013,
					//'monthnum' => $_GET['month'], // 3,
					//'posts_per_page' => '-1',)
				//);
				query_post('cat=' . $_GET['cat'] . '&monthnum=' . $_GET['month']);
			?>

		<?php if ( have_posts() ) : ?>
<!--			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
					else :
						_e( 'Archives', 'twentytwelve' );
					endif;
				?></h1>
			</header> --> <!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			//while ( $the_query->have_posts() ) : $the_query->the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
				/* $my_var = get_comments_number( $post->ID );
				$posttags = get_the_tags($post->ID);
					if ($posttags) {
								foreach($posttags as $tag) {
									echo 'カテゴリ：  <a href="'.get_category_link($categories[0]->term_id ).'">'.$categories[0]->cat_name.'</a> コメント：'. $my_var .'件';
									echo '<div class="a_tag">タグ： <a href="' . get_home_url() .'/tag/'. $tag->name .'">' .$tag->name .'</a> 
</div>';
								}
					} */

			endwhile;

			twentytwelve_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<table border="0">
			<tr>
			<td style="padding:3px;"><a href="/seminar/seminar/"><img src="<?php echo network_home_url(); ?>australia/wp-content/uploads/sites/2/2014/10/seminar_ad.png" /></a></td>
			<td style="padding:3px;"><a href="/mem/"><img src="<?php echo network_home_url(); ?>australia/wp-content/uploads/sites/2/2014/10/member_ad.png" /></a></td>
			</tr>
		</table>
		
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>