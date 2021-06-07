<?php
	/* Displays the orange navigation */
?>

<div class="row tags-bg" style ="background-color:#fff;" id="collapse1o" >
		<span id="sites_link"></span>
		<div class="list-header" href="#collapse1" >
			<p class="orange-p">
				<img style="width:10px !important; margin-top:-2px;" src="<?php echo network_site_url(); ?>/wp-content/uploads/2014/11/search-accordion2.png">	
				ジャンルからさがす
				<img class="orange-icons" src="<?php echo network_site_url(); ?>/wp-content/uploads/2015/01/orange-magnifyer.png">
			</p>
		</div>

	

	<div class="list" id="collapse1" style="display:none;">
		<ul>
			<?php
				$triangle = network_site_url() . 'wp-content/uploads/2014/11/triangle.gif';
			?>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>australia/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						オーストラリアについて
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>canada/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						カナダについて
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>newzealand/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						ニュージーランドについて
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>unitedkingdom">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						イギリスについて
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>world/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						その他ワーホリ協定国について
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>tokyoblog/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						東京オフィスからの情報
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>osakablog/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						大阪オフィスからの情報
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>nagoyablog/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						名古屋オフィスからの情報
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>fukuokablog/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						福岡オフィスからの情報
					</a>
				</p>
			</li>
			<li>
				<p class="p-country-list">
					<a href="<?php echo network_site_url(); ?>okinawablog/">
						<img class="li-country-list" src="<?php echo $triangle; ?>" />
						沖縄オフィスからの情報
					</a>
				</p>
			</li>
		</ul>
		

	</div>
</div>


<div class="row tags-bg" style="background-color:#fff; text-align: left;" id="collapse2o" >
		<span id="tags"></span>
		<div class="list-header" href="#collapse2" > 
			<p class="orange-p">
				<img class="li-tag-list" src="<?php echo network_site_url(); ?>/wp-content/uploads/2014/11/search-accordion2.png">
				なにを知りたい？
				<img class="orange-icons" src="<?php echo network_site_url(); ?>/wp-content/uploads/2015/01/orange-book.png">
			</p>
		</div>

	

	<div class="list" id="collapse2" style="display:none;">

		<?php get_template_part('maintop_tag_template'); ?>

	</div>
</div>