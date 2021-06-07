<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:10
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/passportmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11076577655926526f41e02-13297433%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7200387fbdfc8d6ad9f8440646a7d6e6fe106b3' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/passportmodal.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11076577655926526f41e02-13297433',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926527054c37_44795503',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926527054c37_44795503')) {function content_55926527054c37_44795503($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">次回ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
最初に注意ですが、パスポート未アップロードの状態では青字体のパスポート確認が表示されていません。<br />
パスポートを1度でもアップロードすると表示されるようになります。<br />
この画面では、パスポートのアップロードと、アップロード後の画像の確認が行えます<br />
パスポート画像を選択し、送信すると、パスポート確認のリンクで以下の様な画像が表示されます。
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>