<?php /* Smarty version Smarty-3.1.13, created on 2016-07-01 15:15:58
         compiled from "/var/www/html/mypage/application/modules/default/views/member/emailresend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77179674357760a9e68e274-51210276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa4ad5fb6307112662e1cb5660eb92aa9408d48e' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/emailresend.tpl',
      1 => 1419238798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77179674357760a9e68e274-51210276',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
    'email_id' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57760a9e6f22c0_64400339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57760a9e6f22c0_64400339')) {function content_57760a9e6f22c0_64400339($_smarty_tpl) {?><div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">認証メール再送確認</h4>
	</div>
	
	<div class="modal-body">
		本当に認証待ちのメールアドレスに認証メールを再送してよろしいですか?<br />
		<form id="edit-email" method="post">
			<fieldset>
		        <input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
				<input type="hidden" name="action_tag" value="editemail">
				<input type="hidden" name="id" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['email_id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
        	</fieldset>
	    </form>
	</div>
	
	<div class="modal-footer">
		<button id="email_resend" type="button" class="btn btn-danger">はい</button> 
		<button type="button" class="btn btn-success" data-dismiss="modal">いいえ</button>
	</div>
</div>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script><?php }} ?>