<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 07:56:17
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/common/mainbox_cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68171145956e0fe7148ba70-02017851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '513460b53edf535acf2dc7acf8409b26d009a419' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/common/mainbox_cart.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '68171145956e0fe7148ba70-02017851',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'mainbox_id' => 0,
    'content' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e0fe714da537_70870546',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0fe714da537_70870546')) {function content_56e0fe714da537_70870546($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div>
    <div class="ty-mainbox-cart__body" <?php if ($_smarty_tpl->tpl_vars['mainbox_id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mainbox_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['content']->value;
if ($_smarty_tpl->tpl_vars['mainbox_id']->value) {?><!--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mainbox_id']->value, ENT_QUOTES, 'UTF-8');?>
--><?php }?></div>
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="common/mainbox_cart.tpl" id="<?php echo smarty_function_set_id(array('name'=>"common/mainbox_cart.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div>
    <div class="ty-mainbox-cart__body" <?php if ($_smarty_tpl->tpl_vars['mainbox_id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mainbox_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['content']->value;
if ($_smarty_tpl->tpl_vars['mainbox_id']->value) {?><!--<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mainbox_id']->value, ENT_QUOTES, 'UTF-8');?>
--><?php }?></div>
</div><?php }?><?php }} ?>
