<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 12:16:37
         compiled from "/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/products/update_seo.pre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98771404956e68175822c90-62529614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b20819e507a026367ed055a66e826f2088db8c6' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/addons/seo/hooks/products/update_seo.pre.tpl',
      1 => 1457504592,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '98771404956e68175822c90-62529614',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view_uri' => 0,
    'runtime' => 0,
    'product_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e68175868e71_97025613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68175868e71_97025613')) {function content_56e68175868e71_97025613($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['view_uri']->value&&$_smarty_tpl->tpl_vars['runtime']->value['company_id']&&fn_allowed_for("ULTIMATE")||fn_allowed_for("MULTIVENDOR")) {?>
<?php echo $_smarty_tpl->getSubTemplate ("addons/seo/common/seo_name_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('object_data'=>$_smarty_tpl->tpl_vars['product_data']->value,'object_name'=>"product_data",'object_id'=>$_smarty_tpl->tpl_vars['product_data']->value['product_id'],'object_type'=>"p",'share_dont_hide'=>true), 0);?>

<?php }?>
<?php }} ?>
