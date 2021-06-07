<?php /* Smarty version Smarty-3.1.21, created on 2016-03-09 13:15:02
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/addons/call_requests/blocks/call_request.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81792221656dff7a6e8e119-29304773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd06f10febf48b8e03278aeb4846f1901bbf14b73' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/addons/call_requests/blocks/call_request.tpl',
      1 => 1457518438,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '81792221656dff7a6e8e119-29304773',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'phone_number' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56dff7a6f15074_02285215',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dff7a6f15074_02285215')) {function content_56dff7a6f15074_02285215($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('call_requests.request_call','call_requests.request_call'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>

<div class="ty-cr-phone-number-link">
    <div class="ty-cr-phone"><span><span class="ty-cr-phone-prefix"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone_number']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
</span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone_number']->value['postfix'], ENT_QUOTES, 'UTF-8');?>
</span></div>
    <div class="ty-cr-link"><?php echo $_smarty_tpl->getSubTemplate ("addons/call_requests/views/call_requests/components/popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>false,'link_text'=>__("call_requests.request_call")), 0);?>
</div>
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/call_requests/blocks/call_request.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/call_requests/blocks/call_request.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?>

<div class="ty-cr-phone-number-link">
    <div class="ty-cr-phone"><span><span class="ty-cr-phone-prefix"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone_number']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
</span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone_number']->value['postfix'], ENT_QUOTES, 'UTF-8');?>
</span></div>
    <div class="ty-cr-link"><?php echo $_smarty_tpl->getSubTemplate ("addons/call_requests/views/call_requests/components/popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>false,'link_text'=>__("call_requests.request_call")), 0);?>
</div>
</div><?php }?><?php }} ?>
