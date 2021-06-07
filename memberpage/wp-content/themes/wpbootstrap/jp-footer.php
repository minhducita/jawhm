<?php
/**
 * The common footer of Japanese Blogs
 *
 * Displayed right before the common
 * footer of all mobile sites.
 */

	
	$cat = get_cat_id( single_cat_title("",false) );

	if (is_single()) { // display comment box
?>

<?php 
	//rj test session destroy
	session_destroy(); 
	?>


<?php 
	//edit
	if (isset($_GET['wc'])) {
 	//unset($_GET['wc'];
?>

<div id="wc">
<p id="p_detail"><span style="color: red;">コメントの投稿に失敗しました。</span><br/>入力した画像内のテキストが一致していません。</p>
</div>

<?php
	}
?>


<?php
	//edit
	session_start();
	if (isset($_GET['y'])) {
	//unset($_GET['y'];
	
    	
?>

<div id="comment_posted">
<p id="p_big">コメントの投稿が完了しました。</p>
<p id="p_detail">いただいたコメントは内容の承認後、一覧に表示されます。<br/>
恐れ入りますが、今しばらくお待ちください。</p>
</div>

<?php
	}
?>

<div class="row tags-bg comment-drop" style ="<!--background-color:#286497;-->" >
		<div class="bloglist-header" href="#collapse11" style="padding-top:25px ;" > 
			
			<img style="width: 90px !important; margin-top:-2px;" src="<?php echo site_url(); ?>/wp-content/uploads/2014/12/comment-img.png">	
		</div>

	<div class="list" id="collapse11" style="display:none; background-color:#fff; margin-bottom:5px; margin-top:5px; ">
		<center>
		
		<?php comments_template( '', true ); ?>
		</center>

	</div>
</div>

<div class="row tags-bg" style ="<!--background-color:#286497;-->" >
		<div class="bloginformation-header" href="#collapse10" >
			<p>BLOG Information
			<img style="width: 20px !important; margin-top:-2px;" src="<?php echo site_url(); ?>/wp-content/uploads/2014/12/blog-img.png"></p>
		</div>

		<div class="list" id="collapse10" style="display:none; background-color:#fff; margin-bottom:5px; margin-top:5px;">
		
		<?php
			$what_site = 'mobile';
			include(locate_template('../twentytwelve/school_info.php'));
		?>

		</div>
</div>

<?php } ?>

<div class="row tags-bg <?php if(!is_single()) { echo 'row-archive'; } ?>" style ="<!--background-color:#286497;-->" >
		<div class="bloginformation-header" href="#collapse8" > 
			<p>Archive
			<img style="width: 20px !important; margin-top:-2px;" src="<?php echo site_url(); ?>/wp-content/uploads/2014/12/calendar-img.png"></p>
		</div>

	<div class="list-two drop-menu" id="collapse8" style="display:none; background-color:#fff; margin-bottom:5px; margin-top:5px;">
		
<?php
	echo '<ul>';
	
	$list_temp = 'temp';
	$parent_posts = get_posts('posts_per_page=-1&category='.$cat);
	$x = 0;
		
	$a_link = get_site_url();
	
	foreach($parent_posts as $post) :
	
		$date = get_the_date( 'Y' );
		$date .= "年";
		$date .= get_the_date( 'm' );
		$date .= "月";
		
		if ($list_temp != $date) {

			$arrow = '<img style="width:10px !important; margin-top:-2px;  filter: alpha(opacity=40);" src="' . site_url() . '/wp-content/uploads/2014/12/blue-triangle.jpg" />';
			
			if ($x == 0) {
			
				echo '<li>';
				echo '<a href="' . $a_link . '/archive?month=' . get_the_date( 'm' ) . '&yr=' . get_the_date( 'Y' ) . '">';
				echo $arrow . '  ' . $date;
				
				$list_temp = $date;
				$x++;
				
			} else {
			
				echo ' (' . $x . ')';
				
				echo '</a>';
				
				echo '</li>';
				$x = 0;
				
				if ($x != sizeof($post)) {
				
					echo '<li>';
					echo '<a href="' . $a_link . '/archive?month=' . get_the_date( 'm' ) . '&yr=' . get_the_date( 'Y' ) . '">';
					echo $arrow . '  ' . $date;
					
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
	
	echo '</ul>';

?>

	</div>
</div>

<div class="row tags-bg" style ="<!--background-color:#286497;-->" >
		<div class="bloginformation-header" href="#collapse9" > 
			<p>Category
			<img style="width: 20px !important; margin-top:-2px;" src="<?php echo site_url(); ?>/wp-content/uploads/2014/12/plane-img.png"></p>
		</div>

	<div class="list-two drop-menu" id="collapse9" style="display:none; background-color:#fff; margin-bottom:5px; margin-top:5px;">
		
		<ul class="categories">
			<?php wp_list_categories ('title_li='); ?>
		</ul>

	</div>
</div>

<div class="ads" style="background-color:#fff;">
	<p class="pick_up_ads">Pick Up </p>
	<?php
		include(locate_template('../twentytwelve/ads.php'));
	?>
</div>

<div class="jp-search">
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>/">
		<div class="search_div">
			<input type="text" value="" name="s" id="s" placeholder="Search">
			<input type="hidden" name="r" value="j" />
			<input type="hidden" name="pc" value="<?php echo $cat; ?>" />
			<input type="submit" id="searchsubmit" value="Search">
		</div>
	</form>
</div>

<?php include(locate_template('orange_navigation.php')); ?>