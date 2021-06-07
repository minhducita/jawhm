<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 09:27:23
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/theme_editor/components/fileuploader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194065762556e113cb9da240-13726430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fbb3b632f45788041e01dbcf6e3955181ba55b0' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/theme_editor/components/fileuploader.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '194065762556e113cb9da240-13726430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'prefix' => 0,
    'var_name' => 0,
    'id_var_name' => 0,
    'disabled' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e113cbc42746_13836663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e113cbc42746_13836663')) {function content_56e113cbc42746_13836663($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('remove_this_item','theme_editor.browse','theme_editor.browse','remove_this_item','theme_editor.browse','theme_editor.browse'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo smarty_function_script(array('src'=>"js/tygh/fileuploader_scripts.js"),$_smarty_tpl);?>


<?php ob_start();
echo htmlspecialchars(md5($_smarty_tpl->tpl_vars['var_name']->value), ENT_QUOTES, 'UTF-8');
$_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["id_var_name"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['prefix']->value).$_tmp1, null, 0);?>

<input type="hidden" name="file_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" value="" id="file_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
">
<input type="hidden" name="type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" value="" id="type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
">

<div class="te-fileuploader clearfix"><div class="upload-file-section" id="message_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
" title=""><p class="cm-fu-file hidden"><i class="ty-icon-trashcan" id="clean_selection_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("remove_this_item");?>
" onclick="Tygh.fileuploader.clean_selection(this.id); Tygh.fileuploader.toggle_links(this.id, 'show');">&nbsp;</i><span class="filename-link"></span></p></div><div id="link_container_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['disabled']->value) {?><span class="te-btn ty-left fileinput-btn cm-tooltip disabled" title="<?php echo $_smarty_tpl->__('theme_editor.create_style_first');?>
"><i class="ty-icon-upload"></i><?php echo $_smarty_tpl->__("theme_editor.browse");?>
</span><?php } else { ?><span class="te-btn ty-left fileinput-btn"><input type="file" name="file_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" id="local_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
" onchange="Tygh.fileuploader.show_loader(this.id); Tygh.fileuploader.toggle_links(this.id, 'hide');" data-ca-empty-file="" onclick="Tygh.$(this).removeAttr('data-ca-empty-file');"><i class="ty-icon-upload"></i><?php echo $_smarty_tpl->__("theme_editor.browse");?>
</span><?php }?></div></div>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/theme_editor/components/fileuploader.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/theme_editor/components/fileuploader.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo smarty_function_script(array('src'=>"js/tygh/fileuploader_scripts.js"),$_smarty_tpl);?>


<?php ob_start();
echo htmlspecialchars(md5($_smarty_tpl->tpl_vars['var_name']->value), ENT_QUOTES, 'UTF-8');
$_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["id_var_name"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['prefix']->value).$_tmp2, null, 0);?>

<input type="hidden" name="file_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" value="" id="file_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
">
<input type="hidden" name="type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" value="" id="type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
">

<div class="te-fileuploader clearfix"><div class="upload-file-section" id="message_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
" title=""><p class="cm-fu-file hidden"><i class="ty-icon-trashcan" id="clean_selection_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("remove_this_item");?>
" onclick="Tygh.fileuploader.clean_selection(this.id); Tygh.fileuploader.toggle_links(this.id, 'show');">&nbsp;</i><span class="filename-link"></span></p></div><div id="link_container_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['disabled']->value) {?><span class="te-btn ty-left fileinput-btn cm-tooltip disabled" title="<?php echo $_smarty_tpl->__('theme_editor.create_style_first');?>
"><i class="ty-icon-upload"></i><?php echo $_smarty_tpl->__("theme_editor.browse");?>
</span><?php } else { ?><span class="te-btn ty-left fileinput-btn"><input type="file" name="file_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" id="local_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_var_name']->value, ENT_QUOTES, 'UTF-8');?>
" onchange="Tygh.fileuploader.show_loader(this.id); Tygh.fileuploader.toggle_links(this.id, 'hide');" data-ca-empty-file="" onclick="Tygh.$(this).removeAttr('data-ca-empty-file');"><i class="ty-icon-upload"></i><?php echo $_smarty_tpl->__("theme_editor.browse");?>
</span><?php }?></div></div>

<?php }?><?php }} ?>
