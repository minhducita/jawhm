<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:28:05
         compiled from "/var/www/html/jawhmcart/design/backend/templates/buttons/save.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116227595856e6761531b5c2-95137347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc693cd26dde5508cc7277f7fc8d1a70d3f94b1a' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/buttons/save.tpl',
      1 => 1457504297,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '116227595856e6761531b5c2-95137347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_role' => 0,
    'but_name' => 0,
    'but_meta' => 0,
    'but_onclick' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e676153636e1_08565350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e676153636e1_08565350')) {function content_56e676153636e1_08565350($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('save'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("save"),'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value,'but_name'=>$_smarty_tpl->tpl_vars['but_name']->value,'but_meta'=>$_smarty_tpl->tpl_vars['but_meta']->value,'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'allow_href'=>true), 0);?>
<?php }} ?>
