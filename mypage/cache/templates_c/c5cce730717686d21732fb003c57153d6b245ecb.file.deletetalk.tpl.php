<?php /* Smarty version Smarty-3.1.13, created on 2016-07-04 18:34:45
         compiled from "/var/www/html/mypage/application/modules/default/views/talk/deletetalk.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19868452577a2db508eeb5-75414282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5cce730717686d21732fb003c57153d6b245ecb' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/talk/deletetalk.tpl',
      1 => 1419238869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19868452577a2db508eeb5-75414282',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_577a2db5107a34_91134095',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_577a2db5107a34_91134095')) {function content_577a2db5107a34_91134095($_smarty_tpl) {?><div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title">一言相談除完了</h4>
	</div>
	
	<div class="modal-body">
    	<h1>一言相談の削除が完了しました。</h1><br />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal" id="reload">ページ更新</button>
	</div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<SCRIPT language="JavaScript">
<!--
	mnt = 5;
	url = "<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/talk/index";
	function jumpPage() {
	  location.href = url;
	}
	setTimeout("jumpPage()",mnt*1000)
//-->
</SCRIPT><?php }} ?>