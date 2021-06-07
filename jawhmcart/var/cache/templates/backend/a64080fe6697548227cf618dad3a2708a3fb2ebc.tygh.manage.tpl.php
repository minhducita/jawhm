<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:32
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/newsletters/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157396562256e677d447a1b0-52622792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a64080fe6697548227cf618dad3a2708a3fb2ebc' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/newsletters/manage.tpl',
      1 => 1457504565,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '157396562256e677d447a1b0-52622792',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'newsletter_type' => 0,
    'newsletters' => 0,
    'newsletter' => 0,
    'settings' => 0,
    'object_names' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677d47313d0_91326408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677d47313d0_91326408')) {function content_56e677d47313d0_91326408($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('newsletters','newsletter_templates','newsletter_autoresponders','subject','mailing_lists','date','status','edit','delete','no_data','add_newsletter','add_template','add_autoresponder'));
?>
<?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
    <?php $_smarty_tpl->tpl_vars["object_names"] = new Smarty_variable($_smarty_tpl->__("newsletters"), null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_TEMPLATE')) {?>
    <?php $_smarty_tpl->tpl_vars["object_names"] = new Smarty_variable($_smarty_tpl->__("newsletter_templates"), null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_AUTORESPONDER')) {?>
    <?php $_smarty_tpl->tpl_vars["object_names"] = new Smarty_variable($_smarty_tpl->__("newsletter_autoresponders"), null, 0);?>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="newsletters_form" enctype="multipart/form-data">
<input type="hidden" name="fake" value="1" />
<input type="hidden" name="newsletter_type" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter_type']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('save_current_page'=>true,'save_current_url'=>true), 0);?>


<?php if ($_smarty_tpl->tpl_vars['newsletters']->value) {?>
<table width="100%" class="table table-middle">
<thead>
<tr>
    <th width="1%">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</th>
    <th width="40%"><?php echo $_smarty_tpl->__("subject");?>
</th>
    <?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
    <th><?php echo $_smarty_tpl->__("mailing_lists");?>
</th>
    <th><?php echo $_smarty_tpl->__("date");?>
</th>
    <?php }?>
    <th>&nbsp;</th>
    <th class="right"><?php echo $_smarty_tpl->__("status");?>
</th>
</tr>
</thead>
<?php  $_smarty_tpl->tpl_vars['newsletter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsletter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newsletters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsletter']->key => $_smarty_tpl->tpl_vars['newsletter']->value) {
$_smarty_tpl->tpl_vars['newsletter']->_loop = true;
?>
<tbody>
<tr class="cm-row-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['newsletter']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
    <td class="left">
        <input type="checkbox" name="newsletter_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['newsletter_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-item" /></td>
    <td>
        <a class="row-status" href="<?php echo htmlspecialchars(fn_url("newsletters.update?newsletter_id=".((string)$_smarty_tpl->tpl_vars['newsletter']->value['newsletter_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['newsletter'], ENT_QUOTES, 'UTF-8');?>
</a>
    </td>
    <?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
        <td>
            <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['newsletter']->value['mailing_list_names'])===null||$tmp==='' ? " - " : $tmp), ENT_QUOTES, 'UTF-8');?>

        </td>
        <td class="nowrap">
            <?php if ($_smarty_tpl->tpl_vars['newsletter']->value['sent_date']) {?>
                <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['newsletter']->value['sent_date'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']).", ".((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['time_format'])), ENT_QUOTES, 'UTF-8');?>

            <?php } else { ?>
            &nbsp;-&nbsp;
            <?php }?>
        </td>
    <?php }?>

    <td class="nowrap right">
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("edit"),'href'=>"newsletters.update?newsletter_id=".((string)$_smarty_tpl->tpl_vars['newsletter']->value['newsletter_id'])));?>
</li>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'class'=>"cm-confirm cm-post",'text'=>__("delete"),'href'=>"newsletters.delete?newsletter_id=".((string)$_smarty_tpl->tpl_vars['newsletter']->value['newsletter_id'])));?>
</li>
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
    <td class="right" width="10%">
        <?php echo $_smarty_tpl->getSubTemplate ("common/select_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['newsletter']->value['newsletter_id'],'status'=>$_smarty_tpl->tpl_vars['newsletter']->value['status'],'items_status'=>fn_get_predefined_statuses("newsletters"),'object_id_name'=>"newsletter_id",'table'=>"newsletters",'popup_additional_class'=>"dropleft"), 0);?>

    </td>
</tr>
<?php } ?>
</tbody>
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
        <?php if ($_smarty_tpl->tpl_vars['newsletters']->value) {?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[newsletters.m_delete]",'form'=>"newsletters_form"));?>
</li>
        <?php }?>
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

<?php $_smarty_tpl->_capture_stack[0][] = array("adv_buttons", null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_NEWSLETTER')) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tool_href'=>"newsletters.add?type=".((string)@constant('NEWSLETTER_TYPE_NEWSLETTER')),'prefix'=>"top",'hide_tools'=>"true",'title'=>__("add_newsletter")), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_TEMPLATE')) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tool_href'=>"newsletters.add?type=".((string)@constant('NEWSLETTER_TYPE_TEMPLATE')),'prefix'=>"top",'hide_tools'=>"true",'title'=>__("add_template")), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['newsletter_type']->value==@constant('NEWSLETTER_TYPE_AUTORESPONDER')) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tool_href'=>"newsletters.add?type=".((string)@constant('NEWSLETTER_TYPE_AUTORESPONDER')),'prefix'=>"top",'hide_tools'=>"true",'title'=>__("add_autoresponder")), 0);?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->tpl_vars['object_names']->value,'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'select_languages'=>true,'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons']), 0);?>
<?php }} ?>
