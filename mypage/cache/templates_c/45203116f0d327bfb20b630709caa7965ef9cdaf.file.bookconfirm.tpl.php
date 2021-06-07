<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:41:19
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/bookconfirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10852727375592643faa6da6-41673708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45203116f0d327bfb20b630709caa7965ef9cdaf' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/bookconfirm.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10852727375592643faa6da6-41673708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592643faefa91_85186186',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592643faefa91_85186186')) {function content_5592643faefa91_85186186($_smarty_tpl) {?><div class="text-center">
<h1>セミナー予約確認</h1>
<hr style="border-color:lightblue;">
お客様が現在ご予約されているセミナーの一覧です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
ヘルプ画面は、まだ予約しているセミナーがない状態のものを表示していますが<br />
お客様がご予約されているセミナーにつきましては、リスト化されますので<br />
これからどんなセミナーに参加したかなと思い出したいときにご利用ください<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>