<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:39:31
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/flight.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1429663059559263d3813432-35021376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72e2c85a5b908701c892f89aaeafb94df4577921' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/flight.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1429663059559263d3813432-35021376',
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
    'img7' => 0,
    'img8' => 0,
    'img9' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559263d38971c5_91994279',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559263d38971c5_91994279')) {function content_559263d38971c5_91994279($_smarty_tpl) {?><div class="text-center">
<h1>フライト情報</h1>
<hr style="border-color:lightblue;">
フライト情報の登録には2つのステップがあります。<br />
まずはフライトボタンをクリックすると、フライト情報一覧の画面に移動します。<br />
フライト情報が未登録の場合はまず、下の矢印の通り、フライト情報の登録ボタンをクリックします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
以下フライト入力情報の分割画像になります。
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<span class="help-block">"出発地・到着地はサジェストされるので入力雨が楽です。</span>
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img4']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
すべての入力項目を埋めて、送信ボタンを押すと、フライト情報が登録されます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img5']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
次のステップとして、入力した情報をカウンセラーがチェックできるように航空券を携帯のカメラなどで撮影した画像をアップロードをお願いします。<br />
下の矢印の通り、編集ボタンをクリックします。
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img6']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
画面最下部に編集のみ出現する画像アップロードボタンをクリックしてください。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img7']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
すると、以下のような画面がポップアップします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img8']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
ファイルを選択から航空券の画像を選択し、送信ボタンを押してください。<br />
正常に画像がアップロードされると以下のような縮小された画像が表示されます。<br />
また、間違えて画像をアップロードした、画像に光が入り込んでいるなど削除したい場合は画像の削除ボタンを押してください。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img9']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<a id="manual-back" class="clickable">上まで戻る</a>
</div>
<script src="themes/js/append.js"></script><?php }} ?>