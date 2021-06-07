﻿<?php
/**
 * Template Name: Global Search Template
 *
 * The Search Template for the Search
 * on the header of the blog pages.
 */

get_header(); ?>

<section id="primary" class="site-content">
	<div id="content" role="main">
		<?php echo $_GET['s']; ?>
	</div>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>