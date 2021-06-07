<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:12:47
         compiled from "/var/www/html/mypage/application/modules/default/views/index/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2501293655554670fc8d026-30214609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '036ce0f98d0ccb8a24b282c07e686d1aed68df08' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/login.tpl',
      1 => 1419238783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2501293655554670fc8d026-30214609',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
    'title' => 0,
    'google' => 0,
    'facebook' => 0,
    'twitter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5554670fd21b87_75917762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554670fd21b87_75917762')) {function content_5554670fd21b87_75917762($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="ja">
<head class="login">
    <base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
    <meta name="viewport" content="width=device-width, initial-scale=0.1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="mypage/themes/css/mypage-user.css" media="all" />
    <link href="mypage/themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" type="text/css" href="mypage/themes/css/common.css" media="all" />
    <title><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</title>
</head>
<body>
    <div style="max-width: 360px; margin-left: auto; margin-right:auto">
        <div id="intro">
            <div style="padding:10px;">
                <div style="margin-top:50px; margin-bottom:50px; text-align: center;">
                    <img src="mypage/themes/images/JAWHMLogo.jpg" width="268" height="78" alt="JAWHMロゴ" />
                </div>
                <div>
                    <div id="jawhmbanner" style="margin-bottom:20px">メンバー専用ページにログインするためのサービスを選択してください。</div>
                    <a class="button-login button jawhm" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/index/jawhmlogin">ワーホリ協会からログインする</a>
                    <a class="button-login button google" href="<?php echo $_smarty_tpl->tpl_vars['google']->value;?>
">Google IDでログインする</a>
                    <a class="button-login button facebook" href="<?php echo $_smarty_tpl->tpl_vars['facebook']->value;?>
">Facebook IDでログインする</a>
                    <a class="button-login button twitter" href="<?php echo $_smarty_tpl->tpl_vars['twitter']->value;?>
">Twitter IDでログインする</a>
                </div>
                <div class="expression-weak"></span><a href="http://www.jawhm.or.jp/">ワーホリ協会ページに戻る</a><br />
                メンバーではありませんか? <a href="http://www.jawhm.or.jp/mem/">会員登録を行う。</a></div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/common.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/mypage-user.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
</body>
</html><?php }} ?>