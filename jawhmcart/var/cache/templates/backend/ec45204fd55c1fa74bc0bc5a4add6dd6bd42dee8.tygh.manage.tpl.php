<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:20:06
         compiled from "/var/www/html/jawhmcart/design/backend/templates/views/statuses/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49490010156e67436162908-36253556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec45204fd55c1fa74bc0bc5a4add6dd6bd42dee8' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/views/statuses/manage.tpl',
      1 => 1457504415,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '49490010156e67436162908-36253556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'statuses' => 0,
    's' => 0,
    'type' => 0,
    'cur_href_delete' => 0,
    'runtime' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e67436596a63_68189132',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67436596a63_68189132')) {function content_56e67436596a63_68189132($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('editing_status','no_data','new_status','add_status'));
?>
<?php echo smarty_function_script(array('src'=>"js/tygh/tabs.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<div class="items-container" id="statuses_list">
<?php if ($_smarty_tpl->tpl_vars['statuses']->value) {?>
<table class="table table-middle table-objects">
<?php  $_smarty_tpl->tpl_vars["s"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["s"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['statuses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["s"]->key => $_smarty_tpl->tpl_vars["s"]->value) {
$_smarty_tpl->tpl_vars["s"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["s"]->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['s']->value['is_default']!=="Y") {?>
        <?php $_smarty_tpl->tpl_vars["cur_href_delete"] = new Smarty_variable("statuses.delete?status=".((string)$_smarty_tpl->tpl_vars['s']->value['status'])."&type=".((string)$_smarty_tpl->tpl_vars['type']->value), null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["cur_href_delete"] = new Smarty_variable('', null, 0);?>
    <?php }?>

    <?php $_smarty_tpl->_capture_stack[0][] = array("tool_items", null, null); ob_start(); ?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"statuses:list_extra_links")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"statuses:list_extra_links"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"statuses:list_extra_links"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

    <?php $_smarty_tpl->_capture_stack[0][] = array("extra_data", null, null); ob_start(); ?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"statuses:extra_data")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"statuses:extra_data"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"statuses:extra_data"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

    <?php ob_start();
echo $_smarty_tpl->__("editing_status");
$_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("common/object_group.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>mb_strtolower($_smarty_tpl->tpl_vars['s']->value['status'], 'UTF-8'),'text'=>$_smarty_tpl->tpl_vars['s']->value['description'],'href'=>"statuses.update?status=".((string)$_smarty_tpl->tpl_vars['s']->value['status'])."&type=".((string)$_smarty_tpl->tpl_vars['type']->value),'href_delete'=>$_smarty_tpl->tpl_vars['cur_href_delete']->value,'delete_target_id'=>"statuses_list",'header_text'=>$_tmp1.": ".((string)$_smarty_tpl->tpl_vars['s']->value['description']),'no_table'=>true,'nostatus'=>true,'tool_items'=>Smarty::$_smarty_vars['capture']['tool_items'],'extra_data'=>Smarty::$_smarty_vars['capture']['extra_data']), 0);?>


<?php } ?>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>
<!--statuses_list--></div>

<?php $_smarty_tpl->_capture_stack[0][] = array("adv_buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("add_new_picker", null, null); ob_start(); ?>
        <?php echo $_smarty_tpl->getSubTemplate ("views/statuses/update.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('status_data'=>array()), 0);?>

    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"statuses:button")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"statuses:button"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"statuses:button"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <?php if (!(fn_allowed_for("ULTIMATE")&&$_smarty_tpl->tpl_vars['runtime']->value['company_id'])) {?>
            <?php if ($_REQUEST['type']=='G') {?>
                <?php $_smarty_tpl->tpl_vars["icon"] = new Smarty_variable('', null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["icon"] = new Smarty_variable("icon-plus", null, 0);?>
            <?php }?>
            <li><?php echo $_smarty_tpl->getSubTemplate ("common/popupbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"add_new_status",'action'=>"statuses.add",'text'=>__("new_status"),'content'=>Smarty::$_smarty_vars['capture']['add_new_picker'],'link_text'=>__("add_status"),'act'=>"link"), 0);?>
</li>
        <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list'],'icon'=>"icon-plus",'no_caret'=>true,'placement'=>"right"));?>


    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"statuses:adv_buttons")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"statuses:adv_buttons"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"statuses:adv_buttons"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

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
<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->tpl_vars['title']->value,'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons'],'select_languages'=>true), 0);?>
<?php }} ?>
