<?php /* Smarty version Smarty-3.1.13, created on 2015-07-16 15:45:08
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18549847615592635ec6d576-71704775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b315df7d3e74ca2a1342962bc684fda5cbb06dd4' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/article.tpl',
      1 => 1437028983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18549847615592635ec6d576-71704775',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592635ecbb206_76922431',
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592635ecbb206_76922431')) {function content_5592635ecbb206_76922431($_smarty_tpl) {?><div class="text-center">
<h1>約款及び同意書</h1>
<hr style="border-color:lightblue;">
同意書の署名については必ず約款に目を通してから行ってください。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
約款及び同意書の項目に同意し、当協会のサービスを受ける場合は画面の下記の場所に署名をお願いします。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>