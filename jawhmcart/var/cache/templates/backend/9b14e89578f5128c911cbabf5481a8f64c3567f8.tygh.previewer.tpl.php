<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:22:55
         compiled from "/var/www/html/jawhmcart/design/backend/templates/common/previewer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71610246156e666cfc09913-88299476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b14e89578f5128c911cbabf5481a8f64c3567f8' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/templates/common/previewer.tpl',
      1 => 1457504309,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '71610246156e666cfc09913-88299476',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e666cfc29a64_56340343',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e666cfc29a64_56340343')) {function content_56e666cfc29a64_56340343($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/function.script.php';
?><?php echo smarty_function_script(array('src'=>"js/tygh/previewers/".((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['default_image_previewer']).".previewer.js"),$_smarty_tpl);?>
<?php }} ?>
