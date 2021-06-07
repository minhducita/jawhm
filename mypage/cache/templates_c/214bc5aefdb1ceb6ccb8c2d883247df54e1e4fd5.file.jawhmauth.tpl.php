<?php /* Smarty version Smarty-3.1.13, created on 2015-06-02 16:09:44
         compiled from "/var/www/html/mypage/application/modules/default/views/index/jawhmauth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:320359420556d56b8163a30-08967963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '214bc5aefdb1ceb6ccb8c2d883247df54e1e4fd5' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/jawhmauth.tpl',
      1 => 1419238783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320359420556d56b8163a30-08967963',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556d56b81b4200_48733620',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556d56b81b4200_48733620')) {function content_556d56b81b4200_48733620($_smarty_tpl) {?><div class="result-container">
    <h3>ログインに成功しました。</h3><br />
    5秒後にインデックスページに移動します。<br />
    <a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/index/index">インデックスページに移動</a>
</div>
<SCRIPT language="JavaScript">
<!--
    loadingView(false);
    mnt = 5;
    url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/index/index";
    function jumpPage() {
      location.href = url;
    }
    setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT><?php }} ?>