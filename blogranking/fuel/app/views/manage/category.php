<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />        
        <title>カテゴリ一覧</title>        
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
			<p id="page-intro"><a href="/blogranking/manage/index.html">管理画面</a>&nbsp;&gt;カテゴリ一覧</p>
                <h2>カテゴリ一覧</h2>      
                <div class="clear"></div> <!-- End .clear -->           
                <div class="content-box"><!-- Start Content Box -->             
                    <div class="content-box-header small-header">                    
                        <h3>カテゴリ一覧</h3>
                            <div class="clear"></div>                   
                        </div> <!-- End .content-box-header -->             
                        <div class="content-box-content">                   
                            <div class="tab-content default-tab" id="tab1">                      
                                <table>                     
                                    <thead>
                                        <tr>
                                            <th>カテゴリNo</th>
                                            <th>名称</th>
                                            <th>バナー</th>
                                            <th>URL</th>
                                            <th>登録ブログ数</th>
                                            <th>処理</th>
                                        </tr>                               
                                    </thead>                        
                                    <tbody>
                                        <?php
                                            $sys_root = SYSTEM_ROOT_PATH;
                                            foreach($ctg as $val){
                                                $delete_button = ($val["num"] == 0)? 
                                                        '<p class="judge-param"><input type="button" value="削除" onclick="location.href = \''.SYSTEM_ROOT_PATH.'/manage/update_ctg?delete=1&id='.$val[DB_COLUMN_CATEGORY_ID].'\'"></p>' : "";
                                                echo <<<HERE
                                        <tr>
                                            <form action="{$sys_root}/manage/update_ctg" method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="{$val[DB_COLUMN_CATEGORY_ID]}" name="id">
                                            <input type="hidden" value="{$val[DB_COLUMN_CATEGORY_SORT_ORDER]}" name="sort">
                                            <td>{$val[DB_COLUMN_CATEGORY_ID]}</td>
                                            <td style="width:200px;"><input type="text" name="name" class="text-input" value="{$val[DB_COLUMN_CATEGORY_NAME]}"></td>
                                            <td><img src="{$banner_url[$val[DB_COLUMN_CATEGORY_ID]]}"><input type="file" name="img" value="ファイルを選択"/></td>
                                            <td><input type="text" name="out_url" class="text-input" value="{$val[DB_COLUMN_CATEGORY_OUT_URL]}"></td>
                                            <td>{$val["num"]}ブログ</td>
                                            <td>
                                                <p class="judge-param"><input type="submit" value="更新"></p>
                                                {$delete_button}
                                            </td>
                                            </form>
                                        </tr>
HERE;
                                            }
                                        ?>
                                        <tr>
                                            <form action="<?php echo SYSTEM_ROOT_PATH?>/manage/update_ctg?new=1" method="post" enctype="multipart/form-data">
                                            <td>新規</td>
                                            <td style="width:200px;"><input type="text" name="name" class="text-input" value=""></td>
                                            <td><input type="file" name="img" value="ファイルを選択"/></td>
                                            <td><input type="text" name="out_url" class="text-input" value=""></td>
                                            <td>0ブログ</td>
                                            <td>
                                                <p class="judge-param"><input type="submit" value="追加"></p>
                                            </td>
                                            </form>
                                        </tr>
                                    </tbody>                            
                                </table>                        
                            </div>                                          
                        </div> <!-- End .content-box-content -->                
                    </div> <!-- End .content-box -->                                
                <div id="footer"></div><!-- End #footer -->            
            </div> <!-- End #main-content -->        
        </div>
</body>  
</html>
