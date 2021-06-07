<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 
 $site_name = site_name();

/* function assignPageTitle(){
	$bid = get_current_blog_id();
	return $bid;
}
add_filter('wp_title', 'assignPageTitle'); */
 
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!-- <meta name="viewport" content="width=device-width" /> -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<meta name="viewport" content="width=1000" />

<title><?php wp_title( '|', true, 'right' ); ?></title>
<!-- <link rel="stylesheet" type="text/css" href="responsive.css" media="screen and (min-width: 300px) and (max-width: 1080px)"> -->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php 
	wp_head(); 
?>
<link href="<?php echo get_template_directory_uri(); ?>/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/css/country-pc.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bjqs-1.3.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js" type="text/javascript"></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KKVVF9Q');</script>
<!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKVVF9Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!--script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o ),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');


//ga('create', 'UA-59520235-1', 'auto');
	
ga('create', 'UA-20563699-1', 'auto');
  ga('send', 'pageview');

</script-->

<header id="masthead" class="site-header" role="banner">
<div id="h-bg">
	<div id="header" class="">
		<hgroup>
			<div class="header-left">
				<h2><?php echo '日本ワーキング・ホリデー協会　公式ブログ'; //bloginfo( 'description' ); ?></h2>

				<h1><span><a href="<?php echo network_home_url(); ?>"  rel="home" id="home_logo">
					<img src="<?php echo network_home_url(); ?>/wp-content/uploads/2014/10/logo.png" id="logo" />
				</a></span></h1>
			</div>
			<div class="header-right">
				<?php //get_search_form(); ?>
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo network_home_url(); ?>search/">
					<div>
						<input type="text" value="" name="s" id="s">
						<input type="hidden" name="r" value="g" />
						<input type="submit" id="searchsubmit" value="Search">
					</div>
				</form>
			</div>
		</hgroup>
	</div>
</div>
<div id="nav-bg">
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
		<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
		<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
	
		<div id="area-blog-globalmenu">
			<div id="area-blog-globalmenu-inner">
				<ul id="blog-globalmenu-list" class="clearfix">
					<li id="nav_li-01"><a href="/system.html" class="gl">ワーキング・ホリデー制度について</a></li>
					<li id="nav_li-01"><a href="/start.html" class="gl">はじめてのワーキング・ホリデー</a></li>
					<li id="nav_li-01"><a href="/seminar/seminar" class="gl">無料セミナー</a></li>
					<li id="nav_li-01"><a href="<?php echo $site_name; ?>popular/" class="gl">人気記事</a></li>
					<li id="nav_li-01"><a href="<?php echo $site_name; ?>search/tag/" class="gl">タグで探す</a></li>
					<li id="nav_li-01"><a href="<?php echo $site_name; ?>whstory/" class="gl">ワーホリストーリー</a></li>
					<li id="nav_li-01"><a href="http://kotanglish.jp" target="_blank" class="gl">コタングリッシュ</a></li>
					<!-- <li id="nav_li"><a href="">ブログトップ</a></li> -->
					<li id="nav_li-02"><a href="<?php echo $site_name; ?>" class="gl">ブログトップ</a></li>
				</ul>
			</div>
		</div>
	
	</nav><!-- #site-navigation -->
</div>

<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->
<div id="page" class="hfeed site">
	
<?php 
	//global $blog_id;
	//footer_color($blog_id);
	//echo $blog_id;
?>
	<div id="main" class="wrapper">