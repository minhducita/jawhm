<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:58:07
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/order_management/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96250531056e66f0f44d4a2-85643499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b1f64c676114402a42c0c03eb052eef082f03c5' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/order_management/update.tpl',
      1 => 1457504391,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '96250531056e66f0f44d4a2-85643499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'ORDER_MANAGEMENT' => 0,
    'result_ids' => 0,
    'cart' => 0,
    'is_edit' => 0,
    'is_empty_cart' => 0,
    '_but_text' => 0,
    'but_text_' => 0,
    'status_settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66f0f7c5132_04955723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66f0f7c5132_04955723')) {function content_56e66f0f7c5132_04955723($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('products_required','customer_notes','staff_only_notes','notify_customer','notify_orders_department','notify_vendor','create','create_process_payment','create_new_order','save','save_process_payment','editing_order','cancel','add_new_order','editing_order','total','invoice','credit_memo','by'));
?>
<?php $_smarty_tpl->tpl_vars["result_ids"] = new Smarty_variable("om_ajax_*", null, 0);?>
<?php echo smarty_function_script(array('src'=>"js/tygh/order_management.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/tygh/exceptions.js"),$_smarty_tpl);?>


<div class="hidden">
    <?php $_smarty_tpl->tpl_vars['users_shared_force'] = new Smarty_variable(false, null, 0);?>
    <?php if (fn_allowed_for("ULTIMATE")) {?>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['Stores']['share_users']=="Y") {?>
            <?php $_smarty_tpl->tpl_vars['users_shared_force'] = new Smarty_variable(true, null, 0);?>
        <?php }?>
    <?php }?>
    <?php echo $_smarty_tpl->getSubTemplate ("views/order_management/components/customer_info_update.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" class="form-table" name="om_cart_form" enctype="multipart/form-data">
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ORDER_MANAGEMENT']->value, ENT_QUOTES, 'UTF-8');?>

<input type="hidden" name="result_ids" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php $_smarty_tpl->_capture_stack[0][] = array("sidebar", null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['cart']->value['order_id']||$_smarty_tpl->tpl_vars['cart']->value['user_data']) {?>
        <?php $_smarty_tpl->tpl_vars["is_edit"] = new Smarty_variable(true, null, 0);?>
    <?php }?>
    <div id="om_ajax_customer_info">
        
        
        
        <?php echo $_smarty_tpl->getSubTemplate ("views/order_management/components/profiles_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('user_data'=>$_smarty_tpl->tpl_vars['cart']->value['user_data'],'location'=>"O",'is_edit'=>$_smarty_tpl->tpl_vars['is_edit']->value), 0);?>

    <!--om_ajax_customer_info--></div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<div class="row-fluid orders-wrap">
    <div class="span8">
        <div  class="cm-om-totals" id="om_ajax_update_totals">
        <?php if ($_smarty_tpl->tpl_vars['is_empty_cart']->value) {?>
        <label class="hidden cm-required" for="products_required"><?php echo $_smarty_tpl->__("products_required");?>
</label>
        <input type="hidden" id="products_required" name="products_required" value="" />
        <?php }?>

        
        <?php echo $_smarty_tpl->getSubTemplate ("views/order_management/components/products.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <hr>
        <div class="row-fluid">
            <div class="span6">
            
            <?php echo $_smarty_tpl->getSubTemplate ("views/order_management/components/discounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"order_management:totals_extra")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"order_management:totals_extra"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"order_management:totals_extra"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </div>

            <div class="span6">
            
            <?php echo $_smarty_tpl->getSubTemplate ("views/order_management/components/totals.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>
        <!--om_ajax_update_totals--></div>

        <div class="note clearfix">
            <div class="span6">
                <label for="customer_notes"><?php echo $_smarty_tpl->__("customer_notes");?>
</label>
                <textarea class="span12" name="customer_notes" id="customer_notes" cols="40" rows="5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['notes'], ENT_QUOTES, 'UTF-8');?>
</textarea>
            </div>
            <div class="span6">
                <label for="order_details"><?php echo $_smarty_tpl->__("staff_only_notes");?>
</label>
                <textarea class="span12" name="update_order[details]" id="order_details" cols="40" rows="5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['details'], ENT_QUOTES, 'UTF-8');?>
</textarea>
            </div>
        </div>

        <div class="clearfix">
            <div class="control-group">
                <label for="notify_user" class="checkbox"><?php echo $_smarty_tpl->__("notify_customer");?>

                <input type="checkbox" class="" name="notify_user" id="notify_user" value="Y" /></label>
            </div>
            <div class="control-group">
                <label for="notify_department" class="checkbox"><?php echo $_smarty_tpl->__("notify_orders_department");?>

                <input type="checkbox" class="" name="notify_department" id="notify_department" value="Y" /></label>
            </div>
            <?php if (fn_allowed_for("MULTIVENDOR")) {?>
            <div class="control-group">
                <label for="notify_vendor" class="checkbox"><?php echo $_smarty_tpl->__("notify_vendor");?>

                <input type="checkbox" class="" name="notify_vendor" id="notify_vendor" value="Y" /></label>
            </div>
            <?php }?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"order_management:notify_checkboxes")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"order_management:notify_checkboxes"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"order_management:notify_checkboxes"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </div>
    </div>

    <div class="span4">
        <div class="well orders-right-pane form-horizontal">
            
            <div class="statuses">
                <?php echo $_smarty_tpl->getSubTemplate ("views/order_management/components/status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>

            
            <div class="payments" id="om_ajax_update_payment">
                <?php echo $_smarty_tpl->getSubTemplate ("views/order_management/components/payment_method.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <!--om_ajax_update_payment--></div>

            
            <div class="shippings" id="om_ajax_update_shipping">
                <?php echo $_smarty_tpl->getSubTemplate ("views/order_management/components/shipping_method.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <!--om_ajax_update_shipping--></div>
        </div>
    </div>
</div>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>

    <?php if ($_smarty_tpl->tpl_vars['cart']->value['order_id']=='') {?>
        <?php $_smarty_tpl->tpl_vars['_but_text'] = new Smarty_variable($_smarty_tpl->__("create"), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['but_text_'] = new Smarty_variable($_smarty_tpl->__("create_process_payment"), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['_title'] = new Smarty_variable($_smarty_tpl->__("create_new_order"), null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['_but_text'] = new Smarty_variable($_smarty_tpl->__("save"), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['but_text_'] = new Smarty_variable($_smarty_tpl->__("save_process_payment"), null, 0);?>
        <?php ob_start();
echo $_smarty_tpl->__("editing_order");
$_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['_title'] = new Smarty_variable($_tmp1.": #".((string)$_smarty_tpl->tpl_vars['cart']->value['order_id']), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['but_check_filter'] = new Smarty_variable("label:not(#om_ajax_update_payment)", null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("cancel"),'but_role'=>"action",'but_href'=>"orders.details?order_id=".((string)$_smarty_tpl->tpl_vars['cart']->value['order_id'])), 0);?>

    <?php }?>

    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>$_smarty_tpl->tpl_vars['_but_text']->value,'but_name'=>"dispatch[order_management.place_order.save]",'but_role'=>"button_main"), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>$_smarty_tpl->tpl_vars['but_text_']->value,'but_name'=>"dispatch[order_management.place_order]",'but_role'=>"button_main",'but_check_filter'=>''), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['cart']->value['order_id']=='') {?>
        <?php echo $_smarty_tpl->__("add_new_order");?>

    <?php } else { ?>

        <?php echo $_smarty_tpl->__("editing_order");?>
 #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
 <span class="f-middle"><?php echo $_smarty_tpl->__("total");?>
: <span><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['cart']->value['total']), 0);?>
</span><?php if ($_smarty_tpl->tpl_vars['cart']->value['company_id']) {?>, <?php echo htmlspecialchars(fn_get_company_name($_smarty_tpl->tpl_vars['cart']->value['company_id']), ENT_QUOTES, 'UTF-8');
}?></span>

        <span class="f-small">
        /<?php if ($_smarty_tpl->tpl_vars['cart']->value['company_id']) {
echo htmlspecialchars(fn_get_company_name($_smarty_tpl->tpl_vars['cart']->value['company_id']), ENT_QUOTES, 'UTF-8');?>
)<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="I"&&$_smarty_tpl->tpl_vars['cart']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']]) {?>
        (<?php echo $_smarty_tpl->__("invoice");?>
 #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']], ENT_QUOTES, 'UTF-8');?>
)
        <?php } elseif ($_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']=="C"&&$_smarty_tpl->tpl_vars['cart']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']]) {?>
        (<?php echo $_smarty_tpl->__("credit_memo");?>
 #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['doc_ids'][$_smarty_tpl->tpl_vars['status_settings']->value['appearance_type']], ENT_QUOTES, 'UTF-8');?>
)
        <?php }?>
        <?php echo $_smarty_tpl->__("by");?>
 <?php if ($_smarty_tpl->tpl_vars['cart']->value['user_data']['user_id']) {
}
echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['user_data']['firstname'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['user_data']['lastname'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['cart']->value['user_data']['user_id']) {
}?>
        / <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['cart']->value['order_timestamp'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['cart']->value['order_timestamp'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['time_format'])), ENT_QUOTES, 'UTF-8');?>

        </span>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<div id="order_update">
<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>Smarty::$_smarty_vars['capture']['mainbox_title'],'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar'],'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'sidebar_position'=>"left"), 0);?>

<!--order_update--></div>

</form>
<?php }} ?>
