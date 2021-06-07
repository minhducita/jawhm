<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:12:51
         compiled from "/var/www/html/mypage/themes/layout/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1528365815555467135d6d15-04622092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15d54db7b59b4c3b16f71fce8ec7542cb9202bef' => 
    array (
      0 => '/var/www/html/mypage/themes/layout/footer.tpl',
      1 => 1429263195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1528365815555467135d6d15-04622092',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'modal' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_555467135fef97_30370508',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555467135fef97_30370508')) {function content_555467135fef97_30370508($_smarty_tpl) {?>    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['modal']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap.min.js"></script>

    <?php if (isset($_smarty_tpl->tpl_vars['index']->value)){?>
        <script type="text/javascript" src="themes/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="themes/js/jquery.yurayura.js"></script>
    <?php }?>
    <script type="text/javascript" src="themes/js/jquery.pjax.js"></script>
    <script type="text/javascript" src="themes/js/common.js"></script>
    <script type="text/javascript" src="themes/js/mypage-user.js"></script>
    </body>
</html>
<?php }} ?>