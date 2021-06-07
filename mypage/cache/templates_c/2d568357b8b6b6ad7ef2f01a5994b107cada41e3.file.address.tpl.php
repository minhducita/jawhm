<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:42:22
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4141225395592647e8cdff5-60276153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d568357b8b6b6ad7ef2f01a5994b107cada41e3' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/address.tpl',
      1 => 1435656568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4141225395592647e8cdff5-60276153',
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
  'unifunc' => 'content_5592647e936bc4_61237152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592647e936bc4_61237152')) {function content_5592647e936bc4_61237152($_smarty_tpl) {?><div class="text-center">
<h1>住所・電話番号変更</h1>
<hr style="border-color:lightblue;">
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
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>