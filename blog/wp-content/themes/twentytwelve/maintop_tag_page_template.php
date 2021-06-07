<?php
/**
 * Template Name: Main Top Tag
 *
 * The template for displaying Tags page
 *
 * by Joseph B.
 */
 
$site_name = site_name();
$post_per_page = 20; // -1 = all post

function assignPageTitle(){
	if(!$_GET){
		return "タグ の記事一覧 | 日本ワーキング・ホリデー協会";
	} else {
		return $_GET['tag'] . " | 日本ワーキング・ホリデー協会";
	}
}
add_filter('wp_title', 'assignPageTitle');

$tag = $_GET['tag'];

get_header(); 

include(locate_template('search-exclude-list.php'));

?>

<section id="primary" class="site-content" style="width: 65.104166667%;">
		<div id="content" role="main">

			<header class="archive-header">
				<h1 class="archive-title">
					<span>
						<?php if($_GET){
								echo $_GET['tag'] . ' ';
							} else {
								echo 'タグ ';
							}

							echo 'の記事一覧';
						?>
					</span>
				</h1>
			</header>
		<ul>

<?php
	$tag_posts = array();
	
	$counter = 0;
	$counter2 = 0;
	
	$args = array(
		'orderby' => 'date',
		'tag' => $_GET['tag'],
		'author__not_in' => $author_list,
		'posts_per_page' => $post_per_page,
		'meta_query' => array(
		array(
			'key' => 'blogid',
			'value' => '25',
			'compare' => '!='
		),)
	);
	
	$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	
	$arrgs = new WP_Query( $args );
	
	$temp_query = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $arrgs;
	
	while ( $arrgs->have_posts() ) : $arrgs->the_post();
		
		$org_blog_id = get_post_meta ($post->ID, 'blogid', true);
		if($org_blog_id) {
			$blog_details = get_blog_details($org_blog_id);
			$blog_name = $blog_details->blogname;
			$blog_slug = $blog_details->siteurl;
			$category_test = get_the_category($post->ID);
			$firstCategory = $category_test[0]->cat_name;
		}
		
		
		unset($taggy);
		unset($taggy2);
		unset($taggy_name);
		$taggy = array();
		$taggy2 = array();
		$taggy_name = array();
	
		$posttags = get_the_tags(get_the_ID());
		if ($posttags) {
			foreach($posttags as $tag) {						
				$taggy[] = $tag->slug;
				$taggy_name[] = $tag->name;
			}
		}
		
		$get_permalink = get_permalink();

		$get_the_title = get_the_title();
		$category_name = "";
	
		$setting = custom_site_settings($org_blog_id);
		$colorz = $setting[0];
		
		$eng = array('Australia', 'Canada', 'Europe', 'Newzealand', 'World',);
		$piece = explode('/', $get_permalink);
		
		$blog_name_eng = ucfirst($piece[4]);
		
		foreach($eng as $eng1) {
			if($blog_name_eng == $eng1) {
				$blog_name = $piece[5];
				break;
			}
		}
		
		/* get proper categories */
		$current_blog = $blog_id;
		switch_to_blog($org_blog_id);
		
		//$pop = get_the_ID();
		
		if ($org_blog_id <= 6) {
			$pop = $piece[ count($piece) - 2];
			
			//$category_detail = get_the_category($p_id);
			$category_detail = get_the_category($pop);
		
			foreach ($category_detail as $cd) {
				$ancestors = get_ancestors( $cd->term_id, 'category' );
				$p_id = $ancestors[0];
				$c_name = get_cat_name($p_id);
				$yourcat = get_category ($p_id);
				
				$blog_name = triangle_name($org_blog_id, $p_id);
				
				if ($blog_name == '' or $blog_name == 'slug') {
					$blog_name = $yourcat->slug;
				}
				if ($blog_name == 'name') {
					$blog_name = $c_name;
				}
			}
		} else {
			$blog_name = triangle_name($org_blog_id, 0);
			if ($blog_name == '') {
				$blog_name = get_bloginfo('name');
			}
		}
		
		$img_link = catch_that_image($site_name, $org_blog_id, $p_id);
		
		/* normal method */
		/* $post_thumbnail =  '<img src="';
		$post_thumbnail .=  $img_link;
		$post_thumbnail .=  '" alt="" />'; */
		/* ------------- */
			
		/* formula method */
		$img_thumb_css = image_thumbnail($img_link, '100', '187', 'px');
		
		$post_thumbnail = '<img src="';
		$post_thumbnail .= $img_link;
		$post_thumbnail .= '" ' . $img_thumb_css;
		//$post_thumbnail .= '" ';
		$post_thumbnail .= '/>';
		/* -------------- */
		
		$count = strlen($blog_name);
		
		if ($count <= 7 ){
			$css_ = "font-size: 17px; top: 37px; color: " . $setting[1];
		}
		if ($count >= 8){
			$css_ = "font-size: 12px; top: 40px; left: -40px; color: " . $setting[1];
		}
		$category_name = "<p style='" . $css_  . "'>" . $blog_name . "</p>";
		
		$css_ = "";
		
		$d_date = get_the_date('Y-m-d');
		
		$content_post = mb_substr(get_the_excerpt(), 0, 150); 
		
		switch_to_blog($current_blog);
		/* --------------------- */
		
?>

<li class="tag_page">
	<?php //echo $firstCategory . ' - ' . $parentcat_name; ?>
	<?php include(locate_template('content-search.php')); ?>
</li>

<?php
	endwhile;
	
	wp_reset_postdata();
	
	echo '<div class="navi" style="clear: both; margin-top: 20px;">';
		numeric_pagination('前', '次');
	echo '</div>';

	$wp_query = NULL;
	$wp_query = $temp_query;
?>
		</ul>
	</div><!-- #content -->
</section><!-- #primary -->

<?php include(locate_template('maintop_tag_sidebar_template.php')); // get_template_part('maintop_tag_sidebar_template'); // get_sidebar(); ?>
<?php get_footer(); ?>