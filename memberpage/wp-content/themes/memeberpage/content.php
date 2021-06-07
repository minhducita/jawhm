<?php  //list page 
	if(is_category() || is_search() || is_tag()){ 
		$values = get_post_custom(); 
		$time_post = strtotime(get_the_date());
		$except = mb_substr(get_the_excerpt(),0,150);
		$image = get_the_post_thumbnail(get_the_ID(),'thumbnail');
	?>
		<div class="tabcatology flex">
			<?php echo $image?>
			<div class='catologyright'>
				<h3> <a href="<?php echo the_permalink()?>">
						<img class="img_title_ico" src="<?php echo get_template_directory_uri()?>/images/title-ico.png">
						<span> <?php echo the_title()?> </span>
					</a> </h3>
					<span class="titlecalender"><b>日付:</b> <?php echo date("Y",$time_post)."年".date("m",$time_post)."月".date("d",$time_post)."日"?></span>
					<p class='text01'><?php echo $except ?></p>
				</div>
		</div>
 <?php }elseif(is_single()){?>
	<div class='section nobroder'>
		<h2 class="catologydetailh2"> <?php the_title()?>
			<div class>
				<span class="titlecalender">
					<?php 
						$time = strtotime(get_the_date());
						echo "<b>日付: </b>".date("Y",$time)."年".date("m",$time)."月".date("d",$time)."日";
					?>
				</span>
				<span class="titlecalender1">
					<b>カテゴリー: </b> <?php $category = get_the_category(get_the_ID()); echo @$category[0]->name?>
				</span>
			</div>
		</h2>
		<p class="post_thumb_detail">
			<?php echo get_the_post_thumbnail(get_the_ID(),'medium')?>
		</p>
		<?php the_content()?>
	</div>
 <?php }elseif(is_page()){
	 the_content();
 }?>