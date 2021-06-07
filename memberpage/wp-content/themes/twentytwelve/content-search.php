<a href="<?php echo $get_permalink; ?>" rel="bookmark">
	<!--<div class="imgContainer" style="background-image: url('<?php echo $img_link; ?>');">-->
	<div class="imgContainer">
		<div class="bgtag" style="background-color: <?php echo $colorz; ?>;">
			<?php echo $category_name; ?>
		</div> <!-- div.bgtag -->
		<?php echo $post_thumbnail; ?>
	</div> <!-- div.imgContainer -->
</a>
<div class="li_data">
	<header class="entry-header">
		<p>
			<span class="post_date nf"><?php echo $d_date; ?></span>
		</p>
		<h1 class="entry-title nf">
			<a href="<?php echo $get_permalink; ?>" rel="bookmark"><?php echo $get_the_title; ?></a>
		</h1>
		<p class="search_content"><?php echo $content_post; ?></p>
		<!-- <p style="color: black; margin-top: 5px; font-size: 10px;">カテゴリ ： <a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a></p> -->
		<?php 
			$taggy = array_filter($taggy);
			if (!empty($taggy)) { 
		?>
			<p class="search_content_tags">タグ ： <?php 
				$nummy = 0;
				foreach($taggy as $taggy2) {
					if($nummy > 0) {
						echo ', ';
					}
					echo '<a href="' . network_home_url() .'search/tag/?tag='. $taggy2 .'">';
					
					echo $taggy_name[$nummy];
					
					echo '</a>';
					
					$nummy++;
				}
			?></p>
		<?php } ?>
	</header>
</div>