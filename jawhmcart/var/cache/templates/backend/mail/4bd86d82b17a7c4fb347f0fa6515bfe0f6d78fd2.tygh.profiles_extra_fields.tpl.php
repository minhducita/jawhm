<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:06:30
         compiled from "/var/www/html/jawhmcart/design/backend/mail/templates/profiles/profiles_extra_fields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208897325156e662f66d4593-52038455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bd86d82b17a7c4fb347f0fa6515bfe0f6d78fd2' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/mail/templates/profiles/profiles_extra_fields.tpl',
      1 => 1457504346,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '208897325156e662f66d4593-52038455',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fields' => 0,
    'field' => 0,
    'order_info' => 0,
    'title' => 0,
    'user_data' => 0,
    'value' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e662f67f2101_82673465',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e662f67f2101_82673465')) {function content_56e662f67f2101_82673465($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('yes','no'));
?>
<?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
<?php if (!$_smarty_tpl->tpl_vars['field']->value['field_name']) {?>
<?php $_smarty_tpl->tpl_vars["value"] = new Smarty_variable($_smarty_tpl->tpl_vars['order_info']->value['fields'][$_smarty_tpl->tpl_vars['field']->value['field_id']], null, 0);?>
<p>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8');?>
:
    <?php if (strpos("AOL",$_smarty_tpl->tpl_vars['field']->value['field_type'])!==false) {?> 
        <?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['field']->value['field_id'])."_descr", null, 0);?>
        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value[$_smarty_tpl->tpl_vars['title']->value], ENT_QUOTES, 'UTF-8');?>

    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type']=="C") {?>  
        <?php if ($_smarty_tpl->tpl_vars['value']->value=="Y") {
echo $_smarty_tpl->__("yes");
} else {
echo $_smarty_tpl->__("no");
}?>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['field_type']=="D") {?>  
        <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']), ENT_QUOTES, 'UTF-8');?>

    <?php } elseif (strpos("RS",$_smarty_tpl->tpl_vars['field']->value['field_type'])!==false) {?>  
        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['values'][$_smarty_tpl->tpl_vars['value']->value], ENT_QUOTES, 'UTF-8');?>

    <?php } else { ?>  
        <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['value']->value)===null||$tmp==='' ? "-" : $tmp), ENT_QUOTES, 'UTF-8');?>

    <?php }?>
</p>
<?php }?>
<?php } ?><?php }} ?>
