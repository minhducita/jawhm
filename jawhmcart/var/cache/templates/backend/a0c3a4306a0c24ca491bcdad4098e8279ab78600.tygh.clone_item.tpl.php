<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:34:27
         compiled from "/var/www/html/jawhmcart/design/backend/templates/buttons/clone_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34149252756e67793a8af35-49094392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0c3a4306a0c24ca491bcdad4098e8279ab78600' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/buttons/clone_item.tpl',
      1 => 1457504292,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '34149252756e67793a8af35-49094392',
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
  'unifunc' => 'content_56e67793aa0f46_26286215',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67793aa0f46_26286215')) {function content_56e67793aa0f46_26286215($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('clone'));
?>
<a class="exicon-clone cm-tooltip" name="clone" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item_id']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("clone");?>
" onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_onclick']->value, ENT_QUOTES, 'UTF-8');?>
"></a>&nbsp;<?php }} ?>
