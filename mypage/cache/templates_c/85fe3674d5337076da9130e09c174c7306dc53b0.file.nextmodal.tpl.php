<?php /* Smarty version Smarty-3.1.13, created on 2015-07-16 16:03:37
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/nextmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1944243242559264ed0243b6-20610973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85fe3674d5337076da9130e09c174c7306dc53b0' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/nextmodal.tpl',
      1 => 1437028995,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1944243242559264ed0243b6-20610973',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559264ed04e2c4_60806745',
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559264ed04e2c4_60806745')) {function content_559264ed04e2c4_60806745($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">次回ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
次のステップについてのご案内です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
上の画像のように、次回カウンセリング等とお客様が何をなさればいいのかを表示する画面です。<br />
次回どういうことをやるかといったリマインド等にご利用ください。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>