<?php
/**
* The template for displaying Search Results pages
*
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/

function assignPageTitle(){
	return "検索結果 | 日本ワーキング・ホリデー協会";
}
add_filter('wp_title', 'assignPageTitle');

get_header();

/* exclude from search */
include(locate_template('search-exclude-list.php'));
/* ------------------- */

$site_name = site_name();

$search_key = $_GET['s'];
$search_range = $_GET['r']; //g = global, e = english blog, j = japan blog
$search_category = $_GET['pc']; //only for 'e' and 'j'

$entry_per_page = 20; //-1 means all posts

$tag_posts = array();

//$color = array('orange', 'red', 'green', 'purple', 'blue', '#0363B3', '#F67294', '#00B38C', '#FFBB39', '#37BAFF');
?>

<section id="primary" class="site-content" style="width: 65.104166667%;">
	<div id="content" role="main">

		<header class="archive-header">
			<h1 class="archive-title">
				<span>
					<?php
						if (!$_GET['s']) {
							
						} else {
							$a_title .= $_GET['s'] . "の";
						}
						$a_title .= "検索結果一覧";
						echo $a_title;
					?>
				</span>
			</h1>
		</header>
			
		<ul>
		<?php
			global $wp_query;//, $paged;

			if ($search_range == 'g') { // Global Search
				//switch_to_blog(16);
				
				$args = array( 
					'category_name' => '',
					'author__not_in' => $author_list,
					's' => $search_key,
					'posts_per_page' => $entry_per_page,
				);
			}
			if ($search_range == 'e') { // English Blog Search
				$args = array( 
					'cat' => $search_category,
					'author__not_in' => $author_list,
					's' => $search_key,
					'posts_per_page' => $entry_per_page,
				);
			}
			if ($search_range == 'j') { // Japan Blog Search
				$args = array( 
					's' => $search_key,
					'author__not_in' => $author_list,
					'posts_per_page' => $entry_per_page,
				);
			}
			$args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var ( 'paged' ) : 1 ;
			
			//query_posts($args);
			$wp_query_2 = new WP_Query( $args );
			
			$temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $wp_query_2;
			
			//if ( have_posts() ) {
			if ( $wp_query_2->have_posts() ) {
				//while ( have_posts() ) : the_post();
				while ( $wp_query_2->have_posts() ) {
					$wp_query_2->the_post();
					//get_template_part( 'content', get_post_format() );
?>

<?php
	$org_blog_id = get_post_meta ($post->ID, 'blogid', true);
	if($org_blog_id) {
		$blog_details = get_blog_details($org_blog_id);
		$blog_name = $blog_details->blogname;
		$blog_slug = $blog_details->siteurl;
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
			//$taggy[] = $tag->slug;
			$taggy[] = $tag->name;
			$taggy_name[] = $tag->name;
		}
	}
	
	$get_permalink = get_permalink();

	$get_the_title = get_the_title();
	$category_name = "";
	
	if ($search_range == 'g') {
		$eng = array('Australia', 'Canada', 'Europe', 'Newzealand', 'World', );
		$piece = explode('/', $get_permalink);
		
		$blog_name_eng = ucfirst($piece[4]);
		
		//$postid_test = get_the_ID();
		$p_id = $piece[6];
		
		foreach($eng as $eng1) {
			if($blog_name_eng == $eng1) {
				$blog_name = $piece[5];
				$p_id = $piece[7];
				break;
			}
		}
		
		/* get proper categories */
		$current_blog = $blog_id;
		switch_to_blog($org_blog_id);
	
		$setting = custom_site_settings($blog_id);
		$colorz = $setting[0];
		
		if ($org_blog_id <= 6) {
			$category_detail = get_the_category($p_id);
		
			foreach ($category_detail as $cd) {
				$ancestors = get_ancestors( $cd->term_id, 'category' );
				$p_id = $ancestors[0];
				$c_name = get_cat_name($p_id);
				$yourcat = get_category ($p_id);
				
				$blog_name = triangle_name($blog_id, $p_id);
				
				if ($blog_name == '' or $blog_name == 'slug') {
					$blog_name = $yourcat->slug;
				}
				if ($blog_name == 'name') {
					$blog_name = $c_name;
				}
				
				//$catty = $yourcat->slug;
			}
		} else {
			$blog_name = triangle_name($blog_id, 0);
			if ($blog_name == '') {
				$blog_name = get_bloginfo('name');
			}

			//$catty = get_bloginfo('name');
		}
		
		$img_link = catch_that_image($site_name, $blog_id, $p_id);
		
		/* normal method */
		/* $post_thumbnail =  '<img src="';
		$post_thumbnail .=  $img_link;
		$post_thumbnail .=  '" alt="" style="width:100%;" />'; */
		/* ------------- */
			
		/* formula method */
		$img_thumb_css = image_thumbnail($img_link, '100', '187', 'px');
		
		$post_thumbnail = '<img src="';
		$post_thumbnail .= $img_link;
		$post_thumbnail .= '" ' . $img_thumb_css;
		//$post_thumbnail .= '" ';
		$post_thumbnail .= '/>';
		/* -------------- */
		
		switch_to_blog($current_blog);
		/* --------------------- */
	} else {
		$setting = custom_site_settings($blog_id);
		$colorz = $setting[0];
		
		if ($blog_id <= 6) { // English Blog
			$category_detail = get_the_category($post->ID);
			
			foreach ($category_detail as $cd) {
				$ancestors = get_ancestors( $cd->term_id, 'category' );
				$p_id = $ancestors[0];
				$c_name = get_cat_name($p_id);
				$yourcat = get_category ($p_id);
				
				$blog_name = triangle_name($blog_id, $p_id);
				
				if ($blog_name == '' or $blog_name == 'slug') {
					$blog_name = $yourcat->slug;
				}
				if ($blog_name == 'name') {
					$blog_name = $c_name;
				}
			}
		} else { // Japan Blog
			$blog_name = triangle_name($blog_id, 0);
			if ($blog_name == '') {
				$blog_name = get_bloginfo('name');
			}
		}
		
		//$blog_name .= 'test';
		
		$img_link = catch_that_image($site_name, $blog_id, $p_id);
		
		/* normal method */
		/* $post_thumbnail =  '<img src="';
		$post_thumbnail .=  $img_link;
		$post_thumbnail .=  '" alt="" style="width:100%;" />'; */
		/* ------------- */
			
		/* formula method */
		$img_thumb_css = image_thumbnail($img_link, '100', '187', 'px');
		
		$post_thumbnail = '<img src="';
		$post_thumbnail .= $img_link;
		$post_thumbnail .= '" ' . $img_thumb_css;
		//$post_thumbnail .= '" ';
		$post_thumbnail .= '/>';
		/* -------------- */
	}
	
	$count = strlen($blog_name);
	
	if ($count <= 7 ){
		$css_ = "font-size: 17px; top: 37px; color: " . $setting[1];
	}
	if ($count >= 8 ){
		$css_ = "font-size: 12px; top: 40px; left: -40px; color: " . $setting[1];
	}
	
	//$category_name = "<p style='" . $css_  . "'>" . $blog_name . ' - ' . $catty . "</p>";
	$category_name = "<p style='" . $css_  . "'>" . $blog_name . "</p>";
	
	$css_ = "";
	
	$d_date = get_the_date('Y-m-d');
	
	$content_post = mb_substr(get_the_excerpt(), 0, 200); 
?>

<li class="search">
	<?php include(locate_template('content-search.php')); ?>
</li>
					
				<?php
				//endwhile;
				}
			} else {
				get_template_part( 'content', 'none' );
			}
		?>

		</ul>
			
		<div class="navi" style="clear: both; margin-top: 20px;">
			
			<?php
				
				wp_reset_postdata();
				
				//restore_current_blog();
				
				numeric_pagination('前', '次');
				
				$wp_query = NULL;
				$wp_query = $temp_query;
				
			?>
		</div>
	</div><!-- #content -->
</section><!-- #primary -->

<?php
	if ($search_range == 'g') { // Global Search
		//get_sidebar();
		include(locate_template('maintop_tag_sidebar_template.php'));
	}
	if ($search_range == 'e') { // English Blog Search
		get_sidebar();
	}
	if ($search_range == 'j') { // Japan Blog Search
		include(locate_template('sidebarJP.php'));
	}
	if ($search_range == 'kot') { // kotanglish Blog Search
		include(locate_template('sidebarJP.php'));
	}
?>
<?php
	get_footer();
?>