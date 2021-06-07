<?php

// If access with SSL(443) , Redirect Non-SSL page.
if( $_SERVER["SERVER_PORT"] == 80 ) {
    header( "location:" . "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] );
    exit;
}

error_reporting(0);
ini_set( 'display_errors', 1 );

//$big_size = array("width='585'" , "height='295'" , "width='380'" , "height='192'");
//$sml_size = array("width='260'" , "height='131'" , "width='400'" , "height='101'");
//$big_size = array("width='585'" , "height='295'" , "width='260'" , "height='131'");
//$sml_size = array("width='380'" , "height='192'" , "width='400'" , "height='101'");

// 1次リリース
$big_size = array("width='585'" , "heighhttps://www.jawhm.or.jp/ad/www/delivery/ck.php?oaparams=2__bannerid=724__zoneid=159__cb=2f67af9514__oadest=http%3A%2F%2Fwww.jawhm.or.jp%2Fryugakusupport%2Ft='295'" , "width='584'" , "height='145'");
$sml_size = array("width='304'" , "height='153'" , "width='380'" , "height='74'");

// 2次リリースhttps://www.jawhm.or.jp/ad/www/delivery/ck.php?oaparams=2__bannerid=786__zoneid=151__cb=627604f320__oadest=http%3A%2F%2Fwww.jawhm.or.jp%2Fkatsuyou.html
//$big_size = array("width='585'" , "height='295'" , "width='584'" , "height='145'");
//$sml_size = array("width='585'" , "height='295'" , "width='584'" , "height='145'");

// 重要なお知らせ
mb_language("Ja");
mb_internal_encoding("utf8");

try {
    $ini = parse_ini_file('../bin/pdo_wporjp.ini', FALSE);
    $tmpdb = new PDO($ini['dsn'], $ini['user'], $ini['password']);
    $tmpdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tmpdb->query('SET CHARACTER SET utf8');
    $tmpstt = $tmpdb->prepare("SELECT id, post_title, post_content FROM wp_posts, wp_term_relationships where wp_posts.id = wp_term_relationships.object_id and wp_term_relationships.term_taxonomy_id = 13 and post_status = 'publish' and post_date BETWEEN (NOW() - INTERVAL 2 WEEK) AND NOW() order by post_date desc limit 0,2");
    $tmpstt->execute();
    $idx = 0;
    $cur_id = '';
    $tmphtml = "";
    while($row = $tmpstt->fetch(PDO::FETCH_ASSOC)) {
        $idx++;
        $cur_id = $row['id'];
        $cur_title = $row['post_title'];
        $cur_content = $row['post_content'];
		$tmphtml .= '<p><a href="/ja/'.$cur_id.'"><img style="width: 9px;margin-right: 10px;position: relative;top: 2px;" src="/sp/images/arrow-sp.png" alt="PickUp">'.strip_tags($cur_title).'</a> </p>';
    }
    if ($tmphtml) {
        $wphtml .= $tmphtml;
    }
    $tmpdb = NULL;
} catch (PDOException $e) {
    echo ($e->getMessage());
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>日本ワーキング・ホリデー協会</title>
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow,archive">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/js/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/js/slick/slick-sptop.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/sp/css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/sp/css/style.css">
    <style>
        .snsb {
            overflow: hidden;
            width: 290px;
            margin: 0 auto;
        }
        .snsb li {
            float: left;
            margin-right: 4px;
        }
        .snsb .tweet {
            width: 110px;
        }
        .snsb .googleplusone {
            width: 60px;
        }
        .snsb iframe {
            margin: 0 !important;
        }
        .apslider{
			width:100%;
            margin: 0 auto;
        }
    </style>
    <style>
        a.jobboard:link{
            color:#000;
            text-decoration:none;
        }
        a.jobboard:visited{
            color:#000;
        }
        a.jobboard:hover{
            color:#666;
        }
        a.jobboard:active{
            color:#000;
        }
    </style>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/slick/slick.min.js"></script>

    <!-- ↓↓↓ 20140912追加 ↓↓↓ -->
    <link href="/css/base_mobile_extra.css" rel="stylesheet" type="text/css" />
    <!--script src="/js/google-analytics.js" type="text/javascript"></script-->
    <script src="/js/mobile-script.js?version=20180719" type="text/javascript"></script>
    <!-- ↑↑↑ 20140912追加 ↑↑↑ -->

    <script>
        $(function() {
            $('.apslider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                arrows: false
            });
        });
    </script>


    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


    <!--
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/blog/wp-content/themes/wpbootstrap/js/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/blogslider/slick.css" />
    <link rel="stylesheet" id="dynamic-css-css" href="/blog/wp-admin/admin-ajax.php?action=dynamic_css" type="text/css" media="all">
     -->
    <link rel="stylesheet" type="text/css" href="/css/blogslider/style.css" />

    <script type="text/javascript">
        $(document).ready(function() {
            $('#banner-blog-slider').slick({
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                pauseOnDotsHover: true,
                arrows: false
            });
        });
    </script>
	<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KKVVF9Q');</script>
	<!-- End Google Tag Manager -->
</head>

<body id="top">
<div id="fb-root"></div>
<script type="text/javascript">
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&amp;appId=158074594262625";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKVVF9Q"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="menu"></div>
<div class="wrapper mobile-wrapper">

    <!-- ↓↓↓ 20140912追加 ↓↓↓ -->
    <div id="header-box-new">
        <h1 id="header" class="header-new" style="color:white;font-size:7pt;padding-top:12px;">【&nbsp;ワーキングホリデーはワーホリ協会&nbsp;】<a href="/"><img src="/images/mobile/mobile-new-header.gif" class="responsive-img"></a></h1>
        <a href="/member/">
			<span  style="display: block;width: 68px;position: absolute;right: 5px;top: 9px;">
				<img src="/sp/images/btn-log.png" class="responsive-img">
			</span>
		</a>
		

	</div>
    <!-- ↑↑↑ 20140912追加 ↑↑↑ -->

    <!--
    <header>
      <a href="/"><h1>日本ワーキングホリデー協会</h1></a>
      <a class="login" href="/member/"><span>メンバーログイン</span></a>
    </header>
    -->
    <?php

    // The MAX_PATH below should point to the base of your OpenX installation
    define('MAX_PATH', '/var/www/html/ad');
    $big_banner = array();
    $sml_banner = array();
    if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
        if (!isset($phpAds_context)) {
            $phpAds_context = array();
        }

        $ids = array(219, 220, 159, 160, 161);
        //$ids = array(155, 151);
        foreach ($ids as $id) {
            //$phpAds_context = array();
            $phpAds_raw = view_local('', $id, 0, 0, '', '', '0', $phpAds_context, '');
            $phpAds_context[] = array('!=' => 'campaignid:'.$phpAds_raw['campaignid']);
            $phpAds_context[] = array('!=' => 'bannerid:'.$phpAds_raw['bannerid']);
            if (empty($phpAds_raw['html']) || $phpAds_raw['bannerid'] == 0) continue;
            $big_banner[] = str_replace($big_size, $sml_size, $phpAds_raw['html']);
        }
        $ids = array(156, 157, 158, 152, 153, 154);
        foreach ($ids as $id) {
            //$phpAds_context = array();
            $phpAds_raw = view_local('', $id, 0, 0, '', '', '0', $phpAds_context, '');
            $phpAds_context[] = array('!=' => 'campaignid:'.$phpAds_raw['campaignid']);
            $sml_banner[] = str_replace($big_size, $sml_size, $phpAds_raw['html']);
        }
    }

    ?>
    <div style="margin: 15px 15px 5px 15px;">

        <div class="apslider">
            <?php
            foreach ($big_banner as $big) {
                echo '<div>' . $big . '</div>';
            }
            ?>
        </div><!-- /.keyvisual -->
    </div>
	<?php if($wphtml) { ?>
		<div class="top-pickup" style="margin-top:30px;">
			<?php echo $wphtml;?>  
		</div>  
	<?php }?>
    <section class="topContents">
        <div class="mainBtn">
            <ul>
                <li><a href="/seminar"><img src="/sp/images/mn9.png"></a></li>

                <li><a href="/mem2/register.php"><img src="/sp/images/mn1.png"></a></li>
           
           
                <li><a href="/system.html"><img src="/sp/images/mn2.png"></a></li>
                <li><a href="/country/"><img src="/sp/images/mn3.png"></a></li>
            
            
                <li><a href="/start.html"><img src="/sp/images/mn5.png"></a></li>
                <li><a href="/katsuyou.html"><img src="/sp/images/mn6.png"></a></li>
            
            
                <li><a href="/qa.html"><img src="/sp/images/mn7.png"></a></li>
                <li><a href="/office/"><img src="/sp/images/mn8.png"></a></li>
            </ul>
        </div><!-- /.mainBtn -->
        <div>
            <a href="/seminar/ser/know/first"><img src="/sp/images/bnr_seminar.jpg"></a>
            <?php
            /*
        <a href="/seminar/seminar.php?num=7439#calendar_start"><img src="/sp/images/bnr_uk.jpg" alt="イギリスセミナー"></a>
        <a href="/seminar/seminar.php?num=6886#calendar_start"><img src="/sp/images/bnr_can.jpg" alt="カナダセミナー"></a>
            */
            ?>
        </div>
        <div class="smlBanner" style="margin-bottom: 20px;">
            <?php echo $sml_banner[0]; ?>
        </div>

        <section class="menuBox menu6">
            <h2><span>ワーキングホリデーNEWS</span></h2>
            <div class="hero-unit">
                <div id="banner-blog-slider" class="slider_main_div">
                    <?php
                    $options = array(
                        'http' => array(
                            'method' => 'GET',
                            'header' => 'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12A365 Safari/600.1.4',
                        ),
                    );
                    $context = stream_context_create($options);
					$url = 'https://www.jawhm.or.jp/blog/slider/';
					
                    echo file_get_contents($url, false, $context);
                    ?>
                </div>
            </div>
            <div style="display: block;">&nbsp;</div>
        </section>

        <div class="smlBanner" style="width:92%; margin-top:25px; margin-bottom:20px; font-size:10pt;">
			【ワーキングホリデーを知っていますか？】<br/>
			ワーキングホリデー制度とは、日本と協定を結んでいる国や地域の文化や一般的な生活様式を理解するため、その国に長期滞在する事ができる制度です。<br/>
			ワーキングホリデーは1つの国に対して1度しか使用する事ができませんが、滞在中に「観光」「就労」「就学」を自由に経験できるため、 キャリアアップやスキルアップのための「新しい留学のかたち」として注目を集めています。<br/>
			あなたもワーキングホリデーを通して、世界をより身近に感じて見ませんか？<br/>
        </div>

        <div class="smlBanner" style="margin-top:25px; margin-bottom:20px;">
            <?php echo $sml_banner[1]; ?>
        </div>
    </section>

    <section class="menuBox menu1">
        <h2><span>ワーキングホリデーについて知ろう</span></h2>
        <div>
            <a href="/system.html"><span>ワーキングホリデー制度について</span></a>
            <a href="/start.html"><span>ワーキングホリデーへの道</span></a>
        </div>
    </section>

    <section class="menuBox menu2">
        <h2><span>ワーキングホリデー協会を活用しよう</span></h2>
        <div>
            <a href="/katsuyou.html"><span>ワーホリ協会活用ガイド</span></a>
            <a href="/mem/"><span>ワーホリ成功のためのフルサポート</span></a>
        </div>
    </section>

    <section class="menuBox menu3">
        <h2 class="mgb15"><span>ワーキングホリデー協定国（ビザ情報）</span></h2>
        <ul class="visaMenu">
            <li><a href="/visa/v-aus.html"><img src="/sp/images/visa_aus.png" alt="オーストラリア"></a></li>
            <li><a href="/visa/v-can.html"><img src="/sp/images/visa_canada.png" alt="カナダ"></a></li>
            <li><a href="/visa/v-nz.html"><img src="/sp/images/visa_newz.png" alt="ニュージーランド"></a></li>
        </ul>
        <ul class="visaMenu">
            <li><a href="/visa/v-uk.html"><img src="/sp/images/visa_england.png" alt="イギリス"></a></li>
            <li><a href="/visa/v-ire.html"><img src="/sp/images/visa_eire.png" alt="アイルランド"></a></li>
            <li><a href="/visa/v-fra.html"><img src="/sp/images/visa_france.png" alt="フランス"></a></li>
        </ul>
        <ul class="visaMenu">
            <li><a href="/visa/v-deu.html"><img src="/sp/images/visa_deuts.png" alt="ドイツ"></a></li>
            <li><a href="/visa/v-dnk.html"><img src="/sp/images/visa_den.png" alt="デンマーク"></a></li>
            <li><a href="/visa/v-nor.html"><img src="/sp/images/visa_nor.png" alt="ノルウェー"></a></li>
        </ul>
        <ul class="visaMenu">
            <li><a href="/visa/v-kor.html"><img src="/sp/images/visa_korea.png" alt="韓国"></a></li>
            <li><a href="/visa/v-ywn.html"><img src="/sp/images/visa_taiwan.png" alt="台湾"></a></li>
            <li><a href="/visa/v-hkg.html"><img src="/sp/images/visa_hong.png" alt="香港"></a></li>
        </ul>
		 <ul class="visaMenu">
		    <li><a href="/visa/v-pol.html"><img src="/sp/images/visa_pol.png" alt="ポーランド"></a></li>
            <li><a href="/visa/v-prt.html"><img src="/sp/images/visa_por.png" alt="ポルトガル"></a></li>
            <li><a href="/visa/v-svk.html"><img src="/sp/images/visa_svk.png" alt="スロバキア"></a></li>
			
        </ul>
        <ul class="visaMenu">
            <li><a href="/visa/v-aut.html"><img src="/sp/images/visa_aut.png" alt="オーストリア"></a></li>
           <li><a href="/visa/v-hun.html"><img src="/sp/images/visa_hun.png" alt="ハンガリー"></a></li>
			<li><a href="/visa/v-esp.html"><img src="/sp/images/visa_esp.png" alt="スペイン"></a></li>
            
        </ul>
		<ul class="visaMenu">
			<li><a href="/visa/v-cze.html"><img src="/sp/images/visa_cze.png" alt="チェコ"></a></li>
			<li><a href="/visa/v-arg.html"><img src="/sp/images/visa_arg.png" alt="アルゼンチン"></a></li>
			<li><a href="/visa/v-chl.html"><img src="/sp/images/visa_chl.png" alt="チリ"></a></li>
			
        </ul>
        <ul class="visaMenu">
			<li><a href="/visa/v-isl.html"><img src="/sp/images/visa_isl.png" alt="アイスランド"></a></li>
			<li><a href="/visa/v-ltu.html"><img src="/sp/images/visa_ltu.png" alt="リトアニア"></a></li>
			<li><a href="/visa/v-swe.html"><img src="/sp/images/visa_swe.png" alt="スウェーデン"></a></li>
			
		</ul>
		<ul class="visaMenu">
			<li><a href="/visa/v-est.html"><img src="/sp/images/visa_est.png" alt="エストニア"></a></li>
			<li><a href="/visa/v-nld.html"><img src="/sp/images/visa_nld.png" alt="オランダ"></a></li>
			<li><a href="/country"><img src="/sp/images/visa_all.png" alt=""></a></li>
		</ul>
    </section>

    <div class="seminar mgb20">
        <a href="/seminar/seminar"><img src="/sp/images/bnr_seminar.png"></a>
    </div><!-- /.seminar -->
	
	<section class="menuBox menu4-a">
        <h2><span>留学について知りたい</span></h2>
        <div>
            <a href="/ryugaku/"><span>語学留学について</span></a>
            <a href="/ryugaku/ryugaku_hiyou.html"><span>語学留学の費用について</span></a>
            <a href="/ryugakusupport/"><span>留学のサポートについて</span></a>
        </div>
    </section>
	
    <section class="menuBox menu4">
        <h2><span>お役立ち情報</span></h2>
        <div>
            <a href="/info.html"><span>お役立ちリンク集</span></a>
            <a href="/school.html"><span>海外語学学校</span></a>
            <a href="/blog/"><span>ワーホリ＆留学ブログ</span></a>
        </div>
    </section>

    <section class="menuBox menu5">
        <h2><span>ワーキング・ホリデー協会について</span></h2>
        <div>
            <a href="/about.html"><span>日本ワーキング・ホリデー協会について</span></a>
            <a href="/ja/category/メディア掲載"><span>メディア掲載</span></a>
            <a href="/privacy.html"><span>個人情報の取扱</span></a>
            <a href="/about.html#deal"><span>特定商取引に関する表記</span></a>
        </div>
    </section>

    <div class="banArea mgb20">


        <div class="advbox03" style="width: 300px; margin: 0 auto; padding-bottom: 10px;">
            <?php
            // AIU2
            define('MAX_PATH', '/var/www/html/ad');
            if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                if (!isset($phpAds_context)) {
                    $phpAds_context = array();
                }
                // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                $phpAds_raw = view_local('', 97, 0, 0, '', '', '0', $phpAds_context, '');
            }
            echo $phpAds_raw['html'];
            // <a href=""><img class="mgb10" src="/sp/images/bnr_aiu.jpg" alt="AIUの海外留学保険"></a>
            // <br/><span style="font-size:8pt;">AIU保険会社のサイトへジャンプします</span>
            ?>

        </div>



        <div style="width: 214px; height: 160px; margin: 0 auto;">
            <?php
            // A01
            define('MAX_PATH', '/var/www/vhosts/jawhm.or.jp/httpdocs/ad');
            if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                if (!isset($phpAds_context)) {
                    $phpAds_context = array();
                }
                // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                $phpAds_raw = view_local('', 29, 0, 0, '', '', '0', $phpAds_context, '');
            }
            // $phpAds_raw['html'];
            echo $phpAds_raw['html'];
            // 		<a href=""><img class="cashBtn" src="/sp/images/bnr_cash.jpg" alt="海外専用外貨プリペイドカード"></a>
            ?>
        </div>


        <div class="smlBanner" style="margin-top:35px;">
            <!--<?php echo $sml_banner[2]; ?>-->
            <?php
            //ryugakusupport_sp

            // The MAX_PATH below should point to the base of your OpenX installation
            define('MAX_PATH', '/var/www/html/ad');
            if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                if (!isset($phpAds_context)) {
                    $phpAds_context = array();
                }
                // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                $phpAds_raw = view_local('', 188, 0, 0, '', '', '0', $phpAds_context, '');
            }
            echo $phpAds_raw['html'];
            ?>



        </div>

    </div>
    <footer>
        <div class="center">
            <form name="change_view" method="POST" action="/">
                <input type="hidden" name="pc" value="on">
                <a href="/">TOPにもどる</a> / <a href="javascript:void(0);" onclick="document.change_view.submit();">PC View</a>
            </form>
        </div>
    </footer>
	<div class="menumobile-home">
		<?php require_once("include/footer_mobile.php") ?>
	</div>
</div><!--/.wrapper-->
<!-- change url for homepage in SP -->
<script type="text/javascript">
    origin = window.location.origin;
    window.history.pushState("", "", origin);
</script>
<!--
<script type="text/javascript">
    //ページ内リンク、#非表示。スムーズスクロール
    $('a[href^=#]').click(function(){
        var speed = 800;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });

    function hide_banner(){
        var banner = $("#mem-banner");
        //alert("nfjgfjg");
        banner.hide();

        if (typeof(Storage) !== "undefined")
        {
            localStorage.memBanner = "hide";
            localStorage.memBannerTime = new Date().getTime() / 1000;
        }
        else
            console.log ( '#Browser does not support localStore' );
    }
        

    $("document").ready(function(){

        // check click "CLOSE bUTTON" or not!
        //checkCookieClick();
        var banner = $('.banner-rdirect');

        //localStorage.removeItem("memBanner");

        if (typeof(Storage) !== "undefined") {

            if(!localStorage.memBanner || localStorage.memBanner == "")
            {
                localStorage.memBanner = "begin";
            }
            else if(localStorage.memBanner && localStorage.memBanner == "begin")
            {
                localStorage.memBanner = "clicked";
            }
                
            
            if( (localStorage.memBanner && localStorage.memBanner == "hide") )
            {
                var timeNow = "";
                timeNow = new Date().getTime() / 1000;
                memBannerTime = localStorage.memBannerTime;

                if(timeNow - 24*60*60 < memBannerTime) // set 24h
                //if(timeNow - 30 < memBannerTime) // set 30s to testing
                {
                    banner.hide();
                }

            }
            else if( (localStorage.memBanner && localStorage.memBanner == "begin") )
            {
                banner.hide();
            }
            

            //console.log ( localStorage.memBanner );
            //console.log (localStorage.memBannerTime);
            //console.log (new Date().getTime() / 1000);
        }
        else
        {
            console.log ( '#Browser does not support localStore' );
        };


        // check scroll up
		/*
        $(window).scroll(function(){

            if ($(this).scrollTop() > 100) {
                $(".banner-rdirect h3").hide(300);
                $(".mem-button span").css("display","none");
                $(".banner-rdirect").css("background", "rgba(0, 0, 0, 0.6)");
                
                //animate
            } else {
                $(".banner-rdirect h3").show(300);
                $(".mem-button span").css("display","block");
                $(".banner-rdirect").css("background", "#000000");
            }

        });
		*/

    });

</script>

-->
</body>
</html>
