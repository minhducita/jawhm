<?php /* Smarty version Smarty-3.1.13, created on 2015-07-16 16:03:31
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/historymodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:901298765559264e6f19372-54643852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a1c1f79da10b66113d184a00e6578108c9f9e55' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/historymodal.tpl',
      1 => 1437029014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '901298765559264e6f19372-54643852',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559264e7028a25_14764425',
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559264e7028a25_14764425')) {function content_559264e7028a25_14764425($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">履歴ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
履歴についての説明です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
上の画像のように、これまでお客様と当協会のやりとりが蓄積されていく画面です。<br />
以前どういうことをやったかといったリマインド等にご利用ください。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>