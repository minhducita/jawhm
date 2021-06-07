<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:39:53
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/insurance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:335130987559263e915ea69-18400887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c7d3a4bcc1912660ea27081a81fcc94177c89b5' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/insurance.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '335130987559263e915ea69-18400887',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
    'img4' => 0,
    'img5' => 0,
    'img6' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559263e91ccd56_12641998',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559263e91ccd56_12641998')) {function content_559263e91ccd56_12641998($_smarty_tpl) {?><div class="text-center">
<h1>保険情報</h1>
<hr style="border-color:lightblue;">
保険契約情報がお客様のもとに届いたら入力をお願いします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
新規登録の場合は保険契約情報登録ボタンをクリックして、変更の場合は一覧から変更ボタンを押してください。<br />
以下入湯奥見本です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img4']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
保険契約情報を入力し終えると、画面の一番下に英語で表示されるリンクがあります。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img5']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
DLボタンを押すと、保険情報の英語版が印刷可能形式で出力されます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img6']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />

<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>