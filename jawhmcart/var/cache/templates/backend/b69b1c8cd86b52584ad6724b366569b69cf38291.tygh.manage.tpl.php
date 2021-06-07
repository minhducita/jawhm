<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:36:41
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/banners/views/banners/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63862783556e678196d10d0-56570983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b69b1c8cd86b52584ad6724b366569b69cf38291' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/banners/views/banners/manage.tpl',
      1 => 1457504512,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '63862783556e678196d10d0-56570983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'banners' => 0,
    'banner' => 0,
    'allow_save' => 0,
    'no_hide_input' => 0,
    'addons' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e67819a74740_25395090',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e67819a74740_25395090')) {function content_56e67819a74740_25395090($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('banner','type','status','graphic_banner','text_banner','edit','delete','no_data','banners_statistics','add_banner','banners'));
?>


<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="banners_form" class=" cm-hide-inputs" enctype="multipart/form-data">
<input type="hidden" name="fake" value="1" />

<?php if ($_smarty_tpl->tpl_vars['banners']->value) {?>
<table class="table table-middle">
<thead>
<tr>
    <th width="1%" class="left">
        <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('class'=>"cm-no-hide-input"), 0);?>
</th>
    <th><?php echo $_smarty_tpl->__("banner");?>
</th>
    <th><?php echo $_smarty_tpl->__("type");?>
</th>
    <th width="6%">&nbsp;</th>
    <th width="10%" class="right"><?php echo $_smarty_tpl->__("status");?>
</th>
</tr>
</thead>
<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
<tr class="cm-row-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['banner']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
    <?php $_smarty_tpl->tpl_vars["allow_save"] = new Smarty_variable(fn_allow_save_object($_smarty_tpl->tpl_vars['banner']->value,"banners"), null, 0);?>

    <?php if ($_smarty_tpl->tpl_vars['allow_save']->value) {?>
        <?php $_smarty_tpl->tpl_vars["no_hide_input"] = new Smarty_variable("cm-no-hide-input", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["no_hide_input"] = new Smarty_variable('', null, 0);?>
    <?php }?>

    <td class="left">
        <input type="checkbox" name="banner_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['banner_id'], ENT_QUOTES, 'UTF-8');?>
" class="cm-item <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['no_hide_input']->value, ENT_QUOTES, 'UTF-8');?>
" /></td>
    <td class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['no_hide_input']->value, ENT_QUOTES, 'UTF-8');?>
">
        <a class="row-status" href="<?php echo htmlspecialchars(fn_url("banners.update?banner_id=".((string)$_smarty_tpl->tpl_vars['banner']->value['banner_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['banner'], ENT_QUOTES, 'UTF-8');?>
</a>
        <?php echo $_smarty_tpl->getSubTemplate ("views/companies/components/company_name.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object'=>$_smarty_tpl->tpl_vars['banner']->value), 0);?>

    </td>
    <td class="nowrap row-status <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['no_hide_input']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['banner']->value['type']=="G") {
echo $_smarty_tpl->__("graphic_banner");
} else {
echo $_smarty_tpl->__("text_banner");
}?></td>
    <td>
        <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("edit"),'href'=>"banners.update?banner_id=".((string)$_smarty_tpl->tpl_vars['banner']->value['banner_id'])));?>
</li>
        <?php if ($_smarty_tpl->tpl_vars['allow_save']->value) {?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'class'=>"cm-confirm cm-post",'text'=>__("delete"),'href'=>"banners.delete?banner_id=".((string)$_smarty_tpl->tpl_vars['banner']->value['banner_id'])));?>
</li>
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
        <?php echo $_smarty_tpl->getSubTemplate ("common/select_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['banner']->value['banner_id'],'status'=>$_smarty_tpl->tpl_vars['banner']->value['status'],'hidden'=>true,'object_id_name'=>"banner_id",'table'=>"banners",'popup_additional_class'=>((string)$_smarty_tpl->tpl_vars['no_hide_input']->value)." dropleft"), 0);?>

    </td>
</tr>
<?php } ?>
</table>
<?php } else { ?>
    <p class="no-items"><?php echo $_smarty_tpl->__("no_data");?>
</p>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
        <?php if ($_smarty_tpl->tpl_vars['addons']->value['statistics']['status']=="A") {?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>__("banners_statistics"),'href'=>"statistics.banners"));?>
</li>
             <?php if ($_smarty_tpl->tpl_vars['banners']->value) {?>
                <li class="divider"></li>
            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['banners']->value) {?>
            <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"delete_selected",'dispatch'=>"dispatch[banners.m_delete]",'form'=>"banners_form"));?>
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
    <?php echo $_smarty_tpl->getSubTemplate ("common/tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tool_href'=>"banners.add",'prefix'=>"top",'hide_tools'=>"true",'title'=>__("add_banner"),'icon'=>"icon-plus"), 0);?>

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
<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>__("banners"),'content'=>Smarty::$_smarty_vars['capture']['mainbox'],'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'adv_buttons'=>Smarty::$_smarty_vars['capture']['adv_buttons'],'select_languages'=>true), 0);?>


<?php }} ?>
