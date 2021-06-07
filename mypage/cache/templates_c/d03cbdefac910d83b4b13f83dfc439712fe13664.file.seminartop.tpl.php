<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:41:13
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/seminartop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:375843029559264396d18f0-23217390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd03cbdefac910d83b4b13f83dfc439712fe13664' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/seminartop.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '375843029559264396d18f0-23217390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926439726294_60466810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926439726294_60466810')) {function content_55926439726294_60466810($_smarty_tpl) {?><div class="text-center">
<h1>セミナートップ</h1>
<hr style="border-color:lightblue;">
セミナーの予約や確認、オンラインでのセミナー視聴などが行えます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
セミナー予約は、JAWHMのセミナー予約ページへのリンクになっています。<br />
それ以外のメニューにつきましては個別に解説ページを設けております。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>