<?php /* Smarty version Smarty-3.1.13, created on 2015-06-01 16:59:32
         compiled from "/var/www/html/mypage/application/modules/staff/views/member/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:680649318556c10e41aa301-89304380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26c85a1d695dd8fe4371d3f331589aafd856e553' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/member/index.tpl',
      1 => 1419599209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '680649318556c10e41aa301-89304380',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'base' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556c10e4255534_19753415',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556c10e4255534_19753415')) {function content_556c10e4255534_19753415($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/index/index">メンバー専用ページトップ</a></li>
  <li>会員情報変更</li>
</ol>

<div class="contents-wrapper">
    <h2>会員情報変更</h2>
    ご登録頂いた会員情報を変更します。<br />
    以下よりご希望のメニューを選択してください。<br />
    お名前・生年月日など、下記選択メニュー以外で変更がある場合はtoiawase@jawhm.or.jp までご連絡ください。
</div>
<div class="panel panel-primary col-xs-12" style="padding-left: 0px; padding-right: 0px;" >
    <div class="panel-heading">
        <h4 class="panel-title">セミナーメニュー</h4>
    </div>
    <ul class="list-group">
        <li class="list-group-item"><a href="#"><span id="password_edit" class="text-bold glyphicon glyphicon-edit" style="font-size: 14px; ">パスワード変更</span></a></li>
        <li class="list-group-item"><a href="member/email"><span class="text-bold glyphicon glyphicon-edit" style="font-size: 14px; ">メールアドレス変更</span></a></li>
        <li class="list-group-item"><a href="member/addresslist"><span class="text-bold glyphicon glyphicon-edit" style="font-size: 14px; ">住所・電話番号情報変更</span></a></li>
    </ul>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>