<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:34:55
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/companies/detailed_content.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48102566556e677af603a85-31435483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '443dbec3426a4661219f2071f48d99a35ff920c6' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/companies/detailed_content.post.tpl',
      1 => 1457504590,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '48102566556e677af603a85-31435483',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'company_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677af643ae3_81302393',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677af643ae3_81302393')) {function content_56e677af643ae3_81302393($_smarty_tpl) {?><?php if (!fn_allowed_for("ULTIMATE")&&!$_smarty_tpl->tpl_vars['runtime']->value['company_id']) {?>
<?php echo $_smarty_tpl->getSubTemplate ("addons/seo/common/seo_name_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object_data'=>$_smarty_tpl->tpl_vars['company_data']->value,'object_name'=>"company_data",'object_id'=>$_smarty_tpl->tpl_vars['company_data']->value['company_id'],'object_type'=>"m"), 0);?>

<?php }?><?php }} ?>
