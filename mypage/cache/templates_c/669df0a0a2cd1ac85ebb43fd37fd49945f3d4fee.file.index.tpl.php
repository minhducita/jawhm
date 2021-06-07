<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:48:36
         compiled from "/var/www/html/mypage/application/modules/default/views/member/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21224405325559b561f24007-24399234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '669df0a0a2cd1ac85ebb43fd37fd49945f3d4fee' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/index.tpl',
      1 => 1435656744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21224405325559b561f24007-24399234',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5559b562079b78_32171610',
  'variables' => 
  array (
    'header' => 0,
    'client' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559b562079b78_32171610')) {function content_5559b562079b78_32171610($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="<?php if ($_smarty_tpl->tpl_vars['client']->value==0){?>staff/client/clientindex<?php }else{ ?>index/index<?php }?>">メンバー専用ページトップ</a></li>
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
        <h4 class="panel-title">会員情報変更メニュー</h4>
    </div>
    <ul class="list-group">
        <li class="list-group-item"><a href="#"><span id="password_edit" class="text-bold glyphicon glyphicon-edit" style="font-size: 14px; ">パスワード変更</span></a></li>
        <li class="list-group-item"><a href="member/email"><span class="text-bold glyphicon glyphicon-edit" style="font-size: 14px; ">メールアドレス変更</span></a></li>
        <li class="list-group-item"><a href="member/addresslist"><span class="text-bold glyphicon glyphicon-edit" style="font-size: 14px; ">住所・電話番号情報変更</span></a></li>
    </ul>
</div>
<a id="help-member" class="pull-right"><i class="glyphicon glyphicon-question-sign"></i>ヘルプ</a>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>