<?php /* Smarty version Smarty-3.1.13, created on 2015-07-06 10:04:33
         compiled from "/var/www/html/mypage/application/modules/staff/views/seminar/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1140834295599d421669b82-48897828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9160f9fbb8593bb827d9b2e309d2a97ec293f347' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/seminar/index.tpl',
      1 => 1429259719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1140834295599d421669b82-48897828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5599d42176ed06_44330728',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5599d42176ed06_44330728')) {function content_5599d42176ed06_44330728($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb">
  <li><a href="staff/client/clientindex">メンバー専用ページトップ</a></li>
  <li>セミナー予約</li>
</ol>

<div class="contents-wrapper">
    <h2>セミナー予約確認</h2>
    セミナーの予約・確認・キャンセル及び過去に参加したセミナーを確認できます。<br />
    以下よりご希望のメニューを選択してください。
</div>

<div class="panel panel-primary col-xs-12" style="padding-left: 0px; padding-right: 0px;" >
    <div class="panel-heading">
        <h4 class="panel-title">セミナーメニュー</h4>
    </div>
    <ul class="list-group">
        <li class="list-group-item"><a href="https://www.jawhm.or.jp/seminar/seminar.php"><span class="text-bold glyphicon glyphicon-bookmark" style="font-size: 14px; "></span> セミナー予約</a></li>
        <li class="list-group-item"><a href="seminar/booking"><span class="text-bold glyphicon glyphicon-bookmark" style="font-size: 14px; "></span> セミナー予約確認</a></li>
        <li class="list-group-item"><a href="seminar/history"><span class="text-bold glyphicon glyphicon-check" style="font-size: 14px; "></span> 過去に参加したセミナー一覧</a></li>
        <li class="list-group-item"><a href="seminar/online"><span class="text-bold glyphicon glyphicon-expand" style="font-size: 14px; "></span> オンラインセミナー一覧</a></li>
    </ul>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>