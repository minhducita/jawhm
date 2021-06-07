<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 07:43:12
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/payments/payment_methods.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206070255256e0fb60ef6c42-84064966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e0fb8b77da337c7a2c7360c8d3cc5e383aa311e' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/payments/payment_methods.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '206070255256e0fb60ef6c42-84064966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'order_id' => 0,
    'payment_methods' => 0,
    'tab_id' => 0,
    'active_tab' => 0,
    'payment_id' => 0,
    'payments' => 0,
    'result_ids' => 0,
    'url' => 0,
    'first_payment' => 0,
    'tab_name' => 0,
    'active' => 0,
    'payment' => 0,
    'final_section' => 0,
    'payment_method' => 0,
    'checkout_buttons' => 0,
    'auth' => 0,
    'iframe_mode' => 0,
    'cart_agreements' => 0,
    'settings' => 0,
    'show_checkout_button' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e0fb6157b624_95420096',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0fb6157b624_95420096')) {function content_56e0fb6157b624_95420096($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('repay_order','skip_payment','checkout_terms_n_conditions_alert','submit_my_order','repay_order','skip_payment','checkout_terms_n_conditions_alert','submit_my_order'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo smarty_function_script(array('src'=>"js/tygh/tabs.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:payment_method_check")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:payment_method_check"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php if ($_smarty_tpl->tpl_vars['order_id']->value) {?>
        <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable("orders.details?order_id=".((string)$_smarty_tpl->tpl_vars['order_id']->value), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['result_ids'] = new Smarty_variable("elm_payments_list", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable("checkout.checkout", null, 0);?>
        <?php $_smarty_tpl->tpl_vars['result_ids'] = new Smarty_variable("checkout*,step_four", null, 0);?>
    <?php }?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:payment_method_check"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php if (count($_smarty_tpl->tpl_vars['payment_methods']->value)>1) {?>
<div class="ty-tabs cm-j-tabs cm-track cm-j-tabs-disable-convertation clearfix">
    <ul class="ty-tabs__list" id="payment_tabs">
        <?php  $_smarty_tpl->tpl_vars["payments"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["payments"]->_loop = false;
 $_smarty_tpl->tpl_vars["tab_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["payments"]->key => $_smarty_tpl->tpl_vars["payments"]->value) {
$_smarty_tpl->tpl_vars["payments"]->_loop = true;
 $_smarty_tpl->tpl_vars["tab_id"]->value = $_smarty_tpl->tpl_vars["payments"]->key;
?>
            <?php $_smarty_tpl->tpl_vars["tab_name"] = new Smarty_variable("payments_".((string)$_smarty_tpl->tpl_vars['tab_id']->value), null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['tab_id']->value==$_smarty_tpl->tpl_vars['active_tab']->value||(!$_smarty_tpl->tpl_vars['active_tab']->value&&$_smarty_tpl->tpl_vars['payments']->value[$_smarty_tpl->tpl_vars['payment_id']->value])) {?>
                <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable($_smarty_tpl->tpl_vars['tab_id']->value, null, 0);?>
            <?php }?>
            <?php $_smarty_tpl->tpl_vars['first_payment'] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['payments']->value), null, 0);?>

            <li id="payments_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-tabs__item<?php if ($_smarty_tpl->tpl_vars['tab_id']->value==$_smarty_tpl->tpl_vars['active_tab']->value||(!$_smarty_tpl->tpl_vars['active_tab']->value&&$_smarty_tpl->tpl_vars['payments']->value[$_smarty_tpl->tpl_vars['payment_id']->value])) {?> active<?php }?>">
                <a class="ty-tabs__a cm-ajax cm-ajax-full-render" data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['url']->value)."?active_tab=".((string)$_smarty_tpl->tpl_vars['tab_id']->value)."&payment_id=".((string)$_smarty_tpl->tpl_vars['first_payment']->value['payment_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['tab_name']->value);?>
</a>
            </li>
        <?php } ?>
    </ul>
</div>
<?php }?>

<div class="cm-tabs-content tabs-content clearfix">
    <?php  $_smarty_tpl->tpl_vars["payments"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["payments"]->_loop = false;
 $_smarty_tpl->tpl_vars["tab_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["payments"]->key => $_smarty_tpl->tpl_vars["payments"]->value) {
$_smarty_tpl->tpl_vars["payments"]->_loop = true;
 $_smarty_tpl->tpl_vars["tab_id"]->value = $_smarty_tpl->tpl_vars["payments"]->key;
?>
        <div class="<?php if ($_smarty_tpl->tpl_vars['active']->value!=$_smarty_tpl->tpl_vars['tab_id']->value&&count($_smarty_tpl->tpl_vars['payment_methods']->value)>1) {?>hidden<?php }?>" id="content_payments_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <form name="payments_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
" action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" class="payments-form">
            <input type="hidden" name="payment_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_id']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="result_ids" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="dispatch" value="checkout.place_order" />

            <?php if ($_smarty_tpl->tpl_vars['order_id']->value) {?>
                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_id']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php } else { ?>
                <div class="ty-checkout__billing-options <?php if (count($_smarty_tpl->tpl_vars['payment_methods']->value)==1) {?>ty-notab<?php }?>">
            <?php }?>

                <?php if (count($_smarty_tpl->tpl_vars['payments']->value)==1) {?>
                    <?php $_smarty_tpl->tpl_vars["payment"] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['payments']->value), null, 0);?>
                    <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment'], ENT_QUOTES, 'UTF-8');?>
</h2>
                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['template']) {?>
                        <?php $_smarty_tpl->_capture_stack[0][] = array("payment_template", null, null); ob_start(); ?>
                            <?php if ($_smarty_tpl->tpl_vars['payment']->value['image']) {?>
                                <div class="clearfix">
                                    <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('obj_id'=>$_smarty_tpl->tpl_vars['payment']->value['payment_id'],'images'=>$_smarty_tpl->tpl_vars['payment']->value['image'],'class'=>"ty-payments-list__image"), 0);?>

                                </div>
                            <?php }?>
                            
                            <?php if ($_smarty_tpl->tpl_vars['payment']->value['description']) {?>
                                <div class="ty-payments-list__description">
                                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['description'], ENT_QUOTES, 'UTF-8');?>

                                </div>
                            <?php }?>

                            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['payment']->value['template'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('card_id'=>$_smarty_tpl->tpl_vars['payment']->value['payment_id']), 0);?>

                        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['template']&&trim(Smarty::$_smarty_vars['capture']['payment_template'])!='') {?>
                        <div class="clearfix">
                            <div class="ty-payments-list__instruction"><?php echo $_smarty_tpl->tpl_vars['payment']->value['instructions'];?>
</div>
                            <?php echo Smarty::$_smarty_vars['capture']['payment_template'];?>

                        </div>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/payments/payments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('payments'=>array($_smarty_tpl->tpl_vars['payment']->value)), 0);?>

                    <?php }?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/payments/payments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['final_section']->value) {?>
                    <?php echo $_smarty_tpl->tpl_vars['final_section']->value;?>

                <?php }?>
                
                <?php if ($_smarty_tpl->tpl_vars['order_id']->value) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/customer_notes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


                    <div class="ty-checkout-buttons">
                        <?php if ($_smarty_tpl->tpl_vars['payment_method']->value['params']['button']) {?>
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_method']->value['params']['button'], ENT_QUOTES, 'UTF-8');?>

                        <?php } else { ?>
                            <div class="ty-repay-button">
                                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/place_order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("repay_order"),'but_name'=>"dispatch[orders.repay]",'but_role'=>"big"), 0);?>

                            </div>
                        <?php }?>
                    </div>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/terms_and_conditions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('suffix'=>$_smarty_tpl->tpl_vars['tab_id']->value), 0);?>


                    <?php $_smarty_tpl->tpl_vars["show_checkout_button"] = new Smarty_variable(false, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars["payment"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["payment"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["payment"]->key => $_smarty_tpl->tpl_vars["payment"]->value) {
$_smarty_tpl->tpl_vars["payment"]->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['payment_id']->value==$_smarty_tpl->tpl_vars['payment']->value['payment_id']&&$_smarty_tpl->tpl_vars['checkout_buttons']->value[$_smarty_tpl->tpl_vars['payment_id']->value]) {?>
                            <?php $_smarty_tpl->tpl_vars["show_checkout_button"] = new Smarty_variable(true, null, 0);?>
                        <?php }?>
                    <?php } ?>

                    <?php if ($_smarty_tpl->tpl_vars['auth']->value['act_as_user']) {?>
                        <div class="ty-control-group">
                            <label>
                                <input type="checkbox" id="skip_payment" name="skip_payment" value="Y" class="checkbox" />
                                <?php echo $_smarty_tpl->__("skip_payment");?>

                            </label>
                        </div>
                    <?php }?>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:extra_payment_info")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:extra_payment_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:extra_payment_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['iframe_mode']->value) {?>
                        <div class="ty-payment-method-iframe__box">
                            <iframe width="100%" height="700" id="order_iframe_<?php echo htmlspecialchars(@constant('TIME'), ENT_QUOTES, 'UTF-8');?>
" src="<?php echo htmlspecialchars(fn_checkout_url("checkout.process_payment",@constant('AREA')), ENT_QUOTES, 'UTF-8');?>
" style="border: 0px" frameBorder="0" ></iframe>
                            <?php if ($_smarty_tpl->tpl_vars['cart_agreements']->value||$_smarty_tpl->tpl_vars['settings']->value['Checkout']['agree_terms_conditions']=="Y") {?>
                            <div id="payment_method_iframe<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-payment-method-iframe">
                                <div class="ty-payment-method-iframe__label">
                                    <div class="ty-payment-method-iframe__text"><?php echo $_smarty_tpl->__("checkout_terms_n_conditions_alert");?>
</div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    <?php } else { ?>
                        <div class="ty-checkout-buttons ty-checkout-buttons__submit-order">
                            <?php if (!$_smarty_tpl->tpl_vars['show_checkout_button']->value) {?>
                                <?php echo $_smarty_tpl->getSubTemplate ("buttons/place_order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("submit_my_order"),'but_name'=>"dispatch[checkout.place_order]",'but_role'=>"big",'but_id'=>"place_order_".((string)$_smarty_tpl->tpl_vars['tab_id']->value)), 0);?>

                            <?php } else { ?>
                                <?php echo $_smarty_tpl->tpl_vars['checkout_buttons']->value[$_smarty_tpl->tpl_vars['payment_id']->value];?>

                            <?php }?>
                        </div>
                    <?php }?>
                <?php }?>

                <div class="processor-buttons hidden"></div>
            </form>
        <!--content_payments_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php } ?>
</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/checkout/components/payments/payment_methods.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/checkout/components/payments/payment_methods.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo smarty_function_script(array('src'=>"js/tygh/tabs.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:payment_method_check")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:payment_method_check"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php if ($_smarty_tpl->tpl_vars['order_id']->value) {?>
        <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable("orders.details?order_id=".((string)$_smarty_tpl->tpl_vars['order_id']->value), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['result_ids'] = new Smarty_variable("elm_payments_list", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable("checkout.checkout", null, 0);?>
        <?php $_smarty_tpl->tpl_vars['result_ids'] = new Smarty_variable("checkout*,step_four", null, 0);?>
    <?php }?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:payment_method_check"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php if (count($_smarty_tpl->tpl_vars['payment_methods']->value)>1) {?>
<div class="ty-tabs cm-j-tabs cm-track cm-j-tabs-disable-convertation clearfix">
    <ul class="ty-tabs__list" id="payment_tabs">
        <?php  $_smarty_tpl->tpl_vars["payments"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["payments"]->_loop = false;
 $_smarty_tpl->tpl_vars["tab_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["payments"]->key => $_smarty_tpl->tpl_vars["payments"]->value) {
$_smarty_tpl->tpl_vars["payments"]->_loop = true;
 $_smarty_tpl->tpl_vars["tab_id"]->value = $_smarty_tpl->tpl_vars["payments"]->key;
?>
            <?php $_smarty_tpl->tpl_vars["tab_name"] = new Smarty_variable("payments_".((string)$_smarty_tpl->tpl_vars['tab_id']->value), null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['tab_id']->value==$_smarty_tpl->tpl_vars['active_tab']->value||(!$_smarty_tpl->tpl_vars['active_tab']->value&&$_smarty_tpl->tpl_vars['payments']->value[$_smarty_tpl->tpl_vars['payment_id']->value])) {?>
                <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable($_smarty_tpl->tpl_vars['tab_id']->value, null, 0);?>
            <?php }?>
            <?php $_smarty_tpl->tpl_vars['first_payment'] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['payments']->value), null, 0);?>

            <li id="payments_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-tabs__item<?php if ($_smarty_tpl->tpl_vars['tab_id']->value==$_smarty_tpl->tpl_vars['active_tab']->value||(!$_smarty_tpl->tpl_vars['active_tab']->value&&$_smarty_tpl->tpl_vars['payments']->value[$_smarty_tpl->tpl_vars['payment_id']->value])) {?> active<?php }?>">
                <a class="ty-tabs__a cm-ajax cm-ajax-full-render" data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['url']->value)."?active_tab=".((string)$_smarty_tpl->tpl_vars['tab_id']->value)."&payment_id=".((string)$_smarty_tpl->tpl_vars['first_payment']->value['payment_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['tab_name']->value);?>
</a>
            </li>
        <?php } ?>
    </ul>
</div>
<?php }?>

<div class="cm-tabs-content tabs-content clearfix">
    <?php  $_smarty_tpl->tpl_vars["payments"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["payments"]->_loop = false;
 $_smarty_tpl->tpl_vars["tab_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["payments"]->key => $_smarty_tpl->tpl_vars["payments"]->value) {
$_smarty_tpl->tpl_vars["payments"]->_loop = true;
 $_smarty_tpl->tpl_vars["tab_id"]->value = $_smarty_tpl->tpl_vars["payments"]->key;
?>
        <div class="<?php if ($_smarty_tpl->tpl_vars['active']->value!=$_smarty_tpl->tpl_vars['tab_id']->value&&count($_smarty_tpl->tpl_vars['payment_methods']->value)>1) {?>hidden<?php }?>" id="content_payments_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <form name="payments_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
" action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" class="payments-form">
            <input type="hidden" name="payment_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_id']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="result_ids" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="dispatch" value="checkout.place_order" />

            <?php if ($_smarty_tpl->tpl_vars['order_id']->value) {?>
                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_id']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php } else { ?>
                <div class="ty-checkout__billing-options <?php if (count($_smarty_tpl->tpl_vars['payment_methods']->value)==1) {?>ty-notab<?php }?>">
            <?php }?>

                <?php if (count($_smarty_tpl->tpl_vars['payments']->value)==1) {?>
                    <?php $_smarty_tpl->tpl_vars["payment"] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['payments']->value), null, 0);?>
                    <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['payment'], ENT_QUOTES, 'UTF-8');?>
</h2>
                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['template']) {?>
                        <?php $_smarty_tpl->_capture_stack[0][] = array("payment_template", null, null); ob_start(); ?>
                            <?php if ($_smarty_tpl->tpl_vars['payment']->value['image']) {?>
                                <div class="clearfix">
                                    <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('obj_id'=>$_smarty_tpl->tpl_vars['payment']->value['payment_id'],'images'=>$_smarty_tpl->tpl_vars['payment']->value['image'],'class'=>"ty-payments-list__image"), 0);?>

                                </div>
                            <?php }?>
                            
                            <?php if ($_smarty_tpl->tpl_vars['payment']->value['description']) {?>
                                <div class="ty-payments-list__description">
                                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['description'], ENT_QUOTES, 'UTF-8');?>

                                </div>
                            <?php }?>

                            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['payment']->value['template'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('card_id'=>$_smarty_tpl->tpl_vars['payment']->value['payment_id']), 0);?>

                        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['template']&&trim(Smarty::$_smarty_vars['capture']['payment_template'])!='') {?>
                        <div class="clearfix">
                            <div class="ty-payments-list__instruction"><?php echo $_smarty_tpl->tpl_vars['payment']->value['instructions'];?>
</div>
                            <?php echo Smarty::$_smarty_vars['capture']['payment_template'];?>

                        </div>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/payments/payments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('payments'=>array($_smarty_tpl->tpl_vars['payment']->value)), 0);?>

                    <?php }?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/payments/payments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['final_section']->value) {?>
                    <?php echo $_smarty_tpl->tpl_vars['final_section']->value;?>

                <?php }?>
                
                <?php if ($_smarty_tpl->tpl_vars['order_id']->value) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/customer_notes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


                    <div class="ty-checkout-buttons">
                        <?php if ($_smarty_tpl->tpl_vars['payment_method']->value['params']['button']) {?>
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_method']->value['params']['button'], ENT_QUOTES, 'UTF-8');?>

                        <?php } else { ?>
                            <div class="ty-repay-button">
                                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/place_order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("repay_order"),'but_name'=>"dispatch[orders.repay]",'but_role'=>"big"), 0);?>

                            </div>
                        <?php }?>
                    </div>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("views/checkout/components/terms_and_conditions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('suffix'=>$_smarty_tpl->tpl_vars['tab_id']->value), 0);?>


                    <?php $_smarty_tpl->tpl_vars["show_checkout_button"] = new Smarty_variable(false, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars["payment"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["payment"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["payment"]->key => $_smarty_tpl->tpl_vars["payment"]->value) {
$_smarty_tpl->tpl_vars["payment"]->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['payment_id']->value==$_smarty_tpl->tpl_vars['payment']->value['payment_id']&&$_smarty_tpl->tpl_vars['checkout_buttons']->value[$_smarty_tpl->tpl_vars['payment_id']->value]) {?>
                            <?php $_smarty_tpl->tpl_vars["show_checkout_button"] = new Smarty_variable(true, null, 0);?>
                        <?php }?>
                    <?php } ?>

                    <?php if ($_smarty_tpl->tpl_vars['auth']->value['act_as_user']) {?>
                        <div class="ty-control-group">
                            <label>
                                <input type="checkbox" id="skip_payment" name="skip_payment" value="Y" class="checkbox" />
                                <?php echo $_smarty_tpl->__("skip_payment");?>

                            </label>
                        </div>
                    <?php }?>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:extra_payment_info")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:extra_payment_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:extra_payment_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['iframe_mode']->value) {?>
                        <div class="ty-payment-method-iframe__box">
                            <iframe width="100%" height="700" id="order_iframe_<?php echo htmlspecialchars(@constant('TIME'), ENT_QUOTES, 'UTF-8');?>
" src="<?php echo htmlspecialchars(fn_checkout_url("checkout.process_payment",@constant('AREA')), ENT_QUOTES, 'UTF-8');?>
" style="border: 0px" frameBorder="0" ></iframe>
                            <?php if ($_smarty_tpl->tpl_vars['cart_agreements']->value||$_smarty_tpl->tpl_vars['settings']->value['Checkout']['agree_terms_conditions']=="Y") {?>
                            <div id="payment_method_iframe<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-payment-method-iframe">
                                <div class="ty-payment-method-iframe__label">
                                    <div class="ty-payment-method-iframe__text"><?php echo $_smarty_tpl->__("checkout_terms_n_conditions_alert");?>
</div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    <?php } else { ?>
                        <div class="ty-checkout-buttons ty-checkout-buttons__submit-order">
                            <?php if (!$_smarty_tpl->tpl_vars['show_checkout_button']->value) {?>
                                <?php echo $_smarty_tpl->getSubTemplate ("buttons/place_order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("submit_my_order"),'but_name'=>"dispatch[checkout.place_order]",'but_role'=>"big",'but_id'=>"place_order_".((string)$_smarty_tpl->tpl_vars['tab_id']->value)), 0);?>

                            <?php } else { ?>
                                <?php echo $_smarty_tpl->tpl_vars['checkout_buttons']->value[$_smarty_tpl->tpl_vars['payment_id']->value];?>

                            <?php }?>
                        </div>
                    <?php }?>
                <?php }?>

                <div class="processor-buttons hidden"></div>
            </form>
        <!--content_payments_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tab_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
    <?php } ?>
</div>
<?php }?><?php }} ?>
