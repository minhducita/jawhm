<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:54
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/mailing_lists/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213493892956e677ead0a168-59146729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c12bd3993ef85b67d4ec169bb53755eea7f23b14' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/mailing_lists/manage.tpl',
      1 => 1457504564,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '213493892956e677ead0a168-59146729',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mailing_lists' => 0,
    'mailing_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677eaeb6d66_58708056',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677eaeb6d66_58708056')) {function content_56e677eaeb6d66_58708056($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('name','subscribers_num','status','manage_subscribers','subscribers_num','editing_mailing_list','no_data','new_mailing_lists','add_mailing_lists','mailing_lists'));
?>
<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<div class="items-container" id="mailing_lists">
<?php if ($_smarty_tpl->tpl_vars['mailing_lists']->value) {?>
<table width="100%" class="table table-middle">
    <thead>
        <tr>
            <th><?php echo $_smarty_tpl->__("name");?>
</th>
            <th><?php echo $_smarty_tpl->__("subscribers_num");?>
</th>
            <th width="5%">&nbsp;</th>
            <th width="15%" class="right"><?php echo $_smarty_tpl->__("status");?>
</th>
        </tr>
    </thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars["mailing_list"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["mailing_list"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mailing_lists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["mailing_list"]->key => $_smarty_tpl->tpl_vars["mailing_list"]->value) {
$_smarty_tpl->tpl_vars["mailing_list"]->_loop = true;
?>

    <?php $_smarty_tpl->_capture_stack[0][] = array("tool_items", null, null); ob_start(); ?>
        <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("manage_subscribers"),'href'=>"subscribers.manage?list_id=".((string)$_smarty_tpl->tpl_vars['mailing_list']->value['list_id'])));?>
</li>
        <li class="divider"></li>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

    <?php ob_start();
echo $_smarty_tpl->__("subscribers_num");
$_tmp1=ob_get_clean();?><?php ob_start();
echo $_smarty_tpl->__("editing_mailing_list");
$_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("common/object_group.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('no_table'=>true,'id'=>$_smarty_tpl->tpl_vars['mailing_list']->value['list_id'],'text'=>$_smarty_tpl->tpl_vars['mailing_list']->value['object'],'status'=>$_smarty_tpl->tpl_vars['mailing_list']->value['status'],'hidden'=>true,'href'=>"mailing_lists.update?list_id=".((string)$_smarty_tpl->tpl_vars['mailing_list']->value['list_id']),'details'=>$_tmp1.": ".((string)$_smarty_tpl->tpl_vars['mailing_list']->value['subscribers_num']),'object_id_name'=>"list_id",'table'=>"mailing_lists",'href_delete'=>"mailing_lists.delete?list_id=".((string)$_smarty_tpl->tpl_vars['mailing_list']->value['list_id']),'delete_target_id'=>"mailing_lists",'header_text'=>$_tmp2.": ".((string)$_smarty_tpl->tpl_vars['mailing_list']->value['object']),'tool_items'=>Smarty::$_smarty_vars['capture']['tool_items']), 0);?>


<?php } ?>
</tbody>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>
<!--mailing_lists--></div>

    <?php $_smarty_tpl->_capture_stack[0][] = array("adv_buttons", null, null); ob_start(); ?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("add_new_picker", null, null); ob_start(); ?>
            <?php echo $_smarty_tpl->getSubTemplate ("addons/newsletters/views/mailing_lists/update.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('mailing_list'=>array()), 0);?>

        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/popupbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"add_new_mailing_lists",'text'=>__("new_mailing_lists"),'content'=>Smarty::$_smarty_vars['capture']['add_new_picker'],'title'=>__("add_mailing_lists"),'act'=>"general",'icon'=>"icon-plus"), 0);?>

    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("mailing_lists"),'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons'],'select_languages'=>true), 0);?>

<?php }} ?>
