<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:41:41
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/online.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143056983755926455d5d665-24509689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c2acf0a3a0aeb9815a003b74bca801df1e4247f' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/online.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143056983755926455d5d665-24509689',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926455db1455_32621755',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926455db1455_32621755')) {function content_55926455db1455_32621755($_smarty_tpl) {?><div class="text-center">
<h1>オンラインセミナー一覧</h1>
<hr style="border-color:lightblue;">
オンラインセミナーの告知画面と、本日のオンラインセミナーの予定画面です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
ヘルプ画面は、オフラインで、オンラインセミナーのない日ですが<br />
本日オンラインセミナーが予定されていれば画面下記にリスト上に表示されます。<br />
また、オンラインの時間になりましたらONAIRのアイコンに切り替わり、アイコンをクリックすればオンラインセミナーが試聴できます。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>