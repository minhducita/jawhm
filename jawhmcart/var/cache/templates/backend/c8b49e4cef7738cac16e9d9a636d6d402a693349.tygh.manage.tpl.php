<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:28
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/profiles/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142564867456e677d075e645-82642543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8b49e4cef7738cac16e9d9a636d6d402a693349' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/profiles/manage.tpl',
      1 => 1457504401,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '142564867456e677d075e645-82642543',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search' => 0,
    'runtime' => 0,
    'config' => 0,
    'users' => 0,
    'no_hide_input' => 0,
    'c_url' => 0,
    'rev' => 0,
    'c_icon' => 0,
    'c_dummy' => 0,
    'user' => 0,
    'allow_save' => 0,
    'auth' => 0,
    'settings' => 0,
    'list_extra_links' => 0,
    'user_edit_link' => 0,
    'return_current_url' => 0,
    'u_id' => 0,
    'popup_additional_class' => 0,
    'non_editable' => 0,
    'user_types' => 0,
    '_k' => 0,
    '_p' => 0,
    '_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677d0df9758_92141874',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677d0df9758_92141874')) {function content_56e677d0df9758_92141874($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('id','person_name','email','registered','type','status','view','administrator','vendor_administrator','customer','affiliate','view_all_orders','act_on_behalf','edit','delete','notify_user','no_data','export_selected','users','add_user'));
?>
<?php if (fn_allowed_for("MULTIVENDOR")) {?>
    <?php $_smarty_tpl->tpl_vars["no_hide_input"] = new Smarty_variable("cm-no-hide-input", null, 0);?>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("views/profiles/components/profiles_scripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<?php $_smarty_tpl->tpl_vars["c_icon"] = new Smarty_variable("<i class=\"exicon-".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])."\"></i>", null, 0);?>
<?php $_smarty_tpl->tpl_vars["c_dummy"] = new Smarty_variable("<i class=\"exicon-dummy\"></i>", null, 0);?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="userlist_form" id="userlist_form" class="<?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&!fn_allowed_for("ULTIMATE")) {?>cm-hide-inputs<?php }?>">
<input type="hidden" name="fake" value="1" />
<input type="hidden" name="user_type" value="<?php echo htmlspecialchars($_REQUEST['user_type'], ENT_QUOTES, 'UTF-8');?>
" />

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('save_current_page'=>true,'save_current_url'=>true,'div_id'=>$_REQUEST['content_id']), 0);?>


<?php $_smarty_tpl->tpl_vars["c_url"] = new Smarty_variable(fn_query_remove($_smarty_tpl->tpl_vars['config']->value['current_url'],"sort_by","sort_order"), null, 0);?>

<?php $_smarty_tpl->tpl_vars["rev"] = new Smarty_variable((($tmp = @$_REQUEST['content_id'])===null||$tmp==='' ? "pagination_contents" : $tmp), null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['users']->value) {?>
<table width="100%" class="table table-middle">
<thead>
<tr>
    <th width="1%" class="center <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['no_hide_input']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</th>
    <th width="3%" class="nowrap"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=id&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("id");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="id") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="18%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=name&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("person_name");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="name") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="20%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=email&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("email");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="email") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th width="16%"><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=date&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("registered");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="date") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <th><a class="cm-ajax" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['c_url']->value)."&sort_by=type&sort_order=".((string)$_smarty_tpl->tpl_vars['search']->value['sort_order_rev'])), ENT_QUOTES, 'UTF-8');?>
" data-ca-target-id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value, ENT_QUOTES, 'UTF-8');?>
><?php echo $_smarty_tpl->__("type");
if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="type") {
echo $_smarty_tpl->tpl_vars['c_icon']->value;
} else {
echo $_smarty_tpl->tpl_vars['c_dummy']->value;
}?></a></th>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"profiles:manage_header")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"profiles:manage_header"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"profiles:manage_header"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <th class="right">&nbsp;</th>
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
<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>

<?php $_smarty_tpl->tpl_vars["allow_save"] = new Smarty_variable(fn_allow_save_object($_smarty_tpl->tpl_vars['user']->value,"users"), null, 0);?>

<?php if (!$_smarty_tpl->tpl_vars['allow_save']->value&&!defined("RESTRICTED_ADMIN")&&$_smarty_tpl->tpl_vars['auth']->value['is_root']!='Y') {?>
    <?php $_smarty_tpl->tpl_vars["link_text"] = new Smarty_variable($_smarty_tpl->__("view"), null, 0);?>
    <?php $_smarty_tpl->tpl_vars["popup_additional_class"] = new Smarty_variable('', null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['allow_save']->value||defined("RESTRICTED_ADMIN")||$_smarty_tpl->tpl_vars['auth']->value['is_root']=='Y') {?>
    <?php $_smarty_tpl->tpl_vars["link_text"] = new Smarty_variable('', null, 0);?>
    <?php $_smarty_tpl->tpl_vars["popup_additional_class"] = new Smarty_variable("cm-no-hide-input", null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["popup_additional_class"] = new Smarty_variable('', null, 0);?>
    <?php $_smarty_tpl->tpl_vars["link_text"] = new Smarty_variable('', null, 0);?>
<?php }?>
<?php if (!fn_allowed_for("ULTIMATE")) {?>
    <tr class="cm-row-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['user']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
<?php }?>

<?php if (fn_allowed_for("ULTIMATE")) {?>
    <tr class="cm-row-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['user']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');
if (!$_smarty_tpl->tpl_vars['allow_save']->value||($_smarty_tpl->tpl_vars['user']->value['user_id']==$_SESSION['auth']['user_id'])) {?> cm-hide-inputs<?php }?>">
<?php }?>
    <td class="center <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['no_hide_input']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="checkbox" name="user_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
" class="checkbox cm-item" /></td>
    <td><a class="row-status" href="<?php echo htmlspecialchars(fn_url("profiles.update?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value['user_id'])."&user_type=".((string)$_smarty_tpl->tpl_vars['user']->value['user_type'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
</a></td>
    <td class="row-status"><?php if ($_smarty_tpl->tpl_vars['user']->value['firstname']||$_smarty_tpl->tpl_vars['user']->value['lastname']) {?><a href="<?php echo htmlspecialchars(fn_url("profiles.update?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value['user_id'])."&user_type=".((string)$_smarty_tpl->tpl_vars['user']->value['user_type'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['lastname'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['firstname'], ENT_QUOTES, 'UTF-8');?>
</a><?php } else { ?>-<?php }
if ($_smarty_tpl->tpl_vars['user']->value['company_id']) {
echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object'=>$_smarty_tpl->tpl_vars['user']->value), 0);
}?></td>
    <td><a class="row-status" href="mailto:<?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['user']->value['email']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8');?>
</a></td>
    <td class="row-status"><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['timestamp'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']).", ".((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['time_format'])), ENT_QUOTES, 'UTF-8');?>
</td>
    <td class="row-status"><?php if ($_smarty_tpl->tpl_vars['user']->value['user_type']=="A") {
echo $_smarty_tpl->__("administrator");
} elseif ($_smarty_tpl->tpl_vars['user']->value['user_type']=="V") {
echo $_smarty_tpl->__("vendor_administrator");
} elseif ($_smarty_tpl->tpl_vars['user']->value['user_type']=="C") {
echo $_smarty_tpl->__("customer");
} elseif ($_smarty_tpl->tpl_vars['user']->value['user_type']=="P") {
echo $_smarty_tpl->__("affiliate");
}?></td>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"profiles:manage_data")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"profiles:manage_data"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"profiles:manage_data"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <td class="right nowrap">
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <?php $_smarty_tpl->tpl_vars['list_extra_links'] = new Smarty_variable(false, null, 0);?>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"profiles:list_extra_links")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"profiles:list_extra_links"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <?php if ($_smarty_tpl->tpl_vars['user']->value['user_type']=="C") {?>
                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("view_all_orders"),'href'=>"orders.manage?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value['user_id'])));?>
</li>
                    <?php $_smarty_tpl->tpl_vars['list_extra_links'] = new Smarty_variable(true, null, 0);?>
                <?php }?>
                <?php if (fn_user_need_login($_smarty_tpl->tpl_vars['user']->value['user_type'])&&(!$_smarty_tpl->tpl_vars['runtime']->value['company_id']||$_smarty_tpl->tpl_vars['runtime']->value['company_id']==$_smarty_tpl->tpl_vars['auth']->value['company_id']&&fn_check_permission_act_as_user())&&$_smarty_tpl->tpl_vars['user']->value['user_id']!=$_smarty_tpl->tpl_vars['auth']->value['user_id']&&!($_smarty_tpl->tpl_vars['user']->value['user_type']==$_smarty_tpl->tpl_vars['auth']->value['user_type']&&$_smarty_tpl->tpl_vars['user']->value['is_root']=='Y'&&(!$_smarty_tpl->tpl_vars['user']->value['company_id']||$_smarty_tpl->tpl_vars['user']->value['company_id']==$_smarty_tpl->tpl_vars['auth']->value['company_id']))) {?>
                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'target'=>"_blank",'text'=>__("act_on_behalf"),'href'=>"profiles.act_as_user?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value['user_id'])));?>
</li>
                    <?php $_smarty_tpl->tpl_vars['list_extra_links'] = new Smarty_variable(true, null, 0);?>
                <?php }?>
                <?php $_smarty_tpl->tpl_vars["return_current_url"] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['config']->value['current_url']), null, 0);?>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"profiles:list_extra_links"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php if ($_smarty_tpl->tpl_vars['list_extra_links']->value) {?>
                <li class="divider"></li>
            <?php }?>

            <?php if ($_REQUEST['user_type']) {?>
                <?php $_smarty_tpl->tpl_vars["user_edit_link"] = new Smarty_variable("profiles.update?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value['user_id'])."&user_type=".((string)$_REQUEST['user_type']), null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["user_edit_link"] = new Smarty_variable("profiles.update?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value['user_id'])."&user_type=".((string)$_smarty_tpl->tpl_vars['user']->value['user_type']), null, 0);?>
            <?php }?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("edit"),'href'=>$_smarty_tpl->tpl_vars['user_edit_link']->value));?>
</li>

            <?php $_smarty_tpl->_capture_stack[0][] = array("tools_delete", null, null); ob_start(); ?>
                <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("delete"),'class'=>"cm-confirm cm-post",'href'=>"profiles.delete?user_id=".((string)$_smarty_tpl->tpl_vars['user']->value['user_id'])."&redirect_url=".((string)$_smarty_tpl->tpl_vars['return_current_url']->value)));?>
</li>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php if ($_smarty_tpl->tpl_vars['user']->value['user_id']!=$_SESSION['auth']['user_id']) {?>
                <?php if (!$_smarty_tpl->tpl_vars['runtime']->value['company_id']&&!($_smarty_tpl->tpl_vars['user']->value['user_type']=="A"&&$_smarty_tpl->tpl_vars['user']->value['is_root']=="Y")) {?>
                    <?php echo Smarty::$_smarty_vars['capture']['tools_delete'];?>

                <?php } elseif ($_smarty_tpl->tpl_vars['allow_save']->value) {?>
                    <?php if (fn_allowed_for("MULTIVENDOR")&&$_smarty_tpl->tpl_vars['user']->value['user_type']=="V"&&$_smarty_tpl->tpl_vars['user']->value['is_root']=="N") {?>
                        <?php echo Smarty::$_smarty_vars['capture']['tools_delete'];?>

                    <?php }?>

                    <?php if (fn_allowed_for("ULTIMATE")) {?>
                        <?php echo Smarty::$_smarty_vars['capture']['tools_delete'];?>

                    <?php }?>
                <?php }?>
            <?php }?>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <div class="hidden-tools">
            <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

        </div>
    </td>
    <td class="right">
        <input type="hidden" name="user_types[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['user_id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['user_type'], ENT_QUOTES, 'UTF-8');?>
" />
        <?php if ($_smarty_tpl->tpl_vars['user']->value['is_root']=="Y"&&($_smarty_tpl->tpl_vars['user']->value['user_type']=="A"||$_smarty_tpl->tpl_vars['user']->value['user_type']=="V"&&$_smarty_tpl->tpl_vars['runtime']->value['company_id']&&$_smarty_tpl->tpl_vars['runtime']->value['company_id']==$_smarty_tpl->tpl_vars['user']->value['company_id'])) {?>
            <?php $_smarty_tpl->tpl_vars["u_id"] = new Smarty_variable('', null, 0);?>           
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["u_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value['user_id'], null, 0);?>
        <?php }?>

        <?php $_smarty_tpl->tpl_vars["non_editable"] = new Smarty_variable(false, null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['user']->value['is_root']=="Y"&&$_smarty_tpl->tpl_vars['user']->value['user_type']==$_smarty_tpl->tpl_vars['auth']->value['user_type']&&(!$_smarty_tpl->tpl_vars['user']->value['company_id']||$_smarty_tpl->tpl_vars['user']->value['company_id']==$_smarty_tpl->tpl_vars['auth']->value['company_id'])||$_smarty_tpl->tpl_vars['user']->value['user_id']==$_smarty_tpl->tpl_vars['auth']->value['user_id']||(fn_allowed_for("MULTIVENDOR")&&$_smarty_tpl->tpl_vars['runtime']->value['company_id']&&($_smarty_tpl->tpl_vars['user']->value['user_type']=='C'||$_smarty_tpl->tpl_vars['user']->value['company_id']&&$_smarty_tpl->tpl_vars['user']->value['company_id']!=$_smarty_tpl->tpl_vars['runtime']->value['company_id']))) {?>
            <?php $_smarty_tpl->tpl_vars["non_editable"] = new Smarty_variable(true, null, 0);?>
        <?php }?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/select_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['u_id']->value,'status'=>$_smarty_tpl->tpl_vars['user']->value['status'],'hidden'=>'','update_controller'=>"profiles",'notify'=>true,'notify_text'=>__("notify_user"),'popup_additional_class'=>((string)$_smarty_tpl->tpl_vars['popup_additional_class']->value)." dropleft",'non_editable'=>$_smarty_tpl->tpl_vars['non_editable']->value), 0);?>

    </td>
</tr>
<?php } ?>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('div_id'=>$_REQUEST['content_id']), 0);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['users']->value) {?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <?php if (fn_allowed_for("ULTIMATE")||!$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"profiles:list_tools")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"profiles:list_tools"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("export_selected"),'dispatch'=>"dispatch[profiles.export_range]",'form'=>"userlist_form"));?>
</li>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"profiles:list_tools"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php }?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[profiles.m_delete]",'form'=>"userlist_form"));?>
</li>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

    <?php }?>
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

<?php $_smarty_tpl->_capture_stack[0][] = array("adv_buttons", null, null); ob_start(); ?>
    <?php if ($_REQUEST['user_type']) {?>
        <?php $_smarty_tpl->tpl_vars["_title"] = new Smarty_variable(fn_get_user_type_description($_REQUEST['user_type'],true), null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["_title"] = new Smarty_variable($_smarty_tpl->__("users"), null, 0);?>
    <?php }?>

    <?php if ($_REQUEST['user_type']) {?>
        <?php if (!($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&fn_allowed_for("MULTIVENDOR")&&($_REQUEST['user_type']=='C'||$_smarty_tpl->tpl_vars['auth']->value['is_root']!='Y'))) {?>
            <a class="btn cm-tooltip" href="<?php echo htmlspecialchars(fn_url("profiles.add?user_type=".((string)$_REQUEST['user_type'])), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("add_user");?>
"><i class="icon-plus"></i></a>
        <?php }?>
    <?php } else { ?>
        <?php if (!empty($_smarty_tpl->tpl_vars['user_types']->value)) {?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
                <?php  $_smarty_tpl->tpl_vars["_p"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["_p"]->_loop = false;
 $_smarty_tpl->tpl_vars["_k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['user_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["_p"]->key => $_smarty_tpl->tpl_vars["_p"]->value) {
$_smarty_tpl->tpl_vars["_p"]->_loop = true;
 $_smarty_tpl->tpl_vars["_k"]->value = $_smarty_tpl->tpl_vars["_p"]->key;
?>
                    <?php if (!($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&fn_allowed_for("MULTIVENDOR")&&($_REQUEST['user_type']=='C'||$_smarty_tpl->tpl_vars['auth']->value['is_root']!='Y'))) {?>
                        <li><a href="<?php echo htmlspecialchars(fn_url("profiles.add?user_type=".((string)$_smarty_tpl->tpl_vars['_k']->value)), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['_p']->value);?>
</a></li>
                    <?php }?>
                <?php } ?>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list'],'no_caret'=>true,'icon'=>"icon-plus",'placement'=>"right"));?>

        <?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sidebar", null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->getSubTemplate ("common/saved_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"profiles.manage",'view_type'=>"users"), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("views/profiles/components/users_search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"profiles.manage"), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->tpl_vars['_title']->value,'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons'],'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'content_id'=>"manage_users"), 0);?>
<?php }} ?>
