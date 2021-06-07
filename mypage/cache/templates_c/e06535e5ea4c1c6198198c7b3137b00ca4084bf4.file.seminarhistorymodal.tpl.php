<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:53
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/seminarhistorymodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2120070615592658da4ae14-40247506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e06535e5ea4c1c6198198c7b3137b00ca4084bf4' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/seminarhistorymodal.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2120070615592658da4ae14-40247506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592658da8f2b4_18588992',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592658da8f2b4_18588992')) {function content_5592658da8f2b4_18588992($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">過去に参加したセミナー一覧ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
セミナーの予約や確認、オンラインでのセミナー視聴などが行えます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
セミナー予約は、JAWHMのセミナー予約ページへのリンクになっています。<br />
それ以外のメニューにつきましては個別に解説ページを設けております。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>