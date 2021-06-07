<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:40:11
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/visa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:348601289559263fbac0050-36307469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ffdaf798383e82caa4266c00efcb10a34c044c8' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/visa.tpl',
      1 => 1435656572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '348601289559263fbac0050-36307469',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559263fbb1e800_69634207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559263fbb1e800_69634207')) {function content_559263fbb1e800_69634207($_smarty_tpl) {?><div class="text-center">
<h1>ビザ情報</h1>
<hr style="border-color:lightblue;">
ビザが発給されたら入力する項目です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
新規登録の場合はビザ情報登録を、変更の場合は変更ボタンをクリックしてください。<br />
以下入力サンプルです。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<span class="help-block">入力必須項目です</span>
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<span class="help-block">任意入力項目です(国によります)</span>
<br />
以上の項目を入力し、送信すると登録完了です。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>