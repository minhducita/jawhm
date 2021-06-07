<?php /* Smarty version Smarty-3.1.13, created on 2015-05-28 13:22:08
         compiled from "/var/www/html/mypage/application/modules/staff/views/application/redo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1700213187556697f0e3cbc6-85514987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5986bd47c101f446d94ee124872971c53919386f' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/application/redo.tpl',
      1 => 1419238971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1700213187556697f0e3cbc6-85514987',
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
  'unifunc' => 'content_556697f0e89293_00368396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556697f0e89293_00368396')) {function content_556697f0e89293_00368396($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status_name']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
やり直し設定完了</h4>
    </div>

    <div class="modal-body">
        <h1><?php echo htmlspecialchars(htmlspecialchars($_smarty_tpl->tpl_vars['status_name']->value[$_smarty_tpl->tpl_vars['name']->value], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
のやり直し設定が完了しました。</h1><br />
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