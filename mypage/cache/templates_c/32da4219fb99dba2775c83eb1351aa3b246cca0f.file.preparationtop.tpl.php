<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:39:22
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/preparationtop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:944440511559263cad3d513-26056416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32da4219fb99dba2775c83eb1351aa3b246cca0f' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/preparationtop.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '944440511559263cad3d513-26056416',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559263cad8ea28_66162110',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559263cad8ea28_66162110')) {function content_559263cad8ea28_66162110($_smarty_tpl) {?><div class="text-center">
<h1>出発トップ</h1>
<hr style="border-color:lightblue;">
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
出発の画面はこのような感じです。<br />
お客様の書類の準備状況によってボタンの色が変わります。詳しくはばむくんの説明を参照ください。<br />
基本的な操作は書類とほぼ同じです。各ページに詳細なヘルプを記載しています。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>