<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:41:48
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/membertop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8093659355592645c687c01-65787420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed28fcc4a738fb7c8f7f3b08b4fcac25195c43a0' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/membertop.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8093659355592645c687c01-65787420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592645c6ae540_21084261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592645c6ae540_21084261')) {function content_5592645c6ae540_21084261($_smarty_tpl) {?><div class="text-center">
<h1>会員情報変更トップ</h1>
<hr style="border-color:lightblue;">
パスワード変更・メールアドレス変更・住所・電話番号変更の3つのメニューがあります。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
お客様の変更したい情報をメニューから選択してください。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>