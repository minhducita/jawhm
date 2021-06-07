<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 08:16:26
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/mail/templates/orders/order_notification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12172603056e1032a6d19c5-49028697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bab664b0986da18890f5a297888c74f7ec47ea2' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/mail/templates/orders/order_notification.tpl',
      1 => 1457518431,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '12172603056e1032a6d19c5-49028697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'order_info' => 0,
    'order_status' => 0,
    'status_settings' => 0,
    'order_header' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e1032a80b832_54739867',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e1032a80b832_54739867')) {function content_56e1032a80b832_54739867($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('dear','invoice','credit_memo','order_details','dear','invoice','credit_memo','order_details'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo $_smarty_tpl->getSubTemplate ("common/letter_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->__("dear");?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['firstname'], ENT_QUOTES, 'UTF-8');?>
,<br /><br />

<?php echo $_smarty_tpl->tpl_vars['order_status']->value['email_header'];?>
<br /><br />

<?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("invoice"), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="C"&&$_smarty_tpl->tpl_vars['order_info']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']]) {?>
    <?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("credit_memo"), null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="O") {?>
    <?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("order_details"), null, 0);?>
<?php }?>

<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_header']->value, ENT_QUOTES, 'UTF-8');?>
:</b><br />

<?php echo $_smarty_tpl->getSubTemplate ("orders/invoice.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("common/letter_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="orders/order_notification.tpl" id="<?php echo smarty_function_set_id(array('name'=>"orders/order_notification.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo $_smarty_tpl->getSubTemplate ("common/letter_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->__("dear");?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['firstname'], ENT_QUOTES, 'UTF-8');?>
,<br /><br />

<?php echo $_smarty_tpl->tpl_vars['order_status']->value['email_header'];?>
<br /><br />

<?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("invoice"), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="C"&&$_smarty_tpl->tpl_vars['order_info']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']]) {?>
    <?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("credit_memo"), null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="O") {?>
    <?php $_smarty_tpl->tpl_vars["order_header"] = new Smarty_variable($_smarty_tpl->__("order_details"), null, 0);?>
<?php }?>

<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_header']->value, ENT_QUOTES, 'UTF-8');?>
:</b><br />

<?php echo $_smarty_tpl->getSubTemplate ("orders/invoice.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("common/letter_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
}?><?php }} ?>
