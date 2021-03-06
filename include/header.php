<?php @session_start();
if ($_SERVER["SERVER_PORT"] == 80) {
    header("location:" . "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit;
}
/**
 * Define MyClass
 */
/**
 * if( $_SERVER["SERVER_PORT"] != 443 ) {
 * header( "location:" . "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] );
 * exit;
 * }
 **/
error_reporting(0);

class Header
{
    //set variable - parameters

    public $title_page;    // title of the page
    public $description_page; // description meta
    public $keywords_page = 'ワーキングホリデー,ワーホリ,日本ワーキングホリデー協会,ワーホリ協会,留学,オーストラリア,ニュージーランド,カナダ,カナダ,韓国,フランス,ドイツ,イギリス,アイルランド,デンマーク,台湾,香港,学生,留学,ビザ,取得,方法,申請,手続き,渡航,外務省,厚生労働省,最新,ニュース,大使館';    // keywords meta by default

    public $no_cache = false;    //output no-cache meta
    public $add_js_files;    //add more javascript files or script
    public $add_css_files;    //add more css files
    public $add_style;        //add written css styles into the page

    public $size_content_page;            // set to 'big' to use bigger format such as seminar page
    public $no_standard_template = false;    // page without standard template, for example : use for video such as semi/index.php page (set false by default)

    public $fncMenuHead_imghtml;    // Top image of the page
    public $fncMenuHead_h1text = ''; // text to display on the top of the logo
    public $fncMenuHead_link = '';    // use link or not for the top of the page (set parameter to 'nolink' if needed)
    public $fncMenuHead_social_css = '';  //use add css position sosial_tool fb, twiter

    public $fncMenubar_function = true;    // display left bar on the page, set True by default
    public $fncMenubar_msg = '';            // display message on the bottom of the bar
    //		public $fncMenubar_advertisement = array(122,123,124,125,30,31); 	// advertisement to display
    // 【注意】
    // １件目：メンバー登録ページ、２件目以降：左サイドバー（TOPページはindex.html内で再定義）
    public $fncMenubar_advertisement = array(
        122,
        1,
        2,
        3,
        123,
        124,
        125,
        31
    );    // advertisement to display

    public $fncFacebookMeta_function = true;    // use facebookMeta function or not, set True by default

    public $frontpage = false;   //are we displaying the frontpage ?
    public $footer_type;         //footer type to display

    public $mobilepage = false;      //display mobile format
    public $mobileredirect = '';  //Redirection to special mobilepage if needed
    public $pcredirect = '';      //Redirection to some pc page;
    public $pcmobile_type = false; //Page displaying the same way either on pc or mobile device

    public $tablet_type = false;  //is using tablet

    public $debug_mobile_page = false;  //To be able to see mobile page on pc device

    public $onload; //body onload
    public $iscrollEvent; //Event for mobile device
    public $js_settings_beforeIscroll; //javascript settings before Iscroll settings
    public $is_school = false; //スクールページフラグ
    public $config = array();
    public $countries = array();

    public function __construct()
    {
        require_once($this->path());
        $this->config = require_once(PATH . 'include/common-cfg.php');
        $this->countries = $this->config['country'];
    }

    public function __destruct()
    {
    }

    public function display_header($menuDisplay = true)
    {


        /* ↓↓↓ 20140912追加 ↓↓↓ */

        require_once(PATH . 'include/menubar.php');
        //require_once (PATH.'include/menubar_temp.php');

        /* ↑↑↑ 20140912追加 ↑↑↑ */

        require_once(PATH . 'include/Mobile_Detect.php');

        $detect = new Mobile_Detect();

        //switch view pc/mobile
        if (isset($_POST['pc']))
            $_SESSION['pc'] = $_POST['pc'];

        //if the page allow different display
        //check device to display right page
        if (($this->computer_use() === false && $_SESSION['pc'] != 'on' && $this->pcmobile_type === false) || $this->debug_mobile_page) {
            $this->mobilepage = true;
            if ($this->footer_type == 'nolink')
                $this->footer_type = 'nolinkmobile';
            else
                $this->footer_type = 'mobile';

            if ($this->mobileredirect != '') {
                header('location:' . $this->mobileredirect);
                exit;
            }

            if ($detect->isTablet())
                $this->tablet_type = true;
        } elseif ($this->pcredirect != '' && !$this->debug_mobile_page) {
            header('location:' . $this->pcredirect);
            exit;
        }

        echo '<!DOCTYPE html><html lang="ja-en">
<head>';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

        if ($this->no_cache) {
            echo '<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT">
';
        }
        if ($this->fncFacebookMeta_function !== false && $this->mobilepage === false)
            fncFacebookMeta();

        echo '<title>' . $this->complete_page_title($this->title_page) . '</title>
<meta name="keywords" content="' . $this->keywords_page . '" />
<meta name="description" content="' . $this->description_page . '" />
<meta name="author" content="Japan Association for Working Holiday Makers" />
<meta name="dcterms.rightsHolder" content="Japan Association for Working Holiday Makers" />
<link href="mailto:info@jawhm.or.jp" rel="help" title="Information contact"  />
<link rel="Author" href="mailto:info@jawhm.or.jp" title="E-mail address" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="index" href="/index.html"  type="text/html" title="日本ワーキングホリデー協会" />';

        //display css files
        echo $this->add_css_files;

        /*** Use different css/js files  for mobile display and pc display ***/
        if ($this->mobilepage === false) {
            echo '<link href="/css/base.min.css?v=20201221" rel="stylesheet" type="text/css" />
                <link href="/css/headhootg-nav.css" rel="stylesheet" type="text/css" />
                <link href="/css/contents.min.css?v=20201221" rel="stylesheet" type="text/css" />';

            if ($this->size_content_page == 'big') {
                echo '<link href="/css/seminar-contents.css" rel="stylesheet" type="text/css" />
                <link href="/css/seminar-headhootg-nav.css" rel="stylesheet" type="text/css" />';
            }

            if (file_exists(PATH . 'css/menu.css')) {
                $menutime = filemtime(PATH . 'css/menu.css');
            } else {
                $menutime = 0;
            }

            echo '<link href="/css/menu.css?=' . $menutime . '" rel="stylesheet" type="text/css" />
            <link href="/js/feedback/contactable.css" rel="stylesheet" type="text/css" />';

            //check if another jquery.js file has been added, If yes, we don't use the one by default.
            $check_js_file = strpos($this->add_js_files, 'jquery.js');
            if ($check_js_file === false) {
                echo '<script src="/js/jquery-3.5.1.min.js" type="text/javascript"></script>' . PHP_EOL;
                //echo '<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>';
                echo '<script type="text/javascript" src="/js/target-blank.js"></script>';
            }
            echo '<script src="/js/jquery-easing.js" type="text/javascript"></script>';
            echo '<script src="/js/img-rollover.js" type="text/javascript"></script>';
            echo '<script src="/js/jquery_ready.js" type="text/javascript"></script>';
            if ($this->is_school === false) {    //スクールページでは読み込まない
                echo '<script src="/js/scroll.js?v=20190718" type="text/javascript"></script>';
            }
        } else {
            echo '
                <link href="/css/menu_mobile.css" rel="stylesheet" type="text/css" />
                <link href="/css/base_mobile.min.css" rel="stylesheet" type="text/css" />
				<link href="/css/system_mobile.css" rel="stylesheet" type="text/css" />
                <script src="/js/jquery.js" type="text/javascript"></script>
                <script src="/js/iscroll.js?v=20190718" type="text/javascript"></script>
				<script src="/js/jquery_ready.js" type="text/javascript"></script>

                <!-- ↓↓↓ 20140912追加 ↓↓↓ -->

                <link href="/css/base_mobile_extra.css" rel="stylesheet" type="text/css" />

                <!-- ↑↑↑ 20140912追加 ↑↑↑ -->


                <script type="text/javascript">

                    function fnc_logout()
                    {
                        if (confirm("ログアウトしますか？"))
                        {
                            location.href = "/member/logout.php";
                        }
                    }
                </script>
                ';
            if ($this->is_school === false) {
                echo '<script src="/js/mobile-script.js?version=20180719" type="text/javascript"></script>';
            } else {
                echo '<script src="/js/mobile-script-for-school.js" type="text/javascript"></script>';
            }
        }

        // Google Tag Manager
        echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-KKVVF9Q');</script>";
        // End Google Tag Manager

        //display js files
        echo $this->add_js_files;

        //Module calendar css
        echo '<link rel="stylesheet" href="/calendar_module/css/cal_module.css" />';
        if ($this->mobilepage !== false) //mobile css width for calendar module
            echo '<link rel="stylesheet" href="/calendar_module/css/cal_module_mobile.css" />';
        //style into page
        echo $this->add_style;

        if (!empty($this->onload)) {
            $body_onload = ' onload="' . $this->onload . '"';
        } else {
            $body_onload = '';
        }
        if (preg_match('/\/ja\//i', $_SERVER['REQUEST_URI'])) {
            wp_head();
        }
        echo '
</head>
<body' . $body_onload . '>
            ';

        //Google Tag Manager (noscript)
        echo "<noscript><iframe title='Google Tag Manager' src='https://www.googletagmanager.com/ns.html?id=GTM-KKVVF9Q' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>" . "\n";
        // End Google Tag Manager (noscript)

        //use standard template
        if ($this->no_standard_template === false) {
            if ($this->mobilepage === false) {
                fncMenuHead($this->fncMenuHead_imghtml, $this->fncMenuHead_h1text, $this->fncMenuHead_link, $this->fncMenuHead_social_css);

                echo '
                    <div id="contentsbox">
                        <div id="contentsbox-top">
                            <div id="contentsbox-top-left">
                                <div id="contentsbox-top-right"> </div>
                            </div>

                        </div>
                    ';
                if ($this->fncMenubar_function !== false) {
                    echo '
                        <div id="contents">';
                    fncMenubar($this->fncMenubar_msg, $this->fncMenubar_advertisement);
                } else
                    echo '
                        <div id="contentswide">';
            } else {


                /* ↓↓↓ 20140912修正 ↓↓↓ */

                echo '
                        <div id="contentsbox-new">
                        <div id="wrap-box-new">
                            <div id="contents-new">
                                <div id="switch-btn-new">';

                //display logout button
                if ($_SESSION['mem_id'] != '' && $_SESSION['mem_name'] != '' && $_SESSION['mem_level'] != -1) {
                    //                        echo'<div id="btn-logout"><input type="button" value="ログアウト" onClick="fnc_logout();"></div>';
                }
                echo '</div>
                        <div id="header-box-new">
                            <h1 id="header" class="header-new"><a href="/"><img src="/images/mobile/mobile-new-header.gif" class="responsive-img" alt="一般社団法人日本ワーキング・ホリデー協会"></a></h1>';
                if ($menuDisplay) {
                    echo '<a href="/member/">
                        <span style="display: block; width: 60px; position: absolute; right: 80px; top: 9px;">
                            <img src="/sp/images/btn-log.png" class="responsive-img" alt="logo">
                        </span>
                    </a><span id="mobile-globalmenu-btn"><img src="/images/mobile/mobile-globalmenu-btn.gif" class="responsive-img" alt="一般社団法人日本ワーキング・ホリデー協会"></span>';
                }
                echo '</div>';

                /* ↑↑↑ 20140912修正 ↑↑↑ */


                if ($this->frontpage)
                    fncMenubar($this->fncMenubar_msg, $this->fncMenubar_advertisement);
            }
        }
    }

    public function display_header_forblog()
    {
        require_once($this->path());
        require_once(PATH . 'include/menubar.php');
        require_once(PATH . 'include/Mobile_Detect.php');

        $detect = new Mobile_Detect();

        //switch view pc/mobile
        if (isset($_POST['pc']))
            $_SESSION['pc'] = $_POST['pc'];
        //if the page allow different display
        //check device to display right page
        if (($this->computer_use() === false && $_SESSION['pc'] != 'on' && $this->pcmobile_type === false) || $this->debug_mobile_page) {
            $this->mobilepage = true;
            if ($this->footer_type == 'nolink')
                $this->footer_type = 'nolinkmobile';
            else
                $this->footer_type = 'mobile';

            if ($this->mobileredirect != '') {
                header('location:' . $this->mobileredirect);
                exit;
            }

            if ($detect->isTablet())
                $this->tablet_type = true;
        } elseif ($this->pcredirect != '' && !$this->debug_mobile_page) {
            header('location:' . $this->pcredirect);
            exit;
        }

        echo '<!DOCTYPE html>
<head>';
        if ($this->mobilepage && $_SESSION['pc'] != 'on') //allow to see the fullpage while navigating in PCview on mobile device
            //				echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
            //				echo '<meta name="viewport" content="width=320, initial-scale=1, maximum-scale=3">';
            //            echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0" />';

            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
';

        if ($this->no_cache) {
            echo '<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT">
';
        }
        if ($this->fncFacebookMeta_function !== false && $this->mobilepage === false)
            fncFacebookMeta();

        echo '<title>' . $this->complete_page_title($this->title_page) . '</title>
<meta name="keywords" content="' . $this->keywords_page . '" />
<meta name="description" content="' . $this->description_page . '" />
<meta name="author" content="Japan Association for Working Holiday Makers" />
<meta name="dcterms.rightsHolder" content="Japan Association for Working Holiday Makers" />
<link href="mailto:info@jawhm.or.jp" rel="help" title="Information contact"  />
<link rel="Author" href="mailto:info@jawhm.or.jp" title="E-mail address" />
<link rel="index" href="/index.html"  type="text/html" title="日本ワーキングホリデー協会" />';

        //display css files
        echo $this->add_css_files;

        /*** Use different css/js files  for mobile display and pc display ***/
        if ($this->mobilepage === false) {
            echo '
<link href="/blog/css/base.css" rel="stylesheet" type="text/css" />
<link href="/css/headhootg-nav.css" rel="stylesheet" type="text/css" />
<link href="/blog/css/contents.css" rel="stylesheet" type="text/css" />
<link href="/blog/css/blog-style-new.css" rel="stylesheet" type="text/css" />
                ';

            if ($this->size_content_page == 'big') {
                echo '
<link href="/css/seminar-contents.css" rel="stylesheet" type="text/css" />
<link href="/css/seminar-headhootg-nav.css" rel="stylesheet" type="text/css" />';
            }

            echo '
<link href="/css/menu.css" rel="stylesheet" type="text/css" />
<link href="/js/feedback/contactable.css" rel="stylesheet" type="text/css" />';

            //				echo'
            //<script type="text/javascript" src="https://www.taglog.jp/taglog-aio.js"></script>
            //<script type="text/javascript">
            //	taglog.init("https://www.jawhm.or.jp/");
            //	taglog.loadingTimeMonitor.start();
            //</script>';

            //check if another jquery.js file has been added, If yes, we don't use the one by default.
            $check_js_file = strpos($this->add_js_files, 'jquery.js');
            if ($check_js_file === false) {
                echo '
<script src="/js/jquery.js" type="text/javascript"></script>';
            }

            echo '
<script src="/js/jquery-easing.js" type="text/javascript"></script>
<script src="/js/scroll.js?v=20190718" type="text/javascript"></script>
<script src="/js/img-rollover.js" type="text/javascript"></script>

';
        } else {

            echo '
                <link href="/css/menu_mobile.css" rel="stylesheet" type="text/css" />
                <link href="/css/base_mobile.min.css" rel="stylesheet" type="text/css" />
                <script src="/js/jquery.js" type="text/javascript"></script>
                <script src="/js/iscroll.js?v=20190718" type="text/javascript"></script>
				
                ' . $this->js_settings_beforeIscroll . '';
        }

        // echo '<script src="/js/google-analytics.js" type="text/javascript"></script>';

        //display js files
        echo $this->add_js_files;

        //style into page
        echo $this->add_style;

        if (!empty($this->onload)) {
            $body_onload = ' onload="' . $this->onload . '"';
        } else {
            $body_onload = '';
        }
        if ($this->mobilepage) {
            //echo '<script type="text/javascript" src="https://www.taglog.jp/www.jawhm.or.jp/taglog-x.js" async></script>';
        }
        if (preg_match('/\/ja\//i', $_SERVER['REQUEST_URI'])) {
            wp_head();
        }
        echo '
</head>
<body' . $body_onload . '>
            ';

        //use standard template
        if ($this->no_standard_template === false) {
            if ($this->mobilepage === false) {
                echo '
                        <div id="header" class="header-new">
                            <div id="header_left" class="header-left-new">
                                <h1 id="logotext" style="color:#666666;">' . $this->fncMenuHead_h1text . '</h1>
                                <div id="topimg" style="height:30px;">
                                    <a href="/" title="一般社団法人日本ワーキング・ホリデー協会">
                                        <img src="/blog/images/titile.gif" alt="日本ワーキングホリデー協会" />
                                    </a>
                                </div>
                            </div>
                            <div id="area-blog-globalmenu">
                                <div id="area-blog-globalmenu-inner">
                                    <ul id="blog-globalmenu-list" class="clearfix">
                                        <li id="blog-globalmenu-list-01"><a href="/system.html">ワーキングホリデー制度について</a></li>
                                        <li id="blog-globalmenu-list-02"><a href="/start.html">はじめてのワーホリ</a></li>
                                        <li id="blog-globalmenu-list-03"><a href="/seminar/seminar">無料セミナー</a></li>
                                        <li id="blog-globalmenu-list-04"><a href="/blog/tag/">タグで探す</a></li>
                                        <li id="blog-globalmenu-list-05"><a href="/blog/whstory/">ワーホリストーリー</a></li>
                                        <li id="blog-globalmenu-list-06"><a href="https://jp.surveymonkey.com/s/697P9XM" target="_blank">アンケート</a></li>
                                        <li id="blog-globalmenu-list-07"><a href="/blog/">ブログトップ</a></li>
                                    </ul>
                                </div>
                            </div>
                ';
            } else {
                echo '
                        <div id="header">
                            <div id="header_left">
                                <h1 id="logotext" style="color:#666666;">' . $this->fncMenuHead_h1text . '</h1>
                                <div id="topimg" style="height:30px;">
                                    <a rel="external" href="/" title="一般社団法人日本ワーキング・ホリデー協会">
                                        <img src="/blog/images/titile.gif" alt="日本ワーキングホリデー協会" width="300px;" />
                                    </a>
                                </div>
                            </div>
                ';
            }
        }
    }

    //is using computer
    //--------------------------
    public function computer_use()
    {
        require_once($this->path());
        $target = "";
        $ua = $_SERVER['HTTP_USER_AGENT'];
        if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'iPod') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
            // スマートフォンからアクセスされた場合
            $target = "sp";
        } elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
            // タブレットからアクセスされた場合
            $target = "tab";
        } else {
            // その他（PC）からアクセスされた場合
            $target = "pc";
        }
        //which device?
        //require_once(PATH.'include/Mobile_Detect.php');
        //$detect = new Mobile_Detect();
        //if ($detect->isMobile() || $detect->isTablet())
        if ($target == "sp")
            return false;
        else
            return true;
    }

    //Set the entire page title
    //-------------------------
    public function complete_page_title($title)
    {
        //if frontpage or no title has been set
        if ($this->frontpage || $title == '') {
            $full_title = '日本ワーキング・ホリデー協会（ワーホリ)| 年2万人超のセミナー来場者数';
        } else {
            $full_title = $title . ' | 日本ワーキング・ホリデー協会';
        }

        return $full_title;
    }

    //set breadcrumbs
    //----------------
    public function breadcrumbs($parent = '', $parents_children = '')
    {

        //first parent list
        $list_parent = array(
            'qa'         => '<a href="qa.html" title="">よくある質問</a>',
            '../qa'      => '<a href="../qa.html" title="">よくある質問</a>',
            'start'      => '<a href="start.html" title="">はじめてのワーキング・ホリデー</a>',
            'about'      => '<a href="../about.html" title="">一般社団法人 日本ワーキング・ホリデー協会について</a>',
            'event'      => '<a href="../event.html" title="">イベントカレンダー</a>',
            'member-top' => '<a href="./top.php" title="">メンバー専用ページトップ</a>',
            'recruit'    => '<a href="index.html" title="">求人・求職情報サイト</a>',
            'return'     => '帰国者の方へ',
            'ryugaku'    => '<a href="/ryugaku/" title="">語学留学</a>',
            'visa'       => '<a href="visa_top.html" title="">ワーキングホリデー協定国ビザ情報</a>',
            'school'     => '<a href="/school.html" title="">語学学校（海外・国内）</a>',
            'country'    => '<a href="/country" title="">ワーキングホリデーで行ける国</a>',
            'access'     => '<a href="/office/">ワーホリ協会の各オフィス</a>',
        );
        //second parent list or 'parent's children'
        $list_second_parent = array(
            'school-aus'   => $list_parent[$parent] . '&nbsp;&gt;&nbsp;<a href="../aus.html">オーストラリアの学校</a>',
            'school-can'   => $list_parent[$parent] . '&nbsp;&gt;&nbsp;<a href="../can.html">カナダの学校</a>',
            'school-nz'    => $list_parent[$parent] . '&nbsp;&gt;&nbsp;<a href="../nz.html">ニュージーランドの学校</a>',
            'school-ww'    => $list_parent[$parent] . '&nbsp;&gt;&nbsp;<a href="../worldwide.html">ワールドワイドの学校</a>',
            'school-voice' => $list_parent[$parent] . '&nbsp;&gt;&nbsp;<a href="../">留学経験者からの声</a>',
            'v-aus'        => $list_parent[$parent] . '&nbsp;&gt;&nbsp;<a href="v-aus.html">オーストラリアビザ情報</a>',
            'v-can'        => $list_parent[$parent] . '&nbsp;&gt;&nbsp;<a href="v-can.html">カナダビザ情報</a>',
            'v-nz'         => $list_parent[$parent] . '&nbsp;&gt;&nbsp;<a href="v-nz.html">ニュージーランドビザ情報</a>',
        );

        //if frontpage
        if ($this->frontpage) {
            $breadcrumbs_path = '<div id="topic-path">ワーキングホリデー（ワーホリ協会）</div>';
        } else {
            $breadcrumbs_path = '<p id="topicpath"><a href="/">ワーキングホリデー（ワーホリ協会）</a>';
            $texthome = '<a href="/" target="_self">ワーキングホリデー（ワーホリ協会）</a>';

            /*get url */
            $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            $button_logout = (!empty($_SESSION['mem_id']) && $parts['path'] == '/member/top.php' && $_SESSION['mem_name'] != '') ? '<div id="logout-btn"><input type="button" value="　ログアウト　" onClick="fnc_logout();"></div>' : '';
            $breadcrumbs_path = '<div id="topic-path"><div id="text-home">' . $texthome;
            if ($parent != '') {
                $breadcrumbs_path .= '&nbsp;&gt;&nbsp;' . $list_parent[$parent] . '&nbsp;&gt;&nbsp;' . $this->title_page . '</div>' . $button_logout . '</div>';
                //                if ($parent2 != '') {
                //                    $breadcrumbs_path .= '&nbsp;&gt;&nbsp;' . $list_second_parent[$parents_children] . '&nbsp;&gt;&nbsp;' . $this->title_page . '</div>' . $button_logout . '</div>';
                //                } else {
                //                    $breadcrumbs_path .= '&nbsp;&gt;&nbsp;' . $list_parent[$parent] . '&nbsp;&gt;&nbsp;' . $this->title_page . '</div>' . $button_logout . '</div>';
                //                }
            } else {
                $breadcrumbs_path .= '&nbsp;&gt;&nbsp;' . $this->title_page . '</div>' . $button_logout . '</div>';
            }
        }

        //add btn set
        if (($this->computer_use() === false && $_SESSION['pc'] != 'on' && $this->pcmobile_type === false) || $this->debug_mobile_page) {

            if ($_SERVER["REQUEST_URI"] != '/seminar/ser-form.php') {
                $btn_set = '<div class="headBtn">';
                $btn_set .= '<a class="left" href="/seminar"><span>セミナー予約</span></a>';
                if (empty($_SESSION['mem_id'])) {
                    $btn_set .= '<a class="right" href="/mem2/register.php"><span>メンバー登録</span></a>';
                } else {
                    $btn_set .= '<a class="right-membertop" target="_self" href="/member/top.php"> <span> メンバー登録 <span></a>';
                }
                $btn_set .= '</div>';
                $breadcrumbs_path .= $btn_set;
            }
        }


        return $breadcrumbs_path;
    }

    function display_visa_links()
    {
        if ($this->countries) :
            echo '<div class="visa-nav"><p>';
            foreach ($this->countries as $key => $v) :

?>

                /<a href="<?php echo $v['visa_link']; ?>"><?php echo $v['jp_name']; ?></a>

<?php
            endforeach;
            echo '</p></div>';
        endif;
    }



    //get the right path for all the links
    //------------------------------------
    private function path()
    {
        $path = 'path.php';

        //search file location
        //while files still not exit go parent folder by adding '../'
        while (!file_exists($path)) {
            $path = '../' . $path;
        }

        return $path;
    }

    function is_mobile()
    {
        $useragents = array(
            'iPhone',
            // Apple iPhone
            'iPod',
            // Apple iPod touch
            'iPad',
            // Apple iPad touch
            'Android',
            // 1.5+ Android
            'dream',
            // Pre 1.5 Android
            'CUPCAKE',
            // 1.5+ Android
            'blackberry9500',
            // Storm
            'blackberry9530',
            // Storm
            'blackberry9520',
            // Storm v2
            'blackberry9550',
            // Storm v2
            'blackberry9800',
            // Torch
            'webOS',
            // Palm Pre Experimental
            'incognito',
            // Other iPhone browser
            'webmate'
            // Other iPhone browser
        );

        $pattern = '/' . implode('|', $useragents) . '/i';
        return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
    }


    //Display New Header best for SEO
    public function display_header_2($menuDisplay = true)
    {
        require_once(PATH . 'include/menubar.php');
        require_once(PATH . 'include/Mobile_Detect.php');
        $detect = new Mobile_Detect();
        //switch view pc/mobile
        if (isset($_POST['pc']))
            $_SESSION['pc'] = $_POST['pc'];

        //if the page allow different display
        //check device to display right page
        if (($this->computer_use() === false && $_SESSION['pc'] != 'on' && $this->pcmobile_type === false) || $this->debug_mobile_page) {
            $this->mobilepage = true;
            if ($this->footer_type == 'nolink')
                $this->footer_type = 'nolinkmobile';
            else
                $this->footer_type = 'mobile';

            if ($this->mobileredirect != '') {
                header('location:' . $this->mobileredirect);
                exit;
            }

            if ($detect->isTablet())
                $this->tablet_type = true;
        } elseif ($this->pcredirect != '' && !$this->debug_mobile_page) {
            header('location:' . $this->pcredirect);
            exit;
        }

        echo '<!DOCTYPE html><html lang="ja-en">
<head>';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

        if ($this->no_cache) {
            echo '<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT">
';
        }
        if ($this->fncFacebookMeta_function !== false && $this->mobilepage === false)
            fncFacebookMeta();

        echo '<title>' . $this->complete_page_title($this->title_page) . '</title>
<meta name="keywords" content="' . $this->keywords_page . '" />
<meta name="description" content="' . $this->description_page . '" />
<meta name="author" content="Japan Association for Working Holiday Makers" />
<meta name="dcterms.rightsHolder" content="Japan Association for Working Holiday Makers" />
<link href="mailto:info@jawhm.or.jp" rel="help" title="Information contact"  />
<link rel="Author" href="mailto:info@jawhm.or.jp" title="E-mail address" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="index" href="/index.html"  type="text/html" title="日本ワーキングホリデー協会" />';

        //display css files
        echo $this->add_css_files;

        /*** Use different css/js files  for mobile display and pc display ***/
        if ($this->mobilepage === false) {
            echo '<link href="/css/base.min.css?v=20201221" rel="stylesheet" type="text/css" />
                <link href="/css/headhootg-nav.css" rel="stylesheet" type="text/css" />
                <link href="/css/contents.min.css?v=20201221" rel="stylesheet" type="text/css" />';

            if ($this->size_content_page == 'big') {
                echo '<link href="/css/seminar-contents.css" rel="stylesheet" type="text/css" />
                <link href="/css/seminar-headhootg-nav.css" rel="stylesheet" type="text/css" />';
            }

            if (file_exists(PATH . 'css/menu.css')) {
                $menutime = filemtime(PATH . 'css/menu.css');
            } else {
                $menutime = 0;
            }

            echo '<link href="/css/menu.css?=' . $menutime . '" rel="stylesheet" type="text/css" />
            <link href="/js/feedback/contactable.css" rel="stylesheet" type="text/css" />';
        } else {
            echo '
                <link href="/css/menu_mobile.css" rel="stylesheet" type="text/css" />
                <link href="/css/base_mobile.min.css" rel="stylesheet" type="text/css" />
				<link href="/css/system_mobile.css" rel="stylesheet" type="text/css" />
                <link href="/css/base_mobile_extra.css" rel="stylesheet" type="text/css" />
                ';
        }

        //Module calendar css
        echo '<link rel="stylesheet" href="/calendar_module/css/cal_module.css" />';
        if ($this->mobilepage !== false) //mobile css width for calendar module
            echo '<link rel="stylesheet" href="/calendar_module/css/cal_module_mobile.css" />';
        //style into page
        echo $this->add_style;

        if (!empty($this->onload)) {
            $body_onload = ' onload="' . $this->onload . '"';
        } else {
            $body_onload = '';
        }
        if (preg_match('/\/ja\//i', $_SERVER['REQUEST_URI'])) {
            wp_head();
        }

        // Google Tag Manager
        echo PHP_EOL . "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-KKVVF9Q');</script>"  . PHP_EOL;
        // End Google Tag Manager

        echo '
</head>
<body' . $body_onload . '>
            ';

        //Google Tag Manager (noscript)
        echo "<noscript><iframe title='Google Tag Manager' src='https://www.googletagmanager.com/ns.html?id=GTM-KKVVF9Q' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>" . "\n";
        // End Google Tag Manager (noscript)

        //use standard template
        if ($this->no_standard_template === false) {
            if ($this->mobilepage === false) {
                fncMenuHead($this->fncMenuHead_imghtml, $this->fncMenuHead_h1text, $this->fncMenuHead_link, $this->fncMenuHead_social_css);

                echo '
                    <div id="contentsbox">
                        <div id="contentsbox-top">
                            <div id="contentsbox-top-left">
                                <div id="contentsbox-top-right"> </div>
                            </div>

                        </div>
                    ';

                if ($this->fncMenubar_function !== false) {
                    echo '
                        <div id="contents">';
                    fncMenubar($this->fncMenubar_msg, $this->fncMenubar_advertisement);
                } else
                    echo '
                        <div id="contentswide">';
            } else {
                echo '
                        <div id="contentsbox-new">
                        <div id="wrap-box-new">
                            <div id="contents-new">
                                <div id="switch-btn-new">';

                //display logout button
                if ($_SESSION['mem_id'] != '' && $_SESSION['mem_name'] != '' && $_SESSION['mem_level'] != -1) {
                    //                        echo'<div id="btn-logout"><input type="button" value="ログアウト" onClick="fnc_logout();"></div>';
                }
                echo '</div>
                        <div id="header-box-new">
                            <h1 id="header" class="header-new"><a href="/"><img src="/images/mobile/mobile-new-header.gif" class="responsive-img" alt="一般社団法人日本ワーキング・ホリデー協会"></a></h1>';
                if ($menuDisplay) {
                    echo '<a href="/member/">
                        <span style="display: block; width: 60px; position: absolute; right: 80px; top: 9px;">
                            <img src="/sp/images/btn-log.png" class="responsive-img" alt="logo">
                        </span>
                    </a><span id="mobile-globalmenu-btn"><img src="/images/mobile/mobile-globalmenu-btn.gif" class="responsive-img" alt="一般社団法人日本ワーキング・ホリデー協会"></span>';
                }
                echo '</div>';

                if ($this->frontpage)
                    fncMenubar($this->fncMenubar_msg, $this->fncMenubar_advertisement);
            }
        }
    }

    public function display_script()
    {
        require_once(PATH . 'include/menubar.php');

        if ($this->mobilepage === false) {
            //check if another jquery.js file has been added, If yes, we don't use the one by default.
            $check_js_file = strpos($this->add_js_files, 'jquery.js');
            if ($check_js_file === false) {
                echo '<script src="/js/jquery-3.5.1.min.js" type="text/javascript"></script>' . PHP_EOL;
                //echo '<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>' . PHP_EOL ;
                echo '<script type="text/javascript" src="/js/target-blank.js" defer></script>' . PHP_EOL;
            }
            echo '<script src="/js/jquery-easing.js" type="text/javascript" defer></script>' . PHP_EOL;
            echo '<script src="/js/img-rollover.js" type="text/javascript" defer></script>' . PHP_EOL;
            echo '<script src="/js/jquery_ready.js" type="text/javascript" defer></script>' . PHP_EOL;
            echo '<script src="/js/lazysizes.min.js" type="text/javascript" async=""></script>' . PHP_EOL;
            if ($this->is_school === false) {    //スクールページでは読み込まない
                echo '<script src="/js/scroll.js?v=20190718" type="text/javascript" defer></script>' . PHP_EOL;
            }
        } else {
            echo '<script src="/js/jquery.js" type="text/javascript"></script>' . PHP_EOL;
            echo '<script src="/js/iscroll.js?v=20190718" type="text/javascript"></script>' . PHP_EOL;
            echo '<script src="/js/jquery_ready.js" type="text/javascript"></script>' . PHP_EOL;
            echo '<script src="/js/lazysizes.min.js" type="text/javascript" async=""></script>' . PHP_EOL;
            echo '<script type="text/javascript">
                    function fnc_logout()
                    {
                        if (confirm("ログアウトしますか？"))
                        {
                            location.href = "/member/logout.php";
                        }
                    }
                </script>
                ' . PHP_EOL;
            if ($this->is_school === false) {
                echo '<script src="/js/mobile-script.js?version=20180719" type="text/javascript"></script>' . PHP_EOL;
            } else {
                echo '<script src="/js/mobile-script-for-school.js" type="text/javascript"></script>' . PHP_EOL;
            }
        }

        fncScriptFooter();
        //display js files
        echo $this->add_js_files;
    }
}

?>