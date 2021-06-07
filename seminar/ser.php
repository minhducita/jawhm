<?php
    session_start(); //JN:change position

    if( $_SERVER["SERVER_PORT"] == 80 ) {
        header( "location:" . "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] );
        exit;
    }

    require_once('include/mobile_function.php');
    require_once ('include/where_condition_new.php');
    require_once ('../seminar_module/seminar_db.php');
    ini_set( "display_errors", "Off");
    ini_set('session.bug_compat_42', 0);
    ini_set('session.bug_compat_warn', 0);

    $use_area = true;
    list(,$para1, $para2, $para3, $para4, $para5, $para6) = explode('/', $_SERVER['PATH_INFO']);

    //JN:check
    //die(print_r($para3));
    //JN:end

    /*get place name url*/
    $listpara = explode('/', $_SERVER['PATH_INFO']);
    $places = array("","fukuoka", "nagoya", "okinawa", "osaka", "tokyo" );
    $placename = "";
    foreach($listpara as $val) {
        $keyplace = array_search($val,$places);
        if(!empty($keyplace)) {
            $placename = $places[$keyplace];
        }
    }
    /*end get place name url*/

    $c_base = $_SERVER['REQUEST_URI'];
    // The MAX_PATH below should point to the base of your OpenX installation
    $big_size = array("width='585'", "height='295'", "width='584'", "height='145'");
    $sml_size = array("width='380'", "height='192'", "width='380'", "height='74'");
    define('MAX_PATH', $_SERVER['DOCUMENT_ROOT'].'/ad');
    $big_banner = array();
    $sml_banner = array();
    
    if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
        if (!isset($phpAds_context)) {
            $phpAds_context = array();
        }
    
    //    $ids = array(155, 151, 159, 160, 161);
    //    foreach ($ids as $id) {
    //        //$phpAds_context = array();
    //        $phpAds_raw = view_local('', $id, 0, 0, '_blank', '', '0', $phpAds_context, '');
    //        $phpAds_context[] = array('!=' => 'campaignid:'.$phpAds_raw['campaignid']);
    //        $phpAds_context[] = array('!=' => 'bannerid:'.$phpAds_raw['bannerid']);
    //        if (empty($phpAds_raw['html'])) continue;
    //        $big_banner[] = str_replace($big_size, $sml_size, $phpAds_raw['html']);
    //    }
    //  0 : 180 ALL
    //  1 : 181 TOKYO
    //  2 : 182 OSAKA
    //  3 : 183 NAGOYA
    //  4 : 184 FUKUOKA
    //  5 : 185 OKINAWA
    //  6 : 186 EVENT
    //    $ids = array(180,180);
        $ids = array(180, 181, 182, 183, 184, 185, 186);
        foreach ($ids as $id) {
            $phpAds_context = array();
            $phpAds_raw = view_local('', $id, 0, 0, '_blank', '', '0', $phpAds_context, '');
            $phpAds_context[] = array('!=' => 'campaignid:' . $phpAds_raw['campaignid']);
            $sml_banner[] = str_replace($big_size, $sml_size, $phpAds_raw['html']);
        }
    }

    $ser_banner = array();
    $ser_banner['all'] = $sml_banner[0];
    $ser_banner['tokyo'] = $sml_banner[1];
    $ser_banner['osaka'] = $sml_banner[2];
    $ser_banner['nagoya'] = $sml_banner[3];
    $ser_banner['fukuoka'] = $sml_banner[4];
    $ser_banner['okinawa'] = $sml_banner[5];
    $ser_banner['event'] = $sml_banner[6];

    /* ↓↓↓ 20141016追加 ↓↓↓ */
    $c_footer = '
    <div class="area-btn-seminar">
        <a href="/seminar/ser-form.php" id="btn-seminar-inquiry-1" data-ajax="false">
            セミナーに関するお問い合わせはこちら <span class="icon-envelope2"></span>
        </a>
        <a href="https://jp.surveymonkey.com/s/QNGSHFR" target="_blank" id="btn-seminar-inquiry-2" data-ajax="false">
            <span id="span-attention-2">ご希望のセミナーが無い場合はこちら</span><br />
            セミナーアンケートにご協力ください <span class="icon-forward"></span>
        </a>
    </div>

    <link rel="stylesheet" type="text/css" media="screen" href="/sp/css/mailbox.css?v=20180730">

    <!--script src="https://jawhm.or.jp/js/mobile-script.js"></script-->
    <script>
        jQuery(document).ready(function ($) {
            /*** CHECK REFERAL FROM PARDOT ***/
            if( document.referrer.length !== 0 && document.referrer.indexOf("pardot") != -1 ){
                alert("無料メルマガへのご登録ありがとうございました。");
            };
            
            $("#email_regis_2607 button").click(function(){
            var txt_email = $("#email_regis_2607 input").val();
            if(txt_email == "") {
                alert("メールアドレスを入力してください");
                return;
            }
            if(!validateEmail(txt_email)) {
                alert("正しいメールアドレスを入力してください");
                return;
            }
            
            // $("#email_regis_2607 form").attr("action", "https://go.pardot.com/l/401302/2017-12-07/9d718t");
            // $("#email_regis_2607 form").submit();
                
            /*$.post("https://pi.pardot.com/l/401302/2017-12-07/9d718t",
            {
                email: txt_email,
                namae: "ワーホリ大好き"
            },
            function(data, status){
                console.log(data);
                console.log(status);
            });
            */
        });
            
        });
        function validateEmail(email) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    </script>
    <div id="footer-mobile-new">
        <dl id="footer-mobile-new-menu">
            <dt id="footer-mobile-new-menu_dt_01" style="cursor:pointer"><span>ワーキングホリデー（ワーホリ）で行ける国々</span></dt>
            <dd id="footer-mobile-new-menu_dd_01" style="display:none">
                <ul>
                    <li><a href="/country/australia" data-ajax="false">オーストラリア</a></li>
                    <li><a href="/visa/v-aus.html" data-ajax="false">オーストラリアビザ情報</a></li>
                    <li><a href="/country/newzealand" data-ajax="false">ニュージーランド</a></li>
                    <li><a href="/visa/v-nz.html" data-ajax="false">ニュージーランドビザ情報</a></li>
                    <li><a href="/country/canada" data-ajax="false">カナダ</a></a></li>
                    <li><a href="/visa/v-can.html" data-ajax="false">カナダビザ情報</a></li>
                    <li><a href="/country/southkorea" data-ajax="false">韓国</a></li>
                    <li><a href="/visa/v-kor.html" data-ajax="false">韓国ビザ情報</a></li>
                    <li><a href="/country/france" data-ajax="false">フランス</a></a></li>
                    <li><a href="/visa/v-fra.html" data-ajax="false">フランスビザ情報</a></li>
                    <li><a href="/country/germany" data-ajax="false">ドイツ</a></li>
                    <li><a href="/visa/v-deu.html" data-ajax="false">ドイツビザ情報</a></li>
                    <li><a href="/country/unitedkingdom" data-ajax="false">イギリス</a></li>
                    <li><a href="/visa/v-uk.html" data-ajax="false">イギリスビザ情報</a></li>
                    <li><a href="/country/ireland" data-ajax="false">アイルランド</a></li>
                    <li><a href="/visa/v-ire.html" data-ajax="false">アイルランドビザ情報</a></li>
                    <li><a href="/country/denmark" data-ajax="false">デンマーク</a></li>
                    <li><a href="/visa/v-dnk.html" data-ajax="false">デンマークビザ情報</a></li>
                    <li><a href="/country/taiwan" data-ajax="false">台湾</a></li>
                    <li><a href="/visa/v-ywn.html" data-ajax="false">台湾ビザ情報</a></li>
                    <li><a href="/country/hongkong" data-ajax="false">香港</a></li>
                    <li><a href="/visa/v-hkg.html" data-ajax="false">香港ビザ情報</a></li>
                    <li><a href="/visa/v-nor.html" data-ajax="false">ノルウェー</a></li>
                    <li><a href="/visa/v-nor.html" data-ajax="false">ノルウェービザ情報</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_02" style="cursor:pointer"><span>ワーキング・ホリデーについて知りたい</span></dt>
            <dd id="footer-mobile-new-menu_dd_02" style="display:none">
                <ul>
                    <li><a href="/system.html" data-ajax="false">ワーキングホリデー（ワーホリ）制度について</a></li>
                    <li><a href="/start.html" data-ajax="false">はじめてのワーキングホリデー（ワーホリ）</a></li>
                    <li><a href="/visa/visa_top.html" data-ajax="false">ワーキングホリデー協定国（ビザ情報）</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_03" style="cursor:pointer"><span>国別ワーキングホリデーガイド</span></dt>
            <dd id="footer-mobile-new-menu_dd_03" style="display:none">
                <ul>
                    <li><a href="/wh/australia" data-ajax="false">オーストラリアのワーホリ (ワーキングホリデー)</a></li>
                    <li><a href="/wh/canada" data-ajax="false">カナダのワーホリ (ワーキングホリデー)</a></li>
                    <li><a href="/wh/newzealand" data-ajax="false">ニュージーランドのワーホリ (ワーキングホリデー)</a></li>
                    <li><a href="/wh/uk" data-ajax="false">イギリスのワーホリ (ワーキングホリデー)</a></li>
                    <li><a href="/wh/america" data-ajax="false">アメリカのワーホリ (ワーキングホリデー)</a></li>
                    <li><a href="/country" data-ajax="false">ワーホリ (ワーキングホリデー)協定国情報</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_04" style="cursor:pointer"><span>日本ワーキングホリデー協会について知りたい</span></dt>
            <dd id="footer-mobile-new-menu_dd_04" style="display:none">
                <ul>
                    <li><a href="/about.html" data-ajax="false">一般社団法人日本ワーキング・ホリデー協会について</a></li>
                    <li><a href="/katsuyou.html" data-ajax="false">日本ワーキングホリデー協会活用ガイド</a></li>
                    <li><a href="/mem/register.php" data-ajax="false">メンバー登録をしてサポートを受ける</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_05" style="cursor:pointer"><span>ワーホリの口コミやブログを見たい</span></dt>
            <dd id="footer-mobile-new-menu_dd_05" style="display:none">
                <ul>
                    <li><a href="/blog" data-ajax="false">ワーキング・ホリデー協会　公式ブログ</a></li>
                    <li><a href="/ja/golden-book" data-ajax="false">Golden-Book(留学・ワーホリ出発前ノート）</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_06" style="cursor:pointer"><span>ワーホリ協会が考える語学留学</span></dt>
            <dd id="footer-mobile-new-menu_dd_06" style="display:none">
                <ul>
                    <li><a href="/ryugaku" data-ajax="false">語学留学</a></li>
                    <li><a href="/ryugaku/ryugaku_hiyou.html" data-ajax="false">語学留学の費用</a></li>
                    <li><a href="/ryugaku/usa_lang.html" data-ajax="false">アメリカ語学留学</a></li>
                    <li><a href="/ryugaku/usa_visa.html" data-ajax="false">アメリカ語学留学ビザ</a></li>
                    <li><a href="/ryugaku/aus_lang.html" data-ajax="false">オーストラリア語学留学の特徴</a></li>
                    <li><a href="/ryugaku/aus_point.html" data-ajax="false">オーストラリア語学留学の良い点</a></li>
                    <li><a href="/ryugaku/aus_visa.html" data-ajax="false">オーストラリア語学留学ビザ</a></li>
                    <li><a href="/ryugaku/can_lang.html" data-ajax="false">カナダ語学留学</a></li>
                    <li><a href="/ryugaku/eng_lang.html" data-ajax="false">イギリス語学留学</a></li>
                    <li><a href="/ryugaku/eng_visa.html" data-ajax="false">イギリス語学留学ビザ</a></li>
                    <li><a href="/ryugaku/fiji_lang.html" data-ajax="false">フィジー語学留学・フィリピン留学</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_07" style="cursor:pointer"><span>ワーホリ協会が考える大学留学</span></dt>
            <dd id="footer-mobile-new-menu_dd_07" style="display:none">
                <ul>
                    <li><a href="/ryugaku/ryugaku_eng.html" data-ajax="false">大学留学に必要な英語力</a></li>
                    <li><a href="/ryugaku/usa_sat.html" data-ajax="false">大学留学に必要な英語以外の試験</a></li>
                    <li><a href="/ryugaku/usa_univ.html" data-ajax="false">アメリカ大学留学</a></li>
                    <li><a href="/ryugaku/aus_univ.html" data-ajax="false">オーストラリア大学留学</a></li>
                    <li><a href="/ryugaku/eng_univ.html" data-ajax="false">イギリス大学留学</a></li>
                    <li><a href="/ryugaku/ryugaku_jawhm.html" data-ajax="false">留学に向けたワーホリ協会の活用</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_08" style="cursor:pointer"><span>協会のサポートを受けたい</span></dt>
            <dd id="footer-mobile-new-menu_dd_08" style="display:none">
                <ul>
                    <li><a href="/mem">協会のサポート内容（メンバー登録）</a></li>
                    <li><a href="/seminar/seminar" data-ajax="false">無料セミナー</a></li>
                    <li><a href="/kouenseminar.php" data-ajax="false">講演セミナー</a></li>
                    <li><a href="/event.html" data-ajax="false">イベントカレンダー</a></li>
                    <li><a href="/return.html" data-ajax="false">帰国後のサポート</a></li>
                    <li><a href="/qa.html" data-ajax="false">よくある質問</a></li>
                    <li><a href="/gogaku-spec.html" data-ajax="false">語学講座</a></li>
                    <li><a href="/profile.html" data-ajax="false">講師派遣</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_09" style="cursor:pointer"><span>お役立ち情報</span></dt>
            <dd id="footer-mobile-new-menu_dd_09" style="display:none">
                <ul>
                    <li><a href="/info.html" data-ajax="false">お役立ちリンク集</a></li>
                    <li><a href="/school.html" data-ajax="false">語学学校（海外・国内）</a></li>
                    <li><a href="/service.html" data-ajax="false">サービス（保険・アコモデーション等）</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_10" style="cursor:pointer"><span>海外からのワーキングホリデー</span></dt>
            <dd id="footer-mobile-new-menu_dd_10" style="display:none">
                <ul>
                    <li><a href="/attention.html" data-ajax="false">外国人ワーキング・ホリデー青年</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_11" style="cursor:pointer"><span>協賛企業を求めています</span></dt>
            <dd id="footer-mobile-new-menu_dd_11" style="display:none">
                <ul>
                    <li><a href="/mem-com.html" data-ajax="false">企業会員について（会員制度ご紹介・意義・メリット）</a></li>
                    <li><a href="/adv.html" data-ajax="false">広告掲載のご案内</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_12" style="cursor:pointer"><span>ワーホリ協会のいろいろ</span></dt>
            <dd id="footer-mobile-new-menu_dd_12" style="display:none">
                <ul>
                    <li><a href="/volunteer.html" data-ajax="false">ボランティア・インターン募集</a></li>
                    <li><a href="/privacy.html" data-ajax="false">個人情報の取り扱い</a></li>
                    <li><a href="/about.html#deal" data-ajax="false">特定商取引に関する表記</a></li>
                    <li><a href="/sitemap.html" data-ajax="false">サイトマップ</a></li>
                </ul>
            </dd>
    
            <dt id="footer-mobile-new-menu_dt_13" style="cursor:pointer"><span>アクセス</span></dt>
            <dd id="footer-mobile-new-menu_dd_13" style="display:none">
                <ul>
                    <li><a href="/office/tokyo" data-ajax="false">東京オフィス</a></li>
                    <li><a href="/office/osaka" data-ajax="false">大阪オフィス</a></li>
                    <li><a href="/office/nagoya" data-ajax="false">名古屋オフィス</a></li>
                    <li><a href="/office/fukuoka" data-ajax="false">福岡オフィス / カフェバーマンリー</a></li>
                    <li><a href="/office/okinawa" data-ajax="false">沖縄オフィス / e-sa(イーサ）</a></li>
                </ul>
            </dd>
        </dl>
    
        <div id="footer-copyright-new">
            <div class="social-box">
                <script type="text/javascript">
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) {return;}
                        js = d.createElement(s); js.id = id; js.async = true;
                        js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&amp;appId=158074594262625";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, "script", "facebook-jssdk"));
                </script>
                <div id="social_tool">
                    <table style="display: inline-block;margin-bottom: 10px"><tr>
                        <td style="vertical-align:top;">
                            <div class="fb-like" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="arial"></div>
                        </td>
                        <td style="vertical-align:top;">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="jawhm">Tweet</a>
                            <script type="text/javascript" src="/platform.twitter.com/widgets.js"></script>
                        </td>
                        <td style="vertical-align:top;">
                            <!--<g:plusone></g:plusone>-->
                            <div class="g-plusone"></div>
                            <script type="text/javascript">
                                window.___gcfg = {lang: "ja"};
    
                                (function() {
                                    var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
                                    po.src = "https://apis.google.com/js/plusone.js";
                                    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
                                })();
                            </script>
                        </td>
                    </tr></table>
                </div>
            </div>
            Copyright© JAPAN Association for Working Holiday Makers All right reserved.
        </div>
    </div>

    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <div id="mobile-globalmenu-list" class="monav-wrapper" style="display:none">';
        if(!empty($_SESSION['mem_id']) && !empty($_SESSION['mem_name']) && @$_SESSION['mem_level'] != -1) {
            $c_footer .=  '<a target="_self" class="mobile_membertop" href="/member/logout.php"> 　ログアウト　</a>';
        } else {
            $c_footer .= '<a onclick="memberLogin()"><i class="fa fa-key"></i>メンバーログイン</a>';
        }
        $c_footer .= '<ul>
    
        <li class="here"><a href="/seminar/ser/" data-ajax="false"><i class="fa fa-pencil"></i><span>ワーホリ＆留学無料セミナー</span></a></li>
        <li><a href="/office/" data-ajax="false"><i class="fa fa-book"></i><span>ワーホリ協会国</span></a></li>
        <li><a href="/qa.html" data-ajax="false"><i class="fa fa-comments"></i><span>よくある質問</span></a></li>
        <li><a href="/blog/" data-ajax="false"><i class="fa fa-building"></i><span>ワーホリブログ</span></a></li>
        <li><a href="/katsuyou.html" data-ajax="false"><i class="fa fa-suitcase"></i><span>ワーホリ協会で</br>できること</span></a></li>
        <li><a href="/country/" data-ajax="false"><i class="fa fa-globe"></i><span>ワーホリ協定国</span></a></li>
        <li><a href="/start.html" data-ajax="false"><i class="fa fa-plane"></i><span>はじめての</br>ワーホリ</span></a></li>
        <li><a href="/mobileform/member_form.php" data-ajax="false"><span>メンバー登録</span><em>JAWHM</em></a></li>
    
    </ul>
    ';
    
    $c_footer .= '</div>';
    /* ↑↑↑ 20141016追加 ↑↑↑ */

    $url_home = '/seminar/ser';
    $url_thankyou = '/seminar/thankyou';
    $url_top = '/';
    
    if ($para1 <> 'id') {
        $_SESSION['para1'] = $para1;
        $_SESSION['para2'] = $para2;
        $_SESSION['para3'] = $para3;
        $_SESSION['para4'] = $para4;
        $_SESSION['para5'] = $para5;
        $_SESSION['para6'] = $para6;
    }

    //JN:check
    //die(print_r($_SESSION['para3']));
    //JN:end

    //general header
    function display_header($h1, $menuDisplay = true) {
        $c_header = '
        <!-- ↓↓↓ 20141016追加 ↓↓↓ -->
        <div id="header-box-new">
            <h1 id="header" class="header-new" style="padding-top:12px"><a href="/" data-ajax="false"><img src="/images/mobile/mobile-new-header.gif" class="responsive-img"></a></h1>';
        if ($menuDisplay) {
            $c_header .= '<span id="mobile-globalmenu-btn"><img src="/images/mobile/mobile-globalmenu-btn.gif" class="responsive-img"></span>';
        }
        $c_header .= '</div>
        <!-- ↑↑↑ 20141016追加 ↑↑↑ -->
        ';
        return $c_header;
    }
    
    if ($para1 == 'douji') {
        $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_mail_list.ini', FALSE);

        $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->query('SET CHARACTER SET utf8');

        $stt = $db->prepare('SELECT * FROM event_list WHERE id = :id');
        $stt->bindValue(':id', $para2);
        $stt->execute();
        $seminar_info = $stt->fetch();
        $stt = $db->prepare('select *,date_format(starttime, \'%c月%e日 (%a) %k:%i\') as start from event_list where hiduke = :hiduke and starttime = :starttime and k_title1 = :k_title1 order by id');
        $stt->bindValue(':hiduke', $seminar_info['hiduke']);
        $stt->bindValue(':starttime', $seminar_info['starttime']);
        $stt->bindValue(':k_title1', $seminar_info['k_title1']);
        $stt->execute();
        $douji_list = array();
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            $douji_list[] = $row;
        }
        if (count($douji_list) < 2) {
            header("Location: /seminar/ser/id/" . $para2);
            exit;
        }
    }

    $email = @$_POST['email'];
    $pwd = @$_POST['pwd'];
    $msg = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($email == '' || $pwd == '') {
            $msg = 'メールアドレスとパスワードを入力して下さい。';
        } else {
            try {
                $ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
                $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->query('SET CHARACTER SET utf8');
                $stt = $db->prepare('SELECT id, email, password, namae FROM memlist WHERE email = :email and state = "5" ');
                $stt->bindValue(':email', $email);
                $stt->execute();
                $cur_id = '';
                $cur_email = '';
                $cur_password = '';
                $cur_namae = '';
                while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                    $cur_id = $row['id'];
                    $cur_email = $row['email'];
                    $cur_password = $row['password'];
                    $cur_namae = $row['namae'];
                }
                $db = NULL;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
    
            if ($cur_password == md5($pwd)) {
                // ログインOK
                $_SESSION['mem_id'] = $cur_id;
                $_SESSION['mem_name'] = $cur_namae;
                $_SESSION['mem_level'] = 0;
                $msg = true;
            } else {
                $msg = '入力されたメールアドレスかパスワードに誤りがあります。';
            }
        }
    }
    
    if ($msg === true) {
        header("Location: /seminar/ser/id/" . $para2);
        exit;
    }
    
    if ($_SESSION['para1'] == 'kouen') {
        $page_tile = '留学・ワーホリ講演セミナー';
    } else
    {
        $page_tile = '留学・ワーホリ無料セミナー';
        if ($para2 == 'tokyo') {
            $page_tile .= '【東京】';
        }
    
        if ($para2 == 'osaka') {
            $page_tile .= '【大阪】';
        }
    
        if ($para2 == 'nagoya') {
            $page_tile .= '【名古屋】';
        }
    
        if ($para2 == 'fukuoka') {
            $page_tile .= '【福岡】';
        }
    
        if ($para2 == 'okinawa') {
            $page_tile .= '【沖縄】';
        }
    
        if ($para2 == 'first') {
            $page_tile .= '【初心者セミナー】';
        }
    
        if ($para2 == 'school') {
            $page_tile .= '【語学学校セミナー】';
        }
    
        if ($para2 == 'kouen') {
            $page_tile .= '【体験談セミナー】';
        }
    
        if ($para2 == 'student') {
            $page_tile .= '【情報収集セミナー】';
        }
    
        if ($para2 == 'foot') {
            $page_tile .= '【人数限定懇談】';
        }
    
        if ($para2 == 'abili') {
            $page_tile .= '【人気のセミナー】';
        }

        // title
        if ($para2 == 'member') {
            $page_tile .= '【メンバー限定セミナー】';
        }
    
        if ($para2 == 'recommended') {
            $page_tile .= '【徹底解説】 各種情報収集セミナー';
        }
    
        if ($para2 == 'job_support') {
            $page_tile .= '就活ワークショップ＆お仕事相談会';
        }
    
        if ($para2 == 'business_trip') {
            $page_tile .= '【ワーホリ出張セミナー】';
        }
        //end title
    
        if ($para2 == 'plan') {
            $page_tile .= '【プランニングセミナー】';
        }
    
        if ($para2 == 'aus') {
            $page_tile = 'オーストラリアの' . $page_tile;
        }
    
        if ($para2 == 'can') {
            $page_tile = 'カナダの' . $page_tile;
        }
    
        if ($para2 == 'nz') {
            $page_tile = 'ニュージーランドの' . $page_tile;
        }
    
        if ($para2 == 'uk') {
            $page_tile = 'イギリスの' . $page_tile;
        }
    
        if ($para2 == 'fra') {
            $page_tile = 'フランスの' . $page_tile;
        }
    
        if ($para2 == 'deu') {
            $page_tile = 'ドイツの' . $page_tile;
        }
    
        if ($para2 == 'ire') {
            $page_tile = 'アイルランドの' . $page_tile;
        }
    
        if ($para2 == 'usa') {
            $page_tile = 'アメリカの' . $page_tile;
        }
    
        if ($para2 == 'other') {
            $page_tile = '色々な国の' . $page_tile;
        }
    }
    
    if ($para1 == 'id') {
        $page_tile = '留学・ワーホリ無料セミナー|○○月○○日　○○会場　[セミナー名]';
    }
    else {
        $page_tile .= '|日本ワーキングホリデー協会';
    }
    /*
    if ($page_tile == '留学・ワーホリ無料セミナー')
    {
        $page_tile .= ' |○○月○○日　○○会場　[セミナー名]';
    }
    else
    {
        $page_tile .= ' |日本ワーキングホリデー協会';
    }
    */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT">
        <title><?php echo $page_tile; ?></title>
        <!-- css font-awesome -->
        <link rel="stylesheet" href="/seminar/css/font-awesome/4.7.0/font-awesome.min.css?v=1" />

        <link rel="stylesheet" href="/seminar/css/jquery.mobile-1.2.1.min.css" />
        <link rel="stylesheet" href="/css/base_mobile.css" />
        <link rel="stylesheet" href="/seminar/css/themes/jawhm.css" />
        <link rel="stylesheet" href="/seminar/css/ser.css?v=201905071" />
        <script src="/seminar/js/jquery.js"></script>
        <script src="/seminar/js/jquery.mobile-1.2.1.min.js"></script>
        <!-- ser js -->
        <script src="/seminar/js/ser.js?v=1"></script>
        
        <script>
            var session_mem_id = "";
            $(function() {
                var elementOffset = 0;
                if ($("h2.title-know").length == 1)
                    elementOffset = $('h2.title-know').offset().top;
                else if ($("h2.title-country").length == 1)
                    elementOffset = $('h2.title-country').offset().top;
                else if ($("h2#p-member").length == 1)
                    elementOffset = $('h2#p-member').offset().top;

                function fixDiv() {
                    if ($(window).scrollTop() > elementOffset)
                    {
                        $('.title-know, .title-country, #p-member').css({
                            'position': 'fixed',
                            'top': '0px'
                        });
                    }
                    else
                        $('.title-know, .title-country, #p-member').css({
                            'position': 'relative',
                            'top': 'auto'
                        });
                }
                $(window).scroll(fixDiv);
                fixDiv();
            });

            function feedback() {
                window.open("/feedback.php", "_self");
            }

            function member() {
                window.open("/mem", "_self");
            }

            function memberLogin() {
                window.open("/member", "_self");
            }
        </script>
        <!-- ↓↓↓ 201411111追加 ↓↓↓ -->
        <link href="/seminar/css/style-m.css" rel="stylesheet" type="text/css" />
        <link href="/seminar/css/style-fonts.css" rel="stylesheet" type="text/css" />
        <link href="/seminar/css/base_mobile_extra.css" rel="stylesheet" type="text/css" />
        <!-- ↓↓↓ 20141016追加 ↓↓↓ -->
        <link href="/css/base_mobile_extra.css" rel="stylesheet" type="text/css" />
        <!--- ADDED By MINHQUYEN # show thankyou after PARDOT --->
        <script>
            //if(localStorage.getItem("serid") && localStorage.getItem("serid") == "<?php echo $para2; ?>")
            if(localStorage.getItem("serid") && localStorage.getItem("serid") != "")
            {
                localStorage.removeItem("serid");
                location.href = '<?php print $url_thankyou; ?>';
            }
        </script>
        <!--- END --->
        <script type="text/javascript">
            var $pageChange = 1;
            function load_list_first()
            {
                var msgID = "0-0";
                var msgDate = '';
                var isFull = $('.ui-page-active > .ui-content input[name=isFull]').val();

                setTimeout(function() {
                    $.ajax({
                        type: "POST",
                        url: "/seminar/load_next_ser.php",
                        async: false,
                              //data: "last_msg_id=" + msgID + "&last_msg_date=" + msgDate + "&isFull=" + isFull,//JN:disable
                              //JN:new
                              data: {
                                  'last_msg_id' : msgID,
                                  'last_msg_date' : msgDate,
                                  'isFull' : isFull,
                                  'place' : <?php echo "'$para3'" ?>
                              },
                              //JN:end
                        success: function (msg) {
                            $(".ui-page-active > .ui-content > #title-top").after(msg);
                
                            $('div[data-role=collapsible]').collapsible();
                
                            $('.ui-page-active > .ui-content > div#title-top').empty();
                
                
                            if ($('.ui-page-active > .ui-content #fullari').size()) {
                                $(".ui-page-active #fullsem_flip").css("display", "");
                            } else {
                                $(".ui-page-active #fullsem_flip").css("display", "none");
                            }
                
                            displayFlip();
                            checkMoreViewButton();
                            popup();
                            if($('.ser-page').css('display') != 'none') {
                                $('.ser-page .detail a').not('.btn-pop, .mobile-globalmenu-list a').attr('target', '_blank');
                            }
                        },
                        error: function () {
                            // alert('通信エラーが発生しました。');
                        },
                    }),
                2000});
            }
            //JN:171227:add
            function load_list_by_date()
            {
                var msgID = "0-0";
                var msgDate = '';
                var isFull = $('.ui-page-active > .ui-content input[name=isFull]').val();
                var place = $(".ui-page-active > .ui-content .jn_selected_place:last").attr("alt");
                var date = $(".ui-page-active > .ui-content .jn_selected_day:last").attr("alt");
            
                setTimeout(function() {
                    $.ajax({
                        type: "POST",
                        url: "/seminar/load_next_by_date.php",
                        async: false,
                        //data: "last_msg_id=" + msgID + "&last_msg_date=" + msgDate + "&isFull=" + isFull + "&jnDate=" + jnDate,//JN:disable
                        //JN:new
                        data: {
                            'last_msg_id' : msgID,
                            'last_msg_date' : msgDate,
                            'isFull' : isFull,
                            'place' : place,
                            'date' : date
                        },
                        //JN:end
                        success: function (msg) {
                            //console.log(msg);
                            $(".ui-page-active > .ui-content > #title-top").after(msg);
                            $('div[data-role=collapsible]').collapsible();
                            $('.ui-page-active > .ui-content > div#title-top').empty();

                            if ($('.ui-page-active > .ui-content #fullari').size()) {
                                $(".ui-page-active #fullsem_flip").css("display", "");
                            } else {
                                $(".ui-page-active #fullsem_flip").css("display", "none");
                            }

                            displayFlip();
                            checkMoreViewButton();
                            popup();
                            if($('.ser-page').css('display') != 'none') {
                                $('.ser-page .detail a').not('.btn-pop, .mobile-globalmenu-list a').attr('target', '_blank');
                            }
                        },
                        error: function () {
                            // alert('通信エラーが発生しました。');
                        },
                    }),
                2000});
            }
            //JN:end
            function popup() {
                $('.popupcontent').each(function(e){
                    var popupId = $(this).attr('id');
                    $(this).popup ({
                        afteropen : function ( event , ui ) {
                            $pageChange = 0;
                        },
                        afterclose : function ( event, ui ) {
                            $('.ui-popup-screen').click( function (e) {
                                /* Close popup */
                                $(this).attr('class','ui-screen-hidden ui-popup-screen ui-overlay-a');
                                $('.ui-popup-container').removeClass('ui-popup-active');
                                $('.ui-popup-container').addClass('ui-popup-hidden');
                                $('.ui-popup-container').removeAttr('style');
                                $pageChange = 0;
                                e.stopPropagation();
                                return false;
                            });
                            $pageChange = 0;
                            /*Click button*/
                            $('.btn-close-popup').click( function () {
                                $('.ui-popup-screen').trigger('click');
                                $(this).closest('.popupcontent').popup("close");
                                e.stopPropagation();
                                return false;
                            });
                        }
                    });
                });
            }
            function last_msg_funtion()
            {
                var msgID = $(".ui-page-active > .ui-content .message_box:last").attr("id");
                var msgDate = $(".ui-page-active > .ui-content .message_link:last").attr("alt");
            
                $('.ui-page-active > .ui-content div#last_msg_loader').html('Loading...<img src="' + location.protocol + '//' + location.host + '/seminar/bigLoader.gif" />');

                var isFull = $('.ui-page-active > .ui-content input[name=isFull]').val();

                setTimeout(function() {
                    $.ajax({
                        type: "POST",
                        url: "/seminar/load_next_ser.php",
                        //data: "last_msg_id=" + msgID + "&last_msg_date=" + msgDate + "&isFull=" + isFull,//JN:disable
                              //JN:new
                              data: {
                                  'last_msg_id' : msgID,
                                  'last_msg_date' : msgDate,
                                  'isFull' : isFull,
                                  'place' : <?php echo "'$para3'" ?>
                              },
                              //JN:end
                        success: function (msg) {
                            //alert(msg);
                            /*
                            $(".message_box:last").after(msg);
                            $('div[data-role=collapsible]').collapsible();
                            $('div#last_msg_loader').empty();
        
                            if ($(".ui-page-active > .ui-content > .not-full").size() < 15) {
                               last_msg_funtion();
                               displayFlip();
                            }
                            */
                              //alert(msg);
                              //console.log("msg => " + msg);
                            $(".ui-page-active > .ui-content .message_box:last").after(msg);
                            $('div[data-role=collapsible]').collapsible();
                            $('.ui-page-active > .ui-content div#last_msg_loader').empty();
        
                              //if ($(msg).size() > 3 && $(".ui-page-active > .ui-content > .not-full").size() < <?php echo DEFAULT_SEMINAR_COUNT ?>) {
                              //    last_msg_funtion();
                              //}
                            if ($('.ui-page-active > .ui-content #fullari').size()) {
                                $(".ui-page-active #fullsem_flip").css("display", "");
                            } else {
                                $(".ui-page-active #fullsem_flip").css("display", "none");
                            }
                            displayFlip();
                            checkMoreViewButton();
                        },
                        error: function () {
                            // alert('通信エラーが発生しました。');
                        },
                    }),
                2000});
            }

            /*
            //スクロールによるリストの更新
            $(document).bind("scrollstop", function() {
                //alert("stopped scrolling");
                //alert( ($(window).scrollTop()+100) +' compare '+ ($(document).height()- $(window).height()));
                if (($(window).scrollTop()+100) > ($(document).height() - $(window).height())){
                    //alert('bottom');
                    var lastcount =  $(".title-date:last").attr("title");
                    if(lastcount >= 5) // check if there is more content to dislay (avoid loading more
                    {
                        last_msg_funtion();
                    }
                }
            });
            */
            function last_msg_funtion_for_button() {
                var msgID = $(".ui-page-active > .ui-content .message_box:last").attr("id");
                var msgDate = $(".ui-page-active > .ui-content .message_link:last").attr("alt");

                $('.ui-page-active > .ui-content div#last_msg_loader').html('Loading...<img src="' + location.protocol + '//' + location.host + '/seminar/bigLoader.gif" />');

                var isFull = $('input[name=isFull]').val();

                setTimeout(function() {
                    $.ajax({
                        type: "POST",
                        url: "/seminar/load_next_ser.php",
                        //data: "last_msg_id=" + msgID + "&last_msg_date=" + msgDate + "&isFull=" + isFull,//JN:disable
                        //JN:new
                        data: {
                            'last_msg_id' : msgID,
                            'last_msg_date' : msgDate,
                            'isFull' : isFull,
                            'place' : <?php echo "'$para3'" ?>
                        },
                        //JN:end
                        success: function (msg) {
                            //alert(msg);
                            //console.log("msg => " + msg);
                            $(".ui-page-active > .ui-content .message_box:last").after("<div class='load-more-box' style='display: none;'>" + msg + "</div>");

                            $('div[data-role=collapsible]').collapsible();
                            $('.ui-page-active > .ui-content div#last_msg_loader').empty();
                            //if ($(msg).size() > 3 && $(".ui-page-active > .ui-content > .not-full").size() < <?php echo DEFAULT_SEMINAR_COUNT ?>) {
                            //    last_msg_funtion();
                            //}
                            if ($('.ui-page-active > .ui-content #fullari').size()) {
                                $(".ui-page-active #fullsem_flip").css("display", "");
                            } else {
                                $(".ui-page-active #fullsem_flip").css("display", "none");
                            }
                            displayFlip();
                            checkMoreViewButton();
                            //JN:add
                            $('.JN').empty();
                            //JN:end
                        },
                        error: function () {
                            // alert('通信エラーが発生しました。');
                        },
                    }),
                2000});
            }

            function checkMoreViewButton()//JN: this is to check if there are any items, if there are more button displays
            {
                var msgID = $(".ui-page-active .message_box:last").attr("id");
                var msgDate = $(".ui-page-active .message_link:last").attr("alt");
                $.ajax({
                    type: "POST",
                    url: "/seminar/load_next_ser.php",
                    data: "last_msg_id=" + msgID + "&last_msg_date=" + msgDate,
                    success: function (msg2) {
                        var memberTitle = $(".ui-btn-inner").find(".member-title").parent().parent();
                        memberTitle.each(function(index, value){
                            value.style.backgroundColor = "#e8afaa";
                        });
                        $(".load-more-box").css("display", "block");

                        if ($(msg2).length <= 1) {
                            $(".ui-page-active #moreviewbutton").parent().hide();
                        } else {
                            $(".ui-page-active #moreviewbutton").parent().show();
                        }
                    }, error: function () {
                        // alert('通信エラーが発生しました。');
                    },
                });
            }
        </script>
        <script type="text/javascript">
            //20150220kawai@plate 満席セミナー表示の制御
            /*
             var hidefull = true;
             function hideFull(){
             $("select#flip-1").change(function(){
             if(hidefull){
             //                     location.href = location.pathname + "?isFull=on";
             $("head").append('<style type="text/css" class="fullsemcss">.full-seminar{display:block}</style>');
             hidefull = false;
             }else{
             //                     location.href = location.pathname + "?isFull=off";
             $(".fullsemcss").remove();
             hidefull = true;
             }
             var pos = $(".ui-page-active .legend").position().top;
             $('html,body').animate({
             scrollTop: pos + 80
             }, 1000);
             });
             }
             */
            function displayFlip() {
                /*
                 if($(".ui-page-active > .ui-content > .full-seminar").size() == 0){
            
                 $(".ui-page-active #fullsem_flip").css("display", "none");
                 } else {
            
                 $(".ui-page-active #fullsem_flip").css("display", "");
                 }
                 */
            }
            
            $(document).bind("pageload", function (e, data) {
            
            });

            $(document).ready(function(){
                if($('.ser-page').css('display') != 'none') {
                    $('.ser-page .detail a').not('.btn-pop, .mobile-globalmenu-list a').attr('target', '_blank');
                }
            });

            $(document).bind("pagechange", function () {
                $('input[name=isFull]').val('0');
                $(".ui-page-active #fullsem_flip").css("display", "none");
                $(".ui-page-active > .ui-content select#flip-1").change(function () {
                    // youso sakujo
                    $(".ui-page-active .separate-date-bloc").remove();
                    $(".ui-page-active .title-date").remove();
                    $(".ui-page-active .message_box").remove();
                    if ($('input[name=isFull]').val() == '0') {
                        $('input[name=isFull]').val('1');
                    } else {
                        $('input[name=isFull]').val('0');
                    }
                    //JN:171227
                    var jn_date = $(".ui-page-active > .ui-content .jn_selected_day:last").attr("alt");
                    if(jn_date == '' || jn_date == undefined)
                        load_list_first();
                    else
                        load_list_by_date();
                    //JN:end
                    //load_list_first();
                    var pos = $(".ui-page-active .legend").position().top;
                    $('html,body').animate({
                        scrollTop: pos + 80
                    }, 1000);
                });

                if ($(".ui-page-active #jqm-homeheader").html()) {
                    /* not access*/
                } else if ($pageChange == 1) {
                    //JN:171227
                    var jn_date = $(".ui-page-active > .ui-content .jn_selected_day:last").attr("alt");
                    if(jn_date == '' || jn_date == undefined)
                        load_list_first();
                    else
                    load_list_by_date();
                    //JN:end
                
                    //load_list_first();
                        //displayFlip();
                        //checkMoreViewButton();
                }
                $pageChange = 1;
                /*
                 if ($(".ui-page-active > .ui-content > .not-full").size() < <?php echo DEFAULT_SEMINAR_COUNT ?>) {
                 //if ($(".ui-page-active #jqm-homeheader").html()) {
                 //} else {
                 //last_msg_funtion();
                 //}
                 } else {
                 $(".ui-page-active #fullsem_flip").css("display", "none");
                 }
                 */
            });

            var _gaq = _gaq || [];

            _gaq.push(['_setAccount', 'UA-20563699-1']);

            _gaq.push(['_setDomainName', '.jawhm.or.jp']);

            _gaq.push(['_trackPageview']);


                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            
            jQuery("#footer-mobile-new-menu_dd_01").slideToggle("fast");

            $("#mobile-globalmenu-btn").live('click', function () {
                $.mobile.activePage.find("#mobile-globalmenu-list").slideToggle('fast', function () {
                    if ($("#mobile-globalmenu-list").css("display") == "none") {
                        //閉じた時-- Google Analytics
                        _gaq.push(['_trackEvent', 'button', 'click', 'menu-closed']);
                    } else {
                        //開いた時-- Google Analytics
                        _gaq.push(['_trackEvent', 'button', 'click', 'menu-opened']);
                    }
                });
                return false;
            });
            
            $("#mobile-globalmenu-list ul li a").live('click', function () {
                //メニュー項目のクリック時-- Google Analytics
                var href = $("#mobile-globalmenu-list ul li a").attr('href');
                //ga('send', 'event', 'link', 'click', href);
            });
            
            /*
             $("#footer-mobile-new-menu dt").live('click', function(){
             var dt_index = $("#footer-mobile-new-menu dt").index(this);
             //$.mobile.activePage.find("#footer-mobile-new-menu dd").eq(dt_index).slideToggle('fast');
             return false;
             });
             */
            /* $("#footer-mobile-new-menu_dt_01").live('click', function(){
             $.mobile.activePage.find("#footer-mobile-new-menu_dd_01").slideToggle('fast');
             return false;
            });*/
            jQuery("#footer-mobile-new-menu_dt_01").live('click', function () {
                jQuery("#footer-mobile-new-menu_dd_01").slideToggle("fast");
                return false;
            });
            
            $("#footer-mobile-new-menu_dt_02").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_02").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_03").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_03").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_04").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_04").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_05").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_05").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_06").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_06").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_07").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_07").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_08").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_08").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_09").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_09").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_10").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_10").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_11").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_11").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_12").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_12").slideToggle('fast');
                return false;
            });

            $("#footer-mobile-new-menu_dt_13").live('click', function () {
                $.mobile.activePage.find("#footer-mobile-new-menu_dd_13").slideToggle('fast');
                return false;
            });
        </script>
        <!-- ↑↑↑ 20141016追加 ↑↑↑ -->
        <script>
            function zentohan(inst) {
                var han = '1234567890abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz@-.';
                var zen = '１２３４５６７８９０ａｂｃｄｅｆｇｈｉｊｋｌｍｎｏｐｑｒｓｔｕｖｗｘｙｚＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ＠－．';
                var word = inst;
                for (i = 0; i < zen.length; i++) {
                    var regex = new RegExp(zen[i], "gm");
                    word = word.replace(regex, han[i]);
                }
                return word;
            }

            function check_mailkaiin(obj) {
                if($(obj).is(":checked")){
                    $("form#form_yoyaku").find("input[name='mailkaiin']").val("on");
                }
                else {
                    $("form#form_yoyaku").find("input[name='mailkaiin']").val("off");
                }
            }

            function fncyoyaku() {
                // 入力チェック
                if (session_mem_id != '' && !jQuery('#namae').val()) {
                    alert("お名前（氏）を入力してください。");
                    jQuery('#namae').focus();
                    return false;
                }

                if(session_mem_id == '') {
                    if(!jQuery('#name2').val()){
                        alert("お名前（名）を入力してください。");
                        jQuery('#name2').focus();
                        return false;
                    }

                    if(!jQuery('#furigana2').val()){
                        alert("ふりがな（名）を入力してください。");
                        jQuery('#furigana2').focus();
                        return false;
                    }
                }

                if (!jQuery('#furigana').val()) {
                    alert("ふりがな（氏）を入力してください。");
                    jQuery('#furigana').focus();
                    return false;
                }

                if (!jQuery('#email').val()) {
                    alert('メールアドレスを入力してください。');
                    jQuery('#email').focus();
                    return false;
                }

                jQuery('#email').val(zentohan(jQuery('#email').val()));
                var strMail = jQuery('#email').val();
                if (!strMail.match(/.+@.+\..+/)) {
                    alert('メールアドレスを確認してください。');
                    jQuery('#email').focus();
                    return false;
                }

                if (!jQuery('#tel').val()) {
                    alert('お電話番号を入力してください。');
                    jQuery('#tel').focus();
                    return false;
                }/*else if(jQuery('#tel').val()[0] != '0'){
                       alert('お電話番号を正しく入力してください');
                       jQuery('#tel').focus();
                       return false;
                }*/

                jQuery('#yoyakubtn').text('予約処理中...');
                $("#yoyakubtn").attr("disabled", true);
                $senddata = $("#form_yoyaku").serialize();
                $.ajax({
                    type: "POST",
                    url: "/yoyaku/yoyaku.php",
                    data: $senddata,
                    success: function (msg) {
                        //setup local Store
                        // Store
                        localStorage.removeItem("serid");
                        localStorage.setItem("serid", jQuery('#seminarno').val());
                        /*
                        // POST DATA to PARDOT -- minhquyen
                        $("#form_yoyaku").attr("action","https://go.pardot.com/l/401302/2017-08-16/8hhb9d");
                        //$("#form_yoyaku").attr("action","https://jawhm.bluecloudvn.com/dump/response.php");
                        $("#form_yoyaku").attr("method","POST");
                        $("#form_yoyaku").removeAttr("onsubmit");
                        $("#form_yoyaku").submit();
                        // end
                        */
                        
                        $('#yoyakubtn').text('完了');
                        location.href = '<?php print $url_thankyou; ?>';
                    },
                    error: function () {
                        $("#yoyakubtn").attr("disabled", false);
                        $('#yoyakubtn').text('通信エラーが発生しました! もう一回やってみてください。');
                    }
                });

                return false;
            }
            
            //Action after Select option button in seminarpage list
            $('.select-choice').live('change', function (e) {
                //$.mobile.changePage($(this).val(), {transition: "fade", reloadPage : true});//JN:disable
                //        $('.select-choice').listview('refresh');
                //JN:add
                //alert('https://' + '<?php echo $_SERVER['HTTP_HOST'] ?>' + $(this).val());
                window.location.href = 'https://' + '<?php echo $_SERVER['HTTP_HOST'] ?>' + $(this).val();//JN:add
                //JN:end
            });

            function fnc_logout()
            {
                if (confirm("ログアウトしますか？"))
                {
                    location.href = "/member/logout.php";
                }
            }
        </script>
        <script type="text/javascript" src="https://www.taglog.jp/www.jawhm.or.jp/taglog-x.js" async></script>
        <!-- Google Analytics -->
        <!--script type="text/javascript" src="https://<?php echo $_SERVER['SERVER_NAME'] ?>/js/google-analytics.js"></script-->
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KKVVF9Q');</script>
        <!-- End Google Tag Manager -->
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKVVF9Q"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <?php
        if ($para1 == '') {
        // トップページを表示
        ?>
            <div data-role="page" id="toppage" class="jquery">
                <?php
                    print display_header('無料セミナーを探そう');
                ?>
                <p id="topicpath"><a href="<?php echo $url_top; ?>" data-ajax="false">ワーキング・ホリデー協会</a>&nbsp;&gt;&nbsp;無料セミナー情報</p>
                <div data-role="content" class="sermina-content">
                    <ul class="reset-title" data-role="listview" data-inset="true" data-theme="a" data-dividertheme="a">
                        <li class="top-title" data-role="list-divider">ワーホリ・留学の無料セミナー</li>
                    </ul>
                    <p style="font-size: 17px;text-align: center;padding-bottom: 20px;">年間２０，０００人以上が参加する</br>       
                        ワーホリ・留学まるわかりセミナー        
                    </p>
                    <img src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/seminar/images/seminar_image.png" width="100%">
                    <div id="jqm-homeheader">
                        <p>きっと見つかる　あなたにピッタリの無料セミナー</p>
                    </div>
                    <p class="intro">日本ワーキング・ホリデー協会が随時開催している無料セミナーに参加して、留学・ワーホリの色々な情報をGETしよう！！</p>
                    <a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/seminar/ser/know/first" style="text-decoration: none; mar">
                        <div style="background-color:#67d417;width: 70%; margin: 0px auto; padding: 5px; border-radius: 5px; cursor: pointer; margin-top: 20px; margin-bottom: 20px">
                            <img src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/seminar/images/icon_beginner.png" style="width: 30px; float: left">        
                            <p style="text-align: center; color: #fff">     
                                <span style="">＼ 初めての方 ／</span></br>        
                                <span style="font-size: 17px;">まずは初心者セミナーへ</span>       
                            </p>
                        </div>
                    </a>
                    <div class="smlBanner">
                        <?php echo $ser_banner['all']; ?>
                    </div>
                    <div id="luudv_ser_2608">
                        <div style="border: 1px solid #000; padding: 10px 5px;">
                            <table>
                                <tr>
                                    <td colspan="2" style="font-size: 14px; font-weight: bold;">日本ワーキング・ホリデー協会とは？</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;"><img src="/images/katsuyou_step3_image.jpg" style="width: 100%;"></td>
                                    <td style="font-size: 11px; padding-left: 5px">ワーキングホリデー制度を支援・促進している、社会一般利益を目的とした非営利団体です。ワーホリを経験したカウンセラーが皆さんを徹底サポート。実体験から得た経験を踏まえた、きめ細かなアドバイスを心がけています。</td>
                                </tr>
                            </table>
                        </div>
                        <div class="paper-bg" style="padding: 10px; margin-top: 20px;">
                            <div style="font-size: 16px; font-weight: bold; margin-bottom: 5px">初心者セミナーのタイムテーブル
                                <a id="btnPlusMinus" data-toggle="collapse" onClick="openCollapse()"><i id="plus-minus" class="fa fa-plus-circle"></i></a>
                            </div>
                            <ul class="collapse" id="typeSeminar" style="font-size: 12px; padding-left: 10px;">
                                <li>〜前半30分〜</li>
                                <li>●講師の自己紹介</li>
                                <li>●ワーホリビザの概要について</li>
                                <li>●各国の魅力や特徴を紹介</li>
                                <li>〜後半30分〜</li>
                                <li>●おススメなワーホリの使い方</li>
                                <li>●気になる予算の話</li>
                                <li>●出発までの流れ</li>
                                <li>〜セミナー後〜</li>
                                <li>少人数のグループに分かれて質疑応答</li>
                                <p style="text-align: right;font-weight: normal;">※オフィスによって一部内容が異なります。</p>
                            </ul>
                        </div>
                        <div class="list-notes">
                            <p class="list-notes-title">セミナー体験者の声</p>
                            <ul>
                                <li class="note">皆さん同じように迷っている事が分かって心強くなりました。留学している子はみんな学生の時から準備していると思っていたので、私はもう遅いかなと思っていたのですが、その悩みが今日でなくなったので参加してよかったです。これから出発するにあたって具体的なプランも決めて行きたいと思います。（27歳 女性）</li>
                                <!-- <li class="note">具体的な体験談があって良かった　同じような境遇の方がいて少し安心したし、前向きになれたと思う。</br>（30歳　女性）</li>
                                    <li class="note">様々な留学への考えや、きっかけを聞けたのは非常に貴重でした。自分のやりたいことをもっと具体的に考えないといけないと思いました。（22歳　男性）</li>
                                    <li class="note">初めてですが、とてもわかりやすく親切にお話してくださり参加できてよかったです。（27歳　女性） </li>
                                    <li class="note">最後に少人数で色々聞けたのが良かったです。前もって何をすればよいか何となくわかってきた気がします。（26歳　女性）</li> -->
                            </ul>
                            <div class="show-more">
                                <a onclick="feedback()">続きを見る</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="title" data-role="list-divider">内容からセミナーを探す <a href="#" class="i-search"></a></div> -->
                    <!--ul data-role="listview" data-inset="true" data-theme="a" data-dividertheme="a">
                        <li id="first-btn"><a href="/seminar/ser/know/first"><img src="/images/seminaryoyaku/syoshinsya.png" alt="" class="ui-li-icon" />初心者セミナー</a></li>
                        <li id="plan-btn"><a href="/seminar/ser/know/plan"><img src="/images/seminaryoyaku/planning.png" alt="" class="ui-li-icon" />プランニング法セミナー</a></li>
                        <li id="student-btn"><a href="/seminar/ser/know/student"><img src="/images/seminaryoyaku/jouhou.png" alt="" class="ui-li-icon" />情報収集セミナー</a></li>
                        <li id="foot-btn"><a href="/seminar/ser/know/foot"><img src="/images/seminaryoyaku/kondan.png" alt="" class="ui-li-icon" />人数限定！懇談セミナー</a></li>
                        <li id="kouen-btn"><a href="/seminar/ser/know/kouen"><img src="/images/seminaryoyaku/taikendan.png" alt="" class="ui-li-icon" />体験談セミナー</a></li>
                        <li id="school-btn"><a href="/seminar/ser/know/school"><img src="/images/seminaryoyaku/school.png" alt="" class="ui-li-icon" />語学学校セミナー</a></li>
                        <li id="abili-btn"><a href="/seminar/ser/know/abili"><img src="/images/seminaryoyaku/chumoku.png" alt="" class="ui-li-icon" />注目！！人気のセミナー</a></li>
                        <li id="member-btn"><a href="/seminar/ser/page/member"><img src="/seminar/css/themes/images/icon7-18x18.png" alt="" class="ui-li-icon" />メンバー限定セミナー</a></li>
                        <li id="abili-btn"><a href="/seminar/ser/know/party"><img src="/images/seminaryoyaku/flower.png" alt="" class="ui-li-icon" />交流パーティー（要参加費）</a></li>
                        <li id="all-btn"><a href="/seminar/ser/know/all">全て</a></li>
                        </ul-->
                    <ul id="new-listview">
                        <li>
                            <div class="lv-title">【STEP1】 はじめての方</div>
                            <div class="lv-content">ワーホリの基礎を、ワーホリ経験者のカウンセラーが失敗談・成功談を交えてお届け。ご渡航をお悩み中の方もお気軽にご参加下さい。</div>
                            <a href="/seminar/ser/know/first"><button class="lv-button">初心者セミナーに申込む</button></a>
                        </li>
                        <li>
                            <div class="lv-title">【STEP2】 初心者向けセミナー参加済みの方</div>
                            <div class="lv-content">
                                <strong>&#9611; 成功するプランニング法セミナー</strong></br></br>
                                少人数制（最大12名）で、渡航するうえで 早めに決めておきたい目的・予算・時期 を明確にするためのワークショップです。
                            </div>
                            <a href="/seminar/ser/know/plan"><button class="lv-button">プランニングセミナーに申込む</button></a>
                        </li>
                        <li>
                            <div class="lv-title">【STEP3】 プランニングセミナー参加済みの方</div>
                            <div class="lv-content">
                                <strong>&#9611;国別渡航計画相談会</strong></br></br>
                                少人数制（最大6名）で行う相談会！１年 以内に渡航を検討している方に、おすす めの都市、語学学校、宿泊方法、具体的 な予算など細かい疑問にお答えします。
                            </div>
                            <a href="/seminar/ser/know/foot"><button class="lv-button">懇談カウンセリングに申込む</button></a>
                            <div class="lv-content">
                                一部の懇談カウンセリングは協会メンバ ー限定となっています。メンバー限定セ ミナーのご予約はこちらから。
                            </div>
                            <a href="/seminar/ser/know/member"><button class="lv-button">メンバー限定セミナーに申込む</button></a>
                        </li>
                        <li>
                            <div class="utilization">
                                <a href="/katsuyou.html">
                                <span>充実したサポート体制！</span><br>
                                <span>日本ワーキングホリデー協会の</span><br>
                                <span>メンバー制度について</span><br>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="lv-title">気になるセミナーに参加して情報取集！</div>
                            <div class="lv-content">
                                もっと情報収集したい！そんなあなたに、セミナーを用意しています。目的に合わせて、セミナーに参加してワーホリ・留学の準備しましょう。
                            </div>
                        </li>
                        <li>
                            <strong class="box-title">&#9611;ピンポイントな情報を知りたい方</strong></br>
                            <a href="/seminar/ser/know/recommended">
                                <div class="lv-box">
                                    <div class="lv-box-title">【徹底解説】 各種情報収集セミナー</div>
                                    <div class="lv-box-content">資格や英語ワークショップなど、よ りピンポイントな情報に特化したセ ミナーです。</div>
                                    <img class="arrow-right" src="/seminar/images/arrow-right.png">
                                </div>
                            </a>
                        </li>
                        <br/>
                        <li>
                            <strong class="box-title">&#9611; 帰国後の就職が不安な方</strong></br>
                            <a href="/seminar/ser/know/job_support">
                                <div class="lv-box">
                                    <div class="lv-box-title">就活ワークショップ＆お仕事相談会 </div>
                                    <div class="lv-box-content">留学・ワーホリの経験を就活に活 かす方法や、退職してからの渡航に 関する不安にお答えします。</div>
                                    <img class="arrow-right" src="/seminar/images/arrow-right.png">
                                </div>
                            </a>
                        </li>
                        <br/>
                        <li>
                            <strong class="box-title">&#9611; 語学学校のことが気になる方</strong></br>
                            <a href="/seminar/ser/know/school">
                                <div class="lv-box">
                                    <div class="lv-box-title">学校説明会</div>
                                    <div class="lv-box-content">各語学学校の特色と共に学校選び のポイントをお伝え。セミナーによ って参加特典などもあり。</div>
                                    <img class="arrow-right" src="/seminar/images/arrow-right.png">
                                </div>
                            </a>
                        </li>
                        <br/>
                        <li>
                            <strong class="box-title">&#9611; 実際どうなの？先輩の体験談が気になる方</strong></br>
                            <a href="/seminar/ser/know/kouen">
                                <div class="lv-box">
                                    <div class="lv-box-title">体験談セミナー</div>
                                    <div class="lv-box-content">現地での生活をイメージしやすく する、成功や失敗談など現地での 実体験をお伝え。</div>
                                    <img class="arrow-right" src="/seminar/images/arrow-right.png">
                                </div>
                            </a>
                        </li>
                        <br/>
                        <li>
                            <strong class="box-title">&#9611; 注目のセミナーをご紹介します</strong></br>
                            <a href="/seminar/ser/know/abili">
                                <div class="lv-box">
                                    <div class="lv-box-title">特別開催中のセミナー</div>
                                    <div class="lv-box-content">日本ワーキング・ホリデー協会では 特別なセミナーを多数開催してい ます。</div>
                                    <img class="arrow-right" src="/seminar/images/arrow-right.png">
                                </div>
                            </a>
                            <a href="/seminar/ser/know/party">
                                <div class="lv-box">
                                    <div class="lv-box-title">交流パーティー</div>
                                    <div class="lv-box-content">オフィスで一緒に楽しい時間を過 ごす交流会を開催しています。参加 して、留学仲間を増やしましょう！</div>
                                    <img class="arrow-right" src="/seminar/images/arrow-right.png">
                                </div>
                            </a>
                            <a href="/seminar/ser/know/business_trip">
                                <div class="lv-box">
                                    <div class="lv-box-title">ワーホリ出張セミナー</div>
                                    <div class="lv-box-content">海外経験豊富なスタッフが直接向 かい、ワーホリ協会の大人気セミナ ーをあなたの街でも開催します。</div>
                                    <img class="arrow-right" src="/seminar/images/arrow-right.png">
                                </div>
                            </a>
                        </li>
                        <br/>
                        <li>
                            <strong class="box-title">&#9611; メンバー限定セミナー</strong></br>
                            <a href="/seminar/ser/know/member">
                                <div class="lv-box">
                                    <div class="lv-box-title">メンバー限定セミナーに申込む</div>
                                    <div class="lv-box-content">出発前オリエンテーションや英語 セミナーなど、メンバー限定のセミ ナーをご予約いただけます。</div>
                                    <img class="arrow-right" src="/seminar/images/arrow-right.png">
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- 
                    <ul class="reset-title" data-role="listview" data-inset="true" data-theme="a" data-dividertheme="a">
                        <li class="title" data-role="list-divider">興味のある国からセミナーを探す <a class="i-search" href="#"></a></li>
                    </ul>
                    <div class="ui-grid-b">
                        <div class="ui-block-a"><a href="/seminar/ser/country/aus" data-mini="true" data-role="button" data-theme="d"><img src="/images/flag01.gif" /><span class="smaller-text">オーストラリア</span></a></div>
                        
                        <div class="ui-block-b"><a href="/seminar/ser/country/can" data-mini="true" data-role="button" data-theme="d"><img src="/images/flag03.gif" /><span class="smaller-text">カナダ</span></a></div>
                        
                        <div class="ui-block-c"><a href="/seminar/ser/country/nz" data-mini="true" data-role="button" data-theme="d"><img src="/images/flag02.gif" /><span class="smaller-text">ニュージーランド</span></a></div>
                    </div>
                        
                    <div class="ui-grid-b">
                        <div class="ui-block-a"><a href="/seminar/ser/country/uk"  data-role="button" data-theme="d"><img src="/images/flag07.gif" /><span class="smaller-text">イギリス</span></a></div>
                        
                        <div class="ui-block-b"><a href="/seminar/ser/country/fra"  data-role="button" data-theme="d"><img src="/images/flag05.gif" /><span class="smaller-text">フランス</span></a></div>
                        
                        <div class="ui-block-c"><a href="/seminar/ser/country/usa" data-role="button" data-theme="d"><img src="/images/seminaryoyaku/america.png" /><span class="smaller-text">アメリカ</span></a></div>
                    </div>
                        
                    <div class="ui-grid-solo">
                        <div class="ui-block-a"><a href="/seminar/ser/country/other" data-role="button" data-theme="d"><img src="/images/earth-medium.png" /><span class="smaller-text">その他</span></a></div>
                    </div> -->

                    <div class="title" data-role="list-divider">興味のある国からセミナーを探す <a href="#" class="i-search"></a></div>
                    <ul class="reset-title" data-role="listview" data-inset="true" data-theme="a" data-dividertheme="a">
                        <li><a href="/seminar/ser/country/aus"><img src="/images/i-au.png" alt="" class="ui-li-icon" />オーストラリア</a></li>
                        <li><a href="/seminar/ser/country/can"><img src="/images/i-ca.png" alt="" class="ui-li-icon" />カナダ</a></li>
                        <li><a href="/seminar/ser/country/nz"><img src="/images/i-nz.png" alt="" class="ui-li-icon" />ニュージーランド</a></li>
                        <li><a href="/seminar/ser/country/uk"><img src="/images/i-en.png" alt="" class="ui-li-icon" />イギリス</a></li>
                        <li><a href="/seminar/ser/country/fra"><img src="/images/i-iland.png" alt="" class="ui-li-icon" />フランス</a></li>
                        <li><a href="/seminar/ser/country/deu"><img src="/images/i-deu.gif" alt="" class="ui-li-icon" />ドイツ</a></li>
                        <li><a href="/seminar/ser/country/ire"><img src="/images/i-ire.gif" alt="" class="ui-li-icon" />アイルランド</a></li>
                        <li><a href="/seminar/ser/country/usa"><img src="/images/i-us.png" alt="" class="ui-li-icon" />アメリカ</a></li>
                        <li><a href="/seminar/ser/country/other">その他の国</a></li>
                    </ul>

                    <div class="title" data-role="list-divider">開催地からセミナーを探す <a class="i-search" href="#"></a></div>
                    <div class="ui-grid-a large-text">
                        <div class="ui-block-a"><a href="/seminar/ser/place/online<?php echo ($use_area) ? '/area' : ''; ?>" data-mini="true" data-role="button" data-theme="d">オンライン</a></div>
                        <div class="ui-block-b"><a href="/seminar/ser/place/tokyo<?php echo ($use_area) ? '/area' : ''; ?>" data-mini="true" data-role="button" data-theme="d">東京</a></div>
                    </div>
                    <div class="ui-grid-a large-text">
                        <div class="ui-block-a"><a href="/seminar/ser/place/osaka<?php echo ($use_area) ? '/area' : ''; ?>" data-mini="true" data-role="button" data-theme="d">大阪</a></div>
                        <div class="ui-block-b"><a href="/seminar/ser/place/nagoya<?php echo ($use_area) ? '/area' : ''; ?>" data-mini="true" data-role="button" data-theme="d">名古屋</a></div>
                    </div>
                    <div class="ui-grid-a large-text">
                        <div class="ui-block-a"><a href="/seminar/ser/place/fukuoka<?php echo ($use_area) ? '/area' : ''; ?>" data-mini="true" data-role="button" data-theme="d">九州エリア（福岡など）</a></div>
                        <div class="ui-block-b"><a href="/seminar/ser/place/okinawa<?php echo ($use_area) ? '/area' : ''; ?>" data-mini="true" data-role="button" data-theme="d">沖縄</a></div>
                    </div>
                    <div class="ui-grid-a large-text">
                        <div class="ui-block-a"><a href="/seminar/ser/place/toyama<?php echo ($use_area) ? '/area' : ''; ?>" data-mini="true" data-role="button" data-theme="d">富山</a></div>
                        <div class="ui-block-b"><a href="/seminar/ser/place/event<?php echo ($use_area) ? '/area' : ''; ?>" data-mini="true" data-role="button" data-theme="d">その他</a></div>
                    </div>
                </div>
                <?php print $c_footer; ?>
            </div>

        <?php
        }
        if ($para1 == 'id') {
        // 予約ページを表示
        ?>
            <div data-role="page" id="yoyaku<?php print $para1; ?>" class="jquery ser-id">
                <?php
                    print display_header('セミナー予約フォーム', false);
                ?>

                <!-- <p id="topicpath">
                    <?php if ($_SESSION['para1'] == 'kouen') { ?>
                        <a href="<?php echo $url_top; ?>" data-ajax="false">ワーキング・ホリデー協会</a>&nbsp;&gt;&nbsp;<a href="/kouenseminar.php" data-ajax="false" data-inline="true">留学・ワーホリ講演セミナー</a>&nbsp;&gt;&nbsp;セミナー予約フォーム
                    <?php } else { ?>
                        <a href="<?php echo $url_top; ?>" data-ajax="false">ワーキング・ホリデー協会</a>&nbsp;&gt;&nbsp;<a href="<?php print $url_home; ?>">無料セミナーを探そう</a>&nbsp;&gt;&nbsp;セミナー予約フォーム
                    <?php } ?>
                </p> -->

                <div data-role="content" data-theme="a">
                    <h2>ご参加予定のセミナー</h2>
                    <?php
                        $formon = false;

                        try {
                            $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_mail_list.ini', FALSE);
                            $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $db->query('SET CHARACTER SET utf8');
                            $rs = $db->query('SELECT id, year(hiduke) as yy, month(hiduke) as mm, day(hiduke) as dd, date_format(starttime, \'%c月%e日 (%a) %k:%i\') as start, date_format(starttime, \'%k:%i\') as starttime, title, memo, place, k_use, k_title1, k_desc1, k_desc2, k_stat, free, pax, booking, beginer FROM event_list WHERE id = ' . $para2);
                            $cnt = 0;
                            $place_name = "";

                            while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                                $formon = true;
                                $cnt++;
                                $year = $row['yy'];
                                $month = $row['mm'];
                                $day = $row['dd'];
                                $start = $row['start'] . '～';
                                //$start    = mb_ereg_replace('Mon', '月', $start);
                                //$start    = mb_ereg_replace('Tue', '火', $start);
                                //$start    = mb_ereg_replace('Wed', '水', $start);
                                //$start    = mb_ereg_replace('Thu', '木', $start);
                                //$start    = mb_ereg_replace('Fri', '金', $start);
                                //$start    = mb_ereg_replace('Sat', '土', $start);
                                //$start    = mb_ereg_replace('Sun', '日', $start);
                                $title = $row['k_title1'];
                                $beginer = $row['beginer'];

                                if ($row['free'] == 1) {
                                    // 有料セミナー
                                    if ($_SESSION['mem_id'] != '' && $_SESSION['mem_name'] != '' && $_SESSION['mem_level'] != -1) {
                                        $formon = true;
                                    } else {
                                        // 未ログイン
                                        $formon = false;
                                        print '<a target="_blank" href="' . $url_top . 'member" data-role="button" data-rel="back" data-theme="a">ご予約にはログインが必要です</a>';
                                    }
                                }
                                //$c_desc = $row['k_desc1'];
                                $c_desc = strip_tags($row['k_desc1'], '<font><b><table><tr><td><img>');

                                if ($row['k_stat'] == 1) {
                                    if ($row['booking'] >= $row['pax']) {
                                        //$formon = false;
                                        $c_img = '[満席です。キャンセル待ちとなります。]';
                                    } else {
                                        $c_img = '[残席わずかです。ご予約はお早めに]';
                                    }
                                } elseif ($row['k_stat'] == 2) {
                                    $formon = false;
                                    $c_img = '[満席です]';
                                } else {
                                    if ($row['booking'] >= $row['pax']) {
                                        //$formon = false;
                                        $c_img = '[満席です。キャンセル待ちとなります。]';
                                    } else {
                                        if ($row['booking'] >= $row['pax'] / 3) {
                                            $c_img = '[残席わずかです。ご予約はお早めに]';
                                        } else {
                                            $c_img = '';
                                        }
                                    }
                                }

                                print '<div data-role="content" data-collapsed="true" data-theme="a">';
                                print '<div style="color:red; font-weight:bold;">' . $c_img . '</div>';
                                print '<table>';
                                print '<tr id="place"><td style="vertical-align:top;"><img src="/seminar/images/tama_04.gif"></td><td style="vertical-align:top;">';
                                /*
                                switch($row['place']) {
                                    case 'tokyo':
                                        $place = '東京';
                                        break;
                                    case 'osaka':
                                        $place = '大阪';
                                        break;
                                    case 'fukuoka':
                                        $place = '福岡';
                                        break;
                                    case 'sendai':
                                        $place = '仙台';
                                        break;
                                    case 'toyama':
                                        $place = '富山';
                                        break;
                                    case 'okinawa':
                                        $place = '沖縄';
                                        break;
                                    case 'nagoya':
                                        $place = '名古屋';
                                        break;
                                    case 'event':
                                        $place = 'イベント';
                                        break;
                                }
                                */
                                $place = "";
                                if ($row['place'] == 'event') {
                                    $place = translate_city($row['k_desc2']);
                                    if (empty($place)) {
                                        $place = translate_city($row['place']);
                                    } else {
                                        $place_name = $place;
                                        $place .= "会場";
                                    }
                
                                    $para_place = $row['k_desc2'];
                                    if (empty($para_place)) {
                                        $para_place = $row['place'];
                                    }
                                    $para_place = $row['place'];
                                    $_SESSION['para2'] = $para_place;
                                } else {
                                    $place = translate_city($row['place']);
                                    $para_place = $row['place'];
                                    $_SESSION['para2'] = $para_place;
                                }
                
                                $_SESSION['date'] = $year . '-' . str_pad($month, 2, 0, STR_PAD_LEFT) . '-' . str_pad($day, 2, 0, STR_PAD_LEFT);
                
                                if ($row['place'] <> 'event') {
                                    print $place . '会場</td></tr>';
                                } else {
                                    print $place . '（会場を必ずご確認の上、ご予約ください）</td></tr>';
                                }
                                print '<tr id="start"><td style="vertical-align:top;"><img src="/seminar/images/tama_04.gif"></td><td style="vertical-align:top;">' . $start . '</td></tr>';
                                print '<tr id="title"><td style="vertical-align:top;"><img src="/seminar/images/tama_04.gif"></td><td style="vertical-align:top;">' . $title . '</td></tr>';
                                print '</table>';
                
                                if ($beginer !== '1') {
                                    print '<div style="background-color:LightPink; font-size:10pt; color:black; font-weight:bold; margin:6px 0 0 0; padding: 3px 5px 3px 5px;">';
                                    print '　【　ご注意　】<br/>';
                                    print '初めてセミナーご参加される場合は、<a href="/seminar/ser/know/first" target="_blank">初心者向けセミナー</a>へのご予約をお願いします。<br/>';
                                    print '</div>';
                                }
                
                                print '</div>';
                                print '<div style="margin:8px 0 12px 0;">';
                                print '<p style="color:red;">';
                                print '最近、会場を間違えてご予約される方が増えております。<br/>';
                                print 'セミナー内容、会場、日程等を十分ご確認の上、ご予約頂けますようお願い申し上げます。';
                                print '</p>';
                                print '<br>';
                                print '<p style="color:red;">';
                                print 'なお、ご入力頂いたお客様の個人情報は、<a style="color: red; text-decoration: underline;" href="https://www.jawhm.or.jp/privacy.html" target="_blank">当協会のプライバシーポリシー</a>に従い取扱を行います。';
                                print '</p>';
                                print '</div>';
                            }
                        } catch (PDOException $e) {
                            die($e->getMessage());
                        }

                        if ($para3 == 'area') {
                            $formon = false;
                    ?>
                            <p><br><br>
                                【ご注意】
                                <br><br>
                                このセミナーは、<span style="text-decoration: underline"><?php echo $title; ?></span>です。<br><br>
                                <?php
                                    if (!empty($place_name)) :
                                        echo 'このセミナーは<span style="font-size: 24px;">「' . $place_name . '」</span>の会場にて開催されます。<br><br>';
                                    endif;
                                ?>
                                会場にお間違いは無いでしょうか？<br><br>
                                よろしければ「次へ」を押して下さい。<br><br><br><br>
                            </p>
                    <?php
                            echo '<a href="/seminar/ser/id/' . $para2 . '"><input type="button" name="next" value="次へ" /></a>';
                        }
                    ?>
                    <!--
                        <a href="/seminar/ser/<?php print @$_SESSION['para1'] . '/' . @$_SESSION['para2'] . '/' . @$_SESSION['para3']; ?>" data-role="button" data-inline="true" data-rel="back" data-theme="a">戻る</a>
                    -->
                    <?php if ($formon) { ?>
                    <!--
                        <br/>
                    -->
                        <form action="/seminar/ser/book" method="post" id="form_yoyaku" class="frm-serminar" data-ajax="false" onsubmit="return(fncyoyaku());">
                            <span style="color:red;font-weight:bold;">●</span>印の項目は必ずご入力ください。<span style="display: block; float: right;">【全４項目】</span>
                            <input type="hidden" name="セミナー番号" id="seminarno" value="<?php print $para2; ?>" />
                            <?php
                                //set letter for booking
                                if ($_SESSION['para1'] == 'kouen')
                                    $letter = 'R';
                                elseif ($_SESSION['para2'] == 'event')
                                    $letter = 'W';
                                else
                                    $letter = 'S';
                            ?>
                            <input type="hidden" name="セミナー名" id="seminarname" value="<?php print '[' . $place . $letter . ']' . $start . ' ' . $title; ?>" />
                            <div data-role="fieldcontain">
                                <?php
                                    if (@$_SESSION['mem_id'] != '') {
                                        $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_member.ini', FALSE);
                                        $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $db->query('SET CHARACTER SET utf8');
                                        $stt = $db->prepare('SELECT id, email, namae, furigana, tel, country FROM memlist WHERE id = :id ');
                                        $stt->bindValue(':id', $_SESSION['mem_id']);
                                        $stt->execute();
                                        $member_info = $stt->fetch();
                                        echo '<input type="hidden" name="お名前" id="namae" value="' . $member_info['namae'] . '" size=20>';
                                        echo '<input type="hidden" name="フリガナ" id="furigana" value="' . $member_info['furigana'] . '" size=20>';
                                        echo '<input type="hidden" name="メール" id="email" value="' . $member_info['email'] . '" size=40>';
                                        echo '<input type="hidden" name="電話番号" id="tel" value="' . $member_info['tel'] . '" size=20>';
                                ?>
                                <script type="text/javascript">
                                    session_mem_id = "<?php echo $_SESSION['mem_id'] ?>";
                                </script>
                                <fieldset data-role="controlgroup">
                                    <legend>お名前</legend>
                                    <?php echo $member_info['namae']; ?>　様
                                </fieldset>
                                <?php } else { ?>
                                    <div class="form-group fg">
                                        <div class="label-line">
                                            <label for="namae">お名前</label>
                                            <span class="require-text">必須</span>
                                        </div>
                                        <div>
                                            <span class="lb-title-name">姓</span>
                                            <input type="text" name="お名前" id="namae" required 
                                            oninvalid="this.setCustomValidity('このフィールドを入力してください。')"
                                            oninput="this.setCustomValidity('')"
                                            value="<?php echo @$_SESSION['yoyaku']['edit_namae'] ?>"  placeholder="例）　山田"  class="form-control fc has-lb">
                                        </div>
                                        <div>
                                            <span class="lb-title-name">名</span>
                                            <input type="text" name="お名前2" id="name2" required 
                                            oninvalid="this.setCustomValidity('このフィールドを入力してください。')"
                                            oninput="this.setCustomValidity('')"
                                            value="" placeholder="例）　太郎" size="10" class="form-control fc has-lb">
                                        </div>
                                    </div>

                                    <div class="form-group fg">
                                        <div class="label-line"><label for="furigana">ふりがな</label><span class="require-text">必須</span></div>
                                        <div>
                                            <span class="lb-title-name">せい</span>
                                            <input type="text" name="フリガナ" id="furigana" required
                                            oninvalid="this.setCustomValidity('このフィールドを入力してください。')"
                                            oninput="this.setCustomValidity('')"
                                            value="<?php echo @$_SESSION['yoyaku']['edit_furigana'] ?>" placeholder="例） やまだ" size="10" class="form-control fc has-lb">
                                        </div>
                                        <div>
                                            <span class="lb-title-name">めい</span>
                                            <input type="text" name="フリガナ2" id="furigana2" required
                                            oninvalid="this.setCustomValidity('このフィールドを入力してください。')"
                                            oninput="this.setCustomValidity('')"
                                            value="" placeholder="例）たろう" size="10" class="form-control fc has-lb">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="label-line"><label for="tel">当日連絡の付く電話番号</label><span class="require-text">必須</span></div>
                                        <input type="tel" placeholder="09012345678" class="form-control" value="<?php echo @$_SESSION['yoyaku']['edit_tel'] ?>"  required
                                        oninvalid="this.setCustomValidity('このフィールドを入力してください。')"
                                        oninput="this.setCustomValidity('')"
                                        id="tel" name="電話番号">
                                    </div>

                                    <div class="form-group">
                                        <div class="label-line"><label for="mail">メールアドレス</label><span class="require-text">必須</span></div>
                                        <input type="email" placeholder="info@jawhm.or.jp" class="form-control" required
                                        oninvalid="this.setCustomValidity('このフィールドにメールを入力してください。')"
                                        oninput="this.setCustomValidity('')"
                                        id="email" value="<?php echo @$_SESSION['yoyaku']['edit_email'] ?>" name="メール">
                                        <p class="help-block">※予約確認のメールをお送りします。必ず有効なアドレスを入力してください。</p>
                                        <div class="hot-mail">
                                            <span class="gmail">Gmailアドレスをご利用の場合、</span><br/>仮予約時の予約確認のメールが迷惑メールフォルダに入ってしまう可能性がございます。<br>
                                            メールが届かない場合は一度迷惑メールフォルダをご確認ください。<br>
                                        </div>
                                        <div class="hot-mail">
                                            【重要：HOTMAIL等のメールをご利用の方へ】<br>
                                            hotmail、live.jp等のメアドをご利用の場合、確認メールが正しく届かない場合があります。<br>
                                            セミナー予約前に<a class="hm-link" target="_blank" href="https://www.jawhm.or.jp/blog/tokyoblog/%E4%BB%8A%E6%97%A5%E3%81%AE%E5%8D%94%E4%BC%9A%E3%82%AA%E3%83%95%E3%82%A3%E3%82%B9/2610/">こちらをご確認頂く</a>
                                            か、<u class="hm-link">他のメアドをご利用ください</u>。
                                        </div>
                                    </div>

                                <?php } ?>

                                <div class="form-group">
                                    <div class="label-line"><label>興味のある国</label></div>
                                    <select name="興味国[]" multiple="multiple" data-native-menu="false" data-mini="true"   class="form-control" style="padding: 5px 10px;">
                                        <option value="アメリカ">アメリカ</option>
                                        <option value="オーストラリア">オーストラリア</option>
                                        <option value="ニュージーランド">ニュージーランド</option>
                                        <option value="カナダ">カナダ</option>
                                        <option value="韓国">韓国</option>
                                        <option value="フランス">フランス</option>
                                        <option value="ドイツ">ドイツ</option>
                                        <option value="イギリス">イギリス</option>
                                        <option value="アイルランド">アイルランド</option>
                                        <option value="デンマーク">デンマーク</option>
                                        <option value="ノルウェー">ノルウェー</option>
                                        <option value="台湾">台湾</option>
                                        <option value="香港">香港</option>
                                        <option value="未定">未定</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="label-line"><label for="namae">出発予定時期</label></div>
                                    <select name="出発時期" class="form-control">
                                        <option value="">選択してください</option>
                                        <option value="3ヶ月以内">3ヶ月以内</option>
                                        <option value="6ヶ月以内">6ヶ月以内</option>
                                        <option value="1年以内">1年以内</option>
                                        <option value="2年以内">2年以内</option>
                                        <option value="未定">未定</option>
                                    </select>
                                </div>

                                <div id ="dohandiv" style="display: none;">
                                    <div class="checkbox checkbox-primary checkbox-hidden">
                                        <input type="checkbox" id="dohan" name="同伴者">
                                        <label for="dohan">同伴者有無</label>
                                    </div>

                                </div>

                                <script>
                                    attr =  document.getElementById("seminarno").value;
                                    if (attr == 35089) {
                                    document.getElementById("dohandiv").innerHTML = "<input type=\'checkbox\' name=\'同伴者\' style=\'display:none;\'><label for=\'dohan\'>同伴者有無</label><ul style=\'font-size:9pt\'><li style=\'color:red;font-weight:bold;\'>※こちらのイベントには同伴者不可となっております。</li><li style=\'color:red;font-weight:bold;\'>※お連れ様とのご参加をご希望の場合はそれぞれご予約ください。</li></ul>";
                                    //                                          document.getElementById("dohandiv").innerHTML = "<label style=\'display:none;\'><input type=\'checkbox\' name=\'同伴者\' id=\'txt_dohan\'>同伴者あり</label><ul><li style=\'color:red;font-weight:bold;\'>※こちらのイベントには同伴者不可となっております。</li><li style=\'color:red;font-weight:bold;\'>※お連れ様とのご参加をご希望の場合はそれぞれご予約ください。</li></ul>";
                                    }
                                </script>

                                <div class="checkbox checkbox-primary margin-checkbox">
                                    <!--input type="checkbox" id="mailkaiin" class="custom"  name="メール会員" checked-->
                                    <input type="checkbox" id="mailkaiin-input" class="custom" name="mailkaiin-input" checked onclick="check_mailkaiin(this);">
                                    <label for="mailkaiin-input" style="padding-bottom:15px;">このメールアドレスをメール会員(無料)に登録する</label>
                                    <input type="hidden" name="mailkaiin" value="on">
                                </div>

                                <div class="form-group">
                                    <div class="label-line"><label for="sonota">その他の情報</label></div>
                                    <textarea type="text" class="form-control" id="sonota"  value="<?php echo @$_SESSION['yoyaku']['edit_sonota'] ?>"  name="その他" style="resize: none;">
お住いの都道府県：
現地で成し遂げたい目標：
具体的な英語力の目標：
</textarea>
                                </div>
                            </div>

                            <button type="submit" data-role="none" data-rel="back" id="yoyakubtn" class="btn-form-reserve">
                                <p>仮予約する(無料)</p>
                                <p class="fs-smaller">※仮予約のメールが届きます。</p>
                            </button>

                            <table>
                                <tr>
                                    <td style="vertical-align:top;"></td>
                                    <td style="color:red;">メールに送りしたリンクにアクセスまで予約確定になりませんのでご注意ください。</td>
                                </tr>

                                <tr>
                                    <td style="vertical-align:top;"></td>
                                    <td>＜ご注意＞</td>
                                </tr>

                                <tr>
                                    <td style="vertical-align:top;"></td>
                                    <td>予約が確定されない場合、24時間で仮予約は自動的にキャンセルされセミナーに参加できません。ご注意ください。</td>
                                </tr>
                            </table>

                        </form>
                    <?php } ?>
                    <br/>
                    <!--
                        <a href="/seminar/ser/<?php print @$_SESSION['para1'] . '/' . @$_SESSION['para2'] . '/' . @$_SESSION['para3']; ?>" data-role="button" data-inline="true" data-rel="back" data-theme="a">戻る</a>
                    -->

                </div>
                <div id="footer-copyright-new">
                    Copyright© JAPAN Association for Working Holiday Makers All right reserved.
                </div>
            </div>
        <?php } else {

            if ($para1 == 'ana') {
            // 情報ページ表示
                switch ($para2) {
                    case 'first':
                        break;
                    case 'wh':
                        break;
                    case 'mem':
                        break;
                }
            } elseif ($para1 == 'douji') {
        ?>
            <div data-role="page" id="doujipage" class="jquery">
                <?php
                    print display_header('セミナー予約フォーム（同時開催）');
                ?>
                <p id="topicpath">
                    <a href="<?php echo $url_top; ?>" data-ajax="false">ワーキング・ホリデー協会</a>&nbsp;&gt;&nbsp;<a href="<?php print $url_home; ?>" data-inline="true">無料セミナーを探そう</a>&nbsp;&gt;&nbsp;同時開催
                </p>
                <div data-role="content">
                    <h2 class="title-city">セミナー会場を選択してください</h2>
                    <div style="margin: 0; padding: 5px; font-size:11pt;">
                        <p class="text01" style="text-align: center;">
                            このセミナーは複数の会場で開催されます。<br>
                            どの会場で予約しますか？<br><br>
                            <a href="javascript:void(0);" class="douji_yoyaku" data-ajax="false">ご予約はこちらから</a>
                            <br>
                        </p>
                    </div>
                    <div style="border: 1px dotted navy; margin: 0; padding: 5px; font-size:10pt;">
                        <table style="text-align: left;">
                            <tr>
                                <th style="font-weight: normal;">開催日時　　</th>
                                <td style="font-weight: bold;"><?php echo $douji_list[0]['start'] . '〜 '; ?></td>
                            </tr>
                            <tr>
                                <th style="font-weight: normal;" width="80px">セミナー名　</th>
                                <td style="font-weight: bold;"><?php echo $douji_list[0]['k_title1']; ?></td>
                            </tr>
                        </table>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            //$('.douji_yoyaku').live('click', function() {
                            //  $.mobile.silentScroll(10000);
                            //});
                            $('a.douji_yoyaku').live('click', function (e) {
                                e.preventDefault();
                                var y = $("#douji_yoyaku").offset().top;
                                $.mobile.silentScroll(y);
                            });
                        });
                    </script>

                    <div style="border: 1px dotted navy; margin-top: 10px; padding: 5px; font-size:10pt;">
                        <?php
                            $c_desc = strip_tags($douji_list[0]['k_desc1'], '<font><b><table><tr><td><img>');
                            
                            echo nl2br($c_desc);
                            ?>
                        <br><br><br>
                    </div>
                    <a name="#douji_yoyaku" id="douji_yoyaku"></a>
                    <?php
                        foreach ($douji_list as $one) :
                            $one['place_name'] = translate_city($one['place']);
                            echo '<a href="/seminar/ser/id/' . $one['id'] . '"><input type="button" name="' . $one['place'] . '" value="' . $one['place_name'] . '会場で予約する" /></a>';
                        
                        endforeach;
                    ?>
                </div>
                <?php print $c_footer; ?>
            </div>
        <?php } elseif ($para1 == 'login') { ?>

            <div data-role="page" id="loginpage" class="jquery">
                <?php
                    print display_header('セミナー予約フォーム（ログイン）');
                    ?>
                <p id="topicpath">
                    <a href="<?php echo $url_top; ?>" data-ajax="false">ワーキング・ホリデー協会</a>&nbsp;&gt;&nbsp;<a href="<?php print $url_home; ?>" data-inline="true">無料セミナーを探そう</a>&nbsp;&gt;&nbsp;ログイン
                </p>
                <div data-role="content">
                    <h2 class="title-city">ログイン</h2>
                    <p class="text01">
                        メンバー専用ページにログインします。<br>
                        ご登録頂いた、メールアドレスとパスワードでログインしてください。
                    </p>
                    <?php
                        if (!empty($msg)) :
                            ?>
                    <p style="color: #ff0000;"><?php echo $msg; ?></p>
                    <?php
                        endif;
                        ?>
                    <div style="border: 1px dotted navy; margin: 20px 0 10px 0; padding: 10px 10px 10px 10px; font-size:11pt;">
                        <form action="/seminar/ser/login/<?php echo $para2; ?>" method="post">
                            <input type="hidden" name="act" value="login">
                            <p class="text01" style="text-align:left;">
                                メールアドレス&nbsp;<input type="text" size="30" name="email" value="<?php echo htmlspecialchars(@$_POST['email']); ?>">&nbsp;<br>
                                パスワード&nbsp;<input type="password" size="20" name="pwd" value="<?php echo htmlspecialchars(@$_POST['pwd']); ?>">&nbsp;<br><br>
                                <input type="submit" value="　ログイン">
                            </p>
                        </form>
                        <div style="border: 1px solid navy; margin: 20px 10px 16px 10px; padding: 10px 10px 10px 10px; font-size:11pt; ">
                            <p style="text-align: center;">
                                パスワードが解らない、<br>
                                登録時のメールアドレスを忘れた場合は<br>
                                <a target="_self" href="/member">こちら</a>
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="banner-member">
                        <a onclick="member()">
                            <img style="width: 100%;" src="/images/login/member.jpg">
                        </a>
                    </div>
                    <br>
                    <a href="/seminar/ser/" data-role="button" data-inline="true" data-rel="back" data-theme="a">戻る</a>
                    <br>
                </div>
                <?php print $c_footer; ?>
            </div>
        <?php } else {
                // 各ページを表示
        ?>
            <div data-role="page" id="serpage<?php print $para1 . $para2 . $para3; ?>" class="jquery ser-page ser<?php print $para1 . $para2 ?>">
                <?php
                    print display_header('無料セミナーを探そう');
                ?>
                <p id="topicpath">
                    <?php if ($para1 == 'kouen') { ?>
                        <a href="<?php echo $url_top; ?>" data-ajax="false">ワーキング・ホリデー協会</a>&nbsp;&gt;&nbsp;<a href="/kouenseminar.php" data-ajax="false" data-inline="true">留学・ワーホリ講演セミナー</a>&nbsp;&gt;&nbsp;会場選択
                    <?php } else { ?>
                        <a href="<?php echo $url_top; ?>" data-ajax="false">ワーキング・ホリデー協会</a>&nbsp;&gt;&nbsp;<a href="<?php print $url_home; ?>" data-inline="true">無料セミナーを探そう</a>&nbsp;&gt;&nbsp;会場選択
                    <?php } ?>
                </p>

                <div data-role="content">
                    <?php
                        if ($para1 == 'place')
                            $para3 = $para2;
                        elseif ($para1 != 'kouen') {
                    ?>
                        <?php if($para1 == "know" && $para2 == "first") { ?>     
                            <img src="/seminar/images/seminar_beginner.png" width="100%">     
                            </br>       
                            <p style="text-align: center; font-size: 15px; font-weight: bold">セミナー講師は、みんなワーホリ経験者。</br>      
                                体験談を交えながらわかりやすくお伝えします。</br>     
                                まずは、基本のキから情報収集しよう！      
                            </p>
                            </br></br>      
                            <p style="text-align: center; font-size: 15px; font-weight: bold">▼会場を選んで、日時を選択してください。</p>
                            </br>       
                        <?php } ?>
                        <div class="locallist">
                            <div>
                                <p style="text-align: right; font-size: 9px; margin-right: 3px;">
                                    <a target="_self" href="/qa.html#question_seminar">セミナーに関するよくある質問</a>
                                </p>
                            </div>
                            </br>
                            <?php if($para1 == "know" && $para2 == "foot") { ?>  
                                <div>
                                    <style>
                                        mark.red {
                                        color:#ff0000;
                                        background: none;
                                        }
                                    </style>
                                    <p style="text-align: center;font-size: 18px;font-weight: bold;">人数限定の懇談カウンセリングで </br> ワーホリを具体的に進めよう</p>
                                    <img src="/seminar/images/ser_img.png" width="100%" style="padding-top: 10px; padding-bottom: 10px">
                                    <p style="font-size: 18px;font-weight: bold;">懇談カウンセリングとは？</p>
                                    <p><mark class="red" style="font-weight: bold">プロのカウンセラーにワーホリや留学について相談できる懇談形式のカウンセリング</mark>です。渡航を具体的に考えている方がご参加されるため「他の方の相談内容を聞くうちに新しい発見をすることができました」など渡航プラン決定の参考になると、<mark class="red" style="font-weight: bold">多くの参加者から好評をいただいています</mark>。あなたの渡航プランをカウンセラーと一緒に決めていきましょう！</p>
                                    </br>
                                    <p style="font-size: 16px; font-weight: bold;">▼会場を選んで、日時を選択してください</p>
                                </div>
                                </br>
                            <?php } ?>
                            <p>会場選択</p>
                            <select name="select-choice-city" id="select-choice-city" class="select-choice"  data-native-menu="true" data-theme="a">
                                <optgroup label="会場選択">
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/online/' . $para4; ?>" <?php
                                        if ($para3 == 'online') {
                                            print ' selected';
                                        }
                                        ?>>オンライン</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/tokyo/' . $para4; ?>" <?php
                                        if ($para3 == 'tokyo') {
                                            print ' selected';
                                        }
                                        ?>>東京</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/osaka/' . $para4; ?>" <?php
                                        if ($para3 == 'osaka') {
                                            print ' selected';
                                        }
                                        ?>>大阪</option>
                                    <!--                           <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/sendai/' . $para4; ?>" <?php
                                        if ($para3 == 'sendai') {
                                            print ' selected';
                                        }
                                        ?>>仙台</option>  -->
                                    <!--                           <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/toyama/' . $para4; ?>" <?php
                                        if ($para3 == 'toyama') {
                                            print ' selected';
                                        }
                                        ?>>富山</option>  -->
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/fukuoka/' . $para4; ?>" <?php
                                        if ($para3 == 'fukuoka') {
                                            print ' selected';
                                        }
                                        ?>>九州エリア（福岡など）</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/nagoya/' . $para4; ?>" <?php
                                        if ($para3 == 'nagoya') {
                                            print ' selected';
                                        }
                                        ?>>名古屋</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/okinawa/' . $para4; ?>" <?php
                                        if ($para3 == 'okinawa') {
                                            print ' selected';
                                        }
                                        ?>>沖縄</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/toyama/' . $para4; ?>" <?php
                                        if ($para3 == 'toyama') {
                                            print ' selected';
                                        }
                                        ?>>富山</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/event/' . $para4; ?>" <?php
                                        if ($para3 == 'event') {
                                            print ' selected';
                                        }
                                        ?>>その他の会場</option>
                                </optgroup>
                            </select>
                        </div>
                    <?php
                        if ($para3 == '')
                            $para3 = 'online';
                        if ($para1 == 'know') {
                            $array_icon_available = array('all', 'aus', 'can', 'nz', 'uk', 'fra', 'other');
                            if (in_array($para4, $array_icon_available))
                                $display_title = ' select-country-' . $para4;
                            else
                                $display_title = '';
                    ?>
                            <div class="locallist<?php echo $display_title; ?>">
                                <p>興味のある国選択</p>
                                <select name="select-choice-country" id="select-choice-country" class="select-choice" data-native-menu="true" data-theme="a">
                                    <optgroup label="興味のある国選択">
                                        <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/all" <?php
                                            if ($para4 == 'all') {
                                                print ' selected';
                                            }
                                            ?>>全て</option>
                                        <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/aus" <?php
                                            if ($para4 == 'aus') {
                                                print ' selected';
                                            }
                                            ?>>オーストラリア</option>
                                        <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/can" <?php
                                            if ($para4 == 'can') {
                                                print ' selected';
                                            }
                                            ?>>カナダ</option>
                                        <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/nz" <?php
                                            if ($para4 == 'nz') {
                                                print ' selected';
                                            }
                                            ?>>ニュージーランド</option>
                                        <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/uk" <?php
                                            if ($para4 == 'uk') {
                                                print ' selected';
                                            }
                                            ?>>イギリス</option>
                                        <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/fra" <?php
                                            if ($para4 == 'fra') {
                                                print ' selected';
                                            }
                                            ?>>フランス</option>
                                        <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/usa" <?php
                                            if ($para4 == 'usa') {
                                                print ' selected';
                                            }
                                            ?>>アメリカ</option>
                                        <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/other" <?php
                                            if ($para4 == 'other') {
                                                print ' selected';
                                            }
                                            ?>>その他</option>
                                    </optgroup>
                                </select>
                            </div>
                    <?php } elseif ($para1 == 'country') {
                            $array_icon_available = array('all', 'first', 'school', 'kouen', 'student', 'foot', 'abili', 'plan');
                            if (in_array($para4, $array_icon_available))
                                $display_title = ' select-' . $para4;
                            else
                                $display_title = '';
                    ?>
                        <div class="locallist<?php echo $display_title; ?>">
                            <p>セミナーの内容選択</p>
                            <select name="select-choice-know" id="select-choice-know" class="select-choice" data-native-menu="true" data-theme="a">
                                <optgroup label="セミナーの内容選択">
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/all" <?php
                                        if ($para4 == 'all') {
                                            print ' selected';
                                        }
                                        ?>>全て</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/first" <?php
                                        if ($para4 == 'first') {
                                            print ' selected';
                                        }
                                        ?>>初心者向け</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/plan" <?php
                                        if ($para4 == 'plan') {
                                            print ' selected';
                                        }
                                        ?>>プランニング法セミナー</option>
                                    <!-- <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/student" <?php
                                        if ($para4 == 'student') {
                                            print ' selected';
                                        }
                                        ?>>情報収集セミナー</option> -->
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/foot" <?php
                                        if ($para4 == 'foot') {
                                            print ' selected';
                                        }
                                        ?>>人数限定！懇談セミナー</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/member" <?php
                                        if ($para4 == 'member') {
                                            print ' selected';
                                        }
                                        ?>>メンバー限定セミナー</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/recommended" <?php
                                        if ($para4 == 'recommended') {
                                            print ' selected';
                                        }
                                        ?>>【徹底解説】 各種情報収集セミナー</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/job_support" <?php
                                        if ($para4 == 'job_support') {
                                            print ' selected';
                                        }
                                        ?>>就活ワークショップ＆お仕事相談会</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/school" <?php
                                        if ($para4 == 'school') {
                                            print ' selected';
                                        }
                                        ?>>学校説明会</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/kouen" <?php
                                        if ($para4 == 'kouen') {
                                            print ' selected';
                                        }
                                        ?>>体験談セミナー</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/abili" <?php
                                        if ($para4 == 'abili') {
                                            print ' selected';
                                        }
                                        ?>>特別開催中のセミナー</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/party" <?php
                                        if ($para4 == 'party') {
                                            print ' selected';
                                        }
                                        ?>>交流パーティー</option>
                                    <option value="/seminar/ser/<?php print $para1 . '/' . $para2 . '/' . $para3; ?>/business_trip" <?php
                                        if ($para4 == 'business_trip') {
                                            print ' selected';
                                        }
                                        ?>>ワーホリ出張セミナー</option>
                                </optgroup>
                            </select>
                        </div>
                    <?php }
                        if (($para1 == 'know' && $para4 == '') || ($para1 == 'country' && $para4 == ''))
                            $para4 = 'all';
                        }
                    ?>
                        <div class="smlBanner" style="margin-bottom:8px;">
                            <?php echo $ser_banner[$para3]; ?>
                        </div>
                    <?php
                        switch ($para1 . $para2) {
                            case 'pagemember':
                                print '<h2 id="p-member">メンバー限定セミナーを予約する</h2>';
                                break;

                            case 'countryaus':
                                print '<h2 class="title-country" id="c-aus">オーストラリアのセミナー</h2>';
                                break;

                            case 'countrynz':
                                print '<h2 class="title-country" id="c-nz">ニュージーランドのセミナー</h2>';
                                break;

                            case 'countrycan':
                                print '<h2 class="title-country" id="c-can">カナダのセミナー</h2>';
                                break;

                            case 'countryuk':
                                print '<h2 class="title-country" id="c-uk">イギリスのセミナー</h2>';
                                break;

                            case 'countryfra':
                                print '<h2 class="title-country" id="c-fra">フランスのセミナー</h2>';
                                break;

                            case 'countrydeu':
                                print '<h2 class="title-country" id="c-deu">ドイツのセミナー</h2>';
                                break;

                            case 'countryire':
                                print '<h2 class="title-country" id="c-ire">アイルランドのセミナー</h2>';
                                break;

                            case 'countryusa':
                                print '<h2 class="title-country" id="c-usa">アメリカのセミナー</h2>';
                                break;

                            case 'countryother':
                                print '<h2 class="title-country" id="c-other">その他の国のセミナー</h2>';
                                break;

                            case 'countryall':
                                print '<h2 class="title-country" id="c-all">全て国のセミナー</h2>';
                                break;

                            case 'knowfirst':
                                print '<h2 class="title-know" id="k-first">初心者セミナー</h2>';
                                print '<p>初めてセミナーにご参加される場合にお勧めのセミナーです。</p>';
                                break;

                            case 'knowplan':
                                print '<h2 class="title-know" id="k-kouen">プランニング法セミナー</h2>';
                                print '<p>ワーホリ＆留学のプランを検討する為のセミナーです。</p>';
                                break;

                            case 'knowfoot':
                                print '<h2 class="title-know" id="k-foot">人数限定！懇談セミナー</h2>';
                                print '<p>人数限定！少人数で何でも質問できるセミナーです。</p>';
                                break;

                            case 'knowmember':
                                print '<h2 id="p-member">メンバー限定セミナーに申込む</h2>';
                                break;

                            case 'knowrecommended':
                                print '<h2 class="title-know" id="k-student">【徹底解説】 各種情報収集セミナー</h2>';
                                print '<p>資格や英語ワークショップなど、よ りピンポイントな情報に特化したセ ミナーです。</p>';
                                break;

                            case 'knowjob_support':
                                print '<h2 class="title-know" id="k-student">就活ワークショップ＆お仕事相談会</h2>';
                                print '<p>留学・ワーホリの経験を就活に活 かす方法や、退職してからの渡航に 関する不安にお答えします。</p>';
                                break;

                            case 'knowschool':
                                print '<h2 class="title-know" id="k-school">語学学校セミナー</h2>';
                                print '<p>語学学校の必要性や、様々な特徴のある語学学校を紹介するセミナーです。</p>';
                                break;

                            case 'knowkouen':
                                print '<h2 class="title-know" id="k-kouen">体験談セミナー</h2>';
                                print '<p>現地での生活をイメージしやすく する、成功や失敗談など現地での 実体験をお伝え。</p>';
                                break;

                            case 'knowstudent':
                                print '<h2 class="title-know" id="k-student">情報収集セミナー</h2>';
                                print '<p>国比較や現地の詳しい情報など、もっともっと深いセミナーです。</p>';
                                break;

                            case 'knowabili':
                                print '<h2 class="title-know" id="k-abili">特別開催中のセミナー</h2>';
                                print '<p>日本ワーキング・ホリデー協会では 特別なセミナーを多数開催してい ます。</p>';
                                break;

                            case 'knowparty':
                                print '<h2 class="title-know" id="k-student">交流パーティー</h2>';
                                print '<p>オフィスで一緒に楽しい時間を過 ごす交流会を開催しています。参加 して、留学仲間を増やしましょう！</p>';
                                break;

                            case 'knowbusiness_trip':
                                print '<h2 class="title-know" id="k-student">ワーホリ出張セミナー</h2>';
                                print '<p>海外経験豊富なスタッフが直接向 かい、ワーホリ協会の大人気セミナ ーをあなたの街でも開催します。</p>';
                                break;

                            case 'knowall':
                                print '<h2 class="title-know" id="k-all">全て</h2>';
                                print '<p>全て、内容からセミナーを探す</p>';
                                break;

                            case 'placetokyo':
                                print '<h2 class="title-city">東京会場のセミナー</h2>';
                                print '<br><p align="center"><a target="_blank" href="/event/map/pc.php?p=tokyo" class="btn-place">会場のご案内</a></p>';
                                break;

                            case 'placeosaka':
                                print '<h2 class="title-city">大阪会場のセミナー</h2>';
                                print '<br><p target="_blank" align="center"><a href="/event/map/pc.php?p=osaka" class="btn-place">会場のご案内</a></p>';
                                break;

                            case 'placesendai':
                                print '<h2 class="title-city">仙台会場のセミナー</h2>';
                                break;

                            case 'placetoyama':
                                print '<h2 class="title-city">富山会場のセミナー</h2>';
                                break;

                            case 'placefukuoka':
                                print '<h2 class="title-city">福岡会場のセミナー</h2>';
                                print '<br><p align="center"> <a target="_blank" href="/event/map/pc.php?p=fukuoka" class="btn-place">会場のご案内</a></p>';
                                break;

                            case 'placenagoya':
                                print '<h2 class="title-city">名古屋会場のセミナー</h2>';
                                print '<br><p align="center"><a target="_blank" href="/event/map/pc.php?p=nagoya" class="btn-place">会場のご案内</a></p>';
                                break;

                            case 'placeokinawa':
                                print '<h2 class="title-city">沖縄会場のセミナー</h2>';
                                print '<br><p align="center"><a target="_blank" href="/event/map/pc.php?p=okinawa" class="btn-place">会場のご案内</a></p>';
                                break;

                            case 'placeevent':
                                print '<h2 class="title-city">イベント情報</h2>';
                                break;
                        }
                    ?>
                    <?php
                        // イベント読み込み
                        $cal = array();

                        try {
                            $ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
                            $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            //$db->query('SET CHARACTER SET utf8');
                            //$rs = $db->query('SELECT id, year(hiduke) as yy, month(hiduke) as mm, day(hiduke) as dd, title, memo, place, k_use, k_title1, k_desc1, k_stat FROM event_list WHERE k_use = 1 AND hiduke >= "'.date("Y/m/d",strtotime("-1 week")).'"  ORDER BY hiduke, id');
                            // パラメータ確認
                            $where_place = '';
                            //Keyword Where_country Where_know
                            //-------------------------------
                            $where_country = ' ( 1=0';
                            $where_know = ' ( 1=0';
                            if ($para1 == 'country') {
                                $where_country .= where_country($para2);
                                $where_know .= where_know($para4);
                            } elseif ($para1 == 'know') {
                                $where_country .= where_country($para4);
                                $where_know .= where_know($para2);
                            }

                            $where_country .= ' ) ';
                            $where_know .= ' ) ';

                            $stt = $db->prepare('SELECT * FROM place WHERE area = :place ');
                            $stt->bindValue(':place', $para3);
                            $stt->execute();
                            $place_list = array();

                            while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                                $place_list[] = $row;
                            }

                            if (empty($place_list) or $use_area == false) {
                                $stt = $db->prepare('SELECT * FROM place WHERE place = :place ');
                                $stt->bindValue(':place', $para3);
                                $stt->execute();
                                $place_info = $stt->fetch();
                                $searchplus = "";
                                if (!empty($place_info['searchplus'])) {
                                    $searchplus = ' or  k_title1 like \'%' . $place_info['name'] . '%\'';
                                }
                                $where_place = '(place = \'' . $para3 . '\' or k_desc2 like \'%' . $para3 . '%\' ' . $searchplus . ' ) ';
                            } else {
                                $wheres = array();
                                foreach ($place_list as $info) {
                                    $searchplus = "";
                                    if (!empty($info['searchplus'])) {
                                        $searchplus = ' or  k_title1 like \'%' . $info['name'] . '%\'';
                                    }
                                    $wheres[] = '(place = \'' . $info['place'] . '\' or k_desc2 like \'%' . $info['place'] . '%\' ' . $searchplus . ' ) ';
                                }
                                $where_place = '( ' . implode(" or ", $wheres) . ' )';
                            }
                            /*
                            if ($para3 == 'fukuoka')
                                $where_place = ' ( place = \''.$para3.'\' or k_title1 like \'%福岡%\' ) ';
                            else
                                $where_place = ' ( place = \''.$para3.'\' ) ';
                            */
                            $keyword = '';
                            if ($where_place <> '')
                                $keyword .= ' and ' . $where_place;
                            if ($where_country != ' ( 1=0 ) ')
                                $keyword .= ' and ' . $where_country;
                            if ($where_know <> ' ( 1=0 ) ')
                                $keyword .= ' and ' . $where_know;
                            //---------------------------------
                            //Selected day from calendar module
                            //---------------------------------
                            if ($_SESSION['para1'] == 'place' && !empty($_SESSION['para6'])) {
                                $rs_selected = $db->query('SELECT id, hiduke, year(hiduke) as yy, month(hiduke) as mm, day(hiduke) as dd, date_format(starttime, \'%c月%e日 (%a) %k:%i\') as start, date_format(starttime, \'%k:%i\') as starttime, title, memo, place, k_use, k_title1, k_desc1, k_desc2, k_stat, free, pax, booking, group_color, indicated_option, broadcasting, country_code FROM event_list WHERE id=\'' . $_SESSION['para6'] . '\'');

                                $row_selected = $rs_selected->fetch(PDO::FETCH_ASSOC);
                                $year = $row_selected['yy'];
                                $month = $row_selected['mm'];
                                $day = $row_selected['dd'];

                                $start = $row_selected['start'] . '～';
                                $start = mb_ereg_replace('Mon', '月', $start);
                                $start = mb_ereg_replace('Tue', '火', $start);
                                $start = mb_ereg_replace('Wed', '水', $start);
                                $start = mb_ereg_replace('Thu', '木', $start);
                                $start = mb_ereg_replace('Fri', '金', $start);
                                $start = mb_ereg_replace('Sat', '土', $start);
                                $start = mb_ereg_replace('Sun', '日', $start);
                        
                                $title = $start . ' ' . $row_selected['k_title1'];
                                $japanese_city_name = "";
                                if ($row_selected['place'] == 'event') {
                                    $japanese_city_name = translate_city($row_selected['k_desc2']);
                                    if (empty($japanese_city_name)) {
                                        $japanese_city_name = translate_city($row_selected['place']);
                                    }
                                } else {
                                    $japanese_city_name = translate_city($row_selected['place']);
                                }
                        
                                $c_desc = strip_tags($row_selected['k_desc1'], '<font><b><table><tr><td><img><a>');
                        
                                if ($row['k_stat'] == 1) {
                                    if ($row_selected['booking'] >= $row_selected['pax'])
                                        $c_img = '[満席です。キャンセル待ち可能です]';
                                    else
                                        $c_img = '[残席わずかです。ご予約はお早めに]';
                                } elseif ($row_selected['k_stat'] == 2) 
                                    $c_img = '[満席です]';
                                else {
                                    if ($row_selected['booking'] >= $row_selected['pax'])
                                        $c_img = '[満席です。キャンセル待ち可能です]';
                                    else {
                                        if ($row_selected['booking'] >= $row_selected['pax'] / 3)
                                            $c_img = '[残席わずかです。ご予約はお早めに]';
                                        else
                                            $c_img = '';
                                    }
                                }
                        
                                if ($c_img <> '')
                                    $c_img = '<h3 class="last-seat">' . $c_img . '</h3>';

                                //check flag
                                if (!empty($row_selected['country_code']))
                                    $flag = '<span class="flag ' . $row_selected['country_code'] . '"></span>';
                                else
                                    $flag = '';

                                //Check if live or not
                                if ($row_selected['broadcasting'] != 0)
                                    $icon_live = '<span class="broadcast"></span>';
                                else
                                    $icon_live = '';
                        
                                //Check the option statut
                                switch ($row_selected['indicated_option']) {
                                    case 0:
                                        $indication = '';
                                        break;

                                    case 1:
                                        $indication = '<span class="osusume"></span>';
                                        break;

                                    case 2:
                                        $indication = '<span class="shinchyaku"></span>';
                                        break;
                                }
                                //get color groupe or set gray if empty
                                if ($row_selected['group_color'] == '')
                                    $color_group = '#999';
                                else
                                    $color_group = $row_selected['group_color'];
                        
                                $yobi = array('日', '月', '火', '水', '木', '金', '土');
                                $print_selected = mktime(0, 0, 0, $_SESSION['para4'], $_SESSION['para5'], $_SESSION['para3']);

                                // message to display pha nay hien thi trong o mau hong va vang
                                $c_msg = '<h3 class="title-date selected-title-date">' . date('n月j日 (' . $yobi[date('w', $print_selected)] . ')', $print_selected) . '&nbsp;&nbsp;' . $icon_live . '</h3>';
                                $c_msg .= '<div id="' . $row_selected['id'] . '-0" class="message_box">';
                        
                                if ($row_selected['hiduke'] < date('Y-m-d')) {
                                    $link = '';
                                    $c_msg .= '<div class="">';
                                } else {
                                    $link = 'onclick="window.open(\'/seminar/ser/id/' . $row_selected['id'] . '\',\'_self\')"';
                                    $c_msg .= '<div  alt="' . $row_selected['hiduke'] . '" class="message_link selected_day">';
                                }
                        
                                $c_msg .= $c_img;
                                $c_msg .= '<h3 class="time-place-seminar" style="border-color:' . $color_group . ';">' . $flag . $row_selected['starttime'] . '～　' . $japanese_city_name . '会場&nbsp;' . $icon_live . $indication . '</h3>';
                                $c_msg .= '<h3 style="border-color:' . $color_group . ';" class="title-seminar">' . $row_selected['k_title1'] . '</h3>';
                                $c_msg .= '<div class="detail">';
                                if ($row_selected['hiduke'] >= date('Y-m-d')) {
                                    $c_msg .='<a class="btn btn-ser_m btn-top1"'.$link.' value="セミナーに申し込む">　　セミナーに申し込む　　</a>';
                                    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/seminar/popup/'.$placename.'.html')) {
                                        $c_msg .= '<a class="btn-pop ui-link btn-top2" href="#popupDialog'.$placename.'" data-rel="popup" data-position-to="window"><span class="btn-popup-serminar">会場アクセス</span></a>';
                                    }
                                }

                                $c_msg .= nl2br($c_desc) . '';
                                $c_msg .= '<br/>';
                                if ($row_selected['hiduke'] < date('Y-m-d')) {
                                    $c_msg .= '<br/>[[ このセミナーは終了しました。 ]]<br/>';
                                    $c_msg .= 'ワーホリ・留学に役立つセミナーを日本ワーキングホリデー協会では毎日開催しております。<br/>';
                                    $c_msg .= '皆様のご参加をお待ちしております。<a href="/seminar/seminar" alt="ワーホリセミナー" rel="external">別のセミナーを探す</a><br/>';
                                } else {
                                    //$c_msg .= '<button value="ご予約はこちら" / >';
                                    $c_msg .='<a '.$link.' class="btn btn-ser_m btn-top1" value="セミナーに申し込む"> セミナーに申し込む </a>';
                                }

                                $c_msg .= '</div>';
                                $c_msg .= '</div></div>';
                                //$cal_msg_selected[$year.$month.$day] = $c_msg;
                                $selected_event = $c_msg;
                            }
                        
                            //---------------------------
                            //first 5 seminar to display
                            //---------------------------
                            $just_one = false; //only one seminar
                            $free = 0; //set for free seminar

                            $query = 'SELECT id, hiduke, year(hiduke) as yy, month(hiduke) as mm, day(hiduke) as dd, date_format(starttime, \'%c月%e日 (%a) %k:%i\') as start, date_format(starttime, \'%k:%i\') as starttime, title, memo, place, k_use, k_title1, k_desc1, k_desc2, k_stat, free, pax, booking, group_color, indicated_option, broadcasting, country_code FROM event_list WHERE k_use = 1 AND ';

                            // query for each screen, search
                            if ($para1 == 'kouen') /*                             * ** Kouenseminar *** */ {
                                $query .='k_desc2 like \'%' . $para2 . '%\' ORDER BY hiduke, starttime, id';
                            } elseif ($para1 == 'place' && $para2 == 'event' && !empty($para6)) {  //if we get num/id for event we only choose one seminar
                                $just_one = true;
                                $query .='id = \'' . $para6 . '\'';
                            } elseif ($para2 == 'member') {
                                $query .='free = 1 AND hiduke >= DATE_SUB(CURDATE(),INTERVAL 0 DAY) ' . $keyword . ' ORDER BY hiduke, starttime, id  LIMIT 0,' . DEFAULT_SEMINAR_COUNT;
                                $free = 1;
                            } else {
                                // $query .='free = 0 AND hiduke >= DATE_SUB(CURDATE(),INTERVAL 0 DAY) '.$keyword.' ORDER BY hiduke, starttime, id  LIMIT 0,15';
                                //満席を含めたセミナーを取得
                                $query .=' hiduke >= DATE_SUB(CURDATE(),INTERVAL 0 DAY) ' . $keyword . ' ORDER BY hiduke, starttime, id  LIMIT 0,' . DEFAULT_SEMINAR_COUNT;
                            }

                            $rs = $db->query($query);
                            $cnt = 0;
                            while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                                $cnt++;
                                $year = $row['yy'];
                                $month = $row['mm'];
                                $day = $row['dd'];

                                $start = $row['start'] . '～';
                                $start = mb_ereg_replace('Mon', '月', $start);
                                $start = mb_ereg_replace('Tue', '火', $start);
                                $start = mb_ereg_replace('Wed', '水', $start);
                                $start = mb_ereg_replace('Thu', '木', $start);
                                $start = mb_ereg_replace('Fri', '金', $start);
                                $start = mb_ereg_replace('Sat', '土', $start);
                                $start = mb_ereg_replace('Sun', '日', $start);

                                $title = $start . ' ' . $row['k_title1'];
                                $japanese_city_name = "";
                                if ($row['place'] == 'event') {
                                    $japanese_city_name = translate_city($row['k_desc2']);
                                    if (empty($japanese_city_name)) {
                                        $japanese_city_name = translate_city($row['place']);
                                    }
                                } else {
                                    $japanese_city_name = translate_city($row['place']);
                                }

                                $c_desc = strip_tags($row['k_desc1'], '<font><b><table><tr><td><img>');
                                if ($row['k_stat'] == 1) {
                                    if ($row['booking'] >= $row['pax'])
                                        $c_img = '[満席です。キャンセル待ち可能です]';
                                    else
                                        $c_img = '[残席わずかです。ご予約はお早めに]';
                                } elseif ($row['k_stat'] == 2)
                                    $c_img = '[満席です]';
                                else {
                                    if ($row['booking'] >= $row['pax'])
                                        $c_img = '[満席です。キャンセル待ち可能です]';
                                    else {
                                        if ($row['booking'] >= $row['pax'] / 3)
                                            $c_img = '[残席わずかです。ご予約はお早めに]';
                                        else
                                            $c_img = '';
                                    }
                                }

                                if ($c_img <> '')
                                    $c_img = '<p class="last-seat">' . $c_img . '</p>';

                                //check flag
                                if (!empty($row['country_code']))
                                    $flag = '<span class="flag ' . $row['country_code'] . '"></span>';
                                else
                                    $flag = '';

                                //Check if live or not
                                if ($row['broadcasting'] != 0)
                                    $icon_live = '<span class="broadcast"></span>';
                                else
                                    $icon_live = '';

                                //Check the option statut
                                switch ($row['indicated_option']) {
                                    case 0:
                                        $indication = '';
                                        break;

                                    case 1:
                                        $indication = '<span class="osusume"></span>';
                                        break;

                                    case 2:
                                        $indication = '<span class="shinchyaku"></span>';
                                        break;
                                }

                                //get color groupe or set gray if empty
                                if ($row['group_color'] == '')
                                    $color_group = '#999';
                                else
                                    $color_group = $row['group_color'];

                                //Set the selected day class only for 'Place'
                                if ($_SESSION['para1'] == 'place' && !empty($_SESSION['para6']) && $just_one === false) {
                                    if ($row['id'] == $_SESSION['para6'])
                                        $class_selected_day = ' selected_day';
                                    else
                                        $class_selected_day = '';
                                } else
                                $class_selected_day = '';

                                // message to display
                                $hidden_block = "not-full";
                                if (preg_match('/満席です/i', $c_img)) {
                                    $hidden_block = "full-seminar";
                                }
                                $cal[$year . $month . $day] .= '<img src="images/sa01.jpg">';
                        
                                $c_msg = '<div id="' . $row['id'] . '-' . $cnt . '" class="message_box ' . $hidden_block . '" data-role="collapsible" style="background-color:white;">';
                                $c_msg .= '<h3 class="time-place-seminar" style="border:0px;">' . $c_img;
                                $c_msg .= $flag . $row['starttime'] . '～　' . $japanese_city_name . '会場&nbsp;' . $icon_live . $indication . '<br/>';
                                $c_msg .= $row['k_title1'] . '</h3>';
                                $add_area = '';

                                if ($use_area && $row['place'] != $para3) {
                                    $add_area = '/area';
                                }

                                if ($row['free'] && $_SESSION['mem_id'] == '') {
                                    $c_msg .= '<div alt="' . $row['hiduke'] . '" class="message_link' . $class_selected_day . '">';
                                    $c_msg .= '<div class="detail">';
                                    $c_msg .='<button onclick="window.open(\'/seminar/ser/login/' . $row['id'] . '\',\'_self\')" class="btn btn-ser_m" value="セミナーに申し込む">　　セミナーに申し込む　　</button>';
                                    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/seminar/popup/'.$placename.'.html')) {
                                        $c_msg .= '<a class="btn-pop ui-link" href="#popupDialog'.$placename.'" data-rel="popup" data-position-to="window"><span class="btn-popup-serminar">会場アクセス</span></a>';
                                    }
                                    $c_msg .= nl2br($c_desc) . '';
                                    $c_msg .= '<br/><br/><p style="font-weight: bold;">※このセミナーは、メンバー限定セミナーです。ログインして下さい。</p><br/>';
                                    $c_msg .= '<br/><button onclick="window.open(\'/seminar/ser/login/' . $row['id'] . '\',\'_self\')" value="ログイン">ログイン</button><br/>';
                                } else {
                                    $c_msg .= '<div alt="' . $row['hiduke'] . '" class="message_link' . $class_selected_day . '">';
                                    $c_msg .= '<div class="detail">';
                                    $c_msg .='<button onclick="window.open(\'/seminar/ser/id/' . $row['id'] . $add_area . '\',\'_self\')" class="btn btn-ser_m" value="セミナーに申し込む">　　セミナーに申し込む　　</button>';
                                    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/seminar/popup/'.$row['place'].'.html')) {
                                        $c_msg .= '<a class="btn-pop ui-link" href="#popupDialog'.$row['place'].'" data-rel="popup" data-position-to="window"><span class="btn-popup-serminar">会場アクセス</span></a>';
                                    }
                                    $c_msg .= nl2br($c_desc) . '';
                                    //$c_msg .= '<br/><button value="ご予約はこちら">ご予約はこちら</button><br/>';
                                    $c_msg .= '<br/><button onclick="window.open(\'/seminar/ser/id/' . $row['id'] . $add_area . '\',\'_self\')" class="btn btn-ser_m" value="セミナーに申し込む">　　セミナーに申し込む　　</button><br/>';
                                }

                                $c_msg .= '<br/></div>';
                                $c_msg .= '</div></div>';
                                $cal_msg[$year . $month . $day] .= $c_msg;
                                if ($just_one === false) {
                                    $cal_cnt[$year . $month . $day] = count_number_of_seminar($keyword, $row['hiduke'], $free);
                                    $cal_iconlist[$year . $month . $day] = icon_list_of_the_day($keyword, $row['hiduke'], $free);
                                    $cal_flaglist[$year . $month . $day] = flag_list_of_the_day($keyword, $row['hiduke'], $free);
                                }
                            }
                        //JN:171227
                        if ($para1 == 'date') {
                        echo '<div alt="' . date("Y-m-d", strtotime($para2)) . '" class="jn_selected_day"></div>';
                        echo '<div alt="' . $para3 . '" class="jn_selected_place"></div>';
                        }
                        //JN:end                                                                                                        
                        } catch (PDOException $e) {
                            die($e->getMessage());
                        }
                    ?>
                    <?php
                        if ($cnt == 0)
                            print '<p>該当するセミナーがありません。検索条件を変更してください。</p>';
                        else {
                        }
                        echo '<br/>';
                    ?>
                    <div class="legend">
                        <p><strong>【アイコンの意味】</strong><br/>
                            <span style="margin-left:20px;"><img src="/css/images/au.png" alt="Australian Flag" />&nbsp;<img src="/css/images/ca.png" alt="Canadian Flag" />&nbsp;<img src="/css/images/uk.png" alt="Union Jack" />&nbsp;&nbsp;国別セミナー</span>
                            <span style="margin-left:20px;"><img src="/css/images/wd.png" alt="World" />&nbsp;&nbsp;英語圏セミナー</span>
                            <span style="margin-left:20px;"><span class="osusume"></span>&nbsp;&nbsp;おススメ</span>
                            <span style="margin-left:20px;"><img src="/css/images/full.png" alt="fullybooked" />&nbsp;&nbsp;満席</span>
                            <span style="margin-left:20px;"><img src="/css/images/camera.png" alt="camera" />&nbsp;&nbsp;中継対象</span><br/>
                            <span style="margin-left:20px;"><span class="chumoku" style="margin-left: 0px;">注目のセミナー</span>&nbsp;&nbsp;注目</span><br/>
                        </p>
                    </div>
                    <?php echo $selected_event ?>
                    <div id="title-top">Loading...<img src="/seminar/bigLoader.gif" /></div>
                    <div id="fullsem_flip">
                        <span id="mes">満席セミナー表示</span>
                        <div style="width: 100px">
                            <input type="hidden" name="isFull" value="<?php ($_GET['isFull'] == 'off') ? '0' : '1'; ?>" />
                            <select name="flip-1" id="flip-1" data-role="slider">
                                <option value="on">OFF</option>
                                <option value="off">ON</option>
                            </select>
                        </div>
                    </div>
                    <div class="" style="clear: both;"></div>
                    <div class="more-view-button">
                        <button type="button" id="moreviewbutton" onclick="last_msg_funtion_for_button()">もっと見る</button>
                    </div>
                    <div id="last_msg_loader"></div>
                    <p>
                        セミナーに参加されるほとんどの方が、お一人でのご参加です。<br/>
                        どうぞ、お気軽にご予約の上、ご参加ください。<br/>
                    </p>

                    <?php if ($para1 == 'kouen') { ?>
                        <br/>
                        <a href="/kouenseminar.php" data-role="button" data-ajax="false" data-inline="true" data-theme="a">戻る</a>
                        <br/>
                    <?php } else { ?>
                        <br/>
                        <!--
                            <a href="<?php print $url_home; ?>" data-role="button" data-transition="fade" data-ajax="true" data-icon="arrow-l" data-inline="true" data-theme="a">セミナーＴＯＰへ</a>
                            <br/>
                        -->
                    <?php } ?>

                </div>
                <?php print $c_footer; ?>
            </div>
        <?php
                }
            }
        ?>
        <script>
            //$("title");
            var start = $("#start").find("td:eq(1)").text();
            var title = $("#title").find("td:eq(1)").text();
            var place = $("#place").find("td:eq(1)").text();
            //alert(title);
            var tt = $("title").text();
            var tt1 = tt.split("|");
            var title_bg = tt1[0];
            var title_ = title_bg + "&nbsp|&nbsp" + start + " &nbsp"+place + "&nbsp [" + title + "]";
            if(start != "")
            {
                $("title").html(title_);
            }
            $('document').ready(function(){
                $('img').each(function(){
                    //alert($(this).attr('src'));
                });
            });
        </script>
    </body>
</html>
