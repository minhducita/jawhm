<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:08
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/totals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92936232756e66f109b48d6-20250031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68435bcc314f56b7141371ff37be742ce25288cb' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/order_management/components/totals.tpl',
      1 => 1457504476,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '92936232756e66f109b48d6-20250031',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'tax' => 0,
    'settings' => 0,
    'key' => 0,
    'group' => 0,
    'group_key' => 0,
    'shipping_key' => 0,
    'shipping' => 0,
    'custom_ship_exists' => 0,
    'primary_currency' => 0,
    'stored_shipping_cost' => 0,
    'result_ids' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f10cb2811_34751198',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f10cb2811_34751198')) {function content_56e66f10cb2811_34751198($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('totals','subtotal','including_discount','order_discount','manually_set_tax_rates','included','coupon','payment_surcharge','total_cost','recalculate_totals'));
?>
<div class="pull-right order-notes statistic">
    <table>
        <tr>
            <td>&nbsp;</td>
            <td class="right totals"><h4><?php echo $_smarty_tpl->__("totals");?>
</h4></td>
        </tr>
        <tr>
            <td class="right" width="150px"><?php echo $_smarty_tpl->__("subtotal");?>
:</td>
            <td class="right" width="100px"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['cart']->value['display_subtotal']), 0);?>
</td>
        </tr>

        <?php if ((floatval($_smarty_tpl->tpl_vars['cart']->value['discount']))) {?>
            <tr>
                <td class="right"><?php echo $_smarty_tpl->__("including_discount");?>
:</td>
                <td class="right"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['cart']->value['discount']), 0);?>
</td>
            </tr>
        <?php }?>

        <tr class="toggle-elm">
            <td class="right">
            <label><?php echo $_smarty_tpl->__("order_discount");?>

                <input type="hidden" name="stored_subtotal_discount" value="N" />
                <input type="checkbox" class="valign cm-combinations" name="stored_subtotal_discount" value="Y" <?php if ($_smarty_tpl->tpl_vars['cart']->value['stored_subtotal_discount']=="Y"&&$_smarty_tpl->tpl_vars['cart']->value['order_id']) {?>checked="checked"<?php }?> <?php if (!$_smarty_tpl->tpl_vars['cart']->value['order_id']) {?>disabled="disabled"<?php }?> id="sw_manual_subtotal_discount" /></label>
            </td>
            <td class="right">
            <span <?php if ($_smarty_tpl->tpl_vars['cart']->value['stored_subtotal_discount']=="Y") {?>style="display: none;"<?php }?> data-ca-switch-id="manual_subtotal_discount">
            <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>(($tmp = @$_smarty_tpl->tpl_vars['cart']->value['subtotal_discount'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['cart']->value['original_subtotal_discount'] : $tmp)), 0);?>
</span>
                <span <?php if ($_smarty_tpl->tpl_vars['cart']->value['stored_subtotal_discount']!="Y") {?>style="display: none;"<?php }?> data-ca-switch-id="manual_subtotal_discount">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>(($tmp = @$_smarty_tpl->tpl_vars['cart']->value['subtotal_discount'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['cart']->value['original_subtotal_discount'] : $tmp),'view'=>"input",'input_name'=>"subtotal_discount",'input_val'=>$_smarty_tpl->tpl_vars['cart']->value['subtotal_discount'],'class'=>"input-small"), 0);?>

                </span>
            </td>
        </tr>

        <tr>
            <td class="right">
                <label><?php echo $_smarty_tpl->__("manually_set_tax_rates");?>

                <input type="hidden" name="stored_taxes" value="N" />
                <input type="checkbox" class="cm-combinations" name="stored_taxes" value="Y" <?php if ($_smarty_tpl->tpl_vars['cart']->value['stored_taxes']=="Y") {?>checked="checked"<?php }?> id="sw_manual_taxes" <?php if (!$_smarty_tpl->tpl_vars['cart']->value['order_id']) {?>disabled="disabled"<?php }?> /></label>
            </td>
            <td class="right">&nbsp;</td>
        </tr>

        <?php  $_smarty_tpl->tpl_vars["tax"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["tax"]->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["tax"]->key => $_smarty_tpl->tpl_vars["tax"]->value) {
$_smarty_tpl->tpl_vars["tax"]->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars["tax"]->key;
?>
        <tr class="toggle-elm nowrap">
            <td class="right">&nbsp;<span>&middot;</span>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax']->value['description'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['tax']->value['price_includes_tax']=="Y"&&$_smarty_tpl->tpl_vars['settings']->value['Appearance']['cart_prices_w_taxes']!="Y") {?>&nbsp;<?php echo $_smarty_tpl->__("included");
}?>(<span <?php if ($_smarty_tpl->tpl_vars['cart']->value['stored_taxes']=="Y") {?>class="hidden"<?php }?> data-ca-switch-id="manual_taxes"><?php echo $_smarty_tpl->getSubTemplate ("common/modifier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('mod_value'=>$_smarty_tpl->tpl_vars['tax']->value['rate_value'],'mod_type'=>$_smarty_tpl->tpl_vars['tax']->value['rate_type']), 0);?>
</span><span <?php if ($_smarty_tpl->tpl_vars['cart']->value['stored_taxes']!="Y") {?>class="hidden"<?php }?> data-ca-switch-id="manual_taxes"><input type="text" class="cm-numeric input-small" size="5" name="taxes[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
]" data-a-sign="% " data-m-dec="3" data-a-pad="false" data-p-sign="s" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax']->value['rate_value'], ENT_QUOTES, 'UTF-8');?>
" /></span>)
            </td>
            <td class="right"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['tax']->value['tax_subtotal']), 0);?>
</td>
        </tr>
        <?php } ?>

        <?php if (!empty($_smarty_tpl->tpl_vars['cart']->value['product_groups'])) {?>
            <?php  $_smarty_tpl->tpl_vars["group"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["group"]->_loop = false;
 $_smarty_tpl->tpl_vars['group_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['product_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["group"]->key => $_smarty_tpl->tpl_vars["group"]->value) {
$_smarty_tpl->tpl_vars["group"]->_loop = true;
 $_smarty_tpl->tpl_vars['group_key']->value = $_smarty_tpl->tpl_vars["group"]->key;
?>
                <?php if (!empty($_smarty_tpl->tpl_vars['group']->value['chosen_shippings'])) {?>
                    <?php  $_smarty_tpl->tpl_vars["shipping"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["shipping"]->_loop = false;
 $_smarty_tpl->tpl_vars['shipping_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['chosen_shippings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["shipping"]->key => $_smarty_tpl->tpl_vars["shipping"]->value) {
$_smarty_tpl->tpl_vars["shipping"]->_loop = true;
 $_smarty_tpl->tpl_vars['shipping_key']->value = $_smarty_tpl->tpl_vars["shipping"]->key;
?>
                        <?php if (isset($_smarty_tpl->tpl_vars['cart']->value['stored_shipping'][$_smarty_tpl->tpl_vars['group_key']->value][$_smarty_tpl->tpl_vars['shipping_key']->value])) {?>
                            <?php $_smarty_tpl->tpl_vars['custom_ship_exists'] = new Smarty_variable(true, null, 0);?>
                        <?php } else { ?>
                            <?php $_smarty_tpl->tpl_vars['custom_ship_exists'] = new Smarty_variable(false, null, 0);?>
                        <?php }?>
                        <tr>
                            <td class="right nowrap">
                                <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['shipping'], ENT_QUOTES, 'UTF-8');?>

                                <input type="hidden" name="stored_shipping[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_key']->value, ENT_QUOTES, 'UTF-8');?>
][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_key']->value, ENT_QUOTES, 'UTF-8');?>
]" value="N" />
                                <input type="checkbox" class="valign cm-combinations" name="stored_shipping[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_key']->value, ENT_QUOTES, 'UTF-8');?>
][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_key']->value, ENT_QUOTES, 'UTF-8');?>
]" value="Y" <?php if ($_smarty_tpl->tpl_vars['custom_ship_exists']->value) {?>checked="checked"<?php }?> id="sw_manual_shipping_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_key']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_key']->value, ENT_QUOTES, 'UTF-8');?>
" /></label>
                            </td>
                            <td class="right">
                                <span <?php if ($_smarty_tpl->tpl_vars['custom_ship_exists']->value) {?>style="display: none;"<?php }?> data-ca-switch-id="manual_shipping_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_key']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_key']->value, ENT_QUOTES, 'UTF-8');?>
">
                                    <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>(($tmp = @$_smarty_tpl->tpl_vars['shipping']->value['rate'])===null||$tmp==='' ? 0 : $tmp)), 0);?>

                                </span>
                                <span <?php if (!$_smarty_tpl->tpl_vars['custom_ship_exists']->value) {?>style="display: none;"<?php }?> data-ca-switch-id="manual_shipping_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_key']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_key']->value, ENT_QUOTES, 'UTF-8');?>
">
                                     <?php if (isset($_smarty_tpl->tpl_vars['cart']->value['stored_shipping'][$_smarty_tpl->tpl_vars['group_key']->value][$_smarty_tpl->tpl_vars['shipping_key']->value])) {?>
                                         <?php $_smarty_tpl->tpl_vars['stored_shipping_cost'] = new Smarty_variable(fn_format_price($_smarty_tpl->tpl_vars['cart']->value['stored_shipping'][$_smarty_tpl->tpl_vars['group_key']->value][$_smarty_tpl->tpl_vars['shipping_key']->value],$_smarty_tpl->tpl_vars['primary_currency']->value,null,false), null, 0);?>
                                     <?php } else { ?>
                                         <?php $_smarty_tpl->tpl_vars['stored_shipping_cost'] = new Smarty_variable(fn_format_price($_smarty_tpl->tpl_vars['shipping']->value['rate'],$_smarty_tpl->tpl_vars['primary_currency']->value,null,false), null, 0);?>
                                     <?php }?>
                                     <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['stored_shipping_cost']->value,'view'=>"input",'input_name'=>"stored_shipping_cost[".((string)$_smarty_tpl->tpl_vars['group_key']->value)."][".((string)$_smarty_tpl->tpl_vars['shipping_key']->value)."]",'class'=>"input-small"), 0);?>

                                </span>
                            </td>
                        </tr>
                    <?php } ?>
                <?php }?>
            <?php } ?>
        <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['cart']->value['coupons']) {?>
        <input type="hidden" name="c_id" value="0" id="c_id" />
        <tr>
            <td class="right muted strong"><?php echo $_smarty_tpl->__("coupon");?>
:</td>
            <td>&nbsp;</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars["coupon"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["coupon"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['coupons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["coupon"]->key => $_smarty_tpl->tpl_vars["coupon"]->value) {
$_smarty_tpl->tpl_vars["coupon"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["coupon"]->key;
?>
            <tr>
                <td class="right"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
&nbsp;
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_href'=>"order_management.delete_coupon?c_id=".((string)$_smarty_tpl->tpl_vars['key']->value),'but_icon'=>"icon-trash",'but_role'=>"delete_item",'but_meta'=>"cm-ajax cm-post",'but_target_id'=>$_smarty_tpl->tpl_vars['result_ids']->value), 0);?>
</td>
                <td class="right">&nbsp;</td>
            </tr>
        <?php } ?>
    <?php }?>

    <tr id="payment_surcharge_line">
        <td class="right"><?php echo $_smarty_tpl->__("payment_surcharge");?>
</td>
        <td class="right"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['cart']->value['payment_surcharge'],'span_id'=>"payment_surcharge_value",'class'=>"list_price"), 0);?>
</td>
    </tr>

    
    <?php $_smarty_tpl->createLocalArrayVariable('cart', null, 0);
$_smarty_tpl->tpl_vars['cart']->value['total'] = $_smarty_tpl->tpl_vars['cart']->value['total']+$_smarty_tpl->tpl_vars['cart']->value['payment_surcharge'];?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"order_management:totals")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"order_management:totals"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"order_management:totals"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


        <tr class="total nowrap cm-om-totals-price">
            <td class="right"><h4><?php echo $_smarty_tpl->__("total_cost");?>
</h4></td>
            <td class="right price">
                <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['cart']->value['total'],'span_id'=>"cart_total"), 0);?>

            </td>
        </tr>

        <tr class="hidden cm-om-totals-recalculate">
            <td colspan="2">
                <button class="btn cm-ajax" type="submit" name="dispatch[order_management.update_totals]" value="Recalculate" data-ca-check-filter="#om_ajax_update_totals"><i class="icon-refresh"></i> <?php echo $_smarty_tpl->__("recalculate_totals");?>
</button>
            </td>
        </tr>

    </table>
</div>
<?php }} ?>
