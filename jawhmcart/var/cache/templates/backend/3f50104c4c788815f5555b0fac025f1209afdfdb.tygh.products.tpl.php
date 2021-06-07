<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:08
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195539826156e66f105bb230-00933874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f50104c4c788815f5555b0fac025f1209afdfdb' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/products.tpl',
      1 => 1457504475,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '195539826156e66f105bb230-00933874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart_products' => 0,
    'order_company_id' => 0,
    'cart' => 0,
    'key' => 0,
    'cp' => 0,
    'id' => 0,
    'original_price' => 0,
    'primary_currency' => 0,
    'currencies' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f10889228_28013403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f10889228_28013403')) {function content_56e66f10889228_28013403($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_math')) include '/var/www/html/jawhmcart/app/lib/vendor/smarty/smarty/libs/plugins/function.math.php';
?><?php
fn_preload_lang_vars(array('product','price','discount','quantity','expand_collapse_list','expand_collapse_list','expand_collapse_list','expand_collapse_list','free','delete','nocombination','section_is_not_completed','orders_no_items'));
?>
<div class="buttons-container">
    <?php if ($_smarty_tpl->tpl_vars['cart_products']->value) {?>
        <?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[order_management.delete]",'form'=>"om_cart_form",'class'=>"cm-skip-validation",'icon'=>"icon-trash"));?>

    <?php }?>
    <?php echo $_smarty_tpl->getSubTemplate ("pickers/products/picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('company_id'=>$_smarty_tpl->tpl_vars['order_company_id']->value,'display'=>"options_price",'extra_var'=>"order_management.add",'data_id'=>"om",'no_container'=>true), 0);?>

</div>

<table width="100%" class="table table-middle">
<thead>
    <tr>
        <th class="left">
            <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</th>
        <th width="50%"><?php echo $_smarty_tpl->__("product");?>
</th>
        <th width="20%" colspan="2"><?php echo $_smarty_tpl->__("price");?>
</th>
        <?php if ($_smarty_tpl->tpl_vars['cart']->value['use_discount']) {?>
        <th width="10%"><?php echo $_smarty_tpl->__("discount");?>
</th>
        <?php }?>
        <th class="center"><?php echo $_smarty_tpl->__("quantity");?>
</th>
        <th>&nbsp;</th>
    </tr>
</thead>

<?php $_smarty_tpl->_capture_stack[0][] = array("extra_items", null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"order_management:products_extra_items")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"order_management:products_extra_items"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"order_management:products_extra_items"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php  $_smarty_tpl->tpl_vars["cp"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cp"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cart_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["cp"]->key => $_smarty_tpl->tpl_vars["cp"]->value) {
$_smarty_tpl->tpl_vars["cp"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["cp"]->key;
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"order_management:items_list_row")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"order_management:items_list_row"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<tr>
    <td class="left">
        <input type="checkbox" name="cart_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-item" /></td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['cp']->value['product_options']) {?>
            <span id="on_product_options_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" title="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" class="hand cm-combination-options-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"><span class="exicon-expand"></span></span>
            <span id="off_product_options_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" title="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" class="hand hidden cm-combination-options-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"><span class="exicon-collapse"></span> </span>
        <?php }?>
        <a href="<?php echo htmlspecialchars(fn_url("products.update?product_id=".((string)$_smarty_tpl->tpl_vars['cp']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['cp']->value['product'];?>
</a>
        <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object'=>$_smarty_tpl->tpl_vars['cp']->value), 0);?>

    </td>
    <td width="3%">
        <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']) {?>
            <?php echo $_smarty_tpl->__("free");?>

            <?php } else { ?>
            <input type="hidden" name="cart_products[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
][stored_price]" value="N" />
            <input class="inline" type="checkbox" name="cart_products[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
][stored_price]" value="Y" <?php if ($_smarty_tpl->tpl_vars['cp']->value['stored_price']=="Y") {?>checked="checked"<?php }?> onchange="Tygh.$('#db_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
,#manual_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
').toggle();"/>
        <?php }?>
    </td>
    <td class="left">
    <?php if (!$_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']) {?>
        <?php if ($_smarty_tpl->tpl_vars['cp']->value['stored_price']=="Y") {?>
            <?php echo smarty_function_math(array('equation'=>"price - modifier",'price'=>$_smarty_tpl->tpl_vars['cp']->value['original_price'],'modifier'=>(($tmp = @$_smarty_tpl->tpl_vars['cp']->value['modifiers_price'])===null||$tmp==='' ? 0 : $tmp),'assign'=>"original_price"),$_smarty_tpl);?>

        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["original_price"] = new Smarty_variable($_smarty_tpl->tpl_vars['cp']->value['original_price'], null, 0);?>
        <?php }?>
        <span class="<?php if ($_smarty_tpl->tpl_vars['cp']->value['stored_price']=="Y") {?>hidden<?php }?>" id="db_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['original_price']->value), 0);?>
</span>
        <div class="<?php if ($_smarty_tpl->tpl_vars['cp']->value['stored_price']!="Y") {?>hidden<?php }?>" id="manual_price_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['cp']->value['base_price'],'view'=>"input",'input_name'=>"cart_products[".((string)$_smarty_tpl->tpl_vars['key']->value)."][price]",'class'=>"input-hidden input-mini",'product_id'=>$_smarty_tpl->tpl_vars['cp']->value['product_id']), 0);?>

        </div>
    <?php }?>
    </td>
    <?php if ($_smarty_tpl->tpl_vars['cart']->value['use_discount']) {?>
    <td class="no-padding nowrap">
    <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>''), 0);?>

    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['cart']->value['order_id']) {?>
        <input type="hidden" name="cart_products[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
][stored_discount]" value="Y" />
        <input type="text" class="input-hidden input-mini cm-numeric" size="5" name="cart_products[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
][discount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp']->value['discount'], ENT_QUOTES, 'UTF-8');?>
" data-a-sign="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol']);?>
" data-a-dec="," data-a-sep="." />
        <?php } else { ?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['cp']->value['discount']), 0);?>

        <?php }?>
    <?php }?>
    </td>
    <?php }?>
    <td class="center">
        <input type="hidden" name="cart_products[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
][product_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" />
        <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']) {?>
        <input type="hidden" size="3" name="cart_products[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp']->value['amount'], ENT_QUOTES, 'UTF-8');?>
" />
        <?php }?>
        <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
" id="amount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
">
            <input class="input-hidden input-micro" type="text" size="3" name="cart_products[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
][amount]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp']->value['amount'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['cp']->value['exclude_from_calculate']) {?>disabled="disabled"<?php }?> />
        <!--amount_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
    </td>
    <td class="nowrap">
        <div class="hidden-tools">
            <a class="cm-confirm cm-post icon-trash" href="<?php echo htmlspecialchars(fn_url("order_management.delete?cart_ids[]=".((string)$_smarty_tpl->tpl_vars['key']->value)), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("delete");?>
"></a>
        </div>
    </td>
</tr>
<?php if ($_smarty_tpl->tpl_vars['cp']->value['product_options']) {?>
<tr id="product_options_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cp']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-ex-op hidden row-more row-gray">
    <td>&nbsp;</td>
    <td colspan="<?php if ($_smarty_tpl->tpl_vars['cart']->value['use_discount']) {?>6<?php } else { ?>5<?php }?>">
        <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/select_product_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_options'=>$_smarty_tpl->tpl_vars['cp']->value['product_options'],'name'=>"cart_products",'id'=>$_smarty_tpl->tpl_vars['key']->value,'use_exceptions'=>"Y",'product'=>$_smarty_tpl->tpl_vars['cp']->value,'additional_class'=>"option-item"), 0);?>

        <div id="warning_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
" class="pull-left notification-title-e hidden">&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->__("nocombination");?>
</div>
    </td>
</tr>
<?php }?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"order_management:items_list_row"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }
if (!$_smarty_tpl->tpl_vars["cp"]->_loop) {
?>
    <?php if (trim(Smarty::$_smarty_vars['capture']['extra_items'])=='') {?>
        <tr>
            <td colspan="<?php if ($_smarty_tpl->tpl_vars['cart']->value['use_discount']) {?>6<?php } else { ?>5<?php }?>" class="center">
                <p class="muted">
                    <?php echo $_smarty_tpl->__("section_is_not_completed");?>
</br>
                    <?php echo $_smarty_tpl->__("orders_no_items");?>

                </p>
            </td>
        </tr>
    <?php }?>
<?php } ?>

    <?php echo Smarty::$_smarty_vars['capture']['extra_items'];?>

</table><?php }} ?>
