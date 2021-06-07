<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:34:27
         compiled from "/var/www/html/jawhmcart/design/backend/templates/buttons/remove_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76912915456e67793aac0a6-52334289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c694e47ecfe447dd17b6393027536fd0def5c0e' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/buttons/remove_item.tpl',
      1 => 1457504297,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '76912915456e67793aac0a6-52334289',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'simple' => 0,
    'only_delete' => 0,
    'item_id' => 0,
    'but_class' => 0,
    'but_onclick' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e67793b09660_46255370',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67793b09660_46255370')) {function content_56e67793b09660_46255370($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('remove','remove'));
?>
<?php if (!$_smarty_tpl->tpl_vars['simple']->value) {?>
	<a class="icon-remove cm-opacity cm-tooltip <?php if ($_smarty_tpl->tpl_vars['only_delete']->value=="Y") {?> hidden<?php }?>" name="remove" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_id']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("remove");?>
"></a>
<?php }?>
<a name="remove_hidden" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="icon-remove cm-tooltip <?php if (!$_smarty_tpl->tpl_vars['simple']->value&&$_smarty_tpl->tpl_vars['only_delete']->value!="Y") {?> hidden<?php }
if ($_smarty_tpl->tpl_vars['but_class']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_class']->value, ENT_QUOTES, 'UTF-8');
}?>" title="<?php echo $_smarty_tpl->__("remove");?>
" <?php if ($_smarty_tpl->tpl_vars['but_onclick']->value) {?> onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>></a><?php }} ?>
