<?php
	echo '<li class="popular" >';
		//echo '<div class="imgContainer" style="background-image: url(' . $post_data['img_link'] . ');">';
		echo '<div class="imgContainer">';
		
			echo '<a href="' . $post_data['get_permalink'] . '" rel="bookmark">';
			
				echo '<div class="bgtag" style="background-color: ' . $post_data['color'] . ';">';
				
					echo $post_data['category_name'];
					
				echo '</div>'; // .bgtag
				
				echo $post_data['post_thumbnail'];
			
			echo '</a>';
			
		echo '</div>'; // .imgContainer
		
		echo '<div class="li_data"><header class="entry-header">';
			
			echo '<p><span class="post_date nf">' . $post_data['pdate'] . '</span></p>';
		
			echo '<h1 class="entry-title nf">';
			
				echo '<a href="' . $post_data['get_permalink'] . '" rel="bookmark">' . $post_data['get_the_title'] . '</a>';
			
			echo '</h1>'; // .entry-title nf
			
			echo '<p class="popular_content">' . $post_data['content_post'] . '</p>';
			
			//if ($post_data['tagz'] != '') {
			if ($post_data['nummy'] != 0) { 
				echo '<p class="popular_content_tags">タグ ： ' . $post_data['tagz'] . '</p>';
			}
		
		echo '</header></div>'; // .entry-header
		
	echo '</li>';
?>