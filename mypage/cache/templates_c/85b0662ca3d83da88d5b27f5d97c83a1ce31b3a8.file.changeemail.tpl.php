<?php /* Smarty version Smarty-3.1.13, created on 2015-06-04 11:50:27
         compiled from "/var/www/html/mypage/application/modules/default/views/member/changeemail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:606788984556fbcf32e75d5-42196642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85b0662ca3d83da88d5b27f5d97c83a1ce31b3a8' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/changeemail.tpl',
      1 => 1419238797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '606788984556fbcf32e75d5-42196642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
    'token' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556fbcf3370e16_99999482',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556fbcf3370e16_99999482')) {function content_556fbcf3370e16_99999482($_smarty_tpl) {?><div class="modal-content window-container">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">メールアドレス登録</h4>
	</div>
		
	<div class="modal-body">
	    <form id="edit-email" method="post">
	        <fieldset>
				<div class="form-group">
                    <label for="email" class="col-sm-4 control-label">メールアドレス</label>
                    <div class="col-sm-8">
                    	<input class="form-control" type="email" name="change_email" size="20" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" autofocus >
					</div>
				</div>
						
				<div class="form-group">
                   	<label for="retype" class="col-sm-4 control-label">確認用メールアドレス</label>
                   	<div class="col-sm-8">
             	      <input class="form-control" type="email" name="retype" size="20">
					</div>
				</div>
					
				<div class="form-group">
                   	<label for="email_type" class="col-sm-4 control-label">種類</label>
                   	<div class="col-sm-8">
	                   	<select class="form-control" name="email_type">
							<option value="0">PC</option>
							<option value="1">携帯</option>
						</select> 
					</div>
				</div>
				
				<div class="form-group">          	
                  	<div class="pull-right col-sm-2">
                  		<input type="reset" class="btn btn-warning" value="リセット">
                  	</div>
				</div>
				
               	<input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
				<input type="hidden" name="action_tag" value="editemail">
				<input type="hidden" name="originai_email" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
        	</fieldset>
	    </form>
    </div>
	    
	<div class="modal-footer">
		<button id="email_update" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script><?php }} ?>