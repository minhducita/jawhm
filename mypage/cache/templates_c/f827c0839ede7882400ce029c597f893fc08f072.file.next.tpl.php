<?php /* Smarty version Smarty-3.1.13, created on 2015-07-16 15:44:41
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/next.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19915486575592632bebe3f0-06540604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f827c0839ede7882400ce029c597f893fc08f072' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/next.tpl',
      1 => 1437028992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19915486575592632bebe3f0-06540604',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592632bf122e4_21058013',
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592632bf122e4_21058013')) {function content_5592632bf122e4_21058013($_smarty_tpl) {?><div class="text-center">
<h1>次回</h1>
<hr style="border-color:lightblue;">
次のステップについてのご案内です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
上の画像のように、次回カウンセリング等とお客様が何をなさればいいのかを表示する画面です。<br />
次回どういうことをやるかといったリマインド等にご利用ください。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>