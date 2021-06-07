<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 07:43:24
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/orders/components/payments/check.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159825374056e0fb6c18bf52-19404034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b4a8def108d3603ba105af74f601eb0b1235697' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/orders/components/payments/check.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '159825374056e0fb6c18bf52-19404034',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'cart' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e0fb6c2c8299_23155077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0fb6c2c8299_23155077')) {function content_56e0fb6c2c8299_23155077($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('customer_signature','checking_account_number','bank_routing_number','customer_signature','checking_account_number','bank_routing_number'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="ty-control-group">
    <label for="customer_signature" class="ty-control-group__title cm-required"><?php echo $_smarty_tpl->__("customer_signature");?>
</label>
    <input id="customer_signature" size="35" type="text" name="payment_info[customer_signature]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['payment_info']['customer_signature'], ENT_QUOTES, 'UTF-8');?>
" class="ty-input-text cm-autocomplete-off cm-focus" />
</div>
<div class="ty-control-group">
    <label for="checking_account_number" class="ty-control-group__title cm-required"><?php echo $_smarty_tpl->__("checking_account_number");?>
</label>
    <input id="checking_account_number" size="35" type="text" name="payment_info[checking_account_number]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['payment_info']['checking_account_number'], ENT_QUOTES, 'UTF-8');?>
" class="ty-input-text cm-autocomplete-off" />
</div>
<div class="ty-control-group">
    <label for="bank_routing_number" class="ty-control-group__title cm-required"><?php echo $_smarty_tpl->__("bank_routing_number");?>
</label>
    <input id="bank_routing_number" size="35" type="text" name="payment_info[bank_routing_number]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['payment_info']['bank_routing_number'], ENT_QUOTES, 'UTF-8');?>
" class="ty-input-text cm-autocomplete-off" />
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/orders/components/payments/check.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/orders/components/payments/check.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="ty-control-group">
    <label for="customer_signature" class="ty-control-group__title cm-required"><?php echo $_smarty_tpl->__("customer_signature");?>
</label>
    <input id="customer_signature" size="35" type="text" name="payment_info[customer_signature]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['payment_info']['customer_signature'], ENT_QUOTES, 'UTF-8');?>
" class="ty-input-text cm-autocomplete-off cm-focus" />
</div>
<div class="ty-control-group">
    <label for="checking_account_number" class="ty-control-group__title cm-required"><?php echo $_smarty_tpl->__("checking_account_number");?>
</label>
    <input id="checking_account_number" size="35" type="text" name="payment_info[checking_account_number]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['payment_info']['checking_account_number'], ENT_QUOTES, 'UTF-8');?>
" class="ty-input-text cm-autocomplete-off" />
</div>
<div class="ty-control-group">
    <label for="bank_routing_number" class="ty-control-group__title cm-required"><?php echo $_smarty_tpl->__("bank_routing_number");?>
</label>
    <input id="bank_routing_number" size="35" type="text" name="payment_info[bank_routing_number]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['payment_info']['bank_routing_number'], ENT_QUOTES, 'UTF-8');?>
" class="ty-input-text cm-autocomplete-off" />
</div><?php }?><?php }} ?>
