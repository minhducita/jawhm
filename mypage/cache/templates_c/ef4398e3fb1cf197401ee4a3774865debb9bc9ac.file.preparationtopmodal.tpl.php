<?php /* Smarty version Smarty-3.1.13, created on 2015-06-30 18:45:31
         compiled from "/var/www/html/mypage/application/modules/default/views/manual/preparationtopmodal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5576222245592653b589496-51202302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef4398e3fb1cf197401ee4a3774865debb9bc9ac' => 
    array (
      0 => '/var/www/html/mypage/application/modules/default/views/manual/preparationtopmodal.tpl',
      1 => 1435656571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5576222245592653b589496-51202302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5592653b5db938_78553272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5592653b5db938_78553272')) {function content_5592653b5db938_78553272($_smarty_tpl) {?><div class="modal-content window-container">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">出発ヘルプ</h4>
</div>

<div class="modal-body">
<div class="text-center">
<img class="manual-img" src="data:image/png;base64, <?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['img1']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
"><br />
<br />
出発の画面はこのような感じです。<br />
お客様の書類の準備状況によってボタンの色が変わります。詳しくはばむくんの説明を参照ください。<br />
基本的な操作は書類とほぼ同じです。各ページに詳細なヘルプを記載しています。<br />
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
</div>
</div><?php }} ?>