<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:40:56
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/achievement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46422603655926428b9c094-06043370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac1df5f06c9ba390cf093e940a90d1ea6d96a0e8' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/achievement.tpl',
      1 => 1435656568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46422603655926428b9c094-06043370',
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
  'unifunc' => 'content_55926428be4f63_88789517',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926428be4f63_88789517')) {function content_55926428be4f63_88789517($_smarty_tpl) {?><div class="text-center">
<h1>達成状況一覧</h1>
<hr style="border-color:lightblue;">
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
留学情報が選択できるようになると表示されるようにある画面です。<br />
お客様が渡航までに必要な一連のステップを一覧表示します。<br />
初期状態ではすべてのアコーディオンは閉じており、色によってそのステップが未着手なのか、完了しているかなどが分かります。<br />
<br />
<img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
アコーディオンを開くと、お客様がそのタスクを完了した日や期限日、スタッフが確認した日が表示されます。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>