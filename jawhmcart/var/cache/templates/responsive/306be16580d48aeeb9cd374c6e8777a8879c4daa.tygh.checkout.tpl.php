<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 07:42:20
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19767068256e0fb2c31b664-11092848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '306be16580d48aeeb9cd374c6e8777a8879c4daa' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/checkout.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '19767068256e0fb2c31b664-11092848',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e0fb2c3bed73_99665091',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0fb2c3bed73_99665091')) {function content_56e0fb2c3bed73_99665091($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('secure_checkout','secure_checkout'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo smarty_function_script(array('src'=>"js/tygh/exceptions.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/tygh/checkout.js"),$_smarty_tpl);?>


<?php echo Smarty::$_smarty_vars['capture']['checkout_error_content'];?>

<?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/checkout_steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><span class="ty-checkout__title"><?php echo $_smarty_tpl->__("secure_checkout");?>
&nbsp;<i class="ty-checkout__title-icon ty-icon-lock"></i></span><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/checkout/checkout.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/checkout/checkout.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo smarty_function_script(array('src'=>"js/tygh/exceptions.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/tygh/checkout.js"),$_smarty_tpl);?>


<?php echo Smarty::$_smarty_vars['capture']['checkout_error_content'];?>

<?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/checkout_steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><span class="ty-checkout__title"><?php echo $_smarty_tpl->__("secure_checkout");?>
&nbsp;<i class="ty-checkout__title-icon ty-icon-lock"></i></span><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php }?><?php }} ?>
