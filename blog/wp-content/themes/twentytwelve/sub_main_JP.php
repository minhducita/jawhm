<?php
/**
 * Template Name: sub_main_JP
 */

get_header(); ?>

	<section id="primary" class="site-content" style="width: 71.5%;">
		<div id="content" role="main">
			
			<?php
				
				$args = array(
					'post_type'   => 'post',
					'orderby'    => 'date',
					'posts_per_page' => 6,
				);
				
				$the_query = get_posts( $args );
				
				foreach ( $the_query as $post ){ ?>
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<header class="entry-header">
							<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
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
						</header><!-- .entry-header -->
						
						<div class="entry-content" style="clear: both;">
							<?php echo $post->post_content; ?>
						</div>
						
					</article>
					
				<?php }
			
			?>
				
		</div><!-- #content -->
	</section><!-- #primary -->

<?php

	include(locate_template('sidebarJP.php'));
	
	get_footer();
	
?>