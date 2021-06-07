<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:36:54
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/applicationtop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49599569155926336b720e9-19077121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5d0658377ce698cb33fd68dfc0511bf09b39e04' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/applicationtop.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49599569155926336b720e9-19077121',
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
  'unifunc' => 'content_55926336bd1525_12468748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926336bd1525_12468748')) {function content_55926336bd1525_12468748($_smarty_tpl) {?><div class="text-center">
<h1>書類トップ</h1>
<hr style="border-color:lightblue;">
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
書類ページや、出発、達成状況一覧ページに移動するには留学情報を選択する必要があります。<br />
初めてのご渡航であれば、「今回のご渡航」を選択すると次の画面へと進めます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
書類の画面はこのような感じです。<br />
お客様の書類の準備状況によってボタンの色が変わります。詳しくはばむくんの説明を参照ください。<br />
<br />
<img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
その下に留学情報をカウンセラーが入力します。<br />
学校情報と申込内容は学校等が確定次第入力されます。申込期限については都度カウンセラーが入力しますので、その日までに申し込みできるようにしてください。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>