<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:31:07
         compiled from "/var/www/html/jawhmcart/design/backend/templates/buttons/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69075433456e668bb0b7fa0-96672352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01a3013bc2d249ee85e0a9b1a8bf6e0f63e986ae' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/buttons/search.tpl',
      1 => 1457504298,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '69075433456e668bb0b7fa0-96672352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
    'but_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e668bb0e7a55_17570410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e668bb0e7a55_17570410')) {function content_56e668bb0e7a55_17570410($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('search'));
?>

<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("search"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value,'but_name'=>$_smarty_tpl->tpl_vars['but_name']->value), 0);?>
<?php }} ?>
