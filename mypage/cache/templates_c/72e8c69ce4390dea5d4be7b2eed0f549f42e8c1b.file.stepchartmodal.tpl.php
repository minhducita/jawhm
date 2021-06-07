<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:43:54
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/stepchartmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1560273042559264dac49c70-17608589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72e8c69ce4390dea5d4be7b2eed0f549f42e8c1b' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/stepchartmodal.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1560273042559264dac49c70-17608589',
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
  'unifunc' => 'content_559264dace2021_61804379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559264dace2021_61804379')) {function content_559264dace2021_61804379($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">ステップチャートヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
今度はステップチャートについての説明をしていきます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
まずはトップ画面のこの位置までスクロールして「準備」の矢印をクリックします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
するとプランニングと大きく表示されたページに来るので、左下の「ステップチャート」というボタンをクリックします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
数字のナンバーが降ってあるところをタップすると、バーの色が黄色にかわり、詳細画面が表示されます。<br />
より詳しい内容がある場合は、「詳しく見る」ボタンを押すと更に詳細情報が確認できます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
上の画像が、その更に詳細な情報を開いた時のサンプルです。<br />
ステップチャートはお客様が出発するまでの手順を書いた全体的な流れです。<br />
いつも確認して今時分はどこの段階にいるのかを確認する癖をつけましょう。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>