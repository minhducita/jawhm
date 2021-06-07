<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:23:55
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/profiles/components/profile_fields_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178524269256e6670b9ccb43-22734157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '451b299217d44f20ed1d7c21c03cdcbd199a29f1' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/profiles/components/profile_fields_info.tpl',
      1 => 1457504487,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '178524269256e6670b9ccb43-22734157',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fields' => 0,
    'field' => 0,
    'user_data' => 0,
    'customer_info' => 0,
    'first_field' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6670bab7547_20140184',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6670bab7547_20140184')) {function content_56e6670bab7547_20140184($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["first_field"] = new Smarty_variable(true, null, 0);?>
<p>
<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
    <?php if (!$_smarty_tpl->tpl_vars['field']->value['field_name']) {?>
        <?php $_smarty_tpl->tpl_vars["value"] = new Smarty_variable(fn_get_profile_field_value($_smarty_tpl->tpl_vars['user_data']->value,$_smarty_tpl->tpl_vars['field']->value), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['customer_info']->value) {?>
            <?php if (!$_smarty_tpl->tpl_vars['first_field']->value) {?>, <?php }?><span class="additional-fields">
        <?php } else { ?>
            <div class="control-group">
        <?php }?>
        <?php $_smarty_tpl->tpl_vars["first_field"] = new Smarty_variable(false, null, 0);?>

            <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8');?>
:</label>
            <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['value']->value)===null||$tmp==='' ? "-" : $tmp), ENT_QUOTES, 'UTF-8');?>


        <?php if ($_smarty_tpl->tpl_vars['customer_info']->value) {?>
            </span>
        <?php } else { ?>
            </div>
        <?php }?>
    <?php }?>
<?php } ?>
</p><?php }} ?>
