<?php
/**
 * Template Name: Popular
 */

function assignPageTitle(){
	return "人気記事 | 日本ワーキング・ホリデー協会";
}
add_filter('wp_title', 'assignPageTitle');

get_header();

$search_key = $_GET['ps'];

$site_name = site_name();
include(locate_template('favorite-list.php'));

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

$post_check = 0;

//$fav_blog_id = array_unique($fav_blog_id);
//$fav_post_id = array_unique($fav_post_id);
$fav_blog_id = array_filter($fav_blog_id);
$fav_post_id = array_filter($fav_post_id);

$eng = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
$jap = array('（日）', '（月）', '（火）', '（水）', '（木）', '（金）', '（土）');

$counter = 0;

?>

<?php 
	if ( is_search() ) {
		//echo 'test';
	}
?>
	
<?php
	
	foreach ( $fav_blog_id as $b_id ) {
		switch_to_blog($b_id);
		//echo $b_id . ' - ' . $fav_post_id[$counter] . '<br/>';
		global $post;
		$blog_name = get_bloginfo('name');

		$setting = custom_site_settings($b_id);
		
		$args = array(
			'post_type'   => 'post',
			'orderby' => 'date',
			'post__in' => array($fav_post_id[$counter]),
			's' => $search_key,
			'posts_per_page' => -1,
		);
		
		//$the_query = get_posts( $args );
		query_posts($args);
		
		while ( have_posts() ) : the_post();
			//get_template_part( 'content', get_post_format() );
			
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
					$taggy[] = tag_link($tag->name);
					$taggy_name[] = $tag->name;
				}
			}
			
			$get_permalink = get_permalink();
			
			$get_the_title = get_the_title();
			
			if ($b_id <= 6) { // English blog
				$category_name = "";
				$category_detail = get_the_category($post_id);
			
				foreach($category_detail as $cd){
					$ancestors = get_ancestors( $cd->term_id, 'category' );
					$p_id = $ancestors[0];
					$c_name = get_cat_name($p_id);
					$yourcat = get_category ($p_id);
			
					$blog_name = triangle_name($b_id, $p_id);
			
					if ($blog_name == '' or $blog_name == 'slug') {
						$blog_name = $yourcat->slug;
					}
					if ($blog_name == 'name') {
						$blog_name = $c_name;
					}
				}
			} else { // Japanese blog
				$blog_name = triangle_name($b_id, 0);
				if ($blog_name == '') {
					$blog_name = get_bloginfo('name');
				}
			}
			
			$count = strlen($blog_name);
			
			if ($count <= 7 ){
				$css_ = "font-size: 17px; top: 37px; color: " . $setting[1];
			}
			if ($count >= 8){
				$css_ = "font-size: 12px; top: 40px; left: -40px; color: " . $setting[1];
			}
			$category_name = "<p style='" . $css_  . "'>" . $blog_name . "</p>";
			
			//$content_post = strip_tags($post->post_content);
			//$content_post = mb_substr($content_post, 0, 250);
			$content_post = mb_substr(get_the_excerpt(), 0, 250);
			
			$img_link = catch_that_image($site_name, $b_id, $p_id);
			
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
			
			$css_ = "";
			
			$tagz = '';
			$nummy = 0;
			foreach($taggy as $taggy2) {
				if($nummy > 0) {
					$tagz .= ', ';
				}
				$tagz .= '<a href="' . network_home_url() .'search/tag/?tag='. $taggy2 .'">';
				
				$tagz .= $taggy_name[$nummy];
				
				$tagz .= '</a>';
				
				$nummy++;
			}
			
			//$postid = get_current_blog_id();
			
			$fav_posts[$counter]['get_permalink'] = $get_permalink;
			$fav_posts[$counter]['get_the_title'] = $get_the_title;
			$fav_posts[$counter]['category_name'] = $category_name;
			$fav_posts[$counter]['post_thumbnail'] = $post_thumbnail;
			$fav_posts[$counter]['img_link'] = $img_link;
			$fav_posts[$counter]['content_post'] = $content_post;
			$fav_posts[$counter]['pdate'] = get_the_date('Y-m-d');
			$fav_posts[$counter]['color'] = $setting[0];
			$fav_posts[$counter]['tagz'] = $tagz;
			$fav_posts[$counter]['nummy'] = $nummy;
			
			$post_check++;
			
		endwhile;
		
		wp_reset_query();
		
		$counter++;
	}
	
	//restore_current_blog();
	
	//usort($fav_posts, make_comparer('pdate', SORT_ASC, 'date_create'));

?>

<section id="primary" class="site-content" style="width: 65.104166667%;">
	<div id="content" role="main">

			<header class="archive-header">
				<h1 class="archive-title">
					<span>人気記事一覧</span>
				</h1>
			</header>
			
		<?php
			echo '<ul>';
			if ($post_check != 0) {
				foreach($fav_posts as $post_data){
					include(locate_template('content-simple.php'));
				} // foreach $tag_posts as $post_data
			} else {
				get_template_part( 'content', 'none' );
			}
			echo '</ul>';
		?>
	</div><!-- #content -->
</section><!-- #primary -->
	
<?php // Sidebar
	echo '<div id="secondary" class="widget-area" role="complementary">';
	
	//echo '<h3 class="widget-title">Search</h3>';
	echo '<div class="widget widget_search">'; ?>
	
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo network_home_url(); ?>popular/">
		
		<div>
			<input type="text" value="" name="ps" id="s">
			<input type="submit" id="searchsubmit" value="Search">
		</div>
	
	</form>
	
<?php 
	echo '</div>';
?>

<div class="boxMail">

</div>

<?php include(locate_template('ads.php')); ?>

</div><!-- #secondary -->

<?php
	get_footer();
?>