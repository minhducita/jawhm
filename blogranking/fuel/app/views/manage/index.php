<?php
    function get_status_str($no){
        switch ($no) {
            case BLOG_STATUS_IN: return "IN待ち";
            case BLOG_STATUS_FIRST_REVIEW: return "審査待ち";
            case BLOG_STATUS_OK: return "審査OK";
            case BLOG_STATUS_NG: return "審査NG";
            case BLOG_STATUS_RE_REVIEW: return "再審査待ち";
        }
    }

    function date_separate($str){
        if($str == NULL || $str == "") return "";
        return substr($str,0,4)."/".substr($str,4,2)."/".substr($str,6,2);
    }

    function find_category_name($ctg, $id){
        foreach($ctg as $val){
            if($val[DB_COLUMN_CATEGORY_ID] == $id) return $val["name"];
        }
    }

    function param_build($status, $cat, $title, $order){
        $res = "?";
        if($status != ""){
            $res .= "&status=".$status;
        }
        if($cat != ""){
            $res .= "&ctg=".$cat;
        }
        if($title != ""){
            $res .= "&title=".$title;
        }
        if($order != ""){
            $res .= "&order=".$order;
        }
        return $res;
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>登録ブログ</title>
        <!--CSS-->
        <!-- Reset Stylesheet -->
        <link rel="stylesheet" href="/assets/manage/css/reset.css" type="text/css" media="screen" />
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="/assets/manage/css/style.css" type="text/css" media="screen" />
        <!-- index.css加筆 -->
        <link rel="stylesheet" href="/assets/manage/stylesheets/index.css" type="text/css" media="screen" />    <!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
        <link rel="stylesheet" href="/assets/manage/css/invalid.css" type="text/css" media="screen" />
        <!-- Colour Schemes
        Default colour scheme is green. Uncomment prefered stylesheet to use it.
        <link rel="stylesheet" href="/assets/manage/css/blue.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="/assets/manage/css/red.css" type="text/css" media="screen" />
        -->
        <!-- Internet Explorer Fixes Stylesheet -->
        <!--[if lte IE 7]>
            <link rel="stylesheet" href="/assets/manage/css/ie.css" type="text/css" media="screen" />
        <![endif]-->
        <!--Javascripts-->
        <!-- jQuery -->
        <script type="text/javascript" src="/assets/manage/scripts/jquery-1.3.2.min.js"></script>
        <!-- jQuery Configuration -->
        <script type="text/javascript" src="/assets/manage/scripts/simpla.jquery.configuration.js"></script>
        <!-- Facebox jQuery Plugin -->
        <script type="text/javascript" src="/assets/manage/scripts/facebox.js"></script>
        <!-- jQuery WYSIWYG Plugin -->
        <script type="text/javascript" src="/assets/manage/scripts/jquery.wysiwyg.js"></script>
        <!-- Internet Explorer .png-fix -->
        <!--[if IE 6]>
            <script type="text/javascript" src="/assets/manage/scripts/DD_belatedPNG_0.0.7a.js"></script>
            <script type="text/javascript">
                DD_belatedPNG.fix('.png_bg, img, li');
            </script>
        <![endif]-->
        <script type="text/javascript" >
        function _confirm(msg,tgt) {
            if(window.confirm('ステータスを「'+msg+'」に変更してもよろしいですか？')) {
                window.location.href = tgt;
            }
        }
        jQuery(document).ready(function($) {
            $("#manage_csvdl").click(function() {
                location.href = "./csvdl" + location.search;
            });
        });
        </script>
    </head>
    <body>
        <div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
            <div id="sidebar">
                <div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
                    <h1 id="sidebar-title"><a href="#">管理画面TOP</a></h1>
                    <a href="index.html"><h2 class="sidebar-title">管理画面TOP</h2></a>
                    <ul id="main-nav">  <!-- Accordion Menu -->
                        <li>
                            <a href="<?php echo SYSTEM_ROOT_PATH?>/manage/index" class="nav-top-item no-submenu">登録ブログ一覧</a>
                        </li>
                        <li>
                            <a href="<?php echo SYSTEM_ROOT_PATH?>/manage/category" class="nav-top-item no-submenu">カテゴリ一覧</a>
                        </li>
                    </ul> <!-- End #main-nav -->
                </div>
            </div> <!-- End #sidebar -->
            <div id="main-content"> <!-- Main Content Section with everything -->
                <noscript> <!-- Show a notification if the user has disabled javascript -->
                    <div class="notification error png_bg">
                        <div>
                            Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
                        </div>
                    </div>
                </noscript>
                <!-- Page Head -->
            <!--
            TODO ステータス、カテゴリphpで動的に作成
            -->
			<p id="page-intro">管理画面&nbsp;&gt;登録ブログ一覧</p>
            <h2>登録ブログ一覧</h2>
            <div class="clear"></div> <!-- End .clear -->
            <div class="content-box"><!-- Start Content Box -->
                <div class="content-box-header big-header">
                    <h3>登録ブログ一覧</h3>
                    <form class="header-form">
                        <div class="header-item">
                            <label>ステータス</label>
                            <select class="text-input" type="text" name="status">
                                <option value="" <?php if(!$status) echo "selected"?>>-</option>
                                <option value="<?php echo BLOG_STATUS_FIRST_REVIEW?>" <?php if($status==BLOG_STATUS_FIRST_REVIEW) echo "selected"?>>審査待ち</option>
                                <option value="<?php echo BLOG_STATUS_IN?>" <?php if($status==BLOG_STATUS_IN) echo "selected"?>>IN待ち</option>
                                <option value="<?php echo BLOG_STATUS_RE_REVIEW?>" <?php if($status==BLOG_STATUS_RE_REVIEW) echo "selected"?>>再審査待ち</option>
                                <option value="<?php echo BLOG_STATUS_OK?>" <?php if($status==BLOG_STATUS_OK) echo "selected"?>>審査OK</option>
                                <option value="<?php echo BLOG_STATUS_NG?>" <?php if($status==BLOG_STATUS_NG) echo "selected"?>>審査NG</option>
                            </select>
                        </div>
                        <div class="header-item">
                            <label>カテゴリ</label>
                            <select class="text-input" type="text" name="ctg">
                                <option value="" <?php if(!$selected_ctg) echo "selected"?>>-</option>
                              <?php
                                foreach ($ctg as $val){
                                    if($val[DB_COLUMN_CATEGORY_ID] == $selected_ctg){
                                        echo '<option value="'.$val[DB_COLUMN_CATEGORY_ID].'" selected>'.$val[DB_COLUMN_CATEGORY_NAME].'</option>';
                                    }else{
                                        echo '<option value="'.$val[DB_COLUMN_CATEGORY_ID].'" >'.$val[DB_COLUMN_CATEGORY_NAME].'</option>';
                                    }
                                }
                              ?>
                            </select>
                        </div>
                        <div class="header-item">
                            <label>タイトル</label>
                            <input class="text-input" type="text" name="title"value="<?php echo $title?>"/>
                        </div>
                        <div class="header-item">
                            <label>登録日</label>
                           <select class="text-input" name="start_year">
                                <option value=""></option>
                                <?php
                                    for ($y = date('Y'); $y >= 2013; $y--) {
                                        $selected = "";
                                        if ($y == @$start_year) {
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="' . $y . '" ' . $selected . '>' . $y . '</option>';
                                    }
                                ?>
                            </select>&nbsp;年&nbsp;&nbsp;
                           <select class="text-input" name="start_month">
                                <option value=""></option>
                                <?php
                                    for ($m = 1; $m <= 12; $m++) {
                                        $selected = "";
                                        if ($m == @$start_month) {
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="' . $m . '" ' . $selected . '>' . $m . '</option>';
                                    }
                                ?>
                            </select>&nbsp;月&nbsp;&nbsp;
                           <select class="text-input" name="start_day">
                                <option value=""></option>
                                <?php
                                    for ($d = 1; $d <= 31; $d++) {
                                        $selected = "";
                                        if ($d == @$start_day) {
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="' . $d . '" ' . $selected . '>' . $d . '</option>';
                                    }
                                ?>
                            </select>&nbsp;日&nbsp;&nbsp;〜
                           <select class="text-input" name="end_year">
                                <option value=""></option>
                                <?php
                                    for ($y = date('Y'); $y >= 2013; $y--) {
                                        $selected = "";
                                        if ($y == @$end_year) {
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="' . $y . '" ' . $selected . '>' . $y . '</option>';
                                    }
                                ?>
                            </select>&nbsp;年&nbsp;&nbsp;
                           <select class="text-input" name="end_month">
                                <option value=""></option>
                                <?php
                                    for ($m = 1; $m <= 12; $m++) {
                                        $selected = "";
                                        if ($m == @$end_month) {
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="' . $m . '" ' . $selected . '>' . $m . '</option>';
                                    }
                                ?>
                            </select>&nbsp;月&nbsp;&nbsp;
                           <select class="text-input" name="end_day">
                                <option value=""></option>
                                <?php
                                    for ($d = 1; $d <= 31; $d++) {
                                        $selected = "";
                                        if ($d == @$end_day) {
                                            $selected = 'selected="selected"';
                                        }
                                        echo '<option value="' . $d . '" ' . $selected . '>' . $d . '</option>';
                                    }
                                ?>
                            </select>&nbsp;日
                        </div>
                        <input type="submit" value="検索">
                    </form>
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                <div class="content-box-content">
                    <div class="tab-content default-tab" id="tab1">
                        <table>
                            <thead>
                                <tr>
                                   <th><a href="./index<?php echo param_build($status, $selected_ctg, $title, DB_COLUMN_BLOG_STATUS)?>">ステータス</a></th>
                                   <th><a href="./index<?php echo param_build($status, $selected_ctg, $title, DB_COLUMN_BLOG_ID)?>">ブログNo</a></th>
                                   <th><a href="./index<?php echo param_build($status, $selected_ctg, $title, DB_COLUMN_BLOG_TITLE)?>">タイトル</a></th>
                                   <th><a href="./index<?php echo param_build($status, $selected_ctg, $title, DB_COLUMN_BLOG_MAILADDRESS)?>">メール</a></th>
                                   <th><a href="./index<?php echo param_build($status, $selected_ctg, $title, DB_COLUMN_BLOG_CATEGORY)?>">カテゴリ</a></th>
                                   <th><a href="./index<?php echo param_build($status, $selected_ctg, $title, DB_COLUMN_BLOG_INSERT_DATETIME)?>">登録日</a></th>
                                   <th><a href="./index<?php echo param_build($status, $selected_ctg, $title, DB_COLUMN_BLOG_IN_DATETIME)?>">初回IN日</a></th>
                                   <th>処理</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sys_root = SYSTEM_ROOT_PATH;
                                    $redirect = urlencode(param_build($status, $selected_ctg, $title, $order));
                                    if(count($blog)>0){
                                        foreach($blog as $val){
                                            $status_name = get_status_str($val[DB_COLUMN_BLOG_STATUS]);
                                            $register_date = date_separate($val[DB_COLUMN_BLOG_INSERT_DATETIME]);
                                            $in_date = date_separate($val[DB_COLUMN_BLOG_IN_DATETIME]);
                                            $ctg_name = find_category_name($ctg, $val[DB_COLUMN_BLOG_CATEGORY]);
                                            $next_step = "";
                                            switch ($val[DB_COLUMN_BLOG_STATUS]) {
                                                case BLOG_STATUS_IN:
                                                    break;
                                                case BLOG_STATUS_FIRST_REVIEW:
                                                    $next_step = '<p class="judge-param"><a href="javascript:void(0);" onclick="_confirm(\'審査OK\',\''.$sys_root.'/manage/update?id='.$val[DB_COLUMN_BLOG_ID].'&status=3&redirect='.$redirect.'\');">審査OK</a></p>';
                                                    $next_step .= '<p class="judge-param"><a href="javascript:void(0);" onclick="_confirm(\'審査NG\',\''.$sys_root.'/manage/update?id='.$val[DB_COLUMN_BLOG_ID].'&status=4&redirect='.$redirect.'\');">審査NG</a></p>';
                                                    break;
                                                case BLOG_STATUS_OK:
                                                    $next_step = '<p class="judge-param"><a href="javascript:void(0);" onclick="_confirm(\'審査NG\',\''.$sys_root.'/manage/update?id='.$val[DB_COLUMN_BLOG_ID].'&status=4&redirect='.$redirect.'\');">審査NG</a></p>';
                                                    break;
                                                case BLOG_STATUS_NG:
                                                    $next_step = '<p class="judge-param"><a href="javascript:void(0);" onclick="_confirm(\'審査OK\',\''.$sys_root.'/manage/update?id='.$val[DB_COLUMN_BLOG_ID].'&status=3&redirect='.$redirect.'\');">審査OK</a></p>';
                                                    break;
                                                case BLOG_STATUS_RE_REVIEW:
                                                    $next_step = '<p class="judge-param"><a href="javascript:void(0);" onclick="_confirm(\'審査OK\',\''.$sys_root.'/manage/update?id='.$val[DB_COLUMN_BLOG_ID].'&status=3&redirect='.$redirect.'\');">審査OK</a></p>';
                                                    $next_step .= '<p class="judge-param"><a href="javascript:void(0);" onclick="_confirm(\'審査NG\',\''.$sys_root.'/manage/update?id='.$val[DB_COLUMN_BLOG_ID].'&status=4&redirect='.$redirect.'\');">審査NG</a></p>';
                                                    break;
                                                default:
                                                    break;
                                            }

                                            echo <<<HERE
                                 <tr>
                                    <td>{$status_name}</td>
                                    <td>{$val[DB_COLUMN_BLOG_ID]}</td>
                                    <td><a href="{$val["url"]}" target="_blank">{$val["title"]}</a></td>
                                    <td><a href="mailto:{$val[DB_COLUMN_BLOG_MAILADDRESS]}">{$val[DB_COLUMN_BLOG_MAILADDRESS]}</a></td>
                                    <td>{$ctg_name}</td>
                                    <td>{$register_date}</td>
                                    <td>{$in_date}</td>
                                    <td>
                                        {$next_step}
                                        <p class="judge-param"><a href="javascript:void(0);" onclick="_confirm('強制退会',\''{$sys_root}/manage/update?id={$val[DB_COLUMN_BLOG_ID]}&status=-1&redirect=$redirect');">強制退会</a></p>
                                     </td>
                                </tr>
HERE;
                                        }
                                    }
                                ?>

                            </tbody>
                        </table>
                    </div>
                <div class="csvdl" style="">
                    <input type="button" name="csvdl" id="manage_csvdl" value="一括CSVダウンロード" />
                </div>
                </div> <!-- End .content-box-content -->
            </div> <!-- End .content-box -->
            <div id="footer">
            </div><!-- End #footer -->

        </div> <!-- End #main-content -->

    </div></body>

</html>
