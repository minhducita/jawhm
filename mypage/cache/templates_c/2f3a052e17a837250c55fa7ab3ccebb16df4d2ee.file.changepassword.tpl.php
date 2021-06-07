<?php /* Smarty version Smarty-3.1.13, created on 2015-05-18 18:48:20
         compiled from "/var/www/html/mypage/application/modules/default/views/member/changepassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3057549235559b564be1787-53940865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f3a052e17a837250c55fa7ab3ccebb16df4d2ee' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/changepassword.tpl',
      1 => 1419238797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3057549235559b564be1787-53940865',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5559b564c5add6_24714170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559b564c5add6_24714170')) {function content_5559b564c5add6_24714170($_smarty_tpl) {?><div class="modal-content window-container">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">パスワード変更</h4>
	</div>
		
	<div class="modal-body">
	    <form id="password-edit" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="password" class="col-sm-4 control-label">パスワード入力</label>
                    <div class="col-sm-8">
                    	<input class="form-control" type="password" name="password" size="20" autofocus />
					</div>
				</div>
						
				<div class="form-group">
                   	<label for="retype" class="col-sm-4">パスワード再入力</label>
                   	<div class="col-sm-8">
                    	<input type='password' class="form-control" name="retype" />
					</div>
				</div>
				
				<div class="form-group">
                  	<div class="pull-right col-sm-2">
                  		<input type="reset" class="btn btn-warning" value="リセット">
                  	</div>
				</div>
               	<input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
				<input type="hidden" name="action_tag" value="password">
        	</fieldset>
	    </form>
    </div>
	    
	<div class="modal-footer">
		<button id="edit_password" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script><?php }} ?>