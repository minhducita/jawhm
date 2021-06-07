<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 12:16:37
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/products/components/products_update_features.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128941424456e68175e6ccb3-54566496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '902c3955ea424177cdda216564b5d1b7ec54d86d' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/products/components/products_update_features.tpl',
      1 => 1457504482,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '128941424456e68175e6ccb3-54566496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_features' => 0,
    'features_search' => 0,
    'product_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e68175ed34c9_85529035',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68175ed34c9_85529035')) {function content_56e68175ed34c9_85529035($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('no_items'));
?>
<div id="content_features" class="hidden">

<?php if ($_smarty_tpl->tpl_vars['product_features']->value) {?>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('search'=>$_smarty_tpl->tpl_vars['features_search']->value,'div_id'=>"product_features_pagination_".((string)$_smarty_tpl->tpl_vars['product_id']->value),'current_url'=>fn_url("products.get_features?product_id=".((string)$_smarty_tpl->tpl_vars['product_id']->value)),'disable_history'=>true), 0);?>


<fieldset>
    <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_assign_features.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_features'=>$_smarty_tpl->tpl_vars['product_features']->value), 0);?>

</fieldset>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('search'=>$_smarty_tpl->tpl_vars['features_search']->value,'div_id'=>"product_features_pagination_".((string)$_smarty_tpl->tpl_vars['product_id']->value)), 0);?>


<?php } else { ?>
<p class="no-items"><?php echo $_smarty_tpl->__("no_items");?>
</p>
<?php }?>
</div><?php }} ?>
