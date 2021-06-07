<!doctype html>
<html>
    <head>
        <title><?php bloginfo("name") ?></title>
        <!-- <meta name="description" content="ディスクリプションが入ります" /> -->
        <meta name="keywords" content="ワーキングホリデー,ワーホリ,留学,セミナー,海外,語学学校" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <link rel="stylesheet" media="(max-width: 700px)" href="<?php echo get_template_directory_uri() ?>/css/style_sp.css">
        <link rel="stylesheet" media="(min-width: 699px)" href="<?php echo get_template_directory_uri() ?>/css/style_pc.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/jquery.sidr.dark.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/simple.modal.css">
        <?php global $wp_query; if ($wp_query->query['pagename'] == "seminar") : wp_deregister_script('jquery'); ?>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.smoothScroll_seminar.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/common_seminar.js"></script>
        <?php else : ?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.0.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> 
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.smoothScroll.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/common.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/diapo/jquery.hoverIntent.minified.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/diapo/diapo.js"></script>
		<script> 
			$(document).ready(function () {
				$('.pix_diapo').diapo();
            });
		</script>
        <?php endif; ?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/prefixfree.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.sidr.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.heightLine.js"></script>
        <script type="text/javascript" src="/js/jquery.blockUI.js"></script>
        <script>
            $(document).ready(function () {
                $('#openMenu').sidr({
                    side: 'right'
                });
            });
        </script>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/js/flexslider/flexslider.css" type="text/css" />
        <script src="<?php echo get_template_directory_uri() ?>/js/flexslider/jquery.flexslider.js"></script>

        <!--[if lt IE 9]>
          <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
          <script src="<?php echo get_template_directory_uri() ?>/js/html5shiv.min.js"></script>
            <![endif]-->

        <!--[if lt IE 8]>
            <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/selectivizr.js"></script>
        <![endif]-->

        <!--[if lte IE 6]>
           <script type="text/javascript" src="js/DD_belatedPNG_0.0.8a.js"></script>
           <script type="text/javascript">
             DD_belatedPNG.fix('img , div , li');
            </script>
        <![endif]-->
        <!-- Seminar Module -->
        <?php
        global $wp_query;
        if($wp_query->query['pagename'] == "seminar" || $wp_query->query['post_type'] == "school"): ?>
        <?php
        //seminar module
        include '../seminar_module/seminar_module.php';
        if(wp_is_mobile() || $wp_query->query['post_type'] == "school"){
            $config = array(
                'dummy_mode' => 'on',
                'view_mode' => 'list',
            );
        }else{
            $config = array(
                'dummy_mode' => 'on',
                'view_mode' => 'calendar',
                'calendar' => array(
                    'place_active' => 'deactive',
                    'country_active' => 'deactive',
                    'know_active' => 'deactive',
                    'calendar_icon_active' => 'deactive',
                    'count_field_active' => 'deactive',
                    'calendar_title_active' => 'deactive',
                    'calendar_desc_active' => 'deactive',
                    'footer_desc_active' => 'deactive',
                )
            );
        }
        $sm = new SeminarModule($config);
        echo $sm->get_add_css();
        echo $sm->get_add_js();
        echo $sm->get_add_style();

        //seminar,schoolページのみbase.css読み込み
        ?>
        <link id="size-stylesheet" rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/base.css">
        <?php endif; ?>
        <?php wp_head() ?>
		
		<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-KKVVF9Q');</script>
		<!-- End Google Tag Manager -->
		
    </head>

    <body id="top">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-KKVVF9Q' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		
        <div class="wrapper">
            <header class="head">
                <h1><a href="<?php echo get_home_url ($blog_id); ?>" id="header_title"><?php bloginfo("name") ?></a></h1>
                <nav class="topNav pcview clearfix">
                <?php if (!get_header_nav()) : ?>
                    <a class="btn reserve pcview" href="<?php bloginfo("url") ?>/seminar/">セミナー予約</a>
                    <a class="nav01" href="<?php bloginfo("url") ?>/seminar/">セミナースケジュール</a>
                    <a class="nav02" href="<?php bloginfo("url") ?>/school/">参加語学学校紹介</a>
                    <a class="nav03" href="<?php bloginfo("url") ?>/faq/">よくある質問</a>
                    <a class="nav04" href="<?php bloginfo("url") ?>/access/">会場アクセス</a>
                <?php endif; ?>
                </nav><!-- topNav / pcview -->

                <?php if (!get_header_nav()) : ?>
                <ul class="topNav spview">
                    <li><a class="reserve" href="<?php bloginfo("url") ?>/seminar/">セミナー予約</a></li>
                    <li><a id="openMenu" class="menu" href="#sidr">MENU</a></li>
                </ul><!-- topNav / spview -->
                <?php endif; ?>
                <!-- <img class="tabImg pcview" src="<?php echo get_template_directory_uri() ?>/images/bgTabImg.png" alt=""> -->
            </header>
            <?php if (!get_header_nav()) : ?>
            <div id="sidr" class="spview sidr">
                <ul>
                    <li><a class="nav01" href="<?php bloginfo("url") ?>/seminar/">セミナースケジュール</a></li>
                    <li><a class="nav02" href="<?php bloginfo("url") ?>/school/">参加語学学校紹介</a></li>
                    <li><a class="nav03" href="<?php bloginfo("url") ?>/faq/">よくある質問</a></li>
                    <li><a class="nav04" href="<?php bloginfo("url") ?>/access/">会場アクセス</a></li>
                    <li id="closeBtn"><a class="closeBtn" href="javascript: void(0)">close</a></li>
                </ul>
            </div>
            <?php endif; ?>



