<?php /* Smarty version Smarty-3.1.13, created on 2016-07-04 18:34:42
         compiled from "/var/www/html/mypage/application/modules/default/views/talk/talkdelconfirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1445945859577a2db2d1d096-16239023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d2eeacd073126976f2c1417f00b32e5cd527bd7' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/talk/talkdelconfirm.tpl',
      1 => 1419238870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1445945859577a2db2d1d096-16239023',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'time' => 0,
    'token' => 0,
    'id' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_577a2db2e31049_89469413',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_577a2db2e31049_89469413')) {function content_577a2db2e31049_89469413($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/mypage/library/Smarty/plugins/modifier.date_format.php';
?><div class="modal-content">
   	<div class="modal-header">
       	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       	<h4 class="modal-title">一言相談削除確認</h4>
    </div>
    
    <div class="modal-body">
    	<h3>本当に時間: <?php echo htmlspecialchars(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"%m/%d %H:%M"), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
 の情報を削除しますか?</h3>
	    	<form id="talk-delete" method="post">
	        <fieldset>
				<div class="form-group">
                  	<div class="col-sm-4"></div>
                  	<div class="col-sm-4">
                  		<button type="button" id="talk_delete" class="btn btn-danger">削除</button>
	    				<button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                  	</div>
				</div>
               	<input type="hidden" name="token" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
				<input type="hidden" name="action_tag" value="talkdelete">
				<input type="hidden" name="ID" value="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
">
        	</fieldset>
	    	</form>
	</div>
	    
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script><?php }} ?>