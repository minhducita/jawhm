<?php /* Smarty version Smarty-3.1.13, created on 2015-06-01 14:19:15
         compiled from "/var/www/html/mypage/application/modules/error/views/index/modalmessage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:987580745556beb539baaa4-02968458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0388fae01c6ba7f47e55ce9c1bcaba1c7cdf7ae2' => 
    array (
      0 => '/var/www/html/mypage/application/modules/error/views/index/modalmessage.tpl',
      1 => 1419238895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '987580745556beb539baaa4-02968458',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556beb53a42f59_78779482',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556beb53a42f59_78779482')) {function content_556beb53a42f59_78779482($_smarty_tpl) {?><div class="modal-content">
   	<div class="modal-header">
       	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       	<h4 class="modal-title">変更失敗</h4>
    </div>
    
    <div class="modal-body">
    	<h1 class="text-red">更新に失敗しました。</h1>
    	<p><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</p>
    	<p>お手数ですが、再度操作をお願いします。</p><br />
	</div>
	    
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<?php }} ?>