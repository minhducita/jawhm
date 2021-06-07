<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:12:51
         compiled from "/var/www/html/mypage/themes/layout/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1964962434555467134e37e9-25022971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad6401b683b8be5dedb5bf7362267831628c8e1c' => 
    array (
      0 => '/var/www/html/mypage/themes/layout/header.tpl',
      1 => 1429263197,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1964962434555467134e37e9-25022971',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
    'datepicker' => 0,
    'top' => 0,
    'child' => 0,
    'title' => 0,
    'jsmsg' => 0,
    'smp' => 0,
    'progress' => 0,
    'abroad_flag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_555467135d1a46_83840146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555467135d1a46_83840146')) {function content_555467135d1a46_83840146($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="ja">
<head>
<base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="application/json" charset=utf-8>
<meta name="format-detection" content="telephone=no">
<link href="themes/css/reset.css" rel="stylesheet" type="text/css" media="screen" />
<link href="themes/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen" />
<?php if (isset($_smarty_tpl->tpl_vars['datepicker']->value)){?><link href="themes/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen" /><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['top']->value)){?><link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['child']->value)){?><link href="themes/css/bum.css" rel="stylesheet"><?php }?>
<link href="themes/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
<?php if (isset($_smarty_tpl->tpl_vars['child']->value)){?><?php }else{ ?><link href="themes/css/mypage-user.css" rel="stylesheet" type="text/css" media="all" /><?php }?>
<title><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</title>
<script>
    jsmsg = <?php echo $_smarty_tpl->tpl_vars['jsmsg']->value;?>
;
</script>
</head>
<body <?php if (isset($_smarty_tpl->tpl_vars['child']->value)){?>style="background-color: #acacac; "<?php }?>>
<?php if (!isset($_smarty_tpl->tpl_vars['top']->value)&&$_smarty_tpl->tpl_vars['smp']->value==0&&!isset($_smarty_tpl->tpl_vars['child']->value)){?>
        <div class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">JAWHM</a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".collapse-target">
                                <span class="sr-only">Toggle navigation</span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                                        class="icon-bar"></span>
                        </button>

                </div>

                <div class="collapse navbar-collapse collapse-target">
                        <ul class="nav navbar-nav">
                                <li><a href="">トップページ</a>
                                <li class="arrow-top"><span onClick="location.href='plan/index'" class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="android0-divine">準備</span><span class="button-triangle" onClick="location.href='plan/index'" id="android0"></span></li>
                                <?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?><?php if ($_smarty_tpl->tpl_vars['abroad_flag']->value=='1'){?><li class="arrow-top arrow-left"><span onClick="location.href='application/index'" class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['progress']->value>=3){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="android1-divine">書類</span><span abbr="android1" class="button-triangle" onClick="location.href='application/index'"></span></li><?php }?><?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['progress']->value>=3){?><?php if ($_smarty_tpl->tpl_vars['abroad_flag']->value=='1'){?><li class="arrow-top arrow-left"><span onClick="location.href='preparation/index'" class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['progress']->value>=4){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="android2-divine">出発</span><span abbr="android2" class="button-triangle" onClick="location.href='preparation/index'"></span></li><?php }?><?php }?>
                                <li class="arrow-left"><a href="seminar/index">セミナー予約情報</a></li>
                                <li><a href="member/index">会員情報変更</a></li>
                                <li><a href="talk/index">一言相談</a></li>
                                <li><a href="index/logout">ログアウト</a></li>
                        </ul>
                </div>
        </div>
        <div style="margin-bottom: 50px;"></div>
        <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
        <script>
            
                var width0 = $('*[abbr=android0-divine]').outerWidth();
                $('*[abbr=android0]').css('left', width0);
                var width1 = $('*[abbr=android1-divine]').outerWidth();
                $('*[abbr=android1]').css('left', width1);
                var width2 = $('*[abbr=android2-divine]').outerWidth();
                $('*[abbr=android2]').css('left', width2);
            
        </script>
<?php }?><?php }} ?>