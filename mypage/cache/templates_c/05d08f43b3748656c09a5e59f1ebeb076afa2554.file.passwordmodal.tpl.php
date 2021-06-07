<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:48:47
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/passwordmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37764127559265ff205a14-05055052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05d08f43b3748656c09a5e59f1ebeb076afa2554' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/passwordmodal.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37764127559265ff205a14-05055052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_559265ff2494b5_01551775',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559265ff2494b5_01551775')) {function content_559265ff2494b5_01551775($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">パスワード変更ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
JAWHMのパスワード入力でのログインする際のパスワード変更です。<br />
パスワードは最低文字数5文字以上でお願いします。<br />
パスワード入力と、パスワード再入力には同じ文字の入力をお願いします。<br />
変更が完了するとその旨表示されます。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>