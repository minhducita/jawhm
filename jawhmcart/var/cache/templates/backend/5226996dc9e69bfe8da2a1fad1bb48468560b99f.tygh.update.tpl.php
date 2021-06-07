<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:37:58
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/shippings/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121034235456e69486b89944-14690373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5226996dc9e69bfe8da2a1fad1bb48468560b99f' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/shippings/update.tpl',
      1 => 1457504411,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '121034235456e69486b89944-14690373',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shipping' => 0,
    'services' => 0,
    'id' => 0,
    'allow_save' => 0,
    'carriers' => 0,
    'module' => 0,
    'carrier' => 0,
    'settings' => 0,
    'zero_company_id_name_lang_var' => 0,
    'taxes' => 0,
    'tax' => 0,
    'usergroups' => 0,
    'hide_for_vendor' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e69487174301_35608900',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e69487174301_35608900')) {function content_56e69487174301_35608900($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.inline_script.php';
if (!is_callable('smarty_modifier_in_array')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.in_array.php';
if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('information','name','rate_calculation','rate_calculation_manual','rate_calculation_realtime','carrier','shipping_service','calculate_shipping_cost','weight','test','test','delivery_time','ttc_delivery_time','weight_limit','extra','icon','taxes','usergroups','add_shipping_method','shipping_methods','delete','new_shipping_method','editing_shipping_method'));
?>
<?php if ($_smarty_tpl->tpl_vars['shipping']->value) {?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable($_smarty_tpl->tpl_vars['shipping']->value['shipping_id'], null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(0, null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["allow_save"] = new Smarty_variable(fn_allow_save_object($_smarty_tpl->tpl_vars['shipping']->value,"shippings"), null, 0);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
(function(_, $) {

    var services_data = <?php echo json_encode($_smarty_tpl->tpl_vars['services']->value);?>
;
    var service_id = <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['shipping']->value['service_id'])===null||$tmp==='' ? 0 : $tmp), ENT_QUOTES, 'UTF-8');?>
;

    $(document).ready(function() {

        $('#sw_elm_rate_calculation_suffix_manual,#sw_elm_rate_calculation_suffix_realtime').on('change', function() {
            var self = $(this);

            if (self.prop('id') == 'sw_elm_rate_calculation_suffix_manual') {
                $('#configure').hide();
            } else {
                $('#elm_service').trigger('change');
            }
        });

        $('#elm_carrier').on('change', function() {
            var self = $(this);
            var services = $('#elm_service');
            var option = self.find('option:selected');
            var options = '';

            services.prop('length', 0);
            for (var k in services_data) {
                if (services_data[k]['module'] == option.data('caShippingModule')) {
                    options += '<option data-ca-shipping-code="' + services_data[k]['code'] +'" data-ca-shipping-module="' + services_data[k]['module'] + '" value="' + k + '" ' + (k == service_id ? 'selected="selected"' : '') + '>' + services_data[k]['description'] + '</option>';
                }
            }
           services.append(options);
           $('#elm_service').trigger('change');
        });

        $('#elm_service').on('change', function() {

            var self = $(this);
            var option = self.find('option:selected');
            var href = fn_url('shippings.configure?shipping_id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
&module=' + option.data('caShippingModule') + '&code=' + option.data('caShippingCode'));
            var tab = $('#configure');


            if (tab.find('a').prop('href') != href) {
                $('#content_configure').remove();
                tab.find('a').prop('href', href);
            }
            tab.show();
        });

        $('#elm_carrier').trigger('change');
    });
}(Tygh, Tygh.$));
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="shippings_form" enctype="multipart/form-data" class="form-horizontal form-edit <?php if (!$_smarty_tpl->tpl_vars['allow_save']->value) {?> cm-hide-inputs<?php }?>">
<input type="hidden" name="shipping_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array("tabsbox", null, null); ob_start(); ?>
<div id="content_general">
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("information"),'target'=>"#acc_information"), 0);?>

<fieldset id="acc_information" class="collapse-visible collapse in">
<div class="control-group">
    <label class="control-label cm-required" for="ship_descr_shipping"><?php echo $_smarty_tpl->__("name");?>
:</label>
    <div class="controls">
        <input type="text" name="shipping_data[shipping]" id="ship_descr_shipping" size="30" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['shipping'], ENT_QUOTES, 'UTF-8');?>
" class="input-large" />
    </div>
</div>

<div class="control-group">
    <label class="control-label"><?php echo $_smarty_tpl->__("rate_calculation");?>
:</label>
    <div class="controls">
        <label class="radio">
            <input type="radio" name="shipping_data[rate_calculation]" id="sw_elm_rate_calculation_suffix_manual" value="M" <?php if ($_smarty_tpl->tpl_vars['shipping']->value['rate_calculation']=="M"||!$_smarty_tpl->tpl_vars['shipping']->value['rate_calculation']) {?>checked="checked"<?php }?> class="cm-switch-availability cm-switch-visibility cm-switch-inverse" />
        <?php echo $_smarty_tpl->__("rate_calculation_manual");?>
</label>

        <label class="radio">
            <input type="radio" name="shipping_data[rate_calculation]" id="sw_elm_rate_calculation_suffix_realtime" value="R" <?php if ($_smarty_tpl->tpl_vars['shipping']->value['rate_calculation']=="R") {?>checked="checked"<?php }?> class="cm-switch-availability cm-switch-visibility" />
        <?php echo $_smarty_tpl->__("rate_calculation_realtime");?>
</label>
    </div>
</div>

<div id="elm_rate_calculation" <?php if ($_smarty_tpl->tpl_vars['shipping']->value['rate_calculation']!="R") {?>class="hidden"<?php }?>>

    <div class="control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__("carrier");?>
:</label>
        <div class="controls">
        <select name="shipping_data[carrier]" id="elm_carrier" <?php if ($_smarty_tpl->tpl_vars['shipping']->value['rate_calculation']=="M"||!$_smarty_tpl->tpl_vars['id']->value) {?>disabled="disabled"<?php }?>>
            <?php  $_smarty_tpl->tpl_vars["carrier"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["carrier"]->_loop = false;
 $_smarty_tpl->tpl_vars["module"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["carrier"]->key => $_smarty_tpl->tpl_vars["carrier"]->value) {
$_smarty_tpl->tpl_vars["carrier"]->_loop = true;
 $_smarty_tpl->tpl_vars["module"]->value = $_smarty_tpl->tpl_vars["carrier"]->key;
?>
                <option data-ca-shipping-module="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['id']->value&&$_smarty_tpl->tpl_vars['services']->value[$_smarty_tpl->tpl_vars['shipping']->value['service_id']]['module']==$_smarty_tpl->tpl_vars['module']->value) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value, ENT_QUOTES, 'UTF-8');?>
</option>
            <?php } ?>
        </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__("shipping_service");?>
:</label>
        <div class="controls">
        <select name="shipping_data[service_id]" id="elm_service" <?php if ($_smarty_tpl->tpl_vars['shipping']->value['rate_calculation']=="M"||!$_smarty_tpl->tpl_vars['id']->value) {?>disabled="disabled"<?php }?>>
        </select>

        <?php if ($_smarty_tpl->tpl_vars['allow_save']->value) {?>
        <div>
            <a id="sw_elm_test_rates" class="shift-left cm-combination"><?php echo $_smarty_tpl->__("calculate_shipping_cost");?>
</a>
            <div id="elm_test_rates" class="shift-left hidden">
                <?php echo $_smarty_tpl->__("weight");?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['General']['weight_symbol'], ENT_QUOTES, 'UTF-8');?>
)&nbsp;
                <div class="input-append">
                    <input id="elm_weight" type="text" class="input-mini" size="3" name="shipping_data[test_weight]" value="0" />
                    <input type="hidden" name="result_ids" value="elm_shipping_test" />
                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_role'=>"action",'but_name'=>"dispatch[shippings.test]",'but_text'=>__("test"),'but_meta'=>"cm-submit btn cm-skip-validation cm-ajax cm-form-dialog-opener"), 0);?>

                </div>
            </div>
        </div>
        <?php }?>
        </div>
    </div>
    <div id="elm_shipping_test" title="<?php echo $_smarty_tpl->__("test");?>
"></div>
</div>

<div class="control-group">
    <label class="control-label" for="elm_delivery_time"><?php echo $_smarty_tpl->__("delivery_time");
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>__("ttc_delivery_time")), 0);?>
:</label>
    <div class="controls">
    <input type="text" class="input-medium" name="shipping_data[delivery_time]" id="elm_delivery_time" size="30" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['delivery_time'], ENT_QUOTES, 'UTF-8');?>
" />
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="elm_min_weight"><?php echo $_smarty_tpl->__("weight_limit");?>
&nbsp;(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['General']['weight_symbol'], ENT_QUOTES, 'UTF-8');?>
):</label>
    <div class="controls">
        <input type="text" name="shipping_data[min_weight]" id="elm_min_weight" size="4" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['min_weight'], ENT_QUOTES, 'UTF-8');?>
" class="input-mini" />&nbsp;-&nbsp;<input type="text" name="shipping_data[max_weight]" size="4" value="<?php if ($_smarty_tpl->tpl_vars['shipping']->value['max_weight']!="0.00") {
echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping']->value['max_weight'], ENT_QUOTES, 'UTF-8');
}?>" class="input-mini right" />
    </div>
</div>


<?php if ($_smarty_tpl->tpl_vars['allow_save']->value) {?>
    <?php if (fn_allowed_for("MULTIVENDOR")) {?>
        <?php $_smarty_tpl->tpl_vars["zero_company_id_name_lang_var"] = new Smarty_variable("none", null, 0);?>
    <?php }?>
    <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>"shipping_data[company_id]",'id'=>"shipping_data_".((string)$_smarty_tpl->tpl_vars['id']->value),'selected'=>$_smarty_tpl->tpl_vars['shipping']->value['company_id'],'zero_company_id_name_lang_var'=>$_smarty_tpl->tpl_vars['zero_company_id_name_lang_var']->value), 0);?>

<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/select_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('input_name'=>"shipping_data[status]",'id'=>"elm_shipping_status",'obj'=>$_smarty_tpl->tpl_vars['shipping']->value), 0);?>


</fieldset>

<?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("extra"),'target'=>"#acc_extra"), 0);?>

<fieldset id="acc_extra" class="collapse in">
<div class="control-group">
    <label class="control-label"><?php echo $_smarty_tpl->__("icon");?>
:</label>
    <div class="controls">
    <?php echo $_smarty_tpl->getSubTemplate ("common/attach_images.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image_name'=>"shipping",'image_object_type'=>"shipping",'image_pair'=>$_smarty_tpl->tpl_vars['shipping']->value['icon'],'no_detailed'=>"Y",'hide_titles'=>"Y",'image_object_id'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

    </div>
</div>

<div class="control-group">
    <label class="control-label"><?php echo $_smarty_tpl->__("taxes");?>
:</label>
    <div class="controls">
            <?php  $_smarty_tpl->tpl_vars["tax"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["tax"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['taxes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["tax"]->key => $_smarty_tpl->tpl_vars["tax"]->value) {
$_smarty_tpl->tpl_vars["tax"]->_loop = true;
?>
            <label class="checkbox inline" for="elm_shippings_taxes_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax']->value['tax_id'], ENT_QUOTES, 'UTF-8');?>
">
            <input type="checkbox" name="shipping_data[tax_ids][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax']->value['tax_id'], ENT_QUOTES, 'UTF-8');?>
]" id="elm_shippings_taxes_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax']->value['tax_id'], ENT_QUOTES, 'UTF-8');?>
" <?php if (smarty_modifier_in_array($_smarty_tpl->tpl_vars['tax']->value['tax_id'],$_smarty_tpl->tpl_vars['shipping']->value['tax_ids'])) {?>checked="checked"<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax']->value['tax_id'], ENT_QUOTES, 'UTF-8');?>
" />
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax']->value['tax'], ENT_QUOTES, 'UTF-8');?>
</label>
        <?php }
if (!$_smarty_tpl->tpl_vars["tax"]->_loop) {
?>
            &ndash;
        <?php } ?>
    </div>
</div>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:update")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:update"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:update"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php if (!fn_allowed_for("ULTIMATE:FREE")) {?>
    <div class="control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__("usergroups");?>
:</label>
        <div class="controls">
            <?php echo $_smarty_tpl->getSubTemplate ("common/select_usergroups.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"elm_ship_data_usergroup_id",'name'=>"shipping_data[usergroup_ids]",'usergroups'=>$_smarty_tpl->tpl_vars['usergroups']->value,'usergroup_ids'=>$_smarty_tpl->tpl_vars['shipping']->value['usergroup_ids'],'input_extra'=>'','list_mode'=>false), 0);?>

        </div>
    </div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("views/localizations/components/select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data_name'=>"shipping_data[localization]",'data_from'=>$_smarty_tpl->tpl_vars['shipping']->value['localization']), 0);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:update_tools_list")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:update_tools_list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("add_shipping_method"),'href'=>"shippings.add"));?>
</li>
                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("shipping_methods"),'href'=>"shippings.manage"));?>
</li>
                <li class="divider"></li>
                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("delete"),'class'=>"cm-confirm",'dispatch'=>"dispatch[shippings.delete_rate_values]",'form'=>"shippings_form"));?>
</li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:update_tools_list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

    <?php }?>

    <?php if (!$_smarty_tpl->tpl_vars['hide_for_vendor']->value) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[shippings.update]",'but_target_form'=>"shippings_form",'save'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

    <?php } else { ?>
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[shippings.update]",'hide_first_button'=>true,'hide_second_button'=>true,'but_target_form'=>"shippings_form",'save'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
    <input type="hidden" name="selected_section" value="general" />
    <!--content_general--></div>

    <div id="content_configure">
    <!--content_configure--></div>

    <div id="content_shipping_charges">
    <?php echo $_smarty_tpl->getSubTemplate ("views/shippings/components/rates.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['id']->value,'shipping'=>$_smarty_tpl->tpl_vars['shipping']->value), 0);?>

    <!--content_shipping_charges--></div>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shippings:tabs_content")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shippings:tabs_content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shippings:tabs_content"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/tabsbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('content'=>Smarty::$_smarty_vars['capture']['tabsbox'],'active_tab'=>$_REQUEST['selected_section'],'track'=>true), 0);?>

<?php }?>

</form>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if (!$_smarty_tpl->tpl_vars['id']->value) {?>
    <?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable($_smarty_tpl->__("new_shipping_method"), null, 0);?>
<?php } else { ?>
    <?php ob_start();
echo $_smarty_tpl->__("editing_shipping_method");
$_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["title"] = new Smarty_variable($_tmp1.": ".((string)$_smarty_tpl->tpl_vars['shipping']->value['shipping']), null, 0);?>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->tpl_vars['title']->value,'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'select_languages'=>true), 0);?>

<?php }} ?>
