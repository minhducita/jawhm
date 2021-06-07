<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:41:55
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165966860455926463050f67-45758699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '632f6d9f84e6bdd502998b1d41e74b17a1d7cdd9' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/password.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165966860455926463050f67-45758699',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926463077e55_81640892',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926463077e55_81640892')) {function content_55926463077e55_81640892($_smarty_tpl) {?><div class="text-center">
<h1>パスワード変更</h1>
<hr style="border-color:lightblue;">
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
JAWHMのパスワード入力でのログインする際のパスワード変更です。<br />
パスワードは最低文字数5文字以上でお願いします。<br />
パスワード入力と、パスワード再入力には同じ文字の入力をお願いします。<br />
変更が完了するとその旨表示されます。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>