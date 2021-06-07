<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:48:30
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/onlinemodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1762281075559265ee1413b7-13304649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d2143409a8673b11e96eab2e75f64ff9533fcb1' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/onlinemodal.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1762281075559265ee1413b7-13304649',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559265ee1a0219_87230456',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559265ee1a0219_87230456')) {function content_559265ee1a0219_87230456($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">ワーホリセミナーヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
お客様が現在ご予約されているセミナーの一覧です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
ヘルプ画面は、まだ予約しているセミナーがない状態のものを表示していますが<br />
お客様がご予約されているセミナーにつきましては、リスト化されますので<br />
これからどんなセミナーに参加したかなと思い出したいときにご利用ください<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>