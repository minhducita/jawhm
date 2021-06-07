<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:57
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/visamodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56571864355926555214278-41004292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dadc80005a5db09033a3b5bdd11e9014ee0aef7' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/visamodal.tpl',
      1 => 1435656572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56571864355926555214278-41004292',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559265552712a7_27629720',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559265552712a7_27629720')) {function content_559265552712a7_27629720($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">ビザ情報ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
ビザが発給されたら入力する項目です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
新規登録の場合はビザ情報登録を、変更の場合は変更ボタンをクリックしてください。<br />
以下入力サンプルです。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<span class="help-block">入力必須項目です</span>
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<span class="help-block">任意入力項目です(国によります)</span>
<br />
以上の項目を入力し、送信すると登録完了です。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>