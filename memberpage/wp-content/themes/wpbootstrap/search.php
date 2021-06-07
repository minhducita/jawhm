<?php
/**
 * Template Name: search
 */

get_header(); 
//include(locate_template('header_2.php'));

$site_name = site_name();

$search_key = $_GET['s'];
$search_range = $_GET['r'];
$search_category = $_GET['pc'];

?>

<div class="container">

	<div class="hero-unit tag_head">
		<?php
			if (!$_GET['s']) {
				
			} else {
				$a_title .= $_GET['s'] . "の";
			}
			$a_title .= "検索結果一覧";
			echo $a_title;
		?>
	</div>
	
	<div class="hero-unit blog_posts">
		<?php
			global $wp_query;
			
			$args = array( 
				'orderby' => 'date',
				'cat' => $search_category,
				'author__not_in' => $author_list,
				's' => $search_key,
				'posts_per_page' => 10,
			);
			
			$args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var ( 'paged' ) : 1 ;
			
			$wp_query_2 = new WP_Query( $args );
			
			$temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $wp_query_2;
			
			if ( $wp_query_2->have_posts() ) {
				while ( $wp_query_2->have_posts() ) {
					$wp_query_2->the_post();
					
					echo '<div class="japan_newentry">';
						include(locate_template('content-japanblog.php'));
					echo '</div>';
				}
				
				echo '<div class="pagination">';
					numeric_pagination('次の記事', '前の記事');
				echo '</div>';
				
				wp_reset_postdata();
				
				$wp_query = NULL;
				$wp_query = $temp_query;
			} else {
				echo '<div class="search_not_found">';
					echo 'キーワードに該当する投稿が見つかりません。';
				echo '</div>';
			}
		?>
	</div>

<?php 
	if ($blog_id > 6) { // Japanese Blogs
		include(locate_template('jp-footer.php'));
	} else { // English Blogs
		include(locate_template('eng-footer.php'));
	}
	
	get_footer();
?>