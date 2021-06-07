<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:34:27
         compiled from "/var/www/html/jawhmcart/design/backend/templates/buttons/add_empty_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186631980456e67793a50c28-34423029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '981c9aedde5a30c11ef61551000f980b4e74b2ba' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/buttons/add_empty_item.tpl',
      1 => 1457504291,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '186631980456e67793a50c28-34423029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item_id' => 0,
    'but_onclick' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e67793a7ef23_44923323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67793a7ef23_44923323')) {function content_56e67793a7ef23_44923323($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('add'));
?>
<a class="icon-plus cm-tooltip" name="add" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_id']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("add");?>
" onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
"></a>&nbsp;<?php }} ?>
