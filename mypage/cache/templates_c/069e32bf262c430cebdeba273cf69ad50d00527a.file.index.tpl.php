<?php /* Smarty version Smarty-3.1.13, created on 2015-05-21 11:29:08
         compiled from "/var/www/html/mypage/application/modules/staff/views/client/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1411422678555d42f4237d32-73652575%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '069e32bf262c430cebdeba273cf69ad50d00527a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/client/index.tpl',
      1 => 1429260425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1411422678555d42f4237d32-73652575',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_555d42f43d42f7_18402748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d42f43d42f7_18402748')) {function content_555d42f43d42f7_18402748($_smarty_tpl) {?><form action="https://www.jawhm.or.jp/mypage/staff/client/stafflogin" method="post" name="postForm">
    <input type="hidden" name="staff_cd" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['staff_cd'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
    <input type="hidden" name="office_cd" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['office_cd'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
    <input type="hidden" name="client_no" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['client_no'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
</form>

<script>
window.onload = function() {
    document.postForm.submit();
}
</script><?php }} ?>