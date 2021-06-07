<?php get_header() ?>
	<?php if(is_page(array('category'))){
			dynamic_sidebar('category-sidebar');
	}else{?>
		<?php if(have_posts()):while(have_posts()):the_post();?>
			<?php get_template_part('content',get_post_format());?>
		<?php endwhile;?>
		<?php else: ?>
			<?php get_template_part('content','none');?>
		<?php endif;?>
<?php } get_footer() ?>