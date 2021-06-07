<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:41:33
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/seminarhistory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1398094245592644d8a58a6-67868439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '753f191ff18af116ae2858b19be0ccdf09a11b15' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/seminarhistory.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1398094245592644d8a58a6-67868439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592644d8feb66_11197875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592644d8feb66_11197875')) {function content_5592644d8feb66_11197875($_smarty_tpl) {?><div class="text-center">
<h1>過去に参加したセミナー一覧</h1>
<hr style="border-color:lightblue;">
お客様が過去に参加されたセミナーの一覧です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
ヘルプ画面は、まだ参加したセミナーがない状態のものを表示していますが<br />
お客様が参加されたセミナーにつきましては、履歴としてリスト化されますので<br />
今までどんなセミナーに参加したかなと思い出したいときにご利用ください<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>