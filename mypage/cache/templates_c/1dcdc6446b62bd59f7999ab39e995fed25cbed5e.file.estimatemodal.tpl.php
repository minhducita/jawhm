<?php /* Smarty version Smarty-3.1.13, created on 2015-07-16 16:04:41
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/estimatemodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13571107295592651deefe05-28213664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dcdc6446b62bd59f7999ab39e995fed25cbed5e' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/estimatemodal.tpl',
      1 => 1437029377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13571107295592651deefe05-28213664',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592651e00c442_92628171',
  'variables' => 
  array (
    'img1' => 0,
    'img2' => 0,
    'img3' => 0,
    'img4' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592651e00c442_92628171')) {function content_5592651e00c442_92628171($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">見積書ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
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
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>