<!DOCTYPE HTML>
<html <?php echo language_attributes();?>/>
<head>
    <meta charset="<?php bloginfo('charset')?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
	<script>
		var $wtype = '<?php echo (current_user_can('manage_options'))?1:0?>';
	</script>
	<?php wp_head() ?>
</head>
<body  <?php body_class() ?> >
<div id="header">
	<div id="header_left">
		<h1 id="logotext">日本ワーキング・ホリデー協会　皆さんのワーホリと留学を応援します</h1>
		<div id="topimg">
			<A href="/"><img src="<?php echo THEME_URI."/images/h1-logo.jpg"?>"></a>
		</div>
	</div>
	<h2 class='btnMemberTop'>
		<a href="/member/top.php">
			メンバー専用ページ 
		</a>
	</h2>
	<div id="utility-nav">
		<ul>
			<li class="u-nav01"><a href="/">日本語</a></li>
			<li class="u-nav02"><a href="/eng/">英語</a></li>
		</ul>
	</div>
	<?php  echo memberpage_banner(); ?>
	
	<div id="global-menu">
		<?php member_menu('primary-menu') ?>
		<div class='clear'></div>
	</div>
</div>
<div id='header_mobile'>
	<div id="header_left">
		<div id="topimg">
			<A href="/"><img src="<?php echo THEME_URI."/images/h1-logo.jpg"?>"></a>
		</div>
		<div class='btn_menu'>
			<span id="mobile-globalmenu-btn">
				<img src="<?php echo THEME_URI."/images/mobile-globalmenu-btn.gif"?>" class="responsive-img">
			</span>
		</div>
	</div>
	<?php member_menu('primary-menu') ?>
</div>
<div class="headBtn">
	<a class="left" href="/seminar"><span>セミナー予約</span></a>
	<a class="right-membertop" href='/member/top.php'><span>   メンバートップ   </span></a>
</div>
<div id="contentsbox">
	<div id="contentsbox-top">
		<div id="contentsbox-top-left">
			<div id="contentsbox-top-right"></div>
		</div>
	</div>
	<div id="contents">
		<div id="global-nav" class="global-nav-pc" style="position:relative;">
			<?php member_menu('menu-left') ?>
			<?php echo showMenuLeft()?>
		</div>
		<div id='maincontent'>
		<?php echo custom_breadcrumbs()?>
		<div id='mainContentInfo'>