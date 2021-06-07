<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 14:02:00
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/mail/templates/profiles/create_profile_subj.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144918878156e69a28b217e3-06790274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b4d540cc10ec07e56613f3137034d0253ff8f6f' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/mail/templates/profiles/create_profile_subj.tpl',
      1 => 1457518431,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '144918878156e69a28b217e3-06790274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'user_data' => 0,
    'company_data' => 0,
    'u_type' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e69a28c28cc3_67939485',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e69a28c28cc3_67939485')) {function content_56e69a28c28cc3_67939485($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('new_profile_notification','new_profile_notification'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
$_smarty_tpl->tpl_vars['u_type'] = new Smarty_variable(mb_strtolower(fn_get_user_type_description($_smarty_tpl->tpl_vars['user_data']->value['user_type']), 'UTF-8'), null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['company_data']->value['company_name'];?>
: <?php echo $_smarty_tpl->__("new_profile_notification",array("[user_type]"=>$_smarty_tpl->tpl_vars['u_type']->value));
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="profiles/create_profile_subj.tpl" id="<?php echo smarty_function_set_id(array('name'=>"profiles/create_profile_subj.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
$_smarty_tpl->tpl_vars['u_type'] = new Smarty_variable(mb_strtolower(fn_get_user_type_description($_smarty_tpl->tpl_vars['user_data']->value['user_type']), 'UTF-8'), null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['company_data']->value['company_name'];?>
: <?php echo $_smarty_tpl->__("new_profile_notification",array("[user_type]"=>$_smarty_tpl->tpl_vars['u_type']->value));
}?><?php }} ?>
