<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 14:07:09
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/shipments/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14489899556e69b5d7c9847-81307237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '459d992b61ae13c94ee224b84ab256460fe4baa2' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/shipments/manage.tpl',
      1 => 1457504409,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '14489899556e69b5d7c9847-81307237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'search' => 0,
    'shipments' => 0,
    'c_url' => 0,
    'c_icon' => 0,
    'c_dummy' => 0,
    'shipment' => 0,
    'settings' => 0,
    'return_current_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e69b5db72194_99728662',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e69b5db72194_99728662')) {function content_56e69b5db72194_99728662($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('shipment_id','order_id','shipment_date','order_date','customer','view','print_slip','print_pdf_packing_slip','delete','no_data','bulk_print_packing_slip','shipments','order'));
?>
<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="manage_shipments_form">

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('save_current_page'=>true,'save_current_url'=>true), 0);?>


<?php $_smarty_tpl->tpl_vars["c_url"] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['config']->value['current_url'],"sort_by","sort_order"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_icon"] = new Smarty_variable("<i class=\"exicon-".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])."\"></i>", null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_dummy"] = new Smarty_variable("<i class=\"exicon-dummy\"></i>", null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['shipments']->value) {?>
<table width="100%" class="table table-middle">
<thead>
<tr>
    <th class="center" width="5%">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </th>
    <th width="15%">
        <a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=id&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("shipment_id");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="id") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a>
    </th>
    <th width="15%">
        <a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=order_id&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("order_id");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="order_id") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a>
    </th>
    <th width="15%">
        <a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=shipment_date&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("shipment_date");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="shipment_date") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a>
    </th>
    <th width="15%">
        <a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=order_date&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("order_date");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="order_date") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a>
    </th>
    <th width="40%">
        <a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=customer&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id="pagination_contents"><?php echo $_smarty_tpl->__("customer");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="customer") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a>
    </th>
    
    <th>&nbsp;</th>
</tr>
</thead>
<?php  $_smarty_tpl->tpl_vars['shipment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shipment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shipments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shipment']->key => $_smarty_tpl->tpl_vars['shipment']->value) {
$_smarty_tpl->tpl_vars['shipment']->_loop = true;
?>
<tr>
    <td class="center">
           <input type="checkbox" name="shipment_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipment']->value['shipment_id'], ENT_QUOTES, 'UTF-8');?>
" class=" cm-item" />
       </td>
    <td>
        <a class="underlined" href="<?php echo htmlspecialchars(fn_url("shipments.details?shipment_id=".((string)$_smarty_tpl->tpl_vars['shipment']->value['shipment_id'])), ENT_QUOTES, 'UTF-8');?>
"><span>#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipment']->value['shipment_id'], ENT_QUOTES, 'UTF-8');?>
</span></a>
    </td>
    <td>
        <a class="underlined" href="<?php echo htmlspecialchars(fn_url("orders.details?order_id=".((string)$_smarty_tpl->tpl_vars['shipment']->value['order_id'])), ENT_QUOTES, 'UTF-8');?>
"><span>#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipment']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
</span></a>
    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['shipment']->value['shipment_timestamp']) {
echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['shipment']->value['shipment_timestamp'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');
} else { ?>--<?php }?>
    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['shipment']->value['order_timestamp']) {
echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['shipment']->value['order_timestamp'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');
} else { ?>--<?php }?>
    </td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['shipment']->value['user_id']) {?><a href="<?php echo htmlspecialchars(fn_url("profiles.update?user_id=".((string)$_smarty_tpl->tpl_vars['shipment']->value['user_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['shipment']->value['s_lastname'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipment']->value['s_firstname'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['shipment']->value['user_id']) {?></a><?php }?>
    </td>
    
    <td class="nowrap">

        <div class="hidden-tools">
            <?php $_smarty_tpl->tpl_vars["return_current_url"] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shipments:list_extra_links")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shipments:list_extra_links"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("view"),'href'=>"shipments.details?shipment_id=".((string)$_smarty_tpl->tpl_vars['shipment']->value['shipment_id'])));?>
</li>
                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("print_slip"),'class'=>"cm-new-window",'href'=>"shipments.packing_slip?shipment_ids[]=".((string)$_smarty_tpl->tpl_vars['shipment']->value['shipment_id'])));?>
</li>
                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("print_pdf_packing_slip"),'class'=>"cm-new-window",'href'=>"shipments.packing_slip?shipment_ids[]=".((string)$_smarty_tpl->tpl_vars['shipment']->value['shipment_id'])."&format=pdf"));?>
</li>
                    <li class="divider"></li>
                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("delete"),'class'=>"cm-confirm cm-post",'href'=>"shipments.delete?shipment_ids[]=".((string)$_smarty_tpl->tpl_vars['shipment']->value['shipment_id'])."&redirect_url=".((string)$_smarty_tpl->tpl_vars['return_current_url']->value)));?>
</li>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shipments:list_extra_links"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

        </div>

    </td>
</tr>
<?php } ?>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</form>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"shipments:list_tools")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"shipments:list_tools"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php if ($_smarty_tpl->tpl_vars['shipments']->value) {?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("bulk_print_packing_slip"),'class'=>"cm-new-window",'dispatch'=>"dispatch[shipments.packing_slip]",'form'=>"manage_shipments_form"));?>
</li>
        <?php }?>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"shipments:list_tools"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <?php if ($_smarty_tpl->tpl_vars['shipments']->value) {?>
            <li class="divider"></li>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[shipments.m_delete]",'form'=>"manage_shipments_form"));?>
</li>
        <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php if (trim(Smarty::$_smarty_vars['capture']['tools_list'])) {?>
        <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sidebar", null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/saved_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"shipments.manage",'view_type'=>"shipments"), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("views/shipments/components/shipments_search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"shipments.manage"), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("title", null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->__("shipments");
if ($_REQUEST['order_id']) {?>&nbsp;(<?php echo $_smarty_tpl->__("order");?>
&nbsp;#<?php echo htmlspecialchars($_REQUEST['order_id'], ENT_QUOTES, 'UTF-8');?>
)<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>Smarty::$_smarty_vars['capture']['title'],'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar'],'buttons'=>Smarty::$_smarty_vars['capture']['buttons']), 0);?>
<?php }} ?>
