<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:43:25
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/counselingmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1867314759559264bd817023-58675665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f760d6ea94d056c590fd96e0ed1935d9f0bf83d6' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/counselingmodal.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1867314759559264bd817023-58675665',
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
  'unifunc' => 'content_559264bd876d60_50665421',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559264bd876d60_50665421')) {function content_559264bd876d60_50665421($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">カウンセリング予約ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
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
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>