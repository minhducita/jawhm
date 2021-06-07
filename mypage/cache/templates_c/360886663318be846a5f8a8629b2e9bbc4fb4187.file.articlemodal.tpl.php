<?php /* Smarty version Smarty-3.1.13, created on 2015-07-16 16:04:21
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/articlemodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12021140655926517025b48-91867490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '360886663318be846a5f8a8629b2e9bbc4fb4187' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/articlemodal.tpl',
      1 => 1437028986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12021140655926517025b48-91867490',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926517076ff4_94665670',
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926517076ff4_94665670')) {function content_55926517076ff4_94665670($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">約款及び同意書ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
同意書の署名については必ず約款に目を通してから行ってください。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
約款及び同意書の項目に同意し、当協会のサービスを受ける場合は画面の下記の場所に署名をお願いします。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>