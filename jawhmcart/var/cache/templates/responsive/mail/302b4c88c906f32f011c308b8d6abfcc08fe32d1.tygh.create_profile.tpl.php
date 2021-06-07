<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 14:02:00
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/mail/templates/profiles/create_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81222563256e69a28c5f885-25855083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '302b4c88c906f32f011c308b8d6abfcc08fe32d1' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/mail/templates/profiles/create_profile.tpl',
      1 => 1457518431,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '81222563256e69a28c5f885-25855083',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'user_data' => 0,
    'company_data' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e69a28d57070_50956664',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e69a28d57070_50956664')) {function content_56e69a28d57070_50956664($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('dear','create_profile_notification_header','dear','create_profile_notification_header'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo $_smarty_tpl->getSubTemplate ("common/letter_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->__("dear");?>
 <?php if ($_smarty_tpl->tpl_vars['user_data']->value['firstname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['firstname'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(mb_strtolower(fn_get_user_type_description($_smarty_tpl->tpl_vars['user_data']->value['user_type']), 'UTF-8'), ENT_QUOTES, 'UTF-8');
}?>,<br><br>

<?php echo $_smarty_tpl->__("create_profile_notification_header");?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_name'], ENT_QUOTES, 'UTF-8');?>
.<br><br>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"profiles:create_profile")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"profiles:create_profile"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"profiles:create_profile"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo $_smarty_tpl->getSubTemplate ("profiles/profiles_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('created'=>true), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("common/letter_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="profiles/create_profile.tpl" id="<?php echo smarty_function_set_id(array('name'=>"profiles/create_profile.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo $_smarty_tpl->getSubTemplate ("common/letter_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->__("dear");?>
 <?php if ($_smarty_tpl->tpl_vars['user_data']->value['firstname']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user_data']->value['firstname'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(mb_strtolower(fn_get_user_type_description($_smarty_tpl->tpl_vars['user_data']->value['user_type']), 'UTF-8'), ENT_QUOTES, 'UTF-8');
}?>,<br><br>

<?php echo $_smarty_tpl->__("create_profile_notification_header");?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company_data']->value['company_name'], ENT_QUOTES, 'UTF-8');?>
.<br><br>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"profiles:create_profile")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"profiles:create_profile"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"profiles:create_profile"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo $_smarty_tpl->getSubTemplate ("profiles/profiles_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('created'=>true), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("common/letter_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
}?><?php }} ?>
