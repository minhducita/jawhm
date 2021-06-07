<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 07:43:12
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/final_section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173601499556e0fb60b37c37-12939782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '699f9eb740e09a75e125ade36ddf09c3a8cbdd28' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/final_section.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '173601499556e0fb60b37c37-12939782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'cart' => 0,
    'auth' => 0,
    'recalculate' => 0,
    'show_place_order' => 0,
    'is_payment_step' => 0,
    'settings' => 0,
    'continue_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e0fb60dad631_58286801',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0fb60dad631_58286801')) {function content_56e0fb60dad631_58286801($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('submit_my_order','recalculate_shipping_cost','text_no_shipping_methods','text_min_order_amount_required','submit_my_order','recalculate_shipping_cost','text_no_shipping_methods','text_min_order_amount_required'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
$_smarty_tpl->tpl_vars['show_place_order'] = new Smarty_variable(false, null, 0);?>

<?php if (fn_allow_place_order($_smarty_tpl->tpl_vars['cart']->value,$_smarty_tpl->tpl_vars['auth']->value)) {?>
    <?php $_smarty_tpl->tpl_vars['show_place_order'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['recalculate']->value&&!$_smarty_tpl->tpl_vars['cart']->value['amount_failed']) {?>
    <?php $_smarty_tpl->tpl_vars['show_place_order'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['show_place_order']->value) {?>
    <div class="clearfix">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:final_section_customer_notes")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:final_section_customer_notes"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/customer_notes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:final_section_customer_notes"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>

    <input type="hidden" name="update_steps" value="1" />
    
    <?php if (!$_smarty_tpl->tpl_vars['is_payment_step']->value) {?>
        <div class="clearfix">
            <div class="ty-checkout-buttons cm-checkout-place-order-buttons">
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/place_order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("submit_my_order"),'but_name'=>"dispatch[checkout.place_order]",'but_id'=>"place_order"), 0);?>

            </div>

            <?php if ($_smarty_tpl->tpl_vars['recalculate']->value&&$_smarty_tpl->tpl_vars['cart']->value['shipping_required']) {?>
                <input type="hidden" name="next_step" value="step_two" />
                <div class="ty-checkout-buttons cm-checkout-recalculate-buttons hidden">
                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"ty-btn__secondary cm-checkout-recalculate",'but_name'=>"dispatch[checkout.update_steps]",'but_text'=>__("recalculate_shipping_cost")), 0);?>

                </div>
            <?php }?>
        </div>
    <?php }?>

<?php } else { ?>

    <?php if ($_smarty_tpl->tpl_vars['cart']->value['shipping_failed']) {?>
        <p class="ty-error-text ty-center"><?php echo $_smarty_tpl->__("text_no_shipping_methods");?>
</p>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['cart']->value['amount_failed']) {?>
        <div class="checkout__block">
            <p class="ty-error-text"><?php echo $_smarty_tpl->__("text_min_order_amount_required");?>
&nbsp;<strong><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['settings']->value['General']['min_order_amount']), 0);?>
</strong></p>
        </div>
    <?php }?>

    <div class="ty-checkout-buttons">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/continue_shopping.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_href'=>fn_url($_smarty_tpl->tpl_vars['continue_url']->value),'but_role'=>"action"), 0);?>

    </div>
    
<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/checkout/components/final_section.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/checkout/components/final_section.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
$_smarty_tpl->tpl_vars['show_place_order'] = new Smarty_variable(false, null, 0);?>

<?php if (fn_allow_place_order($_smarty_tpl->tpl_vars['cart']->value,$_smarty_tpl->tpl_vars['auth']->value)) {?>
    <?php $_smarty_tpl->tpl_vars['show_place_order'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['recalculate']->value&&!$_smarty_tpl->tpl_vars['cart']->value['amount_failed']) {?>
    <?php $_smarty_tpl->tpl_vars['show_place_order'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['show_place_order']->value) {?>
    <div class="clearfix">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:final_section_customer_notes")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:final_section_customer_notes"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/customer_notes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:final_section_customer_notes"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>

    <input type="hidden" name="update_steps" value="1" />
    
    <?php if (!$_smarty_tpl->tpl_vars['is_payment_step']->value) {?>
        <div class="clearfix">
            <div class="ty-checkout-buttons cm-checkout-place-order-buttons">
                <?php echo $_smarty_tpl->getSubTemplate ("buttons/place_order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("submit_my_order"),'but_name'=>"dispatch[checkout.place_order]",'but_id'=>"place_order"), 0);?>

            </div>

            <?php if ($_smarty_tpl->tpl_vars['recalculate']->value&&$_smarty_tpl->tpl_vars['cart']->value['shipping_required']) {?>
                <input type="hidden" name="next_step" value="step_two" />
                <div class="ty-checkout-buttons cm-checkout-recalculate-buttons hidden">
                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"ty-btn__secondary cm-checkout-recalculate",'but_name'=>"dispatch[checkout.update_steps]",'but_text'=>__("recalculate_shipping_cost")), 0);?>

                </div>
            <?php }?>
        </div>
    <?php }?>

<?php } else { ?>

    <?php if ($_smarty_tpl->tpl_vars['cart']->value['shipping_failed']) {?>
        <p class="ty-error-text ty-center"><?php echo $_smarty_tpl->__("text_no_shipping_methods");?>
</p>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['cart']->value['amount_failed']) {?>
        <div class="checkout__block">
            <p class="ty-error-text"><?php echo $_smarty_tpl->__("text_min_order_amount_required");?>
&nbsp;<strong><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['settings']->value['General']['min_order_amount']), 0);?>
</strong></p>
        </div>
    <?php }?>

    <div class="ty-checkout-buttons">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/continue_shopping.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_href'=>fn_url($_smarty_tpl->tpl_vars['continue_url']->value),'but_role'=>"action"), 0);?>

    </div>
    
<?php }
}?><?php }} ?>
