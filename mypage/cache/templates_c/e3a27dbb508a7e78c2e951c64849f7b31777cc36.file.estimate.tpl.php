<?php /* Smarty version Smarty-3.1.13, created on 2015-07-16 15:51:12
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/estimate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129605584755926365b392d9-10074483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3a27dbb508a7e78c2e951c64849f7b31777cc36' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/estimate.tpl',
      1 => 1437029377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129605584755926365b392d9-10074483',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926365b9e100_58526388',
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
    'img4' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926365b9e100_58526388')) {function content_55926365b9e100_58526388($_smarty_tpl) {?><div class="text-center">
<h1>見積書</h1>
<hr style="border-color:lightblue;">
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
ここでは見積書の確認とお支払予定日の入力について説明します。<br />
書類トップページから見積もりボタンをクリックすると上記の画面になります。<br />
すでにカウンセラーによって見積が作成されていればリスト表記されて見積が並んでいます。<br />
見積書の内容を確認する場合は矢印のように閲覧のアイコンをクリックします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
すると上記のように見積書が出力されるので、ご自身で支払いたい見積書の確認が行えます。<br />
見積書に記載されているレートについては、あくまで見積書作成時点でのレートのため、請求書とは異なることがあります。<br />
<br />
<img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
実際に予定日を入力してみます。<br />
再び上記画像の矢印のアイコンをクリックします。<br />
<br />
<img class="manual-img" src="data:image/jpg;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img4']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
すると、上記のような入力項目が表示されるので、明日以降で1ヶ月以内の日付を入力し、送信を行ってください。<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>