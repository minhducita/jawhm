<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:40:44
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/schoolcontact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10151436605592641cf33151-85508638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b53b57b5a246a74906d43013663d21d903f1b16' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/schoolcontact.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10151436605592641cf33151-85508638',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
    'img4' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592641d065ed6_31978565',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592641d065ed6_31978565')) {function content_5592641d065ed6_31978565($_smarty_tpl) {?><div class="text-center">
<h1>学校連絡</h1>
<hr style="border-color:lightblue;">
学校やご実家に連絡用のシートを保存・印刷するためのシートを表示する画面です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
どちらのリンクもクリックすると保険情報とVISA情報を選択する画面がポップアップしてきます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
印字ボタンをクリックると、以下の様な連絡先情報が入力されたシートが出力されます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img4']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
学校用は英語で、ご実家用は日本語で出力されます。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>