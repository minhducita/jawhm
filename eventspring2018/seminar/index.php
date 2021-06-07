<!doctype html>
<html>

<head>
    <title>seminar | 「新春初夢フェア2018」に変更</title>
    <!-- <meta name="description" content="ディスクリプションが入ります" /> -->
    <meta name="keywords" content="ワーキングホリデー,ワーホリ,留学,セミナー,海外,語学学校" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" type="text/css" href="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/css/cssreset-min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" media="(max-width: 700px)" href="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/css/style_sp.css">
    <link rel="stylesheet" media="(min-width: 699px)" href="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/css/style_pc.css">

    <link rel="stylesheet" type="text/css" href="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/css/jquery.sidr.dark.css">
    <link rel="stylesheet" type="text/css" href="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/css/simple.modal.css">
    <script type="text/javascript" src="https://www.jawhm.or.jp/js/jquery.js"></script>
    <script type="text/javascript" src="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/js/jquery.smoothScroll_seminar.js"></script>
    <script type="text/javascript" src="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/js/common_seminar.js"></script>
    <script type="text/javascript" src="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/js/prefixfree.min.js"></script>
    <script type="text/javascript" src="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/js/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/js/jquery.heightLine.js"></script>
    <script type="text/javascript" src="/js/jquery.blockUI.js"></script>
    <script>
        $(document).ready(function() {
            $('#openMenu').sidr({
                side: 'right'
            });
        });
    </script>
    <link rel="stylesheet" href="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/js/flexslider/flexslider.css" type="text/css" />
    <script src="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/js/flexslider/jquery.flexslider.js"></script>

    <!--[if lt IE 9]>
          <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
          <script src="/js/html5shiv.min.js"></script>
            <![endif]-->

    <!--[if lt IE 8]>
            <script type="text/javascript" src="/js/selectivizr.js"></script>
        <![endif]-->

    <!--[if lte IE 6]>
           <script type="text/javascript" src="js/DD_belatedPNG_0.0.8a.js"></script>
           <script type="text/javascript">
             DD_belatedPNG.fix('img , div , li');
            </script>
        <![endif]-->
    <!-- Seminar Module -->


    <!--[if lte IE 8 ]>
    <link rel="stylesheet" href="/css/style_ie.css" />
<![endif]-->

    <link type="text/css" href="https://www.jawhm.or.jp/css/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
    <link type="text/css" href="/seminar/css/style-p.css" rel="stylesheet" />
    <link type="text/css" href="/seminar/css/style-fonts.css" rel="stylesheet" />
    <link type="text/css" href="/css/jawhm-form.css" rel="stylesheet" />

    <script type="text/javascript" src="/js/jquery.blockUI.js"></script>
    <script type="text/javascript" src="/js/fixedui/fixedUI.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript">
        var checklogin = 0;
        jQuery(function($) {
            $(".feedshow").click(function() {
                $.fixedUI("#feedbox");
            });
            $("#feedhide").click(function() {
                $.unfixedUI();
            });
            $("#feedform").submit(function() {
                $senddata = $("#feedform").serialize();
                $.ajax({
                    type: "POST",
                    url: "https://www.jawhm.or.jp/feedback/sendmail.php",
                    data: $senddata + "&subject=Seminar Request",
                    success: function(msg) {
                        alert("リクエストありがとうございました。");
                        $.unfixedUI();
                    },
                    error: function() {
                        alert("通信エラーが発生しました。");
                        $.unfixedUI();
                    }
                });
                return false;
            });

            jQuery("input:checkbox", "#shiborikomi").button();
            jQuery("input:radio", "#shiborikomi").button();

        });

        function cplacesel() {
            jQuery("#place-tokyo").button("destroy");
            jQuery("#place-tokyo").removeAttr("checked");
            jQuery("#place-tokyo").button();
            fncsemiser();
        }

        function fncplacesel(obj) {
            fncsemiser();
        }

        function fnccountrysel() {
            jQuery("#country-all").button("destroy");
            jQuery("#country-all").removeAttr("checked");
            jQuery("#country-all").button();
            fncsemiser();
        }

        function fnccountryall() {
            if (jQuery("#country-all").attr("checked")) {
                jQuery("input:checkbox", "#shiborikomi").button("destroy");
                jQuery(":checkbox[id^=country-]").removeAttr("checked");
                jQuery("#country-all").attr("checked", "checked");
                jQuery("input:checkbox", "#shiborikomi").button();
            }
            fncsemiser();
        }

        function fncknowsel() {
            jQuery("#know-all").button("destroy");
            jQuery("#know-all").removeAttr("checked");
            jQuery("#know-all").button();
            fncsemiser();
        }

        function fncknowall() {
            if (jQuery("#know-all").attr("checked")) {
                jQuery("input:checkbox", "#shiborikomi").button("destroy");
                jQuery(":checkbox[id^=know-]").removeAttr("checked");
                jQuery("#know-all").attr("checked", "checked");
                jQuery("input:checkbox", "#shiborikomi").button();
            }
            fncsemiser();
        }

        function fncsemiser() {
            jQuery("#semi_show").html("<div style=\"vertical-align:middle; text-align:center; margin:30px 0 30px 0; font-size:20pt;\"><img src=\"https://www.jawhm.or.jp/images/ajax-loader.gif\">セミナーを探しています...</div>");
            $senddata = jQuery("#kensakuform").serialize();
            /*alert($senddata);*/
            $.ajax({
                type: "POST",
                url: "https://www.jawhm.or.jp/seminar_module/search.php",
                data: $senddata,
                success: function(msg) {
                    jQuery("#semi_show").html(msg);
                },
                error: function() {
                    alert("通信エラーが発生しました。");
                    $.unblockUI();
                    defaultvalue();
                    resizeformseminar();
                }
            });
        }
    </script>

    <script>
        function fnc_next() {
            $.ajax({
                type: "GET",
                url: "https://www.jawhm.or.jp/seminar_module/seminar_yoyaku_input.php?acao=",
                data: "",
                xhrFields: {
                    withCredentials: true
                },
                success: function(msg) {
                    first = true;
                    $("#form_yoyaku table div").each(function() {
                        if (first == false) {
                            $(this).remove();
                        }
                        first = false;
                    });
                    $("#form_yoyaku table tr:last").after(msg);
                    var $top = $(".blockUI.blockMsg.blockPage").css("top");
                    $top = $top.replace("px", "");
                    $top = parseInt($top);
                    $(".blockUI.blockMsg.blockPage").css("top", $top - 80);
                    resizeformseminar();
                },
                error: function() {
                    alert("通信エラーが発生しました。");
                }
            });
            document.getElementById("form_area").style.display = "none";
            document.getElementById("form0").style.display = "none";
            document.getElementById("form1").style.display = "none";
            document.getElementById("form2").style.display = "";

            /*初心者向けセミナーでは誘導メッセージを表示*/
            $id = $("input#txt_id").val();
            $.ajax({
                type: "POST",
                url: "https://www.jawhm.or.jp/seminar_module/check_4beginer.php",
                data: {
                    id: $id
                },
                success: function(is4beginer) {
                    if (is4beginer != 0) {
                        $("#msg_hajimete").css("display", "none");

                    } else {
                        $("#msg_hajimete").css("display", "flex");
                    }
                    if (checklogin == 1) {
                        $("#seminarbtn").removeClass("seminar_btn");
                    }
                    if ($("#msg_hajimete").css("display") == "none" && checklogin == 1) {
                        $("#form2").css("height", "430px");
                        $("form.form-jawhm").css("height", "71%");
                        $("#btn_soushin").css("margin-top", "10px");
                        $("form.form-jawhm").css("overflow", "hidden");
                        setPositionPopup("form2");
                    } else if (checklogin == 1) {
                        $("#form2").css("height", "500px");
                        $("form.form-jawhm").css("height", "72%");
                        $("form.form-jawhm").css("overflow", "hidden");
                        setPositionPopup("form2");
                    } else {
                        $("#form2").css("max-height", "");
                        resizeformseminar();
                    }
                }
            });
        }

        function fnc_area(obj) {
            document.getElementById("form_area").style.display = "";
            document.getElementById("form0").style.display = "none";
            document.getElementById("form1").style.display = "none";
            document.getElementById("form2").style.display = "none";

            document.getElementById("btn_soushin").disabled = false;
            document.getElementById("btn_soushin").value = "送信";
            document.getElementById("div_wait_login").style.display = "none";
            document.getElementById("div_wait").style.display = "none";

            document.getElementById("area_name").innerHTML = obj.getAttribute("area");

            var alertplace = obj.getAttribute("alertplace");
            if (alertplace) {
                document.getElementById("alert_place").innerHTML = "このセミナーは<span style=\"font-size: 24px;\">「" + alertplace + "」</span>の会場にて開催されます。<br><br>";
            }

            document.getElementById("form_title").innerHTML = obj.getAttribute("name");
            document.getElementById("txt_title").value = obj.getAttribute("name");
            document.getElementById("txt_id").value = obj.getAttribute("uid");
            $.blockUI({
                message: $("#yoyakuform"),
                css: {
                    top: ($(window).height() - 500) / 2 + "px",
                    left: ($(window).width() - 600) / 2 + "px",
                    width: "600px"
                }
            });
        }


        function fnc_login(obj) {
            document.getElementById("form_area").style.display = "none";
            document.getElementById("form0").style.display = "";
            document.getElementById("form1").style.display = "none";
            document.getElementById("form2").style.display = "none";

            document.getElementById("btn_soushin").disabled = false;
            document.getElementById("btn_soushin").value = "送信";
            document.getElementById("div_wait_login").style.display = "none";
            document.getElementById("div_wait").style.display = "none";

            document.getElementById("form_title").innerHTML = obj.getAttribute("name");
            document.getElementById("txt_title").value = obj.getAttribute("name");
            document.getElementById("txt_id").value = obj.getAttribute("uid");
            $.blockUI({
                message: $("#yoyakuform"),
                css: {
                    top: ($(window).height() - 500) / 2 + "px",
                    left: ($(window).width() - 600) / 2 + "px",
                    width: "600px"
                }
            });
        }

        function fnc_do_login() {

            obj = document.getElementById("login_email");
            if (obj.value == "") {
                alert("メールアドレスを入力してください。");
                obj.focus();
                return false;
            }
            obj = document.getElementById("login_pwd");
            if (obj.value == "") {
                alert("パスワードを入力してください。");
                obj.focus();
                return false;
            }

            document.getElementById("div_wait_login").style.display = "";
            document.getElementById("btn_login").value = "処理中...";
            document.getElementById("btn_login").disabled = true;

            $senddata = $("#yoyaku_login").serialize();
            $.ajax({
                type: "POST",
                url: "https://www.jawhm.or.jp/seminar_module/login.php",
                data: $senddata,
                success: function(msg) {
                    document.getElementById("div_wait_login").style.display = "none";
                    document.getElementById("btn_login").value = "ログイン";
                    document.getElementById("btn_login").disabled = false;
                    if (msg == true) {
                        document.getElementById("login_email").value = "";
                        document.getElementById("login_pwd").value = "";
                        fnc_yoyaku2();
                        checklogin = 1;
                    } else {
                        alert(msg);
                    }
                },
                error: function() {
                    alert("通信エラーが発生しました。");
                }
            });
        }

        function fnc_yoyaku2() {
            document.getElementById("form_area").style.display = "none";
            document.getElementById("form0").style.display = "none";
            document.getElementById("form1").style.display = "";
            document.getElementById("form2").style.display = "none";
        }

        function fnc_yoyaku(obj) {
            document.getElementById("form_area").style.display = "none";
            document.getElementById("form0").style.display = "none";
            document.getElementById("form1").style.display = "";
            document.getElementById("form2").style.display = "none";

            document.getElementById("btn_soushin").disabled = false;
            document.getElementById("btn_soushin").value = "送信";
            document.getElementById("div_wait").style.display = "none";

            document.getElementById("form_title").innerHTML = obj.getAttribute("name");
            document.getElementById("txt_title").value = obj.getAttribute("name");
            document.getElementById("txt_id").value = obj.getAttribute("uid");

            $.blockUI({
                message: $("#yoyakuform"),
                css: {
                    top: ($(window).height() - 350) / 2 + "px",
                    left: ($(window).width() - 600) / 2 + "px",
                    width: "610px"
                }
            });
            setPositionPopup("form1");

        }

        function btn_cancel() {
            $.unblockUI();
            $("#form2").hide();
            $("#form2").removeAttr("style");
            $("form.form-jawhm").removeAttr("style");
        }

        function zentohan(inst) {
            var han = "1234567890abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz@-.";
            var zen = "１２３４５６７８９０ａｂｃｄｅｆｇｈｉｊｋｌｍｎｏｐｑｒｓｔｕｖｗｘｙｚＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ＠－．";
            var word = inst;
            for (i = 0; i < zen.length; i++) {
                var regex = new RegExp(zen[i], "gm");
                word = word.replace(regex, han[i]);
            }
            return word;
        }

        function btn_submit() {
            obj = document.getElementById("txt_name");
            if (obj.value == "") {
                alert("お名前（氏）を入力してください。");
                obj.focus();
                return false;
            }
            obj = document.getElementById("txt_name2");
            if (obj) {
                if (obj.value == "") {
                    alert("お名前（名）を入力してください。");
                    obj.focus();
                    return false;
                }
            }
            obj = document.getElementById("txt_furigana");
            if (obj.value == "") {
                alert("フリガナ（氏）を入力してください。");
                obj.focus();
                return false;
            }
            obj = document.getElementById("txt_furigana2");
            if (obj) {
                if (obj.value == "") {
                    alert("フリガナ（名）を入力してください。");
                    obj.focus();
                    return false;
                }
            }
            obj = document.getElementById("txt_mail");
            if (obj.value == "") {
                alert("メールアドレスを入力してください。");
                obj.focus();
                return false;
            }
            jQuery("#txt_mail").val(zentohan(jQuery("#txt_mail").val()));
            var strMail = jQuery("#txt_mail").val();
            if (!strMail.match(/.+@.+\..+/)) {
                alert("メールアドレスを確認してください。");
                jQuery("#txt_mail").focus();
                return false;
            }
            obj = document.getElementById("txt_tel");
            if (obj.value == "") {
                alert("電話番号を入力してください。");
                obj.focus();
                return false;
            }
            /*if (obj.value[0] != "0")	{
		alert("電話番号は正しく入力してください。");
		obj.focus();
		return false;
	}*/

            if (!confirm("ご入力頂いた内容を送信します。よろしいですか？")) {
                return false;
            }

            $senddata = $("#form_yoyaku").serialize();

            document.getElementById("div_wait").style.display = "";
            document.getElementById("btn_soushin").style.display = "none";
            document.getElementById("btn_soushin").value = "処理中...";
            document.getElementById("btn_soushin").disabled = true;

            $.ajax({
                type: "POST",
                url: "https://www.jawhm.or.jp/yoyaku/yoyaku.php",
                data: $senddata,
                success: function(msg) {
                    document.getElementById("div_wait").style.display = "none";
                    alert(msg);
                    document.getElementById("btn_soushin").style.display = "block";

                    // // POST DATA to PARDOT -- minhquyen
                    // $("#form_yoyaku").attr("action", "https://go.pardot.com/l/401302/2017-08-16/8hhb9d");
                    // $("#form_yoyaku").attr("method", "POST");
                    // $("#form_yoyaku").submit();
                    // // end

                    $.unblockUI();
                },
                error: function() {
                    alert("通信エラーが発生しました。");
                    $.unblockUI();
                }
            });
        }
    </script>
    <script type="text/javascript">
        function resizeformseminar() {
            if (checklogin != 1) {
                //default	
                defaultvalue();
                var $width_formjawhm = $("#form2").width();
                $("#seminarbtn").width($width_formjawhm);
                $("#seminarbtn").addClass("seminar_btn");

                var $max_form2_heigth = 740;
                var $min_form2_height = 700;

                var postionpoup = $(window).height();

                var form2_height_auto = $("#form2").height();

                var $height_header = $(".form-jawhm").height();
                var $height_btn = $("#seminarbtn").height();

                var $height_msg = ($("#msg_hajimete").is(":visible")) ? 0 : 57; // height msg
                if ((postionpoup >= $max_form2_heigth) || (form2_height_auto >= $min_form2_height && $height_msg != 0)) {
                    if ((form2_height_auto >= $min_form2_height && $height_msg != 0 && form2_height_auto < $max_form2_heigth)) {
                        $("#form2").css("height", form2_height_auto - $height_msg);
                        var $form_jawhm = form2_height_auto - $height_header - $height_btn - $height_msg;
                    } else {
                        $full_form = $("#form_yoyaku").height();
                        $("#form2").css("height", $full_form + $height_header + $height_btn);
                        var $form_jawhm = $full_form;
                    }
                    $("form.form-jawhm").height($form_jawhm);
                    $("form.form-jawhm").css("overflow", "hidden");
                } else {
                    $("form.form-jawhm").height(form2_height_auto - $height_header - $height_btn);
                    $("form.form-jawhm").css("overflow", "");
                }
                setPositionPopup("form2");
            }
        }

        function defaultvalue() {
            $("form.form-jawhm,#form2").removeAttr("style");
        }

        function setPositionPopup($form) {
            /*popup height form*/
            var height_window = $(window).height();
            if ($form == "form2") {
                var height_form = $("#form2").height();
                var margin_top = height_window - height_form;
                if (margin_top > 0) {
                    margin_top = margin_top / 2;
                    $("#form2").css("margin-top", margin_top - 12);
                }
                /* hide blockui*/
                $(".blockUI.blockMsg.blockPage").css({
                    "height": 0,
                    "border": "none"
                });
            } else if ($form == "form1") {
                var height_form = $("#form1").height();
                var margin_top = height_window - height_form;
                if (margin_top > 0) {
                    margin_top = margin_top / 2;
                    $(".blockUI.blockMsg.blockPage").css("top", margin_top - 12);
                }
            }
            /* popup width */
            var width_form = $("#form2").width();
            var width_window = $(window).width();
            var $blockui_left = (width_window - width_form) / 2;
            $(".blockUI.blockMsg.blockPage").css("left", $blockui_left);

        }
        $(document).ready(function() {
            $(".day_information").bind("mouseenter", function() {
                this.position = setInterval(function() {
                    if ($(".day_information .det").is(":animated")) {
                        $(".blockMsg").css("top", ($(window).height() - $(".blockMsg").height()) / 2 + "px");
                    }

                }, 1);
            }).bind("mouseleave", function() {});
            $(window).resize(function() {
                if ($("#form2").is(":visible"))
                    resizeformseminar();
                setPositionPopup();
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery(".open open_only").live("click", function() {
                jQuery(this).next(".det").slideToggle("slow");
            });
        });
    </script>

    <script type="text/javascript" src="/seminar/js/script-form.js"></script>


    <style>
        .selected_day_in_list {
            background-color: #FFFFAA;
        }
    </style>
    <link id="size-stylesheet" rel="stylesheet" href="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/css/base.css">
</head>
<?php
include $_SERVER["DOCUMENT_ROOT"].'/seminar_module/seminar_module.php';
function baseUrl()
    {
        $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) == 'https://' ? 'https://' : 'http://';
        // Detecting HTTPS - SSL (CloudFlare)
        if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            $protocol = $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://';
        } else {
            $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        }
        $path = $_SERVER['PHP_SELF'];
        $path_parts = pathinfo($path);
        $directory = $path_parts['dirname'];
        $directory = ($directory == '/' || $directory == '\\') ? '' : $directory;
        $host = $_SERVER['HTTP_HOST'];
        return $protocol . $host . $directory . '/';
    }
function wp_is_mobile() {
    static $is_mobile;

    if ( isset($is_mobile) )
        return $is_mobile;

    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
            $is_mobile = true;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}

$place = $_GET["place"];
$title = $_GET["title"];
$view = $_GET['view'];
if (strlen($place) == 0) {
    $place = "tokyo";
}
$end_date = '2018-01-31';
$start_date = '2018-01-04';

function queryGen($place, $title) {
    echo "?place=" . $place . "&title=" . $title . "&view=10";
}

function getPref($place) {
    if (!isset($place)) {
        return '東京';
    }
    $pref = array(
        'tokyo' => '東京',
        'osaka' => '大阪',
        'nagoya' => '名古屋',
        'fukuoka' => '福岡',
        'okinawa' => '沖縄',
        'kyoto' => '京都',
        'omiya' => '大宮',
    );
    return $pref[$place];
}

function activePlace($compare, $place) {
    if ($compare != $place)
        echo "off";
}

function activeTitle($compare, $title) {
    if ($compare != $title || $compare == "")
        echo "off";
}
function config_knowlist_default($title){ // config default list seminar
    if(empty($title)){
        return array('id' => 'all', 'active' => 'on');
    }
    $know_list = array(
            '初心者'   =>  array(
                    'id' => 's01',
                    'name' => '初心者向けセミナー',
                    'word2' => array('初心者'),
                    'default'=>'on',
                    'active' => 'on',
            ),
            '語学学校' =>   array(
                    'id' => 's05',
                    'name' => '語学学校セミナー',
                    'word2' => array('学校セミナー','学校懇談'),
                    'active' => 'on',
                    'default'=>'on',
            ),
            '体験談'   =>  array(
                    'id' => 's06',
                    'name' => '体験談セミナー',
                    'word2' => array('体験談'),
                    'active' => 'on',
                    'default'=>'on',
            )
    );
    return $know_list[$title];
}

$know_list = config_knowlist_default(@$_GET['title']);

if (wp_is_mobile()) {
    $config = array(
        'view_mode' => 'list',
        'start_date' => $start_date,
        'end_date' => $end_date,
        'list' => array(
            'place_default' => $place,
            'title' => array(),
            //'title3' => array($title,),
            'keyword' => $title == "語学学校" ? array('学校セミナー','学校懇談',) :  array($title,),
            //'keyword2' => $title == "語学学校" ? array('学校懇談',) : "",
            'count_field_active' => 'deactive',
            'use_area' => 'on',
        ),
    );
} else {
    $config = array(
        'start_date' => $start_date,
        'end_date' => $end_date,
        'view_mode' => 'calendar',
        'calendar' => array(
            'place_default' => $place,
            'title' => array(),
            'title3' => array($title,),
            'know_list'     => array($know_list,$know_list),
            'place_active' => 'deactive',
            'country_active' => 'deactive',
            'know_active' => 'deactive',
            'calendar_icon_active' => 'deactive',
            'count_field_active' => 'deactive',
            'calendar_title_active' => 'deactive',
            'calendar_desc_active' => 'deactive',
            'footer_desc_active' => 'deactive',
            'use_area' => 'on',
        )
    );
}
$sm = new SeminarModule($config);
?>


<body id="top">
    <div class="wrapper">
        <header class="head">
            <h1><a href="https://www.jawhm.or.jp/hatsuyume2018/seminar" id="header_title">「新春初夢フェア2018」に変更</a></h1>
            <nav class="topNav pcview clearfix">
            </nav>
            <!-- topNav / pcview -->
            <img class="tabImg pcview" src="https://www.jawhm.or.jp/fairevent/hatsuyume2017/wp-content/themes/fair/images/bgTabImg.png" alt="">
        </header>
        <div class="underSec seminar">
            <!-- ▼ ワーキングホリデー＆留学フェアとは？ ▼ -->      
            <section class="normalBox">
                <h2 class="hukidashi">セミナースケジュール<span>SEMINAR SCHEDULE</span></h2> 

                <div class="contentBox noPad">        
                    <p class="planeText mgb20"></p>
                    <div class="btnArea">
                        <p class="mgb10">お近くの会場をクリックしてください。</p>
                        <ul>
                            <li><a class="tokyo <?php activePlace("tokyo", $place) ?>" href="<?php queryGen("tokyo", $title) ?>">東京会場</a></li>
                            <li><a class="osaka <?php activePlace("osaka", $place) ?>" href="<?php queryGen("osaka", $title) ?>">大阪会場</a></li>
                        </ul><!-- /.areaList -->
                        <ul>
                            <li><a class="nagoya <?php activePlace("nagoya", $place) ?>" href="<?php queryGen("nagoya", $title) ?>">名古屋会場</a></li>
                            <li><a class="fukuoka <?php activePlace("fukuoka", $place) ?>" href="<?php queryGen("fukuoka", $title) ?>">福岡会場</a></li>
                        </ul><!-- /.areaList -->
                    </div><!-- /.btnArea -->
                    <div class="btnArea2">
                        <p class="mgb10">お好みのセミナーをクリックしてください。</p>
                        <ul>
                            <li><a class="first <?php activeTitle("初心者", $title) ?>" href="<?php queryGen($place, "初心者") ?>">初心者セミナー</a></li>
                            <li><a class="gogaku <?php activeTitle("語学学校", $title) ?>" href="<?php queryGen($place, "語学学校") ?>">語学学校セミナー</a></li>
                        </ul><!-- /.areaList -->
                        <ul>
                            <li><a class="taiken <?php activeTitle("体験談", $title) ?>" href="<?php queryGen($place, "体験談") ?>">体験談セミナー</a></li>
                            <li><a class="all <?php if (strlen($title) > 0) echo "off" ?>" href="<?php queryGen($place, "") ?>">全てのセミナー</a></li>
                        </ul><!-- /.areaList -->
                    </div><!-- /.btnArea -->

                    <section class="semListArea">               
                        <h3 class="spview"><?php echo getPref($place) ?>会場<span>の</span><?php echo $title ?>セミナー</h3>
                        <div class="pcview clearfix">
                            <p class="left"><?php echo getPref($place) ?>会場</p>
                            <p class="right"><?php echo (strlen($title) > 0) ? $title : "全て" ?>のセミナー<span>を表示しています</span></p>
                        </div>
                        <div id="seminarList">
                        <?php $sm->show() ?> 
                        </div>
                        <?php
                            if(empty($view) || $view == "")
                            {
                                $next = 20;
                            }
                            else
                            {
                                $next = $view + 10;
                            }
                        
                        ?>
                        <div class="btnShadow2 mgt30 spview"><a id="moreSeminar" class="btn moreView" href="<?php echo baseUrl().'/seminar/?place='.$place.'&title='.$title.'&view='.$next; ?>"><span>もっと見る</span></a></div>
                        <?php  ?>
                    </section><!-- /.semListArea -->         
                </div><!-- /.contentBox -->         
            </section><!-- /.normalBpx -->
        </div>
        <!-- /.underSec -->
        <section class="normalBox footSec">
            <script>
                jQuery(document).ready(function($) {
                    $("section.semListArea > div > div").each(function() {
                        var date = "20171204";
                        if (Number($(this).attr("id")) < Number(date)) {
                            $(this).hide();
                        }
                    });
                    var count = $('#seminarList > div:first > div').length;
                    var href = $("#moreSeminar").attr("href");
                    $("#moreSeminar").attr("href", href + "&cnt=" + count);
                    console.log("");

                    if ("" == "all") {
                        var show = ""
                        show++;
                        var p = $("#seminarList div:nth-child(" + show + ")").offset().top;
                        $('html,body').animate({
                            scrollTop: p
                        }, 0);
                        return false;;
                    }
                });
            </script>
            <div class="pgTop"><a id="toTop" href="">ページトップヘ</a>
            </div>
        </section>
        <!-- /.footSec -->
        <div class="pgTop spview">
            <a id="toTopSp" class="fadeThis" href="">ページトップヘ</a>
        </div>
    </div>
    <!-- warraper -->
    <footer>
        <a class="btn" href="/"><span>協会本サイトへ</span></a>
        <p>
            一般社団法人 日本ワーキングホリデー協会（JAWHM）
            <br> Copyright© JAPAN Association for Working Holiday Makers
            <br> All right reserved.
        </p>
    </footer>
</body>
</html>