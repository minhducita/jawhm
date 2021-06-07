<?php /* Smarty version Smarty-3.1.13, created on 2015-06-04 11:50:56
         compiled from "/var/www/html/mypage/application/modules/default/views/member/emailconfirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1166954592556fbd10aae0c4-04640596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52fc19b31469d5549b7f5260cd34425253d89c71' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/emailconfirm.tpl',
      1 => 1419238798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1166954592556fbd10aae0c4-04640596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556fbd10b27396_81653588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556fbd10b27396_81653588')) {function content_556fbd10b27396_81653588($_smarty_tpl) {?><div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">メールアドレス仮登録完了</h4>
	</div>
	
	<div class="modal-body">
    	<h1>メールアドレスの仮登録が完了しました。</h1><br />
		ご登録頂いた内容のメールアドレス宛に確認メールを送信しました。<br />
		<span class="text-red">確認メールの承認URLにアクセスするまで変更内容は登録されません。</span><br />
		確認が取れ次第内容を登録致します。<br/ >
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
/mypage/member/email";
	function jumpPage() {
	  location.href = url;
	}
	setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT><?php }} ?>