<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 15:39:29
         compiled from "/var/www/html/mypage/application/modules/staff/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:942508425556414ddddbba6-49134120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddcc880bc433e8ed7018d29100a625653946c8de' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/index/index.tpl',
      1 => 1432622367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '942508425556414ddddbba6-49134120',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556414ddea6082_20223865',
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556414ddea6082_20223865')) {function content_556414ddea6082_20223865($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<ol class="breadcrumb" style="margin-top:70px;">
  <li>スタッフ用ページトップ</li>
</ol>

<div class="contents-wrapper">
    <h2>スタッフ専用ページ</h2>
    以下よりご希望のメニューを選択してください。
</div>

<div class="list-group">
    <h4 class="panel-title">
        <a class="list-group-item btn-info-custom">スタッフ専用メニュー</a>
    </h4>

        
        <a id="selectabroad" class="list-group-item clickable">お客様関連ファイル管理</a>
        <a href="staff/school/index" class="list-group-item clickable">お客様コメント(学校)</a>
        <a href="staff/school/proposal" class="list-group-item clickable">学校セミナー日程調整一覧</a>
        <a href="staff/school/talk" class="list-group-item clickable">学校つながり一覧</a>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>