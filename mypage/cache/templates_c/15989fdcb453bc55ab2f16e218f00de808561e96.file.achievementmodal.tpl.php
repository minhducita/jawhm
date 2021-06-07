<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:44:34
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/achievementmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:972768785559265024fcae6-06783526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15989fdcb453bc55ab2f16e218f00de808561e96' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/achievementmodal.tpl',
      1 => 1435656568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '972768785559265024fcae6-06783526',
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
  'unifunc' => 'content_55926502525b27_12251690',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926502525b27_12251690')) {function content_55926502525b27_12251690($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">書類トップヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
留学情報が選択できるようになると表示されるようにある画面です。<br />
お客様が渡航までに必要な一連のステップを一覧表示します。<br />
初期状態ではすべてのアコーディオンは閉じており、色によってそのステップが未着手なのか、完了しているかなどが分かります。<br />
<br />
<img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
アコーディオンを開くと、お客様がそのタスクを完了した日や期限日、スタッフが確認した日が表示されます。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>