<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:38
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/insurancemodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112442882355926542d3a3d3-09084099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a778deea68b7e9003a6e54ed12bc0c5d1527696' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/insurancemodal.tpl',
      1 => 1435656570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112442882355926542d3a3d3-09084099',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926542da8a41_60474908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926542da8a41_60474908')) {function content_55926542da8a41_60474908($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">保険契約情報ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
保険契約情報がお客様のもとに届いたら入力をお願いします。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
新規登録の場合は保険契約情報登録ボタンをクリックして、変更の場合は一覧から変更ボタンを押してください。<br />
以下入湯奥見本です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img4']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
保険契約情報を入力し終えると、画面の一番下に英語で表示されるリンクがあります。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img5']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
DLボタンを押すと、保険情報の英語版が印刷可能形式で出力されます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img6']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>