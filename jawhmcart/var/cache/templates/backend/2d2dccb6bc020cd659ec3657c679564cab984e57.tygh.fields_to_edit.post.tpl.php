<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 13:51:33
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/categories/fields_to_edit.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37884539556e697b55fe798-07414250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d2dccb6bc020cd659ec3657c679564cab984e57' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/categories/fields_to_edit.post.tpl',
      1 => 1457504588,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '37884539556e697b55fe798-07414250',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e697b5621089_60304067',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e697b5621089_60304067')) {function content_56e697b5621089_60304067($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('seo_name'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&fn_allowed_for("ULTIMATE")||fn_allowed_for("MULTIVENDOR")) {?>
    <label class="checkbox" for="seo_name">
    	<input type="checkbox" value="seo_name" id="seo_name" name="selected_fields[extra][]" checked="checked" class="cm-item-s" />
    <?php echo $_smarty_tpl->__("seo_name");?>
</label>
<?php }?><?php }} ?>
