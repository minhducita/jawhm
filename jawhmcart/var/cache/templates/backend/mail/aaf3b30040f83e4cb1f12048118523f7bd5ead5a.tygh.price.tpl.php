<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:06:30
         compiled from "/var/www/html/jawhmcart/design/backend/mail/templates/common/price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188925817356e662f6866481-69100033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aaf3b30040f83e4cb1f12048118523f7bd5ead5a' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/mail/templates/common/price.tpl',
      1 => 1457504335,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '188925817356e662f6866481-69100033',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'value' => 0,
    'primary_currency' => 0,
    'currencies' => 0,
    'span_id' => 0,
    'class' => 0,
    'secondary_currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e662f68fd123_97101144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e662f68fd123_97101144')) {function content_56e662f68fd123_97101144($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_format_price')) include '/var/www/html/jawhmcart/app/functions/smarty_plugins/modifier.format_price.php';
?><?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['alternative_currency']=="use_selected_and_alternative") {
echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value);
if ($_smarty_tpl->tpl_vars['secondary_currency']->value!=$_smarty_tpl->tpl_vars['primary_currency']->value) {?>&nbsp;(<?php echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['secondary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value,true);?>
)<?php }
} else {
echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['secondary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value,true);
}?><?php }} ?>
