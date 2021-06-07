<?php /* Smarty version Smarty-3.1.13, created on 2015-05-18 18:48:43
         compiled from "/var/www/html/mypage/application/modules/default/views/member/changeemailstatus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8139377215559b57b557b87-25020190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '343c602c57eaca17e04cda4876c9f0732f7d5b29' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/member/changeemailstatus.tpl',
      1 => 1419238797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8139377215559b57b557b87-25020190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sqlserver' => 0,
    'email_id' => 0,
    'id' => 0,
    'smp' => 0,
    'token' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5559b57b68df32_18900388',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559b57b68df32_18900388')) {function content_5559b57b68df32_18900388($_smarty_tpl) {?><div class="modal-content window-container">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">メールアドレス情報編集</h4>
	</div>
	<div class="modal-body">
	    <form id="edit-email" method="post">
	        <fieldset>
				<div class="form-group">
                   	<label for="email_type" class="col-sm-5 control-label radio-inline">メール種類</label>
                   	<div class="col-sm-7">
	                   	<label class="radio-inline">
							<input type="radio" name="email_type" value="ＰＣ" <?php if ($_smarty_tpl->tpl_vars['sqlserver']->value[0]=='ＰＣ'){?>checked<?php }?>>  ＰＣ　　
						</label>
						<label class="radio-inline">
							<input type="radio" name="email_type" value="携帯" <?php if ($_smarty_tpl->tpl_vars['sqlserver']->value[0]=='携帯'){?>checked<?php }?>> 携帯
						</label>
					</div>
				</div>
					
				<div class="form-group">
                   	<label for="email_type" class="col-sm-5 control-label radio-inline">出発前連絡</label>
                   	<div class="col-sm-7">
	                   	<label class="radio-inline">
							<input type="radio" name="pre_departure" value="1" <?php if ($_smarty_tpl->tpl_vars['sqlserver']->value[1]==1){?>checked<?php }?>> 受け取る 
						</label>
						<label class="radio-inline">
							<input type="radio" name="pre_departure" value="0" <?php if ($_smarty_tpl->tpl_vars['sqlserver']->value[1]==0){?>checked<?php }?>> 受け取らない
						</label>
					</div>
				</div>
				
				<div class="form-group">
                   	<label for="email_type" class="col-sm-5 control-label radio-inline">出発後連絡</label>
                   	<div class="col-sm-7">
	                   	<label class="radio-inline">
							<input type="radio" name="post_departure" value="1" <?php if ($_smarty_tpl->tpl_vars['sqlserver']->value[2]==1){?>checked<?php }?>> 受け取る 
						</label>
						<label class="radio-inline">
							<input type="radio" name="post_departure" value="0" <?php if ($_smarty_tpl->tpl_vars['sqlserver']->value[2]==0){?>checked<?php }?>> 受け取らない
						</label>
					</div>
				</div>
				
				<div class="form-group">
                   	<label for="email_type" class="col-sm-5 control-label radio-inline">請求書連絡</label>
                   	<div class="col-sm-7">
	                   	<label class="radio-inline">
							<input type="radio" name="bill" value="1" <?php if ($_smarty_tpl->tpl_vars['sqlserver']->value[3]==1){?>checked<?php }?>> 受け取る 
						</label>
						<label class="radio-inline">
							<input type="radio" name="bill" value="0" <?php if ($_smarty_tpl->tpl_vars['sqlserver']->value[3]==0){?>checked<?php }?>> 受け取らない
						</label>
					</div>
				</div>
				
				<div class="form-inline">
                	<button id="delete_email_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['email_id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
" type="button" class="btn btn-danger <?php if ($_smarty_tpl->tpl_vars['smp']->value==false){?>delbtn-centering<?php }?>">メールアドレス削除</button>
                  	<input type="reset" class="btn btn-warning pull-right <?php if ($_smarty_tpl->tpl_vars['smp']->value==false){?>rstbtn-toppad<?php }?>" value="リセット">
				</div>
				
               	<input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
				<input type="hidden" name="action_tag" value="editemail">
				<input type="hidden" name="id" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
        	</fieldset>
	    </form>
    </div>
	    
	<div class="modal-footer">
		<button id="email_status" type="button" class="btn btn-primary">送信</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script><?php }} ?>