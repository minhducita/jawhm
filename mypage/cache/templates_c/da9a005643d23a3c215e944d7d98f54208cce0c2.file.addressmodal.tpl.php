<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:49:06
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/addressmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86612010755926612bcb770-29494129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da9a005643d23a3c215e944d7d98f54208cce0c2' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/addressmodal.tpl',
      1 => 1435656568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86612010755926612bcb770-29494129',
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
  'unifunc' => 'content_55926612c2e9a6_62976778',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926612c2e9a6_62976778')) {function content_55926612c2e9a6_62976778($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">お客様住所一覧ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
現住所・実家・留学先の住所と電話番号が入力できます。<br />
<br />
住所登録は3件まで行えます。<br />
住所登録が3件になっていなければ上部に新規登録の青色のボタンが表示されます。<br />
新規登録・住所変更アイコン共に押すと以下のポップアップが出現します<br />
<br />
<img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
番地以外は必須入力項目となっていますので、ご入力をお願いします。<br />
また、お客様ご渡航後の緊急連絡先として実家住所を使用する場合がございますので、実家住所の登録は必ず行っていただきますよう、よろしくお願いします。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>