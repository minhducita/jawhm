<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:38:16
         compiled from "/var/www/html/jawhmcart/design/backend/templates/buttons/sign_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123873367356e66a68074f16-20178516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7fa71c8a29adfedd728c7304d1ae9dd1ebe302a' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/buttons/sign_in.tpl',
      1 => 1457504299,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '123873367356e66a68074f16-20178516',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66a6809bc86_85525690',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66a6809bc86_85525690')) {function content_56e66a6809bc86_85525690($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('sign_in'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("sign_in"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_arrow'=>"on",'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value), 0);?>
<?php }} ?>
