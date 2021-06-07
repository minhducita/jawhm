<?php /* Smarty version Smarty-3.1.13, created on 2015-06-04 11:52:00
         compiled from "/var/www/html/mypage/application/modules/default/views/member/mailauth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:684795945556fbd5022dd19-21297885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7338ecf0e4f32fea1bcf9edf57772eea6ab6c38' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/mailauth.tpl',
      1 => 1419238798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '684795945556fbd5022dd19-21297885',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556fbd5028bb11_22488997',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556fbd5028bb11_22488997')) {function content_556fbd5028bb11_22488997($_smarty_tpl) {?><div class="result-container">
    <h1>メールアドレスの本登録が完了しました。</h1><br />
	ご協力ありがとうございました。<br />
    <a href="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/member/index">トップページへ</a>
</div>

<SCRIPT language="JavaScript">
<!--
	mnt = 5;
	url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/member/index";
	function jumpPage() {
	  location.href = url;
	}
	setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT><?php }} ?>