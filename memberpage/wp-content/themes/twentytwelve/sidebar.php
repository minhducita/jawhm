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
 
$search_keyword = $_GET['s'];
$search_range = $_GET['r'];
$search_category = $_GET['pc'];

?>

	<?php //if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">

<?php
	if ($search_range != 'g') {
		//switch_to_blog(16);
	//}

	echo '<aside id="recent-posts-2" class="widget widget_recent_entries">';
	//$cat = get_cat_id( single_cat_title("",false) );
	echo '<h3 class="widget-title">Recent Posts</h3>';
	
	echo '<ul>';
	
	if (!is_search()) {
		$category = get_the_category();
		$current_category = $category[0];
		$parent_category = $current_category->category_parent;
	} else {
		$parent_category = $search_category;
	}
	
	if ($parent_category == NULL) { // in case blog has no posts
		$parent_category = $cat;
	}
	
	$parent_posts = get_posts('numberposts=5&category='.$parent_category);
	
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
	
	<?php endforeach;
	
	echo '</ul>';

	echo '</aside>';
	
	//if ($search_range == 'g') {
		//restore_current_blog();
	}
?>

<?php
$blog_id = get_current_blog_id();

if ($search_range != 'g') {
	echo '<aside id="archives-2" class="widget widget_archive">';
	
	echo '<h3 class="widget-title">Archives</h3>';
	
	echo '<ul>';
	
	/* test area */
	
	$category = get_the_category();
	$current_category = $category[0];
	$parent_category = $current_category->category_parent;
	
	if ( $parent_category != 0 ) {
	
		$list_temp = 'temp';
		$parent_posts = get_posts('posts_per_page=-1&category='.$parent_category);
		$x = 0;
		
		$a_link = get_site_url();
		
		foreach($parent_posts as $post) :
		
			$date = get_the_date( 'Y' );
			$date .= "年";
			$date .= get_the_date( 'm' );
			$date .= "月";
			
			if ($list_temp != $date) {
				
				if ($x == 0) {
				
					echo '<li>';
					echo '<a href="' . $a_link . '/archive?month=' . get_the_date( 'm' ) . '&yr=' . get_the_date( 'Y' ) . '&cat=' . $parent_category . '">';
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
						echo '<a href="' . $a_link . '/archive?month=' . get_the_date( 'm' ) . '&yr=' . get_the_date( 'Y' ) . '&cat=' . $parent_category . '">';
						echo $date;
						
						$list_temp = $date;
						$x++;
						
					}
					
				}
			} else {
				$x++;
			}
		
		endforeach;
		
		echo ' (' . $x . ')</a></li>';
	}
	
	/* end of test area */
	
	echo '</ul>';

	echo '</aside>';
}
?>

<?php
	//dynamic_sidebar( 'sidebar-1' );
?>

<?php
	if (is_category( )) { // if vieweing on category page
		$cat = get_query_var('cat');
		$parent = get_category ($cat);

		if ($parent->parent) {
			wp_list_categories ('child_of=' . $parent->parent);
		} else {
			wp_list_categories ('child_of=' . $cat);
		}
	} else if(is_single( ) or is_author( )) { // if vieweing on single/author page
		$getcategory = get_the_category() ;
		$parentcatid = $getcategory[0]->category_parent;

		wp_list_categories ('child_of=' . $parentcatid);
	} else if (is_search()) { // if vieweing on search page
			if ($search_range != 'g') {
				$cat = $search_category;
				$parent = get_category ($cat);

				if ($parent->parent) {
					wp_list_categories ('child_of=' . $parent->parent);
				} else {
					wp_list_categories ('child_of=' . $cat);
				}
			}
	} else { // if vieweing on any other page
		$cat = get_query_var('cat');
		$parent = get_category ($cat);

		if ($parent->parent) {
			wp_list_categories ('child_of=' . $parent->parent);
		} else {
			wp_list_categories ('child_of=' . $cat);
		}
	}
?>

<?php
	if ($search_range != 'g') {
		echo '<h3 class="widget-title">Search</h3>';
	}
	echo '<div class="widget widget_search">';
	//get_search_form(); 
?>
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>/">
		<div>
			<input type="text" value="" name="s" id="s">
			<?php if (!is_search()) { ?>
				<input type="hidden" name="r" value="e" />
				<input type="hidden" name="pc" value="<?php echo $parent_category; ?>" />
			<?php } else if ($search_range == 'g') { ?>
				<input type="hidden" name="r" value="g" />
			<?php } else { ?>
				<input type="hidden" name="r" value="e" />
				<input type="hidden" name="pc" value="<?php echo $parent_category; ?>" />
			<?php }?>
			<input type="submit" id="searchsubmit" value="Search">
		</div>
	</form>
<?php 
	echo '</div>';
?>	

<div class="boxMail">

<?php
	if ($search_range != 'g') {
?>
<p class="top" style="font-size: 18px;">
ワーホリ＆留学に関する<br>
ご相談・ご質問はこちらから
</p>
	
<?php
	}
?>
		<?php 
		//$siteTitle = get_bloginfo('name'); 
	
		//switch ($siteTitle) {
		global $blog_id;
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