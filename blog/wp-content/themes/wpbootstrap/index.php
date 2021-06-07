<?php 
	get_header(); 
	include(locate_template('header_2.php'));

	$site_name = site_name();
?>
	
<div class="hero-unit blog_posts">
	<?php
		$args = array(
			'posts_per_page' => 10,
		);
		
		$args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var ( 'paged' ) : 1 ;
		
		$wp_query_2 = new WP_Query( $args );
		
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $wp_query_2;
	?>
	<?php if ( $wp_query_2->have_posts() ) { //if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php
			while ( $wp_query_2->have_posts() ) { $wp_query_2->the_post();
			//while ( have_posts() ) : the_post();
		?>
			<div class="japan_newentry">
				<?php include(locate_template('content-japanblog.php')); ?>
			</div>
		<?php } //endwhile; ?>
		
		<div class="pagination">
			<?php
				numeric_pagination('前の記事', '次の記事');
				//twentytwelve_content_nav( 'nav-below' );
			?>
		</div>

	<?php 
		} //endif; // end have_posts() check
		
		wp_reset_postdata();
		
		$wp_query = NULL;
		$wp_query = $temp_query;
	?>
</div>
	

<?php

	//$linky = explode('/', $_SERVER['REQUEST_URI']);
	//$check = $linky[2];
		
	if (is_category()) {
		$cat = get_cat_id( single_cat_title("",false) );
		$a_test = 'is_category';
	}
	if (is_single()) {
		$category = get_the_category();
		$cat = $category[0]->term_id;
		$a_test = 'is_single';
	}
	if (is_search()) {
		$cat = $_GET['pc'];
	}
	
	//$a_link = network_home_url() . $check . '/';
	$a_link = get_bloginfo('url');
	
?>

<?php
	include(locate_template('jp-footer.php'));
	get_footer();
?>