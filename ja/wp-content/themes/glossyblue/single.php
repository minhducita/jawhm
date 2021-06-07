<?php get_header();

@session_start();
if(isset($_POST['pc']))
	$_SESSION['pc'] = $_POST['pc'];

function is_mobile () 
{
	$useragents = array(
		'iPhone',         // Apple iPhone
		'iPod',           // Apple iPod touch
		'iPad',           // Apple iPad touch
		'Android',        // 1.5+ Android
		'dream',          // Pre 1.5 Android
		'CUPCAKE',        // 1.5+ Android
		'blackberry9500', // Storm
		'blackberry9530', // Storm
		'blackberry9520', // Storm v2
		'blackberry9550', // Storm v2
		'blackberry9800', // Torch
		'webOS',          // Palm Pre Experimental
		'incognito',      // Other iPhone browser
		'webmate'         // Other iPhone browser
	);
	
	$pattern = '/'.implode('|', $useragents).'/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}


?>

	<div id="content">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<div class="post">
			<div class="post-date"><span class="post-month"><?php the_time('M') ?></span> <span class="post-day"><?php the_time('j') ?></span></div>
			<div class="post-title">
				<h2><?php the_title(); ?></h2>
				<span class="post-cat"><?php the_category(', ') ?></span> 
			</div>
			<div class="entry">

				<?php the_content('Read the rest of this entry &raquo;'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>

<?php
if(is_mobile() && $_SESSION['pc'] !='on')	{
?>
<div id="fb-root"></div>
<script type="text/javascript">
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id; js.async = true;
js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&amp;appId=158074594262625";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php	}	?>
                <div id="social_tool" style="margin:20px 0 15px 0;">
                    <table><tr>
                    <td style="vertical-align:top;">
                        <div class="fb-like" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="arial"></div>
                    </td>
                    <td style="vertical-align:top;">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="jawhm">Tweet</a>
						<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
                    </td>
                    <td style="vertical-align:top;">
                        <!--<g:plusone></g:plusone>-->
						<div class="g-plusone"></div>
						<script type="text/javascript">
                          window.___gcfg = {lang: 'ja'};
                        
                          (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                          })();
                        </script>                    
                    </td>
                    </tr></table>
                </div>
			
			<?php //comments_template(); ?>
			
		</div>

		<?php endwhile; ?>

		<div class="navigation"> 
			<span class="previous-entries"><?php previous_post_link('%link','%title',FALSE,'8') // avoid display post from cat 8 (golden book)?></span>
			<span class="next-entries"><?php next_post_link('%link','%title',FALSE,'8') // avoid display post from cat 8 (golden book) ?></span> 
		</div>

	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</div>
	<!--/content -->

<?php get_sidebar(); ?>

	<div id="wp-footer">
		<div class="left-col">
			<h4>最近のお知らせ</h4>

			<?php query_posts('showposts=5&category__not_in=8');  // not displaying the golden book's posts cat id-> 8?>
			<ul class="recent-posts">
			<?php while (have_posts()) : the_post(); ?>
				<li>
					<strong><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></strong><br />
					<small><?php the_time('Y-m-d') ?></small>
				</li>
			<?php endwhile;?>
			</ul>

		</div>
		<hr class="clear" />
	</div>
	<!--/footer -->
<div id="credits"><a href="<?php bloginfo('rss2_url'); ?>" class="rss">JAWHM RSS</a></div>

<?php get_footer(); ?>