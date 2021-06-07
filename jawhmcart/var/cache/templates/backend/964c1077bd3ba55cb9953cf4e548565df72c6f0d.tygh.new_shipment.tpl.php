<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:23:54
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/shipments/components/new_shipment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140317159256e6670ad39718-51729815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '964c1077bd3ba55cb9953cf4e548565df72c6f0d' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/shipments/components/new_shipment.tpl',
      1 => 1457504494,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '140317159256e6670ad39718-51729815',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_info' => 0,
    'shipping' => 0,
    'has_packages' => 0,
    'product' => 0,
    'group_key' => 0,
    'may_display_product_update_link' => 0,
    'loop_amount' => 0,
    'key' => 0,
    'shipment_products' => 0,
    'shippings' => 0,
    'status' => 0,
    'shipping_id' => 0,
    'package_id' => 0,
    'package_num' => 0,
    'package' => 0,
    'cart_id' => 0,
    'amount' => 0,
    'allowed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6670b1daee1_16841984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6670b1daee1_16841984')) {function content_56e6670b1daee1_16841984($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
if (!is_callable('smarty_function_math')) include '/var/www/html/jawhmcart/app/lib/vendor/smarty/smarty/libs/plugins/function.math.php';
?><?php
fn_preload_lang_vars(array('general','packages','product','quantity','deleted_product','sku','no_products_for_shipment','options','shipping_method','tracking_number','carrier','comments','order_status','do_not_change','text_order_status_notification','send_shipment_notification_to_customer','text_shipping_packages_info','package','weight','shipping_method'));
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    var packages = [];
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="shipments_form" class="form-horizontal form-edit">
<input type="hidden" name="shipment_data[order_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
" />

<?php  $_smarty_tpl->tpl_vars["shipping"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["shipping"]->_loop = false;
 $_smarty_tpl->tpl_vars["shipping_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value['shipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["shipping"]->key => $_smarty_tpl->tpl_vars["shipping"]->value) {
$_smarty_tpl->tpl_vars["shipping"]->_loop = true;
 $_smarty_tpl->tpl_vars["shipping_id"]->value = $_smarty_tpl->tpl_vars["shipping"]->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['shipping']->value['packages_info']['packages']) {?>
        <?php $_smarty_tpl->tpl_vars["has_packages"] = new Smarty_variable(true, null, 0);?>
    <?php }?>
<?php } ?>

<?php if ($_smarty_tpl->tpl_vars['has_packages']->value) {?>
    <div class="tabs cm-j-tabs">
        <ul>
            <li id="tab_general" class="cm-js active"><a><?php echo $_smarty_tpl->__("general");?>
</a></li>
            <li id="tab_packages_info" class="cm-js"><a><?php echo $_smarty_tpl->__("packages");?>
</a></li>
        </ul>
    </div>
<?php }?>

<div class="cm-tabs-content" id="tabs_content">
    <div id="content_tab_general">

        <table class="table table-middle">
        <thead>
            <tr>
                <th><?php echo $_smarty_tpl->__("product");?>
</th>
                <th width="5%"><?php echo $_smarty_tpl->__("quantity");?>
</th>
            </tr>
        </thead>

        <?php $_smarty_tpl->tpl_vars["shipment_products"] = new Smarty_variable(false, null, 0);?>

        <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['shipment_amount']>0&&(!isset($_smarty_tpl->tpl_vars['product']->value['extra']['group_key'])||$_smarty_tpl->tpl_vars['product']->value['extra']['group_key']==$_smarty_tpl->tpl_vars['group_key']->value)) {?>
            <?php $_smarty_tpl->tpl_vars["shipment_products"] = new Smarty_variable(true, null, 0);?>

            <tr>
                <td>
                    <?php $_smarty_tpl->tpl_vars['may_display_product_update_link'] = new Smarty_variable(fn_check_view_permissions("products.update"), null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['may_display_product_update_link']->value&&!$_smarty_tpl->tpl_vars['product']->value['deleted_product']) {?><a href="<?php echo htmlspecialchars(fn_url("products.update?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php }
echo (($tmp = @$_smarty_tpl->tpl_vars['product']->value['product'])===null||$tmp==='' ? $_smarty_tpl->__("deleted_product") : $tmp);
if ($_smarty_tpl->tpl_vars['may_display_product_update_link']->value) {?></a><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['product_code']) {?><p><?php echo $_smarty_tpl->__("sku");?>
:&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_code'], ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['product_options']) {?><div class="options-info"><?php echo $_smarty_tpl->getSubTemplate ("common/options_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_options'=>$_smarty_tpl->tpl_vars['product']->value['product_options']), 0);?>
</div><?php }?>
                </td>
                <td class="center" nowrap="nowrap">
                        <?php echo smarty_function_math(array('equation'=>"amount + 1",'amount'=>$_smarty_tpl->tpl_vars['product']->value['shipment_amount'],'assign'=>"loop_amount"),$_smarty_tpl);?>

                        <?php if ($_smarty_tpl->tpl_vars['loop_amount']->value<=100) {?>
                            <select id="shipment_data_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
" class="input-small cm-shipments-product" name="shipment_data[products][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
]">
                                <option value="0">0</option>
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['amount'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['name'] = 'amount';
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['loop_amount']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['amount']['total']);
?>
                                <option value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['section']['amount']['index'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['amount']['last']) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['section']['amount']['index'], ENT_QUOTES, 'UTF-8');?>
</option>
                            <?php endfor; endif; ?>
                            </select>
                        <?php } else { ?>
                            <input id="shipment_data_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
" type="text" class="input-text" size="3" name="shipment_data[products][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['shipment_amount'], ENT_QUOTES, 'UTF-8');?>
" />&nbsp;of&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['shipment_amount'], ENT_QUOTES, 'UTF-8');?>

                        <?php }?>
                </td>
            </tr>
            <?php }?>
        <?php } ?>

        <?php if (!$_smarty_tpl->tpl_vars['shipment_products']->value) {?>
            <tr>
                <td colspan="2"><?php echo $_smarty_tpl->__("no_products_for_shipment");?>
</td>
            </tr>
        <?php }?>

        </table>

        <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("options")), 0);?>


        <fieldset>
            <div class="control-group">
                <label class="control-label" for="shipping_name"><?php echo $_smarty_tpl->__("shipping_method");?>
</label>
                <div class="controls">
                    <select name="shipment_data[shipping_id]" id="shipping_name">
                        <?php  $_smarty_tpl->tpl_vars["shipping"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["shipping"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shippings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["shipping"]->key => $_smarty_tpl->tpl_vars["shipping"]->value) {
$_smarty_tpl->tpl_vars["shipping"]->_loop = true;
?>
                            <option    value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['shipping_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['shipping'], ENT_QUOTES, 'UTF-8');?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="tracking_number"><?php echo $_smarty_tpl->__("tracking_number");?>
</label>
                <div class="controls">
                    <input type="text" name="shipment_data[tracking_number]" id="tracking_number" size="10" value="" />
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="carrier_key"><?php echo $_smarty_tpl->__("carrier");?>
</label>
                <div class="controls">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/carriers.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"carrier_key",'name'=>"shipment_data[carrier]"), 0);?>

                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="shipment_comments"><?php echo $_smarty_tpl->__("comments");?>
</label>
                <div class="controls">
                    <textarea id="shipmentcomments" name="shipment_data[comments]" cols="55" rows="8" class="span9"></textarea>
                </div>
            </div>
            
            <?php if (fn_check_view_permissions("orders.update_status")) {?>
            <div class="control-group">
                <label class="control-label" for="order_status"><?php echo $_smarty_tpl->__("order_status");?>
</label>
                <div class="controls">
                    <select id="order_status" name="shipment_data[order_status]">
                        <option value=""><?php echo $_smarty_tpl->__("do_not_change");?>
</option>
                        <?php  $_smarty_tpl->tpl_vars["status"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["status"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = fn_get_simple_statuses(@constant('STATUSES_ORDER')); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["status"]->key => $_smarty_tpl->tpl_vars["status"]->value) {
$_smarty_tpl->tpl_vars["status"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["status"]->key;
?>
                            <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                        <?php } ?>
                    </select>
                    <p class="description">
                        <?php echo $_smarty_tpl->__("text_order_status_notification");?>

                    </p>
                </div>
            </div>
            <?php }?>
        </fieldset>

        <div class="cm-toggle-button">
            <div class="control-group select-field notify-customer">
                <div class="controls">
                    <label for="shipment_notify_user" class="checkbox">
                    <input type="checkbox" name="notify_user" id="shipment_notify_user" value="Y" />
                    <?php echo $_smarty_tpl->__("send_shipment_notification_to_customer");?>
</label>
                </div>
            </div>
        </div>
    </div>
    
    <?php if ($_smarty_tpl->tpl_vars['has_packages']->value) {?>
        <div id="content_tab_packages_info">
            <span class="packages-info"><?php echo $_smarty_tpl->__("text_shipping_packages_info");?>
</span>
            <?php $_smarty_tpl->tpl_vars["package_num"] = new Smarty_variable("1", null, 0);?>

            <?php  $_smarty_tpl->tpl_vars["shipping"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["shipping"]->_loop = false;
 $_smarty_tpl->tpl_vars["shipping_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value['shipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["shipping"]->key => $_smarty_tpl->tpl_vars["shipping"]->value) {
$_smarty_tpl->tpl_vars["shipping"]->_loop = true;
 $_smarty_tpl->tpl_vars["shipping_id"]->value = $_smarty_tpl->tpl_vars["shipping"]->key;
?>
                <?php  $_smarty_tpl->tpl_vars["package"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["package"]->_loop = false;
 $_smarty_tpl->tpl_vars["package_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['shipping']->value['packages_info']['packages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["package"]->key => $_smarty_tpl->tpl_vars["package"]->value) {
$_smarty_tpl->tpl_vars["package"]->_loop = true;
 $_smarty_tpl->tpl_vars["package_id"]->value = $_smarty_tpl->tpl_vars["package"]->key;
?>
                    <?php $_smarty_tpl->tpl_vars["allowed"] = new Smarty_variable(true, null, 0);?>
                    
                    <?php $_smarty_tpl->_capture_stack[0][] = array("package_container", null, null); ob_start(); ?>
                    <div class="package-container">
                        
                        
                        
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
                            packages['package_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_id']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['package_id']->value, ENT_QUOTES, 'UTF-8');?>
'] = [];
                        <?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        <h3>
                        <?php echo $_smarty_tpl->__("package");?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['package_num']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['package']->value['shipping_params']) {?>(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['package']->value['shipping_params']['box_length'], ENT_QUOTES, 'UTF-8');?>
 x <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['package']->value['shipping_params']['box_width'], ENT_QUOTES, 'UTF-8');?>
 x <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['package']->value['shipping_params']['box_height'], ENT_QUOTES, 'UTF-8');?>
)<?php }?>
                        </h3>
                        <ul>
                        <?php  $_smarty_tpl->tpl_vars["amount"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["amount"]->_loop = false;
 $_smarty_tpl->tpl_vars["cart_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['package']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["amount"]->key => $_smarty_tpl->tpl_vars["amount"]->value) {
$_smarty_tpl->tpl_vars["amount"]->_loop = true;
 $_smarty_tpl->tpl_vars["cart_id"]->value = $_smarty_tpl->tpl_vars["amount"]->key;
?>
                            <?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
                                packages['package_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_id']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['package_id']->value, ENT_QUOTES, 'UTF-8');?>
']['<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_id']->value, ENT_QUOTES, 'UTF-8');?>
'] = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value, ENT_QUOTES, 'UTF-8');?>
';
                            <?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            <?php if ($_smarty_tpl->tpl_vars['order_info']->value['products'][$_smarty_tpl->tpl_vars['cart_id']->value]) {?>
                                <li><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value, ENT_QUOTES, 'UTF-8');?>
</span> x <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['products'][$_smarty_tpl->tpl_vars['cart_id']->value]['product'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['order_info']->value['products'][$_smarty_tpl->tpl_vars['cart_id']->value]['product_options']) {?>(<?php echo $_smarty_tpl->getSubTemplate ("common/options_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_options'=>$_smarty_tpl->tpl_vars['order_info']->value['products'][$_smarty_tpl->tpl_vars['cart_id']->value]['product_options']), 0);?>
)<?php }?></li>
                            <?php } else { ?>
                                <?php $_smarty_tpl->tpl_vars["allowed"] = new Smarty_variable(false, null, 0);?>
                            <?php }?>
                        <?php } ?>
                        </ul>
                        <span class="strong"><?php echo $_smarty_tpl->__("weight");?>
:</span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['package']->value['weight'], ENT_QUOTES, 'UTF-8');?>
<br />
                        <span class="strong"><?php echo $_smarty_tpl->__("shipping_method");?>
:</span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['shipping'], ENT_QUOTES, 'UTF-8');?>

                    </div>
                                        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                    
                    <?php if ($_smarty_tpl->tpl_vars['allowed']->value) {?>
                        <?php echo Smarty::$_smarty_vars['capture']['package_container'];?>

                    <?php }?>
                    
                    <?php echo smarty_function_math(array('equation'=>"num + 1",'num'=>$_smarty_tpl->tpl_vars['package_num']->value,'assign'=>"package_num"),$_smarty_tpl);?>

                <?php } ?>
            <?php } ?>
        </div>
    <?php }?>
</div>

<div class="buttons-container">
    <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[shipments.add]",'cancel_action'=>"close"), 0);?>

</div>


</form>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    function fn_calculate_packages()
    {
        var products = [];
        
        Tygh.$('.cm-shipments-package:checked').each(function(id, elm) {
            jelm = Tygh.$(elm);
            id = jelm.prop('id');
            
            for (var i in packages[id]) {
                if (typeof(products[i]) == 'undefined') {
                    products[i] = parseInt(packages[id][i]);
                } else {
                    products[i] += parseInt(packages[id][i]);
                }
            }
        });
        
        // Set the values of the ship products to 0. We will change the values to the correct variants after
        Tygh.$('.cm-shipments-product').each(function() {
            Tygh.$(this).val(0);
        });
        
        if (products.length > 0) {
            for (var i in products) {
                Tygh.$('#shipment_data_' + i).val(products[i]);
            }
        }
    }
    Tygh.$(document).ready(function() {
        Tygh.$('.cm-shipments-package').on('change', fn_calculate_packages);
    });
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php }} ?>
