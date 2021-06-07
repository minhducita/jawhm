<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 11:17:17
         compiled from "/var/www/html/mypage/application/modules/error/views/index/nofile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2540528885563d7ad0747a5-27815008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9285cc175522298b497abf02c510a5530e7eaa72' => 
    array (
      0 => '/var/www/html/mypage/application/modules/error/views/index/nofile.tpl',
      1 => 1419238896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2540528885563d7ad0747a5-27815008',
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
  'unifunc' => 'content_5563d7ad1245b5_02520402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5563d7ad1245b5_02520402')) {function content_5563d7ad1245b5_02520402($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="result-container">
  <h1>ファイルが見つかりません</h1>  
    ご指定のファイルは存在しません。<br />
  <a href="javascript:window.close();">閉じる</a>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>