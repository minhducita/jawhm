<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
	$linky = explode('/', $_SERVER['REQUEST_URI']);
	$check = $linky[2];
	
	/*
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
	} */
	
	$cat = get_cat_id( single_cat_title("",false) );
	
	$a_link = network_home_url() . $check . '/';

?>

	<?php //if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">

<?php
	echo '<aside id="recent-posts-2" class="widget widget_recent_entries">';
	
	echo '<h3 class="widget-title">Recent Posts</h3>';
	
	echo '<ul>';
	
	$parent_category = $cat;
	
	$parent_posts = get_posts('numberposts=5&category='.$parent_category);
	$xx = 0;
	foreach($parent_posts as $post) : ?>
		<?php
			$the_date = get_the_date('Y');
			$the_date .= '年';
			$the_date .= get_the_date('m');
			$the_date .= '月';
			$the_date .= get_the_date('d');
			$the_date .= '日';
		?>
		
		<li>
			<span style="font-size: 9px; padding-left: 3px;"><?php echo $the_date; ?></span>
			<br /><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li><br />
	<?php 
	$xx++;
	endforeach;
	
	echo '</ul>';

	echo '</aside>';
?>

<?php
	echo '<aside id="archives-2" class="widget widget_archive">';
	
	echo '<h3 class="widget-title">Archives</h3>';
	
	echo '<ul>';
	
	/* test area */
	
	$list_temp = 'temp';
	$parent_posts = get_posts('posts_per_page=-1&category='.$cat);
	$x = 0;
	
	foreach($parent_posts as $post) :
	
		$date = get_the_date( 'Y' );
		$date .= "年";
		$date .= get_the_date( 'm' );
		$date .= "月";
		
		if ($list_temp != $date) {
			
			if ($x == 0) {
			
				echo '<li>';
				//echo '<a href="' . $a_link . 'archive?month=' . get_the_date( 'm' ) . '&yr=' . get_the_date( 'Y' ) . '&cat=' . $cat . '">';
				echo '<a href="' . $a_link . 'archive?month=' . get_the_date( 'm' ) . '&yr=' . get_the_date( 'Y' ) . '">';
				echo $date;
				
				$list_temp = $date;
				$x++;
				
			} else {
			
				echo ' (' . $x . ')';
				
				echo '</a>';
				
				echo '</li>';
				$x = 0;
				
				if ($x != sizeof($post)) {
				
					echo '<li>';
					//echo '<a href="' . $a_link . 'archive?month=' . get_the_date( 'm' ) . '&yr=' . get_the_date( 'Y' ) . '&cat=' . $cat . '">';
					echo '<a href="' . $a_link . 'archive?month=' . get_the_date( 'm' ) . '&yr=' . get_the_date( 'Y' ) . '">';
					echo $date;
					
					$list_temp = $date;
					$x++;
					
				}
				
			}
		} else {
			$x++;
		}
	
	endforeach;
	
	echo ' (' . $x . ')';
	
	echo '</a>';
	echo '</li>';
	
	/* end of test area */
	
	echo '</ul>';

	echo '</aside>';
?>

<?php
	//dynamic_sidebar( 'sidebar-1' );
?>

<?php
	wp_list_categories ( );
?>

<?php
	echo '<h3 class="widget-title">Search</h3>';
	echo '<div class="widget widget_search">';
		//get_search_form();
?>	
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>/">
		<div>
			<input type="text" value="" name="s" id="s">
			<input type="hidden" name="r" value="j" />
			<input type="hidden" name="pc" value="<?php echo $cat; ?>" />
			<input type="submit" id="searchsubmit" value="Search">
		</div>
	</form>
<?php
	echo '</div>';
?>	
		
<div class="boxMail">
<p class="top" style="font-size: 18px;">
ワーホリ＆留学に関する<br>
ご相談・ご質問はこちらから
</p>


		<?php 
		//$siteTitle = get_bloginfo('name'); 
	
		//switch ($siteTitle) {
		switch ($blog_id) {
		  case "2":
			echo do_shortcode('[contact-form-7 id="44" title="Send Mail"]');
			break;
		  case "3":
			echo do_shortcode('[contact-form-7 id="32" title="Send Mail"]');
			break;
		  case "4":
			echo do_shortcode('[contact-form-7 id="6" title="Send Mail"]');
			break;
		  case "5":
			echo do_shortcode('[contact-form-7 id="7" title="Send Mail"]');
			break;
		  case "6":
			echo do_shortcode('[contact-form-7 id="6" title="Send Mail"]');
			break;
		  case "7":
			echo do_shortcode('[contact-form-7 id="12" title="Send Mail"]');
			break;
		  case "8":
			echo do_shortcode('[contact-form-7 id="9" title="Send Mail"]');
			break;  
		  case "9":
			echo do_shortcode('[contact-form-7 id="6" title="Send Mail"]');
			break;  
		  case "10":
			echo do_shortcode('[contact-form-7 id="6" title="Send Mail"]');
			break;
		  case "11":
			echo do_shortcode('[contact-form-7 id="7" title="Send Mail"]');
			break;
		  case "12":
			echo do_shortcode('[contact-form-7 id="6" title="Send Mail"]');
			break;
		  case "20":
			echo do_shortcode('[contact-form-7 id="482" title="Send Mail"]');
			break;
		  case "19":
			echo do_shortcode('[contact-form-7 id="11" title="Send Mail"]');
			break;
		  case "newsvancouver":
			echo do_shortcode('[contact-form-7 id="9" title="Send Mail"]');
			break;
		  case "newssydney":
			echo do_shortcode('[contact-form-7 id="9" title="Send Mail"]');
			break;
		  case "21"://"震災留学サポート":
			echo do_shortcode('[contact-form-7 id="13" title="Send Mail"]');
			break;
		  case "22"://"ブログ管理者":
			echo do_shortcode('[contact-form-7 id="13" title="Send Mail"]');
			break;
		  default:
		
		}
				
		 ?>
	</div>	

	<?php include(locate_template('ads.php')); ?>

</div><!-- #secondary -->