<?php get_header();$num = rand(1,3); $num = ($num == 1)?"":$num?>
<div class="section nobroder">
	<img class='line_cat' src="<?php echo get_template_directory_uri()?>/images/catologytoptitle<?php echo $num?>.png">
	<h2 class='new-sec-title catologyh2'>	
		<img src="<?php echo get_template_directory_uri()?>/images/catologyiconi<?php echo $num?>.png">
		<span> <?php single_cat_title( '', true ); ?></span>
	</h2>
	<div class="clear"></div>
	<div class="catology">
		<?php if(have_posts()):
			while(have_posts()):the_post();
				$post_i = 0;
				get_template_part('content',get_post_format());
			endwhile;
			paging_nav();
		else:
			get_template_part('content','none');
		endif?>
	</div>
</div>
<?php get_footer() ?>

 

