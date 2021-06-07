<?php /* Smarty version Smarty-3.1.13, created on 2015-05-14 18:13:27
         compiled from "/var/www/html/mypage/application/modules/default/views/index/logout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1221690245555467372b8915-94996785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c2fb7601a66703da14bd50d6f7f6de27f62bfac' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/logout.tpl',
      1 => 1419238783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1221690245555467372b8915-94996785',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55546737329043_35709073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55546737329043_35709073')) {function content_55546737329043_35709073($_smarty_tpl) {?><div class="result-container">
    <h1>ログアウトしました。</h1><br />
	またのご利用をお待ちしております。<br />
    <a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/index/login">ログインページに戻る</a>
</div>

<SCRIPT language="JavaScript">
<!--
	mnt = 5;
	url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/";
	function jumpPage() {
	  location.href = url;
	}
	setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT><?php }} ?>