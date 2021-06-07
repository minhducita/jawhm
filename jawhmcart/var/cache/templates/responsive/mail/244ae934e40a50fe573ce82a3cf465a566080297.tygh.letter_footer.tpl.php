<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 08:16:28
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/mail/templates/common/letter_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187196211156e1032c119aa1-99687045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '244ae934e40a50fe573ce82a3cf465a566080297' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/mail/templates/common/letter_footer.tpl',
      1 => 1457518431,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '187196211156e1032c119aa1-99687045',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'user_type' => 0,
    'user_data' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e1032c1cef96_17622644',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e1032c1cef96_17622644')) {function content_56e1032c1cef96_17622644($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('affiliate_text_letter_footer','customer_text_letter_footer','affiliate_text_letter_footer','customer_text_letter_footer'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><p>
<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='P'||$_smarty_tpl->tpl_vars['user_data']->value['user_type']=='P') {?>
    <?php echo $_smarty_tpl->__("affiliate_text_letter_footer");?>

<?php } else { ?>
    <?php echo $_smarty_tpl->__("customer_text_letter_footer");?>

<?php }?>
</p>
</body>
</html><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="common/letter_footer.tpl" id="<?php echo smarty_function_set_id(array('name'=>"common/letter_footer.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><p>
<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='P'||$_smarty_tpl->tpl_vars['user_data']->value['user_type']=='P') {?>
    <?php echo $_smarty_tpl->__("affiliate_text_letter_footer");?>

<?php } else { ?>
    <?php echo $_smarty_tpl->__("customer_text_letter_footer");?>

<?php }?>
</p>
</body>
</html><?php }?><?php }} ?>
