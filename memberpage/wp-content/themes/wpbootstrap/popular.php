<?php
/**
 * Template Name: Popular
 */

function assignPageTitle(){
	return "人気記事 | 日本ワーキング・ホリデー協会";
}
add_filter('wp_title', 'assignPageTitle');

get_header();
//include(locate_template('header_2.php'));

$search_key = $_GET['ps'];

$site_name = site_name();

include(locate_template('../twentytwelve/favorite-list.php'));

$fav_posts = array();

$fav_blog_id = array();
$fav_post_id = array();

foreach ($favorite_list as $k => $v) {
	if ($k % 2 == 0) {
		$fav_blog_id[] = ((int) $v);
	}
	else {
		$fav_post_id[] = $v;
	}
}

$fav_blog_id = array_filter($fav_blog_id);
$fav_post_id = array_filter($fav_post_id);

$post_check = 0;
$counter = 0;

?>

<div class="container">

<div class="hero-unit tag_head">
	人気記事一覧
</div>

<div class="hero-unit blog_posts">
	<?php
		
		foreach ( $fav_blog_id as $b_id ) {
			//$blog_id = $b_id;
			switch_to_blog($b_id);
			global $blog_id, $post;
			$blog_name = get_bloginfo('name');
			
			$args = array(
				'post_type'   => 'post',
				'orderby' => 'date',
				'post__in' => array($fav_post_id[$counter]),
				'posts_per_page' => -1,
			);
			
			//$the_query = get_posts( $args );
			query_posts($args);
			
			while ( have_posts() ) : the_post(); ?>
				<div class="japan_newentry">
					<?php include(locate_template('content-japanblog.php')); ?>
				</div>
			<?php endwhile;
			
			wp_reset_query();
			
			$counter++;
		}
		
		restore_current_blog();
	
	?>
</div>

<?php include(locate_template('orange_navigation.php')); ?>

<?php
	get_footer();
?>