<?php

/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 

$setting = custom_site_settings($blog_id);


get_header(); ?>

<div class="site-content-wrapper">
	<?php
		include(locate_template('header_title.php'));
		//echo '<br />' . $blog_id;//$parent_category;
		//echo '<br />' . 'test';
	?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php //echo get_the_date('Y-m-d'); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
					
				<?php
					$category = get_the_category();
					$current_category = $category[0];
					$parent_id = $current_category->category_parent;
					
					//$categories = get_the_category($post->ID);
					//$cat_id = $categories[0]->term_id;
					
					$args2 = array('parent' => $parent_id,);
					
					$catty = get_categories($args2);
					$catties = '';
					foreach($catty as $childcat) {
						$catties .= $childcat->term_id . ', ';
					}
				?>
					
					<nav class="nav-single nav_top">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
						<?php
							if ($blog_id >= 7) { // Japan Blog
									previous_post_link('<span class="nav-previous"><span class="nav-arrow">&laquo;</span> %link</span>', '%title');
							} else { // English Blog
								echo '<span class="nav-previous">';
									//previous_post_link_plus( array('in_same_author' => true) );
									previous_post_link_plus( array('in_cats' => $catties) );
								echo '</span>';
							}
						?>
						<?php
							if ($blog_id >= 7) { // Japan Blog
								next_post_link('<span class="nav-next">%link <span class="nav-arrow">&raquo;</span></span>', '%title');
							} else { // English Blog
								echo '<span class="nav-next">';
									//next_post_link_plus( array('in_same_author' => true) );
									next_post_link_plus( array('in_cats' => $catties) );
								echo '</span>';
							}
						?>
						</span>
					</nav>
						
						<?php
							//$author = get_the_author();
							$what_site = 'pc';
							include(locate_template('school_info.php'));
						?>
						
						<?php 
							comments_template( '', true ); 
							//include(locate_template('comments.php'));
						?>

						<div style="border: 1px dotted navy; margin:18px 0 0 0 ; padding: 14px 10px 14px 10px; line-height:130%; ">
							<p>ワーキングホリデーや留学に興味があるけど、海外で何かできるのか？
							何をしなければいけないのか？どんな準備や手続きが必要なのか？
							どのくらい費用がかかるのか？渡航先で困ったときはどうすればよいのか？
							解らない事が多すぎて、もっと解らなくなってしまいます。</p>
							<p>そんな皆様を支援するために日本ワーキングホリデー協会では、ワーホリ成功のためのメンバーサポート制度をご用意しています。</p>
							<p>ワーホリ協会のメンバーになれば、個別相談をはじめ、ビザ取得のお手伝い、出発前の準備、到着後のサポートまで、フルにサポートさせていただきます。</p>
							&nbsp;<br/>
							<center>
								<a href="/mem/" target="_blank"><img src="<?php echo network_home_url(); ?>australia/wp-content/uploads/sites/2/2014/10/member_ad_full.png" /></a>
							</center>

							<hr/>

							<p>日本ワーキングホリデー協会では、ワーキングホリデーの最新動向や必要なもの、ワーキングホリデービザの取得方法などのお役立ち情報の発信や、
							ワーキングホリデーに興味はあるけど、何から初めていいか分からないなどの、よくあるお悩みについての無料セミナーを開催しています。</p>
							<p>お友達もお誘いの上、どうぞご参加ください。</p>
							&nbsp;<br/>
							<center>
								<a href="/seminar/seminar/" target="_blank"><img src="<?php echo network_home_url(); ?>australia/wp-content/uploads/sites/2/2014/10/seminar_ad_full.png" /></a>
							</center>

						</div>

						<nav class="nav-single nav_bot">
							<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
							<?php
								if ($blog_id >= 7) { // Japan Blog
									previous_post_link('<span class="nav-previous"><span class="nav-arrow">&laquo;</span> %link</span>', '%title');
								} else { // English Blog
									echo '<span class="nav-previous">';
										//previous_post_link_plus( array('in_same_author' => true) );
										previous_post_link_plus( array('in_cats' => $catties) );
									echo '</span>';
								}
							?>
							<?php
								if ($blog_id >= 7) { // Japan Blog
										next_post_link('<span class="nav-next">%link <span class="nav-arrow">&raquo;</span></span>', '%title');
								} else { // English Blog
									echo '<span class="nav-next">';
										//next_post_link_plus( array('in_same_author' => true) );
										next_post_link_plus( array('in_cats' => $catties) );
									echo '</span>';
								}
							?>
							</span>
						</nav>

			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div>
	
	<?php
	if ($blog_id <= 6) { // English School Blogs
		get_sidebar();
	} else { // Japanese blogs
		include(locate_template('sidebarJP.php'));
	}
	?>
	<!-- #primary -->
</div>

<?php get_footer(); ?>