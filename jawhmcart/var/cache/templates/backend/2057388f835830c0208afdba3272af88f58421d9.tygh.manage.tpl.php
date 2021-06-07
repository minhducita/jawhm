<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:31:05
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/orders/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35055228156e668b93fa909-38400687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2057388f835830c0208afdba3272af88f58421d9' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/orders/manage.tpl',
      1 => 1457504389,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '35055228156e668b93fa909-38400687',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'config' => 0,
    'search' => 0,
    'incompleted_view' => 0,
    'get_additional_statuses' => 0,
    'statuses' => 0,
    'orders' => 0,
    'order_status_descr' => 0,
    'c_url' => 0,
    'rev' => 0,
    'c_icon' => 0,
    'c_dummy' => 0,
    'o' => 0,
    'order_statuses_data' => 0,
    'notify_vendor' => 0,
    'extra_status' => 0,
    'order_statuses' => 0,
    'settings' => 0,
    'current_redirect_url' => 0,
    'total_pages' => 0,
    'display_totals' => 0,
    'totals' => 0,
    'page_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e668b9a60b23_46988984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e668b9a60b23_46988984')) {function content_56e668b9a60b23_46988984($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('text_admin_new_orders','incompleted_orders','orders','id','status','date','customer','phone','total','order','invoice','credit_memo','view','edit','delete','no_data','for_this_page_orders','gross_total','totally_paid','for_all_found_orders','gross_total','totally_paid','add_order','view_all_orders','incompleted_orders','bulk_print_invoice','bulk_print_pdf','bulk_print_packing_slip','view_purchased_products','export_selected'));
?>
<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<?php if ($_smarty_tpl->tpl_vars['runtime']->value['mode']=="new") {?>
    <p><?php echo $_smarty_tpl->__("text_admin_new_orders");?>
</p>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sidebar", null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/saved_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"orders.manage",'view_type'=>"orders"), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("views/orders/components/orders_search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"orders.manage"), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" target="_self" name="orders_list_form">

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('save_current_page'=>true,'save_current_url'=>true,'div_id'=>$_REQUEST['content_id']), 0);?>


<?php $_smarty_tpl->tpl_vars["c_url"] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['config']->value['current_url'],"sort_by","sort_order"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_icon"] = new Smarty_variable("<i class=\"exicon-".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])."\"></i>", null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_dummy"] = new Smarty_variable("<i class=\"exicon-dummy\"></i>", null, 0);?>

<?php $_smarty_tpl->tpl_vars["rev"] = new Smarty_variable((($tmp = @$_REQUEST['content_id'])===null||$tmp==='' ? "pagination_contents" : $tmp), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['incompleted_view']->value) {?>
    <?php $_smarty_tpl->tpl_vars["page_title"] = new Smarty_variable($_smarty_tpl->__("incompleted_orders"), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["get_additional_statuses"] = new Smarty_variable(true, null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["page_title"] = new Smarty_variable($_smarty_tpl->__("orders"), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["get_additional_statuses"] = new Smarty_variable(false, null, 0);?>
<?php }?>
<?php $_smarty_tpl->tpl_vars["order_status_descr"] = new Smarty_variable(fn_get_simple_statuses(@constant('STATUSES_ORDER'),$_smarty_tpl->tpl_vars['get_additional_statuses']->value,true), null, 0);?>
<?php $_smarty_tpl->tpl_vars["extra_status"] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?>
<?php $_smarty_tpl->tpl_vars['statuses'] = new Smarty_variable(array(), null, 0);?>
<?php $_smarty_tpl->tpl_vars["order_statuses"] = new Smarty_variable(fn_get_statuses(@constant('STATUSES_ORDER'),$_smarty_tpl->tpl_vars['statuses']->value,$_smarty_tpl->tpl_vars['get_additional_statuses']->value,true), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>
<table width="100%" class="table table-middle">
<thead>
<tr>
    <th  class="left">
    <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('check_statuses'=>$_smarty_tpl->tpl_vars['order_status_descr']->value), 0);?>

    </th>
    <th width="17%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=order_id&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("id");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="order_id") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="17%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=status&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("status");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="status") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="15%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=date&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("date");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="date") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="20%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=customer&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("customer");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="customer") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
}?></a></th>
    <th width="15%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=phone&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("phone");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="phone") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
}?></a></th>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:manage_header")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:manage_header"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:manage_header"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <th>&nbsp;</th>
    <th width="14%" class="right"><a class="cm-ajax<?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="total") {?> sort-link-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['sort_order_rev'], ENT_QUOTES, 'UTF-8');
}?>" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=total&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("total");?>
</a></th>

</tr>
</thead>
<?php  $_smarty_tpl->tpl_vars["o"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["o"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["o"]->key => $_smarty_tpl->tpl_vars["o"]->value) {
$_smarty_tpl->tpl_vars["o"]->_loop = true;
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:order_row")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:order_row"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<tr>
    <td class="left">
        <input type="checkbox" name="order_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-item cm-item-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['o']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
" /></td>
    <td>
        <a href="<?php echo htmlspecialchars(fn_url("orders.details?order_id=".((string)$_smarty_tpl->tpl_vars['o']->value['order_id'])), ENT_QUOTES, 'UTF-8');?>
" class="underlined"><?php echo $_smarty_tpl->__("order");?>
 #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
</a>
        <?php if ($_smarty_tpl->tpl_vars['order_statuses_data']->value[$_smarty_tpl->tpl_vars['o']->value['status']]['params']['appearance_type']=="I"&&$_smarty_tpl->tpl_vars['o']->value['invoice_id']) {?>
            <p class="small-note"><?php echo $_smarty_tpl->__("invoice");?>
 #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value['invoice_id'], ENT_QUOTES, 'UTF-8');?>
</p>
        <?php } elseif ($_smarty_tpl->tpl_vars['order_statuses_data']->value[$_smarty_tpl->tpl_vars['o']->value['status']]['params']['appearance_type']=="C"&&$_smarty_tpl->tpl_vars['o']->value['credit_memo_id']) {?>
            <p class="small-note"><?php echo $_smarty_tpl->__("credit_memo");?>
 #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value['credit_memo_id'], ENT_QUOTES, 'UTF-8');?>
</p>
        <?php }?>
        <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object'=>$_smarty_tpl->tpl_vars['o']->value), 0);?>

    </td>
    <td>
        <?php if (fn_allowed_for("MULTIVENDOR")) {?>
            <?php $_smarty_tpl->tpl_vars["notify_vendor"] = new Smarty_variable(true, null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["notify_vendor"] = new Smarty_variable(false, null, 0);?>
        <?php }?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/select_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('suffix'=>"o",'order_info'=>$_smarty_tpl->tpl_vars['o']->value,'id'=>$_smarty_tpl->tpl_vars['o']->value['order_id'],'status'=>$_smarty_tpl->tpl_vars['o']->value['status'],'items_status'=>$_smarty_tpl->tpl_vars['order_status_descr']->value,'update_controller'=>"orders",'notify'=>true,'notify_department'=>true,'notify_vendor'=>$_smarty_tpl->tpl_vars['notify_vendor']->value,'status_target_id'=>"orders_total,".((string)$_smarty_tpl->tpl_vars['rev']->value),'extra'=>"&return_url=".((string)$_smarty_tpl->tpl_vars['extra_status']->value),'statuses'=>$_smarty_tpl->tpl_vars['order_statuses']->value,'btn_meta'=>mb_strtolower("btn btn-info o-status-".((string)$_smarty_tpl->tpl_vars['o']->value['status'])." btn-small", 'UTF-8')), 0);?>

    </td>
    <td><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['o']->value['timestamp'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']).", ".((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['time_format'])), ENT_QUOTES, 'UTF-8');?>
</td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['o']->value['email']) {?><a href="mailto:<?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['o']->value['email']), ENT_QUOTES, 'UTF-8');?>
">@</a> <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['o']->value['user_id']) {?><a href="<?php echo htmlspecialchars(fn_url("profiles.update?user_id=".((string)$_smarty_tpl->tpl_vars['o']->value['user_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value['lastname'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value['firstname'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['o']->value['user_id']) {?></a><?php }?>
    </td>
    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value['phone'], ENT_QUOTES, 'UTF-8');?>
</td>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:manage_data")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:manage_data"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:manage_data"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <td width="5%" class="center">
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_items", null, null); ob_start(); ?>
            <li><?php ob_start();?><?php echo $_smarty_tpl->__("view");?>
<?php $_tmp1=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'href'=>"orders.details?order_id=".((string)$_smarty_tpl->tpl_vars['o']->value['order_id']),'text'=>$_tmp1));?>
</li>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:list_extra_links")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:list_extra_links"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li><?php ob_start();?><?php echo $_smarty_tpl->__("edit");?>
<?php $_tmp2=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'href'=>"order_management.edit?order_id=".((string)$_smarty_tpl->tpl_vars['o']->value['order_id']),'text'=>$_tmp2));?>
</li>
                <?php $_smarty_tpl->tpl_vars["current_redirect_url"] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?>
                <li><?php ob_start();?><?php echo $_smarty_tpl->__("delete");?>
<?php $_tmp3=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'href'=>"orders.delete?order_id=".((string)$_smarty_tpl->tpl_vars['o']->value['order_id'])."&redirect_url=".((string)$_smarty_tpl->tpl_vars['current_redirect_url']->value),'class'=>"cm-confirm cm-post",'text'=>$_tmp3));?>
</li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:list_extra_links"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <div class="hidden-tools">
            <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_items']));?>

        </div>
    </td>
    <td class="right">
        <?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['o']->value['total']), 0);?>

    </td>
</tr>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:order_row"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php } ?>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>
    <div class="statistic clearfix" id="orders_total">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:statistic_list")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:statistic_list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <table class="pull-right ">
            <?php if ($_smarty_tpl->tpl_vars['total_pages']->value>1&&$_smarty_tpl->tpl_vars['search']->value['page']!="full_list") {?>
                <tr>
                    <td>&nbsp;</td>
                    <td width="100px"><?php echo $_smarty_tpl->__("for_this_page_orders");?>
:</td>
                </tr>
                <tr>
                    <td><?php echo $_smarty_tpl->__("gross_total");?>
:</td>
                    <td><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['display_totals']->value['gross_total']), 0);?>
</td>
                </tr>
                <?php if (!$_smarty_tpl->tpl_vars['incompleted_view']->value) {?>
                    <tr>
                        <td><?php echo $_smarty_tpl->__("totally_paid");?>
:</td>
                        <td><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['display_totals']->value['totally_paid']), 0);?>
</td>
                    </tr>
                <?php }?>
                <hr />
                <tr>
                    <td><?php echo $_smarty_tpl->__("for_all_found_orders");?>
:</td>
                </tr>
            <?php }?>
            <tr>
                <td class="shift-right"><?php echo $_smarty_tpl->__("gross_total");?>
:</td>
                <td><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['totals']->value['gross_total']), 0);?>
</td>
            </tr>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:totals_stats")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:totals_stats"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php if (!$_smarty_tpl->tpl_vars['incompleted_view']->value) {?>
                    <tr>
                        <td class="shift-right"><h4><?php echo $_smarty_tpl->__("totally_paid");?>
:</h4></td>
                        <td class="price"><?php echo $_smarty_tpl->getSubTemplate ("common/price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['totals']->value['totally_paid']), 0);?>
</td>
                    </tr>
                <?php }?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:totals_stats"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </table>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:statistic_list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <!--orders_total--></div>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('div_id'=>$_REQUEST['content_id']), 0);?>



<?php $_smarty_tpl->_capture_stack[0][] = array("adv_buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:manage_tools")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:manage_tools"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tool_href'=>"order_management.new",'prefix'=>"bottom",'hide_tools'=>"true",'title'=>__("add_order"),'icon'=>"icon-plus"), 0);?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:manage_tools"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

</form>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("incomplete_button", null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['incompleted_view']->value) {?>
        <li><?php ob_start();?><?php echo $_smarty_tpl->__("view_all_orders");?>
<?php $_tmp4=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'href'=>"orders.manage",'text'=>$_tmp4));?>
</li>
    <?php } else { ?>
        <li><?php ob_start();?><?php echo $_smarty_tpl->__("incompleted_orders");?>
<?php $_tmp5=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'href'=>"orders.manage?skip_view=Y&status=".((string)@constant('STATUS_INCOMPLETED_ORDER')),'text'=>$_tmp5,'form'=>"orders_list_form"));?>
</li>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
        <?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>
            <li><?php ob_start();?><?php echo $_smarty_tpl->__("bulk_print_invoice");?>
<?php $_tmp6=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>$_tmp6,'dispatch'=>"dispatch[orders.bulk_print]",'form'=>"orders_list_form",'class'=>"cm-new-window"));?>
</li>
            <li><?php ob_start();
echo $_smarty_tpl->__("bulk_print_pdf");
$_tmp7=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>$_tmp7,'dispatch'=>"dispatch[orders.bulk_print..pdf]",'form'=>"orders_list_form"));?>
</li>            
            <li><?php ob_start();
echo $_smarty_tpl->__("bulk_print_packing_slip");
$_tmp8=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>$_tmp8,'dispatch'=>"dispatch[orders.packing_slip]",'form'=>"orders_list_form",'class'=>"cm-new-window"));?>
</li>
            <li><?php ob_start();?><?php echo $_smarty_tpl->__("view_purchased_products");?>
<?php $_tmp9=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>$_tmp9,'dispatch'=>"dispatch[orders.products_range]",'form'=>"orders_list_form"));?>
</li>
            
            <li class="divider"></li>
            <li><?php ob_start();?><?php echo $_smarty_tpl->__("export_selected");?>
<?php $_tmp10=ob_get_clean();?><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>$_tmp10,'dispatch'=>"dispatch[orders.export_range]",'form'=>"orders_list_form"));?>
</li>

            <?php echo Smarty::$_smarty_vars['capture']['incomplete_button'];?>


            <?php if ($_smarty_tpl->tpl_vars['orders']->value&&!$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
                <li class="divider"></li>
                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[orders.m_delete]",'form'=>"orders_list_form"));?>
</li>
            <?php }?>
        <?php } else { ?>
            <?php echo Smarty::$_smarty_vars['capture']['incomplete_button'];?>

        <?php }?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"orders:list_tools")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"orders:list_tools"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"orders:list_tools"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->tpl_vars['page_title']->value,'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar'],'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons'],'content_id'=>"manage_orders"), 0);?>

<?php }} ?>
