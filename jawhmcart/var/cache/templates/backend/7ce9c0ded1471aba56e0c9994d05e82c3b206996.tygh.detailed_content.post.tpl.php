<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:14
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/pages/detailed_content.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111255234756e677c22086a2-33777393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ce9c0ded1471aba56e0c9994d05e82c3b206996' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/pages/detailed_content.post.tpl',
      1 => 1457504591,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '111255234756e677c22086a2-33777393',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'page_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677c224c140_92558590',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677c224c140_92558590')) {function content_56e677c224c140_92558590($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&fn_allowed_for("ULTIMATE")||fn_allowed_for("MULTIVENDOR")) {?>
<?php echo $_smarty_tpl->getSubTemplate ("addons/seo/common/seo_name_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object_data'=>$_smarty_tpl->tpl_vars['page_data']->value,'object_name'=>"page_data",'object_id'=>$_smarty_tpl->tpl_vars['page_data']->value['page_id'],'object_type'=>"a"), 0);?>

<?php }?><?php }} ?>
