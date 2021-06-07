<?php
$redirection = '/m-index.php';

// If access with SSL(443) , Redirect Non-SSL page.
if ($_SERVER["SERVER_PORT"] == 80) {
    header("location:" . "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit;
}

require_once 'include/header.php';

$header_obj = new Header();

$header_obj->frontpage = true;
//$header_obj->title_page="日本ワーキング・ホリデー協会（ワーホリ) | 年2万人超のセミナー来場者数";
$header_obj->description_page = 'ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。年間25,000人以上の方に、セミナーに参加頂いています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。ワーホリなら日本ワーキングホリデー協会';
$header_obj->fncFacebookMeta_function = true;

$header_obj->mobileredirect = $redirection;

$header_obj->add_js_files = '
<script src="/js/fbwall/jquery.neosmart.fb.wall.js" type="text/javascript"></script>
<script src="https://www.google.com/jsapi?key=ABQIAAAA1GaXyTxfx_EDrRX444NPQhQ3fj4XOcTTnvyZdGafpHojXl1fMRSD3wXKQgd9LOOX8nS2J9CjTLfu7A" type="text/javascript"></script>
<script src="/js/top.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery.timers.js"></script>
<script type="text/javascript" src="/feedback/incfb/fbcomment.js"></script>
';
$header_obj->add_css_files = '<link href="/css/country-menu.css" rel="stylesheet" type="text/css" />
<link href="/js/fbwall/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/>
<meta name="twitter:card" content="summary" >
<meta name="twitter:site" content="@Bamukun_JAWHM" >
<meta name="twitter:creator" content="@Bamukun_JAWHM" >
<meta name="twitter:title" content="一般社団法人　日本ワーキング・ホリデー協会は、皆さんのワーホリと留学を応援します！" >
<meta name="twitter:description" content="ワーキングホリデーは、働きながら留学できる画期的な制度です。世界各国の、様々な文化や価値観を持つ人々と交流することで、語学だけではなく、今までになかった新しい価値観を見出すことが出来るでしょう。" >
<meta name="twitter:image" content="https://www.jawhm.or.jp/images/jawhm-twittercard.png" >
';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="一般社団法人日本ワーキングホリデー協会" width="970" height="170" />
<div style="position:absolute; top:154px; left:600px;">
    <a href="/seminar"><img src="/images/menu/seminar_top_off.png" alt="無料セミナー毎日開催" /></a>
</div>';
$header_obj->fncMenuHead_h1text = '日本ワーキング・ホリデー協会　皆さんのワーキングホリデー（ワーホリ）と留学を応援します';
$header_obj->fncMenubar_msg = '
<div style="background:navy; color:white; font-size:10pt; margin:55px 5px 0 12px; padding:5px 8px 5px 8px;">「ワーホリ協会」について</div>
<div style="border:1px #CCCCCC solid; margin:0 5px 0 12px; padding:10px 8px 10px 8px;">
    <p>　「日本ワーキングホリデー協会」ならびに「ワーホリ協会」は、当、一般社団法人日本ワーキング・ホリデー協会の登録商標です。</p>
</div>
<div style="background:navy; color:white; font-size:10pt; margin:55px 5px 0 12px; padding:5px 8px 5px 8px;">協会からのお知らせ</div>
<div style="border:1px #CCCCCC solid; margin:0 5px 0 12px; padding:10px 8px 10px 8px;">
    <p>　一般社団法人日本ワーキング・ホリデー協会は政府のワーキングホリデー（ワーホリ）ビザ制度の政策に呼応してワーキング・ホリデー制度振興と利用促進により国際交 流の振興を図っています。<br />
    相互理解の促進及び国際感覚豊かな勤労青少年の育成に資することを目的としています。</p>
    <p>　その為、ワーキングホリデー（ワーホリ）ビザ制度を利用する方のサポートを積極的に行いマルチカルチュアルな海外での生活を通じて国際相互理解、地球環境の保全、男女共同参画社会、人種・性別等による差別や偏見の根絶、思想・信教・ 表現の自由の尊重等の理解を促進し、豊かな人間性を滋養していきます。</p>
    <p>　また経験を生かした若者たちが帰国後に、よりよい未来を作ることができる国際人を育てていくと同時に、来日するワーキングホリデー（ワーホリ）外国人のサポートと来日外国人をもっと増やし日本の観光業の振興を目的に資するためのサポートを行っています。</p>
    <p>　なお、当協会と旧社団法人日本ワーキング・ホリデー協会は異なる団体となります。</p>
</div>
';

$header_obj->fncMenubar_advertisement = array(122, 1, 2, 3, 31);
$header_obj->display_header_2();
?>

<div id="maincontent">
    <div id="top-main">
        <?php echo $header_obj->breadcrumbs(); ?>

        <div class="top-sec01">
            <?php
            $big_size = array("width='585'", "height='295'", "width='584'", "height='145'");
            $sml_size = array("width='260'", "height='131'", "width='165'", "height='41'");
            ?>

            <!-- AD01 -->
            <div style="float:left; width: 258px;">
                <?php
                // The MAX_PATH below should point to the base of your OpenX installation
                define('MAX_PATH_AD', '/var/www/html/ad');
                if (@include_once(MAX_PATH_AD . '/www/delivery/alocal.php')) {
                    if (!isset($phpAds_context)) {
                        $phpAds_context = array();
                    }
                    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                    $phpAds_raw = view_local('', 155, 0, 0, '', '', '0', $phpAds_context, '');
                    $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
                }
                echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
                ?>
            </div>

            <!-- AD02 -->
            <div style="float: right; width: 167px; margin-bottom: 4px;">
                <?php
                if (@include_once(MAX_PATH_AD . '/www/delivery/alocal.php')) {
                    if (!isset($phpAds_context)) {
                        $phpAds_context = array();
                    }
                    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                    $phpAds_raw = view_local('', 156, 0, 0, '', '', '0', $phpAds_context, '');
                    $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
                }
                echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
                ?>
            </div>

            <!-- AD03 -->
            <div style="float: right; width: 167px;  margin-bottom: 4px;">
                <?php
                // The MAX_PATH below should point to the base of your OpenX installation
                if (@include_once(MAX_PATH_AD . '/www/delivery/alocal.php')) {
                    if (!isset($phpAds_context)) {
                        $phpAds_context = array();
                    }
                    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                    $phpAds_raw = view_local('', 157, 0, 0, '', '', '0', $phpAds_context, '');
                    $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
                }
                echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
                ?>
            </div>

            <!-- AD04 -->
            <div style="float: right; width: 167px;">
                <?php
                // The MAX_PATH below should point to the base of your OpenX installation
                if (@include_once(MAX_PATH_AD . '/www/delivery/alocal.php')) {
                    if (!isset($phpAds_context)) {
                        $phpAds_context = array();
                    }
                    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                    $phpAds_raw = view_local('', 158, 0, 0, '', '', '0', $phpAds_context, '');
                    $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
                }
                echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
                ?>
            </div>

            <div class="top-sec01" style="margin-top:-10px;">
                <h2><img src="/images/top-sec-h2-02.gif" alt="ワーキングホリデーニュース" /></h2>
                <div id="feed">
                    <?php
                    ini_set("display_errors", "On");
                    mb_language("Ja");
                    mb_internal_encoding("utf8");

                    try {
                        $ini = parse_ini_file('../bin/pdo_wporjp.ini', FALSE);
                        $tmpdb = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                        $tmpdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $tmpdb->query('SET CHARACTER SET utf8');
                        $tmpstt = $tmpdb->prepare("SELECT id, post_title, post_content FROM wp_posts, wp_term_relationships where wp_posts.id = wp_term_relationships.object_id and wp_term_relationships.term_taxonomy_id = 5 and post_status = 'publish' order by post_date desc limit 0,3");
                        $tmpstt->execute();
                        $idx = 0;
                        $cur_id = '';
                        while ($row = $tmpstt->fetch(PDO::FETCH_ASSOC)) {
                            $idx++;
                            $cur_id = $row['id'];
                            $cur_title = $row['post_title'];
                            $cur_content = $row['post_content'];

                            if ($idx == 1) {
                                echo '<div class="top-pickup" style="margin-top:0px;">';
                            } else {
                                echo '<div class="top-pickup">';
                            }
                            echo '<p><img src="images/arrow030' . rand(2, 9) . '.gif" alt="PickUp">　<a href="/ja/' . $cur_id . '">' . strip_tags($cur_title) . '</a></p>';
                            echo '<p>' . mb_substr(preg_replace('/(\s|　)/', '', strip_tags($cur_content)), 0, 100) . '... [<a href="/ja/' . $cur_id . '">続き</a>]</p>';
                            echo '</div>';
                        }
                        $tmpdb = NULL;
                    } catch (PDOException $e) {
                        echo ($e->getMessage());
                    }
                    ?>
                </div>

                <div style="text-align:right; font-size:9pt; margin:0 0 0 0; padding: 6px 10px 0 0;">
                    <a href="/ja/">過去のお知らせはこちらからどうぞ</a>
                </div>

                <div class="off-work">
                    <div class="title-offday">
                        <img src="/images/index/stiker.jpg" alt="">
                        <p>はじめての方は是非読みたい！</p>
                        <span>ワーキングホリデー人気コンテンツ</span>
                    </div>
                    <div class="content-offday">
                        <a href="/start.html" class="sec01">
                            <div class="title-sec01">
                                <span>
                                    <p>その１</p>はじめてのワーキングホリデー
                                </span>
                                <img src="/images/index/arrow.png" alt="">
                            </div>
                            <div class="content-sec01">
                                <p>はじめての方はまずここから！ワーキングホリデーの準備から帰国後のことまで、ここを読めば全てが分かる！</p>
                            </div>
                        </a>
                        <a href="/system.html" class="sec01">
                            <div class="title-sec01">
                                <span>
                                    <p>その２</p>ワーキングホリデー制度について
                                </span>
                                <img src="/images/index/arrow.png" alt="">
                            </div>
                            <div class="content-sec01">
                                <p>ワーキングホリデーってそもそも何？興味はあるけど詳しくは分からない。そんな方はこちら。制度のことや手続きのことなどを詳しく解説！</p>
                            </div>
                        </a>
                        <a href="/ryugaku/ryugaku_hiyou.html" class="sec01">
                            <div class="title-sec01">
                                <span>
                                    <p>その3</p>語学留学費用について
                                </span>
                                <img src="/images/index/arrow.png" alt="">
                            </div>
                            <div class="sec01_01">
                                <div class="content-sec01">
                                    <p class="">語学学校の費用は期間によって異なり、国によっても制度の違いから費用も変わってきます。<br />語学留学費用を安くする為のヒントを紹介します。</p>
                                </div>
                            </div>
                        </a>
                        <a href="/qa.html" class="sec01">
                            <div class="title-sec01">
                                <span>
                                    <p>その４</p>よくある質問
                                </span>
                                <img src="/images/index/arrow.png" alt="">
                            </div>
                            <div class="content-sec01">
                                <p>協定国のこと、制度のこと、ビザのこと、わからないことがあったらまずはここを見てみて♪みなさんの疑問を解決します。</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="section02">
                    <div class="title-section02">
                        <img src="/images/index/title02.png" alt="">
                        <span>ワーキングホリデーをご存知ですか？</span>
                    </div>
                    <div class="content-section02" style="font-size:+2;">
                        ワーキングホリデー制度とは、日本と協定を結んでいる国や地域の文化や一般的な生活様式を理解するため、その国に長期滞在する事ができる制度です。<br />
                        &nbsp;<br />
                        ワーキングホリデーは1つの国に対して1度しか使用する事ができませんが、滞在中に「観光」「就労」「就学」を自由に経験できるため、
                        キャリアアップやスキルアップのための「新しい留学のかたち」として注目を集めています。<br />
                        あなたもワーキングホリデーを通して、世界をより身近に感じて見ませんか？<br />
                        &nbsp;<br />
                        日本ワーキングホリデー協会（ワーホリ協会）では、<br /><a href="/seminar">毎日無料のワーキングホリデー（ワーホリ）・留学セミナー</a>を開催しています。<br />
                        &nbsp;<br />
                        ワーキングホリデー制度のメリット・デメリットを解りやすく説明し、ワーキングホリデー（ワーホリ）・留学に必要な準備・予算・プランをご紹介しています。<br />
                        &nbsp;<br />
                    </div>
                </div>

                <div class="section02">
                    <div class="title-section02">
                        <img src="/images/index/title02.png" alt="">
                        <span>無料ワーキングホリデーセミナー（説明会）</span>
                    </div>
                    <div class="content-section02">
                        <a href="/seminavi.php?p=tokyo" class="item item01">
                            <span>東京のセミナー</span>
                            <img src="/images/index/arrow2.png" alt="">
                        </a>
                        <a href="/seminavi.php?p=osaka" class="item item02">
                            <span>大阪のセミナー</span>
                            <img src="/images/index/arrow2.png" alt="">
                        </a>
                        <a href="/seminavi.php?p=nagoya" class="item item03">
                            <span>名古屋のセミナー</span>
                            <img src="/images/index/arrow2.png" alt="">
                        </a>
                        <a href="/seminavi.php?p=fukuoka" class="item item04">
                            <span>福岡のセミナー</span>
                            <img src="/images/index/arrow2.png" alt="">
                        </a>
                        <a href="/seminavi.php?p=okinawa" class="item item05">
                            <span>沖縄のセミナー</span>
                            <img src="/images/index/arrow2.png" alt="">
                        </a>
                        <a href="/event.html" class="item item06">
                            <span style="margin-top: 71px !important;">その他の都市<br />のセミナー</span>
                            <img src="/images/index/arrow2.png" alt="">
                        </a>
                    </div>
                </div>

                <!-- AD05 -->
                <div style="float:right; width: 258px; margin-top: 15px;">
                    <?php
                    $big_size = array("width='585'", "height='295'", "width='584'", "height='145'");
                    $sml_size = array("width='260'", "height='131'", "width='165'", "height='41'");
                    ?>

                    <?php
                    //w002
                    // The MAX_PATH below should point to the base of your OpenX installation
                    if (@include_once(MAX_PATH_AD . '/www/delivery/alocal.php')) {
                        if (!isset($phpAds_context)) {
                            $phpAds_context = array();
                        }
                        // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                        $phpAds_raw = view_local('', 222, 0, 0, '', '', '0', $phpAds_context, '');
                        $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
                    }
                    echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
                    ?>
                </div>

                <!-- AD06 -->
                <div style="float: left; width: 167px; margin-bottom: 4px;  margin-top: 15px;">
                    <?php
                    //s004
                    // The MAX_PATH below should point to the base of your OpenX installation
                    if (@include_once(MAX_PATH_AD . '/www/delivery/alocal.php')) {
                        if (!isset($phpAds_context)) {
                            $phpAds_context = array();
                        }
                        // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                        $phpAds_raw = view_local('', 152, 0, 0, '', '', '0', $phpAds_context, '');
                        $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
                    }
                    echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
                    ?>
                </div>

                <!-- AD07 -->
                <div style="float: left; width: 167px;  margin-bottom: 4px;">
                    <?php
                    //s005
                    // The MAX_PATH below should point to the base of your OpenX installation
                    if (@include_once(MAX_PATH_AD . '/www/delivery/alocal.php')) {
                        if (!isset($phpAds_context)) {
                            $phpAds_context = array();
                        }
                        // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                        $phpAds_raw = view_local('', 153, 0, 0, '', '', '0', $phpAds_context, '');
                        $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
                    }
                    echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
                    ?>
                </div>

                <!-- AD08 -->
                <div style="float: left; width: 167px;">
                    <?php
                    //s006
                    // The MAX_PATH below should point to the base of your OpenX installation
                    if (@include_once(MAX_PATH_AD . '/www/delivery/alocal.php')) {
                        if (!isset($phpAds_context)) {
                            $phpAds_context = array();
                        }
                        // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                        $phpAds_raw = view_local('', 154, 0, 0, '', '', '0', $phpAds_context, '');
                        $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
                    }
                    echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
                    ?>
                </div>

                <div style="font-size:9pt; float:left; margin-top:15px; width:500px;">
                    <a href="/ryugakusupport/"><img src="images/ryugakubanner_off.gif" alt="" style=" width: 430px; "></a><br />
                </div>

                <!-- AD09 -->
                <div style="font-size:9pt; float:left; margin-top:20px; width:500px;">
                    <?php
                    //school
                    // The MAX_PATH below should point to the base of your OpenX installation
                    if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                        if (!isset($phpAds_context)) {
                            $phpAds_context = array();
                        }
                        // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                        $phpAds_raw = view_local('', 214, 0, 0, '_blank', '', '0', $phpAds_context, '');
                    }
                    echo $phpAds_raw['html'];
                    ?>
                </div>

                <!-- AD10 -->
                <div style="font-size:9pt; float:left; margin-top:10px; width:500px;">
                    <?php
                    // D01
                    if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                        if (!isset($phpAds_context)) {
                            $phpAds_context = array();
                        }
                        // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                        $phpAds_raw = view_local('', 32, 0, 0, '', '', '0', $phpAds_context, '');
                    }
                    echo $phpAds_raw['html'];
                    ?>
                </div>

                <!-- AD11 -->
                <div style="font-size:9pt; float:left; margin-top:10px; width:500px;">
                    <?php
                    if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                        if (!isset($phpAds_context)) {
                            $phpAds_context = array();
                        }
                        // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                        $phpAds_raw = view_local('', 33, 0, 0, '', '', '0', $phpAds_context, '');
                    }
                    echo $phpAds_raw['html'];
                    ?>
                </div>

                <!-- AD12 -->
                <div style="font-size:9pt; float:left; margin-top:10px; width:500px;">
                    <?php
                    // The MAX_PATH below should point to the base of your OpenX installation
                    if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                        if (!isset($phpAds_context)) {
                            $phpAds_context = array();
                        }
                        // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                        $phpAds_raw = view_local('', 119, 0, 0, '', '', '0', $phpAds_context, '');
                    }
                    echo $phpAds_raw['html'];
                    ?>
                </div>
            </div>
            <!--top-sec01END-->

            <h2 class="sec-title-top" style="margin-top:20px;">ワーホリ協会　公式Facebookページ</h2>
            <div class="fbdiv" style="text-align: center;">
                <div id="fb-root"></div>
                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4&appId=406032382880241";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-page" data-href="https://www.facebook.com/JapanWorkingHoliday" data-width="400" data-height="1700" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/JapanWorkingHoliday"><a href="https://www.facebook.com/JapanWorkingHoliday" rel="noreferrer">日本ワーキングホリデー協会　</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
        <!--top-sec01END-->

    </div>
    <!--top-mainEND-->

    <div id="local-nav">
        <br />
        <!-- AD13 -->
        <div>
            <?php
            define('MAX_PATH', '/var/www/vhosts/jawhm.or.jp/httpdocs/ad');
            if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
                if (!isset($phpAds_context)) {
                    $phpAds_context = array();
                }
                // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
                $phpAds_raw = view_local('', 29, 0, 0, '', '', '0', $phpAds_context, '');
            }
            echo $phpAds_raw['html'];
            ?>
        </div>

        <h2 id="local-nav-title"><img src="/images/hotvisa.gif" alt="最新ワーキングホリデービザ情報" width="220" height="31" /></h2>
        <ul id="menu-country">
            <li> ■　<a href="/wh/australia/">オーストラリアのワーホリ情報</a></li>
            <li class="menu-visa"><a id="aus-visa" href="/visa/v-aus.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_AUS/']);"></a></li>
            <li>■　<a href="/wh/newzealand/">ニュージーランドのワーホリ情報</a></li>
            <li class="menu-visa"><a id="nz-visa" href="/visa/v-nz.html" onclick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_NZ/']);"></a></li>
            <li>■　<a href="/wh/canada/">カナダのワーホリ情報</a></li>
            <li class="menu-visa"><a id="can-visa" href="/visa/v-can.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_CAN/']);"></a></li>
            <li class="menu-visa"><a id="kor-visa" href="/visa/v-kor.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_KOR/']);"></a></li>
            <li class="menu-visa"><a id="fra-visa" href="/visa/v-fra.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_FRA/']);"></a></li>
            <li class="menu-visa"><a id="deu-visa" href="/visa/v-deu.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_DEU/']);"></a></li>
            <li>■　<a href="/wh/uk/">イギリスのワーホリ情報</a></li>
            <li class="menu-visa"><a id="uk-visa" href="/visa/v-uk.html" onclick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_UK/']);"></a></li>
            <li>■　<a href="/wh/ireland/">アイルランドのワーホリ情報</a></li>
            <li class="menu-visa"><a id="ire-visa" href="/visa/v-ire.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_IRE/']);"></a></li>
            <li class="menu-visa"><a id="dnk-visa" href="/visa/v-dnk.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_DNK/']);"></a></li>
            <li class="menu-visa"><a id="ywn-visa" href="/visa/v-ywn.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_YWN/']);"></a></li>
            <li class="menu-visa"><a id="hkg-visa" href="/visa/v-hkg.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_HKG/']);"></a></li>
            <li class="menu-visa"><a id="nor-visa" href="/visa/v-nor.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_NOR/']);"></a></li>
            <li class="menu-visa"><a id="pol-visa" href="/visa/v-pol.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_POL/']);"></a></li>
            <li class="menu-visa"><a id="por-visa" href="/visa/v-prt.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_POR/']);"></a></li>
            <li class="menu-visa"><a id="svk-visa" href="/visa/v-svk.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_SVK/']);"></a></li>
            <li class="menu-visa"><a id="aut-visa" href="/visa/v-aut.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_AUT/']);"></a></li>
            <li class="menu-visa"><a id="hun-visa" href="/visa/v-hun.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_HUN/']);"></a></li>
            <li class="menu-visa"><a id="eps-visa" href="/visa/v-esp.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_EPS/']);"></a></li>
            <li class="menu-visa"><a id="cze-visa" href="/visa/v-cze.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_CZE/']);"></a></li>
            <li class="menu-visa"><a id="arg-visa" href="/visa/v-arg.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_ARG/']);"></a></li>
            <li class="menu-visa"><a id="chl-visa" href="/visa/v-chl.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_CHL/']);"></a></li>
            <li class="menu-visa"><a id="isl-visa" href="/visa/v-isl.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_ISL/']);"></a></li>
            <li class="menu-visa"><a id="ltu-visa" href="/visa/v-ltu.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_LTU/']);"></a></li>
            <li class="menu-visa"><a id="swe-visa" href="/visa/v-swe.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_SWE/']);"></a></li>
            <li class="menu-visa"><a id="est-visa" href="/visa/v-est.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_EST/']);"></a></li>
            <li class="menu-visa"><a id="nld-visa" href="/visa/v-nld.html" onClick="javascript: _gaq.push(['_trackPageview' , '/link_toppage_NLD/']);"></a></li>
        </ul>

        <!-- 留学サポートサービスバナー -->
        <div class="advbox02" style="border:0px; margin-bottom: -10px;">
            <div class="text-center">
                <a href="https://www.jawhm.or.jp/ryugakusupport/"><img src="/images/ryugakusupport_topmenu.gif" alt="留学サポートサービス"></a>
            </div>
        </div>

        <!-- 外務省バナー -->
        <div class="advbox02" style="border:0px; margin-bottom: 0px;">
            <div class="text-center">
                <a href="https://www.mofa.go.jp/mofaj/toko/visa/working_h.html" target="_blank" rel="noreferrer"><img src="/images/gaimusho.gif" alt="外務省"></a>
            </div>
        </div>

        <?php
        // require_once "blog/seminar_voice.php";
        // $getitems = 8;		// 表示件数
        // $interval = 10000;	// インターバル（１秒＝１０００）
        // $jawhm = getRecentVoice($getitems);
        // $j_script = '';
        // $cnt = 0;
        // foreach($jawhm as $item)	{
        //     echo '<div class=\'seminar_voice\' id=\'seminarvoice'.$item['itemid'].'\'>';
        //     echo '<p><img src="/images/mail'.rand(1,7).'.png">&nbsp;'.htmlspecialchars (strip_tags($item['body'])).'</p>';
        //     echo '</div>';
        //     $cnt += $interval;
        //     $j_script .= 'jQuery("#seminarvoice'.$item['itemid'].'").oneTime('.$cnt.',function(){';
        //     $j_script .= 'fncSeminarVoice("seminarvoice'.$item['itemid'].'");';
        //     $j_script .= '});';
        // }
        ?>

        <script type="text/javascript">
            function fncSeminarVoice(id) {
                jQuery('#' + id).animate({
                    height: '0px'
                }, {
                    duration: 500,
                    complete: function() {
                        var array = new Array();
                        for (var i = 0; i < 10; i++) {
                            array.push(String.fromCharCode('0'.charCodeAt() + i))
                        }
                        var str = '';
                        for (var i = 0; i < 50; i++) {
                            str += array[Math.floor(Math.random() * 10)]
                        }

                        msg = jQuery(this).find(':first-child').html();
                        divmsg = '';
                        divmsg = divmsg + '<div class="seminar_voice" id="' + str + '">';
                        divmsg = divmsg + '<p>' + msg + '</p>';
                        divmsg = divmsg + '</div>';
                        jQuery(this).hide();

                        jQuery('#seminar_voice_box').append(divmsg);

                        jQuery('#' + str).oneTime(<?php echo $interval * $getitems; ?>, function() {
                            fncSeminarVoice(jQuery(this).attr("id"));
                        });

                    }
                });
            }
            <?php echo $j_script; ?>
        </script>

        <div class="advbox02" style="border:0px; margin-bottom: -10px;">
            <a href="/seminar/seminar_01"><img src="/seminar/images/seminar_syohin_s.jpg" alt="" /></a>
        </div>

        <div class="advbox02" style="border:0px; margin-bottom: 0px;">
            <a href="/shindan/"><img src="/images/seminar_shindan_s.gif" alt="" /></a>
        </div>
        <br />

        <style>
            h2.title-comment {
                background: url(images/bg-title.png) no-repeat;
                width: 196px !important;
                height: 23px !important;
                padding: 8px 0 0 20px;
                font-weight: bold;
                font-size: 14px;
                margin-top: 0 !important;
                margin-bottom: 0;
                float: none !important;
            }

            .serminar-link-sidebar {
                font-size: 14px;
            }

            .icon-title {
                float: left;
                margin: 5px 10px;
            }
        </style>
        <h2 class="title-comment">お客様の声</h2>
        <div id="fb-0001"></div>
        
        <?php
        $header_obj->add_js_files .= "
            <script>
                fbcomment.Widget({
                    category: 'セミナー参加者の声',
                    width: 214,
                    height: 500,
                    visible_items: 5,
                    interval: 5000,
                    speed: 500,
                    scroll: {
                        direction: 'up',
                        axis: 'vertical'
                    },
                    circular: 'yes',
                    typejs: 'als',
                });
                $('#fbcomment-0').appendTo('#fb-0001');
            </script>
        ";
        ?>

        <a href="/feedback.php"><img class="icon-title" src="images/feedback.png" width="214" alt="そのほかセミナー参加者の声はこちら" style="margin:-5px 0px 0px 0px;"></a>
        <div class="serminar-link-sidebar" style="border:0px;">
            <img class="icon-title" src="images/icon-seminar.png" width="16" height="16" alt="">
            <a href=/seminar>セミナーの予約はこちら </a> </div> <div class="advbox02" style="border:0px; margin-bottom: 30px;">
                <a href="/blog/"><img src="/images/blog_banner_off.jpg" alt="" /></a>
        </div>

        <div class="right_side">
            <div style="margin-top:16px;"></div>
            <!--[if (gte IE 9) | !(IE) ]><!-->
            <object id="fb" data="https://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FJapanWorkingHoliday&amp;width=220&amp;height=640&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true"></object>
            <!--<![endif]-->
        </div>

        <br />

        <!-- twitterタイムライン -->
        <div>
            <img style="width: 100%;padding-top: 20px;" src="/images/twitter-avatar.jpg" alt="twitter-avatar">
            <p style="font-weight: 700;color: #365899;text-align: center;padding: 5px;background: #fff;margin-bottom: 1px;">ばむくんのつぶやき</p>
        </div>
        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/bamukun_jawhm" data-height="600" rel="noreferrer">@Bamukun_JAWHM これから</a>

        <?php
        $header_obj->add_js_files .= "
            <script>
                ! function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0],
                        p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + '://platform.twitter.com/widgets.js';
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, 'script', 'twitter-wjs');
            </script>";
        ?>

        <!-- トビタテ留学ジャパンバナー -->
        <div class="advbox02 text-center" style="border:0px; margin-bottom: -10px;">
            <a href="http://www.mext.go.jp/ryugaku/" target="_blank" rel="noreferrer"><img src="/images/tobitate_banner.png" alt="tobitate_banner" style="width: 100%;"/></a>
        </div>
        <!-- 外務省安全ホームページ -->
        <div class="advbox02 text-center" style="border:0px; margin-bottom: -10px;">
            <a href="http://www.anzen.mofa.go.jp/" target="_blank" rel="noreferrer"><img src="/images/b.gif" alt="外務省 海外安全ホームページ" style="width: 100%;"></a>
        </div>
        <!-- 外務省　国際機関人事センター -->
        <div class="advbox02 text-center" style="border:0px; margin-bottom: -10px;">
            <a href="http://www.mofa-irc.go.jp" target="_blank" rel="noreferrer"><img src="/images/mofa_irc.png" alt="外務省　国際機関人事センター" style="width: 100%;"></a>
        </div>
        <!-- 外務省　ハーグ条約ページ -->
        <div class="advbox02 text-center" style="border:0px; margin-bottom: -10px;">
            <a href="https://www.jawhm.or.jp/MOFA/hague/" target="_blank"><img src="/images/hague_icon2.gif" alt="外務省　ハーグ条約ページ" style="width: 100%;"></a>
        </div>
        <!-- Huber バナー -->
        <div class="advbox02 text-center" style="border:0px; margin-bottom: -10px;">
            <a href="https://huber-japan.com/guides/welcome/?worholi" target="_blank" rel="noreferrer"><img src="/images/huber_banner.png" alt="Huberページ" style="width: 100%;"></a>
        </div>
    </div>
    <!--local-navEND-->

</div>
<!--maincontentEND-->

</div>
<!--contentsEND-->
</div>
<!--contentsboxEND-->

<?php fncMenuFooter($header_obj->footer_type, false); ?>

<!-- Scripts -->
<?php $header_obj->display_script(); ?>



</body>

</html>