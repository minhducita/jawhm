<?php
/**
 * Template Name: maintop
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="boxleft_content">
				<div class="box_notice" style="height: 295px;">
					<div class="elephant_image">
						<img src="<?php echo network_home_url(); ?>/wp-content/uploads/2015/01/img_notice_2.png" />
					</div>
					<?php
						include(locate_template('ばむ知識.php'));
					?>
					<!-- <img src ="wp-content/uploads/2014/09/img_notice.png" alt="" /> -->
				</div>
				
				<ul class="blog_sites">
					<li class="sites_title"><img src="<?php echo network_home_url(); ?>/wp-content/uploads/2014/10/site_title.jpg" alt=""><li>
					<li><a href='<?php echo network_home_url(); ?>australia/'>Australia</a></li>
					<li><a href='<?php echo network_home_url(); ?>canada/'>Canada</a></li>
					<li><a href='<?php echo network_home_url(); ?>newzealand/'>New Zealand</a></li>
					<li><a href='<?php echo network_home_url(); ?>unitedkingdom/'>United kingdom</a></li>
					<li><a href='<?php echo network_home_url(); ?>world/'>World wide</a></li>
					<li><a href='<?php echo network_home_url(); ?>tokyoblog/'>Tokyo</a></li>
					<li><a href='<?php echo network_home_url(); ?>osakablog/'>Osaka</a></li>
					<li><a href='<?php echo network_home_url(); ?>nagoyablog/'>Nagoya</a></li>
					<li><a href='<?php echo network_home_url(); ?>fukuokablog/'>Fukuoka</a></li>
					<li><a href='<?php echo network_home_url(); ?>okinawablog/'>Okinawa</a></li>
					<!-- <li><a href='<?php echo network_home_url(); ?>workingholidaystory/'>Working Holiday<br>Story</a></li> -->
					<!--li>Autralia</li>
					<li>Canada</li-->
				</ul>
				<div class="box_tags_left">
					<ul>
						<li><img src="<?php echo network_home_url(); ?>/wp-content/uploads/2014/10/tags_title.jpg" alt=""></li>
						<?php 
							get_template_part('maintop_tag_template');
						?>
					</ul>
				</div>
				<div id="code2">
					<img src="<?php echo network_home_url(); ?>/wp-content/uploads/2015/02/blog_qr.png" />
				</div>
			</div>
			<div class="boxright_content">
				<div class="box_choice">
					
					<img src="<?php echo network_home_url(); ?>/wp-content/uploads/2014/10/sub_content_title2.jpg" />
				</div>
				<div id="banner-fade">
					<ul class="bjqs">
						<?php
							//get_template_part( 'maintop_slider' );
							include(locate_template('maintop_slider.php'));
						?> 
					</ul>
				</div>
				<script class="secret-source">
					jQuery(document).ready(function($) {
					  $('#banner-fade').bjqs({
						height      : '222',
						width       : 740,
						responsive  : true
					  });
					});
				</script>
				
				<div class="box_new_entry">
					<!-- <h2>New Entry</h2> -->
					<?php
						//get_template_part( 'main_newentry' );
						include(locate_template('main_newentry.php'));
					?> 
				
				</div>
				<img class="school_list_bg" src="wp-content/uploads/2014/09/bg_school_list.png" alt="" />
				<div class="box_school_list">
					<div class="school_list">
						<?php get_template_part( 'school_list' ); ?> 
					</div>
				</div>
				<div class="what_is_wh">
					<span><p id="quest">ワーキング・ホリデー協会公式ブログとは？</p></span>
					<span><p id="detail">日本ワーキング・ホリデー協会スタッフや、海外語学学校スタッフがワーキングホリデー（ワーホリ）や留学についての最新情報をブログでお伝えしています。これから海外に出てワーキングホリデー（ワーホリ）や留学を経験される方、また、帰国された方に絶対にタメになる情報があるはずです。ブログは毎日更新中！<br/>ワーキングホリデー（ワーホリ）の最新情報をこのブログでゲットしてください！</p></span>
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
	switch_to_blog(1);
	get_footer(); 
?>