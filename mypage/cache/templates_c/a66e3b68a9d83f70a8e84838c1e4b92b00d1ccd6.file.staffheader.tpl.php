<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:12:44
         compiled from "/var/www/html/mypage/themes/layout/staffheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2806628735554670c8fb931-35347130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a66e3b68a9d83f70a8e84838c1e4b92b00d1ccd6' => 
    array (
      0 => '/var/www/html/mypage/themes/layout/staffheader.tpl',
      1 => 1429266440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2806628735554670c8fb931-35347130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
    'json' => 0,
    'datetimepicker' => 0,
    'top' => 0,
    'child' => 0,
    'datepicker' => 0,
    'title' => 0,
    'jsmsg' => 0,
    'progress' => 0,
    'abroad_flag' => 0,
    'auth_cd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5554670ca03a76_78084812',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554670ca03a76_78084812')) {function content_5554670ca03a76_78084812($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="ja">
<head>
  <base href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/">
  <?php if (isset($_smarty_tpl->tpl_vars['json']->value)){?>
    <meta http-equiv="Content-Type" content="application/json" charset=utf-8>
  <?php }else{ ?>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <?php }?>
  <meta name="format-detection" content="telephone=no">
  <link href="themes/css/reset.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="themes/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen" />

  <?php if (isset($_smarty_tpl->tpl_vars['datetimepicker']->value)){?><link href="themes/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen" /><?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['top']->value)){?><link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"><?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['child']->value)){?><link href="themes/css/bum.css" rel="stylesheet"><?php }?>
  <link href="themes/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <?php if (isset($_smarty_tpl->tpl_vars['datepicker']->value)){?><link rel="stylesheet" type="text/css" href="themes/css/bootstrap-datetimepicker.min.css" media="all" /><?php }?>
  <link rel="stylesheet" type="text/css" href="themes/css/mypage-staff.css" media="all" />
  <title><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</title>
  <script>
    jsmsg = <?php echo $_smarty_tpl->tpl_vars['jsmsg']->value;?>
;
  </script>
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/staff/index">STAFF</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse-target">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

        </div>

        <div class="collapse navbar-collapse collapse-target">
            <ul class="nav navbar-nav">
                    <li><a href="staff/client/clientindex">トップページ</a>
                    <li class="arrow-top"><span onClick="location.href='staff/plan/index'" class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="staff-android0-divine">準備</span><span class="button-triangle" onClick="location.href='staff/plan/index'" id="staff-android0"></span>
                    <?php if (isset($_smarty_tpl->tpl_vars['progress']->value)){?>
                        <?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?><?php if ($_smarty_tpl->tpl_vars['abroad_flag']->value=='1'){?><li class="arrow-top arrow-left"><span onClick="location.href='staff/application/index'" class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['progress']->value>=3){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="staff-android1-divine">書類</span><span abbr="staff-android1" class="button-triangle" onClick="location.href='staff/application/index'"></span><?php }?><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['progress']->value>=3){?><?php if ($_smarty_tpl->tpl_vars['abroad_flag']->value=='1'){?><li class="arrow-top arrow-left"><span onClick="location.href='staff/preparation/index'" class="button-step clickable <?php if ($_smarty_tpl->tpl_vars['progress']->value>=4){?>success-color<?php }else{ ?>danger-color<?php }?>" abbr="staff-android2-divine">出発</span><span abbr="staff-android2" class="button-triangle" onClick="location.href='staff/preparation/index'"></span><?php }?><?php }?>
                    <?php }?>
                    <li class="arrow-left"><a href="staff/seminar/index">セミナー予約情報</a></li>
                    <li><a href="staff/member/index">会員情報変更</a></li>
                    <li><a href="staff/talk/index">一言相談</a></li>
                    <li><a href="staff/index/index">スタッフ専用</a></li>
                    <?php if (isset($_smarty_tpl->tpl_vars['auth_cd']->value)&&$_smarty_tpl->tpl_vars['auth_cd']->value>=130){?>
                        <li><a href="staff/index/manage">管理項目</a></li>
                    <?php }else{ ?>
                    <?php }?>
                    <li><a href="staff/index/logout">ログアウト</a></li>
            </ul>
        </div>
    </div>

    <div style="margin-bottom: 50px;"></div>
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script>
        <?php if ($_smarty_tpl->tpl_vars['top']->value==1){?>
            var is_top = 1;
        <?php }else{ ?>
            var is_top = 0;
        <?php }?>
        
            var width0 = $('*[abbr=staff-android0-divine]').outerWidth();
            $('*[abbr=staff-android0]').css('left', width0);
            if (is_top == 0) {
                var width1 = $('*[abbr=staff-android1-divine]').outerWidth();
                $('*[abbr=staff-android1]').css('left', width1);
            }

            if (is_top == 0) {
                var width2 = $('*[abbr=staff-android2-divine]').outerWidth();
                $('*[abbr=android2]').css('left', width2);
            }
            //
        
    </script><?php }} ?>