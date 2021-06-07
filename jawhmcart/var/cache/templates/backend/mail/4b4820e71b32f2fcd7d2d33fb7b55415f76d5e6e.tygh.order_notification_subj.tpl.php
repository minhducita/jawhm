<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:55:14
         compiled from "/var/www/html/jawhmcart/design/backend/mail/templates/orders/order_notification_subj.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98755485356e66e62c544e3-47817648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b4820e71b32f2fcd7d2d33fb7b55415f76d5e6e' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/mail/templates/orders/order_notification_subj.tpl',
      1 => 1457504344,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '98755485356e66e62c544e3-47817648',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company_data' => 0,
    'order_info' => 0,
    'order_status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e66e62cd0254_36112635',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e66e62cd0254_36112635')) {function content_56e66e62cd0254_36112635($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('order'));
?>
<?php echo $_smarty_tpl->tpl_vars['company_data']->value['company_name'];?>
: <?php echo $_smarty_tpl->__("order");?>
 #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_info']->value['order_id'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_status']->value['email_subj'], ENT_QUOTES, 'UTF-8');?>
<?php }} ?>
