<?php /* Smarty version Smarty-3.1.13, created on 2015-05-26 19:11:59
         compiled from "/var/www/html/mypage/application/modules/staff/views/client/nextstepedit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1082465054556446ef044f90-72953952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce099d873af5eac0910453282825413856cdb18f' => 
    array (
      0 => '/var/www/html/mypage/application/modules/staff/views/client/nextstepedit.tpl',
      1 => 1419238986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1082465054556446ef044f90-72953952',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_556446ef0b1a10_34924562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556446ef0b1a10_34924562')) {function content_556446ef0b1a10_34924562($_smarty_tpl) {?><div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">次のステップ更新完了</h4>
    </div>

    <div class="modal-body">
        <h1>次のステップの更新が完了しました。</h1><br />
        ご登録頂いた内容を保存しました。<br />
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="jumpPage()">ページ更新</button>
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
    setTimeout("jumpPage()",mnt*1000)
//-->
</script><?php }} ?>