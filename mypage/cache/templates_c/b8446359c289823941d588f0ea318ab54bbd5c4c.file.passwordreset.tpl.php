<?php /* Smarty version Smarty-3.1.13, created on 2015-08-18 13:59:25
         compiled from "/var/www/html/mypage/application/modules/default/views/index/passwordreset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146682594555d2bbadbe88b8-49796471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8446359c289823941d588f0ea318ab54bbd5c4c' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/index/passwordreset.tpl',
      1 => 1419238783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146682594555d2bbadbe88b8-49796471',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55d2bbadd592f5_85589338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d2bbadd592f5_85589338')) {function content_55d2bbadd592f5_85589338($_smarty_tpl) {?><div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">パスワードリセット完了</h4>
	</div>
	
	<div class="modal-body">
    	<h1>パスワードのリセットが完了しました。</h1><br />
		ご登録頂いているメールアドレス宛に新しいパスワードを送信しました。<br />
		送信したメールを確認頂き、パスワードの再設定をお願いします。<br/ >
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal" id="reload">ページ更新</button>
	</div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<SCRIPT language="JavaScript">
<!--
	mnt = 60;
	url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/index/jawhmlogin";
	function jumpPage() {
	  location.href = url;
	}
	setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT><?php }} ?>