<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:23:55
         compiled from "/var/www/html/jawhmcart/design/backend/templates/common/carriers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148601471056e6670b257e55-24329271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43d6a8a3fd52b479a8cb31085999403e946bc8ff' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/common/carriers.tpl',
      1 => 1457504304,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '148601471056e6670b257e55-24329271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'capture' => 0,
    'id' => 0,
    'name' => 0,
    'meta' => 0,
    'carriers' => 0,
    'code' => 0,
    'carrier' => 0,
    'carrier_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6670b2fca50_31023581',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6670b2fca50_31023581')) {function content_56e6670b2fca50_31023581($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/block.hook.php';
?><?php
fn_preload_lang_vars(array('carrier_','carrier_'));
?>
<?php if ($_smarty_tpl->tpl_vars['capture']->value) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array("carrier_field", null, null); ob_start(); ?>
<?php }?>

<select <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['meta']->value) {?>class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
    <option value="">--</option>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"carriers:list")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"carriers:list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php  $_smarty_tpl->tpl_vars["code"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["code"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["code"]->key => $_smarty_tpl->tpl_vars["code"]->value) {
$_smarty_tpl->tpl_vars["code"]->_loop = true;
?>
    	<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['code']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['carrier']->value==((string)$_smarty_tpl->tpl_vars['code']->value)) {
$_smarty_tpl->tpl_vars['carrier_name'] = new Smarty_variable($_smarty_tpl->__("carrier_".((string)$_smarty_tpl->tpl_vars['code']->value)), null, 0);?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__("carrier_".((string)$_smarty_tpl->tpl_vars['code']->value));?>
</option>
    <?php } ?>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"carriers:list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</select>
<?php if ($_smarty_tpl->tpl_vars['capture']->value) {?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("carrier_name", null, null); ob_start(); ?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier_name']->value, ENT_QUOTES, 'UTF-8');?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php }?><?php }} ?>
