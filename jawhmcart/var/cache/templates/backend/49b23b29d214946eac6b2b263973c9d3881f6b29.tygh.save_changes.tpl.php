<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:23:55
         compiled from "/var/www/html/jawhmcart/design/backend/templates/buttons/save_changes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135078848956e6670bb8a270-80237025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49b23b29d214946eac6b2b263973c9d3881f6b29' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/buttons/save_changes.tpl',
      1 => 1457504298,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '135078848956e6670bb8a270-80237025',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e6670bbc4e41_69962360',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6670bbc4e41_69962360')) {function content_56e6670bbc4e41_69962360($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('save_changes'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("save_changes"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value), 0);?>
<?php }} ?>
