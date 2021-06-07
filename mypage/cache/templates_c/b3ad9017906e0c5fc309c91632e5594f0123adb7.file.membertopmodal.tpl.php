<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:48:40
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/membertopmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1238955431559265f8d4cf18-61512078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ad9017906e0c5fc309c91632e5594f0123adb7' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/membertopmodal.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1238955431559265f8d4cf18-61512078',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559265f8d9e8d0_55608840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559265f8d9e8d0_55608840')) {function content_559265f8d9e8d0_55608840($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">会員情報変更トップヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
パスワード変更・メールアドレス変更・住所・電話番号変更の3つのメニューがあります。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
お客様の変更したい情報をメニューから選択してください。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>