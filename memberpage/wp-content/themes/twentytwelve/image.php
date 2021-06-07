<?php
	wp_redirect(get_permalink($post->post_parent)); 
	exit();
	//include(locate_template('category.php'));
	//get_template_part('category');
?>