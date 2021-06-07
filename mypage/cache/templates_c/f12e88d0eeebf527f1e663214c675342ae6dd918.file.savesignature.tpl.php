<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:25:20
         compiled from "/var/www/html/mypage/application/modules/default/views/application/savesignature.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229380179556698b0d07483-75846387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f12e88d0eeebf527f1e663214c675342ae6dd918' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/application/savesignature.tpl',
      1 => 1418719396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '229380179556698b0d07483-75846387',
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
  'unifunc' => 'content_556698b0d876e6_68910991',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556698b0d876e6_68910991')) {function content_556698b0d876e6_68910991($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="result-container">
    <h1>署名登録が完了しました。</h1><br />
    ご協力ありがとうございました。<br />
    <a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/application/index">書類一覧へ</a>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>