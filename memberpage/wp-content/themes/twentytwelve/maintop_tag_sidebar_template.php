<?php
/**
 * Template Name: Main Top Tag's Sidebar Template
 *
 * The template for displaying Tags page's sidebar
 *
 * by Joseph B.
 */

?>

<div id="secondary" class="widget-area" role="complementary">

	<?php
		echo '<div class="widget widget_search">'; ?>
			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>/">
				<div>
					<input type="text" value="" name="s" id="s">
					<input type="hidden" name="r" value="g" />
					<input type="submit" id="searchsubmit" value="Search">
				</div>
			</form>
		<?php echo '</div>';

		echo '<br /><br />';

		echo '<div class="widget tag_cloud">';

			include(locate_template('Tag Cloud (Global Post).php'));

		echo '</div>';
	?>
			
	<?php include(locate_template('ads.php')); ?>
</div>