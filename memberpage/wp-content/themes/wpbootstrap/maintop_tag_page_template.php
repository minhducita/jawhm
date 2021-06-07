<?php
/**
 * Template Name: Main Top Tag
 *
 * The template for displaying Tags page
 *
 * by Joseph B.
 */

get_header(); 
//include(locate_template('header_2.php'));
 
$site_name = site_name();
$post_per_page = 10;

function assignPageTitle(){
	if(!$_GET){
		return "タグ の記事一覧 | Working Holiday";
	} else {
		return $_GET['tag'] . " | Working Holiday";
	}
}
add_filter('wp_title', 'assignPageTitle');

$tag = $_GET['tag'];

include(locate_template('../twentytwelve/search-exclude-list.php'));

?>

<div class="container">

<div class="hero-unit tag_head">
	<?php if($_GET){
			echo $_GET['tag'] . ' ';
		} else {
			echo 'タグ ';
		}

		echo '<span id="tag_head">の記事一覧</span>';
	?>
</div>

<div class="hero-unit blog_posts">
	<?php
		$tag_posts = array();
		
		$counter = 0;
		$counter2 = 0;
		
		$args = array (
			'orderby' => 'date',
			'tag' => $_GET['tag'],
			'author__not_in' => $author_list,
			'posts_per_page' => $post_per_page,
		);
		
		$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		
		$arrgs = new WP_query($args);
		
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $arrgs;
		
		while ( $arrgs->have_posts() ) : $arrgs->the_post();
			include(locate_template('content-tag_page_n_search.php'));
		endwhile;
			
		wp_reset_postdata();
		
	?>

	<div class="pagination">
		<?php
			numeric_pagination('次', '前'); 
			$wp_query = NULL;
			$wp_query = $temp_query;
		?>
	</div>
</div>




<?php include(locate_template('orange_navigation.php')); ?>







<?php get_footer(); ?>