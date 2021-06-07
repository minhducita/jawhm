<?php
/**
 * Template Name: sub_main
 */
	$a_link = get_bloginfo('url');

	get_header();
	
	$category = get_the_category();
	$current_category = $category[0];
	$parent_category = $current_category->category_parent;
	
	if ( $parent_category != 0 ) {
		$p_id = $parent_category;
	} else {
		$p_id = $category[0];
	}
?>

<div class="eng_banner s_logo <?php $siteTitle = get_bloginfo('name'); echo str_replace(" ", "", $siteTitle); ?>_head">
	<?php 
		$site_name = site_name();
		echo site_header_img($site_name, $blog_id, $p_id); 
		//echo '<br />' . $blog_id . ' - ' . $p_id; 
		//if (is_null($p_id)) {
			//echo '<br />test';
		//}
	?>
</div>

<div class="container">

<div class="hero-unit">
<div class="sub_entry_note">
	<div class="<?php 
		$siteTitle = get_bloginfo('name'); 
		echo str_replace(" ", "", $siteTitle);
	?>_view"></div>
	<?php include(locate_template('../twentytwelve/sub_main_info.php')); ?>
</div>
</div>

<div>
	<?php get_template_part( 'sub_newentry' ); ?>
</div>
	
	

	

<!-- footer -->

<?php include(locate_template('orange_navigation.php')); ?>

<div class="row">

	
		<div class="list-header" href="#collapse3" >
			<p class="orange-p">
				<img style="width:10px !important; margin-top:-2px;" src="wp-content/uploads/2014/11/search-accordion2.png">
				<span style="margin-top:1px; font-size:1em;">School List</span>
			</p>
		</div>



	<div class="rowww" id="collapse3" style="border:1px solid #ccc; display:none;">

		<?php get_template_part( 'sub_school_list' ); ?> 
</div>
	</div>
<?php get_footer(); ?>