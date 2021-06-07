<?php
/**
 * Template Name: sub_main
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="boxleft_content">
				<ul class="blog_sites">
				
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
					
				</ul>
				
				<div class="box_tags_left">
					<ul>
					
						
					
					
					
					
						<li><img src="<?php echo network_home_url(); ?>wp-content/uploads/2014/10/tags_title.jpg" alt=""></li>
						<?php
							/* $tags = get_tags();
							
							if ($tags) {
								
								$counts = $tag_links = array();
								$tag_list = array();
								
								foreach ( (array) $tags as $tag ) {
									$counts[$tag->name] = $tag->count;
									$tag_links[$tag->name] = get_tag_link( $tag->term_id );
								}

								asort($counts);
								$counts = array_reverse( $counts, true );

								$i = 0;
								foreach ( $counts as $tag => $count ) {
									$i++;
									$tag_link = clean_url($tag_links[$tag]);
									$tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
									
									if($i <= 25){
										// print "<li><a href='" . get_home_url() . "tag/" . $tag . "' title=\"$count\">$tag</a></li>";
										$tag_list[$i] = "<li><a href='" . network_home_url() . "tag?tag=" . $tag . "' title=\"$count\">$tag</a></li>";
									}
								}
								
								shuffle($tag_list);
								for($x=0;$x<count($tag_list);$x++){
									echo $tag_list[$x];
								}
								
							} */
							get_template_part('maintop_tag_template');
						?>
						
					</ul>
				</div>
				
				
				<div id="code2">
					<img src="<?php echo network_home_url(); ?>wp-content/uploads/2014/10/serial.jpg" />
				</div>
			</div>
			<div class="boxright_content sub_main">
				<div class="box_new_entry">
					<h2 class="<?php 
						$siteTitle = get_bloginfo('name'); 
						echo str_replace(" ", "", $siteTitle);
					?>_head"></h2>
					<div class="sub_entry_note">
						<?php include(locate_template('sub_main_info.php')); ?>
						<div class="<?php 
							$siteTitle = get_bloginfo('name'); 
							echo str_replace(" ", "", $siteTitle);
						?>_view"></div>
					</div>

					<div class="sub_box_new_entry" style="clear: both;">
						<?php get_template_part( 'sub_newentry' ); ?> 
					</div>
				</div>
				<img class="school_list_bg" src="<?php echo get_home_url(); ?>/wp-content/uploads/2014/09/bg_school_list.png" alt="" />
				<div class="box_school_list">
					<div class="school_list">
						<?php get_template_part( 'sub_school_list' ); ?> 
					</div>
				</div>
				
				<div class="what_is_wh">
					<span><p id="quest">ワーキング・ホリデー協会公式ブログとは？</p></span>

					<span><p id="detail">日本ワーキング・ホリデー協会スタッフや、海外語学学校スタッフがワーキングホリデー（ワーホリ）や留学についての最新情報をブログでお伝えしています。これから海外に出てワーキングホリデー（ワーホリ）や留学を経験される方、また、帰国された方に絶対にタメになる情報があるはずです。ブログは毎日更新中！<br/>ワーキングホリデー（ワーホリ）の最新情報をこのブログでゲットしてください！</p></span>
				</div>
				
			</div>
		
		

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>