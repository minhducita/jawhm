<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 07:43:12
         compiled from "/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/customer_notes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94556596256e0fb60dfdaa3-42327922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bbf4884c1a92c973b50b1450c875b7f09a6cbd5' => 
    array (
      0 => '/var/www/html/jawhmcart/design/themes/responsive/templates/views/checkout/components/customer_notes.tpl',
      1 => 1457518432,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '94556596256e0fb60dfdaa3-42327922',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'cart' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e0fb60ea5397_26805473',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0fb60ea5397_26805473')) {function content_56e0fb60ea5397_26805473($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('type_comments_here','type_comments_here'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:notes")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:notes"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	<div class="ty-customer-notes">
	    <p class="ty-customer-notes__title"><?php echo $_smarty_tpl->__("type_comments_here");?>
</p>
	    <textarea class="ty-customer-notes__text cm-focus" name="customer_notes" cols="60" rows="3"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['notes'], ENT_QUOTES, 'UTF-8');?>
</textarea>
	</div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:notes"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/checkout/components/customer_notes.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/checkout/components/customer_notes.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"checkout:notes")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"checkout:notes"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	<div class="ty-customer-notes">
	    <p class="ty-customer-notes__title"><?php echo $_smarty_tpl->__("type_comments_here");?>
</p>
	    <textarea class="ty-customer-notes__text cm-focus" name="customer_notes" cols="60" rows="3"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['notes'], ENT_QUOTES, 'UTF-8');?>
</textarea>
	</div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"checkout:notes"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);
}?><?php }} ?>
