<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:41:05
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/counseling.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33421629755926431499835-03026140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e93483234cac3f272646880f3daecf8cb9289f6' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/counseling.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33421629755926431499835-03026140',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559264314f8d83_30296650',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559264314f8d83_30296650')) {function content_559264314f8d83_30296650($_smarty_tpl) {?><div class="text-center">
<h1>カウンセリング予約方法</h1>
<hr style="border-color:lightblue;">
カウンセリング予約の方法は、まず矢印のリンクをクリックします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
次に、カウンセリングの希望日時を翌日以降で第三希望まで入力し、相談内容やビザ情報(あれば)を入力してください。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
その後送信ボタンを押せば完了です。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>