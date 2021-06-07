<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:37:03
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/wishlist/hooks/cart/search_form.override.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111146742956e6782f94d583-55503981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ea29ce56c5ec2c2559a00fef1cf1e16951b5573' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/wishlist/hooks/cart/search_form.override.tpl',
      1 => 1457504615,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '111146742956e6782f94d583-55503981',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search' => 0,
    'check_all' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6782f98a1d8_90490152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6782f98a1d8_90490152')) {function content_56e6782f98a1d8_90490152($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('cart','wishlist'));
?>
<label for="cb_product_type_c"><input type="checkbox" value="Y" <?php if ($_smarty_tpl->tpl_vars['search']->value['product_type_c']=="Y"||$_smarty_tpl->tpl_vars['check_all']->value) {?>checked="checked"<?php }?> name="product_type_c" id="cb_product_type_c" onclick="if (!this.checked) document.getElementById('cb_product_type_w').checked = true;"/>
<?php echo $_smarty_tpl->__("cart");?>
</label>

<label for="cb_product_type_w"><input type="checkbox" value="Y" <?php if ($_smarty_tpl->tpl_vars['search']->value['product_type_w']=="Y"||$_smarty_tpl->tpl_vars['check_all']->value) {?>checked="checked"<?php }?> name="product_type_w" id="cb_product_type_w" onclick="if (!this.checked) document.getElementById('cb_product_type_c').checked = true;"  />
<?php echo $_smarty_tpl->__("wishlist");?>
</label><?php }} ?>
