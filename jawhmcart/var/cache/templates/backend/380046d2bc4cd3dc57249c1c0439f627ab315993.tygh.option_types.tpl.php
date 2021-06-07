<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:34:27
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/product_options/components/option_types.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139746600056e6779337caf7-04569737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '380046d2bc4cd3dc57249c1c0439f627ab315993' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/product_options/components/option_types.tpl',
      1 => 1457504486,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '139746600056e6779337caf7-04569737',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'display' => 0,
    'value' => 0,
    'tag_id' => 0,
    'name' => 0,
    'check' => 0,
    'app_types' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677935c1492_10136665',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677935c1492_10136665')) {function content_56e677935c1492_10136665($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('selectbox','radiogroup','checkbox','text','textarea','file','selectbox','radiogroup','checkbox','text','textarea','file'));
?>
<?php if ($_smarty_tpl->tpl_vars['display']->value=="view") {
if ($_smarty_tpl->tpl_vars['value']->value=="S") {
echo $_smarty_tpl->__("selectbox");
} elseif ($_smarty_tpl->tpl_vars['value']->value=="R") {
echo $_smarty_tpl->__("radiogroup");
} elseif ($_smarty_tpl->tpl_vars['value']->value=="C") {
echo $_smarty_tpl->__("checkbox");
} elseif ($_smarty_tpl->tpl_vars['value']->value=="I") {
echo $_smarty_tpl->__("text");
} elseif ($_smarty_tpl->tpl_vars['value']->value=="T") {
echo $_smarty_tpl->__("textarea");
} elseif ($_smarty_tpl->tpl_vars['value']->value=="F") {
echo $_smarty_tpl->__("file");
}
} else {
if ($_smarty_tpl->tpl_vars['value']->value) {
if ($_smarty_tpl->tpl_vars['value']->value=="S"||$_smarty_tpl->tpl_vars['value']->value=="R") {
$_smarty_tpl->tpl_vars["app_types"] = new Smarty_variable("SR", null, 0);
} elseif ($_smarty_tpl->tpl_vars['value']->value=="I"||$_smarty_tpl->tpl_vars['value']->value=="T") {
$_smarty_tpl->tpl_vars["app_types"] = new Smarty_variable("IT", null, 0);
} elseif ($_smarty_tpl->tpl_vars['value']->value=="C") {
$_smarty_tpl->tpl_vars["app_types"] = new Smarty_variable("C", null, 0);
} else {
$_smarty_tpl->tpl_vars["app_types"] = new Smarty_variable("F", null, 0);
}
} else {
$_smarty_tpl->tpl_vars["app_types"] = new Smarty_variable('', null, 0);
}?><select id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag_id']->value, ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['check']->value) {?>onchange="fn_check_option_type(this.value, this.id);"<?php }?>><?php if (!$_smarty_tpl->tpl_vars['app_types']->value||($_smarty_tpl->tpl_vars['app_types']->value&&strpos($_smarty_tpl->tpl_vars['app_types']->value,"S")!==false)) {?><option value="S" <?php if ($_smarty_tpl->tpl_vars['value']->value=="S") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("selectbox");?>
</option><?php }
if (!$_smarty_tpl->tpl_vars['app_types']->value||($_smarty_tpl->tpl_vars['app_types']->value&&strpos($_smarty_tpl->tpl_vars['app_types']->value,"R")!==false)) {?><option value="R" <?php if ($_smarty_tpl->tpl_vars['value']->value=="R") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("radiogroup");?>
</option><?php }
if (!$_smarty_tpl->tpl_vars['app_types']->value||($_smarty_tpl->tpl_vars['app_types']->value&&strpos($_smarty_tpl->tpl_vars['app_types']->value,"C")!==false)) {?><option value="C" <?php if ($_smarty_tpl->tpl_vars['value']->value=="C") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("checkbox");?>
</option><?php }
if (!$_smarty_tpl->tpl_vars['app_types']->value||($_smarty_tpl->tpl_vars['app_types']->value&&strpos($_smarty_tpl->tpl_vars['app_types']->value,"I")!==false)) {?><option value="I" <?php if ($_smarty_tpl->tpl_vars['value']->value=="I") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("text");?>
</option><?php }
if (!$_smarty_tpl->tpl_vars['app_types']->value||($_smarty_tpl->tpl_vars['app_types']->value&&strpos($_smarty_tpl->tpl_vars['app_types']->value,"T")!==false)) {?><option value="T" <?php if ($_smarty_tpl->tpl_vars['value']->value=="T") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("textarea");?>
</option><?php }
if (!$_smarty_tpl->tpl_vars['app_types']->value||($_smarty_tpl->tpl_vars['app_types']->value&&strpos($_smarty_tpl->tpl_vars['app_types']->value,"F")!==false)) {?><option value="F" <?php if ($_smarty_tpl->tpl_vars['value']->value=="F") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("file");?>
</option><?php }?></select><?php }?><?php }} ?>
