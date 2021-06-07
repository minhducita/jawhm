<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 14:01:11
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/categories/detailed_content.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79863856756e699f7df39e2-69624525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9882168d913d7040c7b8937cf70784e0307fc95' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/categories/detailed_content.post.tpl',
      1 => 1457504588,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '79863856756e699f7df39e2-69624525',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'category_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e699f7e3bdd7_13727223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e699f7e3bdd7_13727223')) {function content_56e699f7e3bdd7_13727223($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&fn_allowed_for("ULTIMATE")||fn_allowed_for("MULTIVENDOR")) {?>
<?php echo $_smarty_tpl->getSubTemplate ("addons/seo/common/seo_name_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object_data'=>$_smarty_tpl->tpl_vars['category_data']->value,'object_name'=>"category_data",'object_id'=>$_smarty_tpl->tpl_vars['category_data']->value['category_id'],'object_type'=>"c"), 0);?>

<?php }?><?php }} ?>
