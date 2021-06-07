<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:12:44
         compiled from "/var/www/html/mypage/themes/layout/stafffooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12596063975554670ca0a071-05743810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bb7822115de0b08ac2a0294f2cf7dd6f3073753' => 
    array (
      0 => '/var/www/html/mypage/themes/layout/stafffooter.tpl',
      1 => 1421141801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12596063975554670ca0a071-05743810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'modal' => 0,
    'datetimepicker' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5554670ca4ec45_24253084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554670ca4ec45_24253084')) {function content_5554670ca4ec45_24253084($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['modal']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>

<script src="themes/js/jquery-1.11.1.min.js"></script>
<script src="themes/js/bootstrap.min.js"></script>
<?php if (isset($_smarty_tpl->tpl_vars['datetimepicker']->value)){?>
    <script type="text/javascript" src="themes/js/moment.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
    <script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
    <script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
    <script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['index']->value)){?>
    <script type="text/javascript" src="themes/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="themes/js/jquery.yurayura.js"></script>
<?php }?>
<script type="text/javascript" src="themes/js/jquery.pjax.js"></script>
<script src="themes/js/common.js"></script>
<script src="themes/js/mypage-staff.js"></script>
<script>



</script>
</html><?php }} ?>