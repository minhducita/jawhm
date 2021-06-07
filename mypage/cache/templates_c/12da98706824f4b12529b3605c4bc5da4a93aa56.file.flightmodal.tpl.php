<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:21
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/flightmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:929173308559265316e8ad2-80264871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12da98706824f4b12529b3605c4bc5da4a93aa56' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/flightmodal.tpl',
      1 => 1435656569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '929173308559265316e8ad2-80264871',
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
  'unifunc' => 'content_5592653174dc89_82368703',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592653174dc89_82368703')) {function content_5592653174dc89_82368703($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">フライト情報ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
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
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>