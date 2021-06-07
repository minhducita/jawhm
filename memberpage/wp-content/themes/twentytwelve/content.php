<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<div class="entry-header-div">
			<header class="entry-header">
				<?php if ( ! post_password_required() && ! is_attachment() ) :
					the_post_thumbnail();
				endif; ?>

				<?php //if ( is_single() ) : ?>
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
				<?php //else : ?>
				<!-- <h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1> -->
				<?php //endif; // is_single() ?>
				<?php if ( comments_open() ) : ?>
					<div class="comments-link">
						<?php //comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
					</div><!-- .comments-link -->
				<?php endif; // comments_open() ?>
			</header><!-- .entry-header -->
		</div>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content" style="clear: both;">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<br />

		<footer class="entry-meta">
			<?php //twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->

<ul style="margin-bottom: 50px;">
              <li style="float:left;"><iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.d4db41a5a14a4516e6d4ecf6250c7419.ja.html#_=1414054330844&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=ja&amp;original_referer=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2F&amp;size=m&amp;text=%E3%80%90SELC%E3%83%90%E3%83%B3%E3%82%AF%E3%83%BC%E3%83%90%E3%83%BC%E6%A0%A1%E3%80%91%E3%80%8C%E5%B8%B0%E5%9B%BD%E5%BE%8C%E3%81%AE%E5%B0%B1%E8%81%B7%E3%80%8D%20%E3%81%AB%E6%B4%BB%E3%81%8D%E3%82%8B%E7%95%99%E5%AD%A6%E3%81%AE%E5%85%B7%E4%BD%93%E4%BE%8B&amp;url=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2F" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 90px; height: 20px;"></iframe>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
              <li style="float:left;">
<div class="fb-like fb_iframe_widget" data-width="150" data-layout="button_count" data-show-faces="false" data-send="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=238241179566629&amp;href=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=150"><span style="vertical-align: bottom; width: 102px; height: 20px;"><iframe name="f179cf19e" width="150px" height="1000px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?app_id=238241179566629&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F2_ZudbRXWRs.js%3Fversion%3D41%23cb%3Df2ec973c7c%26domain%3Dwww.jawhm.or.jp%26origin%3Dhttp%253A%252F%252Fwww.jawhm.or.jp%252Ff25c2aa0f8%26relation%3Dparent.parent&amp;href=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=150" style="border: none; visibility: visible; width: 102px; height: 20px;" class=""></iframe></span></div>
<!--
<div class="fb-like" data-href="http://www.jawhm.or.jp/blog/australia/selc/item/767" data-width="100" data-layout="button_count" data-show-faces="false" data-send="false"></div>
-->
</li>
<li style="float:left;"><div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 38px; height: 24px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="5" scrolling="no" style="position: static; top: 0px; width: 38px; margin: 0px 5px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I0_1414054330506" name="I0_1414054330506" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;annotation=none&amp;hl=ja&amp;origin=http%3A%2F%2Fwww.jawhm.or.jp&amp;url=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2F&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.DLHD_KHnzEo.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCP0jl0v_G73AKlamVx-jxzhp_zNxQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1414054330506&amp;parent=http%3A%2F%2Fwww.jawhm.or.jp&amp;pfname=&amp;rpctoken=12348549" data-gapiattached="true" title="+1"></iframe></div></li>
<li style="float:left;"><span><iframe id="mixi-check-iframe6705" src="http://plugins.mixi.jp/static/public/share_button.html?u=http%3A%2F%2Fwww.jawhm.or.jp%2Fblog%2Faustralia%2Fselc%2Fitem%2F767&amp;k=cfafbb1420faea1fadebf4b94984f1850f920c14&amp;b=button-1" frameborder="0" scrolling="no" allowtransparency="true" style="overflow: hidden; border: 0px; height: 20px; width: 60px; margin: 0 10px;"></iframe></span>

<script type="text/javascript" src="http://static.mixi.jp/js/share.js"></script>
            </li></ul>

<?php 
	global $post;
	$categories = get_the_category($post->ID);
	$posttags = get_the_tags(get_the_ID());
	$my_var = get_comments_number( $post->ID );
	if ($posttags) {
		foreach($posttags as $tag) {									
			$cat_link = get_category_link($categories[0]->term_id );
			$cat_name = $categories[0]->cat_name;
			$taggy[] = $tag->slug;
			$taggy_name[] = $tag->name;
		}
	} else {
		// foreach($posttags as $tag) {									
			$cat_link = get_category_link($categories[0]->term_id );
			$cat_name = $categories[0]->cat_name;
			$taggy[] = $tag->slug;
			$taggy_name[] = $tag->name;
		// }
	}
					
	echo 'カテゴリ ： <a href="'.$cat_link.'">'.$cat_name.'</a> コメント ： '. $my_var .'件';
	
	echo '<table class="a_tag"><tr><td class="tag1">タグ ： </td><td class="tag2">';
	
	$nummy = 0;
	foreach($taggy as $taggy2) {
		if($nummy > 0) {
			echo ', ';
		}
		echo '<a href="' . network_home_url() .'search/tag/?tag='. $taggy2 .'">';
		
		echo $taggy_name[$nummy];;
		
		echo '</a>';
		
		$nummy++;
	}
	echo '</td></tr></table>';
	//echo '<div class="a_tag">タグ ： <a href="' . get_home_url() .'/tag/'. $taggy .'">' .$taggy .'</a></div>';
					
?>
	</article><!-- #post -->