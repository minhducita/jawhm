<?php /* Smarty version Smarty-3.1.13, created on 2016-07-01 15:08:37
         compiled from "/var/www/html/mypage/application/modules/error/views/index/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176275905577608e5781630-70417726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6447b43d2d23a38cb56eb23701fb60d81020ef6a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/error/views/index/error.tpl',
      1 => 1419238895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176275905577608e5781630-70417726',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_577608e57e4f67_86236631',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_577608e57e4f67_86236631')) {function content_577608e57e4f67_86236631($_smarty_tpl) {?><div class="modal-content">
   	<div class="modal-header">
       	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       	<h4 class="modal-title">登録失敗</h4>
    </div>
    
    <div class="modal-body">
    	<h1 class="text-red">登録に失敗しました!!</h1><br />
    	<p>入力したメールアドレスに重複があります</p><br />
    </div>
    
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div>
<?php }} ?>