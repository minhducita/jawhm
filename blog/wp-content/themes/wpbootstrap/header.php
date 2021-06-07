<head>
	<meta charset="utf-8">
	<title>日本ワーキング・ホリデー協会　公式ブログ</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Le styles
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet"> -->

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_enqueue_script("jquery"); ?>

	<!--  This is a Toggle -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

//ga('create', 'UA-59520235-1', 'auto');
  ga('create', 'UA-20563699-1', 'auto');
  ga('send', 'pageview');

</script>
	<!--script>
		$(document).ready(function() {
			$('.list-header').click(function(){
				//get collapse content selector
				var collapse_content_selector = $(this).attr('href');					

				//make the collapse content to be shown or hide
				var toggle_switch = $(this);
				$(collapse_content_selector).toggle(function(){
					if($(this).css('display')=='none'){
						//change the button label to be 'Show'
						//toggle_switch.html('Tags');
					}else{
						//change the button label to be 'Hide'
						//toggle_switch.html('Tags');
					}
				});
			});

		});	
	</script-->
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.bloglist-header').click(function(){
				//get collapse content selector
				var collapse_content_selector = $(this).attr('href');					

				//make the collapse content to be shown or hide
				var toggle_switch = $(this);
				$(collapse_content_selector).toggle(function(){
					if($(this).css('display')=='none'){
						//change the button label to be 'Show'
						//toggle_switch.html('Tags');
					}else{
						//change the button label to be 'Hide'
						//toggle_switch.html('Tags');
					}
				});
			});
		});	
	</script>

	<script>
		$(document).ready(function() {
			$('.grayblog-header').click(function(){
				//get collapse content selector
				var collapse_content_selector = $(this).attr('href');					

				//make the collapse content to be shown or hide
				var toggle_switch = $(this);
				$(collapse_content_selector).toggle(function(){
					if($(this).css('display')=='none'){
						//change the button label to be 'Show'
						//toggle_switch.html('Tags');
					}else{
						//change the button label to be 'Hide'
						//toggle_switch.html('Tags');
					}
				});
			});
		});	
	</script>
	
	<script>
		$(document).ready(function() {
			$('.bloginformation-header').click(function(){
				//get collapse content selector
				var collapse_content_selector = $(this).attr('href');					

				//make the collapse content to be shown or hide
				var toggle_switch = $(this);
				$(collapse_content_selector).toggle(function(){
					if($(this).css('display')=='none'){
						//change the button label to be 'Show'
						//toggle_switch.html('Tags');
					}else{
						//change the button label to be 'Hide'
						//toggle_switch.html('Tags');
					}
				});
			});
		});	
	</script>

	<script>
		$(document).ready(function() {
			$('.rowww').click(function(){
				//get collapse content selector
				var collapse_content_selector = $(this).attr('href');					

				//make the collapse content to be shown or hide
				var toggle_switch = $(this);
				$(collapse_content_selector).toggle(function(){
				if($(this).css('display')=='none'){
						//change the button label to be 'Show'
						//toggle_switch.html('School List');
					}else{
						//change the button label to be 'Hide'
						//toggle_switch.html('School List');
					}
				});
			});
		});	
	</script>

	<!-- End -->

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>style.css" media="screen and (min-width: 300px) and (max-width: 1080px)"> -->

	<!-- viewport fix for ios 4 view zoom bug -->
	<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/viewport-fix.js"></script> -->
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.touchSwipe.min.js"></script> -->
	
	<script>
		$(document).ready(function () {
			$('.o_link').click(function(e) {
				e.preventDefault();
				window.location.hash = 'temp';
				
				var content = $(this).attr('rel');
				
				$('#collapse1').hide();
				$('#collapse2').hide();
				
				$('#' + content).show();
				
				window.location.hash = '#' + content + 'o';
			});
		});
	</script>
	
	<?php
		wp_head(); 
		$site_name = site_name();
	?>
</head>
<body>
	<header id="masthead" class="site-header" role="banner">
		<div id="h-bg">
			<div id="header" class="">
				<hgroup>
					<div class="header-left">
						<a href="<?php echo network_site_url(); ?>"  rel="home" id="home_logo"><h1 class="site_logo"><span><img src="<?php echo site_url(); ?>/wp-content/uploads/2015/01/logo.png" id="logo" /></span></h1>
						<h2>日本ワーキング・ホリデー協会　公式ブログ</h2></a>
					</div>
				</hgroup>
			</div>
		</div>

		<div id="nav-bg" >
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h3 class="menu-toggle">Menu</h3>
				<a class="assistive-text" href="#content" title="Skip to content">Skip to content</a>

				<div id="area-blog-globalmenu">
					<div id="area-blog-globalmenu-inner">
						<ul id="blog-globalmenu-list" class="clearfix">
							<li id="nav_li-01"><a href="/system.html"></a></li>
							<li id="nav_li-02"><a href="/start.html"></a></li>
							<li id="nav_li-03"><a href="/seminar/seminar"></a></li>
							<li id="nav_li-04"><a href="/"></a></li>
							<li id="nav_li-05"><a href="/blog/tag/"></a></li>
							<li id="nav_li-06"><a href="/blog/"></a></li>
							<li id="nav_li-07"><a href="/blog/whstory/" target="_blank"></a></li>
							<li id="nav_li-08"><a href="https://jp.surveymonkey.com/s/697P9XM"></a></li>
						</ul>
					</div>
				</div>

			</nav><!-- #site-navigation -->
		</div>

	</header>

	<div class="row" style ="border:0px solid red" >
		<div class="mobile-top-links">
			<a rel="collapse1" class="o_link"><div class="mobile-nav-border"><p><img src="<?php echo site_url(); ?>/wp-content/uploads/2014/11/search-glass.png" class="mobile-nav-img" /><span>ジャンルからさがす</span></p></div></a>

			<a rel="collapse2" class="o_link"><div class="mobile-nav"><p><img src="<?php echo site_url(); ?>/wp-content/uploads/2014/11/book-img.png" class="mobile-nav-img" /><span>なにを知りたい？</span></p></div></a>

			<div style="clear:both;"></div>
		</div>
	</div>
	<!--end mobile menu-->