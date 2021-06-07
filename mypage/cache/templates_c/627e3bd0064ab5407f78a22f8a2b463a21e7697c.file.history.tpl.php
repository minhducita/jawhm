<?php /* Smarty version Smarty-3.1.13, created on 2015-07-16 15:44:34
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38892386555926324798004-69487198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '627e3bd0064ab5407f78a22f8a2b463a21e7697c' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/history.tpl',
      1 => 1437029011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38892386555926324798004-69487198',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559263247e0283_41807785',
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559263247e0283_41807785')) {function content_559263247e0283_41807785($_smarty_tpl) {?><div class="text-center">
<h1>履歴</h1>
<hr style="border-color:lightblue;">
履歴についての説明です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
上の画像のように、これまでお客様と当協会のやりとりが蓄積されていく画面です。<br />
以前どういうことをやったかといったリマインド等にご利用ください。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>