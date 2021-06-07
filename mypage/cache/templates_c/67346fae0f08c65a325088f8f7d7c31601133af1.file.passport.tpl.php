<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:37:50
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/passport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16305913605592636e4d0d14-38111113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67346fae0f08c65a325088f8f7d7c31601133af1' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/passport.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16305913605592636e4d0d14-38111113',
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
  'unifunc' => 'content_5592636e5291c2_06965123',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592636e5291c2_06965123')) {function content_5592636e5291c2_06965123($_smarty_tpl) {?><div class="text-center">
<h1>パスポート</h1>
<hr style="border-color:lightblue;">
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
最初に注意ですが、パスポート未アップロードの状態では青字体のパスポート確認が表示されていません。<br />
パスポートを1度でもアップロードすると表示されるようになります。<br />
この画面では、パスポートのアップロードと、アップロード後の画像の確認が行えます<br />
パスポート画像を選択し、送信すると、パスポート確認のリンクで以下の様な画像が表示されます。
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>