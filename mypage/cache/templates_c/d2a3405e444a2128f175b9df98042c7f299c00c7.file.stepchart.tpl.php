<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:36:23
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/stepchart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10167481555592631744d295-22446977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2a3405e444a2128f175b9df98042c7f299c00c7' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/stepchart.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10167481555592631744d295-22446977',
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
  'unifunc' => 'content_55926317477d13_52630995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926317477d13_52630995')) {function content_55926317477d13_52630995($_smarty_tpl) {?><div class="text-center">
<h1>ステップチャート</h1>
<hr style="border-color:lightblue;">
今度はステップチャートについての説明をしていきます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
まずはトップ画面のこの位置までスクロールして「準備」の矢印をクリックします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />

するとプランニングと大きく表示されたページに来るので、左下の「ステップチャート」というボタンをクリックします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
数字のナンバーが降ってあるところをタップすると、バーの色が黄色にかわり、詳細画面が表示されます。<br />
より詳しい内容がある場合は、「詳しく見る」ボタンを押すと更に詳細情報が確認できます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img4']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
上の画像が、その更に詳細な情報を開いた時のサンプルです。<br />
ステップチャートはお客様が出発するまでの手順を書いた全体的な流れです。<br />
いつも確認して今時分はどこの段階にいるのかを確認する癖をつけましょう。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>

<script src="themes/js/append.js"></script><?php }} ?>