<?php /* Smarty version Smarty-3.1.13, created on 2016-06-30 15:31:50
         compiled from "/var/www/html/mypage/application/modules/default/views/seminar/seminardetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15900591515774bcd682a9f9-91094619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53cb9c399f9f207af443e0c68b846f8ef5eb4e09' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/seminar/seminardetail.tpl',
      1 => 1419238861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15900591515774bcd682a9f9-91094619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5774bcd68bf156_91271307',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5774bcd68bf156_91271307')) {function content_5774bcd68bf156_91271307($_smarty_tpl) {?><div class="modal-content">
   	<div class="modal-header">
       	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       	<h4 class="modal-title"><?php echo htmlspecialchars(htmlspecialchars(strip_tags($_smarty_tpl->tpl_vars['info']->value['k_title1']), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</h4>
    </div>
               
    <div class="modal-body">
    	<?php echo htmlspecialchars(htmlspecialchars(strip_tags($_smarty_tpl->tpl_vars['info']->value['k_desc1']), ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>

    </div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</div><?php }} ?>