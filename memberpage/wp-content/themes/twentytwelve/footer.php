<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
</div><!-- #page -->
<?php
	global $blog_id;
	include(locate_template('skin_setting.php'));
	//$fc = custom_site_settings(1); // default
	//$fc = custom_site_settings($blog_id);
?>
<div id="f-bg" style="background-color: <?php echo $footer_color; ?>;">
<?php
	//$b_id = footer_color();
	//$footer_color = custom_site_settings($b_id);
	//echo $b_id . ' - ' . $footer_color[0];
?>
	<?php include '../include/footer_pc.php'; ?>
</div> <!-- #f-bg -->

<?php wp_footer(); ?>
</body>
</html>