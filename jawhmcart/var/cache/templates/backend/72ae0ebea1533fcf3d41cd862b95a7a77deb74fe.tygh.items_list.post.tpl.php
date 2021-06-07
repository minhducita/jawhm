<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:37:03
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/wishlist/hooks/cart/items_list.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181587857056e6782f5826b8-11423704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72ae0ebea1533fcf3d41cd862b95a7a77deb74fe' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/wishlist/hooks/cart/items_list.post.tpl',
      1 => 1457504615,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '181587857056e6782f5826b8-11423704',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'customer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6782f59d748_05039941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6782f59d748_05039941')) {function content_56e6782f59d748_05039941($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('product_s'));
?>
<td><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['customer']->value['wishlist_products'])===null||$tmp==='' ? "0" : $tmp), ENT_QUOTES, 'UTF-8');?>
 <?php echo $_smarty_tpl->__("product_s");?>
</td><?php }} ?>
