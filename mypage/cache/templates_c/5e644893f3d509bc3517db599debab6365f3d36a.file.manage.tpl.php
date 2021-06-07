<?php /* Smarty version Smarty-3.1.13, created on 2015-07-06 10:04:44
         compiled from "/var/www/html/mypage/application/modules/staff/views/index/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19333466145599d42c766c85-76725235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e644893f3d509bc3517db599debab6365f3d36a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/index/manage.tpl',
      1 => 1419598675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19333466145599d42c766c85-76725235',
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
  'unifunc' => 'content_5599d42c859740_93736828',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5599d42c859740_93736828')) {function content_5599d42c859740_93736828($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/staff/index/index">スタップトップページ</a></li>
  <li>管理項目</li>
</ol>

<div class="list-group">
    <h4 class="panel-title">
        <a class="list-group-item btn-info-custom">管理項目一覧</a>
    </h4>

    <a href="staff/adopt/insuranceupload" class="list-group-item">保険加入情報アップロード</a>
    <a href="staff/adopt/insuranceerrorlist" class="list-group-item">保険加入情報取込みエラー一覧</a>
    <a href="staff/edit/schoollist" class="list-group-item">学校担当者管理一覧</a>
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse" class="list-group-item">メンテナンス</a>
    <div id="collapse" class="panel-collapse collapse">
        <a href="staff/edit/index" class="list-group-item">達成状況・催促メール・確認メール一覧文言変更</a>
        <a href="staff/edit/stepchart" class="list-group-item">ステップチャート文言変更</a>
        <a href="staff/edit/nextstep" class="list-group-item">次のステップ文言変更</a>
        <a href="staff/edit/schoollang" class="list-group-item">学校ページ言語修正</a>
        <a href="staff/edit/airport" class="list-group-item">空港名編集</a>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>