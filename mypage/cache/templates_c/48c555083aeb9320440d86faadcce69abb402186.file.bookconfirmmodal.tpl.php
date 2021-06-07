<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:38
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/bookconfirmmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12380556215592657ec99304-78336389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48c555083aeb9320440d86faadcce69abb402186' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/bookconfirmmodal.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12380556215592657ec99304-78336389',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592657ece2ba5_06973603',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592657ece2ba5_06973603')) {function content_5592657ece2ba5_06973603($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">ご予約セミナー情報ヘルプ</h4>
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