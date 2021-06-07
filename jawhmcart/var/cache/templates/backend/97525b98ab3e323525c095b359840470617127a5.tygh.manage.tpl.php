<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:37:32
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/subscribers/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140378750056e6784cf33530-25650437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97525b98ab3e323525c095b359840470617127a5' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/newsletters/views/subscribers/manage.tpl',
      1 => 1457504567,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '140378750056e6784cf33530-25650437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subscribers' => 0,
    's' => 0,
    'languages' => 0,
    'lng' => 0,
    'settings' => 0,
    'count' => 0,
    'mailing_lists' => 0,
    'list' => 0,
    'list_id' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6784d362641_43082848',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6784d362641_43082848')) {function content_56e6784d362641_43082848($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('email','language','registered','expand_collapse_list','expand_collapse_list','expand_collapse_list','expand_collapse_list','subscribed_to','delete','mailing_list','subscribed','confirmed','no_data','no_data','general','email','language','new_subscribers','add_subscriber','ne_add_subscribers_from_users','subscribers'));
?>
<?php echo smarty_function_script(array('src'=>"js/tygh/tabs.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="subscribers_form">
<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('save_current_page'=>true,'save_current_url'=>true), 0);?>

<?php if ($_smarty_tpl->tpl_vars['subscribers']->value) {?>
<table width="100%" class="table table-middle">
<thead>
<tr>
    <th width="1%">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</th>
    <th><?php echo $_smarty_tpl->__("email");?>
</th>
    <th><?php echo $_smarty_tpl->__("language");?>
</th>
    <th><?php echo $_smarty_tpl->__("registered");?>
</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>
</thead>
<?php  $_smarty_tpl->tpl_vars["s"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["s"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subscribers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["s"]->key => $_smarty_tpl->tpl_vars["s"]->value) {
$_smarty_tpl->tpl_vars["s"]->_loop = true;
?>
<tbody>
<tr>
    <td>
           <input type="checkbox" name="subscriber_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-item" /></td>
    <td><input type="hidden" name="subscribers[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
][email]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['email'], ENT_QUOTES, 'UTF-8');?>
" />
        <span name="plus_minus" id="on_subscribers_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" title="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" class="hand cm-combination-subscribers"><span class="exicon-expand"> </span></span><span name="minus_plus" id="off_subscribers_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" title="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" class="hand hidden cm-combination-subscribers"><span class="exicon-collapse"> </span></span><a href="mailto:<?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['s']->value['email']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['email'], ENT_QUOTES, 'UTF-8');?>
</a>
    </td>
    <td>
        <select class="span2" name="subscribers[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
][lang_code]">
        <?php  $_smarty_tpl->tpl_vars['lng'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lng']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lng']->key => $_smarty_tpl->tpl_vars['lng']->value) {
$_smarty_tpl->tpl_vars['lng']->_loop = true;
?>
        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lng']->value['lang_code'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['s']->value['lang_code']==$_smarty_tpl->tpl_vars['lng']->value['lang_code']) {?>selected="selected"<?php }?> ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lng']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
        <?php } ?>
        </select>
    </td>
    <td>
        <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['s']->value['timestamp'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']).", ".((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['time_format'])), ENT_QUOTES, 'UTF-8');?>
,&nbsp;<?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['s']->value['mailing_lists']), null, 0);
echo $_smarty_tpl->__("subscribed_to",array("[num]"=>$_smarty_tpl->tpl_vars['count']->value));?>

    </td>
    <td class="center nowrap">
        &nbsp;
    </td>
    <td class="nowrap right">
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'class'=>"cm-confirm cm-post",'text'=>__("delete"),'href'=>"subscribers.delete?subscriber_id=".((string)$_smarty_tpl->tpl_vars['s']->value['subscriber_id'])));?>
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
</tr>
<tr id="subscribers_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
" class="hidden no-hover row-more">
    <td>&nbsp;</td>
    <td colspan="5" class="row-more-body row-gray">
        <?php if ($_smarty_tpl->tpl_vars['mailing_lists']->value) {?>
        <table class="table table-condensed">
        <thead>
        <tr>
            <th><?php echo $_smarty_tpl->__("mailing_list");?>
</th>
            <th class="center"><?php echo $_smarty_tpl->__("subscribed");?>
</th>
            <th class="center"><?php echo $_smarty_tpl->__("confirmed");?>
</th>
        </tr>
        </thead>
        <?php  $_smarty_tpl->tpl_vars["list"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["list"]->_loop = false;
 $_smarty_tpl->tpl_vars["list_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mailing_lists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["list"]->key => $_smarty_tpl->tpl_vars["list"]->value) {
$_smarty_tpl->tpl_vars["list"]->_loop = true;
 $_smarty_tpl->tpl_vars["list_id"]->value = $_smarty_tpl->tpl_vars["list"]->key;
?>
            <tr>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['list']->value['object'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td class="center">
                    <input type="checkbox" name="subscribers[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
][list_ids][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['list_id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['s']->value['mailing_lists'][$_smarty_tpl->tpl_vars['list_id']->value]) {?>checked="checked"<?php }?> class="checkbox cm-item-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"></td>
                <td class="center">
                    <input type="hidden" name="subscribers[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
][mailing_lists][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['list_id']->value, ENT_QUOTES, 'UTF-8');?>
][confirmed]" value="<?php if ($_smarty_tpl->tpl_vars['list']->value['register_autoresponder']) {?>0<?php } else { ?>1<?php }?>" />
                    <input type="checkbox" name="subscribers[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s']->value['subscriber_id'], ENT_QUOTES, 'UTF-8');?>
][mailing_lists][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['list_id']->value, ENT_QUOTES, 'UTF-8');?>
][confirmed]" value="1" <?php if ($_smarty_tpl->tpl_vars['s']->value['mailing_lists'][$_smarty_tpl->tpl_vars['list_id']->value]['confirmed']||!$_smarty_tpl->tpl_vars['list']->value['register_autoresponder']) {?>checked="checked"<?php }?> class="checkbox" <?php if (!$_smarty_tpl->tpl_vars['list']->value['register_autoresponder']) {?>disabled="disabled"<?php }?> />
                </td>
            </tr>
        <?php } ?>
        </table>
        <?php } else { ?>
            <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
        <?php }?>
    </td>
</tr>
</tbody>
<?php } ?>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</form>

<?php $_smarty_tpl->_capture_stack[0][] = array("add_new_picker", null, null); ob_start(); ?>

    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="subscribers_form_0" class="form-horizontal form-edit ">
    <input type="hidden" name="subscriber_id" value="0" />
    <input type="hidden" name="subscriber_data[list_ids][]" value="<?php echo htmlspecialchars($_REQUEST['list_id'], ENT_QUOTES, 'UTF-8');?>
" />
    <div class="tabs cm-j-tabs">
        <ul class="nav nav-tabs">
            <li id="tab_mailing_list_details_0" class="cm-js active"><a><?php echo $_smarty_tpl->__("general");?>
</a></li>
        </ul>
    </div>

    <div class="cm-tabs-content" id="content_tab_mailing_list_details_0">
    <fieldset>
        <div class="control-group">
            <label for="subscribers_email_0" class="control-label cm-required cm-email"><?php echo $_smarty_tpl->__("email");?>
</label>
            <div class="controls">
            <input type="text" name="subscriber_data[email]" id="subscribers_email_0" value="" class="span6" />
            </div>
        </div>

        <div class="control-group">
            <label for="elm_lang_0" class="cm-required control-label"><?php echo $_smarty_tpl->__("language");?>
</label>
            <div class="controls">
            <select id="elm_lang_0" name="subscriber_data[lang_code]">
                <?php  $_smarty_tpl->tpl_vars["lng"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["lng"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["lng"]->key => $_smarty_tpl->tpl_vars["lng"]->value) {
$_smarty_tpl->tpl_vars["lng"]->_loop = true;
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lng']->value['lang_code'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lng']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
                <?php } ?>
            </select>
            </div>
        </div>

    </fieldset>
    </div>

    <div class="buttons-container">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[subscribers.update]",'cancel_action'=>"close"), 0);?>

    </div>

    </form>
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

<?php $_smarty_tpl->_capture_stack[0][] = array("adv_buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
        <li><?php echo $_smarty_tpl->getSubTemplate ("common/popupbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"add_new_subscribers",'text'=>__("new_subscribers"),'content'=>Smarty::$_smarty_vars['capture']['add_new_picker'],'link_text'=>__("add_subscriber"),'act'=>"link"), 0);?>
</li>
        <li><?php echo $_smarty_tpl->getSubTemplate ("pickers/users/picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data_id'=>"subscr_user",'picker_for'=>"subscribers",'extra_var'=>"subscribers.add_users?list_id=".((string)$_REQUEST['list_id']),'but_text'=>__("ne_add_subscribers_from_users"),'view_mode'=>"button",'no_container'=>true), 0);?>
</li>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list'],'icon'=>"icon-plus",'no_caret'=>true,'placement'=>"right"));?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['subscribers']->value) {?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[subscribers.m_delete]",'form'=>"subscribers_form"));?>
</li>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>


        <?php echo $_smarty_tpl->getSubTemplate ("buttons/save.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[subscribers.m_update]",'but_role'=>"submit-link",'but_target_form'=>"subscribers_form"), 0);?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("sidebar", null, null); ob_start(); ?>
    <?php echo $_smarty_tpl->getSubTemplate ("addons/newsletters/views/subscribers/components/subscribers_search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"subscribers.manage"), 0);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("subscribers"),'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons'],'sidebar'=>Smarty::$_smarty_vars['capture']['sidebar'],'select_languages'=>true), 0);?>

<?php }} ?>
