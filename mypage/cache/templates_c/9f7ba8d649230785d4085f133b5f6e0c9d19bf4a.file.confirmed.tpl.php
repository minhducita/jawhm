<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:51:19
         compiled from "/var/www/html/mypage/application/modules/staff/views/application/confirmed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125446642955669ec714f420-83236945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f7ba8d649230785d4085f133b5f6e0c9d19bf4a' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/application/confirmed.tpl',
      1 => 1419238970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125446642955669ec714f420-83236945',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'status_name' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55669ec71e7190_47678429',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55669ec71e7190_47678429')) {function content_55669ec71e7190_47678429($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status_name']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
確認完了</h4>
    </div>

    <div class="modal-body">
        <h1><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status_name']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
の確認設定が完了しました。</h1><br />
        ご登録頂いた内容を保存しました。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="reload">ページ更新</button>
    </div>
</div>

<script type="text/javascript" src="<?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['base']->value, ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
/mypage/themes/js/modal.js"></script>
<script>
<!--
    mnt = 5;
    function jumpPage() {
        location.reload();
    }
    setTimeout("jumpPage()",mnt*1000);
//-->
</script><?php }} ?>