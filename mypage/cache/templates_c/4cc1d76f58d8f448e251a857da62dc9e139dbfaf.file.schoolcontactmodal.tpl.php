<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:24
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/schoolcontactmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54959800155926570e5ede8-23416249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cc1d76f58d8f448e251a857da62dc9e139dbfaf' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/schoolcontactmodal.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54959800155926570e5ede8-23416249',
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
  'unifunc' => 'content_55926570ec13e5_60680264',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926570ec13e5_60680264')) {function content_55926570ec13e5_60680264($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">学校連絡ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
学校やご実家に連絡用のシートを保存・印刷するためのシートを表示する画面です。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img2']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
どちらのリンクもクリックすると保険情報とVISA情報を選択する画面がポップアップしてきます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img3']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
印字ボタンをクリックると、以下の様な連絡先情報が入力されたシートが出力されます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img4']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
学校用は英語で、ご実家用は日本語で出力されます。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>