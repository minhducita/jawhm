<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 11:35:14
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/tags/hooks/pages/tabs_content.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153263444056e677c23d39a9-83589617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25c43b5d28d4a4e01fbef2aba232dc63ebf77faf' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/tags/hooks/pages/tabs_content.post.tpl',
      1 => 1457504607,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '153263444056e677c23d39a9-83589617',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'addons' => 0,
    'page_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e677c2410977_18703735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e677c2410977_18703735')) {function content_56e677c2410977_18703735($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['company_id']&&fn_allowed_for("ULTIMATE")||fn_allowed_for("MULTIVENDOR")) {?>
    <?php if ($_smarty_tpl->tpl_vars['addons']->value['tags']['tags_for_pages']=="Y") {?>
        <?php echo $_smarty_tpl->getSubTemplate ("addons/tags/views/tags/components/object_tags.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object'=>$_smarty_tpl->tpl_vars['page_data']->value,'input_name'=>"page_data",'object_type'=>"A",'object_id'=>$_smarty_tpl->tpl_vars['page_data']->value['page_id']), 0);?>

    <?php }?>
<?php }?><?php }} ?>
