<?php 

get_header(); 

include(locate_template('header_2.php'));

?>



<!-- Main hero unit for a primary marketing message or call to action -->

<div class="hero-unit">

	<div id="banner-test" class="slider_main_div">

			<?php include(locate_template('maintop_slider.php')); //get_template_part( 'maintop_slider' ); ?> 

	</div>

	

	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>


  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>

	<script type="text/javascript">

		$('#banner-test').slick({

			dots: true,

			slidesToShow: 1,

			slidesToScroll: 1,

			autoplay: true,

			autoplaySpeed: 5000,

			pauseOnDotsHover: true,

		});

	</script>



</div>



<!-- Example row of columns  hero-unit -->



<?php get_template_part( 'main_newentry' ); ?>



<?php include(locate_template('orange_navigation.php')); ?>



<div class="row">



	

		<div class="list-header" href="#collapse3">

				<p class="orange-p">

					<img style="width:10px !important; margin-top:-2px;" src="wp-content/uploads/2014/11/search-accordion2.png">

					<span style="margin-top:1px; font-size:1em;">School List</span>

				</p>

		</div>







	<div class="rowww" id="collapse3" style="border:1px solid #ccc; display:none;">



		<?php get_template_part( 'school_list' ); ?> 

</div>

	</div>







<?php get_footer(); ?>