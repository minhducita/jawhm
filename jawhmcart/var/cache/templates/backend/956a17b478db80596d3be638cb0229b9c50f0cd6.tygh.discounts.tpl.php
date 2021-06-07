<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:08
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/discounts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171262728556e66f1093d179-40206791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '956a17b478db80596d3be638cb0229b9c50f0cd6' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/discounts.tpl',
      1 => 1457504474,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '171262728556e66f1093d179-40206791',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f10970599_22945560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f10970599_22945560')) {function content_56e66f10970599_22945560($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('discounts','discount_coupon_code'));
?>
<div class="orders-discounts">
	<h4><?php echo $_smarty_tpl->__("discounts");?>
</h4>
	<div class="orders-discount">
	    <label for="coupon_code"><?php echo $_smarty_tpl->__("discount_coupon_code");?>
:</label>
	    <input type="text" name="coupon_code" id="coupon_code" class="input-text-large" size="30" value="" />
	</div>
</div><?php }} ?>
