<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:45:12
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/products/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33042887256e67a184e1d58-81117077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40deb199e845815ef6b5f0983b40c8ae7ad0fecf' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/products/manage.tpl',
      1 => 1457504394,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '33042887256e67a184e1d58-81117077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search' => 0,
    'config' => 0,
    'products' => 0,
    'c_url' => 0,
    'rev' => 0,
    'c_icon' => 0,
    'c_dummy' => 0,
    'ajax_class' => 0,
    'primary_currency' => 0,
    'currencies' => 0,
    'runtime' => 0,
    'product' => 0,
    'hide_inputs_if_shared_product' => 0,
    'no_hide_input_if_shared_product' => 0,
    'show_update_for_all' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e67a18bebc00_81214448',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67a18bebc00_81214448')) {function content_56e67a18bebc00_81214448($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_modifier_truncate')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_enum')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.enum.php';
?><?php
fn_preload_lang_vars(array('position_short','image','name','sku','price','list_price','purchased_qty','subtotal_sum','quantity','status','sku','edit','edit','delete','no_data','text_select_fields2edit_note','modify_selected','global_update','bulk_product_addition','product_subscriptions','edit_selected','clone_selected','export_selected','add_product','select_fields_to_edit','products'));
?>
<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="manage_products_form" id="manage_products_form">
<input type="hidden" name="category_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['cid'], ENT_QUOTES, 'UTF-8');?>
" />

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('save_current_page'=>true,'save_current_url'=>true,'div_id'=>$_REQUEST['content_id']), 0);?>


<?php $_smarty_tpl->tpl_vars["c_url"] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['config']->value['current_url'],"sort_by","sort_order"), null, 0);?>

<?php $_smarty_tpl->tpl_vars["rev"] = new Smarty_variable((($tmp = @$_REQUEST['content_id'])===null||$tmp==='' ? "pagination_contents" : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_icon"] = new Smarty_variable("<i class=\"exicon-".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])."\"></i>", null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_dummy"] = new Smarty_variable("<i class=\"exicon-dummy\"></i>", null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
<table width="100%" class="table table-middle">
<thead>
<tr>
    <th class="left">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('check_statuses'=>fn_get_default_status_filters('',true)), 0);?>

    </th>
    <?php if ($_smarty_tpl->tpl_vars['search']->value['cid']&&$_smarty_tpl->tpl_vars['search']->value['subcats']!="Y") {?>
    <th class="nowrap"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=position&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("position_short");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="position") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <?php }?>
    <th width="5%"><span><?php echo $_smarty_tpl->__("image");?>
</span></th>
    <th width="45%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=product&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("name");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="product") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a> /&nbsp;&nbsp;&nbsp; <a class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ajax_class']->value, ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=code&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("sku");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="code") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="15%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=price&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("price");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="price") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="15%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=list_price&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("list_price");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="list_price") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <?php if ($_smarty_tpl->tpl_vars['search']->value['order_ids']) {?>
    <th width="5%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=p_qty&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("purchased_qty");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="p_qty") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="5%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=p_subtotal&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("subtotal_sum");?>
 (<?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value]['symbol'];?>
)<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="p_subtotal") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <?php }?>
    <th width="5%" class="nowrap"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=amount&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("quantity");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="amount") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:manage_head")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:manage_head"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:manage_head"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
    <th width="5%">&nbsp;</th>
    <th width="10%" class="right"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=status&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("status");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="status") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
</tr>
</thead>
<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>

<?php if (fn_allowed_for("ULTIMATE")) {?>
    <?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&$_smarty_tpl->tpl_vars['product']->value['is_shared_product']=="Y"&&$_smarty_tpl->tpl_vars['product']->value['company_id']!=$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
        <?php $_smarty_tpl->tpl_vars["hide_inputs_if_shared_product"] = new Smarty_variable("cm-hide-inputs", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["no_hide_input_if_shared_product"] = new Smarty_variable("cm-no-hide-input", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["hide_inputs_if_shared_product"] = new Smarty_variable('', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["no_hide_input_if_shared_product"] = new Smarty_variable('', null, 0);?>
    <?php }?>
    <?php if (!$_smarty_tpl->tpl_vars['runtime']->value['company_id']&&$_smarty_tpl->tpl_vars['product']->value['is_shared_product']=="Y") {?>
        <?php $_smarty_tpl->tpl_vars["show_update_for_all"] = new Smarty_variable(true, null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["show_update_for_all"] = new Smarty_variable(false, null, 0);?>
    <?php }?>
<?php }?>

<tr class="cm-row-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['product']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hide_inputs_if_shared_product']->value, ENT_QUOTES, 'UTF-8');?>
">
    <td class="left">
    <input type="checkbox" name="product_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" class="checkbox cm-item cm-item-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['product']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
" /></td>
    <?php if ($_smarty_tpl->tpl_vars['search']->value['cid']&&$_smarty_tpl->tpl_vars['search']->value['subcats']!="Y") {?>
    <td class="<?php if ($_smarty_tpl->tpl_vars['no_hide_input_if_shared_product']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['no_hide_input_if_shared_product']->value, ENT_QUOTES, 'UTF-8');
}?>">
        <input type="text" name="products_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
][position]" size="3" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['position'], ENT_QUOTES, 'UTF-8');?>
" class="input-micro" /></td>
    <?php }?>
    <td>
        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image'=>(($tmp = @$_smarty_tpl->tpl_vars['product']->value['main_pair']['icon'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value['main_pair']['detailed'] : $tmp),'image_id'=>$_smarty_tpl->tpl_vars['product']->value['main_pair']['image_id'],'image_width'=>50,'href'=>fn_url("products.update?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']))), 0);?>

    </td>
    <td>
        <input type="hidden" name="products_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
][product]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['no_hide_input_if_shared_product']->value) {?> class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['no_hide_input_if_shared_product']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
        <a class="row-status" href="<?php echo htmlspecialchars(fn_url("products.update?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['product'],40);?>
</a>
        <div class="product-code">
            <span class="product-code-label row-status"><?php echo $_smarty_tpl->__("sku");?>
 </span>
            <input type="text" name="products_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
][product_code]" size="15" maxlength="32" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_code'], ENT_QUOTES, 'UTF-8');?>
" class="input-hidden span2" />
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

    </td>
    <td class="<?php if ($_smarty_tpl->tpl_vars['no_hide_input_if_shared_product']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['no_hide_input_if_shared_product']->value, ENT_QUOTES, 'UTF-8');
}?>">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/update_for_all.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('display'=>$_smarty_tpl->tpl_vars['show_update_for_all']->value,'object_id'=>"price_".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']),'name'=>"update_all_vendors[price][".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])."]"), 0);?>

        <input type="text" name="products_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
][price]" size="6" value="<?php echo htmlspecialchars(fn_format_price($_smarty_tpl->tpl_vars['product']->value['price'],$_smarty_tpl->tpl_vars['primary_currency']->value,null,false), ENT_QUOTES, 'UTF-8');?>
" class="input-mini input-hidden"/>
    </td>
    <td>
        <input type="text" name="products_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
][list_price]" size="6" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['list_price'], ENT_QUOTES, 'UTF-8');?>
" class="input-mini input-hidden" /></td>
    <?php if ($_smarty_tpl->tpl_vars['search']->value['order_ids']) {?>
    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['purchased_qty'], ENT_QUOTES, 'UTF-8');?>
</td>
    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['purchased_subtotal'], ENT_QUOTES, 'UTF-8');?>
</td>
    <?php }?>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['tracking']==smarty_modifier_enum("ProductTracking::TRACK_WITH_OPTIONS")) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("edit"),'but_href'=>"product_options.inventory?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']),'but_role'=>"edit"), 0);?>

        <?php } else { ?>
        <input type="text" name="products_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
][amount]" size="6" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['amount'], ENT_QUOTES, 'UTF-8');?>
" class="input-micro input-hidden" />
        <?php }?>
    </td>
    <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:manage_body")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:manage_body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:manage_body"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
    <td class="nowrap">
        <div class="hidden-tools">
            <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:list_extra_links")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:list_extra_links"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("edit"),'href'=>"products.update?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])));?>
</li>
                    <?php if (!$_smarty_tpl->tpl_vars['hide_inputs_if_shared_product']->value) {?>
                        <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("delete"),'class'=>"cm-confirm cm-post",'href'=>"products.delete?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])));?>
</li>
                    <?php }?>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:list_extra_links"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

        </div>
    </td>
    <td class="right nowrap">
    <?php echo $_smarty_tpl->getSubTemplate ("common/select_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('popup_additional_class'=>"dropleft",'id'=>$_smarty_tpl->tpl_vars['product']->value['product_id'],'status'=>$_smarty_tpl->tpl_vars['product']->value['status'],'hidden'=>true,'object_id_name'=>"product_id",'table'=>"products"), 0);?>

    </td>
</tr>
<?php } ?>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("select_fields_to_edit", null, null); ob_start(); ?>

<p><?php echo $_smarty_tpl->__("text_select_fields2edit_note");?>
</p>
<?php echo $_smarty_tpl->getSubTemplate ("views/products/components/products_select_fields.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="buttons-container">
    <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("modify_selected"),'but_name'=>"dispatch[products.store_selection]",'cancel_action'=>"close"), 0);?>

</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:action_buttons")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:action_buttons"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("global_update"),'href'=>"products.global_update"));?>
</li>
        <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("bulk_product_addition"),'href'=>"products.m_add"));?>
</li>
        <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("product_subscriptions"),'href'=>"products.p_subscr"));?>
</li>
		<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
            <li class="divider"></li>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"dialog",'class'=>"cm-process-items",'text'=>__("edit_selected"),'target_id'=>"content_select_fields_to_edit",'form'=>"manage_products_form"));?>
</li>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("clone_selected"),'dispatch'=>"dispatch[products.m_clone]",'form'=>"manage_products_form"));?>
</li>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("export_selected"),'dispatch'=>"dispatch[products.export_range]",'form'=>"manage_products_form"));?>
</li>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[products.m_delete]",'form'=>"manage_products_form"));?>
</li>
        <?php }?>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:action_buttons"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

    <?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/save.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[products.m_update]",'but_role'=>"submit-button",'but_target_form'=>"manage_products_form"), 0);?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("adv_buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"products:manage_tools")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"products:manage_tools"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tool_href'=>"products.add",'prefix'=>"top",'title'=>__("add_product"),'hide_tools'=>true,'icon'=>"icon-plus"), 0);?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"products:manage_tools"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/popupbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"select_fields_to_edit",'text'=>__("select_fields_to_edit"),'content'=>Smarty::$_smarty_vars['capture']['select_fields_to_edit']), 0);?>


<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('div_id'=>$_REQUEST['content_id']), 0);?>

</div>

</form>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sidebar", null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/saved_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"products.manage",'view_type'=>"products"), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/products_search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"products.manage"), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("products"),'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'title_extra'=>Smarty::$_smarty_vars['capture']['title_extra'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons'],'select_languages'=>true,'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar'],'content_id'=>"manage_products"), 0);?>
<?php }} ?>
