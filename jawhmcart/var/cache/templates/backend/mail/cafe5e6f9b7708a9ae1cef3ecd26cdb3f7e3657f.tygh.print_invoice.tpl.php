<?php /* Smarty version Smarty-3.1.21, created on 2016-03-14 10:06:29
         compiled from "/var/www/html/jawhmcart/design/backend/mail/templates/orders/print_invoice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139797331256e662f5d0d713-72750061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cafe5e6f9b7708a9ae1cef3ecd26cdb3f7e3657f' => 
    array (
      0 => '/var/www/html/jawhmcart/design/backend/mail/templates/orders/print_invoice.tpl',
      1 => 1457504344,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '139797331256e662f5d0d713-72750061',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e662f5d5ad02_02854998',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e662f5d5ad02_02854998')) {function content_56e662f5d5ad02_02854998($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css" media="print">
.main-table {
    background-color: #ffffff !important;
}
</style>
<style type="text/css" media="screen,print">
body,p,div,td {
    color: #000000;
    font: 12px Arial;
}
body {
    padding: 0;
    margin: 0;
}
a, a:link, a:visited, a:hover, a:active {
    color: #000000;
    text-decoration: underline;
}
a:hover {
    text-decoration: none;
}
</style>

</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("common/scripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("orders/invoice.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</body>
</html><?php }} ?>
