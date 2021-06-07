<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:46:31
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/seminartopmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98759489455926577678311-05000413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '965c893982a6825e0fe1edcb61757e481e9faf5d' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/seminartopmodal.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98759489455926577678311-05000413',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55926577708f30_81740714',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55926577708f30_81740714')) {function content_55926577708f30_81740714($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">セミナートップヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
セミナーの予約や確認、オンラインでのセミナー視聴などが行えます。<br />
<br />
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
セミナー予約は、JAWHMのセミナー予約ページへのリンクになっています。<br />
それ以外のメニューにつきましては個別に解説ページを設けております。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>