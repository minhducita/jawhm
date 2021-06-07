<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
$search_range = $_GET['r'];
$category = $_GET['pc']; // only applies if range is not global

if ($search_range != 'g') {
	$form_action = get_site_url();
} else {
	$form_action = network_home_url();
}
?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'キーワードに該当する投稿が見つかりません。', 'twentytwelve' ); ?></h1>
		</header>

		<div class="entry-content">
			<!-- <p><?//php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p> -->
			<?php //get_search_form(); ?>

		<!--	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo $form_action; ?>">
				<div>
					<input type="text" value="" name="s" id="s">
					<?php if ($search_range != 'g') { ?>
						<input type="hidden" name="r" value="e" />
						<input type="hidden" name="pc" value="<?php echo $category; ?>" />
					<?php } else { ?>
						<input type="hidden" name="r" value="g" />
					<?php } ?>
					<input type="submit" id="searchsubmit" value="Search">
				</div>
			</form>-->
	
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
