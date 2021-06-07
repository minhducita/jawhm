<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:40:33
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/schedule.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1921037247559264115a7029-65955430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f7ad06ec482a542180b57e3a1accb6b07cc2fd2' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/schedule.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1921037247559264115a7029-65955430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559264115f6f39_28231501',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559264115f6f39_28231501')) {function content_559264115f6f39_28231501($_smarty_tpl) {?><div class="text-center">
<h1>スケジュール</h1>
<hr style="border-color:lightblue;">
フライト情報・学校情報等の入力が完了すると日程表が完成します。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
日程表は飛行機内などの携帯の電波が届かないところでも見られるようにダウンロード・もしくは印刷出来る形式で開くことができます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>